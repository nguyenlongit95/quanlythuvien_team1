<?php
/**
 * Router and redirect page
 */
$page = $_GET['page'];
if (!isset($_GET['page'])) {
  return header("Location: /views/auth/login.php");
}
switch ($page) {
  case "post_register":
    $param = $_POST;
    include "controllers/AuthController.php";
    $auth = new AuthController();
    $postLogin = $auth->postRegister($param);
    break;
  case "post_login":
    $param = $_POST;
    include "controllers/AuthController.php";
    $auth = new AuthController();
    $auth->postLogin($param);
    break;
  case "load-ajax":
    $param = $_GET;
    include "controllers/StudentAPIController.php";
    $getData = new StudentAPIController();
    $resData = $getData->getData($param);
    echo json_encode($resData);
    break;
  case "update_category":
    $param = $_POST;
    include "controllers/BookController.php";
    $updateData = new BookController();
    $update = $updateData->updateCategory($param);
    break;
  case "insert_category":
    $param = $_POST;
    include "controllers/BookController.php";
    $insertData = new BookController();
    $insert = $insertData->insertCategory($param);
    break;
  case "delete_category":
    $param = $_GET;
    include "controllers/BookController.php";
    $deleteData = new BookController();
    $delete = $deleteData->deleteCategory($param);
    break;
  case "delete_book":
    $param = $_GET;
    include "controllers/BookController.php";
    $deleteData = new BookController();
    $delete = $deleteData->deleteBook($param);
    break;
  case "add_book":
    $param = $_POST;
    include "controllers/BookController.php";
    $addBook = new BookController();
    $addBook->addBook($param);
    break;
  case "edit_book":
    $param = $_POST;
    include "controllers/BookController.php";
    $editBook = new BookController();
    $editBook->editBook($param);
    break;
  case "logout":
    session_destroy();
    header("Location: /views/auth/login.php");
    break;
  default:
    echo "404 not found";
    break;
}