  <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 


function get_students($teacherID)
{
	include "config/conn.php";

	$join="Select student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
			from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
			inner join registration on student_schedule_line.student_lrn = registration.reg_id 
			where section.teacherID = '".$teacherID."'";
	 
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

	
	return $join_result;
	

}




?>