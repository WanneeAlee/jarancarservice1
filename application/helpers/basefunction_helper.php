<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


function asset_url()
{
   return base_url().'assets/';
}



function apikey($datakey)
{
   
	if($datakey == "site_key"){
		$data = "6LfndxoUAAAAAAjNyrgyjI_2L1ShMMbkSz-6ev0E";
		
	}else if($datakey == "secret_key"){
		$data = "6LfndxoUAAAAAMlPpUJ5lewMQYvxd-vi__Mhlae6";
		
	}else if($datakey == "api_key"){
		$data = "AIzaSyAisSUL-O_CVNt2HhpAdDNlONzbzR7abY0";
	
	}
     
	
	return $data;
	
}

function parseSize($size)
{
        if ($size < 1024) {
            return $size . ' bytes';
        }elseif($size >= 1024 && $size < 1024 * 1024){
          	return sprintf('%01.2f', $size / 1024.0) . ' Kb';
        }else{
            return sprintf('%01.2f', $size / (1024.0 * 1024)) . ' Mb';
        }
        
}

function download($part,$namefile,$datafile,$type){

$ctype=null;
switch ($type) {
  case "exe": $ctype="application/octet-stream"; break;
  case "zip": $ctype="application/zip"; break;
  case "docx":
  case "doc": $ctype="application/msword"; break;
  case "csv":
  case "xls":
  case "xlsx": $ctype="application/vnd.ms-excel"; break;
  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
  case "tif":
  case "tiff": $ctype="image/tiff"; break;
  case "psd": $ctype="image/psd"; break;
  case "bmp": $ctype="image/bmp"; break;
  case "ico": $ctype="image/vnd.microsoft.icon"; break;
  default: $ctype="application/force-download";
}


$fullPath = "$part/$datafile";
	//$fullPath = $part;

if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    header("Content-type: $ctype");
    header("Content-Disposition: filename=\"".$namefile.".".$type."\"");
    // header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
}

function DateThai_timestame($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear / $strHour:$strMinute:$strSeconds น.";
	}
function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear ";
	}

	//$strDate = "2008-08-14 13:42:44";
	//echo "ThaiCreate.Com Time now : ".DateThai($strDate);
function Date_Month_Full($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}	
function Date_Month_Full2($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}	
	
function Date_Month_Full_T($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds น.";
	}
	
	
function Date_Month_Year($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("m",strtotime($strDate));
	$strDay= date("d",strtotime($strDate));
	
	return "$strDay/$strMonth/$strYear ";
}	
	
	
function DateDiff($strDate1,$strDate2)  
{  
  return intval((strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 ));  
// 1 day = 60*60*24  
} 
	
function utf8_strlen($str)
   {
      $c = strlen($str);
      $l = 0;
      for ($i = 0; $i < $c; ++$i)
      {
         if ((ord($str[$i]) & 0xC0) != 0x80)
         {
            ++$l;
         }
      }
      return $l;
   }
function random_password($len)
{
	srand((double)microtime()*10000000);
	$chars = "abcdefghjkmnpqrstuvwxyz";
	$ret_str = "";
	$num = strlen($chars);
		for($i = 0; $i < $len; $i++)
		{
		$ret_str.= $chars[rand()%$num];
		$ret_str.=""; 
		}
	return $ret_str; 
}
   

   


// วิธีเรียกใช้แบบนี้ครับ

/*<input type="hidden" name="mIP"  id="mIP"  value="<?=getIP();?>">*/

// เวลา save รับค่าแบบนี้   $_POST['mIP'] ไปเป็น value ใน sql command ครับ
function getIP(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



   
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
 
 
 
 
/*function time_check($strDate1,$strDate2)  
{  
  return intval((strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 ));  
// 1 day = 60*60*24  
} 
*/ 
 
 function TimeDiff($strTime1,$strTime2)
	 {
		//$current_time   = time();
		return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 } 
 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
 function TimeminDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60); // 1 Hour =  60*60
	 }
	 
	 
