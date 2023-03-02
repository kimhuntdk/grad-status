<?php
@ob_start();
@session_start();
date_default_timezone_set( "Asia/Bangkok" );
require_once( "../inc/db_connect.php" );
$mysqli = connect();
/* Getting file name */
$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
$numrand = (mt_rand());
echo $std_id = $_SESSION['SES_EN_REG_USER'];
echo $type_thesis_is = $_POST['type_thesis_is'];
echo $type_file_url = $_POST['type_file_url'];
if($type_file_url==1){
    $typeThesis = strrchr($_FILES['FileThesis']['name'],".");
}else if($type_file_url==2){
    $urlThesis = $_POST['urlThesis'];
}
$type = strrchr($_FILES['FileT2']['name'],".");
$typeSubmit = strrchr($_FILES['FileSubmit']['name'],".");
if(isset($_POST['submit'])){
    echo 55;
if($typeThesis!=''){
if($typeThesis == "png" || $typeThesis == "PNG" || $typeThesis == "PNG" || $typeThesis == "jpg" || $typeThesis == "jpeg"  || $typeThesis == "JPG" || $typeThesis == "docx" || $typeThesis == "DOCX" || $typeThesis == "doc" || $typeThesis == "DOC" || $typeThesis == "pdf" || $typeThesis == "PDF"  ){
    $newname = $std_id."FileThesis".$date.'-'.$numrand.$typeThesis;
    $location_thesis="upload/".$newname; 
    $path_copy=$location_thesis.$newname;
    move_uploaded_file($_FILES['FileThesis']['tmp_name'], $location_thesis);
    $sql_up = "";
 }else{
    echo "File1";
    //echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
 }
}
if($type!=''){
if($type == "png" || $type== "PNG" || $type == "PNG" || $type == "jpg" || $type == "jpeg"  || $type == "JPG" || $type == "docx" || $type == "DOCX" || $type == "doc" || $type == "DOC" || $type == "pdf" || $type == "PDF"  ){
    $newname = $std_id."FileT2".$date.'-'.$numrand.$type;
    $location_t2="upload/".$newname; 
    $path_copy=$location_t2.$newname;
    move_uploaded_file($_FILES['FileT2']['tmp_name'], $location_t2);
    $sql_up = "";
}else{
    //echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
    echo "File2";
}
}

if($typeSubmit!=''){
    if($typeSubmit == "png" || $typeSubmit== "PNG" || $typeSubmit == "PNG" || $typeSubmit == "jpg" || $typeSubmit == "jpeg"  || $typeSubmit == "JPG" || $typeSubmit == "docx" || $typeSubmit == "DOCX" || $typeSubmit == "doc" || $typeSubmit == "DOC" || $typeSubmit == "pdf" || $typeSubmit == "PDF"  ){
        $newname = $std_id."FileSubmit".$date.'-'.$numrand.$typeSubmit;
        $location_submit="upload/".$newname; 
        $path_copy=$location_submit.$newname;
        move_uploaded_file($_FILES['FileT2']['tmp_name'], $location_submit);
        $sql_up = "";
    }else{
      //  echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
      echo "File3";
    }
    }

//check in insert 

  if($type_file_url==1){
    $file_url=$location_thesis;
  }else{
    $file_url = $urlThesis ;
  }
  echo $sql = "INSERT INTO info_t2 (std_id, type_send, fileT2,send_date,thesis_file_link,fileThesis,fileSend_note)VALUES ('$std_id', '$type_thesis_is', '$location_t2',Now(),'$file_url','$location_submit)";
  $rs = $mysqli->query($sql);
  echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
}


?>