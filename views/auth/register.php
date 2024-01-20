<?php 
include "../layouts/header.php";
?>
  <style>
    #register-frame {
      margin: 0 auto;
      border: 1px solid #0000005c;
      margin-top: 10%;
    }
    .error {
      color: red;
    }
  </style>
  <div class="col-md-3" id="register-frame">
  <?php 
  include "../layouts/alert.php";
  ?>
    <form action="/index.php?page=post_register" method="POST" id="register-form">
      <div class="form-group">
        <label for="username">Username <span class="text-danger">*</span></label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control" id="password" placeholder="password">
      </div>
      <div class="form-group">
        <label for="re_password">Re password <span class="text-danger">*</span></label>
        <input type="password" name="re_password" class="form-control" id="re_password" placeholder="re password">
      </div>
      <div class="form-group text-right">
        <input type="submit" class="btn btn-primary" value="Register">
      </div>
      <div class="form-group text-center">
        Click <a href="#">here</a> go to login page
      </div>
    </form>
  </div>
<?php 
include "../layouts/footer.php";
?>
<script>
  $("#register-form").validate({
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
      },
      "re_password": {
        required: true,
        minlength: 3,
        maxlength: 255
      }
    }
  });
</script>