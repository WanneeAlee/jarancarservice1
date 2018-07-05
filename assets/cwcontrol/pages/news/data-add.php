
            
<form role="form" action="query_sql.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="method" value="insert"/>

				
            <div class="row">
               <div class="col-lg-12" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       
                           <strong>เพิ่มข้อมูล</strong>
                         
                        
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
                                      
                                   
                                          <div class="form-group">
                                                <label>หัวข้อข่าวสาร</label>
                                                <input type="text" class="form-control" name="news_Title" required >
                                     

                           			 </div>
                                     
                                    
                                     
                                     <div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group">
                                            <label>รายละเอียดย่อ</label>
                                            <textarea name="news_des1" class="form-control" rows="3"></textarea>
                                                
                                            </div>  
                                        </div>
                                      </div> 
                                    
                                     <div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group">
                                            <label>รายละเอียด</label>
                                            <textarea name="news_des2" class="form-control ckeditor" rows="3"></textarea>
                                                
                                            </div>  
                                        </div>
                                     </div> 
                                     
                                     
                                     <div class="row">
                            			<div class="col-lg-6">  
                                          <div class="form-group"> </div>  
                                        </div>
                                        
                           			 </div>
                                     
                                     
                                     <div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group">
                                                <label>รูปภาพปก ขนาด 720px * 406px </label>
                                                <input  type="file" name="news_Images" id="Images">
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                     
                                    <div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group">
                                                <label>แกลอรี่ เลือกหลายรูปภาพให้กดปุ่ม Ctrl ค้างไว้แล้วเลือกรูปภาพ</label>
                                                <input  type="file" name="news_gallery[]" id="gallery" multiple>
                                            </div>  
                                        </div>
                           			 </div> 
                                     
                                    
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
           



<script type="text/javascript" src="../../tinymce/tinymce.js"></script>
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
<style>
a:hover {
text-decoration: none;

}
</style>
<link href="../../theme/filer/jquery.filer.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="../../theme/filer/jquery.filer.min.js?v=1.0.5"></script>

<script>
$(document).ready(function() {
			$("#product_Watch").keyup(function(e) {
				var val = $(this).val(),
				sitesgohere = document.getElementById("myIframe");
		
				sitesgohere.src = "//www.youtube.com/embed/" + val +"?feature=player_detailpage";
				
			});
});	
	
	
$(function(){  

    var max_length=255; // กำหนดจำนวนตัวอักษร  
    $("#product_Des").keyup(function(){ // เมื่อ textarea id เท่ากับ data  มี event keyup  
            var this_length=max_length-$(this).val().length; // หาจำนวนตัวอักษรที่เหลือ  
            if(this_length<0){  
                $(this).val($(this).val().substr(0,255)); // แสดงตามจำนวนตัวอักษรที่กำหนด  
            }else{  
                $("#now_leng").html("<span style='color:#FF0000'>"+this_length+"</span> ตัวอักษร");   
              // แสดงตัวอักษรที่เหลือ             
            }             
    }); 
	
});


$('#Images').filer({
	limit: 1,
    showThumbs: true,
    templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li>{{fi-progressBar}}</li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
            itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
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
});



$('#gallery').filer({
	addMore: true,
    showThumbs: true,
    templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li>{{fi-progressBar}}</li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
            itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
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
});
</script>

