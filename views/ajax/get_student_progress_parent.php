<?php
    session_start();
       
            if(isset($_GET['student_search']))
            {

                $student_search=$_POST['student_search'];


                /*echo "{\"student_filter\": [".json_encode($student_search)."]}";*/
                $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

                if(!empty($student_search))
                {

                    $join="SELECT student.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
                    from student inner join registration on student.student_lrn = registration.reg_id 
                    where student.parentID = '".$_SESSION['account_id']."' and student_lrn LIKE '%$student_search%' or reg_lname LIKE '%$student_search%' 
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
                    $join="SELECT student.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
                    from student inner join registration on student.student_lrn = registration.reg_id 
                    where student.parentID = '".$_SESSION['account_id']."' order by registration.reg_lname";

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



    //End get_student_list

    if(isset($_GET['passLRN']))
    {

        $lrn = $_POST['lrn']; // Pass the student's number here using $_GET[]

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $profile = mysqli_query ($cxn,"SELECT reg_lname, reg_fname, image FROM registration  WHERE reg_id='".$lrn."'");

        $fetch_profile=mysqli_fetch_array($profile);
                                     
        $reg_lname=$fetch_profile['reg_lname'];
        $reg_fname=$fetch_profile['reg_fname'];
        $profile_pic=$fetch_profile['image'];

        $student_school_year=get_school_year();

        $Student_Schedule_Line=array();
    

        $join="SELECT section.class_rec_no, registration.reg_id, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image, 
        grade_level.level_description, section_list.sectionNo, section_list.section_name, subject_.subject_title, 
        sched_days, sched_start_time, sched_end_time, school_year FROM section 
        inner join grade_level on section.levelID=grade_level.levelID 
        inner join section_list on section.sectionID=section_list.sectionID 
        inner join subject_ on section.subjectID=subject_.subjectID 
        inner join registration on section.teacherID=registration.reg_id 
        inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
        where student_schedule_line.student_lrn='$lrn' and section.school_year='".$student_school_year."'
        order by grade_level.level_description";
                    
        $studentload=mysqli_query($cxn,$join) or die('Unable to connect to Database. Student_Schedule_Line Problem'. mysqli_error($cxn));
    
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

            $Student_Schedule_Line[]=$passer;
    
        }

         echo "{\"lrn\": [" . json_encode($lrn). "],\"reg_lname\":[". json_encode($reg_lname)."],\"reg_fname\":[". json_encode($reg_fname)."],\"profile_pic\":[". json_encode($profile_pic)."]";
         echo ",\"student_school_year\": [" . json_encode($student_school_year). "],\"Student_Schedule_Line\": [" . json_encode($Student_Schedule_Line). "]";
         echo "}";


    }
  
    if( isset($_GET['gradingPeriod']) and isset($_GET['ts_onload']) )
    {

            $gp = $_GET['gradingPeriod'];
            $chart_class_rec_no=$_GET['chart_class_rec_no'];
            $lrn=$_GET['chart_lrn'];

            $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');


            //knowledge--------------------------------------------------------------------------------------------------------------------------------------

            $query="SELECT knowledge FROM student_rating where class_rec_no='$chart_class_rec_no' 
            and student_lrn='$lrn' and grading_period='$gp' and week_number='1'";

            $query = mysqli_query($cxn,$query) or die('Unable to connect to Database.');

            $first = true;
            echo "{\"grading_week1_k\": [";
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



function get_school_year()
{
    $current_year = date("Y", strtotime("today"));
    return strval($current_year).'-'.strval($current_year+1);
                        
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