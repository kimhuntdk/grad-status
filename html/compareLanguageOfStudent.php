<?php
   session_start();
   session_id();
   require_once( "../inc/db_connect.php" );
   $mysqli = connect();
   $query = "SELECT * FROM info_student WHERE STUDENTCODE =".$_SESSION['SES_EN_REG_USER'] ;
   $result = mysqli_query($mysqli,$query);
?>
<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Account settings - Account </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/icons/brands/google.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                
                <img src="../assets/img/logo/logo-icon.png" width="200" height="80">
                
              </span>
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
              
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <li class="menu-item ">
                <a href="index.html" class="menu-link">
                  <!-- <i class="material-symbols-outlined"></i> -->
                  <i class="menu-icon tf-icons bx bx-home"></i>
                  <div data-i18n="Analytics"> หน้าหลัก</div>
                </a>
              </li>
            <!-- Dashboard -->
            <li class="menu-item  ">
              <a href="pages-account-settings-account.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics"> สถานะนิสิต</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">คำสั่ง</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="./appoint-adviser.php" class="menu-link">
                    <div data-i18n="Without menu">คำสั่งแต่งตั้งอาจารย์ระดับบัณฑิตวิทยาลัยประจำ</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">เข้าศึกษาเทอม</div>
                  </a>
                </li>
                
              </ul>
            </li>


              
              <li class="menu-item">
                <a href=".html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-money"></i>
                  <div data-i18n="Layouts"> ทุน</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="advisorreport.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-support"></i>
                  <div data-i18n="Layouts"> อาจารย์ที่ปรึกษา</div>
                </a>
              </li>
              <li class="menu-item">
                <a href=".html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-detail"></i>
                  <div data-i18n="Layouts"> สอบเค้าโคร่ง</div>
                </a>
              </li>
              <li class="menu-item">
                <a href=".html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                  <div data-i18n="Layouts"> สอบวิทยานิพนธ์</div>
                </a>
              </li>
              <li class="menu-item">
                <a href=".html" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-edit-alt"></i>
                  <div data-i18n="Layouts"> ตรวจรูปแบบ</div>
                </a>
              </li>
              <li class="menu-item active">
                <a href="language-exam.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-receipt"></i>
                  <div data-i18n="Layouts"> ผลสอบภาษา & Skill</div>
                </a>
              </li>
              <li class="menu-item">
                <a href=".html" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-book-bookmark"></i>
                  <div data-i18n="Layouts"> วารสาร</div>
                </a>
              </li>
              <li class="menu-item">
                <a href=".html" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-graduation"></i>
                  <div data-i18n="Layouts"> สำเร็จการศึกษา</div>
                </a>
              </li>

            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">ผลสอบภาษา /</span> เทียบผลการสอบ</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link " href="language-exam.php"
                        ><i class="bx bx-user me-1"></i> รายงานผลการสอบAdmin</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="language-exam-report-student.php"
                        ><i class="bx bx-edit-alt"></i> รายงานผลการสอบนิสิต</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="language-exam-Add.php"
                        ><i class="bx bxs-user-plus"></i> เพิ่มผลการสอบ</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="language-exam-Add.php"
                        ><i class="bx bxs-user-plus"></i> เทียบผลการสอบ</a
                      >
                    </li>
                  </ul>
                  <div class="card mb-4">
                    
                    
                    
                    <hr class="my-0" />
                    <div class="card-body">
                      
                        <div class="row">
                          <!-- HTML5 Inputs -->
                          <?php while($row = $result->fetch_assoc()): ?>
                            <h3 class="card-header">เทียบผลการสอบ</h3>
                            <div class="card-body">
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label" >
                                  <h5>ชื่อ</h5>
                                  </label>
                                <div class="col-md-3">
                                  <input class="form-control" type="text" value="<?php echo $row['STUDENTNAME'] ?>" readonly />
                                </div>
                                <label for="html5-text-input" class="col-md-2 col-form-label">
                                  <h5>นามสกุล</h5>
                                  </label>
                                <div class="col-md-3">
                                  <input  class="form-control" type="text" value="<?php echo $row['STUDENTSURNAME'] ?>" readonly />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label" >
                                  <h5>คณะที่สังกัด</h5>
                                  </label>
                                <div class="col-md-3">
                                  <input  class="form-control" type="text" value="<?php echo $row['FACULTYNAME'] ?>" readonly />
                                </div>
                                <label for="html5-text-input" class="col-md-2 col-form-label">
                                  <h5>สาขา</h5>
                                  </label>
                                <div class="col-md-4">
                                  <input  class="form-control" type="text" value="<?php echo $row['PROGRAMNAME'] ?>" readonly />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label" >
                                  <h5>รหัสนิสิต</h5>
                                  </label>
                                <div class="col-md-3">
                                  <input  class="form-control" type="text" value="<?php echo $row['STUDENTCODE'] ?>" readonly />
                                </div>
                                <label for="html5-text-input" class="col-md-2 col-form-label">
                                  <h5>ระดับการศึกษา</h5>
                                  </label>
                                <div class="col-md-3">
                                  <input  class="form-control" type="text" 
                                  value="<?php if ($row['LEVELID']=='5') {
                                      echo "ปริญญาโทในระบบ";
                                    }elseif ($row['LEVELID']=='8') {
                                      echo "ปริญญาโทนอกระบบ";
                                    }elseif ($row['LEVELID']=='6') {
                                      echo "ปริญญาเอกในระบบ";
                                    }elseif ($row['LEVELID']=='9') {
                                      echo "ปริญญาเอกนอกระบบ";
                                    }else {
                                      echo "ข้อมูลไม่ถูกต้อง";
                                    } ?>"
                                    readonly
                                    />
                                </div>
                            </div>
                            <form action="process-compare-language-add.php" method="POST" enctype="multipart/form-data">
                                  <div class="mb-3 row">
                                    <div class="col-md-12">
                                        
                                        <label> <input type="checkbox" name="" id="" checked>  ขอสมัคร เพื่อเทียบผลการสอบวัดความรู้ภาษาอังกฤษสําหรับนิสิตระดับบัณฑิตศึกษา
                                            ที่เคยเรียนผ่านมาแล้ว/ผ่านการทดสอบภาษาอังกฤษจากสถาบันอื่น 
                                            (โดยแนบหลักฐานผลการศึกษา/ผลการทดสอบจากสถาบัน/ศูนย์สอบภาษา ที่เป็นไปตามประกาศฯ
                                            ฉบับจริง พร้อมสําเนา 1 ชุด โดยระบุรายวิชา/ผลคะแนน ที่ขอเทียบมาพร้อม)
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                  
                                    <div class="table">
                                        <table class="table table-light">
                                            <thead>
                                                <th >checked</th>
                                                <th >สถานบัน/ศูนย์สอบภาษาย์</th>
                                                <th >เกณฑ์คะแนน</th>
                                                <th >ช่องกรอกคะแนน</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="1" name="item"  value="1" />
                                                        </div>
                                                    </td>
                                                    <td>MSU EGS-Test</td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "คะแนนร้อยละ 50 ขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' || $row['LEVELID']=='9' ) {
                                                      echo "คะแนนร้อยละ 60 ขึ้นไป";
                                                    } ?></td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="2"  name="item"  value="2"  />
                                                        </div>
                                                    </td>
                                                    <td >MSU EPT-Test</td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "คะแนนร้อยละ 50 ขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "คะแนนร้อยละ 60 ขึ้นไป";
                                                    } ?></td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="3" name="item"  value="3"   />
                                                        </div>
                                                    </td>
                                                    <td >TOEFL (Paper-based)</td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "450 คะแนนขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "500 คะแนนขึ้นไป";
                                                    } ?></td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="4" name="item"  value="4"   />
                                                        </div>
                                                    </td>
                                                    <td >TOEFL (Internet-based)</td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "45 คะแนนขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "61 คะแนนขึ้นไป";
                                                    } ?></td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="5" name="item"  value="5"  />
                                                        </div>
                                                    </td>
                                                    <td >IELTS</td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "4.0 คะแนนขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "5.0 คะแนนขึ้นไป";
                                                    } ?></td>>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="6" name="item" value="6" />
                                                        </div>
                                                    </td>
                                                    <td >CU-TEP (120 คะแนน)</td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "45 คะแนนขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "60 คะแนนขึ้นไป";
                                                    } ?></td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="7" name="item"  value="7" />
                                                        </div>
                                                    </td>
                                                    <td >TU-GET (1,000 คะแนน)</td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "500 คะแนนขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "550 คะแนนขึ้นไป";
                                                    } ?></td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="8" name="item" value="8" />
                                                        </div>
                                                    </td>
                                                    <td >KU-EPT </td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "คะแนนร้อยละ 50 ขึ้นไป";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "คะแนนร้อยละ 55 ขึ้นไป";
                                                    } ?></td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input class="form-check-input" type="radio" id="9" name="item" value="9"  />
                                                        </div>
                                                    </td>
                                                    <td>อื่นๆ </td>
                                                    <td ><?php if ($row['LEVELID']=='5' || $row['LEVELID']=='8' ) {
                                                      echo "กรอก";
                                                    }  elseif ($row['LEVELID']=='6' && $row['LEVELID']=='9' ) {
                                                      echo "กรอก";
                                                    } ?>
                                                    <input type="text" name="other_txt" class="form-control" >
                                                  </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="score[]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                
                              </div>
                              <!-- <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label" >
                                  <h5>คะแนนที่เทียบ/รายวิชา</h5>
                                  </label>
                                <div class="col-md-2">
                                  <input name="score" class="form-control" type="text" placeholder="คะแนน" />
                                </div>
                              </div> -->
                              <div class="mb-3 row">
                                <label for="html5-date-local-input" class="col-md-2 col-form-label">
                                  <h5>วันที่ยื่นเทียบ</h5>
                                  </label>
                                <div class="col-md-2">
                                  <input
                                    class="form-control"
                                    type="date"
                                    placeholder="2021-06-18T12:30:00"
                                    id="html5-datetime-local-input"
                                    name="dates"
                                  />
                                </div>
                              </div>
                              
                              <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">
                                  <h5>หนังสือรับรองผลสอบ</h5>
                                </label>
                                <!-- <div class="col-md-4">
                                  <input name="certificates" class="form-control" type="text" placeholder="หนังสือรับรองผลสอบ" id="html5-text-input" />
                                </div> -->
                                <div class="col-md-3">
                                  <input name="certificates" class="form-control" type="file" id="formFile" />
                                </div>
                              </div>
                              
                              <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label" >
                                  <h5>ภาคเรียนที่</h5>
                                  </label>
                                <div class="col-md-3">
                                  <input name="term" class="form-control" type="text" placeholder="1" id="html5-text-input" />
                                </div>
                                <label for="html5-text-input" class="col-md-2 col-form-label">
                                  <h5>ปีการศึกษา</h5>
                                  </label>
                                <div class="col-md-3">
                                  <input name="years" class="form-control" type="text" placeholder="2565" id="html5-text-input" />
                                </div>
                              </div>

                              <!-- <div class="mb-3 row">
                                <label class="col-md-2 col-form-label" for="selectTypeOpt">
                                  <h5>ผลการสอบ</h5>
                                  </label>
                                <div class="col-md-2">
                                    <select name="result" id="result" class="form-select color-dropdown">
                                      <option value="bg-secondary " selected>-----</option>
                                      <option value="s" >
                                          ผ่าน
                                      </option>
                                      <option value="u" >ไม่ผ่าน</option>
                                    </select>
                                </div>
                              </div> -->
                              
                              <h3 class="card-header">Skill</h3>
                              <div class="mt-2">
                                
                                <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
                                <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>
                                
                              </div>
                            </form>
                          </div>
                            
                          <?php endwhile ?>
                        </div>

                      
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://grad.msu.ac.th/th/" target="_blank" class="footer-link fw-bolder">Graduate School Mahasarakham University</a>
                </div>
                
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    
        <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- <script>
      $(document).ready(function(){
        $('.form-check-input').click(function(){
          var text ="";
          $('.form-check-input:checked').each(function() {
              text+=$(this).val()+',';
          });
          text=text.substring(0,text.length-1);
          $('#selecttext').val(text);
          var count =$("[type='checkbox']:checked").length;
           $('#count').val($("[type='checkbox']:checked").length);
        });
      });
    </script> -->
  </body>
</html>
