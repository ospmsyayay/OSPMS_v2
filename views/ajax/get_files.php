
<?php 
	session_start();

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





	
?>