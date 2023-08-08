<?php 
require_once( "../inc/db_connect.php" );
$mysqli = connect();
$q = "SELECT * FROM info_reserve_adviser  ";
// $query = "SELECT * FROM info_student WHERE STUDENTCODE =".$_SESSION['SES_EN_REG_USER'] ;
$r = mysqli_query($mysqli,$q);


?>
<!DOCTYPE html>
<html lang="en"
>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootsrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- css table -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    
    <link  href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css ">
    <link  href=" https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css ">

    <?php include "./header.php" ?>
</head>
<body>
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
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
            <li class="menu-item ">
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
            <li class="menu-item ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Layouts">คำสั่ง</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item ">
                  <a href="./appoint-adviser.php" class="menu-link">
                    <div data-i18n="Without menu">คำสั่งแต่งตั้งอาจารย์ระดับบัณฑิตวิทยาลัยประจำ</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="./reserv-advisor-forStudent.php" class="menu-link ">
                    <div data-i18n="Without navbar">จองอาจารย์ที่ปรึกษาวิทยานิพนธ์</div>
                  </a>
                </li>
                
              </ul>


              
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
              <li class="menu-item ">
                <a href="language-exam.php" class="menu-link">
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
                
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">คำสั่ง /</span> อนุมัติการจองอาจารย์ที่ปรึกษา</h4>

              <div class="row">
                <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                      <a class="nav-link  " href="./reserv-advisor-forStudent.php"
                        ><i class="bx bx-user me-1"></i> จองอาจารย์ที่ปรึกษา</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active " href="./appove-compare-reserv-advisor.php" target="blank"
                        ><i class="bx bxs-file-pdf"></i> อนุมัติการจองอาจารย์ที่ปรึกษา</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link  " href="./reserve-check-workload.php" target="blank"
                        ><i class="bx bxs-file-pdf"></i> ตรวงสอบภาระงาน</a>
                    </li>
                    
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">อนุมัติการจองอาจารย์ที่ปรึกษา</h5>
                    
                    <div class="card-body">
                    
                
                <div class="table-responsive text-nowrap">
                  <table class="table" id="myTable" >
                    <thead>
                      <tr>
                        
                        <th align="center">ID</th>
                        <th align="center">รหัสนิสิต</th>
                        <th align="center">รหัสอาจารย์</th>
                        <th align="center">วันที่จอง</th>
                        <th align="center">สถานะการอนุมัติ</th>
                        <th align="center">action</th>
                        
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php while($row = $r->fetch_assoc()): ?>
                      <form action="" method="POST" name="update"  enctype="multipart/form-data">
                      
                      <tr>
                      
                      <td><?php echo $row['r_id'] ?></td>
                      <td><?php echo $row['std_id'] ?></td>
                      <td><?php echo $row['id_adviser'] ?></td>
                      <td><?php echo $row['reserve_date'] ?></td>
                      <td><?php 
                      if ($row['status_reserve']=='1') {
                        echo "รอการอนุมัติ";
                      }elseif ($row['status_reserve']=='2') {
                        echo "อนุมัติ";
                      }elseif ($row['status_reserve']=='3') {
                        
                        echo "ไม่อนุมัติ";
                      }
                      ?></td>
                        <td>
                          <input type="hidden" name="r_id" value="<?php echo $row["r_id"]?>">
                          <button  data-r_id="<?php echo $row["r_id"] ?>" data-std_id="<?php echo $row["std_id"] ?>" data-id_adviser="<?php echo $row["id_adviser"] ?>" 
                          data-reserve_date="<?php echo $row["reserve_date"] ?> " data-term="<?php echo $row["term"] ?> " 
                          data-years="<?php echo $row["years"] ?> " data-th_title="<?php echo $row["th_title"] ?> " data-en_title="<?php echo $row["en_title"] ?> "
                          type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</button>
                          
                        </td>
                        
                      </tr>
                      </form>
                      <?php endwhile ?>
                    </tbody>
                  </table>
                </div>
              </div>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include "./footer.php" ?>
            <!-- / Footer -->

            
          </div>
          <!-- Content wrapper -->   
          <!-- Modal -->
          <div class="modal" id="staticBackdrop" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">อาจารย์ที่ปรึกษาอนุมัติ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    
                      <div class="modal-body">
                        <div id="showData">

                        </div>
                        <div class="showData">
                        

                        </div>
                        <br>
                        <!-- <label for="">วันที่ยื่นผล</label><br>
                        <input class="form-control" type="text" name="r_id" id="r_id" readonly><br> -->
                        <label for="">รหัสนิสิต</label><br>
                        <input class="form-control" type="text" name="std_id" id="std_id" readonly><br>
                        <label for="">วันที่ยื่นจอง</label><br>
                        <input class="form-control" type="text" name="reserve_date" id="reserve_date" readonly><br>
                        <label for="">ชื่อเรื่องไทย</label><br>
                        <input class="form-control" type="text" name="th_title" id="th_title" readonly><br>
                        <label for="">ชื่อเรื่องอังกฤษ</label><br>
                        <input class="form-control" type="text" name="en_title" id="en_title" readonly><br>
                        <label for="">ภาคการศึกษา</label><br>
                        <input class="form-control" type="text" name="term" id="term" readonly><br>
                        <label for="">ปีการศึกษา</label><br>
                        <input class="form-control" type="text" name="years" id="years" readonly><br>

                        <?php 
                        ?>

                        
                        
                        <form action="./save-appove-reverv.php" method="post" enctype="multipart/form-data">  
                          <input type="radio" class="form-check-inline" value="3" id="status_reserve" name="status_reserve" >
                          <label for="">ไม่อนุมัติ</label><br>
                          <input type="radio" class="form-check-inline" value="2" id="status_reserve" name="status_reserve" >
                          <label for="">อนุมัติ</label><br>
                          <?php
                          include_once '../inc/db_connect.php';
                          $mysqli=connect();

                          $advisor_select_query = mysqli_query($mysqli , 'SELECT * FROM info_advisor_basicprofile ');
                        ?>

                        <br>
                        <div class="col-md-12" >
                          <label>เลือกที่ปรึกษาร่วมคนที่ 1</label>
                          <div class="col-md-12" >
                          <div>
                            <datalist id="co_advisor1" class="col-md-12"  >
                                <option>---เลือกที่ปรึกษาร่วมคนที่ 1---</option>
                              <?php
                                foreach ($advisor_select_query as $advisor_row) {
                                  echo "<option value=" .$advisor_row['prefixname_th'] . "&nbsp;" .
                                  $advisor_row['advisor_firstname_th'] . "&nbsp;" .
                                  $advisor_row['advisor_lastname_th']. ">" . $advisor_row['prefixname_th'] . "&nbsp;" .
                                      $advisor_row['advisor_firstname_th'] . "&nbsp;" .
                                      $advisor_row['advisor_lastname_th'] . "</option>";
                                }
                              ?>
                              </datalist>
                                <input name="co_advisor1" autocomplete="on" list="co_advisor1" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <?php
                          include_once '../inc/db_connect.php';
                          $mysqli=connect();

                          $advisor_select_query = mysqli_query($mysqli , 'SELECT * FROM info_advisor_basicprofile ');
                        ?>

                        <br>
                        <div class="col-md-12" >
                          <label>เลือกที่ปรึกษาร่วมคนที่ 2</label>
                          <div class="col-md-12" >
                          <div>
                            <datalist id="co_advisor2" class="col-md-12"  >
                                <option>---เลือกที่ปรึกษาร่วมคนที่ 2---</option>
                              <?php
                                foreach ($advisor_select_query as $advisor_row) {
                                  echo "<option value=" .$advisor_row['prefixname_th'] . "&nbsp;" .
                                  $advisor_row['advisor_firstname_th'] . "&nbsp;" .
                                  $advisor_row['advisor_lastname_th']. ">" . $advisor_row['prefixname_th'] . "&nbsp;" .
                                      $advisor_row['advisor_firstname_th'] . "&nbsp;" .
                                      $advisor_row['advisor_lastname_th'] . "</option>";
                                }
                              ?>
                              </datalist>
                                <input name="co_advisor2" autocomplete="on" list="co_advisor2" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <?php
                          include_once '../inc/db_connect.php';
                          $mysqli=connect();

                          $advisor_select_query = mysqli_query($mysqli , 'SELECT * FROM info_advisor_basicprofile ');
                        ?>

                        <br>
                        <div class="col-md-12" >
                          <label>เลือกที่ปรึกษาร่วมคนที่ 3</label>
                          <div class="col-md-12" >
                          <div>
                            <datalist id="co_advisor3" class="col-md-12"  >
                                <option>---เลือกที่ปรึกษาร่วมคนที่ 3---</option>
                              <?php
                                foreach ($advisor_select_query as $advisor_row) {
                                  echo "<option value=" .$advisor_row['prefixname_th'] . "&nbsp;" .
                                  $advisor_row['advisor_firstname_th'] . "&nbsp;" .
                                  $advisor_row['advisor_lastname_th']. ">" . $advisor_row['prefixname_th'] . "&nbsp;" .
                                      $advisor_row['advisor_firstname_th'] . "&nbsp;" .
                                      $advisor_row['advisor_lastname_th'] . "</option>";
                                }
                              ?>
                              </datalist>
                                <input name="co_advisor3" autocomplete="on" list="co_advisor3" class="form-control" />
                            </div>
                          </div>
                        </div>
                    
                  
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="hidden" id="r_id" name="r_id"  >
                  <!-- <button type="submit" class="btn btn-primary"   >Save changes</button> -->
                  <input type="submit"  class="btn btn-primary" value="Save" >
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- select Dropdown -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
 // alert('test');
    $('.select2').select2();
