
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>9asset</title>

<meta name="Description" content="9asset" />
<meta name="KeyWords" content="9asset"/>
</head>



<!--<script src="js/jquery.min.js"></script>-->


<link href="src/jquery.fileuploader.css" media="all" rel="stylesheet">
<link href="src/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
<script src="src/jquery.fileuploader.min.js" type="text/javascript"></script>


<body>
       
        <?php
      		$appendedFiles = array();												  
			$appendedFiles[] = array(
				"name" => $data_project["project_Images1"],
				"type" => 'image',				
				"file" => 'upload/'.$data_project["project_Images1"],
				"data" => array(
					"ids" => 'ids="'.$data_project["project_ID"].'"',
					"typename" => 'typename="project_Images1"',
					"typedel" => 'typedel="imgdel"',
				)
			);
			$appendedFiles = json_encode($appendedFiles);
      	?>
      	
        
       
          <input name="project_Images[]" type="file" class="project_Images" typename="project_Images1" <?php if($data_project["project_Images1"]){?>data-fileuploader-files='<?php echo $appendedFiles;?>'<?php }?>/>
       
      
     
       <?php
      		$appendedFiles = array();
		  
		  	$sql = "SELECT * FROM  tb_project_gallery where project_ID='".$data_project["project_ID"]."' ORDER BY gallery_Sort DESC,gallery_ID ASC "; 
			$result = mysql_query ($sql);
			$galnum = mysql_num_rows($result);
				while($data1=mysql_fetch_array($result)){
					$appendedFiles[] = array(
						"name" => $data1["gallery_Images"],
						"type" => 'image',				
						"file" => '/upload/gallery/full_'.$data1["gallery_Images"],
						"data" => array(
							"ids" => 'ids="'.$data1["gallery_ID"].'"',			
							
						)
					);
				}
		  
			$appendedFiles = json_encode($appendedFiles);
      	?>
      
      	  <input name="files[]" type="file" class="gallery" data-fileuploader-limit="10" typename="gallery" <?php if($galnum !=0){?>data-fileuploader-files='<?php echo $appendedFiles;?>'<?php }?>/>	
      
			

