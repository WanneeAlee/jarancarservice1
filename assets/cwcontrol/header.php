<?php
error_reporting(E_ALL & ~E_NOTICE);
ob_start();
@session_start();
if(!isset($_SESSION["user_username"])){
  echo "<meta http-equiv='refresh' content='0;URL=../../index.php'>";//ส่งค่าจากหน้านี้ไปหน้า index.php	

}

include("../../inc/base_function.php");
include("../../inc/connect.php"); 
?>
<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Control Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> เปลี่ยนรหัสผ่าน</a></li>
                        <li class="divider"></li>-->
                        <li><a href="../../logout.php"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>