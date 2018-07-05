<?php
include("../../inc/paging.inc.php");
$current_page = 1;
if(isset($_GET['page'])) {
 	$current_page = $_GET['page'];
}

if(isset($_SESSION["rows_per_page"]) != ""){
	$rows_per_page = $_SESSION["rows_per_page"];
}else{
	$rows_per_page = 3;
}


$start_row = paging_start_row($current_page, $rows_per_page);


if(isset($_REQUEST["txtKeyword"])){
	$word = $_REQUEST["txtKeyword"];
}else{
	$word ="";
}


$sql = " SELECT * FROM  tb_slide ";
$sql .=	" ORDER BY slide_Sort ASC ";

$result = mysqli_query($con,$sql)or die($sql);
$Num_Rows = mysqli_num_rows($result);

$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

$sql .= "LIMIT $start_row, $rows_per_page";
$result = mysqli_query($con,$sql);

//echo $sql;

?> 
<style>
select{
	width: auto !important;
	height: auto !important;
    padding: 1px !important;	
}
.pagination {
	margin: 0px 0 !important; 
	float:right;
}

</style>   
<div class="row">
               <div class="col-lg-12" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       
                           <strong>Slide</strong>
                         
                        
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-6">  
                           
                          </div>
                          
                             <div class="col-lg-6 text-right"> 
                             <a data-toggle="modal" href="#Modal_deleteAll" class="btn btn-danger">ลบข้อมูล</a> 
                             <a href="index.php?type=add" class="btn btn-primary">เพิ่มข้อมูล</a>
                          	 </div> 
                             
                              
                                <div class="col-lg-12">
                                    
<div class="table-responsive">


  <table class="table table-striped table-bordered table-hover" style="margin-top:10px;">
   <thead>
    <tr>
      <td width="4%" align="center">ลำดับ</td>
      <td width="1%" align="center"><input type="checkbox" name="CheckAll" id="selectAll" ></td>
      <td align="center">รูปภาพ</td>
      <td width="15%" align="center">วันที่</td>
      <td width="10%" align="center">เรียงลำดับ</td>
      <td width="10%" align="center">สถานะ</td>
      <td width="5%" align="center">แก้ไข</td>
      <td width="5%" align="center">ลบ</td>
    </tr>
 </thead>
 <tbody>
<?php
	if($Num_Rows == 0){
	?>
	<tr>
		<td colspan="12" align="center">ไม่พบข้อมูล</td>
	</tr>
	<?php 
	}
	$i = $start_row;
	while($data = mysqli_fetch_array($result)) {
		
		$i++;
	 ?>    
 <tr> 
 <td align="center"><?php echo $i;?></td> 
 <td align="center"><input class="ChkBox" type="checkbox" name="checkboxlist"  value="<?php echo $data["slide_ID"];?>"></td>
 <td align="center">
   <?php
	 if($data["slide_Images"]){
			?>
   <img class="img-rounded" src="../../../upload/<?php echo $data["slide_Images"]?>" alt="preview" width="400" />
   <?php
	}
	?>
   
   
   
 </td>
 
 <td align="center"><?php echo DateThai_timestame($data["slide_Date"]);?></td> 
 <td align="center">
 <select class="form-control Sort" id="<?php echo $data['slide_ID'];?>">
     <?php
		$sql2 = "SELECT * FROM  tb_slide "; 
		$result2 = mysqli_query($con,$sql2);
		$t = 0;
		while($data2=mysqli_fetch_array($result2)){
			$t++;
				   						
	
	?>
<option value="<?php echo $t;?>" <?php if($data["slide_Sort"] == $t){ echo "selected"; }?> ><?php echo $t;?></option>
<?php
		}
		
	?>
 </select>
 
 </td>
 <td align="center">

    <input type="checkbox" class="status" data-size="mini" data-on-color="success" id="<?php echo $data["slide_ID"];?>" <?php if($data["slide_Status"] == 1){ echo "checked";}?>>
    

 </td>
 <td align="center"><a href="index.php?type=edit&id=<?php echo $data["slide_ID"]?>"><i class="fa fa-cog" style="color:#333;font-size:1.4em"></i></a></td>
 <td align="center"><a href="#" class="delete" id="<?php echo $data['slide_ID'];?>"><i class="fa fa-trash-o" style="color:#333;font-size:1.4em"></i></a></td>
 </tr>
 
 <?php }?>
 
 </tbody>
  </table>
