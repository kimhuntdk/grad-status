
<?php 
// require_once( "dbconnect.php" );
require_once( "./db_connect.php" );
$mysqli = connect();

?>

<?php 
$sql = "DELETE FROM status_student WHERE s_id = '".$_GET["s_id"]."' " ; 

$objQuery = $mysqli->query($sql);
if($objQuery)
{
// echo "Record Deleted.";
echo '<script>alert("ต้องการลบข้อมูลหรือไม่");window.location="./page-report-account.php";</script>';
}
else
{
echo "Error Delete [".$strSQL."]";
}
mysqli_close($mysqli);
?>

