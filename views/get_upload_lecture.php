
<?php 
	session_start();

	

	if( isset($_FILES) and isset($_GET['captionsubject']) )
	{
		/*echo "{\"files\": [" .json_encode($_FILES). ", " .json_encode($_GET['captionsubject']). "]}";*/

		$caption=clean($_GET['captionsubject']);

		postBySubject($caption);   
				
	
	}

	if( isset($_FILES) and isset($_GET['captiongrade']) )
	{
		
		$caption=clean($_GET['captiongrade']);

		postByGrade($caption);


	}
	
	if( isset($_FILES) and isset($_GET['captionsection']) )
	{
		
		$caption=clean($_GET['captionsection']);

		postBySection($caption);


	}	

function postBySubject($caption)
{
			if(!empty($caption))
			{
				$result=lecture_uploaded($caption);

				if(isset($result['success']) || array_key_exists('success', $result))
				{

					$upload_date= date("Y-m-d H:i:s"); 
							

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

							 
							 $sql="INSERT INTO announcement_lecture VALUES('".$upload_date."','".$caption."','model/uploaded_files/','".$result['file_name']."')";
		                        
							    $announcement_lecture_inserted= mysqli_query($cxn,$sql);
							    
							    if($announcement_lecture_inserted)
							    {
							        $query="Select class_rec_no from section where teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."'";

							        $fetch_class_rec= mysqli_query($cxn,$query);


							         	while($each_rec = mysqli_fetch_array($fetch_class_rec))
								        {
								            
								            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$upload_date."')";

								            $insert_done=mysqli_query($cxn,$insert);
								        }

								     clickedBySubject($result['success']);   
							    }    
					
					
				}

				else if(isset($result['error']) || array_key_exists('error', $result))
				{
					echo json_encode($result);
				}	

			}	
}

function postByGrade($caption)
{
			if(!empty($caption))
			{
				$result=lecture_uploaded($caption);

				if(isset($result['success']) || array_key_exists('success', $result))
				{

					$upload_date= date("Y-m-d H:i:s"); 
							

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

							 
							 $sql="INSERT INTO announcement_lecture VALUES('".$upload_date."','".$caption."','model/uploaded_files/','".$result['file_name']."')";
		                        
							    $announcement_lecture_inserted= mysqli_query($cxn,$sql);
							    
							    if($announcement_lecture_inserted)
							    {
							        $query="Select class_rec_no from section where teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."'";

							        $fetch_class_rec= mysqli_query($cxn,$query);


							         	while($each_rec = mysqli_fetch_array($fetch_class_rec))
								        {
								            
								            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$upload_date."')";

								            $insert_done=mysqli_query($cxn,$insert);
								        }

								     clickedByGrade($result['success']);   
							    }    
					
					
				}

				else if(isset($result['error']) || array_key_exists('error', $result))
				{
					echo json_encode($result);
				}	
			}
}


function postBySection($caption)
{
			if(!empty($caption))
			{
				$result=lecture_uploaded($caption);

				if(isset($result['success']) || array_key_exists('success', $result))
				{

					$upload_date= date("Y-m-d H:i:s"); 
							

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

							 
							 $sql="INSERT INTO announcement_lecture VALUES('".$upload_date."','".$caption."','model/uploaded_files/','".$result['file_name']."')";
		                        
							    $announcement_lecture_inserted= mysqli_query($cxn,$sql);
							    
							    if($announcement_lecture_inserted)
							    {
							        $query="Select class_rec_no from section where teacherID = '".$_SESSION['account_id']."' and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section.section_name='".$_SESSION['clicked_section']."'";

							        $fetch_class_rec= mysqli_query($cxn,$query);


							         	while($each_rec = mysqli_fetch_array($fetch_class_rec))
								        {
								            
								            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$upload_date."')";

								            $insert_done=mysqli_query($cxn,$insert);
								        }

								     clickedBySection($result['success']);   
							    }    
					
					
				}

				else if(isset($result['error']) || array_key_exists('error', $result))
				{
					echo json_encode($result);
				}	
			}
}






function lecture_uploaded($caption)
{
	
		$data = array();


				$name = $_FILES['upload_lecture_ajax']['name'];
				$tmp_name = $_FILES['upload_lecture_ajax']['tmp_name'];
				/*$upload_error = $_FILES['upload_lecture']['error'];*/
				$allowedextension = array('gif', 'jpeg', 'jpg','png',
									  'doc','docx','docm','docb','pdf','dotm','dotx',
									  'xls','xlsx','xlsm','xltx','xltm','xlsb',
									  'ppt','pptx','pptm','potx','potm','ppam','ppsx','ppsm','sldx','sldm',
									  '7z','rar','swf','zip');


				$temp = explode(".",$name);
				$nameoffile = $temp[0];
				$extension = end($temp);

				if(in_array($extension,$allowedextension))
				{
					
						$location = "../model/uploaded_files/";

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

						$sql="SELECT messageorfile_caption, file_path, file_name FROM announcement_lecture 
						where messageorfile_caption = '".$caption."' and file_name = '".$name."'";

        				$result=mysqli_query($cxn,$sql);

        				$file_exists = mysqli_num_rows($result);


						if($file_exists > 0)
						{
							$data = array('error' => 'File already exist');
						} 
						else
						{
							
							if(move_uploaded_file($tmp_name,$location.$name))
							{
								/*$files[] = $location.$name;*/
								$data=array('success' => 'Lecture File Saved','file_name' => $name);
							}
							else
							{
								$data = array('error'=>'There was an error uploading your files');
							}	
						}	
						
					
						
				}
				else
				{
					$data = array('error'=>'Invalid file extension');
				}

				return $data;
}	



function clickedBySubject($success_message)
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		    
		    $subject_sql="Select subjectID from subject_ where subject_title='".$_SESSION['clicked_subject']."'";
			$subject_result=mysqli_query($cxn,$subject_sql);
			$subject_row = mysqli_fetch_row($subject_result);
			$_SESSION['subjectID'] = $subject_row[0];

			$subject_join="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
	        section.sectionNo, section.section_name, subject_.subject_title, grade_level.level_description 
	        from subject_ inner join section on subject_.subjectID=section.subjectID 
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
			echo "],\"success\": [".json_encode($success_message)."]}";	
}

function clickedByGrade($success_message)
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

			$grade_sql="Select levelID from grade_level where level_description='".$_SESSION['clicked_grade']."'";
			$grade_result=mysqli_query($cxn,$grade_sql);
			$grade_row = mysqli_fetch_row($grade_result);
			$_SESSION['levelID'] = $grade_row[0];

			$grade_join="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
	        section.sectionNo, section.section_name, subject_.subject_title, grade_level.level_description 
	        from subject_ inner join section on subject_.subjectID=section.subjectID 
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
			
			echo "],\"success\": [".json_encode($success_message)."]}";	

}

function clickedBySection($success_message)
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
			
			$section_join="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
	        section.sectionNo, section.section_name, subject_.subject_title, grade_level.level_description 
	        from subject_ inner join section on subject_.subjectID=section.subjectID 
	        inner join grade_level on section.levelID=grade_level.levelID 
	        inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
	        inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created 
			where section.teacherID = '".$_SESSION['account_id']."' 
			and section.subjectID='".$_SESSION['subjectID']."' and section.levelID='".$_SESSION['levelID']."' and section.section_name='".$_SESSION['clicked_section']."' order by date_created desc";		


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
			echo "],\"success\": [".json_encode($success_message)."]}";
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