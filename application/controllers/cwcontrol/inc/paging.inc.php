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

function paging_pagenum($current_page, $total_pages, $page_range, $query_string ,$txtKeyword1) {

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
	$url = "index.php" . "?" . $query_string;

	$result = "";
	
	 if($current_page > 1) {
 		$page = $current_page - 1;
		$result .= "&nbsp;";
 		$result .= "<li><a href=\"$url&page=$page&txtKeyword=$txtKeyword1\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
 		//$result .= "<a style=float:left; class=number href=\"$url&page=$page&txtKeyword=$txtKeyword1\">← ย้อนกลับ</a>";
	}

	if($page_start > 1) {
		$page = $page_start - 1;
		$result .= "&nbsp;";
		$result .= "<li><a href=\"$url&page=$page&txtKeyword=$txtKeyword1\">...</a></li>";
	}

	for($i = $page_start; $i <= $page_end; $i++) {
		$result .= "&nbsp;";
		if($i == $current_page) {
			$result .= "<li class=\"active\"><a href=#>$i</a></li>";
		}
		else {
			$result .= "<li><a class=number href=\"$url&page=$i&txtKeyword=$txtKeyword1\">$i</a></li>";
		}
		$result .= "&nbsp;";
	}

	if($page_end < $total_pages) {
		$page = $page_end + 1;
		$result .= "&nbsp;"; 
		$result .= "<li><a href=\"$url&page=$page&txtKeyword=$txtKeyword1\">...</a></li>";		
	}

	if($current_page < $total_pages) {
 		$page = $current_page + 1;
		$result .= "&nbsp;";
 		//$result .= "<a class=number href=\"$url&page=$page&txtKeyword=$txtKeyword1\">ถัดไป →</a>";
 		$result .= "<li><a href=\"$url&page=$page&txtKeyword=$txtKeyword1\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
	}
	
 	if($result == "") {
		return "1";
	}
	else {
 		return $result;
	}
}
 
 ?>