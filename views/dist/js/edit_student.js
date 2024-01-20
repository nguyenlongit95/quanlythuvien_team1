$(document).ready(function () {
  changeStatus(1);
});

var btnStatus = null;
function changeStatus(status) {
  btnStatus = status;
  changeButton();
}

function changeButton() {
  switch (btnStatus) {
    case 1:
      $('#btn_sachDangMuon').addClass("active");
      $('#btn_sachDaTra').removeClass("active");
      $('#btn_phat').removeClass("active");
      $('#btn_choDuyet').removeClass("active");
      loadData(1);
      break;
    case 2:
      $('#btn_sachDangMuon').removeClass("active");
      $('#btn_sachDaTra').addClass("active");
      $('#btn_phat').removeClass("active");
      $('#btn_choDuyet').removeClass("active");
      loadData(3);
      break;
    case 3:
      $('#btn_sachDangMuon').removeClass("active");
      $('#btn_sachDaTra').removeClass("active");
      $('#btn_phat').addClass("active");
      $('#btn_choDuyet').removeClass("active");
      loadData(0);
      break;
    case 4:
      $('#btn_sachDangMuon').removeClass("active");
      $('#btn_sachDaTra').removeClass("active");
      $('#btn_phat').removeClass("active");
      $('#btn_choDuyet').addClass("active");
      loadData(2);
      break;
  }
}

function loadData(param) {
  let studentId = $("#student_id").val();
  $.ajax({
    url: '/index.php?page=load-ajax',
    type: 'GET',
    data: {
      param: param,
      studentId: studentId
    },
    success: function (response) {
      let data = JSON.parse(response);
      let html = '';
      if (data.code == 200) {
        for (let i = 0; i < data.data.length; i++) {
          html+='<tr>'
            +'<td>'+data.data[i]['book_id']+'</td>'
            +'<td>'+data.data[i]['book_name']+'</td>'
            +'<td>';
            if (param == 1) {
              html+='  <button class="btn btn-primary">Đang mượn</button>';
            } else if (param == 3) {
              html+='  <button class="btn btn-primary">Đã trả</button>';
            } else if (param == 0) {
              html+='  <button class="btn btn-danger">Phạt</button>';
            } else {
              html+='  <button class="btn btn-warning">Đang chờ duyệt</button>';
            }
            html+='</td>'
          +'</tr>';
        }
      } else {
        html = "Không có dữ liệu";
      }
      $('#list_data').html(html);
    }
  });
}