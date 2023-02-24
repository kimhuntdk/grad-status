
<?php 
// require_once( "dbconnect.php" );
require_once( "../inc/db_connect.php" );
$mysqli = connect();

?>

<?php 
 $id="2";
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
 
$sql ="UPDATE status_student SET
    s_id ='$id',
    s_std = '$idStudent',
    s_status='$status',
    s_name='$firstName',
    s_surname='$lastName',
    s_year='$yearStudy',
    s_term='$term',
    s_faculty='$faculty',
    s_major='$major',
    s_level='$levels',
    s_fee_total='$feeTotal',
    s_fee_per_term='$feePerTerm',
    s_to_pay='$paid',
    s_paid='$paid',
    s_report_status='$reportStatus',
    s_pay='$pay',
    s_nationality='$nationality',
    s_id_card='$idCard',
    s_passport='$idPassport'
    WHERE s_id = '$id' " ;
echo $sql;
// $rs = $mysqli->query($conn,$sql );
if ($mysqli->query($sql)) {
  echo "seccess";
  
}
else {
  echo "error";
}

$objQuery = mysqli_query($mysqli, $sql);

if ($objQuery) {
  echo "บันทึกการแก้ไขแล้ว";
    // echo '<script>alert("บันทึกการแก้ไขแล้ว");window.location="./pages-account-settings-accountEdit.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="./pages-account-settings-accountEdit copy.php?s_id=' . $idStudent . '";</script>';
}

// if (!is_array($row1["s_id"])) {
  
  

//   $sql ="UPDATE status_student SET 
//         s_id = '$idStudent',
//         s_status='$status',
//         s_name='$firstName',
//         s_surname='$lastName',
//         s_year='$yearStudy',
//         s_term='$term',
//         s_faculty='$faculty',
//         s_major='$major',
//         s_level='$levels',
//         s_fee_total='$feeTotal',
//         s_fee_per_term='$feePerTerm',
//         s_to_pay='$paid',
//         s_paid='$paid',
//         s_report_status='$reportStatus',
//         s_pay='$pay',
//         s_nationality='$nationality',
//         s_id_card='$idCard',
//         s_passport='$idPassport'
//   WHERE s_id = '$idStudent' " ;
// } else {
//   $sql ="UPDATE status_student SET 
//         s_id = '$idStudent',
//         s_status='$status',
//         s_name='$firstName',
//         s_surname='$lastName',
//         s_year='$yearStudy',
//         s_term='$term',
//         s_faculty='$faculty',
//         s_major='$major',
//         s_level='$levels',
//         s_fee_total='$feeTotal',
//         s_fee_per_term='$feePerTerm',
//         s_to_pay='$paid',
//         s_paid='$paid',
//         s_report_status='$reportStatus',
//         s_pay='$pay',
//         s_nationality='$nationality',
//         s_id_card='$idCard',
//         s_passport='$idPassport'
//   WHERE s_id = '$idStudent' " ;
// }

// $objQuery = mysqli_query($mysqli, $strSQL);
// if ($objQuery) {
//   echo '<script>alert("บันทึกการแก้ไขแล้ว");window.location="./pages-account-settings-accountEdit.php.php";</script>';
// } else {
//   echo '<script>alert("พบข้อผิดพลาด!!");window.location="./pages-account-settings-accountEdit copy.php.php?s_id=' . $idStudent. '";</script>';
// }
?>

