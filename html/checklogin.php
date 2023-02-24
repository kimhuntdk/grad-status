<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require_once("inc/db_connect.php");
require_once("lib/nusoap.php");
$mysqli = connect();
$user = $_POST['username'];
$user = strtolower($user); //แปลงเป็นตัวพิมพ์เล็กทั้งหมด
$pass = sha1($_REQUEST['password']); //เข้ารหัสผ่านด้วย sha1
// เช็คว่า user ที่เข้ามาเป็นสถานะ อะไร
$user = $mysqli->real_escape_string($user);
$pass = $mysqli->real_escape_string($pass);
$user;


if (isset($user)) {

  $user_number = strlen($user);
  if ($user_number > 10) {
    $status = 1; //นิสิต
  } else {
    $status = 2; //อาจารย์
  }
  if (is_numeric($user) and $status == 2) {

    //อาจารย์
    $client = new SoapClient("http://regpr.msu.ac.th/webservice/WsOfficerlogin.php?wsdl");
    $params = array(
      'officercode' => $_REQUEST['username'],
      'out_password' => $_REQUEST['password']
    );
    $data = $client->__soapCall("Officerlogin", $params);
    //echo $data;

    $mydata = json_decode($data, true); // json decode from web service
    //check รหัสนิสิต


    if (count($mydata) == 0) {
      echo "Not found data!";
    } else {
      ?>
      <?php
      foreach ($mydata as $result) {

        if ($result["xpass"] == 1) {

          $url = "http://202.28.34.2/webservice/JsonOfficergardtostudent.php?officercode=" . $user;

          $contents = file_get_contents($url);
          $contents = utf8_encode($contents);
          $results = json_decode($contents);

          foreach ($results as $key => $value) {
            foreach ($value as $k => $v) {
              if ($k == "officercode") {
                echo $v;
              }
              if ($k == "prefixname") {
                $prefixname = $v;
              }
              if ($k == "officername") {
                $officername = $v;
              }
              if ($k == "officersurname") {
                $officersurname = $v;
              }
              if ($k == "facultyid") {
                $facultyid = $v;
              }
            }

          }
          //check user student เคย เพิ่มเข้าไปในระบบ Status หรือไม่
          $sql_std = " select STUDENTCODE from info_student WHERE STUDENTCODE=" . $_POST['username'];
          $rs_std = $mysqli->query($sql_std);
          $rs_num_std = $rs_std->num_rows;
          //ดึงข้อมูล Service Student
          $client = new SoapClient("http://regpr.msu.ac.th/webservice/WsStudentinformation.php?wsdl");
          $params = array(
            'studentcode' => $user //$_GET['stdcode']
          );
          $data = $client->__soapCall("Studentinformation", $params);
          $data;
          $mydata = json_decode($data, true); // json decode from web service
          if (count($mydata) == 0) {
            echo 3;
          } else {
            foreach ($mydata as $result) {
              $STUDENTCODE = $result["STUDENTCODE"];
              $CITIZENID = $result["CITIZENID"];
              $ADMITACADYEAR = $result["ADMITACADYEAR"];
              $ADMITSEMESTER = $result["ADMITSEMESTER"];
              $PREFIXNAME = $result["PREFIXNAME"];
              $STUDENTNAME = $result["STUDENTNAME"];
              $STUDENTSURNAME = $result["STUDENTSURNAME"];
              $FACULTYNAME = $result["FACULTYNAME"];
              $CAMPUSNAME = $result["CAMPUSNAME"];
              $PROGRAMNAME = $result["PROGRAMNAME"];
              $LEVELID = $result["LEVELID"];
              $SumOfAMOUNT = $result["SumOfAMOUNT"];
              $SumOfBALANCE = $result["SumOfBALANCE"];
              $STATUSPAYMENT = $result["STATUSPAYMENT"];
              $STATUSREGIST = $result["STATUSREGIST"];
              $NATIONID = $result["NATIONID"];
              $NATIONNAMETH = $result["NATIONNAMETH"];
              $NATIONNAMEENG = $result["NATIONNAMEENG"];
              $STUDENTMOBLIE = $result["STUDENTMOBLIE"];
            }
          }
          //======== check ว่าเคย insert  table info_student หรือไม่ ================
          $sql_chk = " select std_id_std FROM  info_student WHERE  stu_id=" . $STUDENTCODE;
          $rs_chk = $mysqli->query($sql_chk);
          $rs_num_std = $rs_chk->num_rows;
          if ($CITIZENID != "") { //ถ้ามีเลขบัตรให้มีการไปค้นจาก service student status
            
            $url_m = "https://regpr.msu.ac.th/webservice/JsonStudentMasterPaymentAndRegistWhitCitizenid.php?citizenid=".$CITIZENID;
            $contents = file_get_contents($url);
            $contents = utf8_encode($contents);
            $results = json_decode($contents);
          }
          if ($rs_num_std == 0) { //ยังไม่เพิ่มในตาราง
            $sqlin = "INSERT INTO info_student(stu_id,ADMITACADYEAR,ADMITSEMESTER,STUDENTCODE,PREFIXNAME,STUDENTNAME,STUDENTSURNAME,CITIZENID,FACULTYNAME,CAMPUSNAME,PROGRAMNAME,LEVELID,SumOfAMOUNT,SumOfBALANCE,STATUSPAYMENT,STATUSREGIST,NATIONID,NATIONNAMETH,NATIONNAMEENG,STUDENTMOBLIE) VALUES (NULL,'$ADMITACADYEAR','$ADMITSEMESTER','$PREFIXNAME','$STUDENTNAME','$STUDENTSURNAME','$CITIZENID','$FACULTYNAME','$CAMPUSNAME','$PROGRAMNAME','$LEVELID','$SumOfAMOUNT','$SumOfBALANCE','$STATUSPAYMENT','$STATUSREGIST','$NATIONID','$NATIONNAMETH','$NATIONNAMEENG','$STUDENTMOBLIE')";
            $rsin = $mysqli->query($sqlin);
            echo $sqlin;
          } else {
            $sqlup = "UPDATE info_student SET ADMITACADYEAR='$ADMITACADYEAR',ADMITSEMESTER='$ADMITSEMESTER',STUDENTCODE='$STUDENTCODE' ";
            $sqlup .= ",PREFIXNAME='$PREFIXNAME',STUDENTNAME='$STUDENTNAME',STUDENTSURNAME='$STUDENTSURNAME',CITIZENID='$CITIZENID'  ";
            $sqlup .= ",FACULTYNAME='$FACULTYNAME',CAMPUSNAME='$CAMPUSNAME',PROGRAMNAME='$PROGRAMNAME',LEVELID='$LEVELID'  ";
            $sqlup .= ",SumOfAMOUNT='$SumOfAMOUNT',SumOfBALANCE='$SumOfBALANCE',STATUSPAYMENT='$STATUSPAYMENT',STATUSREGIST='$STATUSREGIST'  ";
            $sqlup .= ",NATIONID='$NATIONID',NATIONNAMETH='$NATIONNAMETH',NATIONNAMEENG='$NATIONNAMEENG',STUDENTMOBLIE='$STUDENTMOBLIE'  ";
            $sqlup .= " WHERE std_id=".$user;
            $rsup = $mysqli->query($sqlup);
            echo $sqlup;
          }
          $_SESSION['SES_EN_REG_ID'] = session_id();
          $_SESSION['SES_EN_REG_USER'] = $prefixname . $officername . " " . $officersurname;
          $_SESSION['SES_EN_REG_FAC_ID'] = $facultyid;
          echo "<script> window.location ='advisor/index.php'; </script>"; // เข้าระบบได้เป็นสถานะ อาจารย์
        } elseif ($result["xpass"] == 0) {
          echo "<script> alert('Check Password 1 '); window.location ='index.php'; </script>"; // เข้าระบบได้เป็นสถานะ อาจารย์
        }

      }
    }
  }
  if (isset($user)) {
    $ma = substr($user, 0, strpos($user, "@"));
    if ($ma == "") {
      // เจ้าหน้าที่
      $sql_chk_sf = "select staff_username,staff_pass,staff_faculty_id FROM  request_staff_faculty WHERE  staff_username='$user'";
      $rs_chk_sf = $mysqli->query($sql_chk_sf);
      $row_chk_sf = $rs_chk_sf->fetch_array();
      $pass_t_sf = $row_chk_sf['staff_pass'];
      $staff_faculty_id = $row_chk_sf['staff_faculty_id'];
      $num_chk_sf = $rs_chk_sf->num_rows;
      if ($num_chk_sf > 0) {
        if ($pass_t_sf == $pass and $staff_faculty_id == 0) {
          $_SESSION['SES_EN_REG_ID'] = session_id();
          $_SESSION['SES_EN_REG_USER'] = $user;
          $_SESSION['SES_EN_REG_FAC_ID'] = $staff_faculty_id;
          echo "<script> window.location ='staff_gs/index.php'; </script>"; // เข้าระบบได้เป็นสถานะ เจ้าหน้าที่ บัณฑิต
        } else if ($pass_t_sf == $pass and $staff_faculty_id > 0) {
          $_SESSION['SES_EN_REG_ID'] = session_id();
          $_SESSION['SES_EN_REG_USER'] = $user;
          $_SESSION['SES_EN_REG_FAC_ID'] = $staff_faculty_id;
          echo "<script> window.location ='staff_fac/index.php'; </script>"; // เข้าระบบได้เป็นสถานะ เจ้าหน้าที่ คณะ
        } else {
          echo "<script> alert('Check Password 1 '); window.location ='index.php'; </script>"; // เข้าระบบได้เป็นสถานะ เจ้าหน้าที่
        }
      }
      exit;


    } else {
      //ผู้สมัคร
      //======== check ว่าเคย insert  table หรือไม่ ================
      $sql_chk = " select mem_email,mem_pass,mem_id FROM  en_reg_member WHERE  mem_email='$user'";
      $rs_chk = $mysqli->query($sql_chk);
      $row_chk = $rs_chk->fetch_array();
      $pass_t = $row_chk['mem_pass'];
      $mem_id = $row_chk['mem_id'];
      $num_chk = $rs_chk->num_rows;
      //======== check table นิสิตต่างชาติ ================ 
      // echo $pass." เท่ากับ ".$pass_t;
      if ($pass_t == $pass) {
        $_SESSION['SES_EN_REG_ID'] = session_id();
        $_SESSION['SES_EN_REG_USER'] = $user;
        $_SESSION['SES_EN_REG_MEM_ID'] = $mem_id;
        echo "<script> window.location ='member/index.php'; </script>"; // เข้าระบบได้เป็นสถานะ นิสิต
      } else {
        echo "<script> alert('Check Password '); window.location ='index.php'; </script>"; // เข้าระบบได้เป็นสถานะ นิสิต
      }
      exit;
    }
  }
} else {
  //echo "<span style='color:red;'>Wrong</span>";

  echo "<script> alert('Check Capcha'); window.location ='index.php'; </script>"; // เข้าระบบได้เป็นสถานะ นิสิต    
  exit;
}


?>