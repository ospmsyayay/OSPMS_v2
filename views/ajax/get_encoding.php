
<?php 
	session_start();
if(isset($_GET['get-grading-period-and-week-no']))
{
    $grading_period=get_grading_period();
    $week_of_grading=strval(get_week_of_grading());

    echo "{\"grading_period\":[". json_encode($grading_period)."],\"week_of_grading\":[".json_encode($week_of_grading)."]}";
}    

if(isset ($_GET['get-students-init']))
{	
    $class_rec_no = $_GET['class_rec_no'];


    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
    
	$student_list="SELECT student_schedule_line.student_lrn, registration.image, registration.reg_lname, registration.reg_fname, registration.reg_mname
    from student_schedule_line inner join registration on student_schedule_line.student_lrn = registration.reg_id 
    where student_schedule_line.class_rec_no='$class_rec_no'";

	$list_result=mysqli_query($cxn,$student_list) or die('Unable to connect to Database. Get Students Init Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));

    	$first = true;
		echo "{\"student_list\": [";
		while($display = mysqli_fetch_array($list_result))
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

if(isset($_GET['set-encode-workspace']))
{
    $class_rec_no = $_POST['class_rec_no'];
    $student_lrn = $_POST['student_lrn'];

    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');


    $query="SELECT week_number,knowledge, processskills, understanding, performanceproducts FROM student_rating 
    where class_rec_no='$class_rec_no' and student_lrn='$student_lrn' and grading_period='1st' order by week_number";

    $first_grading=mysqli_query($cxn,$query) or die('Unable to connect to Database. Set Encode at 1st Grading '. mysqli_errno($cxn) .' '. mysqli_error($cxn));

        $first = true;
        echo "{\"first_grading\": [";
        while($display = mysqli_fetch_array($first_grading))
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
        

    $query="SELECT week_number, knowledge, processskills, understanding, performanceproducts FROM student_rating 
    where class_rec_no='$class_rec_no' and student_lrn='$student_lrn' and grading_period='2nd' order by week_number";

    $second_grading=mysqli_query($cxn,$query) or die('Unable to connect to Database. Set Encode at 2nd Grading '. mysqli_errno($cxn) .' '. mysqli_error($cxn));

        $first = true;
        echo "],\"second_grading\": [";
        while($display = mysqli_fetch_array($second_grading))
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

    $query="SELECT week_number, knowledge, processskills, understanding, performanceproducts FROM student_rating 
    where class_rec_no='$class_rec_no' and student_lrn='$student_lrn' and grading_period='3rd' order by week_number";

    $third_grading=mysqli_query($cxn,$query) or die('Unable to connect to Database. Set Encode at 3rd Grading '. mysqli_errno($cxn) .' '. mysqli_error($cxn));

        $first = true;
        echo "],\"third_grading\": [";
        while($display = mysqli_fetch_array($third_grading))
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

    $query="SELECT week_number, knowledge, processskills, understanding, performanceproducts FROM student_rating 
    where class_rec_no='$class_rec_no' and student_lrn='$student_lrn' and grading_period='4th' order by week_number";

    $fourth_grading=mysqli_query($cxn,$query) or die('Unable to connect to Database. Set Encode at 4th Grading '. mysqli_errno($cxn) .' '. mysqli_error($cxn));

        $first = true;
        echo "],\"fourth_grading\": [";
        while($display = mysqli_fetch_array($fourth_grading))
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

if(isset($_GET['submit-encode-form']))
{
	$response=array();

	$class_rec_no=$_POST['class_rec_no'];
    $grading_id=createGradingId();
    $student_lrn = $_POST['studentlrn'];
    $grading_period = $_POST['gradingPeriod'];
    $week_number = $_POST['weekNumber'];
    $knowledge = $_POST['knowledge'];
    $processskills = $_POST['processskills'];
    $understanding = $_POST['understanding'];
    $performanceproducts = $_POST['performanceproducts'];

    $tentativeGrade = ($knowledge * 0.15) + ($processskills * 0.25) + ($understanding * 0.30) + ($performanceproducts * 0.30);
    $legend=mark_proficiency($tentativeGrade);

    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

    //validate
    $sql="SELECT * FROM student_rating where class_rec_no='$class_rec_no' and 
    student_lrn='$student_lrn' and grading_period='$grading_period' and week_number='$week_number'";

    $valid= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Validate Student Rating Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    $num_rows = mysqli_num_rows($valid);

    if($num_rows==0)
    { 
             $sql = "INSERT INTO student_rating (
                grading_id, student_lrn, class_rec_no, grading_period, week_number, knowledge, processskills, understanding, performanceproducts, tentative_grade, legend) 
                VALUES ('$grading_id', '$student_lrn', '$class_rec_no', '$grading_period', '$week_number', $knowledge, $processskills, $understanding, $performanceproducts, 
                        $tentativeGrade, '$legend')"; 

             $inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Insert Student Rating Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));

            if($inserted==true) 
            {
                    $response = array('success' => 'Student Assessment Saved');
            } else 
            {
                    $response = array('error' => 'Assessment Encoding Failed');
            }
    }
    else
    {
        $response=array('error'=>'Assessment Already Existing');
    }    



    echo json_encode($response);

}


function mark_proficiency($grade)
{

    if($grade > 89.00)
    {
        return "A";
    }    

    else if($grade > 84.00)
    {
        return "P";
    }
    else if($grade > 79.00)
    {
        return "AP";
    }   
    else if($grade > 74.00)
    {
        return "D";
    }
    else
    {
        return "B";
    }    
}



function createGradingId()
{
	$rand7int=$grading_id="";
        
        $rand7int=strval(mt_rand ( 1000000 , 9999999 ));

        $grading_id="GR-" . $rand7int;

        return $grading_id;

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
                    $weekOfGrading=8;
                }    
            }
            if($month=='Aug')
            {
                //If 1st week of August: still week 4 of 1st Grading 
                if($weekOfMonth==1)
                {
                    $weekOfGrading=4;
                }
                //If 2nd week of August: 1st Periodical exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=4;
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
                    $weekOfGrading=6;
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
                    $weekOfGrading=1;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=1;
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
                    $weekOfGrading=5;
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
                    $weekOfGrading=8;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;
                }    
            }
            if($month=='Jan')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=8;
                }
                //3rd Periodical Exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;
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
                    $weekOfGrading=2;
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
                    $weekOfGrading=6;
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
                    $weekOfGrading=8;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=8;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;
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



	
?>