</div>
                                        
                                    
                                </div>
                                
                                
                                
                              
                            </div>
                            <!-- /.row (nested) -->
                            
                           <div class="row">
                              <div class="col-lg-6">
                                    <strong>ทั้งหมด <?php echo $Num_Rows?> รายการ  หน้า : <?php echo $current_page?> / <?php echo $total_pages?></strong>
                              </div>
                          	  <div class="col-lg-6">
                                 <nav>
                                  <ul class="pagination">
                                    
                <?php
        
                if($Num_Rows > $rows_per_page){
                $page_range = 5;
                $qry_string = "";	//ในที่นี้ไม่มี query string
                $txtKeyword=$_REQUEST["txtKeyword"];
                //สร้างลิงค์การเชื่อมโยงระหว่างเพจ โดยเรียกฟังก์ชันที่อยู่ใน include file
                $page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string,$txtKeyword);
                $keyword = keyword($word);
                
                echo $page_str;
                }
                
                ?>
                                    
                                  </ul>
                       		  </nav>
                           </div>
                       </div> 
                                
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->          
            </div>

<script type="text/javascript">
$(document).ready(function(){ 

$("#selectAll").click(function(){
     var checkAll = $(this).prop("checked");
     $("input.ChkBox").each(function(){
          $(this).prop({"checked":checkAll});
     });
});

	$('.delete').click(function(){
		//alert();
		$('#Modal_delete').modal('show');
		
		var ID = $(this).attr("id");
		var dataString='id='+ID;
		$('#btn_delete').click(function(){
			jQuery.ajax({
			type: "POST",
			url: "query_sql.php",
			data: {id:ID, method:'delete'},
			cache: false,
			success: function(html)
				{
					location.reload();
					
				}
		});//จบการส่งข้อมูล
		});
 		return false;
	});
	
	$('#btn_deleteAll').click(function(){
			//if($("#checkkBoxId").attr("checked")==true)
            var checkValues = $('input[name=checkboxlist]:checked').map(function()
            {
                return $(this).val();
            }).get();

            $.ajax({
                url: 'query_sql.php',
                type: 'post',
                data: { ids: checkValues ,method:"delete_All"},
                success:function(data){
					//alert(data);
					location.reload();
					$('#btn_deleteAll').modal('hide')
                }
            });
			
	});
			
			$(".status").bootstrapSwitch({
			  onSwitchChange: function(event, state) {
				var ID = $(this).attr("id");
				//alert(ID);
				$.ajax({
						url: 'query_sql.php',
						type: 'post',
						data: {id:ID,method:"status"},
						success:function(data){
							//alert(data);
							//location.reload();
							
						}
				});
			  }
			});
			
			
			
			
			$('.Sort').change(function(){
			
			var ID = $(this).attr("id");
			var no = $(this).val();
			//alert(no);
			$.ajax({
					url: 'query_sql.php',
					type: 'post',
					data: {id:ID,method:"Sort",value:no,},
					success:function(data){
						//alert(data);
						location.reload();
						
					}
				});
			
			});
			
			
	});

</script>


<div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-danger" style="margin-bottom:0px;">
    <div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    ลบข้อมูล
       
    </div>
    <div class="panel-body" align="center">
        <p> ยืนยันการลบข้อมูล</p>
    </div>
    <div class="modal-footer">        
        <button type="button" id="btn_delete" class="btn btn-danger">ลบข้อมูล</button>              
     </div>
	</div>
    </div>
  </div>
</div>


<div class="modal fade" id="Modal_deleteAll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-danger" style="margin-bottom:0px;">
    <div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    ลบข้อมูล
       
    </div>
    <div class="panel-body" align="center">
        <p> ยืนยันการลบข้อมูลทั้งหมดที่เลือก</p>
    </div>
    <div class="modal-footer">        
        <button type="button" id="btn_deleteAll" class="btn btn-danger">ลบข้อมูล</button>              
     </div>
	</div>
    </div>
  </div>
</div>