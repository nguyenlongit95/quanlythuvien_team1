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
$categories = $books->categories();
$category = isset($_GET['category']) ? $_GET['category'] : null;
?>

<div class="content-wrapper">
  <div class="col-md-12">
    <form action="/index.php?page=add_book" method="post">
      <div class="form-group">
        <label for="name">Tên sách (<span class="text-danger">*</span>)</label>
        <input type="text" required name="name" id="name" class="form-control" placeholder="Tên sách">
      </div>
      <div class="form-group">
        <label for="category">Danh mục (<span class="text-danger">*</span>)</label>
        <select name="category" id="category" class="form-control">
          <?php 
          for ($i = 0; $i < count($categories); $i++) {
          ?>
            <option <?php if($categories[$i][0] == $category) { echo "selected";} ?> value="<?php echo $categories[$i][0]; ?>">
              <?php echo $categories[$i][1]; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="qty">Số lượng (<span class="text-danger">*</span>)</label>
        <input type="number" required class="form-control" id="qty" name="qty" value="1" min="0">
      </div>
      <div class="form-group">
        <label for="price">Giá (<span class="text-danger">vnđ</span>)</label>
        <input type="number" required class="form-control" id="price" name="price" value="1" min="0">
      </div>
      <div class="form-group">
        <label for="info">Thông tin (<span class="text-danger">*</span>)</label>
        <textarea name="info" required class="form-control" id="info" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group text-right">
        <button class="btn btn-primary" type="submit">Thêm mới</button>
      </div>
    </form>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>

<script>
</script>