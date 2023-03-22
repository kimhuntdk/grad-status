<?php
session_start();
require_once("../inc/db_connect.php");
require_once('../SendGmailSMTP/PHPMailer/PHPMailerAutoload.php');
$mysqli = connect();


if (isset($_POST['submit'])) {
   $cal_type = $_POST['cal_type'];
   $cal_name = $_POST['cal_name'];
   $cal_date_start = $_POST['cal_date_start'];
   $cal_date_end = $_POST['cal_date_end'];

   if($cal_type!='' and $cal_name!='' and $cal_date_start!=''){
     $sql = "INSERT INTO info_calendar (cal_id, faculty, cal_name, cal_date_start, cal_date_end, cal_type, cal_modifly) VALUES (NULL, '0','$cal_name','$cal_date_start', '$cal_date_end' , '$cal_type', Now())";
     $rs = $mysqli->query($sql);
     if($rs){
        echo 0;
     }
   }
   





}
?>