<script type="text/javascript">
$(document).ready(function(){
	
	
	$('.project_Images').fileuploader({
		limit: 1,
        extensions: ['jpg', 'jpeg', 'png', 'gif'],
		changeInput: ' ',
		theme: 'thumbnails',
        enableApi: true,
		addMore: true,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list">' +
					      '<li class="fileuploader-thumbnails-input"style="width: 100%;"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                      '</ul>' +
                  '</div>',
			item: '<li class="fileuploader-item"style="width: 100%;">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove" ${data.ids} ${data.typename} ${data.typedel}><i class="remove"></i></a>' +
                           '</div>' +
                       	   '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                   '</li>',
			item2: '<li class="fileuploader-item"style="width: 100%;">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove" ${data.ids} ${data.typename} ${data.typedel}><i class="remove"></i></a>' +
                           '</div>' +
                       '</div>' +
                   '</li>',
			startImageRenderer: true,
			canvasImage: false,
			_selectors: {
				list: '.fileuploader-items-list',
				item: '.fileuploader-item',
				start: '.fileuploader-action-start',
				retry: '.fileuploader-action-retry',
				remove: '.fileuploader-action-remove'
			},
			onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0));
				
				if(api.getFiles().length >= api.getOptions().limit) {
					plusInput.hide();
				}
				
				plusInput.insertAfter(item.html);
				
				
				if(item.format == 'image') {
					item.html.find('.fileuploader-item-icon').hide();
				}
			},
			onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0));
				
                html.children().animate({'opacity': 0}, 200, function() {
                    setTimeout(function() {
                        html.remove();
						
						if(api.getFiles().length - 1 < api.getOptions().limit) {
							plusInput.show();
						}
                    }, 100);
                });
				
            }
		},
		afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0));
		
			plusInput.on('click', function() {
				api.open();
			});
			
			var labelname = inputEl.attr("labelname");
			listEl.find('.fileuploader-thumbnails-input-inner').html(labelname);
		},
	
		
		// while using upload option, please set
		// startImageRenderer: false
		// for a better effect
		/*upload: {
			url: '/image-project-save.php',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: function(item, listEl, parentEl, newInputEl, inputEl) {
			var typename = inputEl.attr("typename");
			item.upload.data.type = typename;

			return true;
			},
            onSuccess: function(data, item) {				
				item.html.find(".fileuploader-action-remove").attr('ids', data);
				item.html.find(".fileuploader-action-remove").attr('typedel', 'unit');
                setTimeout(function() {
                    item.html.find('.progress-holder').hide();
					item.renderImage();
                }, 400);
				
            },
            onError: function(item) {
				item.html.find('.progress-holder').hide();
				item.html.find('.fileuploader-item-icon i').text('Failed!');
				
				setTimeout(function() {
					item.remove();
				}, 1500);
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-holder');
				
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            }
        },
		dragDrop: {
			container: '.fileuploader-thumbnails-input'
		},
		onRemove: function(item) {
			var ids = item.html.find(".fileuploader-action-remove").attr('ids');
			var typename = item.html.find(".fileuploader-action-remove").attr('typename');
			var typedel = item.html.find(".fileuploader-action-remove").attr('typedel');
			//alert(typedel);
			$.post('/unit-project-delete.php', {id: ids,name: typename,type: typedel});
		},*/
		
    });
	
	
	$('.gallery').fileuploader({
		limit: null,
        extensions: ['jpg', 'jpeg', 'png', 'gif'],
		changeInput: ' ',
		theme: 'thumbnails',
        enableApi: true,
		addMore: true,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list">' +
					      '<li class="fileuploader-thumbnails-input"style="width: 20%;"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                      '</ul>' +
                  '</div>',
			item: '<li class="fileuploader-item" style="width: 20%;">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove" ${data.ids}><i class="remove"></i></a>' +
                           '</div>' +
                       	   '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                   '</li>',
			item2: '<li class="fileuploader-item" style="width: 20%;">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove" ${data.ids}><i class="remove"></i></a>' +
                           '</div>' +
                       '</div>' +
                   '</li>',
			startImageRenderer: true,
			canvasImage: false,
			_selectors: {
				list: '.fileuploader-items-list',
				item: '.fileuploader-item',
				start: '.fileuploader-action-start',
				retry: '.fileuploader-action-retry',
				remove: '.fileuploader-action-remove'
			},
			onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0));
				
					if(api.getFiles().length >= api.getOptions().limit) {
						plusInput.hide();
					}
				
				
				plusInput.insertAfter(item.html);
				
				
				if(item.format == 'image') {
					item.html.find('.fileuploader-item-icon').hide();
				}
			},
			onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0));
				
                html.children().animate({'opacity': 0}, 200, function() {
                    setTimeout(function() {
                        html.remove();
						
						if(api.getFiles().length - 1 < api.getOptions().limit) {
							plusInput.show();
						}
                    }, 100);
                });
				
            }
		},
		afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0));
		
			plusInput.on('click', function() {
				api.open();
			});
		},
	
		
		// while using upload option, please set
		// startImageRenderer: false
		// for a better effect
		/*upload: {
			url: '/gallery-project-save.php',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: function(item, listEl, parentEl, newInputEl, inputEl) {
			var typename = inputEl.attr("typename");
			item.upload.data.type = typename;

			return true;
			},
            onSuccess: function(data, item) {
				item.html.find(".fileuploader-action-remove").attr('ids', data);
                setTimeout(function() {
                    item.html.find('.progress-holder').hide();
					item.renderImage();
                }, 400);
				
            },
            onError: function(item) {
				item.html.find('.progress-holder').hide();
				item.html.find('.fileuploader-item-icon i').text('Failed!');
				
				setTimeout(function() {
					item.remove();
				}, 1500);
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-holder');
				
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            }
        },
		dragDrop: {
			container: '.fileuploader-thumbnails-input'
		},
		onRemove: function(item) {
			var ids = item.html.find(".fileuploader-action-remove").attr('ids');			
			$.post('/gallery-project-delete.php', {id: ids,type: "gallery"});
		},*/
		
    });
	
	
	
	
	
});
</script>


</body>
</html>

