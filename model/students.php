  <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 

function get_studentsByTeacherID($teacherID)
{
	include "config/conn.php";
	
	$join="Select section.subjectID,subject_.subject_title from section left outer join subject_ on 
	section.subjectID=subject_.subjectID
	 where teacherID = '".$teacherID."'";
	 
				
	$join_result=mysqli_query($cxn,$join);
	
	return $join_result;
	

}



?>