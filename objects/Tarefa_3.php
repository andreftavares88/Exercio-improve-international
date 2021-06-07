<?php
  class Tarefa_3 {

    // Database connection and table name
    private $conn;
    private $table_name = 'Tarefa_3';

    // Properties
    public $id;
    public $name;
    public $email;
    public $prefix;
    public $phoneNumber;
    public $newsletter;
    public $date;
    public $time;

    /**
     * Constructor method that instantiates the database connection
    */
    public function __construct($db) {
      $this-> conn = $db;
    }

    /**
     * Method to read all table elements
     * @return PDOStatement with all table elements
    */
    function read() {
      // SQL Query
      $squery = "SELECT 
                  id, name, email, prefix, phoneNumber, newsletter, date, time
                FROM
                  " . $this->table_name;

      // Prepare query statement
      $stmt = $this->conn->prepare($squery);

      // Execute the query
      $stmt->execute();
      
      // Return the PDOStatement
      return $stmt;
    }
  }