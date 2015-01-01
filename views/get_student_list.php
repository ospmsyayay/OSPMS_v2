
<?php 
	session_start();

		if(isset ($_GET['subject']))
		{	
		    $clicked_subject = $_GET['subject'];


		    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		    
		    $subject_sql="Select subjectID from subject_ where subject_title='".$clicked_subject."'";
			$subject_result=mysqli_query($cxn,$subject_sql);
			$subject_row = mysqli_fetch_row($subject_result);
			$_SESSION['subjectID'] = $subject_row[0];

			$subject_join="Select student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
			from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
			inner join registration on student_schedule_line.student_lrn = registration.reg_id 
			where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."'";
	 
				
			$subject_result=mysqli_query($cxn,$subject_join) or die('Unable to connect to Database.');

		    	$first = true;
    			echo "{\"student_list_bySubject\": [";
				while($display = mysqli_fetch_array($subject_result))
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

		if(isset($_GET['grade']))
			{
				 $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				$clicked_grade = $_GET['grade'];

				$grade_sql="Select levelID from grade_level where level_description='".$clicked_grade."'";
				$grade_result=mysqli_query($cxn,$grade_sql);
				$grade_row = mysqli_fetch_row($grade_result);
				$_SESSION['levelID'] = $grade_row[0];

				$grade_join="Select student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
				 from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
				 inner join registration on student_schedule_line.student_lrn = registration.reg_id 
				 where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."'";	


				$grade_result=mysqli_query($cxn,$grade_join) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"student_list_byGrade\": [";
					while($display = mysqli_fetch_array($grade_result))
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
			
			if(isset($_GET['section']))
			{
				 $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				$clicked_section = $_GET['section'];

				$section_join="Select student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
				from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
				inner join registration on student_schedule_line.student_lrn = registration.reg_id  where section.teacherID = '".$_SESSION['account_id']."' 
				and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section.section_name='".$clicked_section."'";	


				$section_result=mysqli_query($cxn,$section_join) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"student_list_bySection\": [";
					while($display = mysqli_fetch_array($section_result))
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