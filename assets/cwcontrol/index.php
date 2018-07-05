<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="theme/bootstrap/css/bootstrap.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="theme/css/sb-admin-2.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <form id="target" method="post" action="#">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="theme/js/jquery.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="theme/bootstrap/js/bootstrap.min.js"></script>

  
    
    
<script type="text/javascript">
$(document).ready(function(){
	
		
			
			$( "#target" ).submit(function( event ) {
				event.preventDefault();
				
				var remember_me;
					if ($('#remember_me').is(":checked")){
						remember_me = "on";
					}else{
						remember_me = "off";
					}
					
					if ($("#txtUsername").val() == "" || $("#txtPassword").val() == "") {
						
						alert($("#txtUsername").val());
						$('#Modal_none').modal('show');
						
						$('#Modal_none').on('hidden.bs.modal', function (e) {
						  $("#txtUsername").focus();
						})
						
						/*setInterval(function(){
							$('#Modal_login_null').modal('hide');
							
							$('#Modal_login_null').on('hidden.bs.modal', function (e) {
								$("#txtUsername").focus();
							});
							
							},2000
						);*/
						
						
			 		}else{
						$.post("check_login.php", { 
						Username: $("#txtUsername").val(), 
						Password: $("#txtPassword").val(), 
						remember_me: remember_me}, 
						function(result){
							//alert(result);
							if(result == "true"){
								$('#Modal_success').modal('show');
								
								$('#Modal_success').on('hidden.bs.modal', function (e) {
										window.location = 'pages/slide/index.php';
									});
								setInterval(function(){
									$('#Modal_success').modal('hide');
									
									$('#Modal_success').on('hidden.bs.modal', function (e) {
										window.location = 'pages/slide/index.php';
									});
									
									},2000
								);
								
								
							}else{
								$('#Modal_error').modal('show');
								
								$('#Modal_error').on('hidden.bs.modal', function (e) {
										$("#txtUsername").val("") 
										$("#txtPassword").val("")  
										$("#txtUsername").focus();
									});
								/*setInterval(function(){
									$('#Modal_login_error').modal('hide');
									
									$('#Modal_login_error').on('hidden.bs.modal', function (e) {
										$("#txtUsername").val("") 
										$("#txtPassword").val("")  
										$("#txtUsername").focus();
									});
									
									},2000
								);*/
								
								
							}
					});
 				} 
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
