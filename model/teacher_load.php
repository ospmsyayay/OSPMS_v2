<!--@author Darryl-->
  <!--@copyright 2014-->
<?php

function get_teacherload($teacherID){
include "config/conn.php";
	
	$sql="Select * from section where teacherID ='".$teacherID."'";
						
	$teacherload= mysqli_query($cxn,$sql);
	
	return $teacherload;

}

function get_subjectByTeacherID($teacherID)
{
	include "config/conn.php";
	
	$join="Select distinct section.subjectID,subject_.subject_title from section left outer join subject_ on 
	section.subjectID=subject_.subjectID where teacherID = '".$teacherID."'";
				
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
	

}

function get_gradeByTeacherIDSubjectID($teacherID,$subjectID)
{
	include "config/conn.php";
	
	$join="Select distinct section.levelID,grade_level.level_description from section left outer join grade_level on 
	section.levelID=grade_level.levelID where teacherID = '".$teacherID."' and subjectID ='".$subjectID."'";
	
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;

}

function get_sectionByTeacherIDSubjectIDLevelID($teacherID,$subjectID,$levelID)
{
	include "config/conn.php";

	$join="Select distinct section.sectionID, section_list.sectionNo,section_list.section_name from section left outer join section_list on
	section.sectionID=section_list.sectionID where teacherID = '".$teacherID."' and subjectID ='".$subjectID."' and levelID = '".$levelID."'";
	
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
}

function get_subjectsBySchoolYear($teacherID,$schoolyear)
{
	include "config/conn.php";

	$join="SELECT section.class_rec_no, grade_level.level_description, section_list.sectionNo, section_list.section_name, subject_.subject_title, 
					sched_days, sched_start_time, sched_end_time, school_year FROM section 
					inner join grade_level on section.levelID=grade_level.levelID 
					inner join section_list on section.sectionID=section_list.sectionID 
					inner join subject_ on section.subjectID=subject_.subjectID 
					where section.teacherID='$teacherID' and section.school_year='$schoolyear' order by grade_level.level_description";
					
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
}

?>
