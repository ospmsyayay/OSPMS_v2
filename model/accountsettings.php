 <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 


function change_password($account_id,$password_)
{
	include "config/conn.php";

	$sql="UPDATE create_account SET password_= '$password_' where account_id='$account_id'";
	  
			
	$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

	
	return $result;
	

}



?>