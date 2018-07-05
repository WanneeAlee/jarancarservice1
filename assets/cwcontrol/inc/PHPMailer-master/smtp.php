<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PHPMailer - SMTP test</title>
</head>
<body>
<?php

$body='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent" align="center" bgcolor="#ffffff" style="font-family:Helvetica, Arial,serif;">

      
      <tr><td height="35"></td></tr>

      <tr>
        <td>
          <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
              <td width="40"></td>
              <td width="520">
                <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">

<!-- =============================== Header ====================================== -->           

                  <tr><td height="15"></td></tr>

                  <tr>
                    <td valign="top" align="center" height="58">
                      <div class="contentEditableContainer contentTextEditable">
                        <div class="contentEditable">
                          <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;"><span style="color: #DC2828"><a href="http://thailovelucky.com/" target="_blank"><img src="images/logo_home.png" width="183" height="99" border="0" /></a></span></p>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr><td height="3"  style="border-bottom:1px solid #DDDDDD;"></td></tr>

                  <!--<tr><td height="35"></td></tr>-->

<!-- =============================== Body ====================================== -->

                  <tr>
                    <td class="movableContentContainer" valign="top">

                      <div class="movableContent">
                        <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr><td height="20"></td></tr>
                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="center">
                                  <h1 style="text-align:left; color:#eb1e79; font-size:19px;font-weight:normal;"> &nbsp; คุณ grfgdfgdfg</h1>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <tr><td height="15"> </td></tr>

                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="center">
                                  <p  style="text-align:left;color:#7544e4;font-size:14px;font-weight:normal;line-height:19px; text-indent:10px;">คุณได้ทำการเปลี่ยนแปลงอีเมล์ การทำรายการจะสำเร็จเมื่อคุณคลิกที่ปุ่มยืนยันการเปลี่ยนอีเมล์ด้านล่าง
                                  </p>
								  <p  style="text-align:left;color:#7544e4;font-size:14px;font-weight:normal;line-height:19px; text-indent:10px;">การเข้าสู่ระบบครั้งต่อไปคุณต้องใชอีเมล์นี้() ในการเข้าสู่ระบบ </p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          

                          <tr><td height="35"></td></tr>

                          <tr>
                            <td align="center">
                              <table>
                                <tr>
                                  <td align="center" bgcolor="#DC2828" style="background:#7544e4; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                                    <div class="contentEditableContainer contentTextEditable">
                                      <div class="contentEditable" align="center">
                                        <a href="#" style="font-size:16px;text-decoration:none;color:#ffffff;">ยืนยันการเปลี่ยนอีเมล์</a>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr><td height="20"></td></tr>
                        </table>
                      </div>

                    </td>
                  </tr>

                 

<!-- =============================== footer ====================================== -->

                  <tr><td  style="border-bottom:1px solid #DDDDDD;"></td></tr>

                  <tr><td height="25"></td></tr>

                  <tr>
                    <td>
                      <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                          <td valign="top" align="left" width="370">
                            <div class="contentEditableContainer contentTextEditable">
                              <div class="contentEditable" align="center">
                                <p  style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">
                                  <span style="font-weight:bold;">Lucky Corporation Co., Ltd.</span>
                                  <br>
                                  
                                  188/64 หมู่บ้านเศรษฐสิริ บางนา-วงแหวน ซ.ราชวินิตบางแก้ว ถ.บางนา-ตราด <br>
ต.บางแก้ว อ.บางพลี จ.สมุทรปราการ 10540
                                </p>
                              </div>
                            </div>
                          </td>

                        </tr>
                      </table>
                    </td>
                  </tr>


                </table>
              </td>
              <td width="40"></td>
            </tr>
          </table>
        </td>
      </tr>

      <tr><td height="88"></td></tr>


    </table>

';

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require './PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.thailovelucky.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "team@thailovelucky.com";
//Password to use for SMTP authentication
$mail->Password = "pAmm7JVf";
//Set who the message is to be sent from
$mail->setFrom('team@thailovelucky.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('team@thailovelucky.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('nook@cw.in.th', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($body);
//$mail->msgHTML(file_get_contents('mail-chang.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
</body>
</html>
