<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>สมัครสมาชิก &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
	<link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="login/img/FITM.png">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">สมัครสมาชิกอาจารย์</h4>
							<form method="POST" action="registerteacherQuery.php">
								<div class="form-group">
									<label for="name">ชื่อ</label>
									<input id="name" type="text" class="form-control" name="teacher_name" required autofocus>
								</div>
								<div class="form-group">
									<label for="name">นามสกุล</label>
									<input id="name" type="text" class="form-control" name="teacher_surname" required autofocus>
								</div>
								<div class="form-group">
									<label for="email">อีเมล์ (Gmail เท่านั้น)</label>
									<input id="email" type="email" class="form-control" name="email_teacher" required>
								</div>
								<div class="form-group">
									<label for="password">รหัสผ่าน</label>
									<input id="password" type="password" class="form-control" name="teacher_password" required data-eye>
								</div>
                <div class="form-group">
              <label>ตำแหน่งทางวิชาการ</label>
              <select class="form-control" name="teacher_position" style="width: 100%;" required autofocus>
                <option>อาจารย์</option>
                <option>ผู้ช่วยศาสตราจารย์</option>
                <option>รองศาสตราจารย์</option>
                <option>ศาสตราจารย์</option>
                <option>ดร.</option>
              </select>
              </div>
              <div class="form-group">
              <label>สาขา</label>
              <select class="form-control" name="teacher_department" style="width: 100%;" required autofocus>
                <option>IT</option>
                <option>ITI</option>
              </select>
            </div>
								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										สมัครสมาชิก
									</button>
								</div>
								<div class="margin-top20 text-center">
									หากคุณมี Username แล้ว ?<a href="login.php">กลับสู่หน้าหลัก</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy;
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="login/js/jquery.min.js"></script>
	<script src="login/bootstrap/js/bootstrap.min.js"></script>
	<script src="login/js/my-login.js"></script>
</body>
</html>
