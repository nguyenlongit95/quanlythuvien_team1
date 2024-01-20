<label for="" class="text-danger">
  <?php
    session_start();
    if (isset($_SESSION['msg_error'])) {
      echo $_SESSION['msg_error'];
      session_destroy();
    }
  ?>
</label>
<label for="" class="text-success">
  <?php
    if (isset($_SESSION['msg_success'])) {
      echo $_SESSION['msg_success'];
      session_destroy();
    }
  ?>
</label>