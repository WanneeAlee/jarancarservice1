<?php 


function add_form($formArr,$partx="bx3"){


    foreach ($formArr as $key => $value) {

        if($value["format"]=="textfield"){
echo textfield($value,$key);
        }elseif($value["format"]=="textarea"){
echo text_area($value,$key);
        }elseif($value["format"]=="image"){
echo image_cover($value,$key);
        }elseif($value["format"]=="gallery"){
echo gallery_list($value,$key);
        }elseif($value["format"]=="youtube"){
echo youtube($value,$key);
        }elseif($value["format"]=="youtube_list"){
echo youtube_list($value,$key);
        }elseif($value["format"]=="text_list"){
echo text_list($value,$key);
        }elseif($value["format"]=="sele_list"){
echo sele_list($value,$key,$partx);
        }
    }

}

function sele_list($filter,$id,$partx){

    
    $label=$filter["label"];
    $name=$filter["name"];
    $selected=$filter["selected"];
    $data=$filter["data"];
    $grid="col-lg-6";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }
if($partx!="bx2"){
    $class_sel="icons";
}else{
    $class_sel="browser-default";
}

    $theme ='
    
     <div class="'.$grid.'" data-tt="'.$partx.'">  
              <div class="form-group">
                    <label for="'.$id.'">'.$label.'</label>
                    <select class="'.$class_sel.'" name="'.$name.'" id="'.$id.'">
                    <option value="" disabled selected>กรุณาเลือก '.$label.'</option>
            ';
if($filter["data_list"]){

    foreach ($filter["data_list"] as $key_list => $val_list) {
        if($val_list["img"]){
            $data_icon = 'data-icon="'.$val_list["img"].'"';
        }else{
            $data_icon = '';
        }

        if($val_list["id"]==$selected){
            $selected_chk = "selected";
        }else{
            $selected_chk = '';
        }

        $theme .='<option value="'.$val_list["id"].'" '.$data_icon.' class="circle" '.$selected_chk.'  >'.$val_list["title"].'</option>';


    }
}
    $theme .='
                        
                    </select>
                </div>  
      </div>
      ';

if($partx!="bx2"){

    $theme .='
<script>
  $(document).ready(function() {
    $("select#'.$id.'").material_select();
});
</script>
    ';

}      


if($filter["sel_to"]){
    $theme .='
<script>
  $(document).ready(function() {
    
    $("select#'.$id.'").change(function(){
        
        var id_'.$id.' = $(this).val();
        var name_'.$id.' = $("label[for=\''.$filter["sel_to"]["to"].'\']").text();
        $.post("'.$filter["sel_to"]["send"].'",{"i":id_'.$id.',"s":"'.$filter["sel_to"]["search"].'","n":"'.$filter["sel_to"]["select"].'"},function(data){
            // 
            var jsons = JSON.parse(data);
            var json = JSON.parse(jsons);
            var theme_option=\'<option value="" disabled selected>กรุณาเลือก \'+name_'.$id.'+\'</option>\';
            console.log(json);
            $.each(json["employees"],function(key_cat,var_cat){
                var images = "";
                if(var_cat["image"]==undefined){
                    images = "";
                }else{
                    images =  "data-icon="+var_cat["image"];
                }
                theme_option+=\'<option value="\'+var_cat["id"]+\'" \'+images+\' class="left circle">\'+var_cat["name_TH"]+\'</option>\r\';


            });
            console.log(theme_option);
            $("select#'.$filter["sel_to"]["to"].'").html(theme_option);
    ';

if($partx!="bx2"){
    $theme .='
            $("select#'.$filter["sel_to"]["to"].'").material_select();
    ';
}

    $theme .='
        });
    });
});
</script>
    ';
}

    return $theme;
}


function textfield($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];
    $type=$filter["type"];
    $value=$filter["value"];
    $grid="col-lg-6";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }
    $theme ='
    <div class="row">
     <div class="'.$grid.'">  
              <div class="form-group">
                    <label for="'.$id.'">'.$label.'</label>
                    <input class="form-control" name="'.$name.'" id="'.$id.'" type="'.$type.'" value="'.$value.'">
                </div>  
      </div>
      </div>
    ';
    return $theme;
}

