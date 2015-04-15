  <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 

function get_validsubjects()
{
	include "config/conn.php";

	$query="SELECT * FROM subject_ ";
	 			
	$result=mysqli_query($cxn,$query) or die('Unable to connect to Database.'. mysqli_error($cxn));

	return $result;
	

}


function get_subjectlist($teacherID,$class_rec_no)
{
	include "config/conn.php";

	$query="SELECT distinct subject_.* FROM subject_ inner join section on subject_.subjectID=section.subjectID 
			where section.teacherID='$teacherID' and section.class_rec_no='$class_rec_no'";
	 			
	$result=mysqli_query($cxn,$query) or die('Unable to connect to Database.'. mysqli_error($cxn));

	return $result;
	

}

function get_studentlist($teacherID,$class_rec_no)
{
	include "config/conn.php";

	$join="Select student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname 
			from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
			inner join registration on student_schedule_line.student_lrn = registration.reg_id 
			where section.teacherID = '".$teacherID."' and section.class_rec_no = '".$class_rec_no."'";
	 
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

	
	return $join_result;
	

}


?>