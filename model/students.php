  <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 


function get_students($teacherID)
{
	include "config/conn.php";

	$join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
			from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
			inner join registration on student_schedule_line.student_lrn = registration.reg_id 
			where section.teacherID = '".$teacherID."' order by registration.reg_lname";
	 
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

	
	return $join_result;
	

}

function insert_student_rating($grading_id, $student_lrn, $class_rec_no, $grading_period, $week_number, 
								$knowledge, $processskills, $understanding, $performanceproducts, $tentativeGrade, $legend)
{
	include "config/conn.php";

	  $query = "INSERT INTO student_rating (
	  	grading_id, student_lrn, class_rec_no, grading_period, week_number, knowledge, processskills, understanding, performanceproducts, tentative_grade, legend) 
        VALUES ('$grading_id', '$student_lrn', '$class_rec_no', '$grading_period', '$week_number', $knowledge, $processskills, $understanding, $performanceproducts, 
        		$tentativeGrade, '$legend')"; 

	  $result=mysqli_query($cxn,$query) or die('Unable to connect to Database.' . mysqli_error($cxn));

	  return $result;

}




?>