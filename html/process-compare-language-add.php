<?php
  $item = $_POST['item'];//ข้อที่เลือก
  $other_txt = $_POST['other_txt'];//ชื่อสถานบันอื่นจะไปสอบ
  $num_score = count($_POST['score']);// ตัวแปรคะแนนที่กรอกมา

 for($i=0;$i<$num_score;$i++){
  
        $score = $_POST['score'][$i];
    if($score !=''){
       echo  $item;
      echo   $score;
    }
 }
//print_r($_POST['score']);
?>