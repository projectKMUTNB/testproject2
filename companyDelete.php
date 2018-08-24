<?
@session_start();
require_once('include/connect.php');

if(!isset($_SESSION['username']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$g = $_GET['g'];
$query = "SELECT * FROM company where company_code = $g" ;
$query = mysqli_query($conn,$query);
$c = mysqli_fetch_array($query);
?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">ลบข้อมูลสถานประกอบการ</h4>
                            <p class="category">คุณต้องการลบข้อมูลสถานประกอบการที่นักศึกษาฝึกงานบริษัทนี้ใช่หรือไม่ ?</p>
                        </div>
              <div class="modal-body">
                <form role="form" name="form" method="post" action="deletecompany.php" >
                  <div class="row">
                      <div class="col-lg-12">
                      <div class="table-responsive">
                        <table class="table">
                        <tr><h4 class="title">ข้อมูลที่ท่านต้องการลบคือ</h4></tr>
                        <tr><p class="category"> * หากกดปุ่มลบข้อมูลคุณจะไม่สามารถนำข้อมูลเดิมมาใช้ใหม่ได้</p></tr>
                        <tr><th>รหัสสถานประกอบการ </th><td><?php echo $c[0]; ?></td></tr>
                        <tr><th>ชื่อสถานประกอบการ </th><td><?php echo $c[1]; ?></td></tr>
                        <tr><th>ที่อยู่สถานประกอบการ </th><td><?php echo $c[2]; ?></td></tr>
                        <tr><th>Email สถานประกอบการ </th><td><?php echo $c[3]; ?></td></tr>
                        <tr><th>เบอร์โทรศัพท์ของสถานประกอบการ </th><td><?php echo $c[4]; ?></td></tr>
                        </table>
                        <input type="hidden" name="g" value="<? echo $g ?>">
                      </div>
                      <button type="submit" class="btn btn-danger btn-round ">ลบข้อมูล</button>
                      <button class="btn btn-warning btn-round " data-dismiss="modal">ยกเลิก</button>
                      </div>
                   </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