function text_area($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];
    $value=$filter["value"];
    $formClass="";
    if($filter["class"]){
        $classA = explode(",", $filter["class"]);
        foreach ($classA as $key_class => $val_class) {
            $formClass.=$val_class." ";
        }
    }
    $rows="5";
    if($filter["rows"]){
        $rows=$filter["rows"];
    }   
    $grid="col-lg-6";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }

    $theme ='
    <div class="row">
     <div class="'.$grid.'">  
              <div class="form-group">
                    <label for="'.$id.'">'.$label.'</label>
                    <textarea name="'.$name.'" id="'.$id.'" class="form-control '.$formClass.'" rows="'.$rows.'">'.$value.'</textarea>
                </div>  
      </div>
      </div>
    ';
    return $theme;
}
function image_cover($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];
    $width=$filter["width"];
    $height=$filter["height"];
    $file=$filter["src"];
    $value="";
    if($filter["value"]){
        $value='<input name="'.$name.' value="'.$filter["value"].'" type="hidden" >';
    }
    $grid="col-lg-6";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }

    if($filter["delete"]){
        $del_id = $filter["delete"];
        $del_trash="<a class=\"icon-jfi-trash jFiler-item-trash-action\" id=\"{{fi-name}}\" ></a>";
    }else{
        $del_id = $id;
        $del_trash="";
    }

    $theme ='
     <div class="'.$grid.'">  
              <div class="form-group">
                    <input type="hidden" name="width_cover" id="width_cover" value="'.$width.'"/>
                    <input type="hidden" name="height_cover" id="height_cover" value="'.$height.'"/>              
                    <label for="'.$id.'">'.$label.' ขนาด '.$width.' * '.$height.'</label>
                    <input  type="file" name="'.$name.'" id="'.$id.'" class="form-control" >
                    '.$value.' ';



    $theme .="
