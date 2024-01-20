<?php

include "connect.php";

class User
{
  private $connectDB;

  public function __construct()
  {
    $con = new ConnectDataBase();
    // Call to method connection then get the connect
    $this->connectDB = $con->connection();
  }

  /**
   * Model method check username alrealy
   * 
   * @param username
   * @return record
   */
  public function checkUsername($username)
  {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method insert new user
   * 
   * @param username, password
   * @return boolean|query
   */
  public function store($username, $password)
  {
    $sql = "INSERT INTO users(username, password, role) VALUES('$username', '$password', 0)";
    try {
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method check login using username, password
   * 
   * @param username, password
   * @return boolean
   */
  public function checkLogin($username, $password)
  {
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    try {
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method list all student
   * 
   * @param none
   * @return boolean|record
   */
  public function students($keySearch)
  {
    $key = '"%' . $keySearch . '%"';
    $sql = "SELECT users.id, users.username, orders.status FROM users 
    LEFT JOIN orders ON users.id = orders.user_id WHERE users.role = 0 
    AND users.username LIKE ".$key." ORDER BY STATUS DESC";
    try {
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method list order
   * 
   * @param int studentId 
   * @param int status: 0: phạt, 1: đang mượn, 2 chờ phê duyệt, 3 đã trả
   * @return boolean|record
   */
  public function order($studentId, $status)
  {
    $sql = "SELECT books.id, books.name, orders.status, orders.user_id FROM orders 
      INNER JOIN books ON orders.id_book = books.id 
      WHERE orders.status = ".$status." AND orders.user_id = ".$studentId." 
      ORDER BY books.id ASC";
    try {
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method find a student
   * 
   * @param $studentId of student
   * @return data|boolean
   */
  public function find($studentId)
  {
    $sql = "SELECT * FROM users WHERE id = " . $studentId;
    try {
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }
}