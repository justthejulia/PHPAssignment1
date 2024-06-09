<?php
class Database
{
  public $connection; // defyning a variable or porperty that will hold the database connection

  function __construct() //creating a function that is a constructor method that wil be called automatically when an object of the class is created
  {
    $this->connectDatabase(); // calling connectDatabase() method to create a connection to the database when the Database object is 
  } // $this is used to reer to the current instance of the class

  public function connectDatabase() // creating a method that will create a connection to the mysql databse
  {
    $this->connection = mysqli_connect('localhost', 'root', '', 'subscriber_portal'); // hostname -1, username - 2, password - 3rd(empty) , databse name - 4
  }

  public function fetchData() //gets data from the databsae
  {
    $query = 'SELECT * FROM subscribers';
    $result = $this->connection->query($query); //storing the result executing the sql query using the query method 
    return $result;//returning the result set of the query
  }

  public function insertData($name, $email, $interests) ///inserting data to the databse
  {
    $sql = "INSERT INTO subscribers(name, email, interests) VALUES('$name', '$email', '$interests')";
    $result = $this->connection->query($sql);
    if ($result == true) {
      return true;
    }
  }
}

$database = new Database(); // Creating a new instance of the Database class, which automatically calls the constructor and establishes a database connection
?>
