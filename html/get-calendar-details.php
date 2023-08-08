<?php
session_start();
require_once("../inc/db_connect.php");
$mysqli = connect();
// $std_id = $_SESSION["SES_EN_REG_USER"];
// if ($std_id == "") {
//   echo "<script>window.location='../logout.php';</script>";
// }
$id = $_POST['id'];
if(isset($id)){
$sql_chk = "Select * from info_calendar LEFT JOIN info_calendar_type ON info_calendar.cal_type_id=info_calendar_type.cal_type_id   WHERE info_calendar.cal_id=" . $id;
$rs_chk = $mysqli->query($sql_chk);
$row_result = $rs_chk->fetch_array();
?>
    <form action="javascript:void(0);" method="post"  name="from" id="contactForm" >
                        
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><strong> ประเภทปฏิทิน</strong></label>
                        <select id="cal_type" name="cal_type" class="form-control" required>
                                <option value="">เลือก</option>
                                <?php
                                $sql_type = "SELECT * FROM info_calendar_type";
                                $rs_type = $mysqli->query($sql_type);
                                foreach ($rs_type as $row_type) {
                                 if($row_result['cal_type_id']==$row_type['cal_type_id']){
                                  echo " <option value='$row_type[cal_type_id]' selected>$row_type[cal_type_name] $row_type[semester]/$row_type[acdemicYear]</option>";
                                 }else{
                                    echo " <option value='$row_type[cal_type_id]'>$row_type[cal_type_name] $row_type[semester]/$row_type[acdemicYear]</option>";
                                 }
                                }
                                ?>
                               
                        </select>
                      </div>
                
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อเรื่อง</label>
                        <input type="text" class="form-control" id="cal_name" name="cal_name" value="<?php echo $row_result['cal_name'];?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">วันที่เริ่มต้น</label>
                        <input type="date"  class="form-control" id="cal_date_start" name="cal_date_start" value="<?php echo $row_result['cal_date_start'];?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">วันที่สิ้นสุด (กรณีที่ไม่มีไม่ต้องเลือก)</label>
                        <input type="date" class="form-control" id="cal_date_end" name="cal_date_end" value="<?php echo $row_result['cal_date_end'];?>">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">วันที่สิ้นสุด (กรณีที่ไม่มีไม่ต้องเลือก)</label>
                         <select id="" name=""  class="form-control select2">
                          <option value=""></option>
                          <option value="1">1111</option>
                          <option value="2">2222</option>
                          <option value="3">3333</option>
                         </select></
                      </div>
   
                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        <input type="hidden" name="cal_id" value="<?php echo $id;?>">
                    <button type="reset" class="btn btn-outline-secondary" >Cancel</button>
                      </form>
  
                      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
    $("#contactForm").submit(function() {
   
      $.post('admin-calendar-update.php', $.param($(this).serializeArray()), function(data) {
        $('#exampleModal').modal('hide');
       // console.log(data);
        if(data==0){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
                })

        }else{
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
                })
        }
       // window.location.reload();
      });
      });

    </script>
<script>
    $('.select2').select2();
</script>
<?php
}else{
  echo exit('error');
}
?>