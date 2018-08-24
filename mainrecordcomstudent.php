<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>หน้าจัดการข้อมูลหัวข้อสำหรับสถานประกอบการประเมินนักศึกษา &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>
  <?
  @session_start();
  require_once('include/connect.php');

  if(!isset($_SESSION['username']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
          <? include('include/sidebar.php'); ?>
        </div>
        <div class="main-panel">
          <? include('include/header.php'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                              <div class="card-header" data-background-color="purple">
                                  <i class="material-icons">note</i>
                              </div>
                              <div class="card-content">
                                  <p class="category">จำนวนหัวข้อสำหรับสถานประกอบการประเมินนักศึกษา
                                  </p>
                                  <h3 class="title">
                                    <? $a = "SELECT mrcs_id from mainrecordcomstudent where approve_status ='1'";
                                    $query = mysqli_query($conn,$a);
                                    $count = mysqli_num_rows($query);
                                    echo $count; ?>
                                      <small>หัวข้อหลัก</small>
                                  </h3>
                              </div>
                              <div class="card-footer">
                                  <div class="stats">

                                  </div>
                              </div>
                          </div>
                      </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                              <div class="card-header" data-background-color="red">
                                  <i class="material-icons">note</i>
                              </div>
                              <div class="card-content">
                                  <p class="category">จำนวนหัวข้อสำหรับสถานประกอบการประเมินนักศึกษา
                                  </p>
                                  <h3 class="title">
                                    <?  $t = "SELECT crcs_id from choicerecordcomstudent where approve_status ='1'";
                                    $query1 = mysqli_query($conn,$t);
                                    $count1 = mysqli_num_rows($query1);
                                    echo $count1; ?>
                                      <small>หัวข้อรอง</small>
                                  </h3>
                              </div>
                              <div class="card-footer">
                                  <div class="stats">

                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">รายชื่อหัวข้อสำหรับสถานประกอบการประเมินนักศึกษา</h4>
                                <p class="category">รายชื่อหัวข้อสำหรับสถานประกอบการประเมินนักศึกษา</p>
                            </div>
                            <div class="card-content table-responsive">
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mainrecordcomstudentAdd">
                              <i class="material-icons">note</i> เพิ่มรายชื่อหัวข้อหลักสำหรับสถานประกอบการประเมินนักศึกษา</button>
                                <table class="table table-hover" id="mainrecordcomstudent">
                                    <thead class="text-primary">
                                        <th>หัวข้อสำหรับสถานประกอบการประเมินนักศึกษา</th>
                                        <th>ตั้งค่า</th>
                                    </thead>
                                    <tbody>
                                      <?php $query = "SELECT * FROM mainrecordcomstudent where approve_status ='1'";
                                      $g = 0;
                                      $a = 1;
                                      $query = mysqli_query($conn,$query);
                                      while ($b = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                          <td><?php echo $b[1]; ?></td>
                                          <td>
                                          <div class="dropdown">
                                          <button class="btn btn-primary dropdown"
                                          class="drop-edit" data-toggle="dropdown">
                                          <i class="fa fa-cog"></i>
                                          <span class="caret"> </span>
                                          </button>
                                          <ul class="dropdown-menu ">
                                          <li><a href="editmainrecordcomstudent.php?g=<?php echo $b[0]; ?>" data-toggle="modal" data-target="#editmainrecordcomstudent">แก้ไขข้อมูล</a></li>
                                          <li><a href="mainrecordcomstudentDelete.php?g=<?php echo $b[0]; ?>" data-toggle="modal" data-target="#mainrecordcomstudentDelete">ลบข้อมูล</a></li>
                                          <!--<li><a href="showstudent.php?g=<?php echo $b[0];?> " data-toggle="modal" data-target="#showstudent">แสดงข้อมูลแบบ Modal</a></li> -->
                                          </ul>
                                        </td>
                                          <?php $g++; } ?>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">รายชื่อหัวข้อรองสำหรับสถานประกอบการประเมินนักศึกษา</h4>
                            <p class="category">รายชื่อหัวข้อรองสำหรับสถานประกอบการประเมินนักศึกษา</p>
                        </div>
                        <div class="card-content table-responsive">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#choicerecordcomstudentAdd">
                          <i class="material-icons">note</i> เพิ่มรายชื่อหัวข้อรองสำหรับสถานประกอบการประเมินนักศึกษา</button>
                            <table class="table table-hover" id="choicerecordcomstudent">
                                <thead class="text-danger">
                                    <th>หัวข้อรองสำหรับสถานประกอบการประเมินนักศึกษา</th>
                                    <th>หัวข้อหลักสำหรับสถานประกอบการประเมินนักศึกษา</th>
                                    <th>ตั้งค่า</th>
                                </thead>
                                <tbody>
                                <?  $query1 = "SELECT * FROM choicerecordcomstudent where approve_status ='1'";
                                  $f = 0;
                                  $d = 1;
                                  $query1 = mysqli_query($conn,$query1);
                                  while ($c = mysqli_fetch_array($query1)) { ?>
                                    <tr>
                                      <td><?php echo $c[1];?></td>
                                      <td><?php
                                      $c1 = $c[2];
                                      $query3 = "SELECT * FROM mainrecordcomstudent where mrcs_id = $c1 and approve_status ='1'";
                                      $query3 = mysqli_query($conn,$query3);
                                      while ($x = mysqli_fetch_array($query3)) {
                                      echo $x[1];
                                    }?></td>
                                      <td>
                                      <div class="dropdown">
                                      <button class="btn btn-danger dropdown"
                                      class="drop-edit" data-toggle="dropdown">
                                      <i class="fa fa-cog"></i>
                                      <span class="caret"> </span>
                                      </button>
                                      <ul class="dropdown-menu ">
                                      <li><a href="editchoicerecordcomstudent.php?f=<?php echo $c[0]; ?>" data-toggle="modal" data-target="#editchoicerecordcomstudent">แก้ไขข้อมูล</a></li>
                                      <li><a href="choicerecordcomstudentDelete.php?f=<?php echo $c[0]; ?>" data-toggle="modal" data-target="#choicerecordcomstudentDelete">ลบข้อมูล</a></li>
                                    </td>
                                      <?php $f++; } ?>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Modal Bootstrap-->
<?php include('addmainrecordcomstudent.php'); ?>
             <div class="modal fade" id="editmainrecordcomstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                 </div>
               </div>
             </div>
             <div class="modal fade" id="mainrecordcomstudentDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                 </div>
               </div>
             </div>

            <script type="text/javascript">
            $(document).ready(function() {
                $('#editmainrecordcomstudent').on('hidden.bs.modal', function () {
                      $(this).removeData('bs.modal');
                });
            });
            </script>

            <script type="text/javascript">
            $(document).ready(function() {
                $('#mainrecordcomstudentDelete').on('hidden.bs.modal', function () {
                      $(this).removeData('bs.modal');
                });
            });
            </script>

       <?php include('addchoicerecordcomstudent.php'); ?>
                         <div class="modal fade" id="editchoicerecordcomstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>
                         <div class="modal fade" id="choicerecordcomstudentDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>

                        <script type="text/javascript">
                        $(document).ready(function() {
                            $('#editchoicerecordcomstudent').on('hidden.bs.modal', function () {
                                  $(this).removeData('bs.modal');
                            });
                        });
                        </script>

                        <script type="text/javascript">
                        $(document).ready(function() {
                            $('#choicerecordcomstudentDelete').on('hidden.bs.modal', function () {
                                  $(this).removeData('bs.modal');
                            });
                        });
                        </script>

<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#mainrecordcomstudent').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#choicerecordcomstudent').DataTable();
    });
</script>
</html>
