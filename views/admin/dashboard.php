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
$resData = $books->dashboard();
?>
  <div class="content-wrapper">
  <div class="col-md-12 row">
    <div class="col-md-4">
      <div class="col-md-12 bg-primary box-dashboard">
      <p>Số sách đang mượn: <?php echo $resData['ordering']; ?></p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-12 bg-primary box-dashboard">
      <p>Sách đã trả: <?php echo $resData['ordered']; ?></p> 
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-12 bg-primary box-dashboard">
      <p>Số lượng chờ duyệt: <?php echo $resData['confirm']; ?></p> 
      </div>
    </div>
  </div>
  <div class="col-md-12 row">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <td>#</td>
          <td>Tên sách</td>
          <td>Số lượng</td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <?php 
        if (count($resData["list_book"]) > 0 ) { 
          for ($i = 0; $i < count($resData["list_book"]); $i++) {
        ?>
        <tr>
          <td><?php echo $resData["list_book"][$i][0]; ?></td>
          <td><?php echo $resData["list_book"][$i][1]; ?></td>
          <td><?php echo $resData["list_book"][$i][3]; ?></td>
          <td>
            <a
            class="btn btn-primary"
            href="/views/admin/editBook.php?book_id=<?php echo $resData["list_book"][$i][0]; ?>"
            >
            Chi tiết
            </a>
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