</script>
          
          
           <!-- css table -->
    <script src="http://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src=" https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
      $(document).ready( function () {
        var table = $('#myTable').DataTable( {
          pageLength : 10,
          lengthMenu: [[ 10, 20,50,100], [ 10, 20,50,100]]
        } )
        var table = $('#myTableCompare').DataTable( {
          pageLength : 10,
          lengthMenu: [[ 10, 20,50,100], [ 10, 20,50,100]]
        } )
      } );
    </script>

            <script>
              $(document).ready(function(){
                $("input[type='radio']").change(function() {
                if ($(this).val() == "success") {
                    $("#detailcomment").show();
                } else {
                    $("#detailcomment").hide();
                }
            });
                  $('button').click(function(){
                 var r_id = $(this).attr('data-r_id');
                 var  std_id = $(this).attr('data-std_id');
                var  id_adviser = $(this).attr('data-id_adviser');
                var  reserve_date = $(this).attr('data-reserve_date');
                var  th_title = $(this).attr('data-th_title');
                var  en_title = $(this).attr('data-en_title');
                var  term = $(this).attr('data-term');
                var  years = $(this).attr('data-years');
                
                  // alert(r_id);
                 $("#r_id").val(r_id);
                 $("#std_id").val(std_id);
                 $("#id_adviser").val(id_adviser);
                 $("#reserve_date").val(reserve_date);
                 $("#th_title").val(th_title);
                 $("#en_title").val(en_title);
                 $("#term").val(term);
                 $("#years").val(years);
                    //  $('#staticBackdrop').modal("show");
                    $.ajax({url: "save-appove-reverv.php",
                        method:'post',
                        data:{id_adviser:id_adviser},
                        success: function(result){
                          console.log(result);
                    $(".showData").html(result);
                  }});

                  })
                  $("#id_adviser").change(function() {
              var id = $("#id_adviser").val();
              
                $.ajax({url: "search-adviser-onus.php",
                        method:'post',
                        data:{id:id},
                        success: function(result){
                          console.log(result);
                    $("#showData").html(result);
                  }});
            });
                  
                  
                  
                 
              });

            </script>
        
        
</body>
</html>
