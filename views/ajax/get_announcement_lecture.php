
<?php 
	session_start();

	
		if(isset ($_POST['subject']))
		{	

		    $_SESSION['clicked_subject'] = $_POST['subject'];

		    clickedBySubject();

		}

		if(isset($_POST['grade']))
		{
			

			$_SESSION['clicked_grade'] = $_POST['grade'];

			clickedByGrade();

		}
			
		if(isset($_POST['section']))
		{
			 

			$_SESSION['clicked_section'] = $_POST['section'];

			clickedBySection();
		}


		if(isset($_POST['ajax_message_subject']))
		{
			
			$message=clean($_POST['ajax_message_subject']);

			/*echo "{\"ajax_message_subject\": [" . json_encode($message). "]}";*/

			postBySubject($message);
		
			
		}

		if(isset($_POST['ajax_message_grade']))
		{
			
			$message=clean($_POST['ajax_message_grade']);

			/*echo "{\"ajax_message_grade\": [" . json_encode($message). "]}";*/

			postByGrade($message);
		
			

		}

		if(isset($_POST['ajax_message_section']))
		{
			
			$message=clean($_POST['ajax_message_section']);

			/*echo "{\"ajax_message_section\": [" . json_encode($message). "]}";*/

			postBySection($message);
		
			

		}


function postBySubject($message)
{
			if(!empty($message))
			{
				
				
				$message_date_created= date("Y-m-d H:i:s");  

				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				$sql="INSERT INTO announcement_lecture(date_created, messageorfile_caption) VALUES('".$message_date_created."','".$message."')";
						
					$announcement_lecture_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database.');
					
					if($announcement_lecture_inserted)
				    {
				        $query="Select class_rec_no from section where teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."'"; 

				        $fetch_class_rec= mysqli_query($cxn,$query);


				        while($each_rec = mysqli_fetch_array($fetch_class_rec))
				        {
				            
				            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$message_date_created."')";

				            $insert_done=mysqli_query($cxn,$insert);
				        }

				        clickedBySubject();

				    }    


				
			}

}

function postByGrade($message)
{
			if(!empty($message))
			{
				
				
				$message_date_created= date("Y-m-d H:i:s");  

				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				$sql="INSERT INTO announcement_lecture(date_created, messageorfile_caption) VALUES('".$message_date_created."','".$message."')";
						
					$announcement_lecture_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database.');
					
					if($announcement_lecture_inserted)
				    {
				        $query="Select class_rec_no from section where teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."'"; 

				        $fetch_class_rec= mysqli_query($cxn,$query);


				        while($each_rec = mysqli_fetch_array($fetch_class_rec))
				        {
				            
				            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$message_date_created."')";

				            $insert_done=mysqli_query($cxn,$insert);
				        }

				        clickedByGrade();

				    }    


				
			}
}

function postBySection($message)
{
			if(!empty($message))
			{
				
				
				$message_date_created= date("Y-m-d H:i:s");  

				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

				$sql="INSERT INTO announcement_lecture(date_created, messageorfile_caption) VALUES('".$message_date_created."','".$message."')";
						
					$announcement_lecture_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database.');
					
					if($announcement_lecture_inserted)
				    {
				        $query="Select class_rec_no from section inner join section_list on section.sectionID=section_list.sectionID where teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section_list.section_name='".$_SESSION['clicked_section']."'"; 

				        $fetch_class_rec= mysqli_query($cxn,$query);


				        while($each_rec = mysqli_fetch_array($fetch_class_rec))
				        {
				            
				            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$message_date_created."')";

				            $insert_done=mysqli_query($cxn,$insert);
				        }

				        clickedBySection();

				    }    


				
			}
}			


