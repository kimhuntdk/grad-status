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
 $std_id = $_SESSION['SES_EN_REG_USER'];
 $type_thesis_is = $_POST['type_thesis_is'];
 $type_file_url = $_POST['type_file_url'];
if($type_file_url==1){
    
}else if($type_file_url==2){
    $urlThesis = $_POST['urlThesis'];
}


if(isset($_POST['submit'])){

  //ตรวจสอลก่อนว่าเคยเคยส่งมาตรวจแล้ว เจ้าหน้าที่ตรวจหรือยัง
  $sql_chk_formart = "SELETE info_t2_check.rusultTest FROM  info_t2  LEFT JOIN info_t2_check ON info_t2.t2_id=info_t2_check.t2_id WHERE info_t2_check.rusultTest=0 ANDinfo_t2.std_id=".$std_id;
  $rs_chk_formart = $mysqli->query($sql_chk_formart);
  $num_chk_formart = $rs_chk_formart->num_rows;

  if($num_chk_formart>0){ //เคยมีการส่งมาแล้ว รอเจ้าหน้าตรวจสอบ
    echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
  }
  //
if($_FILES['FileThesis']['name']){
     $typeThesis = strrchr($_FILES['FileThesis']['name'],".");
if($typeThesis == ".png" || $typeThesis == ".PNG" || $typeThesis == ".PNG" || $typeThesis == ".jpg" || $typeThesis == ".jpeg"  || $typeThesis == ".JPG" || $typeThesis == ".docx" || $typeThesis == ".DOCX" || $typeThesis == ".doc" || $typeThesis == ".DOC" || $typeThesis == ".pdf" || $typeThesis == ".PDF"  ){
    $newname = $std_id."FileThesis".$date.'-'.$numrand.$typeThesis;
    $location_thesis="upload/".$newname; 
    $path_copy=$location_thesis.$newname;
    move_uploaded_file($_FILES['FileThesis']['tmp_name'], $location_thesis);
   
 }else{
    //echo "File1";
    echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
 }
}
if($_FILES['FileT2']['name']){
    $type = strrchr($_FILES['FileT2']['name'],".");
if($type == ".png" || $type== ".PNG" || $type == ".PNG" || $type == ".jpg" || $type == ".jpeg"  || $type == ".JPG" || $type == ".docx" || $type == ".DOCX" || $type == ".doc" || $type == ".DOC" || $type == ".pdf" || $type == ".PDF"  ){
    $newname = $std_id."FileT2".$date.'-'.$numrand.$type;
    $location_t2="upload/".$newname; 
    $path_copy=$location_t2.$newname;
    move_uploaded_file($_FILES['FileT2']['tmp_name'], $location_t2);
   
}else{
    echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
    //echo "File2";
}
}

if($_FILES['FileSubmit']['name']){
    $typeSubmit = strrchr($_FILES['FileSubmit']['name'],".");
    if($typeSubmit == ".png" || $typeSubmit== ".PNG" || $typeSubmit == ".PNG" || $typeSubmit == ".jpg" || $typeSubmit == ".jpeg"  || $typeSubmit == ".JPG" || $typeSubmit == ".docx" || $typeSubmit == ".DOCX" || $typeSubmit == ".doc" || $typeSubmit == ".DOC" || $typeSubmit == ".pdf" || $typeSubmit == ".PDF"  ){
        $newname = $std_id."FileSubmit".$date.'-'.$numrand.$typeSubmit;
        $location_submit="upload/".$newname; 
        $path_copy=$location_submit.$newname;
        move_uploaded_file($_FILES['FileSubmit']['tmp_name'], $location_submit);
        
    }else{
        echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
      //echo "File3";
    }
    }

//check in insert 
  if($type_file_url==1){
    $file_url=$location_thesis;
  }else{
    $file_url = $urlThesis ;
  }
   $sql = "INSERT INTO info_t2 (std_id, type_send, fileT2,send_date,thesis_file_link,fileThesis,fileSend_note)VALUES ('$std_id', '$type_thesis_is', '$location_t2',Now(),'$type_file_url','$file_url','$location_submit')";
  $rs = $mysqli->query($sql);
  //echo $sql;
  //echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
  //ตรวจสอบการสำเร็จ ให้ไป เพิ่มในตารางตรวจ
  
  if($rs){
    //หาค่า แม็ก ไป เพิ่่มในตาราง ตรวจสอบรูปแบบ
    $sql_max = "SELECT MAX(t2_id) as max_id FROM info_t2 ";
    $rs_max = $mysqli->query($sql_max);
    $row_max = $rs_max->fetch_array();
    $max_id = $row_max['max_id'];
    //เพิ่มข้อมูลตารางตรวจรูปแบบ
    $sql_check_t2="INSERT INTO info_t2_check (t2_check_id, t2_id, rusultTest, cover, title_page, approval_page, abstract_th_en, table_contents, vita, bibliography, examination_date, mes_cover, mes_title_page, mes_approval_page, mes_abstract, mes_table_contents, mes_vita, mes_bibliography, other_message) VALUES (NULL, '$max_id', '0', '0', '0', '0', '0', '0', '0', '0',Now(), '', '', '', '', '', '', '', '')";
    $rs_check_t2 = $mysqli->query($sql_check_t2);
    if($rs_check_t2){
      echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
    }else{
      echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
    }
  }else{
    echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
  }
}


?>