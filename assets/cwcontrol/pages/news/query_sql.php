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
	
	if ($_FILES["news_Images"]["name"] != "") {

        
			$rename = "PHOTO_news_" . date("d-m-Y_Hms");
		   
	
			$handle = new upload($_FILES["news_Images"]);
	
		  
			 if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				//$handle->image_ratio_crop = "T";
				$handle->image_x = '720';
				$handle->image_y = '406';
				//$handle->image_ratio_y        = true;
				$handle->jpeg_quality = '100';
				 
				//$handle->image_watermark = '../../../images/logo_watermark.png';
	
				$handle->process('../../../upload');
			}
	
			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}
			
		}
	
	
	$sql2 = "SELECT * FROM  tb_news "; 
	$result2 = mysqli_query($con,$sql2);
	$Num_Rows = mysqli_num_rows($result2);
	$Sort = $Num_Rows+1;
	
		$strSQL = "INSERT INTO tb_news ";
		$strSQL .="(news_ID";
		$strSQL .=",news_Images";
		$strSQL .=",news_Title";
		$strSQL .=",news_Date";
		$strSQL .=",news_des1";
		$strSQL .=",news_des2";
		$strSQL .=",news_Sort)";
				
		$strSQL .=" VALUES ";
		$strSQL .="('0' ";
		$strSQL .=",'" .$photo_name. "' ";
		$strSQL .=",'" .addslashes($_POST["news_Title"]). "' ";
		$strSQL .=",Now() ";
		$strSQL .=",'" .addslashes($_POST["news_des1"]). "' ";
		$strSQL .=",'" .addslashes($_POST["news_des2"]). "' ";
		$strSQL .=",'" .$Sort."'  )";

	
		$objQuery = mysqli_query($con,$strSQL);
		
		$id = mysqli_insert_id($con);

	
		$files = array();
		foreach ($_FILES['news_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
				$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = $_FILES['news_gallery']['name'];
			}
		}
		
		foreach ($files as $file) {

           

            
            $filenamex = "gallery_news_".date("d-m-Y_Hms");
            
			
            $handle = new upload($file);
			

			
            if ($handle->uploaded) {
            $handle->file_new_name_body   = $filenamex;
            //$handle->image_resize         = true;
			//$handle->image_ratio_crop     = "T";
            //$handle->image_x              = '358';
			//$handle->image_y       		  = '202' ;
            //handle->image_ratio_y        = true;
            $handle->jpeg_quality = '100';
			//$handle->image_watermark = '../../../images/logo_watermark.png';

            $handle->process('../../../upload');
			$image_name_thumb =  $handle->file_dst_name ; 

			
            if ($handle->processed) {
			$strSQL = "INSERT INTO tb_news_gallery ";
			$strSQL .="(gallery_ID,gallery_Images,news_ID) ";
			$strSQL .="VALUES ";
			$strSQL .="('0' ";
			$strSQL .=",'".$image_name_thumb."' ";
			$strSQL .=",'".$id."') ";
			$objQuery = mysqli_query($con,$strSQL);
        }
      
    }
}
	
	


	
   
}



if ($_POST["method"] == "update") {

	
		$strSQL = "UPDATE tb_news SET ";
		$strSQL .="news_Title 		= '" . addslashes($_POST["news_Title"]) . "' ";
		$strSQL .=",news_des1		= '" . addslashes($_POST["news_des1"]) . "' ";
		$strSQL .=",news_des2 		= '" . addslashes($_POST["news_des2"]) . "' ";
		$strSQL .=",news_Date 		= NOW() ";
        $strSQL .="WHERE news_ID 	= '" . $_POST["id"] . "' ";
        $objQuery = mysqli_query($con,$strSQL);
		
		
		
		

		if ($_FILES["news_Images"]["name"] != "") {
	
			
				$rename = "PHOTO_newa_" . date("d-m-Y_Hms");
			   
		
				$handle = new upload($_FILES["news_Images"]);
		
			  
				 if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
					$handle->image_x = '720';
					$handle->image_y = '406';
					//$handle->image_ratio_y        = true;
					$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../../images/logo_watermark.png';
					
					 
					$handle->process('../../../upload');
				}
		
				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}
				
				$strSQL = "UPDATE tb_news SET ";
				$strSQL .="news_Images = '" .$photo_name. "' ";
				$strSQL .="WHERE news_ID = '" .$_POST["id"]. "' ";
				$objQuery = mysqli_query($con,$strSQL);
				
				@unlink("../../../upload/$_POST[news_Images]");
			}
			
			
			
			
		$files = array();
		foreach ($_FILES['news_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
				$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = $_FILES['news_gallery']['name'];
			}
		}
		
		foreach ($files as $file) {

           

            
            $filenamex = "gallery_news_".date("d-m-Y_Hms");
            
			
            $handle = new upload($file);

			
            if ($handle->uploaded) {
            $handle->file_new_name_body   = $filenamex;
            //$handle->image_resize         = true;
			//$handle->image_ratio_crop     = "T";
            //$handle->image_x              = '358';
			//$handle->image_y       		  = '202' ;
            //handle->image_ratio_y        = true;
			
            $handle->jpeg_quality = '100';
			//$handle->image_watermark = '../../../images/logo_watermark.png';
				
            $handle->process('../../../upload');
			$image_name_thumb =  $handle->file_dst_name ; 

			
            if ($handle->processed) {
			
				
				
			$strSQL = "INSERT INTO tb_news_gallery ";
			$strSQL .="(gallery_ID,gallery_Images,news_ID) ";
			$strSQL .="VALUES ";
			$strSQL .="('0' ";
			$strSQL .=",'".$image_name_thumb."' ";
			$strSQL .=",'".$_POST["id"]."') ";
			$objQuery = mysqli_query($con,$strSQL);
        }
      
    }
}
	
			
	
}




