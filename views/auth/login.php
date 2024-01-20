<?php 
include "../layouts/header.php";
?>
  <style>
    #login-frame {
      margin: 0 auto;
      border: 1px solid #0000005c;
      margin-top: 10%;
    }
    .error {
      color: red;
    }
  </style>
  <div class="col-md-3" id="login-frame">
  <?php 
  include "../layouts/alert.php";
  ?>
    <form action="/index.php?page=post_login" method="POST" id="login-form">
      <div class="form-group">
        <label for="username">Username <span class="text-danger">*</span></label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control" id="password" placeholder="password">
      </div>
      <div class="form-group text-right">
        <input type="submit" class="btn btn-primary" value="Login">
      </div>
      <div class="form-group text-center">
        Click <a href="#">here</a> go to register page
      </div>
    </form>
  </div>
<?php 
include "../layouts/footer.php";
?>
<script>
  $("#login-form").validate({
    rules: {
      "username": {
        required: true,
        minlength: 3,
        maxlength: 255
      },
      "password": {
        required: true,
        minlength: 3,
        maxlength: 255
      }
    }
  });
</script>