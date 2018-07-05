<?php
@session_start();
if(!isset($_SESSION["user_username"])){
  echo "<meta http-equiv='refresh' content='0;URL=../../../index.php'>";//ส่งค่าจากหน้านี้ไปหน้า index.php	

}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="../../theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../theme/css/sb-admin-2.css" rel="stylesheet">

 <!-- jQuery -->
<script src="../../theme/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../theme/bootstrap/js/bootstrap.min.js"></script>

<?php
include("../../inc/connect.php");
include('../../inc/class.upload/class.upload.php');


if ($_POST["method"] == "insert") {
	
	
	
		
		if ($_FILES["slide_Images"]["name"] != "") {

        
			$rename = "PHOTO_slide_" . date("d-m-Y_Hms");
		   
	
			$handle = new upload($_FILES["slide_Images"]);
	
		  
			 if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				//$handle->image_ratio_crop = "T";
				$handle->image_x = '1170';
				$handle->image_y = '573';
				//$handle->image_ratio_y        = true;
				$handle->jpeg_quality = '100';
				//$handle->image_watermark = '../../class.upload/bg.png';
	
				$handle->process('../../../upload');
			}
	
			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}

		}
	
	
	
	$sql2 = "SELECT * FROM  tb_slide  ";
	$result2 = mysqli_query($con,$sql2);
	$Num_Rows = mysqli_num_rows($result2);
	$Sort = $Num_Rows+1;
	
		$strSQL = "INSERT INTO tb_slide ";
		$strSQL .="(slide_ID";
		$strSQL .=",slide_Sort";
		$strSQL .=",slide_Images";
		$strSQL .=",slide_Title )";
		
		
		$strSQL .=" VALUES ";
		$strSQL .="('0' ";
		$strSQL .=",'" .$Sort. "' ";
		$strSQL .=",'" .$photo_name. "' ";
		$strSQL .=",'" .addslashes($_POST["slide_Title"]). "' )";
		
		
		$objQuery = mysqli_query($con,$strSQL);

   
}



if ($_POST["method"] == "update") {

	
		$strSQL = "UPDATE tb_slide SET ";
		$strSQL .="slide_Title = '" . addslashes($_POST["slide_Title"]) . "' ";
		$strSQL .=",slide_Date = NOW() ";
        $strSQL .="WHERE slide_ID = '" . $_POST["id"] . "' ";
        $objQuery = mysqli_query($con,$strSQL);
	
		


		if ($_FILES["slide_Images"]["name"] != "") {

        
			$rename = "PHOTO_slide_" . date("d-m-Y_Hms");
		   
	
			$handle = new upload($_FILES["slide_Images"]);
	
		  
			 if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				//$handle->image_ratio_crop = "T";
				$handle->image_x = '1170';
				$handle->image_y = '573';
				//$handle->image_ratio_y        = true;
				$handle->jpeg_quality = '100';
				//$handle->image_watermark = '../../class.upload/bg.png';
	
				$handle->process('../../../upload');
			}
	
			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}
			
			$strSQL = "UPDATE tb_slide SET ";
			$strSQL .="slide_Images = '" .$photo_name. "' ";
			$strSQL .="WHERE slide_ID = '" .$_POST["id"]. "' ";
			$objQuery = mysqli_query($con,$strSQL);
			@unlink("../../../upload/$_POST[slide_Images]");
			
			
		}
			
	
}





if ($_POST['method'] == "delete") {
	
	

	$strSQL = "SELECT * FROM tb_slide WHERE slide_ID='".$_POST['id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	$Images = $objResult["slide_Images"];
	@unlink("../../../upload/$Images");	
	

    $strSQL = "DELETE FROM tb_slide WHERE slide_ID='" . $_POST['id'] . "' ";
    $objQuery = mysqli_query($con,$strSQL);
	
}


if ($_POST['method'] == "delete_All") {
	
	for($i=0;$i<count($_POST["ids"]);$i++)
	{
		if($_POST["ids"][$i] != "")
		{
			
			
		
			$strSQL = "SELECT * FROM tb_slide WHERE slide_ID='".$_POST["ids"][$i]."' ";
			$objQuery = mysqli_query($con,$strSQL);
			$objResult = mysqli_fetch_array($objQuery);
			
			$Images = $objResult["slide_Images"];
			@unlink("../../../upload/$Images");
								
			$strSQL = "DELETE FROM tb_slide WHERE slide_ID='" .$_POST["ids"][$i]. "' ";
			$objQuery = mysqli_query($con,$strSQL);
			
			
		}
	}
}


if ($_POST['method'] == "status") {

	if($_POST['id']!=""){
		
			$sql = "SELECT * FROM tb_slide ";
			$sql .= "WHERE slide_ID = '".$_POST["id"]."' ";
			$result = mysqli_query($con,$sql);
			$data = mysqli_fetch_array($result);
			if($data["slide_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
	
		$strSQL = "UPDATE tb_slide SET ";
		$strSQL .="slide_Status = '" .$Status. "' ";
        $strSQL .="WHERE slide_ID = '" .$_POST["id"]. "' ";
        $objQuery = mysqli_query($con,$strSQL);
	
	
	}
}

if ($_POST['method'] == "Sort") {

	if($_POST['id']!=""){
		
				
		$strSQL = "UPDATE tb_slide SET ";
		$strSQL .="slide_Sort = '" .$_POST["value"]. "' ";
        $strSQL .="WHERE slide_ID = '" .$_POST["id"]. "' ";
        $objQuery = mysqli_query($con,$strSQL);
	
	
	}
}

//echo $strSQL;
if($objQuery){
    ?>
    <script>
        $(document).ready(function() {
			
			$('#Modal_success').modal('show');
								
			$('#Modal_success').on('hidden.bs.modal', function (e) {
					window.location='index.php';
				});
			/*setInterval(function(){
				$('#Modal_success').modal('hide');
				
				$('#Modal_success').on('hidden.bs.modal', function (e) {
					window.location='index.php';
				});
				
				},2000
			);				*/
			
        });
    </script>
    <?php
}else{
    ?>
    <script>
        $(document).ready(function() {
           $('#Modal_error').modal('show');
			$('#Modal_error').on('hidden.bs.modal', function (e) {
					window.location='index.php';
				});
        });
    </script>
    <?php
}

//echo $strSQL;
mysqli_close($con);
?>




<div class="modal fade" id="Modal_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-success" style="margin-bottom:0px;">
    <div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        บันทึกข้อมูล
    </div>
    <div class="panel-body" align="center">
        <p>บันทึกข้อมูลสำเร็จ</p>
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
        บันทึกข้อมูล
    </div>
    <div class="panel-body" align="center">
        <p>เกิดข้อผิดพลาด กรุณาทำรายการใหม่ภายหลังค่ะ</p>
    </div>
	</div>
    </div>
  </div>
</div>

