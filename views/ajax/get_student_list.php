
<?php 
	session_start();

		if(isset($_GET['subject']))
		{	
		    $clicked_subject = $_GET['subject'];


		    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		    
		    $subject_sql="Select subjectID from subject_ where subject_title='".$clicked_subject."'";
			$subject_result=mysqli_query($cxn,$subject_sql);
			$subject_row = mysqli_fetch_row($subject_result);
			$_SESSION['subjectID'] = $subject_row[0];

			$subject_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
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

				$grade_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
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

				$_SESSION['clicked_section'] = $_GET['section'];

				$section_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
				from section_list inner join section on section_list.sectionID=section.sectionID
				inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
				inner join registration on student_schedule_line.student_lrn = registration.reg_id  where section.teacherID = '".$_SESSION['account_id']."' 
				and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section_list.section_name='".$_SESSION['clicked_section']."'";	


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

			if(isset($_GET['student_search']))
			{
				$student_search=$_GET['student_search'];


				/*echo "{\"student_filter\": [".json_encode($student_search)."]}";*/
				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				if(!empty($student_search))
				{
					$join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
					from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
					inner join registration on student_schedule_line.student_lrn = registration.reg_id 
					where section.teacherID = '".$_SESSION['account_id']."' and student_lrn LIKE '%$student_search%' or reg_lname LIKE '%$student_search%' 
					or reg_fname LIKE '%$student_search%' or reg_mname LIKE '%$student_search%'";

					$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

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

					$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

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

			if(isset($_GET['student_search_subject']))
			{
				$student_search_subject=$_GET['student_search_subject'];

				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				if(!empty($student_search_subject))
				{
					/*echo "{\"student_filter\": [".json_encode($student_search_subject).','.json_encode($_SESSION['subjectID'])."]}";*/

					$subject_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
					from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
					inner join registration on student_schedule_line.student_lrn = registration.reg_id 
					where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' 
					and student_lrn LIKE '%$student_search_subject%' or reg_lname LIKE '%$student_search_subject%' 
					or reg_fname LIKE '%$student_search_subject%' or reg_mname LIKE '%$student_search_subject%'";
	 
				
					$subject_result=mysqli_query($cxn,$subject_join) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"student_filter_subject\": [";
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
				else if(empty($student_search_subject))
				{
					$subject_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image 
					from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
					inner join registration on student_schedule_line.student_lrn = registration.reg_id 
					where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."'";
	 
				
					$subject_result=mysqli_query($cxn,$subject_join) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"student_filter_subject\": [";
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
			}

			if(isset($_GET['student_search_grade']))
			{
				$student_search_grade=$_GET['student_search_grade'];

				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				if(!empty($student_search_grade))
				{
					/*echo "{\"student_filter\": [".json_encode($student_search_grade).','.json_encode($_SESSION['levelID'])."]}";*/

					$grade_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
					from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
					inner join registration on student_schedule_line.student_lrn = registration.reg_id 
					where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."'
					and student_lrn LIKE '%$student_search_grade%' or reg_lname LIKE '%$student_search_grade%' 
					or reg_fname LIKE '%$student_search_grade%' or reg_mname LIKE '%$student_search_grade%'";	


					$grade_result=mysqli_query($cxn,$grade_join) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"student_filter_grade\": [";
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
				else if(empty($student_search_grade))
				{
					$grade_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
					from section inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
					inner join registration on student_schedule_line.student_lrn = registration.reg_id 
					where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."'";	


					$grade_result=mysqli_query($cxn,$grade_join) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"student_filter_grade\": [";
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
			}

			if(isset($_GET['student_search_section']))
			{
				$student_search_section=$_GET['student_search_section'];

				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				if(!empty($student_search_section))
				{
					$section_join="Select distinct student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
					from section_list inner join section on section_list.sectionID=section.sectionID inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
					inner join registration on student_schedule_line.student_lrn = registration.reg_id  where section.teacherID = '".$_SESSION['account_id']."' 
					and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section_list.section_name='".$_SESSION['clicked_section']."'
					and student_lrn LIKE '%$student_search_section%' or reg_lname LIKE '%$student_search_section%' 
					or reg_fname LIKE '%$student_search_section%' or reg_mname LIKE '%$student_search_section%'";	


					$section_result=mysqli_query($cxn,$section_join) or die('Unable to connect to Database.');

				    	$first = true;
		    			echo "{\"student_filter_section\": [";
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
				else if(empty($student_search_section))
				{
					$section_join="Select student_schedule_line.student_lrn, registration.reg_lname, registration.reg_fname, registration.reg_mname, registration.image
					from section_list inner join section on section_list.sectionID=section.sectionID inner join student_schedule_line on section.class_rec_no=student_schedule_line.class_rec_no 
					inner join registration on student_schedule_line.student_lrn = registration.reg_id  where section.teacherID = '".$_SESSION['account_id']."' 
					and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section_list.section_name='".$_SESSION['clicked_section']."'";	


					$section_result=mysqli_query($cxn,$section_join) or die('Unable to connect to Database.');

				    	$first = true;
		    			echo "{\"student_filter_section\": [";
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
			}	


	
?>