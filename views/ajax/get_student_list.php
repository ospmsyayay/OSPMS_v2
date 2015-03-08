
<?php 
session_start();

		if(isset($_GET['class_rec_no']))
		{	$class_rec_no="";
		    $class_rec_no = $_POST['class_rec_no'];

		    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

			$join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
			from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
			inner join registration on student_schedule_line.student_lrn = registration.reg_id 
			where section.class_rec_no = '".$class_rec_no."'";
	 
				
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
					or reg_fname LIKE '%$student_search%' or reg_mname LIKE '%$student_search%'";

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
					where section.teacherID = '".$_SESSION['account_id']."'";

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
					or reg_fname LIKE '%$student_search_class%' or reg_mname LIKE '%$student_search_class%'";
	 
				
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
					where section.class_rec_no='".$class_rec_no_class."'";
	 
				
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

			


	
?>