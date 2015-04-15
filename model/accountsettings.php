 <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 

function getall_account($account_id)
{
	include "config/conn.php";

	$sql="SELECT * FROM create_account where account_id='$account_id'";

	$result=mysqli_query($cxn,$sql) or die ('Unable to connect to Database. '. mysqli_error($cxn));

	return $result;
}

function change_password($account_id,$password_)
{
	include "config/conn.php";

	$sql="UPDATE create_account SET password_= '$password_' where account_id='$account_id'";
	  
			
	$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

	
	return $result;
	

}



?>