
<?php 
// require_once( "dbconnect.php" );
require_once( "./db_connect.php" );
$mysqli = connect();

?>

<?php 
// $strSQL = "UPDATE status_student SET ";
// $strSQL .="idStudent = '".$_POST["idStudent"]."' ";
// $strSQL .=",firstName = '".$_POST["firstName"]."' ";
// $strSQL .=",Email = '".$_POST["lastName"]."' ";
// $strSQL .=",lastName = '".$_POST["yearStudy"]."' ";
// $strSQL .=",term = '".$_POST["term"]."' ";
// $strSQL .=",levels = '".$_POST["levels"]."' ";
// $strSQL .=",Faculty = '".$_POST["Faculty"]."' ";
// $strSQL .=",Major = '".$_POST["Major"]."' ";
// $strSQL .=",feeTotal = '".$_POST["feeTotal"]."' ";
// $strSQL .=",feePerTerm = '".$_POST["feePerTerm"]."' ";
// $strSQL .=",topay = '".$_POST["topay"]."' ";
// $strSQL .=",paid = '".$_POST["paid"]."' ";
// $strSQL .=",reportStatus = '".$_POST["reportStatus"]."' ";
// $strSQL .=",pay = '".$_POST["pay"]."' ";
// $strSQL .=",nationality = '".$_POST["nationality"]."' ";
// $strSQL .=",idCard = '".$_POST["idCard"]."' ";
// $strSQL .=",idPassport = '".$_POST["idPassport"]."' ";
// $strSQL .=",aviser = '".$_POST["aviser"]."' ";
// $strSQL .="WHERE s_id = '".$_GET["s_id "]."' ";
// $objQuery = mysqli_query($strSQL); 

// $sql = "UPDATE status_student SET "
// . "	s_std =  ".$_POST["idStudent"]."' "
// . "	s_name = ".$_POST["firstName"]."' "
// . "	s_surname = ".$_POST["lastName"]."' "
// . "	s_year = ".$_POST["yearStudy"]."' "
// . "	s_term =  ".$_POST["term"]."' "
// . "	s_level = ".$_POST["levels"]."' "
// . "	s_faculty = ".$_POST["Faculty"]."' "
// . "	s_major = ".$_POST["Major"]."' "
// . "	s_fee_total = ".$_POST["feeTotal"]."' "
// . "	s_fee_per_term = ".$_POST["feePerTerm"]."' "
// . "	s_to_pay = ".$_POST["topay"]."' "
// . "	s_paid = ".$_POST["paid"]."' "
// . "	s_report_status = ".$_POST["reportStatus"]."' "
// . "	s_pay = ".$_POST["pay"]."' "
// . "	s_nationality = ".$_POST["nationality"]."' "
// . "	s_id_card = ".$_POST["idCard"]."' "
// . "	s_nationality = ".$_POST["nationality"]."' "
// . "	s_passport = ".$_POST["idPassport"]."' "
// . "	WHERE s_id = ". $_GET['s_id'];

 $status=$_POST['selectTypeSta'];
 $idStudent = $_POST['idStudent']; 
 $firstName = $_POST['firstName'];    
 $lastName = $_POST['lastName'];  
 $yearStudy = $_POST['yearStudy'];
 $term = $_POST['term'];
 $levels =$_POST['levels'];
 $faculty =$_POST['Faculty'];
 $major =$_POST['Major'] ; 
//  $feeTotal =$_POST['feeTotal'] ;
//  $feePerTerm =$_POST['feePerTerm'] ;
//  $toPay =$_POST['topay'] ;
//  $paid =$_POST['paid'] ;
 $reportStatus =$_POST['reportStatus'] ;
 $pay =$_POST['pay'] ;
 $nationality =$_POST['nationality'] ; 
 $idCard =$_POST['idCard'] ; 
 $idPassport =$_POST['idPassport'] ; 
 $aviser =$_POST['aviser'] ;

 
$sql ="UPDATE student_info SET
    
    stu_id = '$idStudent',
    -- s_status='$status',
    STUDENTNAME='$firstName',
    STUDENTSURNAME='$lastName',
    ADMITACADYEAR='$yearStudy',
    ADMITSEMESTER='$term',
    FACULTYNAME='$faculty',
    PROGRAMNAME='$major',
    LEVELID='$levels',
    -- s_fee_total='$feeTotal',
    -- s_fee_per_term='$feePerTerm',
    -- s_to_pay='$paid',
    -- s_paid='$paid',
    STATUSREGIST='$reportStatus',
    STATUSPAYMENT='$pay',
    NATIONNAMETH='$nationality',
    CITIZENID='$idCard',
    -- s_passport='$idPassport'
    WHERE stu_id = '".$_GET["stu_id"]."' " ;
// echo $sql;
$objQuery = $mysqli->query($sql);
if($objQuery)
{
// echo "Save Done.";
echo '<script>alert("บันทึกการแก้ไขแล้ว");window.location="./page-report-account.php";</script>';
}
else
{
echo "Error Save [".$sql."]";
}
mysqli_close($mysqli);
// $objQuery = $mysqli->query( $sql);
// if ($objQuery) {
//   echo "seccess";
  // echo '<script>alert("บันทึกการแก้ไขแล้ว");window.location="./pages-account-settings-accountEdit.php";</script>';
// }
// else {
//   echo "error";
//   // echo '<script>alert("พบข้อผิดพลาด!!");window.location="./process-Edit-account.php?s_id=' . $idStudent . '";</script>';
// }

// $objQuery = mysqli_query($mysqli, $sql);

// if ($objQuery) {
//   echo "บันทึกการแก้ไขแล้ว";
//     echo '<script>alert("บันทึกการแก้ไขแล้ว");window.location="./pages-account-settings-accountEdit.php";</script>';
// } else {
//     echo '<script>alert("พบข้อผิดพลาด!!");window.location="./pages-account-settings-accountEdit copy.php?s_id=' . $idStudent . '";</script>';
// }

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

