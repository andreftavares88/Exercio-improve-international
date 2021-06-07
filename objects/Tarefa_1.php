<?php

class Tarefa_1 {

    // Database connection and table name
    private $conn;
    private $table_name = "Tarefa_1";

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
        $this->conn = $db;
    }

    /**
     * Method for creating record in Database
     * Returns true when inserted into database
    */
    function create() {
        // Insertion Query
		$squery = "INSERT INTO
				" . $this->table_name . "
			    SET
                id=:id, name=:name, email=:email, prefix=:prefix, phoneNumber=:phoneNumber, newsletter=:newsletter, date=:date, time=:time";

        // Prepare query
        $stmt = $this->conn->prepare($squery);
       
        // Filter values
        $this->id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);
        $this->name = filter_var($this->name, FILTER_SANITIZE_STRING);
        $this->email = filter_var($this->email, FILTER_SANITIZE_STRING);
        $this->prefix = filter_var($this->prefix, FILTER_SANITIZE_STRING);
        $this->phoneNumber = filter_var($this->phoneNumber, FILTER_SANITIZE_NUMBER_INT);
        $this->newsletter = filter_var($this->newsletter, FILTER_SANITIZE_NUMBER_INT);
        $this->date = filter_var($this->date, FILTER_SANITIZE_STRING);
        $this->time = filter_var($this->time, FILTER_SANITIZE_STRING);

        // Associate values
        $stmt->bindValue(":id", $this->id);
        $stmt->bindValue(":name", $this->name);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":prefix", $this->prefix);
        $stmt->bindValue(":phoneNumber", $this->phoneNumber);
        $stmt->bindValue(":newsletter", $this->newsletter);
        $stmt->bindValue(":date", $this->date);
        $stmt->bindValue(":time", $this->time);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
}