<?php
session_start();
require_once("../inc/db_connect.php");
require_once('../SendGmailSMTP/PHPMailer/PHPMailerAutoload.php');
$mysqli = connect();

if ($_POST['cal_id']!='') {
   $cal_type = $_POST['cal_type'];
   $cal_name = $_POST['cal_name'];
   $cal_date_start = $_POST['cal_date_start'];
   $cal_date_end = $_POST['cal_date_end'];
   $id = $_POST['cal_id'];
   if($cal_type!='' and $cal_name!='' and $cal_date_start!=''){
     $sql = "UPDATE info_calendar SET  cal_name = '$cal_name', cal_date_start = '$cal_date_start', cal_date_end = '$cal_date_end', cal_type_id = ' $cal_type',cal_modifly=Now() WHERE info_calendar.cal_id=".$id;
     $rs = $mysqli->query($sql);
     if($rs){
        echo 0;
     }else{
        echo 1;
     }
   }
   





}else{
    echo 5;
}
?>