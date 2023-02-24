<?php 
include 'dbconnect.php';

?>
<?php

 $fristname = $_POST['fristname'];
 $lastname =$_POST['lastname'];
$sql="INSERT INTO addmember (fristname,lastname) VALUES('$fristname','$lastname')";
//$sql="UPDATE addmember (fristname,lastname) VALUES('$fristname','$lastname')";


if ($conn->query($sql)== TRUE) {
    echo "seccess";
}
?>