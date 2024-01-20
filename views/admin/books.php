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
$category = new BookController();
$data = $category->categories();
?>

<div class="content-wrapper">
  <div class="col-md-12">
    <table class="table table-bordered table-hover">
      <thead>
        <th>
          <td>Tên danh mục</td>
          <td></td>
        </th>
      </thead>
      <tbody>
      <?php 
        if (count($data) > 0) { 
          for ($i = 0; $i < count($data); $i++) {
      ?>
      <form action="/index.php?page=update_category" method="post">
        <input type="hidden" name="_id" value="<?php echo $data[$i][0];?>">
        <tr>
          <td><?php echo $data[$i][0];?></td>
          <td class="position-relative">
            <input type="text" required name="name" value="<?php echo $data[$i][1]; ?>" class="form-control">
            <button type="submit" class="icon-upadte"><i class="fa fa-pen"></i></button>
          </td>
          <td>
            <a href="/views/admin/bookDetail.php?category=<?php echo $data[$i][0]; ?>" class="btn btn-primary">Chi tiết</a>
            <a href="#" onclick="deleteCategory(<?php echo $data[$i][0]; ?>)" class="btn btn-danger">Xóa</a>
          </td>
        </tr>
      </form>
      <?php 
          }
        }
      ?>
      <form action="/index.php?page=insert_category" method="post">
      <tr>
        <td>+</td>
        <td><input required type="text" class="form-control" name="name" placeholder="Thêm mới danh mục"></td>
        <td><button type="submit" class="btn btn-primary">Thêm mới</button></td>
      </tr>
      </form>
      </tbody>
    </table>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>

<script>
  function deleteCategory(id) {
    $.ajax({
      url: "/index.php?page=delete_category",
      type: "GET",
      data: {
        id: id
      }, 
      success: function (response) {
        if (response == "false") {
          alert("Danh mục này đã có sách và không thể xóa!");
        } else {
          window.location.reload();
        }
      }
    });
  }
</script>