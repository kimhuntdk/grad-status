<?php
session_start();
require_once("../inc/db_connect.php");
$mysqli = connect();


if(isset($_POST['submit'])){
   $t2_id = $_POST['t2_id'];
   $rusultTest = $_POST['rusultTest'];
   $file_t2 = $_POST['file_t2'];
   $file_submit = $_POST['file_submit'];
   $title_page = $_POST['title_page'];
   $cover = $_POST['cover'];
   $approval_page = $_POST['approval_page'];
   $abstract_th_en = $_POST['abstract_th_en'];
   $table_contents = $_POST['table_contents'];
   $vita = $_POST['vita'];
   $bibliography = $_POST['bibliography'];
   $other_message = $_POST['other_message'];
   $mes_file_t2 = $_POST['mes_file_t2'];
   $mes_file_submit = $_POST['mes_file_submit'];
   $mes_cover = $_POST['mes_cover'];
   $mes_title_page = $_POST['mes_title_page'];
   $mes_approval_page = $_POST['mes_approval_page'];
   $mes_abstract = $_POST['mes_abstract'];
   $mes_table_contents = $_POST['mes_table_contents'];
   $mes_vita = $_POST['mes_vita'];
   $mes_bibliography = $_POST['mes_bibliography'];

   if($t2_id!=''){ 
       $sql = "UPDATE info_t2_check SET rusultTest = '$rusultTest', cover = '$cover', file_t2 = '$file_t2 ', file_submit = '$file_submit', title_page = '$title_page', approval_page = '$approval_page', abstract_th_en = '$abstract_th_en', table_contents = '$table_contents', vita = '$vita', bibliography = '$bibliography', mes_file_t2 = '$mes_file_t2', mes_file_submit = '$mes_file_submit', mes_cover = '$mes_cover', mes_title_page = '$mes_title_page', mes_approval_page = '$mes_approval_page', mes_abstract = '$mes_abstract', mes_table_contents = '$mes_table_contents', mes_vita = '$mes_vita', mes_bibliography = '$mes_bibliography', other_message = '$other_message' WHERE t2_id=".$t2_id;
       $rs= $mysqli->query($sql);
      if($rs){
         echo "OK";
         //ส่งเมลหานิสิต
      }else{
         echo "NO";
         // ส่งเมลหานิสิต
      }
   }



}
?>