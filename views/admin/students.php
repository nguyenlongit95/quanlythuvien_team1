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
include "../../controllers/StudentController.php";
$students = new StudentController();
$data = null;
$param = $_GET;
if (isset($param['key-search'])) {
  $data = $students->students($param['key-search']);
} else {
  $data = $students->students();
}
?>

<div class="content-wrapper">
  <div class="content-header">
  <form action="" method="GET">
    <div class="row">
      <input type="text" name="key-search" placeholder="Tên sinh viên" value="<?php if (isset($param['key-search'])) { echo $param['key-search']; } ?>" class="form-control w-320">
      <button class="btn btn-primary">Tìm kiếm</button>
    </div>
  </form>
  <div class="col-md-12">
    <table class="table table-bordered table-hover">
      <thead>
        <th>
          <td>Tên sinh viên</td>
          <td>Sách đang mượn</td>
          <td> </td>
        </th>
      </thead>
      <tbody>
      <?php 
        if ($data == null) {
          echo "Không có dữ liệu";
        } else { 
          foreach ($data as $key=> $value) {
      ?>
        <tr>
          <td><?php echo $value["id"]; ?></td>
          <td><?php echo $value["username"]; ?></td>
          <td><?php echo !is_null($value["order_status"]) ? $value["order_status"] : 0; ?></td>
          <td><a href="/views/admin/edit_student.php?student_id=<?php echo $value["id"]; ?>" class="btn btn-primary">Chi tiết</a></td>
        </tr>
      <?php 
          } 
        } 
      ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>