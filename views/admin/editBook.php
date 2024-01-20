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
$book = $books->find($_GET['book_id']);
?>

<div class="content-wrapper">
  <div class="col-md-12">
    <form action="/index.php?page=edit_book" method="post">
      <input type="hidden" name="id" value="<?php echo $book[0][0]; ?>">
      <div class="form-group">
        <label for="name">Tên sách (<span class="text-danger">*</span>)</label>
        <input type="text" required name="name" id="name" class="form-control" value="<?php echo $book[0][1]; ?>">
      </div>
      <div class="form-group">
        <label for="category">Danh mục (<span class="text-danger">*</span>)</label>
        <select name="category" id="category" class="form-control">
          <?php 
          for ($i = 0; $i < count($categories); $i++) {
          ?>
            <option <?php if($categories[$i][0] == $book[0][2]) { echo "selected";} ?> value="<?php echo $categories[$i][0]; ?>">
              <?php echo $categories[$i][1]; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="qty">Số lượng (<span class="text-danger">*</span>)</label>
        <input type="number" required class="form-control" id="qty" name="qty" value="<?php echo $book[0][3]; ?>" min="0">
      </div>
      <div class="form-group">
        <label for="price">Giá (<span class="text-danger">vnđ</span>)</label>
        <input type="number" required class="form-control" id="price" name="price" value="<?php echo $book[0][5]; ?>" min="0">
      </div>
      <div class="form-group">
        <label for="info">Thông tin (<span class="text-danger">*</span>)</label>
        <textarea name="info" required class="form-control" id="info" cols="30" rows="10"><?php echo $book[0][4]; ?></textarea>
      </div>
      <div class="form-group text-right">
        <button class="btn btn-primary" type="submit">Cập nhật</button>
      </div>
    </form>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>

<script>
</script>