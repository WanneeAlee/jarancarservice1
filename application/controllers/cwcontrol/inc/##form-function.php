<?php 

function getYoutubeIdUrl($url) {
    $pattern = 
        '%^# Match any YouTube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char YouTube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}


function add_form($formArr,$partx="bx3"){
$count = 0;
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
        }elseif($value["format"]=="input_list"){
echo input_list($value,$key);
        }elseif($value["format"]=="sele_list"){
echo sele_list($value,$key,$partx);
        }elseif($value["format"]=="custom_list"){
echo customlist($value,$key);
        }elseif($value["format"]=="custom_add_list"){
echo customadd_list($value,$key);
        }elseif($value["format"]=="map"){
echo map_form($value,$key);
        }elseif($value["format"]=="input_list"){
echo input_list($value,$key);
        }

    }

}
function customlist($form,$id){
    $grid="col-lg-6";
    $json_data="11";
    if($form["grid"]){
        $grid=$form["grid"];
    }
$theme = '
<div class="row">
<div class="col-lg-12"> 
  <div class="row">
      <div class="'.$grid.'"> 
      <br> ';

    $theme .= '<div class="btn-group" role="group" aria-label="..."><button class="btn btn-default" type="button" id="'.$id.'">add</button><span class="input-group-addon" style="height:34px" >'.$form["label"].'</span></div>';

    $theme .= ' </div>
  </div>
  <div class="row">
      <div class="'.$grid.'">  
            <div class="list-group" id="'.$form["form-addto"].'">
                ';

if(isset($form["value"])){
$json_data ='{"test":[';

$num_ayy1=0;
    foreach ($form["value"] as $key => $value) {
        $theme .=$form["form-custom"];
        if($num_ayy1!=0){
                $json_data .=',';
             }
         $json_data .='{';
        $num_ayy=0;
        foreach ($value as $k => $v) {
            if($num_ayy!=0){
                $json_data .=',';
             }   
                $json_data .='"'.$k.'":"'.$v.'"';

           $num_ayy++; 
        }
        $json_data .='}';
        $num_ayy1++; 
    }
$json_data .=']}';
}

$theme .= '
            </div>  
      </div>
  </div>
</div>
</div>
'; 

$theme .= '
<script>

$(document).ready(function(){
var data_s = \''.$json_data.'\';
////console.log(data_s);

var json = JSON.parse(data_s);
var numarr_json = 0;
////console.log(json["test"]);

$.each(json["test"],function(dk,dv){

    $.each(dv,function(k,v){
    

if(k=="id"){
    $("#'.$form["form-addto"].'").children().eq(numarr_json).append("<input type=\'hidden\' value=\'"+v+"\'>");
}else{
    if(v=="checked"){
        $("#'.$form["form-addto"].'").find("[type=checkbox]."+k).eq(numarr_json).attr(\'checked\',\'true\');   
     ////console.log(numarr_json+"--"+k+"--"+v);       
    }else{

        $("#'.$form["form-addto"].'").find("[type=text]."+k).eq(numarr_json).val(v);
    }
   
}

    });  
$("#'.$form["form-addto"].'").children().eq(numarr_json).append("<a style=\'position:absolute;width:5%;right:10px;top:10px;\' class=\'btn btn-default del-list-'.$id.'\'  onclick=\'$(this).parent().remove()\'>x</a>");     

numarr_json++;
});



    $("button#'.$id.'[type=button]").click(function(){
        var count_'.$id.' = $("#'.$form["form-addto"].'").children().length;

        $("#'.$form["form-addto"].'").append(\''.$form["form-custom"].'\');
        $("#'.$form["form-addto"].'").children().eq((count_'.$id.')).attr("data-lll",count_'.$id.').append("<a style=\'position:absolute;width:5%;right:10px;top:10px;\' class=\'btn btn-default del-list-'.$id.'\' id=\''.$id.'-"+count_'.$id.'+"\' onclick=\'$(this).parent().remove()\'>x</a>");
    });

});
</script>
';

return $theme;
}


function sele_list($filter,$id,$partx){

    
    $label=$filter["label"];
    $name=$filter["name"];
    $selected=$filter["selected"];
    $row=0;
    if(isset($filter["row"])){
        $row=$filter["row"];
    }
    $data='';
    if(isset($filter["data"])){
        $data=$filter["data"];
    }
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
     <div class="'.$grid.'" id="'.$name.'-'.$id.'" data-tt="'.$partx.'">  
              <div class="form-group">
                    <label for="'.$id.'">'.$label.'</label>
                    <select class="'.$class_sel.'" name="'.$name.'" id="'.$id.'" required="required" >
                    <option value="" disabled selected>กรุณาเลือก '.$label.'</option>
            ';
if($filter["data_list"]){

    foreach ($filter["data_list"] as $key_list => $val_list) {


        if(isset($val_list["img"])){
            $data_icon = 'data-icon="'.$val_list["img"].'"';
        }else{
            $data_icon = '';
        }

        if(isset($val_list["color"])){
            $data_color = 'data-color="'.$val_list["color"].'"';
        }else{
            $data_color = '';
        }        

        if($val_list["id"]==$selected){
            $selected_chk = "selected";
        }else{
            $selected_chk = '';
        }

        if(isset($val_list["tagclass"])){
            $tagclass = $val_list["tagclass"];
        }else{
            $tagclass = '';
        }

        $theme .='<option value="'.$val_list["id"].'"
         '.$data_icon.'
         '.$data_color.' class="circle"
         '.$selected_chk.' data-test="test" data-tag="
         '.$tagclass.'" >
         '.$val_list["title"].'</option>';


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
            ////console.log(json);
            $.each(json["employees"],function(key_cat,var_cat){
                var images = "";
                if(var_cat["image"]==undefined){
                    images = "";
                }else{
                    images =  "data-icon="+var_cat["image"];
                }
                theme_option+=\'<option value="\'+var_cat["id"]+\'" \'+images+\' class="left circle">\'+var_cat["name_TH"]+\'</option>\r\';


            });
            ////console.log(theme_option);
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
    if($row!=0){
        $theme .='
        <script>
            $(document).ready(function(){
               var tagrowstart_'.$id.' = "<div class=\'row\'></div>";
               var tagrowover_'.$id.' = "<div class=\'row\'><div class=\''.$grid.'\'>&nbsp;</div></div>";


               for (i=1; i <= '.$row.'; i++) {

                    if(i==1){
                        $("div#'.$name.'-'.$id.'").wrap( tagrowstart_'.$id.' );
                    }else{
                        $("div#'.$name.'-'.$id.'").before( tagrowover_'.$id.' );
                    }
               }
                    
                
            });
        </script>
        ';
    }
    return $theme;
}


function textfield($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];

    $type="text";
    if(isset($filter["type"])){
        $type=$filter["type"];
    }
    $row=0;
    if(isset($filter["row"])){
        $row=$filter["row"];
    }
    
    $value=$filter["value"];
    $grid="col-lg-6";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }


    $theme ='

     <div class="'.$grid.'" id="'.$name.'-'.$id.'">  
              <div class="form-group">
                    <label for="'.$id.'">'.$label.'</label>
                    <input class="form-control" name="'.$name.'" id="'.$id.'" type="'.$type.'" value="'.$value.'">
                </div>  
      </div>

    ';
    if($row!=0){
        $theme .='
        <script>
            $(document).ready(function(){
               var tagrowstart_'.$id.' = "<div class=\'row\'></div>";
               var tagrowover_'.$id.' = "<div class=\'row\'><div class=\''.$grid.'\'>&nbsp;</div></div>";


               for (i=1; i <= '.$row.'; i++) {

                    if(i==1){
                        $("div#'.$name.'-'.$id.'").wrap( tagrowstart_'.$id.' );
                    }else{
                        $("div#'.$name.'-'.$id.'").before( tagrowover_'.$id.' );
                    }
               }
                    
                
            });
        </script>
        ';
    }
    return $theme;
}

function customadd_list($filter,$id){
    $label=$filter["label"];
    $row=0;
    if(isset($filter["row"])){
        $row=$filter["row"];
    }
    $max_fields=0;
    if(isset($filter["max_fields"])){
        $max_fields=$filter["max_fields"];
    }
    $grid="col-lg-12";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }

    if($filter["delete"]==true){
        $del_id = $filter["delete"];
        $del_trash="<a class=\"icon-jfi-trash jFiler-item-trash-action\" id=\"{{fi-name}}\" ></a>";
    }else{
        $del_id = $id;
        $del_trash="";
    }



$theme ='

        <div class="input-group add_'.$id.'_btn" style="margin-bottom:10px;">
            <div class="input-group-addon add_'.$id.'_btn">'.$label.'</div>
            <button type="button" class="btn btn-default btn-sm bckbtn addmore_doc_'.$id.' "> Add <span class="glyphicon glyphicon-plus"></span></button>

        </div>

';

if(isset($filter["form"])){

$form = $filter["form"];

}else{

$form = '<div class="form-group label-floating is-empty onerow portwidth2"><div class="socialmediaside2"><input type="text" class="form-control g" name="portfoliodoctitle[]" maxlength="10" value="" placeholder="Document Title"><div class="jFiler jFiler-theme-default"><input type="file" class="docupload" name="portfoliodoc[]" style="position: absolute; left: -9999px; top: -9999px; z-index: -9999;"></div></div><button type="button" class="btn btn-default btn-sm bckbtn remove_field3"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>';
}

if(isset($filter["data_list"])){

    $theme .= '
 <div id="edit_'.$id.'" class="form-group is-empty width100 hirehide '.$grid.' ">
    <h5 class="control-label bold add_'.$id.'_btn">'.$label.'</h5>';




$json_data ='{"test'.$id.'":[';
$dataimg="";
$num_ayy1=0;
    foreach ($filter["data_list"] as $key => $val) {
        // $theme .=stripslashes($form);
        $theme .="<div class='item-edit' id='data-edit-".$filter["data_list"][$key]["id"]."'>".stripslashes($form)."</div>";


        $theme .='
        <script>
            $(function(){
                $("div#data-edit-'.$filter["data_list"][$key]["id"].'").find("input").each(function(k_'.$id.',v_'.$id.'){
                    var name_file'.$id.' = $(v_'.$id.').attr("name")
                    var namefile'.$id.'=name_file'.$id.'.replace("[]","");
                    
                    $(v_'.$id.').not("[type=hidden]").addClass("img-'.$id.'-'.$filter["data_list"][$key]["id"].'").attr("name","edit_"+namefile'.$id.'+"_'.$filter["data_list"][$key]["id"].'").attr("id",namefile'.$id.');

                });

                $("div#data-edit-'.$filter["data_list"][$key]["id"].'").find("input:hidden").each(function(k_'.$id.',v_'.$id.'){
                    var name_file'.$id.' = $(v_'.$id.').attr("name")
                    var namefile'.$id.'=name_file'.$id.'.replace("[]","");
                    ////console.log(namefile'.$id.');
                    if($(v_'.$id.').attr("id")=="numberID"){
                        $(v_'.$id.').addClass("img-'.$id.'-'.$filter["data_list"][$key]["id"].'").attr("name","edit_"+namefile'.$id.'+"[]").val("'.$filter["data_list"][$key]["id"].'");
                    }else{
                         $(v_'.$id.').addClass("img-'.$id.'-'.$filter["data_list"][$key]["id"].'").attr("name","edit_"+namefile'.$id.'+"_'.$filter["data_list"][$key]["id"].'").val("'.$val["img"].'");
                    }
 

                });


                $("div#data-edit-'.$filter["data_list"][$key]["id"].'").find("textarea").each(function(k_'.$id.',v_'.$id.'){
                    var name_file'.$id.' = $(v_'.$id.').attr("name")
                    var namefile'.$id.'=name_file'.$id.'.replace("[]","");
                    ////console.log(namefile'.$id.');
                    $(v_'.$id.').addClass("img-'.$id.'-'.$filter["data_list"][$key]["id"].'").attr("name","edit_"+namefile'.$id.'+"_'.$filter["data_list"][$key]["id"].'").attr("data-id",namefile'.$id.').attr("id",namefile'.$id.'+"_'.$filter["data_list"][$key]["id"].'"); 
                });

                $("div#data-edit-'.$filter["data_list"][$key]["id"].'").find("button.delete").each(function(k_'.$id.',v_'.$id.'){ 
                    $(v_'.$id.').attr("data-id","'.$filter["data_list"][$key]["id"].'");
                 });
            });
        </script>
        ';
        if($num_ayy1!=0){
                $json_data .=',';
             }
        $json_data .='{';
        $num_ayy=0;


        foreach ($val as $k => $v) {
            
        $theme .='
        <script>
            $(function(){
                 $("div#data-edit-'.$filter["data_list"][$key]["id"].'").find("input#'.$k.'").val(`'.$v.'`);
                 $("div#data-edit-'.$filter["data_list"][$key]["id"].'").find("textarea[data-id='.$k.']").text(`'.$v.'`);
                 
            });
        </script>
        ';

            if($num_ayy!=0){
                $json_data .=',';
             }   
                $json_data .='"'.$k.'":"'.$v.'"';


           $num_ayy++; 


        }

////////////////////////////////////////////////////////////////////////////////////


    $dataimg .="
<script>
$('#edit_".$id."').find('.edit').eq(".$key.").filer({
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
if(isset($val["img"])){
    $dataimg .= '
        files:[{ name: "'.$val["id"].'", type: "image", file: "'.$val["img"].'"}],
    ';
}

    $dataimg .= "
            onRemove: function(el){         
            var ids = el.find(\".icon-jfi-trash\").attr(\"id\");console.log('delete'+ids)
            $.post('query_sql.php', {id: ids,method:\"delete_sub_image\"});
    },
});
</script>
    "; 


////////////////////////////////////////////////////////////////////////////////////
        $json_data .='}';
        $num_ayy1++;
    }

$json_data .=']}';


$theme .= $dataimg;
$theme .= '</div></div><br>';
}



    $theme .= '<div id="insert_'.$id.'" class="form-group is-empty width100 hirehide '.$grid.' ">';

if(!isset($filter["data_list"])){
  $theme .='<h5 class="control-label bold add_'.$id.'_btn">'.$label.'</h5>';
}

$theme .='
</div>

<script type="text/javascript">

    var max_fields3 = '.$max_fields.'; //maximum input boxes allowed
    var wrapper3 = $("#insert_'.$id.'");
    var wrapper__3 = $("#edit_'.$id.'"); //Fields wrapper
    var add_button3 = $(".addmore_doc_'.$id.'"); //Add button ID
    var numcount =  $("#'.$id.'").find(".list-group-item").not(".add_'.$id.'_btn").length;
    var x = numcount; //initlal text box count
    add_button3.click(function (e) { //on add input button click
        
        e.preventDefault();';

        if($max_fields!=0){
        $theme .='
                if (x < max_fields3) { //max input box allowed
                ';
        }

            $theme .='
                x++; //text box increment
                var $elements = $(\''.$form.'\').appendTo("#insert_'.$id.'");
                $elements.find("textarea").each(function(keyid'.$id.',valid'.$id.'){
                    var name = $(valid'.$id.').attr("id");
                    $(valid'.$id.').attr("id",name+"-"+x);

                tinymce.init({selector: \'textarea.ckeditor\',menubar : false,force_br_newlines : true,force_p_newlines : false,height: 400,    
                 plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor moxiemanager colorpicker layer textpattern"
                ],
                toolbar: \'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code\',
                 });                    
                });

                addFiler($elements.find(".docupload"));
                sort_'.$id.'(x);
                ////console.log($elements.find(".docupload").removeClass("edit").addClass("insert"));

            ';

        if($max_fields!=0){
        $theme .='  
                 }
                 ';
        }
$theme .='   


    }); 
    $("#insert_'.$id.'").on("click", ".remove_field3", function (e) { //user click on remove text
        e.preventDefault();
        $(this).closest(\'div.list-group\').remove();
        x--;
        sort_'.$id.'(x);
    });
    $("#edit_'.$id.'").on("click", ".remove_field3", function (e) { //user click on remove text
        var r = confirm("Press a button!");
        if (r == true) {
        var ID_LIST = $(this).data("id");
        $.post("query_sql.php",{method:"delete-list-item",id:ID_LIST},function(data){
            console.log("data");
        });
         e.preventDefault();
        $(this).closest(\'div.item-edit\').remove();   
        x--;
        sort_'.$id.'(x);            
        }

    });
    //end portfolio add and remove doc
    
    function addFiler($element) {
        $element.filer({
        limit: 24
        , maxSize: 2
        , fileMaxSize: 1
        , extensions: ["jpg", "png", "gif"]
        , showThumbs: true
        // , addMore: true
        , allowDuplicates: false
        , canvasImage: true
        , templates: {
            box: \'<ul class="jFiler-items-list jFiler-items-grid"></ul>\'
            , item: \'<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-thumb-overlay">\
                                        <div class="jFiler-item-info">\
                                            <div style="display:table-cell;vertical-align: middle;">\
                                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                                <span class="jFiler-item-others">{{fi-size2}}</span>\
                                            </div>\
                                        </div>\
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
                    </li>\'
            , itemAppend: \'<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-thumb-overlay">\
                                            <div class="jFiler-item-info">\
                                                <div style="display:table-cell;vertical-align: middle;">\
                                                    <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                                    <span class="jFiler-item-others">{{fi-size2}}</span>\
                                                </div>\
                                            </div>\
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
                        </li>\'
            , progressBar: \'<div class="bar"></div>\'
            , itemAppendToEnd: false
            , canvasImage: true
            , removeConfirmation: true
            , _selectors: {
                list: \'.jFiler-items-list\'
                , item: \'.jFiler-item\'
                , progressBar: \'.bar\'
                , remove: \'.jFiler-item-trash-action\'
            }
        }
        , dialogs: {
            alert: function (text) {
                return alert(text);

            }
            , confirm: function (text, callback) {

                confirm(text) ? callback() : null;
            }
        }
        , captions: {
            button: "Choose Files"
            , feedback: "Choose files To Upload"
            , feedback2: "files were chosen"
            , drop: "Drop file here to Upload"
            , removeConfirmation: "Are you sure you want to remove this file?"
            , errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded."
                , filesType: "Only Images are allowed to be uploaded."
                , filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB."
                , filesSizeAll: "Files you\'ve choosed are too large! Please upload files up to {{fi-maxSize}} MB."
            }
        }
    }); 
    }
    
    // addFiler($(".docupload"));
</script>

    ';



        $theme .='
        <script>

    function sort_'.$id.'(tr){
        var tr_count = $("select#sort-'.$id.'").length;
        var tr_sort="",key_sort="";

        for (var i = 1; i <= tr_count; i++) {
          tr_sort=tr_sort+`<option value="`+i+`" >`+i+`</option>`;
        }
            ////console.log(tr_sort);
        $("select#sort-'.$id.'").each(function(key,val){
            $(val).html(tr_sort);
            var opt_arr = $(val).children("option").toArray();
            $(val).children("option").each(function(ko,vo){
                key_sort=ko;
                    if((tr_count)==$(vo).val()){
                        $(opt_arr[key]).attr({"selected":true});
                        ////console.log(ko+" = "+(tr_count-1)+"->"+$(opt_arr[key]).text()); 
                    }else{
                      // if(tr_count>ko){
                        $(opt_arr[ko]).attr({"selected":false});
                      // }
                    }
            });
        });

    }

        </script>
        ';


    if($row!=0){
        $theme .='
        <script>
            $(document).ready(function(){
            

               var tagrowstart_'.$id.' = "<div class=\'row\'></div>";
               var tagrowover_'.$id.' = "<div class=\'row\'><div class=\''.$grid.'\'>&nbsp;</div></div>";

                
               for (i=1; i <= '.$row.'; i++) {

                    if(i==1){
                        $("div#'.$name.'-'.$id.'").wrap( tagrowstart_'.$id.' );
                    }else{
                        $("div#'.$name.'-'.$id.'").before( tagrowover_'.$id.' );
                    }
               }
                    
                
            });
        </script>

        ';
    }




    return $theme;    
}

function text_area($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];
    $value=$filter["value"];
    $row=0;
    if(isset($filter["row"])){
        $row=$filter["row"];
    }
    $action="";
    $enter="";
    if(isset($filter["action"],$filter["keycode"])){
        $enter=$filter["keycode"];
        $action=$filter["action"];
    }
    $formClass="";
    if(isset($filter["class"])){
        $classA = explode(",", $filter["class"]);
        foreach ($classA as $key_class => $val_class) {
            $formClass.=$val_class." ";
        }
    }
    $enterEvent="";
    if(isset($filter["enterline"])){
        if ($filter["enterline"]=="false") {
            $enterEvent="return false;";
        }else{
            $enterEvent="";
        }
    }
    $rows="5";
    if(isset($filter["rows"])){
        $rows=$filter["rows"];
    }   
    $grid="col-lg-6";
    if(isset($filter["grid"])){
        $grid=$filter["grid"];
    }

    $maxlength="";
    $txtmaxlength="";
    if(isset($filter["maxlength"])){
        $maxlength='maxlength="'.($filter["maxlength"]+1).'"';
        $txtmaxlength=" [ ".$filter["maxlength"]." ตัวอักษร ]";

    }

    $theme ='
     <div class="'.$grid.'" id="'.$name.'-'.$id.'">  
              <div class="form-group">
                    <label for="'.$id.'">'.$label.''.$txtmaxlength.'</label>
                    <textarea name="'.$name.'" id="'.$id.'" class="form-control '.$formClass.'" rows="'.$rows.'" '.$maxlength.'>'.$value.'</textarea>
                </div>  
      </div>
    ';
    if($row!=0){
        $theme .='
        <script>
            $(document).ready(function(){
               var tagrowstart_'.$id.' = "<div class=\'row\'></div>";
               var tagrowover_'.$id.' = "<div class=\'row\'><div class=\''.$grid.'\'>&nbsp;</div></div>";


               for (i=1; i <= '.$row.'; i++) {

                    if(i==1){
                        $("div#'.$name.'-'.$id.'").wrap( tagrowstart_'.$id.' );
                    }else{
                        $("div#'.$name.'-'.$id.'").before( tagrowover_'.$id.' );
                    }
               }
                    
                
            });
        </script>
        ';
    }
    if($enter!="" && $action!=""){

        $theme .="


    <script>
      $(document).ready(function(){

            jQuery.fn.extend({
            insertAtCaret: function(myValue){
              return this.each(function(i) {
                if (document.selection) {
                  //For browsers like Internet Explorer
                  this.focus();
                  var sel = document.selection.createRange();
                  sel.text = myValue;
                  this.focus();
                }
                else if (this.selectionStart || this.selectionStart == '0') {
                  //For browsers like Firefox and Webkit based
                  var startPos = this.selectionStart;
                  var endPos = this.selectionEnd;
                  var scrollTop = this.scrollTop;
                  this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
                  this.focus();
                  this.selectionStart = startPos + myValue.length;
                  this.selectionEnd = startPos + myValue.length;
                  this.scrollTop = scrollTop;
                } else {
                  this.value += myValue;
                  this.focus();
                }
              });
            }
            });

// Enter   13
// Up arrow    38
// Down arrow  40
// Left arrow  37
// Right arrow 39
// Escape  27
// Spacebar    32
// Ctrl    17
// Alt 18
// Tab 9
// Shift   16
// Caps-lock   20
// Windows key 91
// Windows option key  93
// Backspace   8
// Home    36
// End 35
// Insert  45
// Delete  46
// Page Up 33
// Page Down   34
// Numlock 144
// F1-F12  112-123
// Print-screen    ??
// Scroll-lock 145
// Pause-break 19

            $('textarea#".$id."').keypress(function(e){
                if ( e.which === ".$enter.") {
                $(this).insertAtCaret( '".$action."' );
                 ".$enterEvent."
                }
            });
      });
    </script>


        ";
    }

if(isset($filter["length"])){
    $theme.='
    <script>
    $(document).ready(function(){
        var max_length='.$filter["length"].'; // กำหนดจำนวนตัวอักษร  
        
        $("textarea#'.$id.'").keyup(function(){ // เมื่อ textarea id เท่ากับ data  มี event keyup  
                var this_length=max_length-$(this).val().length; // หาจำนวนตัวอักษรที่เหลือ  
                if(this_length<0){  
                    $(this).val($(this).val().substr(0,255)); // แสดงตามจำนวนตัวอักษรที่กำหนด  
                }else{  
                    $("#now_length").html("<span style=\'color:#FF0000\'>"+this_length+"</span> ตัวอักษร");   
                  // แสดงตัวอักษรที่เหลือ             
                }             
        }); 
     });
    </script>
    ';
}
    return $theme;
}
function image_cover($filter,$id){
    $label=$filter["label"];
    $name=$filter["name"];
    $width=$filter["width"];
    $height=$filter["height"];

    $row=0;
    if(isset($filter["row"])){
        $row=$filter["row"];
    }

    $file=$filter["src"];
    $value="";
    if(isset($filter["value"])){
        $img = $filter["value"];
        $value="<input name='$name' value='$img' type='hidden' >";
    }
    $grid="col-lg-6";
    if(isset($filter["grid"])){
        $grid=$filter["grid"];
    }

    if(isset($filter["delete"])){
        $del_id = $filter["delete"];
        $del_trash="<a class=\"icon-jfi-trash jFiler-item-trash-action\" id=\"{{fi-name}}\" ></a>";
    }else{
        $del_id = $id;
        $del_trash="";
    }

    $theme ='
     <div class="'.$grid.'" id="'.$name.'-'.$id.'">  
              <div class="form-group">
                    <input type="hidden" name="width_cover_'.$id.'" id="width_cover_'.$id.'" value="'.$width.'"/>
                    <input type="hidden" name="height_cover_'.$id.'" id="height_cover_'.$id.'" value="'.$height.'"/>              
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
                ////console.log(\"true\");

                $(\"#width_cover__".$id."\").prop(\"name\",\"\");
                $(\"#height_cover__".$id."\").prop(\"name\",\"\");
               }else{
                ////console.log(\"false\");
                $(\"#width_cover__".$id."\").prop(\"name\",\"width_cover_".$id.")\");
                $(\"#height_cover__".$id."\").prop(\"name\",\"height_cover_".$id.")\");                
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

    if($row!=0){
        $theme .='
        <script>
            $(document).ready(function(){
               var tagrowstart_'.$id.' = "<div class=\'row\'></div>";
               var tagrowover_'.$id.' = "<div class=\'row\'><div class=\''.$grid.'\'>&nbsp;</div></div>";


               for (i=1; i <= '.$row.'; i++) {

                    if(i==1){
                        $("div#'.$name.'-'.$id.'").wrap( tagrowstart_'.$id.' );
                    }else{
                        $("div#'.$name.'-'.$id.'").before( tagrowover_'.$id.' );
                    }
               }
                    
                
            });
        </script>
        ';
    }

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
        $img_scr=getYoutubeIdUrl($val_list["url"]);
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
                    <iframe class="embed-responsive-item" id="url-youtube-'.$val_list["id"].'" src="http://www.youtube.com/embed/'.$img_scr.'"></iframe>
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
    ////console.log(method);
    var part__1 = $(\"button#\"+ID).closest(\".panel\").parent()
    if(method==\"new\"){
        part__1.fadeOut(\"slow\",function(){ part__1.remove(); });
    }else if(method==\"old\"){
        $.post(\"query_sql.php\",{id:ID,method:\"delete-list\"},function(data){
            ////console.log(data)
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
        $val=getYoutubeIdUrl($filter["value"]);
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
                    <iframe class="embed-responsive-item" id="url-youtube-0007" src="http://www.youtube.com/embed/'.$val.'"></iframe>
                </div>
            </div>
        </div>

<script>

function embed_Youtube(input){
    var ID = $(input).attr("id");
    var str = $(input).val();
    ////console.log(input);
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
    $limit="";
    $multiple="";
    if(isset($filter["limit"])){

        if($filter["limit"]>1){
            $multiple="multiple";
        }else{
            $multiple="";
        }
        $limit='data-jfiler-limit="'.$filter["limit"].'"';
    }else{
        $multiple="multiple";
        $limit='';
    }

    if(isset($filter["hidden"])){
        $hidden=$filter["hidden"];
        if($hidden==false){
            $hidden_text="style=\"width:120px;\" required ";
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
            <input  type="file" name="'.$name.'[]" id="'.$id.'" '.$limit.' '.$multiple.'>
    ';
    $theme.="
<script>
$('#".$id."').filer({
    limit: 24,
    addMore: true,
    showThumbs: true,
    templates: {
            box: '<ul class=\"jFiler-items-list jFiler-items-grid\"></ul>',
            item: '<li class=\"jFiler-item\">                        <div class=\"jFiler-item-container\">                            <div class=\"jFiler-item-inner\">                                <div class=\"jFiler-item-thumb\">                                    <div class=\"jFiler-item-status\"></div>                                    <div class=\"jFiler-item-info\">                                        <span class=\"jFiler-item-title\"><b title=\"{{fi-name}}\">{{fi-name | limitTo: 25}}</b></span>                                        <span class=\"jFiler-item-others\">{{fi-size2}}</span>                                    </div>                                    {{fi-image}}                                </div>                                <div class=\"jFiler-item-assets jFiler-row\">                                    <ul class=\"list-inline pull-left\">                                        <li>TH<input type=\"text\" name=\"file_text_TH[]\" class=\"form-control\" ".$hidden_text." />EN<input type=\"text\" name=\"file_text_EN[]\" class=\"form-control\" ".$hidden_text." />{{fi-progressBar}}</li>                                    </ul>                                    <ul class=\"list-inline pull-right\">                                        <li><a class=\"icon-jfi-trash jFiler-item-trash-action\"></a></li>                                    </ul>                                </div>                            </div>                        </div>                    </li>',
            itemAppend: '<li class=\"jFiler-item\">                            <div class=\"jFiler-item-container\">                                <div class=\"jFiler-item-inner\">                                    <div class=\"jFiler-item-thumb\">                                        <div class=\"jFiler-item-status\"></div>                                        <div class=\"jFiler-item-info\">                                            <span class=\"jFiler-item-title\"><b title=\"{{fi-name}}\">{{fi-name | limitTo: 25}}</b></span>                                            <span class=\"jFiler-item-others\">{{fi-size2}}</span>                                        </div>                                        {{fi-image}}                                    </div>                                    <div class=\"jFiler-item-assets jFiler-row\">                                        <ul class=\"list-inline pull-left\">                                            <li><input type=\"hidden\" name=\"other_gID_old[]\"  value=\"{{fi-name}}\"  />TH<input type=\"text\" name=\"file_text_old_TH_{{fi-name}}\" id=\"txt-nameTH-{{fi-name}}\" class=\"form-control\" ".$hidden_text." value=\"{{fi-url}}\" />EN<input type=\"text\" name=\"file_text_old_EN_{{fi-name}}\" id=\"txt-nameEN-{{fi-name}}\" class=\"form-control\" ".$hidden_text." value=\"{{fi-url}}\" /></li>                                        </ul>                                        <ul class=\"list-inline pull-right\">                                            <li><a class=\"icon-jfi-trash jFiler-item-trash-action\" idg=\"{{fi-name}}\"></a></li>                                        </ul>                                    </div>                                </div>                            </div>                        </li>',
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
            $.post('query_sql.php', {id: ids,method: \"delete_".$id."\"});
    },
        
});
</script>
<script>
$(document).ready(function(){
    ";

if(is_array($filter["data_list"])){
    foreach ($filter["data_list"] as $key => $val) {
        if(isset($val["txtTH"])){
            $theme.='$("input#txt-nameTH-'.$val["id"].'").val("'.$val["txtTH"].'");';
        }
        if(isset($val["txtEN"])){
            $theme.='$("input#txt-nameEN-'.$val["id"].'").val("'.$val["txtEN"].'");';
        }
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
    $name=$filter["name"];

    $grid="col-xs-6 col-md-3 col-lg-3";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }

    $theme='<div class="col-lg-12">
            <div class="form-group" style="border:1px #ccc solid;border-radius: 5px;padding: 10px ">
                
                <button type="button" class="btn btn-success" id="'.$id.'" data-form="youtube" onclick="addListText'.$id.'(this)" >เพิ่ม</button>
                <label  for="'.$id.'">'.$label.'</label>
                    <div class="row" id="show-list-text-'.$id.'" style="padding: 5px;">';

if(isset($filter["data_list"])){
    foreach ($filter["data_list"] as $key_list => $val_list) {
        if($filter["two_lang"]==true){
        $theme.='
            <input type="hidden" name="detai_'.$name.'_id[]" value="'.$val_list["id"].'">
            <div class="'.$grid.'" ><div class="panel panel-default">
                <div class="panel-heading text-center">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">TH</span>
                        <input value="'.$val_list["url"].'" type="text" name="edit-'.$name.'-TH-'.$val_list["id"].'" class="form-control"  id="'.$id.'-TH-'.$val_list["id"].'" data-name="'.$id.'-TH">
                        <span class="input-group-btn">
                             <button class="btn btn-default" onclick="delete_new_text'.$id.'(this)" id="'.$val_list["id"].'" data-method="old" type="button"><span class="glyphicon glyphicon-trash"></span</button>
                        </span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">EN</span>
                        <input value="'.$val_list["url"].'" type="text" name="edit-'.$name.'-'.$val_list["id"].'" class="form-control"  id="'.$id.'-EN-'.$val_list["id"].'" data-name="'.$id.'-EN">
                    </div>

                </div>
            </div>
        </div>
        ';
        }else{
        $theme.='
            <input type="hidden" name="detai_'.$name.'_id[]" value="'.$val_list["id"].'">
            <div class="'.$grid.'" ><div class="panel panel-default">
                <div class="panel-heading text-center">
                    <div class="input-group">
                        <input value="'.$val_list["url"].'" type="text" name="edit-'.$name.'-'.$val_list["id"].'" class="form-control"  id="'.$id.'-EN-'.$val_list["id"].'" data-name="'.$id.'-EN">
                        <span class="input-group-btn">
                             <button class="btn btn-default" onclick="delete_new_text'.$id.'(this)" id="'.$val_list["id"].'" data-method="old" type="button"><span class="glyphicon glyphicon-trash"></span</button>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        '; 
        }

    }
}
    $theme.='        </div>
                </div>
            </div>';

    $theme.='
<script>
function addListText'.$id.'(input){
    var form = $(input).data("form");
    if(form=="youtube"){
        form_txt'.$id.'();
    }
}';

if(!isset($filter["textarea"])){
if($filter["two_lang"]==true){
    $theme.='

function form_txt'.$id.'(){
    var count = $("input[data-name='.$id.'-TH]").length;
    var theme = \'\';
    theme +=\'<div id="youtube-new-\'+count+\'" class="'.$grid.'" ><div class="panel panel-default"><div class="panel-heading text-center"><div class="input-group"><span class="input-group-addon" id="basic-addon1">TH</span><input type="text" name="'.$name.'-TH[]" class="form-control" id="txt-youtube-TH-\'+count+\'" data-name="'.$id.'-TH"><span class="input-group-btn"><button class="btn btn-default ok-delete" onclick="delete_new_text'.$id.'(this)" id="'.$id.'-\'+count+\'" data-method="new" type="button"><span class="glyphicon glyphicon-trash"></span</button></span></div><div class="input-group"><span class="input-group-addon" id="basic-addon1">EN</span><input type="text" name="'.$name.'-EN[]" class="form-control" id="'.$id.'-EN-\'+count+\'" data-name="'.$id.'-EN" onchange="embedYoutube(this)"></div></div></div></div>\';
    $("div#show-list-text-'.$id.'").append(theme);
}';
}else{
    $theme.='

function form_txt'.$id.'(){
    var count = $("input[data-name='.$id.'-EN]").length;
    var theme = \'\';
    theme +=\'<div id="youtube-new-\'+count+\'" class="'.$grid.'" ><div class="panel panel-default"><div class="panel-heading text-center"><div class="input-group"><input type="text" name="'.$name.'-EN[]" class="form-control" id="txt-youtube-\'+count+\'" data-name="'.$id.'-EN"><span class="input-group-btn"><button class="btn btn-default ok-delete" onclick="delete_new_text'.$id.'(this)" id="'.$id.'-\'+count+\'" data-method="new" type="button"><span class="glyphicon glyphicon-trash"></span</button></span></div></div></div></div>\';
    $("div#show-list-text-'.$id.'").append(theme);
}'; 
}
}else{

    $theme.='

function form_txt'.$id.'(){
    var count = $("input[data-name='.$id.'-EN]").length;
    var theme = \'\';
    theme +=\'<div id="youtube-new-\'+count+\'" class="'.$grid.'" ><div class="panel panel-default"><div class="panel-heading text-center"><div class="input-group"><textarea  name="'.$name.'-EN[]" class="form-control" id="txt-youtube-\'+count+\'" data-name="'.$id.'-EN"></textarea><span class="input-group-btn"><button class="btn btn-default ok-delete" onclick="delete_new_text'.$id.'(this)" id="'.$id.'-\'+count+\'" data-method="new" type="button"><span class="glyphicon glyphicon-trash"></span</button></span></div></div>   <input  type="file" name="'.$name.'" id="filer_input" class="form-control" ></div></div>\';
    $("div#show-list-text-'.$id.'").append(theme);
}'; 

}

    $theme.='

$("#filer_input").filer();
var ID = "";
function delete_new_text'.$id.'(input){
    $("#myModal-delete").modal("show");
    $(".modal-title").text("คุณต้องการลบ ลิ้ง นี้หรือไม่");
    $(".modal-body").html("<p>กรุณากด ตกลง เพื่อยืนยัน หรือกด ยกเลิกเพื่อปิด</p>");
     ID = $(input).attr("id");
     method = $(input).data("method");
     console.log($(input).attr("id"));
     var part__1 = $("button#"+ID).closest(".panel").parent();
     var results = confirm("Press a button!");
    if (results == true) {
         if(method=="new"){
                part__1.fadeOut("slow",function(){ part__1.remove(); });
         }else if(method=="old"){
            $.post("query_sql.php",{id:ID,method:"delete-list"},function(data){
                part__1.fadeOut("slow",function(){ part__1.remove(); });
            });
         }
    }
}
$(document).ready(function(){
$("button.ok-delete").click(function(){
    console.log("1111111111111");
    var part__1 = $("button#"+ID).closest(".panel").parent()
    if(method=="new"){
        part__1.fadeOut("slow",function(){ part__1.remove(); });
    }else if(method=="old"){
        $.post("query_sql.php",{id:ID,method:"delete-list"},function(data){
            ////console.log(data)
            part__1.fadeOut("slow",function(){ part__1.remove(); });
        });
    }

});
});
</script>
    ';

    return $theme;
}

function map_form($filter,$id){
    $num_id=$filter["number_id"];



    $label=$filter["label"];
$tolTH="";
if (isset($filter["map_tol"])) {

    $tolTH = textfield(array(
            "format"=>"textfield",
            "type"=>"text",
            "grid"=>"col-lg-6",
            "label"=>"เบอร์โทร",
            "name"=>"map_tol".$num_id,
            "value"=>stripslashes($filter["map_tol"])
            ),$id."tol".$num_id);
}
$mailTH="";
if (isset($filter["map_email"])) {

    $mailTH = textfield(array(
            "format"=>"textfield",
            "type"=>"email",
            "grid"=>"col-lg-6",
            "label"=>"e-mail",
            "name"=>"map_email".$num_id,
            "value"=>stripslashes($filter["map_email"])
            ),$id."mail".$num_id);
}

$nameTH="";
if (isset($filter["map_TH"])) {

    $nameTH = textfield(array(
            "format"=>"textfield",
            "type"=>"text",
            "grid"=>"col-lg-6",
            "label"=>"ชื่อสาขา th",
            "name"=>"map_TH".$num_id,
            "value"=>stripslashes($filter["map_TH"])
            ),$id.$num_id);
}

$nameEN="";
if (isset($filter["map_EN"])) {
    $nameEN = textfield(array(
            "format"=>"textfield",
            "grid"=>"col-lg-6",
            "type"=>"text",
            "label"=>"ชื่อสาขา en",
            "name"=>"map_EN".$num_id,
            "value"=>stripslashes($filter["map_EN"])
            ),$id.$num_id);
}
 $textareaTH="";
if (isset($filter["map_Deta_TH"])) {
    $textareaTH = text_area(array(
            "format"=>"textarea",
            "grid"=>"col-lg-6",
            "label"=>"รายละเอี่ยด th",
            "class"=>"ckeditor",
            "name"=>"map_Deta_TH".$num_id,
            "value"=>stripslashes($filter["map_Deta_TH"])
        ),$id.$num_id);
}
$textareaEN="";
if (isset($filter["map_Deta_EN"])) {
    $textareaEN = text_area(array(
            "format"=>"textarea",
            "grid"=>"col-lg-6",
            "label"=>"รายละเอี่ยด en",
            "class"=>"ckeditor",
            "name"=>"map_Deta_EN".$num_id,
            "value"=>stripslashes($filter["map_Deta_EN"])
        ),$id);
}
$map_Images="";
if (isset($filter["images_map"])) {
    $map_Images = image_cover(array(
            "format"=>"image",
            "label"=>"รูปแผนที่",
            "name"=>"map_Images".$num_id,
            "width"=>"auto",
            "height"=>"auto",
            "value"=>$filter["images_map"],
            "src"=>"../../../upload/".name2part($filter["images_map"])."/".$filter["images_map"]
        ),$id."Images".$num_id);
}
$map_Gallery="";
if (isset($filter["gallery_data"])) {
    $map_Gallery = gallery_list(array(
        "format"=>"gallery",
        "label"=>"แกลอรี่ ขนาด 600px * 435px",
        "name"=>"gallery".$num_id,
        "data_list"=>$filter["gallery_data"]
        ),$id.$num_id);
}
    $theme='
    <style>
        div#'.$id.'   {
    width:100%;
    height:450px;
} 

    </style>

<script>
function initialize(lat,lng,zm,img,idoutput,idnumber) { // ฟังก์ชันแสดงแผนที่

var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น

    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object
    // กำหนดจุดเริ่มต้นของแผนที่
    var my_Latlng  = new GGM.LatLng(lat,lng);
    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
    var my_DivObj=$("#"+idoutput)[0];
    // กำหนด Option ของแผนที่
    ////console.log("#"+idoutput+"--"+idnumber)
    var myOptions = {
        zoom: parseInt(zm), // กำหนดขนาดการ zoom
        center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
        
        

      
    };
    map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
    
    my_Marker = new GGM.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
        position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
        map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
        icon:img,
        
        draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
        title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
    });
    
    
    
    
    // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร   
    GGM.event.addListener(my_Marker, \'dragend\', function() {
        var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
        map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker       
        ////console.log(my_Point.lat()); 
        $("#contact_Latitude_"+idoutput).val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
        $("#contact_Longitude_"+idoutput).val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
        $("#contact_Zoom_"+idoutput).val(map.getZoom());  // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu            
    });     

    // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
    GGM.event.addListener(map, \'zoom_changed\', function() {
        $("#contact_Zoom_"+idoutput).val(map.getZoom());   // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
        ////console.log(map.getZoom()); 
    });
    

}
</script>

                              <div class="clearfix"></div>   
                                  <input type="hidden" name="map_id[]" value="'.$num_id.'" >

                              <div class="col-lg-12">    
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">'.$label.'</h3>
                                  </div>
                                  <div class="panel-body">


                                  <div class="col-lg-6">      
                                       
                                        <div class="form-group">
                                            <label>Google Map</label>
                                            <div id="'.$id.'" style="border:#CCC 1px solid;"></div>
                            <span style="color:#F00;">*คลิกลากไอคอนพื่อหาตำแหน่งจุดที่ต้องการ หรือ ระบุพิกัด</span>
 
                                        </div>
                                      
                                  </div> 
                                  
                                  
                                  <div class="col-lg-6">  
                                        <div class="col-lg-5">  
                                          <div class="form-group">
                                                <label>ค่าละติจูด</label>
                                                <input class="form-control" name="contact_Latitude'.$num_id.'" id="contact_Latitude_'.$id.'" type="text" value="'.$filter["lat"].'">
                                                
                                            </div>  
                                        </div>
                                        
                                        <div class="col-lg-5">  
                                          <div class="form-group">
                                                <label>ค่าลองติจูด</label>
                                                <input class="form-control" name="contact_Longitude'.$num_id.'" id="contact_Longitude_'.$id.'" type="text" value="'.$filter["lon"].'">
                                                
                                            </div>  
                                        </div>
                                        
                                       <div class="col-lg-2">  
                                          <div class="form-group">
                                                <label>ซูม</label>
                                                <input class="form-control" name="contact_Zoom'.$num_id.'" id="contact_Zoom_'.$id.'" type="text" value="'.$filter["zoom"].'">
                                                
                                            </div>  
                                        </div> 

                                     
                                     <div class="col-lg-12">  
                                          <div class="form-group">
                                                <label>โลโก้ ขนาด 141px * 87px </label>
                                                <input  type="file" name="contact_Logo'.$num_id.'" id="Imagess_'.$id.'">

                                                         
                                                <input name="contact_Logo'.$num_id.'" value="'.$filter["img"].'" type="hidden">

                                                
<script>
$(\'#Imagess_'.$id.'\').filer({
    limit: 1,
    showThumbs: true,
    templates: {
            box: \'<ul class="jFiler-items-list jFiler-items-grid"></ul>\',
            item: \'<li class="jFiler-item">\
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
                    </li>\',
            itemAppend: \'<li class="jFiler-item">\
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
                                            <li><!--<a class="icon-jfi-trash jFiler-item-trash-action" id="{{fi-name}}"></a>--></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>\',
            progressBar: \'<div class="bar"></div>\',
            itemAppendToEnd: false,
            removeConfirmation: true,
            _selectors: {
                list: \'.jFiler-items-list\',
                item: \'.jFiler-item\',
                progressBar: \'.bar\',
                remove: \'.jFiler-item-trash-action\'
            }
        },
        files: [
            {
                name: \'<?php echo $data["contact_ID"]?>\',
                type: "image",
                file: "../../../upload/'.$filter["img"].'"
                
                
            }
        
        ],
});
</script>
                                               
                                                
                                            </div>  
                                        </div>
                                    </div>
                              <div class="col-lg-12"> 
                              '.$map_Gallery.'
                            </div>
                              <div class="col-lg-12"> 
                              '.$nameTH.' '.$nameEN.'
                            </div>
                              <div class="col-lg-12"> 
                              '.$tolTH.' '.$mailTH.'
                            </div>
                              <div class="col-lg-12"> 
                              '.$textareaTH.' '.$textareaEN.'
                            </div>
                            <div class="col-lg-12"> 
                              '.$map_Images.'
                            </div>


                                 </div>
                            </div>
                                        
</div>   



<script>
var lat=\''.$filter["lat"].'\';
var lng=\''.$filter["lon"].'\';
var zm=\''.$filter["zoom"].'\';

if(lat==""){
lat=13.7583198;
}

if(lng==""){
lng=100.6504297;
}

if(zm==""){
zm=10;
}

var img =\'../../../upload/'.$filter["img"].'\';

$("#Imagess_'.$id.'").change(function(){
setTimeout(function(){
    img = map_marker;
    initialize(lat,lng,zm,img,"'.$id.'","'.$num_id.'");
},400);

// 
});

$("#contact_Latitude_'.$id.'").change(function(){
lat=$(this).val();
initialize(lat,lng,zm,img,"'.$id.'","'.$num_id.'");
});

$("#contact_Longitude_'.$id.'").change(function(){
lng=$(this).val();
initialize(lat,lng,zm,img,"'.$id.'","'.$num_id.'");
});

$("#contact_Zoom_'.$id.'").change(function(){
zm=$(this).val();
initialize(lat,lng,zm,img,"'.$id.'","'.$num_id.'");
});

    
google.maps.event.addDomListener(window, "load", initialize(lat,lng,zm,img,"'.$id.'","'.$num_id.'"));


</script>

    ';


    return $theme;
}

function input_list($form,$id){
    $row=0;
    if(isset($filter["row"])){
        $row=$filter["row"];
    }
    $grid="col-lg-12";
    if($filter["grid"]){
        $grid=$filter["grid"];
    }

$theme =    '
            <div class="clearfix">
            <div class="panel" >
                <div class="panel-heading" style="min-height:30px;">
                    <button class="'.$id.'_add btn btn-success" type="button" ><i class="fa fa-plus" aria-hidden="true" style="font-size:18px;"></i></button> '.$form["label"].'
                </div>
                <div class="panel-body">

                    
                    <ul id="'.$id.'" style="list-style:none;padding-left:5px">
            ';

if(is_array($form["data_list"])){

    foreach ($form["data_list"] as $keyData => $valData) {
        $changeForm=$form["form"];

        foreach ($form["name"] as $keycn => $valcn) {
            $nameEx = explode("_", $valcn);
            $ChangeNameEx=str_replace($nameEx[count($nameEx)-1],'',$valcn);

            $changeForm=str_replace("{{".$keycn."}}", $ChangeNameEx.''.$valData["id"].'" data-fix="data-fix-value-'.$id.'"', $changeForm);
        }


        foreach ($valData as $keyD => $valD) {
          $changeForm=str_replace('{{'.$keyD.'}}', $valD,$changeForm);
        }


        $theme .='<li class="'.$id.'_var" style="margin-bottom:15px" id="'.$id.'_'.$keyData.'">
                    <div class="form-group label-floating is-empty onerow portwidth2 list-group-item">
                        <input type="hidden" class="data-fix-value-'.$id.'" data-id="'.$id.'_edit_id" empty_val="false"  value="'.$valData["id"].'" >
                        <input type="hidden" class="data-fix-value-'.$id.'" data-id="Type_'.$id.'_add" empty_val="false" name="Type_'.$id.'_0"  value="'.$id.'" >
                        '.$changeForm.'
                        <a href="javascript:void:(0)" class="'.$id.'_del111" onclick="'.$id.'_delete_list(this)" id="'.$valData["id"].'" style="position:absolute;top:-15px;right:-15px;">
                            <i class="fa fa-times-circle" aria-hidden="true" style="font-size:2em;color:red"></i>
                            <input type="hidden" class="int_'.$id.'_del" name="hid_0" value="'.$valData["id"].'">
                        </a>
                    </div>
                </li>';


    }
}else{
        $changeForm=$form["form"];
        foreach ($form["name"] as $keycn => $valcn) {
            $nameEx = explode("_", $valcn);
            $ChangeNameEx=str_replace($nameEx[count($nameEx)-1],'',$valcn);

            $changeForm=str_replace("{{".$keycn."}}", $valcn.'" data-name="'.$ChangeNameEx.'add[]" data-fix="data-fix-value-'.$id.'"', $changeForm);
        }

        $theme .='<li class="'.$id.'_var" style="margin-bottom:15px">
                    <div class="form-group label-floating is-empty onerow portwidth2 list-group-item">
                        <input type="hidden" class="data-fix-value-'.$id.'" data-id="Type_'.$id.'_add" empty_val="false"  value="'.$id.'" name="Type_'.$id.'_0" >
                        '.preg_replace('/({{\w+\}})/i', '', $changeForm).'
                        <a href="javascript:void:(0)" class="'.$id.'_del" style="position:absolute;top:5px;right:5px;">
                            <i class="fa fa-times-circle" aria-hidden="true" style="font-size:2em;color:red"></i>
                        </a>
                    </div>
                </li>';
}


if(is_array($form["data_list"])){


$theme .=   '       
                        </ul>
                    </div>

                </div>
            

<script type="text/javascript">
$("#'.$id.'").addInputArea();

$("input.data-fix-value-'.$id.'[type=hidden]").each(function(){
    $(this).attr("name",$(this).attr("data-id")+"[]");
})


function '.$id.'_delete_list(input){
    $("#myModal-delete").modal();
    var IDElement = $(input).find("input.int_'.$id.'_del").val()
    $("#ok-delete").click(function(){
            console.log(IDElement);
        if(IDElement==undefined){
            $(input).closest("li.'.$id.'_var").remove();
        }else{
            $.post("query_sql.php",{id:IDElement,method:"delete-list-item"},function(d){
                 $(input).closest("li.'.$id.'_var").remove();
            });
        }
    })
}
</script>
</div>
            ';

}else{

$theme .=   '       
                        </ul>
                    </div>
                    

                </div>

<script type="text/javascript">
$("#'.$id.'").addInputArea();

$("input.data-fix-value-'.$id.'[type=hidden]").each(function(){
    $(this).attr("name",$(this).attr("data-id")+"[]");
})
$("input[data-fix=data-fix-value-'.$id.']").each(function(){
    $(this).attr("name",$(this).data("name"));
})
</script>
</div>
            ';

}



return $theme;
}
 ?>

