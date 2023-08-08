<?php 
session_start();
session_id();
require_once( "../inc/db_connect.php" );
$mysqli = connect();

$facultyID=$_SESSION['SES_STD_FAC_ID'];

if (!isset($_POST['Submit'])) {
  $status_reserve=1;
  $staffFaculty=1;
}
 

$query = "SELECT * FROM info_reserve_adviser where std_id = '".$_POST['std_id']."'" ;
$result = mysqli_query($mysqli,$query);
$num_check=mysqli_num_rows($result);
$row = $result->fetch_assoc();
if ($num_check >0) {
 
  echo "<script>alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');window.history.back();</script>";
}
else {
 $std_id =$_POST['std_id'];
 $type_ts_is=$_POST['type_ts_is'];
 $id_adviser=$_POST['id_adviser'];
 $th_title = $_POST['th_title']; 
 $en_title = $_POST['en_title'];
 
 $term = $_POST['term'];
 $years =$_POST['years'];


//  $uploaddir = 'fileUpload/';
//  $uploadfiles =$_FILES['certificates']['name'];
// $uploadfile = $_FILES['certificates']['tmp_name'];

// echo '<pre>';
// if (move_uploaded_file($_FILES['certificates']['tmp_name'], 'fileUpload/'.$uploadfiles)) {
//     echo "File is valid, and was successfully uploaded.\n";
// } else {
//     echo "Possible file upload attack!\n";
// }

//echo 'Here is some more debugging info:';
// print_r($_FILES);

// print "</pre>";


$sql ="INSERT INTO info_reserve_adviser (std_id,type_ts_is,id_adviser,th_title,en_title,reserve_date,
 term,years,status_reserve,staffFaculty,facultyID) VALUES ('$std_id','$type_ts_is','$id_adviser','$th_title','$en_title',NOW(),'$term','$years','$status_reserve','$staffFaculty','$facultyID')";
 //echo $sql;
//  $rs = $mysqli->query( $sql );
if ($mysqli->query($sql)) {
  // echo "seccess";
  echo '<script>alert("บันทึกการเพิ่มข้อมูลแล้ว");window.location="./reserv-advisor-forStudent.php";</script>';
}
else {
  //echo "error";
  echo '<script>alert("พบข้อผิดพลาด!!")</script>';
}
}
?>