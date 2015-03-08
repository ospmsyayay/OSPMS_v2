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

	$join="Select section_list.sectionNo,section_list.section_name from section_list 
	inner join section on section_list.sectionID=section.sectionID 
	inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
	where student_lrn = '".$studentID."' and subjectID ='".$subjectID."' and levelID = '".$levelID."'";

	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
}

function get_sectionBySchoolYear($studentID,$schoolyear)
{
	include "config/conn.php";

	$join="SELECT section.class_rec_no, registration.reg_id, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image, 
			grade_level.level_description, section_list.sectionNo, section_list.section_name, subject_.subject_title, 
			sched_days, sched_start_time, sched_end_time, school_year FROM section 
			inner join grade_level on section.levelID=grade_level.levelID 
			inner join section_list on section.sectionID=section_list.sectionID 
			inner join subject_ on section.subjectID=subject_.subjectID 
			inner join registration on section.teacherID=registration.reg_id 
			inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
			where student_schedule_line.student_lrn='$studentID' and section.school_year='$schoolyear' order by grade_level.level_description";
					
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
}

?>
