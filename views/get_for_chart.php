<?php
    session_start();

    if(isset($_GET['lrn']))
    {

        $_SESSION['lrn'] = $_GET['lrn']; // Pass the student's number here using $_GET[]

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $profile = mysqli_query ($cxn,"SELECT reg_lname, reg_fname, image FROM registration  WHERE reg_id='".$_SESSION['lrn']."'");

        $fetch_profile=mysqli_fetch_array($profile);
                                     
        $_SESSION['ts_reg_lname']=$fetch_profile['reg_lname'];
        $_SESSION['ts_reg_fname']=$fetch_profile['reg_fname'];
        $_SESSION['ts_profile_pic']=$fetch_profile['image'];



        $_SESSION['Teacher_Student_Schedule_Line']=array();
    

        $join="Select section.subjectID, subject_.subject_title from section 
        inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
        inner join subject_ on section.subjectID=subject_.subjectID where student_lrn = '".$_SESSION['lrn']."'";
                    
        $subjects=mysqli_query($cxn,$join) or die('Unable to connect to Database.');
    
        while($travsubjects = mysqli_fetch_array($subjects))
        {
            
            $subjectIdPasser=array();
        
            $subjectIdPasser['subjectID']=$travsubjects['subjectID'];
            
            $subject_title = $travsubjects['subject_title'];
                    
            $_SESSION['Teacher_Student_Schedule_Line'][$subject_title ]=null;
            

                    $join="Select section.levelID,grade_level.level_description from section 
                    inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                    inner join grade_level on section.levelID=grade_level.levelID where student_lrn = '".$_SESSION['lrn']."' and subjectID ='".$subjectIdPasser['subjectID']."'";
    
                    $grades=mysqli_query($cxn,$join) or die('Unable to connect to Database.');
                                
                        while($travgrades = mysqli_fetch_array($grades))
                        {
                            $levelIdPasser=array();
                            
                            $levelIdPasser['levelID']=$travgrades['levelID'];
                            
                            $level_description=$travgrades ['level_description'];
                                                
                                $_SESSION['Teacher_Student_Schedule_Line'][$subject_title][$level_description]=null;
                            

                                    $join="Select section.sectionNo,section.section_name from section 
                                    inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                                    where student_lrn = '".$_SESSION['lrn']."' and subjectID ='".$subjectIdPasser['subjectID']."' and levelID = '".$levelIdPasser['levelID']."'";

                                    $section=mysqli_query($cxn,$join) or die('Unable to connect to Database.');
                                            
                                            while($travsectionNo=mysqli_fetch_array($section))
                                            {
                                            
                                                $sectionNo=$travsectionNo['sectionNo'];
                                                $sectionName=$travsectionNo['section_name'];
                                                
                                                $_SESSION['Teacher_Student_Schedule_Line'][$subject_title][$level_description][$sectionNo][$sectionName]=null;
                                    
                                            
                                                
                                            }
                    
                        }
                        
        }



       /* echo "{\"lrn\": [" . json_encode($_SESSION['lrn']). "]}";*/

    }

    if( isset($_GET['ts_subject_chart']) )
    {
        $_SESSION['ts_clicked_subject'] = $_GET['ts_subject_chart'];

        echo "{\"clicked\": [" .json_encode($_SESSION['ts_clicked_subject']). ', '.json_encode($_SESSION['lrn']). "]}";
    }

    if( isset($_GET['ts_grade_chart']) )
    {
        $_SESSION['ts_clicked_grade'] = $_GET['ts_grade_chart'];

         echo "{\"clicked\": [" .json_encode($_SESSION['ts_clicked_grade']). ', '.json_encode($_SESSION['lrn'])."]}";
    }

    if( isset($_GET['ts_section_chart']) )
    {
        $_SESSION['ts_clicked_section'] = $_GET['ts_section_chart'];

         echo "{\"clicked\": [" .json_encode($_SESSION['ts_clicked_section']). ', '.json_encode($_SESSION['lrn'])."]}";
    }    


    if( isset($_GET['gradingPeriod']) and isset($_GET['ts_onload']) )
    {

                /* Do not touch the codes below unless you know what you're doing. */
            $gp = $_GET['gradingPeriod'];

            $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

            if($_GET['ts_onload']=='subject')
            {
                $subject_sql="Select subjectID from subject_ where subject_title='".$_SESSION['ts_clicked_subject']."'";
                $subject_result=mysqli_query($cxn,$subject_sql);
                $subject_row = mysqli_fetch_row($subject_result);
                $_SESSION['ts_chart_subjectID'] = $subject_row[0];

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.knowledge FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' and  grading_period='$gp' order by week_number";

                /*$query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "{\"knowledge\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[3] + $row[4] + $row[5]) / 3) * 0.15);*/
                        echo json_encode(($row[4])*0.15);
                        $first = false;
                    } else {
                        /*echo ',' . json_encode((($row[3] + $row[4] + $row[5]) / 3) * 0.15);*/
                        echo ',' . json_encode(($row[4])*0.15);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.processskills FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' and  grading_period='$gp' order by week_number";

               /* $query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"process\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[6] + $row[7] + $row[8]) / 3) * 0.25);*/
                        echo json_encode($row[4]*0.25);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[6] + $row[7] + $row[8]) / 3) * 0.25);*/
                        echo ',' . json_encode($row[4]*0.25);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.understanding FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' and  grading_period='$gp' order by week_number";

                /* $query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"understanding\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[9] + $row[10] + $row[11]) / 3) * 0.30);*/
                        echo json_encode($row[4]*0.30);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[9] + $row[10] + $row[11]) / 3) * 0.30);*/
                       echo ',' . json_encode($row[4]*0.30);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.performanceproducts FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' and  grading_period='$gp' order by week_number";

                /*$query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"performance\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                       /* echo json_encode((($row[12] + $row[13] + $row[14]) / 3) * 0.30);*/
                       echo json_encode($row[4]*0.30);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[12] + $row[13] + $row[14]) / 3) * 0.30);*/
                       echo ',' . json_encode($row[4]*0.30);
                    }
                }

                echo "]}";

            }

            if($_GET['ts_onload']=='grade')
            {
                $grade_sql="Select levelID from grade_level where level_description='".$_SESSION['ts_clicked_grade']."'";
                $grade_result=mysqli_query($cxn,$grade_sql);
                $grade_row = mysqli_fetch_row($grade_result);
                $_SESSION['ts_chart_levelID'] = $grade_row[0];

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.knowledge FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and grading_period='$gp' order by week_number";

                /*$query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "{\"knowledge\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[3] + $row[4] + $row[5]) / 3) * 0.15);*/
                        echo json_encode(($row[4])*0.15);
                        $first = false;
                    } else {
                        /*echo ',' . json_encode((($row[3] + $row[4] + $row[5]) / 3) * 0.15);*/
                        echo ',' . json_encode(($row[4])*0.15);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.processskills FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and grading_period='$gp' order by week_number";

               /* $query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"process\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[6] + $row[7] + $row[8]) / 3) * 0.25);*/
                        echo json_encode($row[4]*0.25);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[6] + $row[7] + $row[8]) / 3) * 0.25);*/
                        echo ',' . json_encode($row[4]*0.25);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.understanding FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and grading_period='$gp' order by week_number";

                /* $query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"understanding\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[9] + $row[10] + $row[11]) / 3) * 0.30);*/
                        echo json_encode($row[4]*0.30);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[9] + $row[10] + $row[11]) / 3) * 0.30);*/
                       echo ',' . json_encode($row[4]*0.30);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.performanceproducts FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and grading_period='$gp' order by week_number";

                /*$query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"performance\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                       /* echo json_encode((($row[12] + $row[13] + $row[14]) / 3) * 0.30);*/
                       echo json_encode($row[4]*0.30);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[12] + $row[13] + $row[14]) / 3) * 0.30);*/
                       echo ',' . json_encode($row[4]*0.30);
                    }
                }

                echo "]}";
            }
             
            if($_GET['ts_onload']=='section')
            {

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.knowledge FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and section.section_name='".$_SESSION['ts_clicked_section']."' and grading_period='$gp' order by week_number";

                /*$query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "{\"knowledge\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[3] + $row[4] + $row[5]) / 3) * 0.15);*/
                        echo json_encode(($row[4])*0.15);
                        $first = false;
                    } else {
                        /*echo ',' . json_encode((($row[3] + $row[4] + $row[5]) / 3) * 0.15);*/
                        echo ',' . json_encode(($row[4])*0.15);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.processskills FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and section.section_name='".$_SESSION['ts_clicked_section']."' and grading_period='$gp' order by week_number";

               /* $query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"process\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[6] + $row[7] + $row[8]) / 3) * 0.25);*/
                        echo json_encode($row[4]*0.25);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[6] + $row[7] + $row[8]) / 3) * 0.25);*/
                        echo ',' . json_encode($row[4]*0.25);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.understanding FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and section.section_name='".$_SESSION['ts_clicked_section']."' and grading_period='$gp' order by week_number";

                /* $query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"understanding\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                        /*echo json_encode((($row[9] + $row[10] + $row[11]) / 3) * 0.30);*/
                        echo json_encode($row[4]*0.30);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[9] + $row[10] + $row[11]) / 3) * 0.30);*/
                       echo ',' . json_encode($row[4]*0.30);
                    }
                }

                $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.performanceproducts FROM section 
                inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
                where student_rating.student_lrn='".$_SESSION['lrn']."' and subjectID='".$_SESSION['ts_chart_subjectID']."' 
                and section.levelID='".$_SESSION['ts_chart_levelID']."' and section.section_name='".$_SESSION['ts_clicked_section']."' and grading_period='$gp' order by week_number";

                /*$query = mysqli_query($cxn, "SELECT * FROM grading WHERE student_lrn='$sn' AND grading_period='$gp'") or die('Unable to connect to Database.');*/
                $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

                $first = true;
                echo "],\"performance\": [";
                while($row = mysqli_fetch_array($query)) {
                    if($first) {
                       /* echo json_encode((($row[12] + $row[13] + $row[14]) / 3) * 0.30);*/
                       echo json_encode($row[4]*0.30);
                        $first = false;
                    } else {
                       /* echo ',' . json_encode((($row[12] + $row[13] + $row[14]) / 3) * 0.30);*/
                       echo ',' . json_encode($row[4]*0.30);
                    }
                }

                echo "]}";
            }   

           
    }

    if( isset($_GET['subject_chart']) )
    {
        $_SESSION['clicked_subject'] = $_GET['subject_chart'];

        echo "{\"clicked\": [" .json_encode($_SESSION['clicked_subject']). "]}";
    }

    if( isset($_GET['grade_chart']) )
    {
        $_SESSION['clicked_grade'] = $_GET['grade_chart'];

         echo "{\"clicked\": [" .json_encode($_SESSION['clicked_grade']). "]}";
    }

    if( isset($_GET['section_chart']) )
    {
        $_SESSION['clicked_section'] = $_GET['section_chart'];

         echo "{\"clicked\": [" .json_encode($_SESSION['clicked_section']). "]}";
    }    

    if( isset($_GET['s_gradingPeriod']) and isset($_GET['onload']) )
    {

           
            $gp = $_GET['s_gradingPeriod'];

            $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        if($_GET['onload']=='subject')
        { 
            $subject_sql="Select subjectID from subject_ where subject_title='".$_SESSION['clicked_subject']."'";
            $subject_result=mysqli_query($cxn,$subject_sql);
            $subject_row = mysqli_fetch_row($subject_result);
            $_SESSION['student_chart_subjectID'] = $subject_row[0];
            
            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.knowledge FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' and  grading_period='$gp' order by week_number";


            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "{\"knowledge\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                
                    echo json_encode(($row[4])*0.15);
                    $first = false;
                } else {
              
                    echo ',' . json_encode(($row[4])*0.15);
                }
            }

            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.processskills FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' and  grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"process\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                    echo json_encode($row[4]*0.25);
                    $first = false;
                } else {
                 
                    echo ',' . json_encode($row[4]*0.25);
                }
            }

            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.understanding FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' and  grading_period='$gp' order by week_number";
            
            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"understanding\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                    echo json_encode($row[4]*0.30);
                    $first = false;
                } else {
          
                   echo ',' . json_encode($row[4]*0.30);
                }
            }

            
            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.performanceproducts FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' and  grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"performance\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                   echo json_encode($row[4]*0.30);
                    $first = false;
                } else {
                   
                   echo ',' . json_encode($row[4]*0.30);
                }
            }

            echo "]}";
        }

        if($_GET['onload']=='grade')
        {
            $grade_sql="Select levelID from grade_level where level_description='".$_SESSION['clicked_grade']."'";
            $grade_result=mysqli_query($cxn,$grade_sql);
            $grade_row = mysqli_fetch_row($grade_result);
            $_SESSION['student_chart_levelID'] = $grade_row[0];
            
            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.knowledge FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and grading_period='$gp' order by week_number";


            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "{\"knowledge\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                
                    echo json_encode(($row[4])*0.15);
                    $first = false;
                } else {
              
                    echo ',' . json_encode(($row[4])*0.15);
                }
            }

            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.processskills FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"process\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                    echo json_encode($row[4]*0.25);
                    $first = false;
                } else {
                 
                    echo ',' . json_encode($row[4]*0.25);
                }
            }

            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.understanding FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and grading_period='$gp' order by week_number";
            
            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"understanding\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                    echo json_encode($row[4]*0.30);
                    $first = false;
                } else {
          
                   echo ',' . json_encode($row[4]*0.30);
                }
            }

            
            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.performanceproducts FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"performance\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                   echo json_encode($row[4]*0.30);
                    $first = false;
                } else {
                   
                   echo ',' . json_encode($row[4]*0.30);
                }
            }

            echo "]}";
        }

        if($_GET['onload']=='section')
        { 

            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.knowledge FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and section.section_name='".$_SESSION['clicked_section']."' 
            and grading_period='$gp' order by week_number";


            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "{\"knowledge\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                
                    echo json_encode(($row[4])*0.15);
                    $first = false;
                } else {
              
                    echo ',' . json_encode(($row[4])*0.15);
                }
            }

            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.processskills FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
             where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and section.section_name='".$_SESSION['clicked_section']."' 
            and grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"process\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                    echo json_encode($row[4]*0.25);
                    $first = false;
                } else {
                 
                    echo ',' . json_encode($row[4]*0.25);
                }
            }

            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.understanding FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and section.section_name='".$_SESSION['clicked_section']."' 
            and grading_period='$gp' order by week_number";
            
            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"understanding\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                    echo json_encode($row[4]*0.30);
                    $first = false;
                } else {
          
                   echo ',' . json_encode($row[4]*0.30);
                }
            }

            
            $query="SELECT section.sectionNo, section_name, student_rating.grading_period, student_rating.week_number, student_rating.performanceproducts FROM section 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and subjectID='".$_SESSION['student_chart_subjectID']."' 
            and section.levelID='".$_SESSION['student_chart_levelID']."' and section.section_name='".$_SESSION['clicked_section']."' 
            and grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"performance\": [";
            while($row = mysqli_fetch_array($query)) {
                if($first) {
                   
                   echo json_encode($row[4]*0.30);
                    $first = false;
                } else {
                   
                   echo ',' . json_encode($row[4]*0.30);
                }
            }

            echo "]}";
        }

    }




    

?>