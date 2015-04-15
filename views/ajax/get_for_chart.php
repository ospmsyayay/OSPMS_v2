<?php
    session_start();
    //Start get_student_list

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

        
            if(isset($_GET['student_search']))
            {

                $student_search=$_POST['student_search'];


                /*echo "{\"student_filter\": [".json_encode($student_search)."]}";*/
                $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

                if(!empty($student_search))
                {

                    $join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
                    from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                    inner join registration on student_schedule_line.student_lrn = registration.reg_id 
                    where section.teacherID = '".$_SESSION['account_id']."' and student_lrn LIKE '%$student_search%' or reg_lname LIKE '%$student_search%' 
                    or reg_fname LIKE '%$student_search%' or reg_mname LIKE '%$student_search%' order by registration.reg_lname";

                    $join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));;

                    $first = true;
                    echo "{\"student_filter\": [";
                    while($display = mysqli_fetch_array($join_result))
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
                else if(empty($student_search))
                {
                    $join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
                    from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
                    inner join registration on student_schedule_line.student_lrn = registration.reg_id 
                    where section.teacherID = '".$_SESSION['account_id']."' order by registration.reg_lname";

                    $join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));;

                    $first = true;
                    echo "{\"student_filter\": [";
                    while($display = mysqli_fetch_array($join_result))
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


    //End get_student_list

    if(isset($_GET['passLRN']))
    {

        $lrn = $_POST['lrn']; // Pass the student's number here using $_GET[]

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $profile = mysqli_query ($cxn,"SELECT reg_lname, reg_fname, image FROM registration  WHERE reg_id='".$lrn."'");

        $fetch_profile=mysqli_fetch_array($profile);
                                     
        $ts_reg_lname=$fetch_profile['reg_lname'];
        $ts_reg_fname=$fetch_profile['reg_fname'];
        $ts_profile_pic=$fetch_profile['image'];

        $teacher_student_school_year=get_school_year();

        $Teacher_Student_Schedule_Line=array();
    

        $join="SELECT section.class_rec_no, registration.reg_id, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image, 
        grade_level.level_description, section_list.sectionNo, section_list.section_name, subject_.subject_title, 
        sched_days, sched_start_time, sched_end_time, school_year FROM section 
        inner join grade_level on section.levelID=grade_level.levelID 
        inner join section_list on section.sectionID=section_list.sectionID 
        inner join subject_ on section.subjectID=subject_.subjectID 
        inner join registration on section.teacherID=registration.reg_id 
        inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
        where student_schedule_line.student_lrn='$lrn' and section.school_year='".$teacher_student_school_year."'
        order by grade_level.level_description";
                    
        $studentload=mysqli_query($cxn,$join) or die('Unable to connect to Database. Teacher_Student_Schedule_Line Problem'. mysqli_error($cxn));
    
        while($travload = mysqli_fetch_array($studentload))
        {
            $passer=array();

            $passer['class_rec_no']=$travload['class_rec_no'];
            $passer['teacher_id']=$travload['reg_id'];
            $passer['teacher_lname']=$travload['reg_lname'];
            $passer['teacher_fname']=$travload['reg_fname'];
            $passer['teacher_mname']=$travload['reg_mname'];
            $passer['teacher_image']=$travload['image'];
            $passer['level_description']=$travload['level_description'];
            $passer['sectionNo']=$travload['sectionNo'];
            $passer['section_name']=$travload['section_name'];
            $passer['subject_title']=$travload['subject_title'];
            $passer['sched_days']=$travload['sched_days'];
            $passer['sched_start_time']=convert_time_to_12hr($travload['sched_start_time']);
            $passer['sched_end_time']=convert_time_to_12hr($travload['sched_end_time']);

            $Teacher_Student_Schedule_Line[]=$passer;
    
        }

         echo "{\"lrn\": [" . json_encode($lrn). "],\"ts_reg_lname\":[". json_encode($ts_reg_lname)."],\"ts_reg_fname\":[". json_encode($ts_reg_fname)."],\"ts_profile_pic\":[". json_encode($ts_profile_pic)."]";
         echo ",\"teacher_student_school_year\": [" . json_encode($teacher_student_school_year). "],\"Teacher_Student_Schedule_Line\": [" . json_encode($Teacher_Student_Schedule_Line). "]";
         echo "}";


    }
  
    if( isset($_GET['gradingPeriod']) and isset($_GET['ts_onload']) )
    {

            $gp = $_GET['gradingPeriod'];
            $chart_class_rec_no=$_GET['chart_class_rec_no'];
            $lrn=$_GET['chart_lrn'];

            $grading_period=get_grading_period();
            $week_of_grading=strval(get_week_of_grading());

            echo "{\"grading_period\":[". json_encode($grading_period)."],\"week_of_grading\":[".json_encode($week_of_grading)."]";

            $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

            //knowledge--------------------------------------------------------------------------------------------------------------------------------------

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo ",\"grading_week1_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

           

            //process-----------------------------------------------------------------------------------------------------------------------------------------


            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week1_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            ///understanding----------------------------------------------------------------------------------------------------------------------------------

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week1_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            //product/performance-----------------------------------------------------------------------------------------------------------------------------

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week1_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT section_list.sectionNo, section_list.section_name, student_rating.* FROM section_list 
            inner join section on section_list.sectionID=section.sectionID 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$lrn."' and student_rating.class_rec_no='".$chart_class_rec_no."' and  grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');
            
            $first = true;
            echo "],\"progress_data\":[";
            while($row = mysqli_fetch_array($query))
            {
                if($first){
                    echo json_encode($row);
                    $first = false;
                } else {
                    echo ',' . json_encode($row);
                }
            }    


             echo "]}";



           
    }


    if( isset($_GET['s_gradingPeriod']) and isset($_GET['onload']) )
    {

           
            $gp = $_GET['s_gradingPeriod'];
            $chart_class_rec_no=$_GET['chart_class_rec_no'];

            $grading_period=get_grading_period();
            $week_of_grading=strval(get_week_of_grading());

            echo "{\"grading_period\":[". json_encode($grading_period)."],\"week_of_grading\":[".json_encode($week_of_grading)."]";

            $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');


            //knowledge--------------------------------------------------------------------------------------------------------------------------------------

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo ",\"grading_week1_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_k\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

           

            //process-----------------------------------------------------------------------------------------------------------------------------------------


            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week1_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT processskills FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_ps\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            ///understanding----------------------------------------------------------------------------------------------------------------------------------

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week1_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT understanding FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_u\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            //product/performance-----------------------------------------------------------------------------------------------------------------------------

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week1_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='2'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week2_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='3'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week3_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='4'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week4_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='5'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week5_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='6'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week6_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='7'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week7_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT performanceproducts FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='".$_SESSION['account_id']."' and grading_period='$gp' and week_number='8'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "],\"grading_week8_pp\": [";
            while($row = mysqli_fetch_array($query)) 
            {
                if($first) 
                {
                    
                    echo json_encode(($row[0]));
                    $first = false;
                } else 
                {
                    
                    echo ',' . json_encode(($row[0]));
                }
            }

            $query="SELECT section_list.sectionNo, section_list.section_name, student_rating.* FROM section_list 
            inner join section on section_list.sectionID=section.sectionID 
            inner join student_rating on section.class_rec_no=student_rating.class_rec_no 
            where student_rating.student_lrn='".$_SESSION['account_id']."' and student_rating.class_rec_no='".$chart_class_rec_no."' and  grading_period='$gp' order by week_number";

            $query = mysqli_query($cxn, $query) or die('Unable to connect to Database.');
            
            $first = true;
            echo "],\"progress_data\":[";
            while($row = mysqli_fetch_array($query))
            {
                if($first){
                    echo json_encode($row);
                    $first = false;
                } else {
                    echo ',' . json_encode($row);
                }
            }    


             echo "]}";

    }