function clickedBySubject()
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		    
		    $subject_sql="Select subjectID from subject_ where subject_title='".$_SESSION['clicked_subject']."'";
			$subject_result=mysqli_query($cxn,$subject_sql);
			$subject_row = mysqli_fetch_row($subject_result);
			$_SESSION['subjectID'] = $subject_row[0];

			$subject_join="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
	        section_list.sectionNo, section_list.section_name, subject_.subject_title, grade_level.level_description 
	        from section_list inner join section on section_list.sectionID=section.sectionID
	        inner join subject_ on section.subjectID=subject_.subjectID 
	        inner join grade_level on section.levelID=grade_level.levelID 
	        inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
	        inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created 
			where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' order by date_created desc";
	 
				
			$subject_result=mysqli_query($cxn,$subject_join) or die('Unable to connect to Database.');

	    	$first = true;
			echo "{\"announcement_lecture_bySubject\": [";
			while($display = mysqli_fetch_array($subject_result))
			{


				$passer=array();

				$passer['date_created']=$display['date_created'];
				$passer['timespan']=get_time_difference_php($passer['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
				$passer['file_path']=$display['file_path'];
				$passer['file_name']=$display['file_name'];
				
				$footer='';
				

				if( (!empty($passer['file_path'])) and (!empty($passer['file_name'])) )
				{
					

					$footer='<div class="panel-footer"><form action="" method="post" name="download">';
																

					$temp = explode(".",$passer['file_name']);
					$nameoffile = $temp[0];
					$extension = end($temp);

					if(($extension=='doc')||($extension=='docx')||($extension=='docm')||($extension=='docb')||($extension=='dotm')||($extension=='dotx'))	
					{

						$footer=$footer . '<div><a><img src="views/res/word.png" class="img-thumbnail post-lecture-image">';
					}

					else if ($extension=='pdf') 
					{
						$footer=$footer . '<div><a><img src="views/res/adobe.png" class="img-thumbnail post-lecture-image">';
					}	

					else if(($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb'))
					{


						$footer=$footer . '<div><a><img src="views/res/excel.png" class="img-thumbnail post-lecture-image">';
					}

					else if(($extension=='ppt')||($extension=='pptx')||($extension=='pptm')||($extension=='potx')||($extension=='potm')||($extension=='ppam')||
						   ($extension=='ppsx')||($extension=='ppsm')||($extension=='sldx')||($extension=='sldm'))
					{

						$footer=$footer . '<div><a><img src="views/res/powerpoint.png" class="img-thumbnail post-lecture-image">';
					}

					else if($extension=='7z')
					{
						$footer=$footer . '<div><a><img src="views/res/7z.png" class="img-thumbnail post-lecture-image">';

					}

					else if($extension=='rar')
					{

						$footer=$footer . '<div><a><img src="views/res/rar.jpg" class="img-thumbnail post-lecture-image">';
																
					}	

					else if($extension=='swf')
					{

						$footer=$footer . '<div><a><img src="views/res/swf.jpg" class="img-thumbnail post-lecture-image">';
					}

					else if($extension=='zip')
					{
						$footer=$footer . '<div><a><img src="views/res/zip.jpg" class="img-thumbnail post-lecture-image">';
					}

					else
					{
						$footer=$footer . '<div><a><img src="'.$passer['file_path'].$passer['file_name'].'" class="img-thumbnail post-lecture-image">';
					}

					$footer=$footer . '<p class="pull-right"><span class="glyphicon glyphicon-paperclip"></span>'.$display['file_name'].'</p>
										<input name="file_name" value="'.$passer['file_name'].'" type="hidden"/>
										<button class=" btn btn-primary" type="submit">Download File <span class="glyphicon glyphicon-save"></span></button>
										</a></div>	
										</form>
										</div>';
														
				}
				else
				{	
													
					$footer='<div class="panel-footer"><span class="glyphicon glyphicon-fire"></span><span class="glyphicon glyphicon-tags pull-right"></span></div>';
														
				}
														

				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];
				$passer['level_description']=$display['level_description'];
				$passer['display_footer']=$footer;


				if($first) 
				{

					echo json_encode($passer);
						 $first = false;

				}		 
				else 
				{
					echo ',' . json_encode($passer);
				}
			}
				
			echo "],\"success\": [".json_encode("Message Posted")."],\"category\": [".json_encode($_SESSION['clicked_subject'])."]}";
}

function clickedByGrade()
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

			$grade_sql="Select levelID from grade_level where level_description='".$_SESSION['clicked_grade']."'";
			$grade_result=mysqli_query($cxn,$grade_sql);
			$grade_row = mysqli_fetch_row($grade_result);
			$_SESSION['levelID'] = $grade_row[0];

			$grade_join="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
			section_list.sectionNo, section_list.section_name, subject_.subject_title, grade_level.level_description 
	        from section_list inner join section on section_list.sectionID=section.sectionID
			inner join subject_ on section.subjectID=subject_.subjectID 
			inner join grade_level on section.levelID=grade_level.levelID 
			inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
			inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created
			where section.teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' order by date_created desc";	 


			$grade_result=mysqli_query($cxn,$grade_join) or die('Unable to connect to Database.');

	    	$first = true;
			echo "{\"announcement_lecture_byGrade\": [";
			while($display = mysqli_fetch_array($grade_result))
			{

				$passer=array();

				$passer['date_created']=$display['date_created'];
				$passer['timespan']=get_time_difference_php($passer['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
				$passer['file_path']=$display['file_path'];
				$passer['file_name']=$display['file_name'];

				$footer='';
				

				if( (!empty($passer['file_path'])) and (!empty($passer['file_name'])) )
				{
					

					$footer='<div class="panel-footer"><form action="" method="post" name="download">';
																

					$temp = explode(".",$passer['file_name']);
					$nameoffile = $temp[0];
					$extension = end($temp);

					if(($extension=='doc')||($extension=='docx')||($extension=='docm')||($extension=='docb')||($extension=='dotm')||($extension=='dotx'))	
					{

						$footer=$footer . '<div><a><img src="views/res/word.png" class="img-thumbnail post-lecture-image">';
					}

					else if ($extension=='pdf') 
					{
						$footer=$footer . '<div><a><img src="views/res/adobe.png" class="img-thumbnail post-lecture-image">';
					}	

					else if(($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb'))
					{


						$footer=$footer . '<div><a><img src="views/res/excel.png" class="img-thumbnail post-lecture-image">';
					}

					else if(($extension=='ppt')||($extension=='pptx')||($extension=='pptm')||($extension=='potx')||($extension=='potm')||($extension=='ppam')||
						   ($extension=='ppsx')||($extension=='ppsm')||($extension=='sldx')||($extension=='sldm'))
					{

						$footer=$footer . '<div><a><img src="views/res/powerpoint.png" class="img-thumbnail post-lecture-image">';
					}

					else if($extension=='7z')
					{
						$footer=$footer . '<div><a><img src="views/res/7z.png" class="img-thumbnail post-lecture-image">';

					}

					else if($extension=='rar')
					{

						$footer=$footer . '<div><a><img src="views/res/rar.jpg" class="img-thumbnail post-lecture-image">';
																
					}	

					else if($extension=='swf')
					{

						$footer=$footer . '<div><a><img src="views/res/swf.jpg" class="img-thumbnail post-lecture-image">';
					}

					else if($extension=='zip')
					{
						$footer=$footer . '<div><a><img src="views/res/zip.jpg" class="img-thumbnail post-lecture-image">';
					}

					else
					{
						$footer=$footer . '<div><a><img src="'.$passer['file_path'].$passer['file_name'].'" class="img-thumbnail post-lecture-image">';
					}

					$footer=$footer . '<p class="pull-right"><span class="glyphicon glyphicon-paperclip"></span>'.$display['file_name'].'</p>
										<input name="file_name" value="'.$passer['file_name'].'" type="hidden"/>
										<button class=" btn btn-primary" type="submit">Download File <span class="glyphicon glyphicon-save"></span></button>
										</a></div>	
										</form>
										</div>';
														
				}
				else
				{	
													
					$footer='<div class="panel-footer"><span class="glyphicon glyphicon-fire"></span><span class="glyphicon glyphicon-tags pull-right"></span></div>';
														
				}
														

				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];
				$passer['level_description']=$display['level_description'];
				$passer['display_footer']=$footer;

				if($first) 
				{
					echo json_encode($passer);
						 $first = false;
				}		 
				else 
				{
					echo ',' . json_encode($passer);
				}
			}
			
			echo "],\"success\": [".json_encode("Message Posted")."],\"category\": [".json_encode($_SESSION['clicked_grade'])."]}";
			
}

function clickedBySection()
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
			
			$section_join="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
	        section_list.sectionNo, section_list.section_name, subject_.subject_title, grade_level.level_description 
	        from section_list inner join section on section_list.sectionID=section.sectionID
	        inner join subject_ on section.subjectID=subject_.subjectID 
	        inner join grade_level on section.levelID=grade_level.levelID 
	        inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
	        inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created  
			where section.teacherID = '".$_SESSION['account_id']."' 
			and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section_list.section_name='".$_SESSION['clicked_section']."' order by date_created desc";		


			$section_result=mysqli_query($cxn,$section_join) or die('Unable to connect to Database.');

	    	$first = true;
			echo "{\"announcement_lecture_bySection\": [";
			while($display = mysqli_fetch_array($section_result))
			{

				$passer=array();

				$passer['date_created']=$display['date_created'];
				$passer['timespan']=get_time_difference_php($passer['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
				$passer['file_path']=$display['file_path'];
				$passer['file_name']=$display['file_name'];
				
				$footer='';
				

				if( (!empty($passer['file_path'])) and (!empty($passer['file_name'])) )
				{
					

					$footer='<div class="panel-footer"><form action="" method="post" name="download">';
																

					$temp = explode(".",$passer['file_name']);
					$nameoffile = $temp[0];
					$extension = end($temp);

					if(($extension=='doc')||($extension=='docx')||($extension=='docm')||($extension=='docb')||($extension=='dotm')||($extension=='dotx'))	
					{

						$footer=$footer . '<div><a><img src="views/res/word.png" class="img-thumbnail post-lecture-image">';
					}

					else if ($extension=='pdf') 
					{
						$footer=$footer . '<div><a><img src="views/res/adobe.png" class="img-thumbnail post-lecture-image">';
					}	

					else if(($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb'))
					{


						$footer=$footer . '<div><a><img src="views/res/excel.png" class="img-thumbnail post-lecture-image">';
					}

					else if(($extension=='ppt')||($extension=='pptx')||($extension=='pptm')||($extension=='potx')||($extension=='potm')||($extension=='ppam')||
						   ($extension=='ppsx')||($extension=='ppsm')||($extension=='sldx')||($extension=='sldm'))
					{

						$footer=$footer . '<div><a><img src="views/res/powerpoint.png" class="img-thumbnail post-lecture-image">';
					}

					else if($extension=='7z')
					{
						$footer=$footer . '<div><a><img src="views/res/7z.png" class="img-thumbnail post-lecture-image">';

					}

					else if($extension=='rar')
					{

						$footer=$footer . '<div><a><img src="views/res/rar.jpg" class="img-thumbnail post-lecture-image">';
																
					}	

					else if($extension=='swf')
					{

						$footer=$footer . '<div><a><img src="views/res/swf.jpg" class="img-thumbnail post-lecture-image">';
					}

					else if($extension=='zip')
					{
						$footer=$footer . '<div><a><img src="views/res/zip.jpg" class="img-thumbnail post-lecture-image">';
					}

					else
					{
						$footer=$footer . '<div><a><img src="'.$passer['file_path'].$passer['file_name'].'" class="img-thumbnail post-lecture-image">';
					}

					$footer=$footer . '<p class="pull-right"><span class="glyphicon glyphicon-paperclip"></span>'.$display['file_name'].'</p>
										<input name="file_name" value="'.$passer['file_name'].'" type="hidden"/>
										<button class=" btn btn-primary" type="submit">Download File <span class="glyphicon glyphicon-save"></span></button>
										</a></div>	
										</form>
										</div>';
														
				}
				else
				{	
													
					$footer='<div class="panel-footer"><span class="glyphicon glyphicon-fire"></span><span class="glyphicon glyphicon-tags pull-right"></span></div>';
														
				}
														

				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];
				$passer['level_description']=$display['level_description'];
				$passer['display_footer']=$footer;
				if($first) 
				{
					echo json_encode($passer);
						 $first = false;
				}		 
				else 
				{
					echo ',' . json_encode($passer);
				}
			}
			echo "],\"success\": [".json_encode("Message Posted")."],\"category\": [".json_encode($_SESSION['clicked_section'])."]}";
}

function clean($str)
{
		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		
		$str = @trim($str);
		if(get_magic_quotes_gpc())
			{
				$str = stripslashes($str);
			}
		return mysqli_real_escape_string($cxn,$str);
}

 function get_time_difference_php($created_time)
 {
        date_default_timezone_set('Asia/Manila'); //Change as per your default time
        $str = strtotime($created_time);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return intval($time_differnce/$years)." years ago";
        }else if(intval($time_differnce/$years) > 0)
        {
            return intval($time_differnce/$years)." year ago";
        }else if(intval($time_differnce/$months) > 1)
        {
            return intval($time_differnce/$months)." months ago";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return intval(($time_differnce/$months))." month ago";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return intval(($time_differnce/$days))." days ago";
        }else if (intval(($time_differnce/$days)) > 0) 
        {
            return intval(($time_differnce/$days))." day ago";
        }else if (intval(($time_differnce/$hours)) > 1) 
        {
            return intval(($time_differnce/$hours))." hours ago";
        }else if (intval(($time_differnce/$hours)) > 0) 
        {
            return intval(($time_differnce/$hours))." hour ago";
        }else if (intval(($time_differnce/$minutes)) > 1) 
        {
            return intval(($time_differnce/$minutes))." minutes ago";
        }else if (intval(($time_differnce/$minutes)) > 0) 
        {
            return intval(($time_differnce/$minutes))." minute ago";
        }else if (intval(($time_differnce)) > 1) 
        {
            return intval(($time_differnce))." seconds ago";
        }else
        {
            return "few seconds ago";
        }
  }

?>