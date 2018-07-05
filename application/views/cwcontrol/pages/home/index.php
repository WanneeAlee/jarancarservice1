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

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0px;">
            
            
            <?php $this->load->view('cwcontrol/header');?>   
            <!-- /.navbar-top-links -->

			
            <?php $this->load->view('cwcontrol/left_menu');?>   
            <!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper">

			<form role="form"
				action="<?php echo base_url('cwcontrol/'.$page.'/update');?>"
				method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $about_ID;?>" />
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12" style="margin-top: 20px;">
						<div class="panel panel-default">
							<div class="panel-heading">

								<strong><?php echo $title?></strong>


							</div>
							<div class="panel-body">

								<div class="row">
									<div class="col-lg-6">  
                            Update : <?php echo $about_Date;?>
                          </div>
									<div class="col-lg-6 text-right">
										<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
									</div>
									<div class="col-lg-12">




										<ul class="nav nav-tabs">
											<li class="active"><a data-toggle="tab" href="#home">ภาษาไทย</a></li>
											<li><a data-toggle="tab" href="#menu1">English</a></li>
										</ul>

										<div class="tab-content">
											<div id="home" class="tab-pane fade in active">
											<br>
												<div class="row">
													<div class="col-lg-12">
														<div class="form-group">
															<label>รายละเอียด TH</label>
															<div class="container">
																<textarea name="about_Detail_TH"
																	class="form-control ckeditor" rows="3"><?php echo $about_Detail_TH;?></textarea>
															</div>
														</div>
													</div>
												</div>
												
												
											</div>
											<div id="menu1" class="tab-pane fade">
												<br>
												<div class="row">
													<div class="col-lg-12">
														<div class="form-group">
															<label>รายละเอียด EN</label>
															<div class="container">
																<textarea name="about_Detail_EN"
																	class="form-control ckeditor" rows="3"><?php echo $about_Detail_EN?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>



									</div>

									<div class="col-lg-12 text-right">
										<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
									</div>

								</div>
								<!-- /.row (nested) -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-12 -->
				</div>
			</form>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
<?php $this->load->view('cwcontrol/footer');?>   
    </div>
	<!-- /#wrapper -->

	<script type="text/javascript">

tinymce.init({
    selector: 'textarea.ckeditor',
	menubar : false,
	force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '',
	height: 600, 
	/*width : 860,*/
	plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor moxiemanager colorpicker layer textpattern"
   ],    
    toolbar: 'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code',
	
	
  });

</script>



	<script>
$('#Images').filer({
	limit: 1,
   
});
$('#Images2').filer({
	limit: 1,
   
});	

function readURL(input,id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            
			$("#"+id).css("display", "block").prop("src", e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

</script>

</body>

</html>