function get_school_year()
{
    $current_year = date("Y", strtotime("today"));
    return strval($current_year).'-'.strval($current_year+1);
                        
}

function get_week_of_grading()
{
            $now = strtotime("today");
            $month = date("M", strtotime("today"));
            $weekOfGrading;
            $weekOfMonth = (int) ceil((date("d", $now) - date("w", $now) - 1) / 7) + 1;
            //Continuous numbering of weeks per Grading
            if($month=='Jun')
            {
                //Exclude week 5 or 6 of June
                if($weekOfMonth>4)
                {
                    $weekOfGrading=4;
                }
                else
                {
                    $weekOfGrading=$weekOfMonth;
                }    
            }
            if($month=='Jul')
            {
                //Weeks 5, 6, 7, 8
                //If 1st week of July 
                if($weekOfMonth==1)
                {
                    $weekOfGrading=5;
                }
                //If 2nd week of July
                if($weekOfMonth==2)
                {
                    $weekOfGrading=6;
                }    
                //If 3rd week of July
                if($weekOfMonth==3)
                {
                    $weekOfGrading=7;
                }    
                //If 4th week of July
                if($weekOfMonth==4)
                {
                    $weekOfGrading=8;
                }    

                //Exclude week 5 or 6 of July
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;//excess
                }    
            }
            if($month=='Aug')
            {
                //If 1st week of August: still week 8 of 1st Grading 
                if($weekOfMonth==1)
                {
                    $weekOfGrading=8;//excess
                }
                //If 2nd week of August: 1st Periodical exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;//excess
                }    
                //If 3rd week of August: start of 2nd Grading
                if($weekOfMonth==3)
                {
                    $weekOfGrading=1;
                }    
                //If 4th week of August
                if($weekOfMonth==4)
                {
                    $weekOfGrading=2;
                }    

                //Exclude week 5 or 6 of July
                if($weekOfMonth>4)
                {
                    $weekOfGrading=2;
                }    
            }     
            if($month=='Sep')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=3;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=4;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=5;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=6;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=6;//excess
                }    
            }
            if($month=='Oct')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=7;
                }
                //2nd Periodical Exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;
                }    
                //Start of 3rd Grading
                if($weekOfMonth==3)
                {
                    $weekOfGrading=1;
                }    
                //SemBreak
                if($weekOfMonth==4)
                {
                    $weekOfGrading=1;//retain
                }    
                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=1;//retain
                }    
            }          
            if($month=='Nov')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=2;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=3;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=4;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=5;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=5;//excess
                }    
            }  
            if($month=='Dec')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=6;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=7;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=8;
                }    
                //Christmas Break
                if($weekOfMonth==4)
                {
                    $weekOfGrading=8;//retain
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;//excess
                }    
            }
            if($month=='Jan')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=8;//excess
                }
                //3rd Periodical Exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;//excess
                }    
                //Start of 4th Grading
                if($weekOfMonth==3)
                {
                    $weekOfGrading=1;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=2;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=2;//excess
                }    
            }    
            if($month=='Feb')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=3;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=4;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=5;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=6;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=6;//excess
                }    
            }
            if($month=='Mar')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=7;
                }
                //Estimated 4th Grading Examination of Graduating
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;
                }    
                //Estimated 4th Grading Examination
                if($weekOfMonth==3)
                {
                    $weekOfGrading=8;//retain
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=8;//retain
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;//retain
                }    
            }    
            //April:Releasing of Final Grades
            
            return $weekOfGrading;
}

