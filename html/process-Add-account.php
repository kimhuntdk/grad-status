
<?php 
require_once( "./db_connect.php" );
$mysqli = connect();


?>

<?php 
 $status=$_POST['selectTypeSta'];
 $idStudent = $_POST['idStudent']; 
 $firstName = $_POST['firstName'];    
 $lastName = $_POST['lastName'];  
 $yearStudy = $_POST['yearStudy'];
 $term = $_POST['term'];
 $levels =$_POST['levels'];
 $faculty =$_POST['Faculty'];
 $major =$_POST['Major'] ; 
 $feeTotal =$_POST['feeTotal'] ;
 $feePerTerm =$_POST['feePerTerm'] ;
 $toPay =$_POST['topay'] ;
 $paid =$_POST['paid'] ;
 $reportStatus =$_POST['reportStatus'] ;
 $pay =$_POST['pay'] ;
 $nationality =$_POST['nationality'] ; 
 $idCard =$_POST['idCard'] ; 
 $idPassport =$_POST['idPassport'] ; 
 $aviser =$_POST['aviser'] ;
 
$sql ="INSERT INTO status_student (s_std,s_status,s_name,s_surname,
 s_year,s_term,s_faculty,s_major,s_level,s_fee_total,s_fee_per_term,s_to_pay,s_paid,
 s_report_status,s_pay,s_nationality,s_id_card,s_passport) VALUES ('$idStudent','$status','$firstName','$lastName','$yearStudy',
 '$term','$faculty','$major','$levels','$feeTotal','$feePerTerm','$toPay','$paid','$reportStatus','$pay','$nationality','$idCard',
 '$idPassport')";
 echo $sql;
//  $rs = $mysqli->query( $sql );
if ($mysqli->query($sql)) {
  // echo "seccess";
  echo '<script>alert("บันทึกการเพิ่มข้อมูลแล้ว");window.location="./pages-account-settings-accountAdd.php";</script>';
}
else {
  echo "error";
  echo '<script>alert("พบข้อผิดพลาด!!");window.location="./pages-account-settings-accountEdit copy.php?s_id=' . $idStudent . '";</script>';
}


// if ($objQuery) {
//   // echo "บันทึกการแก้ไขแล้ว";
//     echo '<script>alert("บันทึกการเพิ่มข้อมูลแล้ว");window.location="./pages-account-settings-accountAdd.html";</script>';
// } else {
//     echo '<script>alert("พบข้อผิดพลาด!!");window.location="./pages-account-settings-accountEdit copy.php?s_id=' . $idStudent . '";</script>';
// }
?>

