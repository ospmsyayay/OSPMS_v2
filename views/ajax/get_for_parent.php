
<?php 
session_start();


        if(isset($_GET['comment']))
        {
            $comment='';
            $comment=clean($_POST['comment']);
            $announcement_id=$_POST['announcement_id'];
            $class_rec_no=$_POST['class_rec_no'];

            /*echo "{\"success\": [" . json_encode($comment). "]}";
*/
            post_comment($comment,$announcement_id,$class_rec_no);
        
            
        }



	
function get_announcement($class_rec_no)
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

			$sql="SELECT post_teacher_feedback_parent.*, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image, 
            teacher_feedback_parent.feedback_message, grade_level.level_description, section_list.sectionNo, section_list.section_name, subject_.subject_title 
            FROM section inner join registration on section.teacherID=registration.reg_id 
            inner join grade_level on section.levelID=grade_level.levelID 
            inner join section_list on section.sectionID=section_list.sectionID 
            inner join subject_ on section.subjectID=subject_.subjectID 
            inner join post_teacher_feedback_parent on section.class_rec_no=post_teacher_feedback_parent.class_rec_no 
            inner join teacher_feedback_parent on post_teacher_feedback_parent.feedback_date_created=teacher_feedback_parent.feedback_date_created 
            where parentID='".$_SESSION['account_id']."' order by post_teacher_feedback_parent.feedback_date_created desc";
	 
				
			$announcement_result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. Get Announcement Parent Problem '.mysqli_error($cxn));

	    	$first = true;
			echo "{\"announcements\": [";
			while($display = mysqli_fetch_array($announcement_result))
			{
				$passer=array();

                $passer['class_rec_no']=$display['class_rec_no'];
                $passer['feedback_date_created']=convert_datetime_to_12hr($display['feedback_date_created']);
                $passer['timespan']=get_time_difference_php($display['feedback_date_created']);
                $passer['parentID']=$display['parentID'];
                $passer['teacher_lname']=$display['reg_lname'];
                $passer['teacher_fname']=$display['reg_fname'];
                $passer['teacher_mname']=$display['reg_mname'];
                $passer['teacher_image']=$display['image'];
                $passer['feedback_message']=$display['feedback_message'];
                $passer['level_description']=$display['level_description'];
                $passer['sectionNo']=$display['sectionNo'];
                $passer['section_name']=$display['section_name'];
                $passer['subject_title']=$display['subject_title'];
                $passer['announcement_id']=$display['feedback_date_created'];

                $comments="";
                //select comments

                $sql="SELECT teacher_feedback_parent_comments.*, registration.reg_lname, registration.reg_fname, registration.image 
                FROM teacher_feedback_parent_comments inner join registration on teacher_feedback_parent_comments.feedback_account_id=registration.reg_id 
                where teacher_feedback_parent_comments.feedback_post_date_created='".$display['feedback_date_created']."'";

                $select_comments=mysqli_query($cxn,$sql) or die('Unable to connect to Database. Get Parent Comments Problem '.mysqli_error($cxn));
                while($comment = mysqli_fetch_array($select_comments))
                {
                    $comments=$comments .   '<div class="row has-padding-top-5">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <img src="views/res/'.$comment['image'].'" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />
                                                    </div>

                                                    <div class="input-group col-md-11 col-md-offset-1">
                                                        <div class="comment"><a class="comment-author">'.$comment['reg_fname'].' '.$comment['reg_lname'].' </a>'.$comment['feedback_comment_message'].'
                                                        </div>
                                                        <div><small class="comment-timespan"><strong>'.convert_datetime_to_12hr($comment['feedback_comment_date_created']).'</strong></small></div>
                                                        <div><small class="comment-timespan">'.get_time_difference_php($comment['feedback_comment_date_created']).'</small></div>
                                                    </div>
                                                </div>
                                            </div><!--//row-->';
                }

                $passer['comments']=$comments;
                $passer['message_id']=createMessageId();


				if($first) 
				{

					echo json_encode($passer);
						 $first = false;

				}		 
				else 
				{
					echo ',' . json_encode($passer);
				}
			}
				
			echo "],\"success\": [".json_encode("Message Posted")."]}";
}

//Comment
function post_comment($comment,$announcement_id,$class_rec_no)
{
    if(!empty($comment))
    {
        $feedback_comment_date_created='';
        $feedback_comment_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO teacher_feedback_parent_comments(feedback_comment_date_created, feedback_account_id, feedback_comment_message, feedback_post_date_created) 
        VALUES('".$feedback_comment_date_created."','".$_SESSION['account_id']."','".$comment."','".$announcement_id."')";
                
            $comment_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Post Feedback Comment Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($comment_inserted==true)
            {
                get_announcement($class_rec_no);

            }    

    }


}







function clean($str)
{
		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		
		$str = @trim($str);
		if(get_magic_quotes_gpc())
			{
				$str = stripslashes($str);
			}
		return mysqli_real_escape_string($cxn,$str);
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

function convert_datetime_to_12hr($datetime)
{
    $new_time=date("Y-m-d h:i A", strtotime($datetime));

    return $new_time;
  
}

function createMessageId()
{
    $rand9int=$message_id="";
        
        $rand9int=strval(mt_rand ( 100000000 , 999999999 ));

        $message_id="M" . $rand9int;

        return $message_id;
} 

?>