
<style>
    #list1 li{
        /*display: inline-block;*/
        float: left;
    }
    /*.placeHolder{
        width: 100%;
        height: 100%;
        border: 2px dashed #c2cdda;
        border-radius: 4px;
    }    */
</style>                   
<form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/update');?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $news["news_ID"]?>"/>
			
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
                                                <label>ชื่อ (TH)</label>
                                                <input type="text" class="form-control" name="news_Name_TH" required value="<?php echo $news["news_Name_TH"]?>">
                                                
                                            </div>  
                                        </div>
                                        
                                        <div class="col-lg-6">  
                                          <div class="form-group">
                                                <label>ชื่อ (EN)</label>
                                                <input type="text" class="form-control" name="news_Name_EN" required value="<?php echo $news["news_Name_EN"]?>">
                                                
                                            </div>  
                                        </div>
                           			   </div>
                           			   
                           			   <div class="row">
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>รายละเอียดย่อ (TH)</label>
                                            <textarea name="news_Des_TH" class="form-control" rows="5"><?php echo str_replace("<br>", "", $news["news_Des_TH"])?></textarea>
                                                
                                            </div>  
                                        </div>
                                        
                                        <div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>รายละเอียดย่อ (EN)</label>
                                            <textarea name="news_Des_EN" class="form-control" rows="5"><?php echo str_replace("<br>", "", $news["news_Des_EN"])?></textarea>
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                    
                                    <div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group">
                                            <label>รายละเอียด (TH)</label>
                                            <textarea name="news_Detail_TH" class="form-control ckeditor" rows="3"><?php echo $news["news_Detail_TH"]?></textarea>
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                   
                                   	<div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group">
                                            <label>รายละเอียด (EN)</label>
                                            <textarea name="news_Detail_EN" class="form-control ckeditor" rows="3"><?php echo $news["news_Detail_TH"]?></textarea>
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                     
                                    
                                                                                                                     
                                     
                                     <div class="row">
                            			<div class="col-lg-5">  
                                          <div class="form-group">
                                                <label>รูปภาพปก ขนาด 144px * 128px </label>
                                                <input  type="file" name="news_Images" class="Images">
                                                 <?php
												  if($news["news_Images"]){
												?>
														 
												<input name="news_Images" value="<?php echo $news["news_Images"]?>" type="hidden">
												<?php
												  }
												  ?>
                                                
                                                <script>
											  	$('.Images').filer({
													limit: 1,
													showThumbs: true,
													templates: {
															box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
															item: '<li class="jFiler-item">' +
																		'<div class="jFiler-item-container">' +
																			'<div class="jFiler-item-inner">' +
																				'<div class="jFiler-item-thumb">' +
																					'<div class="jFiler-item-status"></div>' +
																					'<div class="jFiler-item-info">' +
																						'<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>' +
																						'<span class="jFiler-item-others">{{fi-size2}}</span>' +
																					'</div>' +
																					'{{fi-image}}' +
																				'</div>' +
																				'<div class="jFiler-item-assets jFiler-row">' +
																					'<ul class="list-inline pull-left">' +
																						'<li>{{fi-progressBar}}</li>' +
																					'</ul>' +
																					'<ul class="list-inline pull-right">' +
																						'<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>' +
																					'</ul>' +
																				'</div>' +
																			'</div>' +
																		'</div>' +
																	'</li>',
															itemAppend: '<li class="jFiler-item">' +
																			'<div class="jFiler-item-container">' +
																			   '<div class="jFiler-item-inner">' +
																					'<div class="jFiler-item-thumb">' +
																						'<div class="jFiler-item-status"></div>' +
																						'<div class="jFiler-item-info">' +
																							'<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>' +
																							'<span class="jFiler-item-others">{{fi-size2}}</span>' +
																						'</div>' +
																						'{{fi-image}}' +
																					'</div>' +
																					'<div class="jFiler-item-assets jFiler-row">' +
																						'<ul class="list-inline pull-left">' +
																							'<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
																						'</ul>' +
																						'<ul class="list-inline pull-right">' +
																							'<li><!--<a class="icon-jfi-trash jFiler-item-trash-action" id="{{fi-name}}"></a>--></li>' +
																						'</ul>' +
																					'</div>' +
																				'</div>' +
																			'</div>' +
																		'</li>',
															progressBar: '<div class="bar"></div>',
															itemAppendToEnd: false,
															removeConfirmation: true,
															_selectors: {
																list: '.jFiler-items-list',
																item: '.jFiler-item',
																progressBar: '.bar',
																remove: '.jFiler-item-trash-action'
															}
														},
														<?php if($news["news_Images"]){?>
														files: [
															{
																name: "<?php echo $news["news_ID"]?>",
																type: "image",
																file: "<?php echo asset_url()?>upload/<?php echo $news["news_Images"]?>"


															}

														],
													<?php } ?>
														
												});
											  </script>
                                            </div>  
                                        </div>
                           			 </div>
                                 
                                 
                                 	<!--<div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group" id="aaa">
                                                <label>แกลอรี่ </label>
                                                <input  type="file" name="news_gallery[]" id="gallery" multiple>
                                               
                                                
                                               <script>   
                                               $('#gallery').filer({
												addMore: true,
												showThumbs: true,
												templates: {
														box: '<ul id="list1" class="jFiler-items-list jFiler-items-grid sort"></ul>',
														item: '<li class="jFiler-item">' +
																	'<div class="jFiler-item-container">' +
																		'<div class="jFiler-item-inner">' +
																			'<div class="jFiler-item-thumb">' +
																				'<div class="jFiler-item-status"></div>' +
																				'<div class="jFiler-item-info">' +
																					'<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>' +
																					'<span class="jFiler-item-others">{{fi-size2}}</span>' +
																				'</div>' +
																				'{{fi-image}}' +
																			'</div>' +
																			'<div class="jFiler-item-assets jFiler-row">' +
																				'<ul class="list-inline pull-left">' +
																					'<li>{{fi-progressBar}}</li>' +
																					'<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
																				'</ul>' +
																				'<ul class="list-inline pull-right">' +
																					'<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li><input type="hidden" name="sort[]" id="sort" />' +
																				'</ul>' +
																			'</div>' +
																		'</div>' +
																	'</div>' +
																'</li>',
														itemAppend: '<li class="jFiler-item">' +
																		'<div class="jFiler-item-container">' +
																			'<div class="jFiler-item-inner">' +
																				'<div class="jFiler-item-thumb">' +
																					'<div class="jFiler-item-status"></div>' +
																					'<div class="jFiler-item-info">' +
																						'<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>' +
																						'<span class="jFiler-item-others">{{fi-size2}}</span>' +
																					'</div>' +
																					'{{fi-image}}' +
																				'</div>' +
																			   ' <div class="jFiler-item-assets jFiler-row">' +
																					'<ul class="list-inline pull-left">' +
																						'<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
																					'</ul>' +
																					'<ul class="list-inline pull-right">' +
																						'<li><a class="icon-jfi-trash jFiler-item-trash-action" idg="{{fi-name}}"></a></li><input type="hidden" name="sort-{{fi-name}}" id="sort" /><input type="hidden" name="gallery_ID[]" id="sortid" value="{{fi-name}}">' +
																					'</ul>' +
																				'</div>' +
																			'</div>' +
																		'</div>' +
																	'</li>',
														progressBar: '<div class="bar"></div>',
														itemAppendToEnd: true,
														removeConfirmation: true,
														_selectors: {
															list: '.jFiler-items-list',
															item: '.jFiler-item',
															progressBar: '.bar',
															remove: '.jFiler-item-trash-action'
														}
													},
													files: [

											<?php
											
											if(isset($news["news_gallery"])){
											foreach ($news["news_gallery"] as $row_gallery)					

											{

											?>

														{
															name: "<?php echo $row_gallery["gallery_ID"]?>",
															type: "image",
															file: "<?php echo asset_url()?>upload/gallery/full_<?php echo $row_gallery["gallery_Images"]?>",


														},
											<?php }}else{?>{}<?php }?>
													],
													onRemove: function(el){			
														var ids = el.find(".icon-jfi-trash").attr("idg");
														$.post('<?php echo base_url('cwcontrol/'.$page.'/delete_gallery');?>', {id: ids});
													},
													afterShow: function(el){

													   saveOrder();
													},
													captions: {
													removeConfirmation: 'ยืนยันการลบข้อมูล',

													},

											});


											</script>
                                                
                                            </div>  
                                        </div>
                           			 </div>-->
                           			 
                           			 
                           			
                                    
                                      
                                </div>
                                
                                <div class="col-lg-12 text-right">  
                                    <button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
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
      

 

<script type="text/javascript">

tinymce.init({
    selector: 'textarea.ckeditor',
	menubar : false,
	force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '',
	height: 400, 
	//width : 1100,
	plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor moxiemanager colorpicker layer textpattern"
   ],    
    toolbar: 'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code',
	
	
  });

</script>

<script type="text/javascript">
saveOrder();	
  $("#list1").dragsort({ dragSelector: "img", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

  function saveOrder() {
        $("#list1.sort").find("input#sort").each(function(k,v){
            $(v).val(k+1);
        });
	  $("#aaa").find(".jFiler-input-caption").find("span").text($("#list1.sort").find("input#sort").length+" files were chosen");
	  
};
</script>
