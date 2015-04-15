
<?php 
session_start();

if(isset($_GET['post_parent_msg_init']))
{

    $class_rec_no_init=$_POST['class_rec_no_init'];

    get_teacherfeedback($class_rec_no_init);

}

if(isset($_GET['post_parent_msg']))
{
    $post_parent_msg=clean($_POST['post_parent_msg']);
    $class_rec_no=$_POST['class_rec_no'];

    insertMessageParentAll($post_parent_msg,$class_rec_no);
}

if(isset($_GET['post_private_msg']))
{
    $private_message=clean($_POST['private_message']);
    $class_rec_no=$_POST['class_rec_no'];
    $studentlrn=$_POST['studentlrn'];
    /*echo "{\"success\": [" . json_encode($private_message). ",".json_encode($class_rec_no).",".json_encode($studentlrn)."]}";*/
    insertPrivateMessageParent($private_message,$class_rec_no,$studentlrn);

    
}

if(isset($_GET['feedback_edit_post']))
{

    $feedback_edit_message=clean($_POST['feedback_edit_message']);
    $feedback_edit_id=$_POST['feedback_edit_id'];
    $feedback_class_rec_no=$_POST['feedback_class_rec_no'];

    feedback_edit_post($feedback_edit_message, $feedback_edit_id, $feedback_class_rec_no);
/*    echo "{\"success\": [" . json_encode($feedback_edit_message). ",".json_encode($feedback_edit_id).",".json_encode($feedback_class_rec_no)."]}";*/
    
}

if(isset($_GET['feedback_delete_post']))
{

    $feedback_delete_id=$_POST['feedback_delete_id'];
    $feedback_class_rec_no=$_POST['feedback_class_rec_no'];

    feedback_delete_post($feedback_delete_id, $feedback_class_rec_no);
    /*echo "{\"success\": [" . json_encode($feedback_edit_message). ",".json_encode($feedback_edit_id).",".json_encode($feedback_class_rec_no)."]}";*/
    
}

if(isset($_GET['get-parent-msg-modal']))
{
    $class_rec_no=$_POST['class_rec_no'];

    get_teacherfeedback_modal($class_rec_no);
}

if(isset($_GET['message_ajax_parent']))
{
    $class_rec_no=$_POST['class_rec_no'];
    $message_ajax_parent=clean($_POST['message_ajax_parent']);
   /* echo "{\"success\": [" . json_encode($class_rec_no). ",".json_encode($message_ajax_parent)."]}";*/
   MessageParentAll($message_ajax_parent,$class_rec_no);
}

if(isset($_GET['comment']))
{
    $comment='';
    $comment=clean($_POST['comment']);
    $announcement_id=$_POST['announcement_id'];
    $class_rec_no=$_POST['class_rec_no'];

    /*echo "{\"success\": [" . json_encode($comment). ", ".json_encode($announcement_id).", ".json_encode($class_rec_no)."]}";*/

    post_comment($comment,$announcement_id,$class_rec_no);

    
}

if(isset($_GET['edit_post']))
{
    $edit_message='';
    $edit_message=clean($_POST['edit_message']);
    $edit_id=$_POST['edit_id'];
    $class_rec_no=$_POST['class_rec_no'];

    edit_post($edit_message, $edit_id, $class_rec_no);
    /*echo "{\"success\": [" . json_encode($edit_message). ",".json_encode($edit_id).",".json_encode($class_rec_no)."]}";*/
    
}

if(isset($_GET['delete_post']))
{

    $delete_id=$_POST['delete_id'];
    $class_rec_no=$_POST['class_rec_no'];

    delete_post($delete_id, $class_rec_no);
    /*echo "{\"success\": [" . json_encode($edit_message). ",".json_encode($edit_id).",".json_encode($class_rec_no)."]}";*/
    
}

