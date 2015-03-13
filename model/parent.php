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

function get_time_difference_php($created_time)
 {
        date_default_timezone_set('Asia/Manila'); //Change as per your default time
        $str = strtotime($created_time);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return intval($time_differnce/$years)." years ago";
        }else if(intval($time_differnce/$years) > 0)
        {
            return intval($time_differnce/$years)." year ago";
        }else if(intval($time_differnce/$months) > 1)
        {
            return intval($time_differnce/$months)." months ago";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return intval(($time_differnce/$months))." month ago";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return intval(($time_differnce/$days))." days ago";
        }else if (intval(($time_differnce/$days)) > 0) 
        {
            return intval(($time_differnce/$days))." day ago";
        }else if (intval(($time_differnce/$hours)) > 1) 
        {
            return intval(($time_differnce/$hours))." hours ago";
        }else if (intval(($time_differnce/$hours)) > 0) 
        {
            return intval(($time_differnce/$hours))." hour ago";
        }else if (intval(($time_differnce/$minutes)) > 1) 
        {
            return intval(($time_differnce/$minutes))." minutes ago";
        }else if (intval(($time_differnce/$minutes)) > 0) 
        {
            return intval(($time_differnce/$minutes))." minute ago";
        }else if (intval(($time_differnce)) > 1) 
        {
            return intval(($time_differnce))." seconds ago";
        }else
        {
            return "few seconds ago";
        }
  }


?>