function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'ปี',
        2592000 => 'เดือน',
        604800 => 'สัปดาห์',
        86400 => 'วัน',
        3600 => 'ชั่วโมง',
        60 => 'นาที',
        1 => 'วินาที'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
	 
 
 function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    
    //intervals in seconds
    $intervals      = array (
        'ปี' => 31556926, 'เดือน' => 2629744, 'สัปดาห์' => 604800, 'วัน' => 86400, 'ชั่วโมง' => 3600, 'นาที'=> 60
    );
    
    //now we just find the difference
    if ($diff == 0)
    {
        return 'ไม่กี่วินาทีที่แล้ว';
    }    

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' วินาทีที่แล้ว' : $diff . ' วินาทีที่แล้ว';
    }        

    if ($diff >= 60 && $diff < $intervals['ชั่วโมง'])
    {
        $diff = floor($diff/$intervals['นาที']);
        return $diff == 1 ? $diff . ' นาทีที่แล้ว' : $diff . ' นาทีที่แล้ว';
    }        

    if ($diff >= $intervals['ชั่วโมง'] && $diff < $intervals['วัน'])
    {
        $diff = floor($diff/$intervals['ชั่วโมง']);
        return $diff == 1 ? $diff . ' ชั่วโมงที่แล้ว' : $diff . ' ชั่วโมงที่แล้ว';
    }    

    if ($diff >= $intervals['วัน'] && $diff < $intervals['สัปดาห์'])
    {
        $diff = floor($diff/$intervals['วัน']);
        return $diff == 1 ? $diff . ' วันที่แล้ว' : $diff . ' วันที่แล้ว';
    }    

    if ($diff >= $intervals['สัปดาห์'] && $diff < $intervals['เดือน'])
    {
        $diff = floor($diff/$intervals['สัปดาห์']);
        return $diff == 1 ? $diff . ' สัปดาห์ที่แล้ว' : $diff . ' สัปดาห์ที่แล้ว';
    }    

    if ($diff >= $intervals['เดือน'] && $diff < $intervals['ปี'])
    {
        $diff = floor($diff/$intervals['เดือน']);
        return $diff == 1 ? $diff . ' เดือนที่แล้ว' : $diff . ' เดือนที่แล้ว';
    }    

    if ($diff >= $intervals['ปี'])
    {
        $diff = floor($diff/$intervals['ปี']);
        return $diff == 1 ? $diff . ' ปีที่แล้ว' : $diff . ' ปีที่แล้ว';
    }
}
 
 
 function PureUrl($x) {
   $url = $x;
   if ( substr($url, 0, 7) == 'http://') { $url = substr($url, 7); }
   if ( substr($url, 0, 8) == 'https://') { $url = substr($url, 8); }
   if ( substr($url, 0, 4) == 'www.') { $url = substr($url, 4); }
   /*if ( strpos($url, '/') !== false) {
      $ex = explode('/', $url);
      $url = $ex['0'];
   }*/

      return $url;
}
function encode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
	$hash="";
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($i == $keyLen) { $i = 0; }
        $ordKey = ord(substr($key,$i,1));
        $i++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
	$hash="";
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($i == $keyLen) { $i = 0; }
        $ordKey = ord(substr($key,$i,1));
        $i++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}



function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

    if(strlen($phoneNumber) == 10) { //xxx-xxx-xxxx
        $areaCode = substr($phoneNumber, 0, 3);
        $nextThree = substr($phoneNumber, 3, 3);
        $lastFour = substr($phoneNumber, 6, 4);

        $phoneNumber = ''.$areaCode.'-'.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phoneNumber) == 9) {//xx-xxx-xxxx
        $areaCode = substr($phoneNumber, 0, 2);
        $nextThree = substr($phoneNumber, 3, 3);
        $lastFour = substr($phoneNumber, 6, 4);

        $phoneNumber = ''.$areaCode.'-'.$nextThree.'-'.$lastFour;
    }
    
    return $phoneNumber;
}



function auto_copyright($year = 'auto'){
	
if(intval($year) == 'auto'){ $year = date('Y'); }

if(intval($year) == date('Y')){ echo intval($year); }

if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }

if(intval($year) > date('Y')){ echo date('Y'); }

	
}
?>