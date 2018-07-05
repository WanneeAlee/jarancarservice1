<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <?php $this->load->view('cwcontrol/script');?> 
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px;">
            
            <?php $this->load->view('cwcontrol/header');?>   
            <!-- /.navbar-top-links -->

			
            <?php $this->load->view('cwcontrol/left_menu');?>   
            
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper"> 
		
			<!-- /.row -->
            
            <?php 
			
			if($this->input->get('type') == "add"){
				
				$this->load->view('cwcontrol/pages/'.$page.'/data-add');
				
			}elseif($this->input->get('type') == "edit"){
				
				$this->load->view('cwcontrol/pages/'.$page.'/data-edit');
				
			}else{
				
				$this->load->view('cwcontrol/pages/'.$page.'/data-index');
			}
			?>
          <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php $this->load->view('cwcontrol/footer');?>
    </div>
    <!-- /#wrapper -->

    



</body>
</html>
