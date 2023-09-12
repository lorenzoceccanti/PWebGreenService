<?php
    require_once "dbConfig.php";

    
    // Crea una istanza della classe DbManager
    $database = new DbManager();

    class DbManager{
        private $mysqli_conn = null;

        function DbManager(){
            $this->openConnection();
        }

        // Apre la connection
        function openConnection(){
    		if (!$this->isOpened()){
    			global $dbHostname;
    			global $dbUsername;
    			global $dbPassword;
    			global $dbName;
    			
    			$this->mysqli_conn = new mysqli($dbHostname, $dbUsername, $dbPassword, $dbName);
				if ($this->mysqli_conn->connect_error) 
					die('Connect Error (' . $this->mysqli_conn->connect_errno . ') ' . $this->mysqli_conn->connect_error);

				$this->mysqli_conn->select_db($dbName) or
					die ('Can\'t use $dbName: ' . mysqli_error());
			}
    }
   
    // Controlla se la connessione al database è già aperta
    // Da eseguire su un oggetto classe DbManager
    function isOpened(){
        return ($this->mysqli_conn != null);
    }

    // Esegue una query e ritorna il risultato
    function queryRun($queryText){
        if(!$this->isOpened())
            $this->openConnection();

        return $this->mysqli_conn->query($queryText);
    }

    // Da usare su query di qualsiasi genere quando si maneggiano form con campi testuali!
    function sqlInjectionFilter($parameter){
        if(!$this->isOpened())
            $this->openConnection();
            
        return $this->mysqli_conn->real_escape_string($parameter);
    }

    // Chiude la connection
    function closeConnection()
    {
        // Se la connection è aperta
        if($this->mysqli_conn != null)
            $this->mysqli_conn->close();

        $this->mysql_conn = null;
    }
}
?>