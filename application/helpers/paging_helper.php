<?php

function paging_start_row($current_page, $rows_per_page) {

	return ($current_page - 1) * $rows_per_page;
	
}
function keyword($word) {

	return $word;
	
}

function paging_stop_row($start_row, $rows_per_page, $total_rows) {

	return (($start_row + $rows_per_page) < $total_rows) ? ($start_row + $rows_per_page) : $total_rows;
	
}

function paging_total_pages($total_rows, $rows_per_page) {

 	return ceil($total_rows / $rows_per_page);
	
}
function format_tag($link="",$page="",$str_page="",$active="",$form=null){
   if($str_page=="PREV"){
     if(!isset($form["prev"])){
     $str_page='<i class="fa fa-caret-left" aria-hidden="true"></i>';
 	 }else{
 	 $str_page=$form["prev"];
 	 }
   }elseif($str_page=="NEXT"){
     if(!isset($form["next"])){
     $str_page='<i class="fa fa-caret-right" aria-hidden="true"></i>';
     }else{
 	 $str_page=$form["next"];
 	 }
   }
   if(!isset($form["theme"])){
         $format_tag="<li class=\"$active\"><a href=\"$link\" title='".$page."'>$str_page</a></li>";
   }else{
         $search  = array("{{link}}", "{{page}}","{{active}}","{{str_page}}");
         $replace = array($link,$page,$active,$str_page);
         $format_tag = str_replace($search, $replace, $form["theme"]);
   }
   
   return $format_tag;// ฟั่งชั้น นี้สามารถ
}
function paging_pagenum($current_page, $total_pages, $page_range, $query_string, $page_url,$formatform="") {

	$page_start = $current_page - $page_range;
	$page_end = $current_page + $page_range;

	if($page_start < 1) {	
		$page_end += 1 - $page_start;  
 		$page_start = 1;
	}

	if($page_end > $total_pages) {
 		$diff = $page_end - $total_pages;
		$page_start -= $diff;
		if($page_start < 1) {
			$page_start = 1;
		}

		$page_end = $total_pages;
	}
	
	//$url = $_SERVER['PHP_SELF'] . "?" . $query_string;
	$url = $page_url . "?" . $query_string;
	//$url = "index.php" . "?" . $query_string;
	//$url = "";		
	$result = "";
	
	 if($current_page > 1) {
 		$page = $current_page - 1;
 		$link="$url&page=$page";
 		$str_page="PREV";
		$result .= "&nbsp;";
		$result .= format_tag($link,$page,$str_page,"",$formatform);
 		// $result .= "<li><a href=\"$url&page=$page\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
 		//$result .= "<a style=float:left; class=number href=\"$url&page=$page&txtKeyword=$txtKeyword1\">← ย้อนกลับ</a>";
	}

	if($page_start > 1) {
		$page = $page_start - 1;
		$link="$url&page=$page";
		$str_page="...";
		$result .= "&nbsp;";
		$result .= format_tag($link,$page,$str_page,"",$formatform);
		// $result .= "<li><a href=\"$url&page=$page\">...</a></li>";
	}

	for($i = $page_start; $i <= $page_end; $i++) {
		$result .= "&nbsp;";
		if($i == $current_page) {
			$active1="active";
			$link="javascript:void(0)";
			$str_page=$i;
			$result .= format_tag($link,$i,$str_page,$active1,$formatform);
			// $result .= "<li class=\"active\"><a href=\"javascript:void(0)\">$i</a></li>";
		}
		else {
			$active='';
			$link="$url&page=$i";
			$str_page=$i;
			$result .= format_tag($link,$i,$str_page,$active,$formatform);
			// $result .= "<li><a class=number href=\"$url&page=$i\">$i</a></li>";
		}
		//$result .= "&nbsp;";
	}

	if($page_end < $total_pages) {
		$page = $page_end + 1;
		$link="$url&page=$page";
		$str_page="...";	
		$result .= "&nbsp;"; 
		$result .= format_tag($link,$page,$str_page,"",$formatform);
		// $result .= "<li><a href=\"$url&page=$page\">...</a></li>";		
	}

	if($current_page < $total_pages) {
 		$page = $current_page + 1;
		$link="$url&page=$page";
		$str_page="NEXT";
		$result .= "&nbsp;";
 		$result .= format_tag($link,$page,$str_page,"",$formatform);
 		// $result .= "<li><a href=\"$url&page=$page\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
	}
	
 	if($result == "") {
		return "1";
	}
	else {
 		return $result;
	}
}
 
 ?>