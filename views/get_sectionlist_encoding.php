
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


			$subject_sectionlist="SELECT section.class_rec_no, grade_level.level_description, section.sectionNo, section.section_name FROM section 
			inner join grade_level on section.levelID=grade_level.levelID 
			where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."'";
	 
				
			$subject_result=mysqli_query($cxn,$subject_sectionlist) or die('Unable to connect to Database.');

		    	$first = true;
    			echo "{\"sectionlist_bySubject\": [";
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

				$grade_sectionlist="SELECT section.class_rec_no, grade_level.level_description, section.sectionNo, section.section_name FROM section
				 inner join grade_level on section.levelID=grade_level.levelID
				 where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."'";	


				$grade_result=mysqli_query($cxn,$grade_sectionlist) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"sectionlist_byGrade\": [";
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

				$section_sectionlist="SELECT section.class_rec_no, grade_level.level_description, section.sectionNo, section.section_name FROM section 
				inner join grade_level on section.levelID=grade_level.levelID where section.teacherID = '".$_SESSION['account_id']."' 
				and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section.section_name='".$clicked_section."'";	


				$section_result=mysqli_query($cxn,$section_sectionlist) or die('Unable to connect to Database.');

			    	$first = true;
	    			echo "{\"sectionlist_bySection\": [";
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