<script>
$('#".$id."').filer({
    limit: 1,
    showThumbs: true,
    templates: {
            box: '<ul class=\"jFiler-items-list jFiler-items-grid\"></ul>',
            item: '<li class=\"jFiler-item\">                        <div class=\"jFiler-item-container\">                            <div class=\"jFiler-item-inner\" style=\"width: 210px; \">                                <div class=\"jFiler-item-thumb\" style=\"width: 210px; \">                                    <div class=\"jFiler-item-status\"></div>                                    <div class=\"jFiler-item-info\">                                        <span class=\"jFiler-item-title\"><b title=\"{{fi-name}}\">{{fi-name | limitTo: 25}}</b></span>                                        <span class=\"jFiler-item-others\">{{fi-size2}}</span>                                    </div>                                    {{fi-image}}                                </div>                                <div class=\"jFiler-item-assets jFiler-row\">                                    <ul class=\"list-inline pull-left\">                                        <li>{{fi-progressBar}}</li>                                    </ul>                                    <ul class=\"list-inline pull-right\">                                        <li><a class=\"icon-jfi-trash jFiler-item-trash-action\"></a></li>                                    </ul>                                </div>                            </div>                        </div>                    </li>',
            itemAppend: '<li class=\"jFiler-item\">                            <div class=\"jFiler-item-container\">                                <div class=\"jFiler-item-inner\" style=\"width: 210px; \">                                <div class=\"jFiler-item-thumb\" style=\"width: 210px; \">                                        <div class=\"jFiler-item-status\"></div>                                        <div class=\"jFiler-item-info\">                                            <span class=\"jFiler-item-title\"><b title=\"{{fi-name}}\">{{fi-name | limitTo: 25}}</b></span>                                            <span class=\"jFiler-item-others\">{{fi-size2}}</span>                                        </div>                                        {{fi-image}}                                    </div>                                    <div class=\"jFiler-item-assets jFiler-row\">                                        <ul class=\"list-inline pull-left\">                                            <li><span class=\"jFiler-item-others\">{{fi-icon}}</span></li>                                        </ul>                                        <ul class=\"list-inline pull-right\">                                            <li>".$del_trash."</li>                                        </ul>                                    </div>                                </div>                            </div>                        </li>',
            progressBar: '<div class=\"bar\"></div>',
            itemAppendToEnd: false,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },";
if($filter["src"]){
    $theme .= '
        files:[{ name: "'.$del_id.'", type: "image", file: "'.$file.'"}],
    ';
}

    $theme .= "
            onRemove: function(el){         
            var ids = el.find(\".icon-jfi-trash\").attr(\"id\");
            $.post('query_sql.php', {id: ids,method: \"delete_image\"});
    },
});
</script>
    ";  
    $theme .= "
<script>
$(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
       var image = new Image();
       image.src = e.target.result;
       var imgWidth = image.width;
       var imgHeight = image.height;
               if(imgWidth==".$width." && imgHeight==".$height."){
                console.log(\"true\");

                $(\"#width_cover\").prop(\"name\",\"\");
                $(\"#height_cover\").prop(\"name\",\"\");
               }else{
                console.log(\"false\");
                $(\"#width_cover\").prop(\"name\",\"width_cover\");
                $(\"#height_cover\").prop(\"name\",\"height_cover\");                
               }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(\"input#".$id."\").change(function(){
        readURL(this);
    });
});
</script>
    ";         
    $theme .=' 
                </div>  
      </div>
    ';
    return $theme;
}

function youtube_list($filter,$id){
    $label=$filter["label"];
    $theme='
    <div class="col-lg-12">
        <div class="form-group" style="border:1px #ccc solid;border-radius: 5px;padding: 10px ">
            <label  for="'.$id.'">'.$label.'</label>
            <button type="button" class="btn btn-success" id="add-list" data-form="youtube" onclick="addList(this)" >เพิ่ม</button>
            <div class="row" id="show-list" style="padding: 5px;">
    ';

    foreach ($filter["data_list"] as $key_list => $val_list) {
        $img_scr=explode("https://www.youtube.com/watch?v=",$val_list["url"]);
        $theme.='
            <input type="hidden" name="detai_sub_id[]" value="'.$val_list["id"].'">
            <div class="col-xs-6 col-md-3 col-lg-3" ><div class="panel panel-default">
                <div class="panel-heading text-center">
                    <div class="input-group">
                        <input value="'.$val_list["url"].'" type="text" name="url-youtube-'.$val_list["id"].'" class="form-control"  id="url-youtube-'.$val_list["id"].'" data-name="url-youtube" onchange="embedYoutube(this)" >
                        <span class="input-group-btn">
                            <button class="btn btn-default" onclick="delete_new(this)" id="'.$val_list["id"].'" data-method="old" type="button"><span class="glyphicon glyphicon-trash"></span</button>
                        </span>
                    </div>
                </div>
                <div class="panel-body embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id="url-youtube-'.$val_list["id"].'" src="http://www.youtube.com/embed/'.$img_scr[1].'"></iframe>
                </div>
            </div>
        </div>
        ';

    }
    $theme.="
            </div>
        </div>
    </div>
<script>
function addList(input){
    var form = $(input).data(\"form\");
    if(form==\"youtube\"){
        form_youtube();
    }
}
function form_youtube(){
    var count = $(\"input[data-name=url-youtube]\").length;
    var theme = '';
    theme +='<div id=\"youtube-new-'+count+'\" class=\"col-xs-6 col-md-3 col-lg-3\" ><div class=\"panel panel-default\">                <div class=\"panel-heading text-center\">                    <div class=\"input-group\">                    <input type=\"text\" name=\"url-youtube[]\" class=\"form-control\" id=\"url-youtube-'+count+'\" data-name=\"url-youtube\" onchange=\"embedYoutube(this)\">                        <span class=\"input-group-btn\">                            <button class=\"btn btn-default\" onclick=\"delete_new(this)\" id=\"'+count+'\" data-method=\"new\" type=\"button\"><span class=\"glyphicon glyphicon-trash\"></span</button>                        </span>                    </div>                </div>                <div class=\"panel-body embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" id=\"url-youtube-'+count+'\" src=\"\"></iframe></div>            </div></div>';
    $(\"#show-list\").append(theme);
}
function embedYoutube(input){
    var ID = $(input).attr(\"id\");
    var str = $(input).val();
    var res = str.split('https://www.youtube.com/watch?v=');
          $(\"iframe#\"+ID).attr(\"src\",\"http://www.youtube.com/embed/\"+res[1]);
}
var ID=\"\",method=\"\";
function delete_new(id){
    $(\"#myModal-delete\").modal(\"show\");
    $(\".modal-title\").text(\"คุณต้องการลบ ลิ้ง นี้หรือไม่\");
    $(\".modal-body\").html(\"<p>กรุณากด ตกลง เพื่อยืนยัน หรือกด ยกเลิกเพื่อปิด</p>\");
     ID = $(id).attr(\"id\");
     method = $(id).data(\"method\");
}
$(document).ready(function(){
$(\"#ok-delete\").click(function(){
    console.log(method);
    var part__1 = $(\"button#\"+ID).closest(\".panel\").parent()
    if(method==\"new\"){
        part__1.fadeOut(\"slow\",function(){ part__1.remove(); });
    }else if(method==\"old\"){
        $.post(\"query_sql.php\",{id:ID,method:\"delete-list\"},function(data){
            console.log(data)
            part__1.fadeOut(\"slow\",function(){ part__1.remove(); });
        });
    }

});
});
</script>

    ";
    return $theme;
}

function youtube($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];
    if(isset($filter["value"])){
        $val=explode("https://www.youtube.com/watch?v=",$filter["value"]);
    }else{
        $val="";
    }
$theme='

        <div class="col-xs-6 col-md-3 col-lg-3">
                <label for="'.$id.'">'.$label.'</label>
        <div class="panel panel-default">
        
                <div class="panel-heading text-center">

                    
                        <input value="'.$filter["value"].'" type="text" name="'. $name.'" class="form-control" id="url-youtube-0007" style="width:100%" data-name="url-youtube" onchange="embed_Youtube(this)">
                   
                </div>
                <div class="panel-body embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id="url-youtube-0007" src="http://www.youtube.com/embed/'.$val[1].'"></iframe>
                </div>
            </div>
        </div>

<script>

function embed_Youtube(input){
    var ID = $(input).attr("id");
    var str = $(input).val();
    console.log(input);
    var res = str.split(\'https://www.youtube.com/watch?v=\');
          $("iframe#"+ID).attr("src","http://www.youtube.com/embed/"+res[1]);
}

</script>        

';
return $theme;

}

function gallery_list($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];

    if(isset($filter["hidden"])){
        $hidden=$filter["hidden"];
        if($hidden==false){
            $hidden_text="style=\"width:120px;\"";
        }else{
            $hidden_text="style=\"display:none;\"";
        }
    }else{
        $hidden_text="style=\"display:none;\"";
    }

    $theme='
        <div class="col-lg-12">
            <div class="form-group">
            <label>'.$label.'</label>
            <input  type="file" name="'.$name.'[]" id="'.$id.'" multiple>
    ';
    $theme.="
<script>
$('#".$id."').filer({
    limit: 6,
    addMore: true,
    showThumbs: true,
    templates: {
            box: '<ul class=\"jFiler-items-list jFiler-items-grid\"></ul>',
            item: '<li class=\"jFiler-item\">                        <div class=\"jFiler-item-container\">                            <div class=\"jFiler-item-inner\">                                <div class=\"jFiler-item-thumb\">                                    <div class=\"jFiler-item-status\"></div>                                    <div class=\"jFiler-item-info\">                                        <span class=\"jFiler-item-title\"><b title=\"{{fi-name}}\">{{fi-name | limitTo: 25}}</b></span>                                        <span class=\"jFiler-item-others\">{{fi-size2}}</span>                                    </div>                                    {{fi-image}}                                </div>                                <div class=\"jFiler-item-assets jFiler-row\">                                    <ul class=\"list-inline pull-left\">                                        <li><input type=\"text\" name=\"file_text[]\" class=\"form-control\" ".$hidden_text." />{{fi-progressBar}}</li>                                    </ul>                                    <ul class=\"list-inline pull-right\">                                        <li><a class=\"icon-jfi-trash jFiler-item-trash-action\"></a></li>                                    </ul>                                </div>                            </div>                        </div>                    </li>',
            itemAppend: '<li class=\"jFiler-item\">                            <div class=\"jFiler-item-container\">                                <div class=\"jFiler-item-inner\">                                    <div class=\"jFiler-item-thumb\">                                        <div class=\"jFiler-item-status\"></div>                                        <div class=\"jFiler-item-info\">                                            <span class=\"jFiler-item-title\"><b title=\"{{fi-name}}\">{{fi-name | limitTo: 25}}</b></span>                                            <span class=\"jFiler-item-others\">{{fi-size2}}</span>                                        </div>                                        {{fi-image}}                                    </div>                                    <div class=\"jFiler-item-assets jFiler-row\">                                        <ul class=\"list-inline pull-left\">                                            <li><input type=\"hidden\" name=\"other_gID_old[]\"  value=\"{{fi-name}}\" /><input type=\"text\" name=\"file_text_old_{{fi-name}}\" id=\"txt-name-{{fi-name}}\" class=\"form-control\" ".$hidden_text." value=\"{{fi-url}}\" /></li>                                        </ul>                                        <ul class=\"list-inline pull-right\">                                            <li><a class=\"icon-jfi-trash jFiler-item-trash-action\" idg=\"{{fi-name}}\"></a></li>                                        </ul>                                    </div>                                </div>                            </div>                        </li>',
            progressBar: '<div class=\"bar\"></div>',
            itemAppendToEnd: false,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
        files: [
        ";
if($filter["data_list"]){
foreach ($filter["data_list"] as $key => $val) {

$type = substr($val["url"],strrpos($val["url"],".")+1); 
$type_file = "";
switch ($type) {
    case 'jpg':
        $type_file="image";
        break;
    case 'png':
        $type_file="image";
        break;
    case 'gif':
        $type_file="image";
        break;
    default:
        $type_file="file";
        break;
}
   
    $theme.='
    {
        name: "'.$val["id"].'",
        type: "'.$type_file.'",
        file: "'.$val["url"].'",
    },
    ';
}
}
$theme.="
        ],
        onRemove: function(el){         
            var ids = el.find(\".icon-jfi-trash\").attr(\"idg\");
            $.post('query_sql.php', {id: ids,method: \"delete_gallery\"});
    },
        
});
</script>
<script>
$(document).ready(function(){
    ";

if($filter["data_list"]){
    foreach ($filter["data_list"] as $key => $val) {
        $theme.='
        $("input#txt-name-'.$val["id"].'").val("'.$val["txt"].'");
        ';
    }
}

$theme.="
});
</script>
";


    $theme.='
            </div>
        </div>
    ';

    return $theme;
}

function text_list($filter,$id){
    $label=$filter["label"];

    $theme='<div class="col-lg-12">
            <div class="form-group" style="border:1px #ccc solid;border-radius: 5px;padding: 10px ">
                <label  for="'.$id.'">'.$label.'</label>
                <button type="button" class="btn btn-success" id="add-text" data-form="youtube" onclick="addListText(this)" >เพิ่ม</button>
                    <div class="row" id="show-list-text" style="padding: 5px;">';

    foreach ($filter["data_list"] as $key_list => $val_list) {
        if($filter["two_lang"]==true){
        $theme.='
            <input type="hidden" name="detai_sub_id[]" value="'.$val_list["id"].'">
            <div class="col-xs-6 col-md-3 col-lg-3" ><div class="panel panel-default">
                <div class="panel-heading text-center">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">TH</span>
                        <input value="'.$val_list["url"].'" type="text" name="url-youtube-TH-'.$val_list["id"].'" class="form-control"  id="txt-str-TH-'.$val_list["id"].'" data-name="txt-str-TH">
                        <span class="input-group-btn">
                             <button class="btn btn-default" onclick="delete_new_text(this)" id="'.$val_list["id"].'" data-method="old" type="button"><span class="glyphicon glyphicon-trash"></span</button>
                        </span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">EN</span>
                        <input value="'.$val_list["url"].'" type="text" name="url-youtube-'.$val_list["id"].'" class="form-control"  id="txt-str-EN-'.$val_list["id"].'" data-name="txt-str-EN">
                    </div>

                </div>
            </div>
        </div>
        ';
        }else{
        $theme.='
            <input type="hidden" name="detai_sub_id[]" value="'.$val_list["id"].'">
            <div class="col-xs-6 col-md-3 col-lg-3" ><div class="panel panel-default">
                <div class="panel-heading text-center">
                    <div class="input-group">
                        <input value="'.$val_list["url"].'" type="text" name="url-youtube-'.$val_list["id"].'" class="form-control"  id="txt-str-EN-'.$val_list["id"].'" data-name="txt-str-EN">
                        <span class="input-group-btn">
                             <button class="btn btn-default" onclick="delete_new_text(this)" id="'.$val_list["id"].'" data-method="old" type="button"><span class="glyphicon glyphicon-trash"></span</button>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        '; 
        }

    }

    $theme.='        </div>
                </div>
            </div>';

    $theme.='
<script>
function addListText(input){
    var form = $(input).data("form");
    if(form=="youtube"){
        form_txt();
    }
}';

if($filter["two_lang"]==true){
    $theme.='

function form_txt(){
    var count = $("input[data-name=txt-str-TH]").length;
    var theme = \'\';
    theme +=\'<div id="youtube-new-\'+count+\'" class="col-xs-6 col-md-3 col-lg-3" ><div class="panel panel-default"><div class="panel-heading text-center"><div class="input-group"><span class="input-group-addon" id="basic-addon1">TH</span><input type="text" name="txt-str-TH[]" class="form-control" id="txt-youtube-TH-\'+count+\'" data-name="txt-str-TH"><span class="input-group-btn"><button class="btn btn-default" onclick="delete_new_text(this)" id="\'+count+\'" data-method="new" type="button"><span class="glyphicon glyphicon-trash"></span</button></span></div><div class="input-group"><span class="input-group-addon" id="basic-addon1">EN</span><input type="text" name="txt-str-EN[]" class="form-control" id="txt-str-EN-\'+count+\'" data-name="txt-str-EN" onchange="embedYoutube(this)"></div></div></div></div>\';
    $("#show-list-text").append(theme);
}';
}else{
    $theme.='

function form_txt(){
    var count = $("input[data-name=txt-str-TH]").length;
    var theme = \'\';
    theme +=\'<div id="youtube-new-\'+count+\'" class="col-xs-6 col-md-3 col-lg-3" ><div class="panel panel-default"><div class="panel-heading text-center"><div class="input-group"><input type="text" name="txt-str-EN[]" class="form-control" id="txt-youtube-\'+count+\'" data-name="txt-str-EN"><span class="input-group-btn"><button class="btn btn-default" onclick="delete_new_text(this)" id="\'+count+\'" data-method="new" type="button"><span class="glyphicon glyphicon-trash"></span</button></span></div></div></div></div>\';
    $("#show-list-text").append(theme);
}'; 
}


    $theme.='
function delete_new_text(id){
    $("#myModal-delete").modal("show");
    $(".modal-title").text("คุณต้องการลบ ลิ้ง นี้หรือไม่");
    $(".modal-body").html("<p>กรุณากด ตกลง เพื่อยืนยัน หรือกด ยกเลิกเพื่อปิด</p>");
     ID = $(id).attr("id");
     method = $(id).data("method");
}
$(document).ready(function(){
    $("#ok-delete").click(function(){
        console.log(method);
        var part__1 = $("button#"+ID).closest(".panel").parent()
        if(method=="new"){
            part__1.fadeOut("slow",function(){ part__1.remove(); });
        }else if(method=="old"){
            $.post("query_sql.php",{id:ID,method:"delete-list"},function(data){
                console.log(data)
                part__1.fadeOut("slow",function(){ part__1.remove(); });
            });
        }

    });
});
</script>
    ';

    return $theme;
}
 ?>
