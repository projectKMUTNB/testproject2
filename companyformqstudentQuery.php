<?php
@session_start();
require_once('includementor/connect.php');
if(!isset($_SESSION['mentor_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
$Max = $_POST['Max'];
$ccstudent_detail = $_POST['ccstudent_detail'];
$sc = $_POST['Sc'];
$mc = $_POST['Mc'];
$total=array();


$query = "SELECT * FROM apprenticeship where student_code = $sc";
$query = mysqli_query($conn,$query);


if(mysqli_num_rows($query)==0){
    echo "<script>alert(\"ไม่สามารถทำแบบประเมินได้เนื่องจากนักศึกษายังไม่มีสถานประกอบการหรือไม่ได้ระบุสถานประกอบการ\");</script>";
    echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentappandrecord.php\">";
}

if(mysqli_num_rows($query)==1){

  $query = "INSERT INTO ccommentstudent values (' ',
    '$ccstudent_detail',
    '$sc',
    '$mc')";
$result = mysqli_query($conn,$query);

// รับค่าตัวเลือกมาเก็บใน Array
$Choice = array();
for ($i=1; $i <= $Max; $i++) {
		array_push($Choice,$_POST['radio_'.$i]);
}

// * ค่าน้ำหนัก
for ($k=0; $k <= $Max-1; $k++) {
	$total[]=$we[$k]*$Choice[$k];
}
//*****


// ค่าน้ำหนักก

/*$we = array();
$query = mysqli_query($conn,"SELECT * FROM weightrecord");
while($row = mysqli_fetch_array($query)){
  $we[] = $row[0];
  echo $row[0];
}*/
//

// บันทึกคะแนนลงฐานข้อมูล  ***
foreach($Choice as $val):
    if(is_array($val)):
        foreach($val as $v):
            $insert="INSERT into crecodestudentevaluation VALUES ('".$v."','$sc','$mc');";
            $sql=mysqli_query($conn,$insert);
        endforeach;
    else:
        $insert="INSERT into crecodestudentevaluation VALUES ('".$val."','$sc','$mc');";
        $sql=mysqli_query($conn,$insert);
    endif;
endforeach;
//-----------------------------------------------------------------

if($sql){
  echo "<script>alert(\"ทำการบันทึกแบบประเมินสถานประกอบการเรียบร้อยแล้ว\");</script>";
  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=addstudentappandrecord.php\">";
  }else{
  echo "<script>alert(";
  echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
  echo ")</script>";
  }
mysqli_close($conn);
}
?>
