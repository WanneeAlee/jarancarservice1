<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="../../theme/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../theme/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="../../theme/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../theme/css/bootstrap-switch.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="../../theme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../../theme/css/build.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    


<!-- jQuery -->
    <script src="../../theme/js/jquery.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="../../theme/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../theme/metisMenu/dist/metisMenu.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="../../theme/js/sb-admin-2.js"></script>
	<script src="../../theme/js/bootstrap-switch.js"></script>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px;">
            
            <?php include("../../header.php");?>
            
            <!-- /.navbar-top-links -->

			<?php include("../../left_menu.php");?>
            
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper"> 
		
			<!-- /.row -->
            
            <?php 
			if($_REQUEST["type"] == "add"){
				include("data-add.php");
			}else if($_REQUEST["type"] == "edit"){
				include("data-edit.php");
			}else{
				include("data-index.php");
			}
			?>
          <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php include("../../footer.php");?>
    </div>
    <!-- /#wrapper -->

    



</body>
</html>
