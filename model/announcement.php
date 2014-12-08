<!--@author Darryl-->
  <!--@copyright 2014-->
<?php

function write_announcement($teacherID,$class_rec_no,$date_created,$announcement)
{

include "config/conn.php";
	
	$sql="INSERT INTO write_announcement VALUES('".$teacherID."','".$class_rec_no."','".$date_created."','".$announcement."')";
						
	$announcement_inserted= mysqli_query($cxn,$sql);
	
	return $announcement_inserted;

}


/*
function clean_input($input){
$input=trim($input);
$input=stripslashes($input);
$input=htmlspecialchars($input);
return $input;
}
*/


?>	