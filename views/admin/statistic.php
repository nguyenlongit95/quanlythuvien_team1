<?php 
include "../layouts/header.php";
?>

<?php 
include "../layouts/alert.php";
?>

<?php 
include "../layouts/main-header.php";
?>

<?php 
include "../layouts/main-sidebar.php";
?>

<?php 
include "../../controllers/BookController.php";
$books = new BookController();
?>

<div class="content-wrapper">
  <div class="col-md-12">
    <div class="col-md-4">
    Số sách đang mượn:
    </div>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>

<script>
</script>