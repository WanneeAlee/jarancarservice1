
<?php $this->load->view('cwcontrol/script');?>

 
 <div class="modal fade" id="Modal_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-danger" style="margin-bottom:0px;">
    <div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <?php 
		if($label){
			echo $label;
		}else{			
			echo "บันทึกข้อมูล";
		}
		?>
        
    </div>
    <div class="panel-body" align="center">
        <p>รหัสความปลอดภัยไม่ถูกต้อง กรุณาทำรายการใหม่ค่ะ</p>
    </div>
	</div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {

		$('#Modal_error').modal('show');

		$('#Modal_error').on('hidden.bs.modal', function (e) {
				window.location='<?php echo base_url($page);?>';
			});
		setInterval(function(){
			$('#Modal_error').modal('hide');

			$('#Modal_error').on('hidden.bs.modal', function (e) {
				window.location='<?php echo base_url($page);?>';
			});

			},2000
		);				

	});
</script>
