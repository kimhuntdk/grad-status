<?php
require_once ("../inc/db_connect.php");  
$mysqli =connect();


if(isset($_POST["id_adviser"]))  
{
    $output = '';

    require_once ("../inc/db_connect.php");  
    $mysqli =connect();
    $query = "SELECT * FROM  info_advisor_basicprofile WHERE advisor_profile_id = '".$_POST["id_adviser"]."'";  
    $result = mysqli_query($mysqli, $query); 


    


    $output .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result))  
    {  
     
      
         $output .= ' 
               <label for="">รหัสอาจารย์</label><br>
               <input class="form-control" type="text" name="advisor_profile_id" id="advisor_profile_id" value='.$row["advisor_profile_id"].' readonly><br>
               <label for="">ชื่ออาจารย์</label><br>
               <input class="form-control" type="text" name="advisor_profile_id" id="advisor_profile_id" value='.$row["advisor_firstname_th"].' readonly><br>
               <label for="">นามสกุลอาจารย์</label><br>
               <input class="form-control" type="text" name="advisor_profile_id" id="advisor_profile_id" value='.$row["advisor_lastname_th"].' readonly>
               
              
               
              ';  
    }  
    $output .= "</table></div>";  
    echo $output; 
    $q1 = "SELECT * FROM   info_reserve_adviser WHERE  status_Advisor = 1 And status_reserve = 2 And  id_adviser = '".$_POST["id_adviser"]."'";
    $r1 = $mysqli->query($q1);
    $num_check = $r1->num_rows;
     echo "* รับได้= 10 คน นิสิตที่ดูแล= ".$num_check." คงเหลือ= ".(10-$num_check)."*"; 

}elseif (!isset($_POST['hidden'])) {
$status_Advisor =1;
$status_reserve = $_POST['status_reserve'];
$co_advisor1 = $_POST['co_advisor1'];
$co_advisor2 = $_POST['co_advisor2'];

$sql = "UPDATE  info_reserve_adviser SET 
status_Advisor='$status_Advisor',
status_reserve='$status_reserve',
co_advisor1='$co_advisor1',
approval_date=NOW(),
co_advisor2='$co_advisor2'
WHERE r_id = '".$_POST["r_id"]."' " ;
// echo $sql;
$objQuery = $mysqli->query($sql);
if($objQuery)
{
// echo "Save Done.";
echo '<script>window.location="./appove-reserv-advisor.php";</script>';
}
else
{
echo "Error Save [".$sql."]";
}
mysqli_close($mysqli);
}

?>