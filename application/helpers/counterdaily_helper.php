<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
function counterDaily()
{			
			$dataCounter=array();
			$ci=& get_instance();
			$ci->load->database(); 

			$sql2 = "SELECT DATE FROM counter LIMIT 0,1";	
			$query = $ci->db->query($sql2);
			$row = $query->row_array();


			$sqlchk = "SELECT DATE,IP FROM counter where DATE='".date("Y-m-d")."' AND IP='".$_SERVER["REMOTE_ADDR"]."' ";	
			$quechk = $ci->db->query($sqlchk);
			if(!$rowchk = $quechk->row_array()){
				$sqlCurrent=" INSERT INTO counter (DATE,IP) VALUES ('".date("Y-m-d")."','".$_SERVER["REMOTE_ADDR"]."') ";
				$ci->db->query($sqlCurrent);				
			}

			if($row["DATE"] != date("Y-m-d"))
			{
				//*** บันทึกข้อมูลของเมื่อวานไปยังตาราง daily ***//
				$sqldaily=" INSERT INTO daily (DATE,NUM) SELECT '".date('Y-m-d',strtotime("-1 day"))."',COUNT(*) AS intYesterday FROM  counter WHERE 1 AND DATE = '".date('Y-m-d',strtotime("-1 day"))."'";
				$ci->db->query($sqldaily);

				//*** ลบข้อมูลของเมื่อวานในตาราง counter ***//
				$sqldailyRemove=" DELETE FROM counter WHERE DATE != '".date("Y-m-d")."' ";
				$ci->db->query($sqldailyRemove);

				//*** Insert Counter ปัจจุบัน ***//
				
			}

		
			//******************** Get Counter ************************//
			// Today //
			$sqlToday = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '".date("Y-m-d")."' ";	
			$queToday = $ci->db->query($sqlToday);
			$rowToday = $queToday->row_array();
			$dataCounter["Today"]=$rowToday["CounterToday"];
			// !Today //


			// Yesterday //
			$sqlYesterday = " SELECT NUM FROM daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";	
			$queYesterday = $ci->db->query($sqlYesterday);
			$rowYesterday = $queYesterday->row_array();
			$dataCounter["Yesterday"]=$rowYesterday["NUM"];
			// !Yesterday //


			// This Month   //
			$sqlThisMonth = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";	
			$queThisMonth = $ci->db->query($sqlThisMonth);
			$rowThisMonth = $queThisMonth->row_array();
			$dataCounter["ThisMonth"]=$rowThisMonth["CountMonth"]+$dataCounter["Today"];
			// !This Month  //


			// Last Month   //
			$sqlLastMonth = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m',strtotime("-1 month"))."' ";	
			$queLastMonth = $ci->db->query($sqlLastMonth);
			$rowLastMonth = $queLastMonth->row_array();
			$dataCounter["LastMonth"]=$rowLastMonth["CountMonth"];
			// !Last Month  //


			// This Year   //
			$sqlThisYear = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";	
			$queThisYear = $ci->db->query($sqlThisYear);
			$rowThisYear = $queThisYear->row_array();
			$dataCounter["ThisYear"]=$rowThisYear["CountYear"]+$dataCounter["Today"];
			// !This Year  //


			// Last Year   //
			$sqlLastYear = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y',strtotime("-1 year"))."' ";	
			$queLastYear = $ci->db->query($sqlLastYear);
			$rowLastYear = $queLastYear->row_array();
			$dataCounter["LastYear"]=$rowLastYear["CountYear"];
			// !Last Year  //


			// This Total   //
			$sqlThisTotal = " SELECT SUM(NUM) AS CountTotal FROM daily ";	
			$queThisTotal = $ci->db->query($sqlThisTotal);
			$rowThisTotal = $queThisTotal->row_array();
			$dataCounter["ThisTotal"]=$rowThisTotal["CountTotal"]+$dataCounter["Today"];
			// !This Total  //

			return $dataCounter;
}