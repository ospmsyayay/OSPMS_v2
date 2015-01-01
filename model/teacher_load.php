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

	$join="Select distinct section.sectionNo,section.section_name from section where teacherID = '".$teacherID."' and subjectID ='".$subjectID."' and levelID = '".$levelID."'";
	
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
}

?>
