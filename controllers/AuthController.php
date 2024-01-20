<?php 

include "models/User.php";

class AuthController
{
  /**
   * Controller method post register and call to model
   * 
   * @param username, password, repassword
   * @return boolean
   */
  public function postRegister($param)
  {
    // Check username alrealy
    $user = new User();
    $checkUsername = $user->checkUsername($param['username']);
    $data = mysqli_fetch_all($checkUsername);
    session_start();
    if (empty($data)) {
      /* 
       * Username passed
       * Check password and re password
       */
      if ($param['password'] !== $param['re_password']) {
        $_SESSION['msg_error'] = "Password and re password failed!";
        return header("Location: /views/auth/register.php");
      }
      // Insert into database and redirect to login page
      $user->store($param['username'], $param['password']);
      $_SESSION['msg_success'] = "Register success, please login to system!";
      return header("Location: /views/auth/login.php");
    } else {
      $_SESSION['msg_error'] = "Username alreadly exist please login to system!";
      // Username alreadly exis't redirect to login page
      return header("Location: /views/auth/login.php");
    }
  }

  /**
   * Controller method post login
   * 
   * @param username, password
   * @return redirect
   */
  public function postLogin($param)
  {
    $user = new User();
    $checkLogin = $user->checkLogin($param['username'], $param['password']);
    $data = mysqli_fetch_all($checkLogin);
    session_start();
    if (empty($data)) {
      // Login failed, please check again
      $_SESSION['msg_error'] = "Username or password incorrect, please check again!";
      return header("Location: /views/auth/login.php");
    }
    $_SESSION['user_login'] = $data;
    if ($data[0][3] == 0) {
      // Redirect to student page
      return header("Location: /views/student/category.php");
    }
    if ($data[0][3] == 1) {
      // Redirect to admin page
      return header("Location: /views/admin/dashboard.php");
    }
  }
}