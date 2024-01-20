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
$categoryId = $_GET['category'];
$data = null;
if (isset($_GET['key-search'])) {
  $data = $books->listBook($categoryId, $_GET['key-search']);
} else {
  $data = $books->listBook($categoryId, null);
}
?>

<div class="content-wrapper">
  <form action="" method="GET">
    <div class="row">
      <input type="hidden" name="category" value="<?php echo $categoryId; ?>">
      <input type="text" name="key-search" placeholder="Tên sách" value="<?php if (isset($_GET['key-search'])) { echo $_GET['key-search']; } ?>" class="form-control w-320">
      &nbsp;<button class="btn btn-primary">Tìm kiếm</button>
      &nbsp;<a href="/views/admin/addBook.php?category=<?php echo $_GET['category']; ?>" class="btn btn-primary">Thêm mới</a>
    </div>
  </form>
  <div class="col-md-12">
    <table class="table table-bordered table-hover">
      <thead>
        <th>
          <td>#</td>
          <td>Tên sách</td>
          <td></td>
        </th>
      </thead>
      <tbody>
        <?php if (!is_null($data)) {
          for ($i = 0; $i < count($data); $i++) {
            ?>
        <tr>
          <td><?php echo $data[$i][0]; ?></td>
          <td><?php echo $data[$i][1]; ?></td>
          <td>
            <a href="/views/admin/editBook.php?book_id=<?php echo $data[$i][0]; ?>" class="btn btn-primary">Chi tiết</a>
            <a href="#" onclick="deleteBook(<?php echo $data[$i][0]; ?>)" class="btn btn-danger">Xóa</a>
          </td>
        </tr>
        <?php 
          }
        }?>
      </tbody>
    </table>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>

<script>
function deleteBook(_id) {
  $.ajax({
    url: '/index.php?page=delete_book',
    type: 'GET',
    data: {
      _id: _id
    },
    success: function (response) {
      if (response == "false") {
        alert("Sách này không thể xóa!");
      } else {
        window.location.reload();
      }
    }
  });
}
</script>