<?php

class ConnectDataBase {

  private $connect;

  /**
   * Constructor function connect to database
   * 
   * @param none
   * @return none
   */
  public function __construct() 
  {
    try {
      // Use class mysqli
      $con = new mysqli("localhost", "root", "", "quan_ly_thu_vien");
      $this->connect = $con;
    } catch (Exception $exception) {
      $this->connect = false;
    }
  }

  /**
   * Model method get the connection to database
   * 
   * @param none
   * @return SQL database connect
   */
  public function connection()
  {
    return $this->connect;
  }
}