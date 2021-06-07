<?php

  class Tarefa_2 {

    // Database connection and table name
    private $conn;
    private $table_name = 'Tarefa_2';

    // Properties
    public $id;
    public $module_name;
    public $date;
    public $location;
    public $content;
    public $speaker;
    public $speaker_qual;

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
                  id, module_name, date, location, content, speaker, speaker_qual
                FROM
                  " . $this->table_name;

      // Prepare query statement
      $stmt = $this->conn->prepare($squery);

      // Execute the query
      $stmt->execute();
      
      // Return the PDOStatement
      return $stmt;
    }

    function readOne() {
      // Query SQL para ler apenas um registo
      $squery = "SELECT
          id, module_name, date, location, content, speaker, speaker_qual
        FROM
          " . $this->table_name . "
        WHERE
          id = :ID
        LIMIT 0,1";
  
      // Preparar query statement
      $stmt = $this->conn->prepare($squery);
          
      // Filtrar e associar valor do ID
      $this->id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);
      $stmt->bindValue(':ID', $this->id);
  
      // Executar query
      $stmt->execute();
  
      // Obter dados do registo e instanciar o objeto
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->module_name = $row['module_name'];
      $this->date = $row['date'];
      $this->location = $row['location'];
      $this->content = $row['content'];
      $this->speaker = $row['speaker'];
      $this->speaker_qual = $row['speaker_qual'];
      }

    /**
     * Method to update a record in the Database
     * @return Boolean Returns true when it refreshes in the Database
     */
    function update() {
      // Update Query
      $squery = "UPDATE
            " . $this->table_name . "
            SET 
              module_name=:module_name,
              date=:date,
              location=:location,
              content=: content,
              speaker=:speaker,
              speaker_qual=:speaker_qual
            WHERE
              id=:id";

      // Prepare query statement
      $stmt = $this->conn->prepare($squery);

      // Filter values
      $this->module_name = filter_var($this->module_name, FILTER_SANITIZE_STRING);
      $this->date = filter_var($this->date, FILTER_SANITIZE_STRING);
      $this->location = filter_var($this->location, FILTER_SANITIZE_STRING);
      $this->content = filter_var($this->content, FILTER_SANITIZE_STRING);
      $this->speaker = filter_var($this->speaker, FILTER_SANITIZE_STRING);
      $this->speaker_qual = filter_var($this->speaker_qual, FILTER_SANITIZE_STRING);
      $this->id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);

      // Associate values
      $stmt->bindValue(":module_name", $this->module_name);
      $stmt->bindValue(":date", $this->date);
      $stmt->bindValue(":location", $this->location);
      $stmt->bindValue(":content", $this->content);
      $stmt->bindValue(":speaker", $this->speaker);
      $stmt->bindValue(":speaker_qual", $this->speaker_qual);
      $stmt->bindValue(":id", $this->id);

      // Execute the query
      if ($stmt->execute()){
        return true;
      }
      return false;
    }

    /**
     * Method to delete a record from the Database
     * @return Boolean when it removes from the database
     */
    function delete() {
      // SQL Query
      $squery = "DELETE
              FROM" . $this->table_name . "
              WHERE id = :ID";

      // Prepare query statement
      $stmt = $this->conn->prepare($squery);

      // Filter and associate ID value
      $this->id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);

      // Associate ID value
      $stmt->bindValue(":id", $this->id); 

      
      // Execute the query
      if ($stmt->execute()){
        return true;
      }
      return false;
    }
  }