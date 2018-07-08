<!DOCTYPE html>
<html lang="en"> 

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title></title>
	<?php $this->load->view('cwcontrol/script');?>    

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">เข้าสู่ระบบ / Login for system</h3>
					</div>
					<div class="panel-body">
						<!-- <form id="target" method="post" action="#">
							<fieldset>
								<div class="form-group">

									<input class="form-control" placeholder="ชื่อเข้าใช้งาน" name="txtUsername" id="txtUsername" type="text" value="<?php if(isset($_COOKIE["username_log"])){echo $_COOKIE["username_log"];}?>" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="รหัสผ่าน" name="txtPassword" id="txtPassword" type="password" value="<?php if(isset($_COOKIE["password_log"])){echo $_COOKIE["password_log"];}?>">
								</div>
								<div class="checkbox">
									<label>
										<input name="remember_me" type="checkbox" id="remember_me" <?php if(isset($_COOKIE["username_log"]) != "" && isset($_COOKIE["password_log"]) !="" ){ echo "checked"; }?>>จำชื่อเข้าใช้และรหัสผ่าน
									</label>
								</div>
								<input class="btn btn-lg btn-danger btn-block" name="login1" type="submit" value="เข้าสู่ระบบ">

							</fieldset>
						</form> -->
						<!-- news -->
						<form id="form-login">
							<div>
								<input type="text" class="form-control" id="user_email" placeholder="ชื่อเข้าใช้งาน" required="" />
							</div>
							<div style="padding-top: 15px;">
								<input type="password" class="form-control" id="user_pass" placeholder="รหัสผ่าน" required="" />
							</div>
							<br class="clearfix">
							<div>
								<!-- <a class="btn btn-default submit" id="login">Log in</a> -->
								<button style="margin-top: 5px;width: 100%;" class="btn btn-primary submit" id="login">Login</button>
								<a class="btn reset_pass" href="<?= base_url('cwcontrol/login/logout') ?>">logout</a>
							</div>

							<div class="clearfix"></div>

						</form>
						<!-- news -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="theme/js/jquery.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
	<script src="theme/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#form-login').submit(function(){

				var email = $('#user_email').val();
				var pass = $('#user_pass').val();
      // alert(email);
      $.ajax({
      	url: '<?php echo base_url('cwcontrol/login/index');?>',
      	type: 'post',
      	dataType: 'json',
      	data: {email:email,pass:pass,type:'main'},

      	success:function(data){
      		console.log(data);

      		if (data != "0") {
      			alert('ยินดต้อนรับ'+data.admin_name+'เข้าสู่ระบบ');
      			window.location = "<?= base_url('cwcontrol/home') ?>";

      		}else{
      			window.location = "<?= base_url('cwcontrol/login') ?>";
      			alert('usernane/password ไม่ถูกต้อง');
      		}

      	}
      });
      
  });
		});
	</script>

	<div class="modal fade" id="Modal_none" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="panel panel-warning" style="margin-bottom:0px;">
					<div class="panel-heading">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						เข้าสู่ระบบ
					</div>
					<div class="panel-body" align="center">
						<p>กรุณากรอกชื่อเข้าใช้งาน และรหัสผ่านค่ะ</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="Modal_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="panel panel-success" style="margin-bottom:0px;">
					<div class="panel-heading">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						เข้าสู่ระบบ
					</div>
					<div class="panel-body" align="center">
						<p>เข้าสู่ระบบสำเร็จ กรุณารอสักครู่ค่ะ...</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="Modal_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="panel panel-danger" style="margin-bottom:0px;">
					<div class="panel-heading">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						เข้าสู่ระบบ
					</div>
					<div class="panel-body" align="center">
						<p>ชื่อเข้าใช้งาน หรือ รหัสผ่านไม่ถูกต้องค่ะ</p>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
