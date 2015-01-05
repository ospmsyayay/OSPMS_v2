
<?php 
	session_start();

	if(isset($_FILES))
	{
		echo json_encode($_FILES);
	}	
		
?>