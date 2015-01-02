<!--@author Darryl-->
  <!--@copyright 2014-->
<?php

function get_schedule_line($studentID){
include "config/conn.php";
	
	$sql="Select * student_schedule_line where student_lrn ='".$studentID."'";
						
	$teacherload= mysqli_query($cxn,$sql);
	
	return $teacherload;

}

function get_subjectByStudentID($studentID)
{
	include "config/conn.php";

	$join="Select section.subjectID, subject_.subject_title from section 
	inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
	inner join subject_ on section.subjectID=subject_.subjectID where student_lrn = '".$studentID."'";
				
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
	

}

function get_gradeByStudentIDSubjectID($studentID,$subjectID)
{
	include "config/conn.php";
	
	$join="Select section.levelID,grade_level.level_description from section 
	inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
	inner join grade_level on section.levelID=grade_level.levelID where student_lrn = '".$studentID."' and subjectID ='".$subjectID."'";
	
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;

}

function get_sectionByStudentIDSubjectIDLevelID($studentID,$subjectID,$levelID)
{
	include "config/conn.php";

	$join="Select section.sectionNo,section.section_name from section 
	inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
	where student_lrn = '".$studentID."' and subjectID ='".$subjectID."' and levelID = '".$levelID."'";

	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
}

?>
