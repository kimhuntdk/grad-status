<?php
session_start();
require_once("../inc/db_connect.php");
$mysqli = connect();
$std_id = $_SESSION["SES_EN_REG_USER"];
if ($std_id == "") {
  echo "<script>window.location='../logout.php';</script>";
}
$id = $_REQUEST['id'];
$sql_chk = "Select * from info_t2 LEFT JOIN info_t2_check ON info_t2.t2_id=info_t2_check.t2_id   WHERE info_t2.t2_id=" . $id;
$rs_chk = $mysqli->query($sql_chk);
$row_result = $rs_chk->fetch_array();


?>
<form action="gs-check-formath-save.php" method="post">
  <h5>สรุปผลการตรวจ :
    <?php if ($row_result['rusultTest'] == 1) {
      echo "ผ่าน";
    } elseif ($row_result['rusultTest'] == 2) {
      echo "ไม่ผ่าน";
    } else {
      echo "รอดำเนินการ";
    } ?>
  </h5>
<div class="card text-start">
  <div class="card-body">
    <label>สถานะการอนุมัติผู้บริหาร</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="rusultTest" id="rusultTest"   value="1" <?php if($row_result['rusultTest']==1){ echo "checked"; } ?>  required>
    <label class="form-check-label" for="flexRadioDefault1">
      ผ่าน/pass
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="rusultTest" id="rusultTest" value="2" <?php if($row_result['rusultTest']==2){ echo "checked"; } ?>  required>
    <label class="form-check-label" for="flexRadioDefault2">
      ไม่ผ่าน/not pass
    </label>
  </div>
  </div>
