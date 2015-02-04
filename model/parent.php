 <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 

function get_students($parentID)
{
	include "config/conn.php";

	$join="SELECT student.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
			from student inner join registration on student.student_lrn = registration.reg_id 
			where student.parentID = '".$parentID."'";
	 
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.'. mysqli_error($cxn));

	
	return $join_result;
	

}

function get_teachers($parentID)
{
	include "config/conn.php";

	$join="SELECT distinct TR.reg_id, TR.reg_lname, TR.reg_fname, TR.reg_mname, TR.image 
	FROM registration AS TR inner join section on TR.reg_id=section.teacherID 
	inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
	inner join student on student_schedule_line.student_lrn=student.student_lrn where student.parentID = '".$parentID."'";

	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.'. mysqli_error($cxn));
	
	return $join_result;
}

function get_subjects($parentID,$teacherID)
{
	include "config/conn.php";

	$join="SELECT distinct subject_.subject_title 
	FROM subject_ inner join section on subject_.subjectID=section.subjectID 
	inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
	inner join student on student_schedule_line.student_lrn=student.student_lrn 
	where student.parentID='$parentID' and section.teacherID='$teacherID'";

	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.'. mysqli_error($cxn));
	
	return $join_result;
}




?>