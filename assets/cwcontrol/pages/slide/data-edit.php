
<link href="../../theme/filer/jquery.filer.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../../theme/filer/jquery.filer.min.js?v=1.0.5"></script>
<style>
.jFiler-item-trash-action {
color:inherit ;
}
a:hover {
text-decoration: none;

}
</style>

<?php

$id = mysqli_real_escape_string($con,$_REQUEST["id"]);

$sql = "SELECT * FROM  tb_slide where slide_ID='".$id."' "; 
$result = mysqli_query($con,$sql); 
$data = mysqli_fetch_array($result);

?>          
<form role="form" action="query_sql.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="method" value="update"/>
<input type="hidden" name="id" value="<?php echo $data["slide_ID"]?>"/>
			
            <div class="row">
               <div class="col-lg-12" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       
                           <strong>แก้ไขข้อมูล</strong>
                         
                        
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-6">  
                          &nbsp;
                          </div> 
                             <div class="col-lg-6 text-right">  
                            <button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
                          </div>  
                                <div class="col-lg-12">
                                    
                                   
                                    
                                     <div class="row">
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                                <label>ชื่อภาพ</label>
                                                <input type="text" class="form-control" name="slide_Title" value="<?php echo $data["slide_Title"]?>">
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                    
                                    
                                    
                                    
                                     
                                     <div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group">
                                                <label>รูปภาพ ขนาด 1170x * 573px </label>
                                                <input  type="file" name="slide_Images" id="Images" onchange="readURL(this,'preview2')">
                                               <?php
												  if($data["slide_Images"]){
												?>
												<img id="preview2" class="img-thumbnail" src="../../../upload/<?php echo $data["slide_Images"]?>" alt="preview" width="400" />		 
												<input name="slide_Images" value="<?php echo $data["slide_Images"]?>" type="hidden">
												<?php
												  }else{
												  ?>
                                                <img style="display:none;" id="preview2" class="img-thumbnail" src="" alt="preview" width="400" />
												<?php
												  }
												  ?>
                                               
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                     
                                    
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
      
<script>
$('#Background').filer({
	limit: 1,
});
$('#Images').filer({
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