<?php
session_start();

unset ( $_SESSION['user_username'] );
/*unset ( $_SESSION['ses_username'] );
unset ( $_SESSION['ses_status'] );*/
//session_destroy();

?>
<script src="theme/js/jquery.js"></script>
<script>
$(document).ready(function(){
	
	window.location='index.php';
		
});
</script>
