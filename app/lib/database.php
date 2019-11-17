<?php
    /*
     * PDO Database Class
     * Connect to database
     * Create prepared statements
     * Bind values
     * Return results from the database.
     */

    class Database {

        // Class properties.
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        private $dbh;
        private $stmt;
        private $error;

        // Constructor.
        public function __construct() {

            // Create the dsn connection string.
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

            // PDO options.
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );
           
            try {

                // Create a new PDO instance and set it on the class.
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

            } 
            catch (PDOException $e) {
                
                // Set the error equal to the error's message.
                $this->error = $e->getMessage();

                // Print the error.
                echo $this->error;
            }
        }
    }
?>