function get_grading_period()
{
    $grading_period="";
    $now = strtotime("today");
    //Get first date of June
    $current_year = date("Y", $now);
    $June = date("$current_year-06-01");
    //Get second week of August
    $first_saturday_of_August = date("Y-m-d",strtotime("first Saturday of August $current_year"));
    $second_week_of_August = date("Y-m-d", strtotime($first_saturday_of_August . " +1 week"));
    //Get second week of October
    $first_saturday_of_October = date("Y-m-d",strtotime("first Saturday of October $current_year"));
    $second_week_of_October = date("Y-m-d", strtotime($first_saturday_of_October . " +1 week"));
    //Get second week of January 
    $first_saturday_of_January = date("Y-m-d",strtotime("first Saturday of January $current_year"));
    $second_week_of_January = date("Y-m-d", strtotime($first_saturday_of_January . " +1 week"));
    //Get third week of March 
    $first_saturday_of_March = date("Y-m-d",strtotime("first Saturday of March $current_year"));
    $third_week_of_March = date("Y-m-d", strtotime($first_saturday_of_March . " +2 week"));
    $today=date("Y-m-d",$now);


    if($today >= $June and $today <= $second_week_of_August)
    {
        //1st Grading Period
        //Estimated 1st Periodical Exam:2nd week of August
        $grading_period="1st Grading Period";

    }

    if($today > $second_week_of_August and $today <= $second_week_of_October)
    {
        //2nd Grading Period
        //Estimated 2nd Periodical Exam:2nd week of October
        $grading_period="2nd Grading Period";
    }
    if($today > $second_week_of_October or $today <= $second_week_of_January)
    {
        //3rd Grading Period
        //Estimated 3rd Periodical Exam:2nd week of January
        $grading_period="3rd Grading Period";
    }
    if($today > $second_week_of_January and $today <= $third_week_of_March)
    {
        //4th Grading Period
        //Estimated 4th Periodical Exam:3rd week of March
         $grading_period="4th Grading Period";
    }
    
    return $grading_period;


} 

function convert_time_to_12hr($time)
{
    $new_time=date("h:i A", strtotime($time));

    return $new_time;
}     

function convert_datetime_to_12hr($datetime)
{
    $new_time=date("Y-m-d h:i A", strtotime($datetime));

    return $new_time;
  
}


    

?>