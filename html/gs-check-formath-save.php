<?php
session_start();
require_once("../inc/db_connect.php");
require_once('../SendGmailSMTP/PHPMailer/PHPMailerAutoload.php');
$mysqli = connect();


if (isset($_POST['submit'])) {
   $t2_id = $_POST['t2_id'];
   $std_id = $_POST['std_id'];
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

   if ($t2_id != '') {
      $sql = "UPDATE info_t2_check SET rusultTest = '$rusultTest', cover = '$cover', file_t2 = '$file_t2 ', file_submit = '$file_submit', title_page = '$title_page', approval_page = '$approval_page', abstract_th_en = '$abstract_th_en', table_contents = '$table_contents', vita = '$vita', bibliography = '$bibliography',examination_date=Now() , mes_file_t2 = '$mes_file_t2', mes_file_submit = '$mes_file_submit', mes_cover = '$mes_cover', mes_title_page = '$mes_title_page', mes_approval_page = '$mes_approval_page', mes_abstract = '$mes_abstract', mes_table_contents = '$mes_table_contents', mes_vita = '$mes_vita', mes_bibliography = '$mes_bibliography', other_message = '$other_message' WHERE t2_id=" . $t2_id;
      $rs = $mysqli->query($sql);
      if ($rs) {
         //ดึงข้อมูลส่วนตัวนิสิต
         $sql_data = "SELECT * FROM info_student WHERE STUDENTCODE=" . $std_id;
         $rs_data = $mysqli->query($sql_data);
         $row_data = $rs_data->fetch_array();
         $num_row_std = $rs_data->num_rows;
         if ($num_row_std > 0) { //ถ้าในตาราง info student มีข้อมูลสามารถ ส่งเมลได้ 
            $title = $row_data['PREFIXNAME'];
            $STUDENTNAME = $row_data['STUDENTNAME'];
            $STUDENTSURNAME = $row_data['STUDENTSURNAME'];
            $name_full = $title . $STUDENTNAME . " " . $STUDENTSURNAME;
            $FACULTYNAME = $row_data['FACULTYNAME'];
            $PROGRAMNAME = $row_data['PROGRAMNAME'];
            $email = $std_id."@msu.ac.th";
            //ผลการตรวจ
            if ($rusultTest == 1) {
               $sql_formart = "INSERT INTO info_t2_approve (t2_approve_id, t2_id, statusDocument, message, approval_date) VALUES (NULL, '$t2_id', 0, '', Now())"; //เพิ่มข้อมูลใน table การอนุมัติ
               $rs_formart = $mysqli->query($sql_formart);
               $str_result = "pass/ผ่าน";
            } else if ($rusultTest == 2) {
               $str_result = "not pass/ไม่ผ่าน";
            }
            // ผลไฟล์ T2
            if ($file_t2 == 1) {
               $str_file_t2 = "pass/ผ่าน";
            } else {
               $str_file_t2 = "not pass/ไม่ผ่าน";
            }
            // ผลไฟล์ submition
            if ($file_submit == 1) {
               $str_file_submit  = "pass/ผ่าน";
            } else {
               $str_file_submit = "not pass/ไม่ผ่าน";
            }
            // ผลปกนอก
            if ($cover == 1) {
               $str_cover = "pass/ผ่าน";
            } else {
               $str_cover = "not pass/ไม่ผ่าน";
            }
            // ผลปกใน
            if ($title_page == 1) {
               $str_title_page = "pass/ผ่าน";
            } else {
               $str_title_page = "not pass/ไม่ผ่าน";
            }
            // ผลหน้าอนุมัติ
            if ($approval_page == 1) {
               $str_approval_page = "pass/ผ่าน";
            } else {
               $str_approval_page = "not pass/ไม่ผ่าน";
            }
            // ผลบทคัดย่อ
            if ($abstract_th_en == 1) {
               $str_abstract = "pass/ผ่าน";
            } else {
               $str_abstract = "not pass/ไม่ผ่าน";
            }
            // ผลสารบัญ
            if ($table_contents == 1) {
               $str_table_contents = "pass/ผ่าน";
            } else {
               $str_table_contents = "not pass/ไม่ผ่าน";
            }
            // ผลประวัติ
            if ($vita == 1) {
               $str_vita = "pass/ผ่าน";
            } else {
               $str_vita = "not pass/ไม่ผ่าน";
            }
            // ผลบรรณานุกรม
            if ($bibliography == 1) {
               $str_bibliography = "pass/ผ่าน";
            } else {
               $str_bibliography = "not pass/ไม่ผ่าน";
            }
            //ส่งเมลไปยังนิสิต
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls"; //ตรงส่วนนี้ผมไม่แน่ใจ ลองเปลี่ยนไปมาใช้งานได้
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; //ตรงส่วนนี้ผมไม่แน่ใจ ลองเปลี่ยนไปมาใช้งานได้
            $mail->isHTML();
            $mail->CharSet = "utf-8"; //ตั้งเป็น UTF-8 เพื่อให้อ่านภาษาไทยได้
            // $mail->Username = "graduate@msu.ac.th"; //ให้ใส่ Gmail ของคุณเต็มๆเลย
            // $mail->Password = "123456789"; // ใส่รหัสผ่าน
            $mail->Username = "jakkrid.b@msu.ac.th"; //ให้ใส่ Gmail ของคุณเต็มๆเลย
            $mail->Password = "jakkridb22"; // ใส่รหัสผ่าน
            $mail->SetFrom = ('graduate@msu.ac.th'); //ตั้ง email เพื่อใช้เป็นเมล์อ้างอิงในการส่ง ใส่หรือไม่ใส่ก็ได้ เพราะผมก็ไม่รู้ว่ามันแาดงให้เห็นตรงไหน
            $mail->FromName = "บัณฑิตวิทยาลัย มมส"; //ชื่อที่ใช้ในการส่ง
            $mail->Subject = "[Formath Thesis MSU] รายงานผลการตรวจรูปแบบ"; //หัวเรื่อง emal ที่ส่ง
            $mail->Body = "เรียนนิสิต   $name_full
<br>เรื่อง แจ้งผลการตรวจรูปแบบ <br>
ระบบ e-Service GS แจ้งผลตรวจรูปแบบ<br>
ID : $std_id NAME : $name_full Faculty : $FACULTYNAME  Major :  $PROGRAMNAME <br>
สรุปผลการตรวจ :  $str_result <br>
TS5/IS5,T2,I2 (สำเนา) :  $str_file_t2   $mes_file_t2 <br>
ใบนำส่ง จากระบบ iThesis เมนู Submission Document :  $str_file_submit  $mes_file_submit<br>
ส่วนที่ตรวจสอบไฟล์ข้อมูลวิทยานิพนธ์ฉบับสมบูรณ์ ประกอบด้วย ดังนี้ <br>
1. ปกนอก (ชื่อเรื่องให้ตรวจสอบตรงกับ TS5,T2,I2 ) :  $str_cover $mes_cover <br>
2. ปกใน :  $str_title_page <br>
3. หน้าอนุมัติ (ให้ตรวจสอบคณะกรรมการตามคำสั่ง TS4,T1) :  $str_approval_page  $mes_approval_page <br>
4. บทคัดย่อภาษาไทย/อังกฤษ (มีคำสำคัญ/Keyword) :  $str_abstract $mes_abstract<br>
5. สารบัญ (ประกอบด้วย บทคัดย่อภาษาไทย/ภาษาอังกฤษ, กิตติกรรมประกาศ, สารบัญ, สารบัญตาราง, สารบัญภาพ, บทที่.. หัวข้อเรื่อง, บรรณานุกรม, ภาคผนวก และประวัติผู้เขียน) :  $str_table_contents $mes_table_contents<br>
6. ประวัติผู้เขียน:  $str_vita $mes_vita <br>
บรรณานุกรม (การอ้างอิงในเนื้อหา/บรรณานุกรม โดยใช้ระบบ Mendeley หรือ EndNote (การแทรกอ้างอิงในเนื้อหาถูกต้อง ครบถ้วน อ้างอิงให้ถูกรูปแบบ):  $str_bibliography  $mes_bibliography<br>
6. อื่นๆ :  $other_message <br>
<br><br>
จึงเรียนมาเพื่อโปรดทราบ<br>
บัณฑิตวิทยาลัย มหาวิทยาลัยมหาสารคาม<br>
หากมีข้อสงสัยประการใด กรุณาติดต่อ supapat.b@msu.ac.th
"; //รายละเอียดที่ส่ง
            $mail->AddAddress('jakkrid.b@msu.ac.th',$name_full); //อีเมล์และชื่อผู้รับ
            $mail->Send();
         }
         echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
         //ส่งเมลหานิสิต
      } else {
         echo "<script> window.location ='javascript:history.go(-1)'; </script>"; // ไป กลับ form เดิม
         // ส่งเมลหานิสิต
      }
   }



}
?>