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
$studentId = $param['student_id'];
$student = $students->find($studentId);
?>
<input type="hidden" id="student_id" value="<?php echo $student[0][0]; ?>">
<div class="content-wrapper">
  <div class="content-header">
    <div class="col-md-12">
      <p>Tên: <?php echo $student[0][1]; ?></p>
      <a id="btn_sachDangMuon" onclick="changeStatus(1)" class="btn btn-primary">Sách đang mượn</a>
      <a id="btn_sachDaTra" onclick="changeStatus(2)" class="btn btn-primary">Sách đã trả</a>
      <a id="btn_phat" onclick="changeStatus(3)" class="btn btn-primary">Phạt</a>
      <a id="btn_choDuyet" onclick="changeStatus(4)" class="btn btn-primary">Đang chờ duyệt</a> 
    </div>
    <div class="col-md-12">
      <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <td></td>
          <td>Tên sách</td>
          <td></td>
        </tr>
      </thead>
      <tbody id="list_data">
        
      </tbody>
      </table>
    </div>
  </div>
</div>

<?php 
include "../layouts/footer.php";
?>
<script src="/views/dist/js/edit_student.js"></script>