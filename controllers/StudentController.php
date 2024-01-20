<?php

include "../../models/User.php";

class StudentController 
{
  /**
   * Controller function list all student and parse data
   * 
   * @param $keySearch|null
   * @return array|null
   */
  public function students($keySearch = null) 
  {
    $students = new User();
    $result = $students->students($keySearch);
    if (mysqli_num_rows($result) == 0) {
      return null;
    }
    $resultData = mysqli_fetch_all($result);
    $resData = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
      $orderStatus = 0;
      for ($j = 0; $j < mysqli_num_rows($result); $j++) {
        if ($resultData[$i][0] == $resultData[$j][0] && $resultData[$j][2] == 1) {
          $orderStatus++;
        }
      }
      $resData[] = [
        "id" => $resultData[$i][0],
        "username" => $resultData[$i][1],
        "order_status" => $orderStatus
      ];
    }
    return $this->unique_multidim_array($resData, "id");
  }

  /**
   * Private method check duplicate value in array
   * 
   * @param $array, $key
   * @return array
   */
  private function unique_multidim_array($array, $key) 
  {
    $temp_array = array();
    $i = 0;
    $key_array = array();
    foreach ($array as $val) {
      if (!in_array($val[$key], $key_array)) {
        $key_array[$i] = $val[$key];
        $temp_array[$i] = $val;
      }
      $i++;
    }
    return $temp_array;
  }

  /**
   * Controller find a student
   * 
   * @param $studentId id of student
   * @return data
   */
  public function find($studentId)
  {
    $student = new User();
    $data = $student->find($studentId);
    if (mysqli_num_rows($data) > 0) {
      $resData = mysqli_fetch_all($data);
      return $resData;
    }
    return null;
  }
}