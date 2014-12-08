<!--@author Darryl-->
  <!--@copyright 2014-->
<?php
function insert_upload($teacherID,$class_rec_no,$date_created,$file_caption,$filename)
{
	include "config/conn.php";


	$sql = "INSERT INTO post_lecture VALUES('".$teacherID."','".$class_rec_no."', '".$date_created."' , '".$file_caption."' , '".'model/uploaded_files/'."','".$filename."')";
	
	$lecture_inserted = mysqli_query($cxn,$sql);	
	return $lecture_inserted;
}


?>