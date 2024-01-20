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
include "../layouts/main-sidebar-student.php";
?>

<?php 
include "../../controllers/BookController.php";
$books = new BookController();
$categories = $books->categories();
?>
<div class="content-wrapper">
  <div class="col-md-12">
    <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <td>#</td>
        <td>Tên đầu mục</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
    <?php 
      if (count($categories) > 0) {
        for ($i = 0; $i < count($categories); $i++) {
    ?>
      <tr>
        <td><?php echo $categories[$i][0]; ?></td>
        <td><?php echo $categories[$i][1]; ?></td>
        <td>
          <a 
          class="btn btn-primary"
          href="/views/student/detail-category.php?category_id=<?php echo $categories[$i][0]; ?>"
          >Chi tiết</a>
        </td>
      </tr>
      <?php 
        }
      }
    ?>
    </tbody>
    </table>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>