
<?php 
	session_start();

		if(isset ($_GET['selected_section']))
		{	
		    $clicked_section = $_GET['selected_section'];


		    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		    
			$student_list="Select student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname from student_schedule_line 
			inner join registration on student_schedule_line.student_lrn = registration.reg_id where student_schedule_line.class_rec_no='".$clicked_section."'";
	 
				
			$list_result=mysqli_query($cxn,$student_list) or die('Unable to connect to Database.');

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
	
?>