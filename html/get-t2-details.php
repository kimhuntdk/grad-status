<?php
session_start();
require_once( "../inc/db_connect.php" );
$mysqli = connect();
$std_id = $_SESSION[ "SES_EN_REG_USER" ];
if ( $std_id == "" ) {
  echo "<script>window.location='../logout.php';</script>";
}
$id = $_REQUEST[ 'id' ];
$sql_chk = "Select * from info_t2 LEFT JOIN info_t2_check ON info_t2.t2_id=info_t2_check.t2_id   WHERE info_t2.t2_id=" . $id;
$rs_chk = $mysqli->query( $sql_chk );
$row_result = $rs_chk->fetch_array();


?>
<h4>สรุปผลการตรวจ : <?php if($row_result['rusultTest']==1){echo "ผ่าน";}elseif($row_result['rusultTest']==2){echo "ไม่ผ่าน";}else{echo "รอดำเนินการ";}?></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
 <tr>
    <th>รายการ</th>
    <th>ผล</th>
    <th>ข้อความแจ้ง</th>
</tr>
  <tbody>
    <tr>
      <td>TS5/IS5,T2,I2 (สำเนา): </td>
      <td>
        <?php 
          if($row_result['file_t2']==1){
            echo "ผ่าน";
          }else if($row_result['file_t2']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
      <td>
      <?php 

            echo $row_result['mes_file_t2'];
          
        ?>
      </td>
    </tr>
    <tr>
      <td>ใบนำส่ง (จากระบบ iThesis เมนู Submission Document: </td>
      <td>
      <?php 
          if($row_result['file_submit']==1){
            echo "ผ่าน";
          }else if($row_result['file_submit']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 

            echo $row_result['mes_file_submit'];
          
        ?>
      </td>
    </tr>
    <tr>
        <td colspan="3">ส่วนที่ตรวจสอบไฟล์ข้อมูลวิทยานิพนธ์ฉบับสมบูรณ์
ประกอบด้วย ดังนี้<br></td>
    </tr>
    <tr>
      <td>1. ปกนอก (ชื่อเรื่องให้ตรวจสอบตรงกับ TS5,T2,I2 )</td>
      <td>        <?php 
          if($row_result['cover']==1){
            echo "ผ่าน";
          }else if($row_result['cover']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 
         echo $row_result['mes_cover']; 
         ?>
      </td>
    </tr>   
    <tr>
      <td>2. ปกใน</td>
      <td>
      <?php 
          if($row_result['title_page']==1){
            echo "ผ่าน";
          }else if($row_result['title_page']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 
         echo $row_result['mes_title_page']; 
         ?>
      </td>
    </tr>   
    <tr>
      <td>3. หน้าอนุมัติ (ให้ตรวจสอบคณะกรรมการตามคำสั่ง TS4,T1)</td>
      <td>
      <?php 
          if($row_result['approval_page']==1){
            echo "ผ่าน";
          }else if($row_result['approval_page']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 
         echo $row_result['mes_approval_page']; 
         ?>
      </td>
    </tr>   
    <tr>
      <td>4. บทคัดย่อภาษาไทย/อังกฤษ (มีคำสำคัญ/Keyword)</td>
      <td>      
        <?php 
          if($row_result['abstract_th_en']==1){
            echo "ผ่าน";
          }else if($row_result['abstract_th_en']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 
         echo $row_result['mes_abstract']; 
         ?>
      </td>
    </tr>   
    <tr>
      <td>5. สารบัญ (ประกอบด้วย บทคัดย่อภาษาไทย/ภาษาอังกฤษ, กิตติกรรมประกาศ,
สารบัญ, สารบัญตาราง, สารบัญภาพ, บทที่.. หัวข้อเรื่อง, บรรณานุกรม, ภาคผนวก
และประวัติผู้เขียน)</td>
      <td>
      <?php 
          if($row_result['table_contents']==1){
            echo "ผ่าน";
          }else if($row_result['table_contents']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 
         echo $row_result['mes_table_contents']; 
         ?>
      </td>
    </tr>   
    <tr>
      <td>6. ประวัติผู้เขียน</td>
      <td>
      <?php 
          if($row_result['vita']==1){
            echo "ผ่าน";
          }else if($row_result['vita']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 
         echo $row_result['mes_vita']; 
         ?>
      </td>
    </tr> 
    <tr>
      <td>บรรณานุกรม (การอ้างอิงในเนื้อหา/บรรณานุกรม โดยใช้ระบบ Mendeley หรือ EndNote
(การแทรกอ้างอิงในเนื้อหาถูกต้อง ครบถ้วน อ้างอิงให้ถูกรูปแบบ)</td>
      <td>      <?php 
          if($row_result['bibliography']==1){
            echo "ผ่าน";
          }else if($row_result['bibliography']==2){
            echo "ไม่ผ่าน";
          }else{
            echo "รอดำเนินการ";
          }
        ?>
        <td>
        <?php 
         echo $row_result['mes_bibliography']; 
         ?>
      </td>
    </tr>   
     <tr>
      <td>อื่นๆ: </td>
      <td>
        <td>
        <?php 
         echo $row_result['other_message']; 
         ?>
      </td>
    </tr>
    
  </tbody>
</table>
