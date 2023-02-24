<!DOCTYPE html>
<html lang="en">
<head>
<?php include "./header.php" ?>
    
    
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

          <ul class="menu-inner py-1 ">
            <li class="menu-item active">
              <a href="index.php" class="menu-link">
                <!-- <i class="material-symbols-outlined"></i> -->
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics"> หน้าหลัก</div>
              </a>
            </li>
            <!-- Dashboard -->
            <li class="menu-item  ">
              <a href="pages-account-settings-account.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics"> สถานะนิสิต</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Layouts">คำสั่ง</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="./appoint-adviser.php" class="menu-link">
                    <div data-i18n="Without menu">คำสั่งแต่งตั้งอาจารย์ประจำบัณฑิตวิทยาลัย</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">เข้าศึกษาเทอม</div>
                  </a>
                </li>
                
              </ul>


              <li class="menu-item">
                <a href=".html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-task"></i>
                  <div data-i18n="Layouts"> รายงานตัว</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="tuition.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bxl-paypal"></i>
                  <div data-i18n="Layouts"> จ่ายค่าเล่าเรียน</div>
                </a>
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
                <a href="./layout examination-report-Admin.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-detail"></i>
                  <div data-i18n="Layouts"> สอบเค้าโครง</div>
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
              <li class="menu-item">
                <a href="language-exam.html" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-receipt"></i>
                  <div data-i18n="Layouts"> ผลสอบภาษา & Skill</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="./journal-Add.html" class="menu-link">
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
          <?php include "./headbar.php" ?>
         <!-- / Navbar -->
        
    
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                
                <div class="card mb-3">
                    <img class="card-img-top" src="../assets/img/elements/21.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">ยินดีตอนรับ</h5>
                      <p class="card-text">
                        บัณทิตวิทยาลัย มหาวิทยาลัยมหาสารคาม
                      </p>
                      
                    </div>
                </div>
               
            </div>
        </div>
        <?php include "./footer.php" ?>
</body>
</html>