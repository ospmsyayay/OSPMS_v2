<!--@author Darryl-->
  <!--@copyright 2014-->
<?php 

function write_announcement_to_all_subjects($teacherID,$message_date_created,$message)
{

include "config/conn.php";

	
    $sql="INSERT INTO announcement_lecture(date_created, messageorfile_caption) VALUES('".$message_date_created."','".$message."')";
						
	$announcement_lecture_inserted= mysqli_query($cxn,$sql);
	
	if($announcement_lecture_inserted)
    {
        $query="Select class_rec_no from section where teacherID = '".$teacherID."'"; 
        $fetch_class_rec= mysqli_query($cxn,$query);


        while($each_rec = mysqli_fetch_array($fetch_class_rec))
        {
            $passer=array();
            
            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$message_date_created."')";

            $insert_done=mysqli_query($cxn,$insert);
        }

    }    

}

function upload_lecture_to_all_subjects($teacherID,$date_created,$messageorfile_caption,$file_path,$file_name)
{

include "config/conn.php";

    
    $sql="INSERT INTO announcement_lecture VALUES('".$date_created."','".$messageorfile_caption."','".$file_path."','".$file_name."')";
                        
    $announcement_lecture_inserted= mysqli_query($cxn,$sql);
    
    if($announcement_lecture_inserted)
    {
        $query="Select class_rec_no from section where teacherID = '".$teacherID."'"; 
        $fetch_class_rec= mysqli_query($cxn,$query);


        while($each_rec = mysqli_fetch_array($fetch_class_rec))
        {
            $passer=array();
            
            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$date_created."')";

            $insert_done=mysqli_query($cxn,$insert);
        }

    }    

}


function get_announcement_lecture_to_all_subjects($teacherID)
{

    include "config/conn.php";

        $sql="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
        section_list.sectionNo, section_list.section_name, subject_.subject_title, grade_level.level_description 
        from section_list inner join section on section_list.sectionID=section.sectionID
        inner join subject_ on section.subjectID=subject_.subjectID 
        inner join grade_level on section.levelID=grade_level.levelID 
        inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
        inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created 
        where section.teacherID = '".$teacherID."' order by date_created desc";

        $result=mysqli_query($cxn,$sql);

        return $result;

}

function post_announcement_lecture_to_all_students($studentID)
{
    include "config/conn.php";

    $sql="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
    section_list.sectionNo, section_list.section_name, subject_.subject_title, grade_level.level_description, 
    registration.reg_fname, registration.reg_lname, registration.image 
    from registration inner join section on registration.reg_id=section.teacherID
    inner join section_list on section.sectionID=section_list.sectionID 
    inner join subject_ on section.subjectID=subject_.subjectID 
    inner join grade_level on section.levelID=grade_level.levelID 
    inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
    inner join post_announcement_lecture on student_schedule_line.class_rec_no=post_announcement_lecture.class_rec_no 
    inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created
    where student_schedule_line.student_lrn = '".$studentID."' order by date_created desc";

     $result=mysqli_query($cxn,$sql);

        return $result;
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