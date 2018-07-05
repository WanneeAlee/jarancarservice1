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
<div class="row" >
               <div class="col-lg-12" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       
                           <strong>Service</strong>
                         
                        
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-6">  
                           <form class="form-inline" action="<?php echo $page_url;?>" method="post">
                          <div class="form-group">                            
                            <input type="text" class="form-control" name="Keyword" placeholder="ค้นหา" value="<?php if(isset($word)){echo $word;}?>">
                          </div>
                          <button type="submit" class="btn btn-warning">ค้นหา</button>
                        </form>
                          </div>
                          
                             <div class="col-lg-6 text-right"> 
                             <a data-toggle="modal" href="#Modal_deleteAll" class="btn btn-danger">ลบข้อมูล</a> 
                             <a href="<?php echo $page_url;?>?type=add" class="btn btn-primary">เพิ่มข้อมูล</a>
                          	 </div> 
                             
                              
                                <div class="col-lg-12">
                                    
<div class="table-responsive">


  <table class="table table-striped table-bordered table-hover" style="margin-top:10px;" width="100%">
   <thead>
    <tr>
      <td width="4%" align="center">ลำดับ</td>
      <td width="1%" align="center"><input type="checkbox" name="CheckAll" id="selectAll" ></td>
      <td width="27%" align="center">ชื่อ</td>
      <td width="20%" align="center">วันที่</td>
      <td width="8%" align="center">หน้าแรก</td>
      <td width="8%" align="center">เรียงลำดับ</td>
      <td width="8%" align="center">สถานะ</td>
      <td width="8%" align="center">แก้ไข</td>
      <td width="8%" align="center">ลบ</td>
    </tr>
 </thead>
 <tbody>
<?php
if(!isset($news)){
?>
<tr>
	<td colspan="11" align="center">ไม่พบข้อมูล</td>
</tr>
<?php 
}else{
$i=$pagination["start_row"];								   
foreach ($news as $row)
{
$i++;	
?>    
 <tr> 
 <td align="center"><?php echo $i;?></td> 
 <td align="center"><input class="ChkBox" type="checkbox" name="checkboxlist"  value="<?php echo $row["news_ID"];?>"></td> 
 <td align="center"><?php echo $row["news_Name_TH"]?></td>
 <td align="center"><?php echo DateThai_timestame($row["news_Date"]);?></td>
 <td align="center">
 <a id="<?php echo $row['news_ID'];?>" class="Home" href="javascript:void(0)">
	<?php
    if($row["news_Home"] == 1){
        ?><i class="fa fa-check-square" style="color:#2aabd2;font-size:1.4em"></i><?php
    }else{
        ?><i class="fa fa-square-o" style="color:#2aabd2;font-size:1.4em"></i><?php
    }
    ?>
    </a>
 </td>
 <td align="center">
 <select class="form-control Sort" id="<?php echo $row['news_ID'];?>">
     <?php
		
		$query2 = $this->db->where('news_Type', $page)->get('tb_news');
		
		$t = 0;
		foreach ($query2->result_array() as $row2)
		{
		$t++;
				   						
	
	?>
<option value="<?php echo $t;?>" <?php if($row["news_Sort"] == $t){ echo "selected"; }?>><?php echo $t;?></option>
<?php
		}
		
	?>
 </select>
 
 </td>
 <td align="center">

    <input type="checkbox" class="status" data-size="mini" data-on-color="success" id="<?php echo $row["news_ID"];?>" <?php if($row["news_Status"] == 1){ echo "checked";}?>>
    

 </td>
 <td align="center"><a href="<?php echo $page_url;?>?type=edit&id=<?php echo $row["news_ID"]?>"><i class="fa fa-cog" style="color:#333;font-size:1.4em"></i></a></td>
 <td align="center"><a href="#" class="delete" id="<?php echo $row['news_ID'];?>"><i class="fa fa-trash-o" style="color:#333;font-size:1.4em"></i></a></td>
 </tr>
 
 <?php }}?>
 
 </tbody>
  </table>
</div>
                                 
  
                                        
                                       
                                        
                                        
                                    
                                </div>
                                
                                
                                
                              
                            </div>
                            <!-- /.row (nested) -->
                            
                           <!-- Pagination -->
                              
                             <div class="row">
                              <div class="col-lg-6">
                                    <strong>ทั้งหมด <?php echo $pagination["Num_Rows"]?> รายการ  หน้า : <?php echo $pagination["current_page"]?> / <?php echo $pagination["total_pages"]?></strong>
                              </div>
                          	  <div class="col-lg-6">
                                 <nav>
                                  <ul class="pagination">
                                    
                					<?php if(isset($page_str)){echo $page_str;} ?>
                                    
                                  </ul>
                       		  </nav>
                           </div>
                       </div>  
                               
                           <!-- /.Pagination -->    
                            
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
		
		$('#Modal_delete').modal('show');
		
		var ID = $(this).attr("id");
		var dataString='id='+ID;
		
		$('#btn_delete').click(function(){
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url('cwcontrol/'.$page.'/delete');?>",
			data: {id:ID},
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
                url: '<?php echo base_url('cwcontrol/'.$page.'/delete_All');?>',
                type: 'post',
                data: { id: checkValues},
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
						url: '<?php echo base_url('cwcontrol/'.$page.'/status');?>',
						type: 'post',
						data: {id:ID},
						success:function(data){
							//alert(data);
							//location.reload();
							
						}
				});
			  }
			});
			
			$('.Home').click(function(){
			
				var ID = $(this).attr("id");
				//alert(ID);
				$.ajax({
						url: '<?php echo base_url('cwcontrol/'.$page.'/home');?>',
						type: 'post',
						data: {id:ID},
						success:function(data){
							//alert(data);							
							location.reload();
							
						}
				});
			  
			});
			
			
			
			
			$('.Sort').change(function(){
			
			var ID = $(this).attr("id");
			var no = $(this).val();
			//alert(ID);
			$.ajax({
					url: '<?php echo base_url('cwcontrol/'.$page.'/Sort');?>',
					type: 'post',
					data: {id:ID,value:no,},
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