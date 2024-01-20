<?php 

include 'models/User.php';

class StudentAPIController 
{
  public function getData($param)
  {
    $data = new User();
    $res = null;
    $resData = $data->order($param['studentId'], $param['param']);
    if (mysqli_num_rows($resData) > 0) {
      $res['code'] = 200;
      foreach (mysqli_fetch_all($resData) as $data) {
        $res["data"][] = [
          "book_id" => $data[0],
          "book_name"=> $data[1]
        ];
      }
      $res['message'] = "success";
    } else {
      $res['code'] = 204;
      $res['data'] = [];
      $res['message'] = "Data not found";
    }
    return $res;
  }
}