function insertMessageParentAll($post_parent_msg,$class_rec_no)
{
    if(!empty($post_parent_msg))
    {
        $feedback_message_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO teacher_feedback_parent(feedback_date_created, feedback_message) VALUES('".$feedback_message_date_created."','".$post_parent_msg."')";
                
            $feedback_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Post Message Parent All '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($feedback_inserted==true)
            {
                $query="SELECT distinct student_schedule_line.class_rec_no, student.parentID FROM section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                inner join student on student_schedule_line.student_lrn=student.student_lrn where section.class_rec_no='$class_rec_no'"; 

                $fetch_class_rec= mysqli_query($cxn,$query) or die('Unable to connect to Database. Select Class Rec No and parentID Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));


                while($each_rec = mysqli_fetch_array($fetch_class_rec))
                {
                    
                    $insert="INSERT INTO post_teacher_feedback_parent VALUES('".$each_rec['class_rec_no']."','".$feedback_message_date_created."','".$each_rec['parentID']."')";

                    $insert_done=mysqli_query($cxn,$insert) or die('Unable to connect to Database. Insert Teacher Feedback Parent '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
                }

                get_teacherfeedback($class_rec_no);

            }    


        
    }
}

function insertPrivateMessageParent($private_message,$class_rec_no,$student_lrn)
{
    if(!empty($private_message))
    {
        $feedback_message_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO teacher_feedback_parent(feedback_date_created, feedback_message) VALUES('".$feedback_message_date_created."','Private Message: ".$private_message."')";
                
            $feedback_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Post Private Message Parent '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($feedback_inserted==true)
            {
                $query="SELECT parentID FROM student where student_lrn='$student_lrn'"; 

                $fetch_parent_id= mysqli_query($cxn,$query) or die('Unable to connect to Database. Select ParentID Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));


                while($each_rec = mysqli_fetch_array($fetch_parent_id))
                {
                    
                    $insert="INSERT INTO post_teacher_feedback_parent VALUES('".$class_rec_no."','".$feedback_message_date_created."','".$each_rec['parentID']."')";

                    $insert_done=mysqli_query($cxn,$insert) or die('Unable to connect to Database. Insert Private Teacher Feedback Parent '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
                }

                get_teacherfeedback($class_rec_no);

            }    


        
    }
}

function MessageParentAll($message_ajax_parent,$class_rec_no)
{
    if(!empty($message_ajax_parent))
    {
        $feedback_message_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO teacher_feedback_parent(feedback_date_created, feedback_message) VALUES('".$feedback_message_date_created."','".$message_ajax_parent."')";
                
            $feedback_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Post Message Parent All '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($feedback_inserted==true)
            {
                $query="SELECT distinct student_schedule_line.class_rec_no, student.parentID FROM section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                inner join student on student_schedule_line.student_lrn=student.student_lrn where section.class_rec_no='$class_rec_no'"; 

                $fetch_class_rec= mysqli_query($cxn,$query) or die('Unable to connect to Database. Select Class Rec No and parentID Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));


                while($each_rec = mysqli_fetch_array($fetch_class_rec))
                {
                    
                    $insert="INSERT INTO post_teacher_feedback_parent VALUES('".$each_rec['class_rec_no']."','".$feedback_message_date_created."','".$each_rec['parentID']."')";

                    $insert_done=mysqli_query($cxn,$insert) or die('Unable to connect to Database. Insert Teacher Feedback Parent '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
                }

                get_teacherfeedback_modal($class_rec_no);

            }    


        
    }
}

//Comment
function post_comment($comment,$announcement_id,$class_rec_no)
{
    if(!empty($comment))
    {
        $comment_date_created='';
        $comment_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO teacher_feedback_parent_comments(feedback_comment_date_created, feedback_account_id, feedback_comment_message, feedback_post_date_created) 
        VALUES('".$comment_date_created."','".$_SESSION['account_id']."','".$comment."','".$announcement_id."')";
                
            $comment_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Feedback Post Comment Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($comment_inserted==true)
            {
                get_teacherfeedback_modal($class_rec_no);

            }    

    }


}

function get_teacherfeedback($class_rec_no)
{

    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

            $sql="SELECT distinct post_teacher_feedback_parent.class_rec_no, post_teacher_feedback_parent.feedback_date_created, teacher_feedback_parent.feedback_message FROM section 
            inner join post_teacher_feedback_parent on section.class_rec_no=post_teacher_feedback_parent.class_rec_no 
            inner join teacher_feedback_parent on post_teacher_feedback_parent.feedback_date_created=teacher_feedback_parent.feedback_date_created 
            where section.class_rec_no='$class_rec_no' order by post_teacher_feedback_parent.feedback_date_created desc";
     
                
            $feedback_result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. Get Teacher Feedback Problem '.mysqli_error($cxn));

            $first = true;
            echo "{\"teacher_feedback\": [";
            while($display = mysqli_fetch_array($feedback_result))
            {
                $passer=array();

                $passer['class_rec_no']=$display['class_rec_no'];
                $passer['feedback_date_created']=convert_datetime_to_12hr($display['feedback_date_created']);
                $passer['timespan']=get_time_difference_php($display['feedback_date_created']);
                $passer['feedback_message']=$display['feedback_message'];
                $passer['feedback_announcement_id']=$display['feedback_date_created'];
                $passer['feedback_message_id']=createMessageId();


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
                
            echo "],\"success\": [".json_encode("Feedback Posted")."]}";
}

//Edit Post
function feedback_edit_post($feedback_edit_message, $feedback_edit_id, $feedback_class_rec_no)
{
    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

    $sql="UPDATE teacher_feedback_parent SET feedback_message = '$feedback_edit_message' where feedback_date_created='".$feedback_edit_id."'";

    $feedback_post_edited= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Feedback Edit Post Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
    if($feedback_post_edited==true)
    {
        get_teacherfeedback($feedback_class_rec_no);
       /* echo "{\"teacher_feedback\": [".json_encode($feedback_edit_message).", ".json_encode($feedback_edit_id).", ".json_encode($feedback_class_rec_no).", ".json_encode(mysqli_errno($cxn)).",".json_encode(mysqli_error($cxn))."]}";*/

    }    
}

//Delete Post
function feedback_delete_post($feedback_delete_id, $feedback_class_rec_no)
{
    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

/*    $sql="DELETE FROM announcement_lecture_comments WHERE post_date_created='".$delete_id."'";

    $comments_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Comments Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($comments_deleted==true)
    {

    }    */


    $sql="DELETE FROM post_teacher_feedback_parent WHERE class_rec_no='$feedback_class_rec_no' and feedback_date_created='".$feedback_delete_id."'";
    $feedback_post_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Post Feedback Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($feedback_post_deleted==true)
    {
         get_teacherfeedback($feedback_class_rec_no);
    }    

/*    $sql="DELETE FROM announcement_lecture WHERE date_created='".$delete_id."'";
    $announcement_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Announcement Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($announcement_deleted==true)
    {
        get_announcement($class_rec_no);

    }    */
}

//Edit Post
function edit_post($edit_message, $edit_id, $class_rec_no)
{
    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

    $sql="UPDATE teacher_feedback_parent SET feedback_message = '$edit_message' where feedback_date_created='$edit_id'";

    $post_edited= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Edit Feedback Post Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
    if($post_edited==true)
    {
       get_teacherfeedback_modal($class_rec_no);

    }    
}

//Delete Post
function delete_post($delete_id, $class_rec_no)
{
    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

/*    $sql="DELETE FROM announcement_lecture_comments WHERE post_date_created='".$delete_id."'";

    $comments_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Comments Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($comments_deleted==true)
    {

    }    */


    $sql="DELETE FROM post_teacher_feedback_parent WHERE class_rec_no='$class_rec_no' and feedback_date_created='".$delete_id."'";
    $post_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Feedback Post Announcement Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($post_deleted==true)
    {
         get_teacherfeedback_modal($class_rec_no);
    }    

/*    $sql="DELETE FROM announcement_lecture WHERE date_created='".$delete_id."'";
    $announcement_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Announcement Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($announcement_deleted==true)
    {
        get_announcement($class_rec_no);

    }    */
}


//Student List
        
        if(isset($_GET['class_rec_no']))
        {   $class_rec_no="";
            $class_rec_no = $_POST['class_rec_no'];

            $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

            $join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
            from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
            inner join registration on student_schedule_line.student_lrn = registration.reg_id 
            where section.class_rec_no = '".$class_rec_no."' order by registration.reg_lname";
     
                
            $result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

                $first = true;
                echo "{\"student_list\": [";
                while($display = mysqli_fetch_array($result))
                {
                    if($first) 
                    {
                        echo json_encode($display);
                             $first = false;
                    }        
                    else 
                    {
                        echo ',' . json_encode($display);
                    }
                }
                
                echo "]}";  

        }

        


            if(isset($_GET['student_search_class']))
            {
                $class_rec_no="";
                $student_search_class=$_POST['student_search_class'];
                $class_rec_no_class=$_POST['class_rec_no_class'];

                $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

                if(!empty($student_search_class))
                {
                    /*echo "{\"student_filter_class\": [".json_encode($student_search_class).','.json_encode($class_rec_no)."]}";*/

                    $join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
                    from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                    inner join registration on student_schedule_line.student_lrn = registration.reg_id 
                    where section.class_rec_no='".$class_rec_no_class."' 
                    and student_lrn LIKE '%$student_search_class%' or reg_lname LIKE '%$student_search_class%' 
                    or reg_fname LIKE '%$student_search_class%' or reg_mname LIKE '%$student_search_class%' order by registration.reg_lname";
     
                
                    $result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

                    $first = true;
                    echo "{\"student_filter_class\": [";
                    while($display = mysqli_fetch_array($result))
                    {
                        if($first) 
                        {
                            echo json_encode($display);
                                 $first = false;
                        }        
                        else 
                        {
                            echo ',' . json_encode($display);
                        }
                    }
                    
                    echo "]}";  
                        
                }
                else if(empty($student_search_class))
                {
                    $join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
                    from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                    inner join registration on student_schedule_line.student_lrn = registration.reg_id 
                    where section.class_rec_no='".$class_rec_no_class."' order by registration.reg_lname";
     
                
                    $result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

                    $first = true;
                    echo "{\"student_filter_class\": [";
                    while($display = mysqli_fetch_array($result))
                    {
                        if($first) 
                        {
                            echo json_encode($display);
                                 $first = false;
                        }        
                        else 
                        {
                            echo ',' . json_encode($display);
                        }
                    }
                    
                    echo "]}";  
                }   
            }

function get_teacherfeedback_modal($class_rec_no)
{

    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

            $sql="SELECT post_teacher_feedback_parent.*, registration.reg_lname, registration.reg_fname, registration.reg_mname, 
            registration.image,teacher_feedback_parent.feedback_message, 
            grade_level.level_description, section_list.sectionNo, section_list.section_name, subject_.subject_title 
            FROM section inner join registration on section.teacherID=registration.reg_id 
            inner join grade_level on section.levelID=grade_level.levelID 
            inner join section_list on section.sectionID=section_list.sectionID 
            inner join subject_ on section.subjectID=subject_.subjectID 
            inner join post_teacher_feedback_parent on section.class_rec_no=post_teacher_feedback_parent.class_rec_no 
            inner join teacher_feedback_parent on post_teacher_feedback_parent.feedback_date_created=teacher_feedback_parent.feedback_date_created 
            where section.class_rec_no='$class_rec_no' order by post_teacher_feedback_parent.feedback_date_created desc";
     
                
            $feedback_result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. Get Teacher Feedback Modal Problem '.mysqli_error($cxn));

            $first = true;
            echo "{\"teacher_feedback_modal\": [";
            while($display = mysqli_fetch_array($feedback_result))
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
                $passer['feedback_message_id']=createMessageId();




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
                
            echo "],\"success\": [".json_encode("Feedback Posted")."]}";
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