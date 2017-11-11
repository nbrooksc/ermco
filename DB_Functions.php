<?php # DB_Functions.php
      # functions for interacting with
      # database

class DB_Functions {
  private $conn;

  // constructor
  function __construct() {
    require_once 'DB_Connect.php';
    // connecting to database
    $db = new DB_Connect();
    $this->conn = $db->connect();
  }

  // destructor
  function __destruct() {

  }

  public function updateBoxOne($length, $longitude, $latitude) {
    $stmt = $this->conn->prepare("INSERT INTO box_one (date, length_of_pull, installer, longitude, latitude) VALUES (NOW(), ?, 'Steven', ?, ?)");
    
    $stmt->bind_param("idd", $length, $longitude, $latitude);
    $stmt->execute();
    $stmt->close();

    return $result;
  }

   public function simpleUpdateBoxOne($length, $longitude, $latitude) {
    $oldLength = $this->getBoxOneCurrent();
    $output = shell_exec('php sendText.php');


 //   if ($length < ($oldLength - 9)) {
    //  include('sendText.php');
  //    echo "<br>This has been hit<br>";
  //  }

    echo "<br>Right here<br>";

/*    if ($oldLength != $length) {
      include('textTestNathan.php');
    }
*/
    $stmt = $this->conn->prepare("INSERT INTO box_one (date, length_of_pull, installer, longitude, latitude, current_length) VALUES (NOW(), -1, 'Steven', ?, ?, ?)");
    
    $stmt->bind_param("ddi", $longitude, $latitude, $length);
    $stmt->execute();
    $stmt->close();

    return $result;
  }

   public function simpleUpdateBoxTwo($length, $longitude, $latitude) {
    $stmt = $this->conn->prepare("INSERT INTO box_two (date, length_of_pull, installer, longitude, latitude, current_length) VALUES (NOW(), -1, 'Steven', ?, ?, ?)");
    
    $stmt->bind_param("ddi", $longitude, $latitude, $length);
    $stmt->execute();
    $stmt->close();

    return $result;
  }

  public function simpleUpdateBoxThree($length, $longitude, $latitude) {
    $stmt = $this->conn->prepare("INSERT INTO box_three (date, length_of_pull, installer, longitude, latitude, current_length) VALUES (NOW(), -1, 'Steven', ?, ?, ?)");
    
    $stmt->bind_param("ddi", $longitude, $latitude, $length);
    $stmt->execute();
    $stmt->close();

    return $result;
  }





  public function getBoxOneLength() {
    $stmt = $this->conn->prepare("SELECT initial_length FROM box_data WHERE name='box_one'");

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
 
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $length = $row['initial_length'];

    $stmt = $this->conn->prepare("SELECT length_of_pull FROM box_one");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $length = $length - $row["length_of_pull"];
    }
 
    return $length;
  }

  public function getBoxTwoLength() {
    $stmt = $this->conn->prepare("SELECT initial_length FROM box_data WHERE name='box_two'");

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
 
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $length = $row['initial_length'];

    $stmt = $this->conn->prepare("SELECT length_of_pull FROM box_two");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $length = $length - $row["length_of_pull"];
    }
 
    return $length;
  }

  public function getBoxThreeLength() {
    $stmt = $this->conn->prepare("SELECT initial_length FROM box_data WHERE name='box_three'");

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
 
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $length = $row['initial_length'];

    $stmt = $this->conn->prepare("SELECT length_of_pull FROM box_three");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $length = $length - $row["length_of_pull"];
    }
 
    return $length;
  }         

  public function getBoxOnePulls() {
    $stmt = $this->conn->prepare("SELECT * FROM box_one");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $resultArray = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $resultArray[] = $row;
    }

    $stmt->close();

    return $resultArray;
  }

  
  public function getBoxTwoPulls() {
    $stmt = $this->conn->prepare("SELECT * FROM box_two");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $resultArray = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $resultArray[] = $row;
    }

    $stmt->close();

    return $resultArray;
  }

  
  public function getBoxThreePulls() {
    $stmt = $this->conn->prepare("SELECT * FROM box_three");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $resultArray = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $resultArray[] = $row;
    }

    $stmt->close();

    return $resultArray;
  }

  public function getBoxOneCurrent() {
    $stmt = $this->conn->prepare("SELECT * FROM box_one ORDER BY date DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    return $result;
  }

  public function getBoxTwoCurrent() {
    $stmt = $this->conn->prepare("SELECT * FROM box_two ORDER BY date DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    return $result;
  }

  public function getBoxThreeCurrent() {
    $stmt = $this->conn->prepare("SELECT * FROM box_three ORDER BY date DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    return $result;
  }

  public function getKegs() {
    $stmt = $this->conn->prepare("SELECT * FROM master");
    $stmt->execute();
    $result = $stmt->get_result();
    $resultArray = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $resultArray[] = $row;
    }

    $stmt->close();   
 
    return $resultArray;

  }

  public function getAlerts() {
    $stmt = $this->conn->prepare("SELECT name, alert FROM master");
    $stmt->execute();
    $result = $stmt->get_result();
    $resultArray = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $name = $row["name"];
      $alert = $row["alert"];

      if ($alert != "None") {
        $resultArray[$name] = $alert;
      }
    }
    $stmt->close();

    return $resultArray;
  } 

}
