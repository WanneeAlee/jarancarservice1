<?php 
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
		return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
	}

function Date_Month_Full_E($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("F",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		
		return "$strDay $strMonth $strYear เวลา $strHour:$strMinute น.";
	}		
function DateNum($strDate)
	{
		$strYear = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
		$strMonthThai=$strMonthCut[$strMonth];
		if($strDay < 10){
		return "0$strDay / $strMonthThai / $strYear ";
		}else{
		return "$strDay / $strMonthThai / $strYear ";	
		}
	}

function DateNum_lang($strDate,$lang)
	{
		$strYear = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
		$strMonthThai=$strMonthCut[$strMonth];
		if($lang=="TH"){
			return "$strDay/$strMonthThai/$strYear เวลา $strHour:$strMinute น ";			
		}else{
			return "$strDay/$strMonthThai/$strYear  $strHour:$strMinute ";			
		}

	}

function DateFomat($strDate,$fomat)
	{
		$strYear = date("Y",strtotime($strDate));
		$strMonthn= date("n",strtotime($strDate));
		$strMonth= date("M",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCutNum = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
		$strMonthNum=$strMonthCutNum[$strMonthn];

		$strMonthCutTH = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCutTH[$strMonthn];


		$search  = array("[Year]","[Year-EN]","[Year-TH]", "[Month-EN]","[Month-TH]","[Month]","[Day]","[Hour]","[Minute]","[Seconds]");
    	$replace = array($strYear,$strYear,($strYear+543), $strMonth,$strMonthThai,$strMonthNum, $strDay,$strHour,$strMinute,$strSeconds);
		
			return str_replace($search, $replace, $fomat);
		
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
   
function menu_icon($str){
	if($str == "Home"){
		$icon = "home";
	}else if($str == "Company"){
		$icon = "company";
	}else if($str == "application/octet-stream"){
		$icon = "rar";
	}else if($str == "application/pdf"){
		$icon = "pdf";
	}else{
		$icon = "other";
	}
      return $icon;

}   
   
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

// วิธีเรียกใช้แบบนี้ครับ

/*<input type="hidden" name="mIP"  id="mIP"  value="<?=getIP();?>">*/

// เวลา save รับค่าแบบนี้   $_POST['mIP'] ไปเป็น value ใน sql command ครับ
   
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
 
 
 function text_red($str){
	 
	 {
		 return("<span style=color:#D74B4B>$str</span>");
		 
	 }
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
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}

function amuNew ($v){
	if($v=='1'){
		$v = "พระเด่น";
	}else{
		$v = "";
	}
	return $v;
}

function amuStatus ($v){
	if($v=='1'){
		$v = '<img src="images/status1.png" width="70" height="17" alt="พร้อมเช่า"/>';
	}else if($v=='2'){
		$v = '<img src="images/status2.png" width="70" height="17" alt="ขายแล้ว"/>';
	}else if($v=='3'){
		$v = '<img src="images/status3.png" width="70" height="17" alt="โชว์พระ"/>';
	}else{
		$v = '<img src="images/status1.png" width="70" height="17" alt="พร้อมเช่า"/>';
	}
	return $v;
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

function gettype1($type1) {
	if($type1 == 1){
		$result1 = "โปรโมชั่น CONDO";
	}else if($type1 == 2){
		$result1 = "โปรโมชั่น TOWNHOME 3 ชั้น";
	}else{
		$result1 = "โปรโมชั่น TOWNHOME";
	}
	return $result1;
}
/*function chkPayment(){
	$payment = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS countpayment FROM tb_payments WHERE payment_status='no' "));
	return $payment["countpayment"];
}
*/


function file_type($file_type){
	if($file_type == "application/vnd.ms-excel" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
		$type = "excel";
		$img_type = "<img src=../../images/excel.png width=26 >"; 
	}else if($file_type == "application/msword" || $file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
		$type = "word";
		$img_type = "<img src=../../images/word.png width=26 height=26>"; 
	}else if($file_type == "application/octet-stream"){
		$type = "rar";
		$img_type = "<img src=../../images/rar.png width=26 height=26>"; 
	}else if($file_type == "application/pdf"){
		$type = "pdf";
		$img_type = "<img src=../../images/pdf.png width=26 height=26>"; 
	}else{
		$type = "other";
		$img_type = "<img src=../../images/other.png width=26 height=26>"; 
	}
      return $img_type;
}
function file_type2($file_type){
	if($file_type == "application/vnd.ms-excel" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
		$type = "excel";
		$img_type = "excel.png "; 
	}else if($file_type == "application/msword" || $file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
		$type = "word";
		$img_type = "word.png"; 
	}else if($file_type == "application/octet-stream"){
		$type = "rar";
		$img_type = "rar.png"; 
	}else if($file_type == "application/pdf"){
		$type = "pdf";
		$img_type = "pdf.png"; 
	}else{
		$type = "other";
		$img_type = "other.png"; 
	}
      return $img_type;
}

function auto_copyright($year = 'auto'){
	
if(intval($year) == 'auto'){ $year = date('Y'); }

if(intval($year) == date('Y')){ echo intval($year); }

if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }

if(intval($year) > date('Y')){ echo date('Y'); }

	
}

function SI_prefix($num){
  if(is_numeric($num)){ // ถ้า $num เป็นตัวเลข หรือเป็นสตริงที่สามารถแปลงเป็นตัวเลขได้
    $negative = ''; // สัญลักษณ์ติดลบ ให้เริ่มแรกคือ ไม่มี (สตริงว่าง)
    if($num < 0){ // หาก $num น้อยกว่า 0
      $negative = '-'; // ให้แสดงสัญลักษณ์ติดลบ
      $num = abs($num); // และทำให้ $num เป็นจำนวนสัมบูรณ์ (จำนวนบวก)
    }
    if($num < 1000){ // หาก $num น้อยกว่า 1000 ให้คืนค่ากลับไปเลย ไม่ต้องคำนวณอะไรอีก
      return (int) ($negative.$num); // เชื่อมต่อ $negative ที่แสดงเครืองหมายติดลบ และ $num ที่เป็นจำนวน เข้าด้วยกันด้วย .
      // โดยแปลงเป็นชนิด int (คือจะไม่มีจุดทศนิยมแน่นอน) ก่อน return
    }else{ // หากมากกว่านั้น
      $prefix = array('k','M','G','T','P','E'); // ตารางของ SI prefix
      // หลักการคือ ทำให้ $num อยู่ในรูปแบบมี comma คั่นด้วย number_format()
      // เช่น 100000 ก็จะได้ 100,000
      // หลังจากนั้นก็จะส่งต่อมาที่ split() เพื่อแยกส่วนต่างๆ ออกจากกันด้วย comma
      // เช่น 100,000 ก็จะได้ array ที่มีสมาชิก 2 ตัวคือ 100 ตามด้วย 000 และให้เป็นค่าแก่ตัวแปร $temp
      $temp = split(',', number_format($num) );
      // หลังจากนั้นก็จะเอาสมาชิกตัวที่ 1 ของ $temp ซึ่งก็คือ 100 อ้างถึงด้วย $temp[0] มาเป็นตัวหลัก
      // และหา "จำนวนสมาชิกใน $temp" ด้วย count($temp)
      // และลบด้วย 2 เพื่อที่จะให้ได้ index ที่เริ่มจาก 0 เพื่อไปเข้าถึงสมาชิกใน $prefix ว่าจะใช้ตัวอักษรใด (k, M, G etc.)
      // และเชื่อมต่อส่วนต่างๆ ทั้งหมดด้วย .
      echo $negative.$temp[0].' '.$prefix[count($temp)-2];
    }
  }else{ // แต่ถ้าหาก $num เป็นชนิดข้อมูลอื่นที่ไม่สามารถแปลงเป็นตัวเลขได้
    return 0; // คืน 0 กลับไป
  }
}

function name2part($name){
	$subpart1=null;
	$subpart2=null;
	$part1=explode("_",$name);
	$mpart=$part1[1];
	$spart1=explode("-", $part1[0]);
	$subpart1="/".$spart1[0];
	if(isset($spart1[1])){
		$subpart2="/".$spart1[1];
	}

	$part = $mpart.$subpart1.$subpart2;
	return $part;
}


function percentageOf( $Sale, $Price, $decimals = 2 ){

    $discount = $Price - $Sale;

    return round( ($discount / $Price * 100), $decimals );
}

function getYoutubeIdFromUrl($url) {
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

function lang($_th,$_en,$_hl){
	if($_hl=="EN"){
		return $_en;
	}else{
		return $_th;
	}
}

?>