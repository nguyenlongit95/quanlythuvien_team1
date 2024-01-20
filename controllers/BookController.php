<?php

class BookController
{
  public function categories()
  {
    include "../../models/Book.php";
    $categories = new Book();
    $data = $categories->listCategory();
    if (mysqli_num_rows($data) > 0) {
      return mysqli_fetch_all($data);
    }
    return null;
  }

  public function updateCategory($param)
  {
    include "models/Book.php";
    $book = new Book();
    $book->updateCategory($param);
    return header('Location: /views/admin/books.php');
  }

  public function insertCategory($param)
  {
    include "models/Book.php";
    $book = new Book();
    $book->insertCategory($param);
    return header('Location: /views/admin/books.php');
  }

  public function deleteCategory($param)
  {
    include "models/Book.php";
    $book = new Book();
    $delete = $book->checkCategory($param);
    if (mysqli_num_rows($delete) > 0) {
      echo "false";
    } else {
      $book->deleteCategory($param);
      echo "true";
    }
  }

  public function listBook($categoryId, $keySearch) 
  {
    include "../../models/Book.php";
    $books = new Book();
    $data = $books->books($categoryId, $keySearch);
    if (mysqli_num_rows($data) > 0) {
      return mysqli_fetch_all($data);
    }
    return null;
  }

  public function deleteBook($param)
  {
    include "models/Book.php";
    $book = new Book();
    $delete = $book->checkBook($param);
    if (mysqli_num_rows($delete) > 0) {
      echo "false";
    } else {
      $book->deleteBook($param);
      echo "true";
    }
  }

  public function addBook($param)
  {
    include "models/Book.php";
    $books = new Book();
    $store = $books->store($param);
    if ($store) {
      // Add book success
      header("Location: /views/admin/bookDetail.php?category=" . $param['category']);
    }
    return null;
  }

  public function find($bookId)
  {
    $books = new Book();
    $book = $books->find($bookId);
    return mysqli_fetch_all($book);
  }

  public function editBook($param)
  {
    include "models/Book.php";
    $books = new Book();
    $update = $books->update($param);
    if ($update) {
      // Add book success
      header("Location: /views/admin/editBook.php?book_id=" . $param['id']);
    }
    return null;
  }

  public function dashboard()
  {
    include "../../models/Book.php";
    $books = new Book();
    $data["ordering"] = mysqli_num_rows($books->statisticOrdering());
    $data["ordered"] = mysqli_num_rows($books->statisticOrdered());
    $data["confirm"] = mysqli_num_rows($books->statisticConfirm());
    $data["list_book"] = mysqli_fetch_all($books->listBook());
    return $data;
  }
}