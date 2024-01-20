<?php

include "connect.php";

class Book
{
  private $connectDB;

  public function __construct()
  {
    $con = new ConnectDataBase();
    // Call to method connection then get the connect
    $this->connectDB = $con->connection();
  }

   /**
   * Model method list all category
   * 
   * @return record
   */
  public function listCategory()
  {
    $sql = "SELECT * FROM categories ORDER BY id ASC";
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method update a category
   * 
   * @param name, _id of category
   * @return boolean
   */
  public function updateCategory($param)
  {
    $sql = 'UPDATE categories SET name = "'.$param['name'].'" WHERE id = "'.$param['_id'].'"';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method insert new category
   * 
   * @param name
   * @return boolean
   */
  public function insertCategory($param)
  {
    $sql = 'INSERT INTO categories(name) VALUES("'.$param['name'].'")';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Model method check category exit's
   * 
   * @param id of category
   * @return boolean|record
   */
  public function checkCategory($param)
  {
    $sql = 'SELECT * FROM categories INNER JOIN books 
    ON books.category_id = categories.id
    INNER JOIN orders ON orders.id_book = books.id
    WHERE categories.id = "'.$param['id'].'" AND orders.status IN (1, 2)';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  public function deleteCategory($param) 
  {
    $sql = 'DELETE FROM categories WHERE id = "'.$param['id'].'"';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  /**
   * Models method list book of category
   * 
   * @param int categoryId 
   * @return boolean|mixed
   */
  public function books($categoryId, $keySearch)
  {
    $key = '"%' . $keySearch . '%"';
    $sql = "SELECT * FROM books WHERE category_id = ".$categoryId."
    AND NAME LIKE ".$key." ORDER BY id ASC";
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  public function checkBook($param)
  {
    $sql = 'SELECT * FROM books INNER JOIN orders 
    ON books.id = orders.id_book 
    WHERE status IN (1, 2) AND books.id = "'.$param["_id"].'"';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  public function deleteBook($param)
  {
    $sql = 'DELETE FROM books WHERE id = "'.$param["_id"].'"';
    $deleterOrders = 'DELETE FROM orders WHERE id_book = "'.$param["_id"].'"';
    try {
      // Excute query here!
      $this->connectDB->query($sql);
      $this->connectDB->query($deleterOrders);
      return true;
    } catch (Exception $exception) {
      return false;
    }
  }

  public function store($param)
  {
    $sql = 'INSERT INTO books(name, category_id, qty, info, price)
    VALUES(
      "'.$param['name'].'", "'.$param['category'].'", 
      "'.$param['qty'].'", "'.$param['info'].'", "'.$param['price'].'"
    )';
    try {
      // Excute query here!
      $this->connectDB->query($sql);
      return true;
    } catch (Exception $exception) {
      return false;
    }
  }

  public function find($bookId)
  {
    $sql = 'SELECT * FROM books where id = "'.$bookId.'"';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  public function update($param)
  {
    $sql = 'UPDATE books SET 
    name = "'.$param['name'].'", category_id = "'.$param['category'].'",
    qty = "'.$param['qty'].'", info = "'.$param['info'].'",
    price = "'.$param['price'].'" WHERE id = "'.$param['id'].'"';
    try {
      // Excute query here!
      $this->connectDB->query($sql);
      return true;
    } catch (Exception $exception) {
      return false;
    }
  }

  public function statisticOrdering() 
  {
    $sql = 'SELECT * FROM orders WHERE status = 1';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  public function statisticOrdered() 
  {
    $sql = 'SELECT * FROM orders WHERE status = 3';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  public function statisticConfirm() 
  {
    $sql = 'SELECT * FROM orders WHERE status = 2';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      return false;
    }
  }

  public function listBook()
  {
    $sql = 'SELECT * FROM books order by id DESC';
    try {
      // Excute query here!
      return $this->connectDB->query($sql);
    } catch (Exception $exception) {
      var_dump($exception); die();
      return false;
    }
  }
}