</div>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
    <tr>
      <th>รายการ</th>
      <th>ผล</th>
      <th>ข้อความแจ้ง</th>
    </tr>
    <tbody>
      <tr>
        <td>TS5/IS5,T2,I2 (สำเนา):
          <?php
          //แสดงเอกสารแนบ T2 
          $file_t2 = $row_result['fileT2'];
          if ($file_t2 != "") { ?>
            <a href="<?php echo $row_result['fileT2']; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-file-arrow-down" viewBox="0 0 16 16">
                <path
                  d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5z" />
                <path
                  d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
              </svg></a>
          <?php } else {
            echo "ไม่พบเอกสารแนบ";
          }
          ?>
        </td>
        <td>
          <?php
          if ($row_result['file_t2'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['file_t2'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }


          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="file_t2" id="file_t2" value="1" <?php if($row_result['file_t2']==1){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="file_t2" id="file_t2" value="2" <?php if($row_result['file_t2']==2){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php

          echo $row_result['mes_file_t2'];

          ?>
          <input name="mes_file_t2" id="mes_file_t2" type="text" class="form-control" value="<?php echo $row_result['mes_file_t2'];?>">
        </td>
      </tr>
      <tr>
        <td>ใบนำส่ง จากระบบ iThesis เมนู Submission Document:
          <?php
          //แสดงเอกสาร submission doc
          
          $fileSend_note = $row_result['fileSend_note'];
          if ($fileSend_note != "") { ?>
            <a href="<?php echo $row_result['fileSend_note']; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-file-arrow-down" viewBox="0 0 16 16">
                <path
                  d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5z" />
                <path
                  d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
              </svg></a>
          <?php } else {
            echo "ไม่พบเอกสารแนบ";
          }
          ?>
        </td>
        <td>
          <?php
          if ($row_result['file_submit'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['file_submit'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="file_submit" id="file_submit" value="1" <?php if($row_result['file_submit']==1){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="file_submit" id="file_submit" value="2" <?php if($row_result['file_submit']==2){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_file_submit'];
          ?>
          <input name="mes_file_submit" id="mes_file_submit" type="text" class="form-control" value="<?php echo $row_result['mes_file_submit'];?>">
        </td>
      </tr>
      <tr>
        <td colspan="3">ส่วนที่ตรวจสอบไฟล์ข้อมูลวิทยานิพนธ์ฉบับสมบูรณ์
          ประกอบด้วย ดังนี้
          <?php
          $thesis_file_link = $row_result['thesis_file_link'];
          //เอกสาร
          
          $fileThesis = $row_result['fileThesis'];
          if ($fileThesis != "") { ?>
            <a href="<?php echo $row_result['fileThesis']; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-file-arrow-down" viewBox="0 0 16 16">
                <path
                  d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5z" />
                <path
                  d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
              </svg></a>
          <?php } else {
            echo "ไม่พบเอกสารแนบ";
          }

          ?>

          <br>
        </td>
      </tr>
      <tr>
        <td>1. ปกนอก (ชื่อเรื่องให้ตรวจสอบตรงกับ TS5,T2,I2 )</td>
        <td>
          <?php
          if ($row_result['cover'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['cover'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="cover" id="cover" value="1" <?php if($row_result['cover']==1){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="cover" id="cover" value="2" <?php if($row_result['cover']==2){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_cover'];
          ?>
          <input type="text" name="mes_cover" class="form-control" value="<?php echo $row_result['mes_cover']; ?>">
        </td>
      </tr>
      <tr>
        <td>2. ปกใน</td>
        <td>
          <?php
          if ($row_result['title_page'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['title_page'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="title_page" id="title_page" value="1" <?php if($row_result['title_page']==1){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="title_page" id="title_page" value="2" <?php if($row_result['title_page']==2){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_title_page'];
          ?>
          <input type="text" name="mes_title_page" id="mes_title_page" class="form-control"
            value="<?php echo $row_result['mes_title_page']; ?>">
        </td>
      </tr>
      <tr>
        <td>3. หน้าอนุมัติ (ให้ตรวจสอบคณะกรรมการตามคำสั่ง TS4,T1)</td>
        <td>
          <?php
          if ($row_result['approval_page'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['approval_page'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="approval_page" id="approval_page" value="1" <?php if($row_result['approval_page']==1){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="approval_page" id="approval_page" value="2" <?php if($row_result['approval_page']==2){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_approval_page'];
          ?>
          <input type="text" name="mes_approval_page" id="mes_approval_page" class="form-control"
            value="<?php echo $row_result['mes_approval_page']; ?>">
        </td>
      </tr>
      <tr>
        <td>4. บทคัดย่อภาษาไทย/อังกฤษ (มีคำสำคัญ/Keyword)</td>
        <td>
          <?php
          if ($row_result['abstract_th_en'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['abstract_th_en'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="abstract_th_en" id="abstract_th_en" value="1" <?php if($row_result['abstract_th_en']==1){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="abstract_th_en" id="abstract_th_en" value="2" <?php if($row_result['abstract_th_en']==2){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_abstract'];
          ?>
          <input type="text" name="mes_abstract" id="mes_abstract" class="form-control"
            value="<?php echo $row_result['mes_abstract']; ?>">
        </td>
      </tr>
      <tr>
        <td>5. สารบัญ (ประกอบด้วย บทคัดย่อภาษาไทย/ภาษาอังกฤษ, กิตติกรรมประกาศ,
          สารบัญ, สารบัญตาราง, สารบัญภาพ, บทที่.. หัวข้อเรื่อง, บรรณานุกรม, ภาคผนวก
          และประวัติผู้เขียน)</td>
        <td>
          <?php
          if ($row_result['table_contents'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['table_contents'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="table_contents" id="table_contents" value="1" <?php if($row_result['table_contents']==1){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="table_contents" id="table_contents" value="2" <?php if($row_result['table_contents']==2){ echo "checked"; } ?> required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_table_contents'];
          ?>
          <input type="text" name="mes_table_contents" id="mes_table_contents" class="form-control"
            value="<?php echo $row_result['mes_table_contents']; ?>">
        </td>
      </tr>
      <tr>
        <td>6. ประวัติผู้เขียน</td>
        <td>
          <?php
          if ($row_result['vita'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['vita'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="vita" id="vita" value="1" <?php if($row_result['vita']==1){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="vita" id="vita" value="2" <?php if($row_result['vita']==2){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_vita'];
          ?>
          <input type="text" name="mes_vita" id="mes_vita" class="form-control"
            value="<?php echo $row_result['mes_vita']; ?>">
        </td>
      </tr>
      <tr>
        <td>บรรณานุกรม (การอ้างอิงในเนื้อหา/บรรณานุกรม โดยใช้ระบบ Mendeley หรือ EndNote
          (การแทรกอ้างอิงในเนื้อหาถูกต้อง ครบถ้วน อ้างอิงให้ถูกรูปแบบ)</td>
        <td>
          <?php
          if ($row_result['bibliography'] == 1) {
            echo "ผ่าน";
          } else if ($row_result['bibliography'] == 2) {
            echo "ไม่ผ่าน";
          } else {
            echo "รอดำเนินการ";
          }
          ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="bibliography" id="bibliography" value="1" <?php if($row_result['bibliography']==1){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault1">
              ผ่าน/pass
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="bibliography" id="bibliography" value="2" <?php if($row_result['bibliography']==2){ echo "checked"; } ?>  required>
            <label class="form-check-label" for="flexRadioDefault2">
              ไม่ผ่าน/not pass
            </label>
          </div>
        <td>
          <?php
          echo $row_result['mes_bibliography'];
          ?>
          <input type="text" name="mes_bibliography" id="mes_bibliography" class="form-control"
            value="<?php echo $row_result['mes_bibliography']; ?>">
        </td>
      </tr>
      <tr>
        <td>อื่นๆ: </td>
        <td>
        <td>
          <?php
          echo $row_result['other_message'];
          ?>
          <input type="text" name="other_message" id="other_message" class="form-control"
            value="<?php echo $row_result['other_message']; ?>">
        </td>
      </tr>

    </tbody>
  </table>
  <div class="card text-start">
 
    <div class="card-body">
      <input type="hidden" name="t2_id" value="<?php echo $id;?>">
      <input type="hidden" name="std_id" value="<?php echo $row_result['std_id'];?>" >
      <input type="submit" name="submit" value="Submit" class="btn btn-secondary" <?php if($row_result['rusultTest']!=0){ echo "disabled";}?>  >
    </div>
  </div>
</form>