if ($_POST['method'] == "delete_gallery") {

	if($_POST['id']!=""){
	
	
	$strSQL = "SELECT * FROM  tb_news_gallery WHERE gallery_ID='".$_POST['id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	$photos_Name = $objResult["gallery_Images"];
	
	//@unlink("../../../upload/full_$photos_Name");
	@unlink("../../../upload/$photos_Name");
	

	
	$strSQL="DELETE FROM tb_news_gallery WHERE gallery_ID='".$_POST['id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	
	
	}
	

}


if ($_POST['method'] == "delete") {
	
	$strSQL = "SELECT * FROM  tb_news_gallery WHERE news_ID='".$_POST['id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	while($objResult = mysqli_fetch_array($objQuery)){
		
		//@unlink("../../../upload/full_$objResult[gallery_Images]");
		@unlink("../../../upload/$objResult[gallery_Images]");
		
	}

	$strSQL="DELETE FROM tb_news_gallery WHERE news_ID='".$_POST['id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	

	$strSQL = "SELECT * FROM tb_news WHERE news_ID='".$_POST['id']."' ";

	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	$Images = $objResult["news_Images"];
	@unlink("../../../upload/$Images");	
	

    $strSQL = "DELETE FROM tb_news WHERE news_ID='" . $_POST['id'] . "' ";
    $objQuery = mysqli_query($con,$strSQL);
	
}

if ($_POST['method'] == "delete_All") {
	
	for($i=0;$i<count($_POST["ids"]);$i++)
	{
		if($_POST["ids"][$i] != "")
		{
			
			
			$strSQL = "SELECT * FROM  tb_news_gallery WHERE news_ID='".$_POST["ids"][$i]."' ";
			$objQuery = mysqli_query($con,$strSQL);
			while($objResult = mysqli_fetch_array($objQuery)){
				
				//@unlink("../../../upload/full_$objResult[gallery_Images]");
				@unlink("../../../upload/$objResult[gallery_Images]");
				
			}
		
			$strSQL="DELETE FROM tb_news_gallery WHERE news_ID='".$_POST["ids"][$i]."' ";
			$objQuery = mysqli_query($con,$strSQL);
			
		
			$strSQL = "SELECT * FROM tb_news WHERE news_ID='".$_POST["ids"][$i]."' ";
			$objQuery = mysqli_query($con,$strSQL);
			$objResult = mysqli_fetch_array($objQuery);
			
			$Images = $objResult["product_Images"];
			@unlink("../../../upload/$Images");
			
					
			$strSQL = "DELETE FROM tb_news WHERE news_ID='" .$_POST["ids"][$i]. "' ";
			$objQuery = mysqli_query($con,$strSQL);
			
			
		}
	}
}


if ($_POST['method'] == "status") {

	if($_POST['id']!=""){
		
			$sql = "SELECT * FROM tb_news ";
			$sql .= "WHERE news_ID = '".$_POST["id"]."' ";
			$result = mysqli_query($con,$sql);
			$data = mysqli_fetch_array($result);
			if($data["news_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
	
		$strSQL = "UPDATE tb_news SET ";
		$strSQL .="news_Status = '" .$Status. "' ";
        $strSQL .="WHERE news_ID = '" .$_POST["id"]. "' ";
        $objQuery = mysqli_query($con,$strSQL);
	
	
	}
}






if ($_POST['method'] == "Sort") {

	if($_POST['id']!=""){
		
				
		$strSQL = "UPDATE tb_news SET ";
		$strSQL .="news_Sort = '" .$_POST["value"]. "' ";
        $strSQL .="WHERE news_ID = '" .$_POST["id"]. "' ";
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

