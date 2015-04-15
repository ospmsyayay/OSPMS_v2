 <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 

function get_announcements($parentID)
{
	include "config/conn.php";

	$join="SELECT post_teacher_feedback_parent.*, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image, 
	teacher_feedback_parent.feedback_message, grade_level.level_description, section_list.sectionNo, section_list.section_name, subject_.subject_title 
	FROM section inner join registration on section.teacherID=registration.reg_id 
	inner join grade_level on section.levelID=grade_level.levelID 
	inner join section_list on section.sectionID=section_list.sectionID 
	inner join subject_ on section.subjectID=subject_.subjectID 
	inner join post_teacher_feedback_parent on section.class_rec_no=post_teacher_feedback_parent.class_rec_no 
	inner join teacher_feedback_parent on post_teacher_feedback_parent.feedback_date_created=teacher_feedback_parent.feedback_date_created 
	where parentID='$parentID' order by post_teacher_feedback_parent.feedback_date_created desc";

	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.'. mysqli_error($cxn));

	return $join_result;
}

function post_feedback_comments($feedback_post_date_created)
{
    include "config/conn.php";

    $sql="SELECT teacher_feedback_parent_comments.*, registration.reg_lname, registration.reg_fname, registration.image 
    FROM teacher_feedback_parent_comments inner join registration on teacher_feedback_parent_comments.feedback_account_id=registration.reg_id 
    where teacher_feedback_parent_comments.feedback_post_date_created='".$feedback_post_date_created."'";

    $result=mysqli_query($cxn,$sql);

    return $result;
}

function get_students($parentID)
{
	include "config/conn.php";

	$join="SELECT student.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
			from student inner join registration on student.student_lrn = registration.reg_id 
			where student.parentID = '".$parentID."' order by registration.reg_lname";
	 
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.'. mysqli_error($cxn));

	
	return $join_result;
	

}

function get_teachers($parentID)
{
	include "config/conn.php";

	$join="SELECT distinct TR.reg_id, TR.reg_lname, TR.reg_fname, TR.reg_mname, TR.image 
	FROM registration AS TR inner join section on TR.reg_id=section.teacherID 
	inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
	inner join student on student_schedule_line.student_lrn=student.student_lrn where student.parentID = '".$parentID."' order by TR.reg_lname";

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