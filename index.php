<!--@author Darryl-->
  <!--@copyright 2014-->
<?php

session_start();

if(!isset($_GET['r']))
{
	login();
}


else
{
	switch($_GET['r'])
	{	
		case 'lss':
				if((!isset($_SESSION['username']))&&(!isset($_SESSION['user_type'])))
				{
					login();
				}
				else
				{
					switch($_SESSION['user_type'])
					{
						case 'admin':if(!isset($GET['an']))
										{
											admin();break;
										}
										
										break;
						case 'teacher': 
										if(!isset($_GET['tr']))
										{
											tpage();break;
										}
										else{
											switch($_GET['tr'])
											{
											
												case 'trp':tpage_progress();break;
												case 'tre':tpage_encode();break;
												case 'ce':createexer(); break;
												case 's':t_spage_progress();break;
												/*case 'testing':Teacher_testing();break;	*/
											}
										}
										break;
						case 'student': 
										if(!isset($_GET['st']))
										{
											spage();break;
										}
										else{
											switch($_GET['st'])
											{
												case 'stp':spage_progress();break;
												case 'sep':spage_exercise();break;
											}
										}
										break;
						case 'parent': 
										if(!isset($_GET['pt']))
										{
											ppage();break;
										}
										else{
											switch($_GET['pt'])
											{
											
											}
										}
										break;
						
										
					}
					
				}
				break;

		case 'xt':logout();break;								
/*		case 'testing':testing();break;*/


				default: header("Location: index.php");
			}
		}
/*function testing()
{

	include "views/TESTING/Admin_Page.php";
}

function Teacher_testing()
{
	include "views/Testing.html";
}*/

function login()
{
		
	$username=$password=$user_type=$user_pass="";
    
include "model/login_model.php";
include "model/utility.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

		$username = clean($_POST['user']);
		$password = clean($_POST['pass']);
       
	   if (!empty($username)AND!empty($password))
	   {
		  $present=get_user($username);
		  $num_rows = mysqli_num_rows($present);
          
             if ($num_rows==0)
                { 
                    echo "<script>alert('username doesnt exist!')</script>";
                }
                 else
                {
                   while ($row = mysqli_fetch_array ($present))
		              {
			             $user_pass = $row ['password_'];
						 $user_type = $row ['user_type'];
						 $account_id= $row ['account_id'];
	                  }
		                  if ($password==$user_pass)
                            {
					           $_SESSION['username'] = $username;
							   $_SESSION['user_type'] = $user_type;
							   $_SESSION['account_id'] = $account_id;
							   
									$profile=get_profile($_SESSION['account_id']);
									 $fetch_profile=mysqli_fetch_array($profile);
									 
										$_SESSION['reg_lname']=$fetch_profile['reg_lname'];
										$_SESSION['reg_fname']=$fetch_profile['reg_fname'];
										$_SESSION['profile_pic']=$fetch_profile['image'];
							
					           header("Location: index.php?r=lss&ss");
					           exit();
				            }
                            else
                            {
				                echo"<script>alert('Incorrect Password')</script>";
								
                            }
                }

			
        }  
        else
	   { 
		echo "<script>alert('Please enter username and password')</script>";
	   }
	
		
}

	include "views/HomePage.php";
}

function admin()
{
	include "model/administrator.php";

	$adminlist=array();
	$teacherlist=array();
	$studentlist=array();
	$subjectlist=array();
	$sectionlist=array();
	$gradelevellist=array();
	$announcement_lecturelist=array();
	$edit_admin=array();
	
	if($_SERVER['REQUEST_METHOD']=='GET')
	{

		if (isset($_GET['ap']))
		{
			$fetch=get_alladmin();
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['reg_id']=$row['reg_id'];
				$pass['reg_lname']=$row['reg_lname'];
				$pass['reg_fname']=$row['reg_fname'];
				$pass['reg_mname']=$row['reg_mname'];
				$pass['reg_gender']=$row['reg_gender'];
				$pass['reg_status']=$row['reg_status'];
				$pass['reg_birthday']=$row['reg_birthday'];
				$pass['reg_address']=$row['reg_address'];
				$pass['image']=$row['image'];
				$adminlist[]=$pass;
			}

		}	

		if (isset($_GET['tp']))
		{
			$fetch=get_allteacher();
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['reg_id']=$row['reg_id'];
				$pass['reg_lname']=$row['reg_lname'];
				$pass['reg_fname']=$row['reg_fname'];
				$pass['reg_mname']=$row['reg_mname'];
				$pass['reg_gender']=$row['reg_gender'];
				$pass['reg_status']=$row['reg_status'];
				$pass['reg_birthday']=$row['reg_birthday'];
				$pass['reg_address']=$row['reg_address'];
				$pass['t_position']=$row['t_position'];
				$pass['image']=$row['image'];

				$teacherlist[]=$pass;
			}

		}	

		if(isset($_GET['sp']))
		{
			$fetch=get_allstudent();
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['reg_id']=$row[0];
				$pass['reg_lname']=$row[1];
				$pass['reg_fname']=$row[2];
				$pass['reg_mname']=$row[3];
				$pass['reg_gender']=$row[4];
				$pass['reg_status']=$row[5];
				$pass['reg_birthday']=$row[6];
				$pass['reg_address']=$row[7];
				$pass['image']=$row[8];
				$pass['p_reg_lname']=$row[9];
				$pass['p_reg_fname']=$row[10];
				$pass['p_reg_mname']=$row[11];

				$studentlist[]=$pass;
			}
		}	

		if(isset($_GET['sbs']))
		{
			$fetch=get_allsubject();
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['subjectID']=$row[0];
				$pass['subject_title']=$row[1];
				

				$subjectlist[]=$pass;
			}
		}	

		if(isset($_GET['scs']))
		{
			$fetch=get_allsection();
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['sectionID']=$row[0];
				$pass['sectionNo']=$row[1];
				$pass['section_name']=$row[2];
				

				$sectionlist[]=$pass;
			}
		}	

		if(isset($_GET['gl']))
		{
			$fetch=get_allgradelevel();
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['levelID']=$row[0];
				$pass['level_description']=$row[1];
				

				$gradelevellist[]=$pass;
			}
		}	

		if(isset($_GET['ps']))
		{
			$fetch = get_allannouncement_lecture(); 
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['date_created']=$row[0];
				$pass['messageorfile_caption']=$row[1];
				$pass['file_path']=$row[2];
				$pass['file_name']=$row[3];
				$pass['sectionNo']=$row[4];
				$pass['section_name']=$row[5];

				$announcement_lecturelist[]=$pass;
			}


		}
		
	}//End of Get

/*	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		include "model/utility.php";

				$id = $_POST['edadmid'];
				$reg_lname = clean($_POST['edadmlname']);
				$reg_fname = clean($_POST['edadmfname']);
				$reg_mname = clean($_POST['edadmmname']);
				$reg_gender = clean($_POST['edadmgender']);
				$reg_status = clean($_POST['edadmstatus']);
			
				$reg_address = clean($_POST['edadmaddress']);

				if( !empty($reg_lname) and !empty($reg_fname) )
				{
				
						$image=admin_img();

						if(!empty($image))
						{
							$successful = update_administrator_with_image($id, $reg_lname, $reg_fname, $reg_mname, $reg_gender, $reg_status, $reg_address, $image);
							if($successful)
							{
								header("Location:index.php?r=lss&ap");
							}
						}	
						else
						{
							$successful = update_administrator($id, $reg_lname, $reg_fname, $reg_mname, $reg_gender, $reg_status, $reg_address);
							if($successful)
							{
								header("Location:index.php?r=lss&ap");
							}						
						}	

					
				}			

	}//End of Post*/	

	include "views/admin.php";
}

function tpage()
{

		include "model/teacher_load.php";
		include "model/announcement_lecture.php";
		include "model/utility.php";


	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		
			if(isset($_POST['message']))
		    {
		   	
				$message=clean($_POST['message']);
				if(!empty($message))
				{
				
					$message_date_created= date("Y-m-d H:i:s");  
						
					write_announcement_to_all_subjects($_SESSION['account_id'],$message_date_created,$message);

					header("Location: index.php?r=lss&w");
				}

			}
			
			if(isset($_POST['lecture-caption']))
		   	{
				$file_caption=clean($_POST['lecture-caption']);
					
				
				if(!empty($file_caption))
				{
					$filename=lecture_uploaded($file_caption);
					
					if(!empty($filename))
					{
						
						$upload_date= date("Y-m-d H:i:s"); 
					
						upload_lecture_to_all_subjects($_SESSION['account_id'],$upload_date,$file_caption,'model/uploaded_files/',$filename);

						header("Location:index.php?r=lss&l");
					}

				}	
			}
			
			if(isset($_POST['file_name']))
			{
				$file = $_POST['file_name'];
				$path = 'model/uploaded_files/'.$file;

				if(!is_file($path))
				{
					//echo "<script>alert('File not found.('".$path."')')</script>";
					header("Location:index.php?r=lss&fnf");
				}
				elseif (is_dir($path))
				{
					//echo "<script>alert('Cannot download folder')</script>";
					header("Location:index.php?r=lss&dnf");
				}
				else
				{
					$mime=get_mime($file);
					
					send_download($path,$mime);
				}

				
			}
			
		}
		
		$_SESSION['TeacherLoad']=array();
		
		$subjects=get_subjectByTeacherID($_SESSION['account_id']);
	
		while($travsubjects = mysqli_fetch_array($subjects))
		{
			
			$subjectIdPasser=array();
		
			$subjectIdPasser['subjectID']=$travsubjects['subjectID'];
			
			$subject_title = $travsubjects['subject_title'];
					
			$_SESSION['TeacherLoad'][$subject_title ]=null;
			
	
					$grades=get_gradeByTeacherIDSubjectID($_SESSION['account_id'],$subjectIdPasser['subjectID']);
								
						while($travgrades = mysqli_fetch_array($grades))
						{
							$levelIdPasser=array();
							
							$levelIdPasser['levelID']=$travgrades['levelID'];
							
							$level_description=$travgrades ['level_description'];
												
								$_SESSION['TeacherLoad'][$subject_title][$level_description]=null;
							
								
									$section=get_sectionByTeacherIDSubjectIDLevelID($_SESSION['account_id'],$subjectIdPasser['subjectID'],$levelIdPasser['levelID']);
											
											while($travsectionNo=mysqli_fetch_array($section))
											{
											
												$sectionNo=$travsectionNo['sectionNo'];
												$sectionName=$travsectionNo['section_name'];
												
												$_SESSION['TeacherLoad'][$subject_title][$level_description][$sectionNo][$sectionName]=null;
									
											
												
											}
					
						}
						
			
		
					

	
		}


		$display_box=array();
		$announce_lecture=get_announcement_lecture_to_all_subjects($_SESSION['account_id']);
		
		while($display = mysqli_fetch_array($announce_lecture))
		{


				$passer=array();

				$passer['date_created']=$display['date_created'];
				$passer['timespan']=get_time_difference_php($passer['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
				$passer['file_path']=$display['file_path'];
				$passer['file_name']=$display['file_name'];
				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];
				$passer['level_description']=$display['level_description'];

				$display_box[]=$passer;
				
		}

	include "views/Teachers_Page.php";	
	
}


function lecture_uploaded($caption)
{
	$name = $_FILES['upload_lecture']['name'];
	$tmp_name = $_FILES['upload_lecture']['tmp_name'];
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
		if($_FILES['upload_lecture']['error']>0)
		{
			//echo "<script>alert('".$_FILES['upload_lecture']['error']."')</script>";
			header("Location:index.php?r=lss&ex");
		}
		else
		{
			include "config/conn.php";
			
			$sql="SELECT messageorfile_caption, file_path, file_name FROM announcement_lecture 
			where messageorfile_caption = '".$caption."' and file_name = '".$name."'";

			$result=mysqli_query($cxn,$sql);

			$file_exists = mysqli_num_rows($result);


			if($file_exists > 0)
			{
				//echo "<script>alert('File already exist')</script>";
				header("Location:index.php?r=lss&fe");
			} 
			else
			{
				$location = "model/uploaded_files/";
				if(move_uploaded_file($tmp_name,$location.$name))
				{
					return $name;
				}

				return $name;
			}
		}
	}
	else
	{
		//echo "<script>alert('invalid file')</script>";
		header("Location:index.php?r=lss&if");
	}
}	


function get_mime ($filename)
{
	$mime;
	$temp = explode(".",$filename);
	$nameoffile = $temp[0];
	$extension = end($temp);

	switch($extension)
	{

		case 'doc':$mime='application/msword';break;
		case 'pdf':$mime='application/pdf';break;
		case 'xls':$mime='application/vnd.ms-excel';break;
		case 'xlsb':$mime='application/vnd.ms-excel.addin.macroenabled.12';break;
		case 'xlsm':$mime='application/vnd.ms-excel.sheet.macroenabled.12';break;
		case 'xltm':$mime='application/vnd.ms-excel.template.macroenabled.12';break;
		case 'ppt':$mime='application/vnd.ms-powerpoint';break;
		case 'ppam':$mime='application/vnd.ms-powerpoint.addin.macroenabled.12';break;
		case 'pptm':$mime='application/vnd.ms-powerpoint.presentation.macroenabled.12';break;
		case 'sldm':$mime='application/vnd.ms-powerpoint.slide.macroenabled.12';break;
		case 'ppsm':$mime='application/vnd.ms-powerpoint.slideshow.macroenabled.12';break;
		case 'potm':$mime='application/vnd.ms-powerpoint.template.macroenabled.12';break;
		case 'docm':$mime='application/vnd.ms-word.document.macroenabled.12';break;
		case 'dotm':$mime='application/vnd.ms-word.template.macroenabled.12';break;
		case 'pptx':$mime='application/vnd.openxmlformats-officedocument.presentationml.presentation';break;
		case 'sldx':$mime='application/vnd.openxmlformats-officedocument.presentationml.slide';break;
		case 'ppsx':$mime='application/vnd.openxmlformats-officedocument.presentationml.slideshow';break;
		case 'potx':$mime='application/vnd.openxmlformats-officedocument.presentationml.template';break;
		case 'xlsx':$mime='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';break;		
		case 'xltx':$mime='application/vnd.openxmlformats-officedocument.spreadsheetml.template';break;
		case 'docx':$mime='application/vnd.openxmlformats-officedocument.wordprocessingml.document';break;
		case 'dotx':$mime='application/vnd.openxmlformats-officedocument.wordprocessingml.template';break;
		case '7z':$mime='application/x-7z-compressed';break;
		case 'swf':$mime='application/x-shockwave-flash';break;
		case 'zip':$mime='application/zip';break;
		case 'jpeg':
		case 'jpg':$mime='image/jpeg';break;
		case 'gif':$mime='image/gif';break;
		case 'png':$mime='image/png';break;
		
	}

	return $mime;
}

function send_download($file,$mime)
{
    $basename = basename($file);
    $length   = sprintf("%u", filesize($file));

    header('Content-Description: File Transfer');
    header('Content-Type: '.$mime.'');
    header('Content-Disposition: attachment; filename="' . $basename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . $length);

    ob_end_clean();
	flush();
    set_time_limit(0);
    readfile($file);


}



function tpage_progress()
{
	include "model/students.php";

	$display_students=array();

	$students=get_students($_SESSION['account_id']);

	while($display = mysqli_fetch_array($students))
	{
					$passer=array();
						
					$passer['student_lrn']=$display['student_lrn'];
					$passer['reg_lname']=$display['reg_lname'];
					$passer['reg_fname']=$display['reg_fname'];
					$passer['reg_mname']=$display['reg_mname'];
					$passer['image']=$display['image'];
					
					$display_students[]=$passer;
	}

	include "views/Teachers_Page_Progress.php";		
	
}

function t_spage_progress()
{
	include "views/Teacher_Student_Page_Progress.php";
}

function tpage_encode()
{
	include "views/Teachers_Page_Encoding.php";
}

function spage()
{
	include "model/student_schedule_line.php";
	include "model/announcement_lecture.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{

			if(isset($_POST['student_file_name']))
			{
				$file = $_POST['student_file_name'];
				$path = 'model/uploaded_files/'.$file;

				if(!is_file($path))
				{
					//echo "<script>alert('File not found.('".$path."')')</script>";
					header("Location:index.php?r=lss&fnf");
				}
				elseif (is_dir($path))
				{
					//echo "<script>alert('Cannot download folder')</script>";
					header("Location:index.php?r=lss&dnf");
				}
				else
				{
					$mime=get_mime($file);
					
					send_download($path,$mime);
				}

				
			}

		}	


		$_SESSION['Student_Schedule_Line']=array();
		
		$subjects=get_subjectByStudentID($_SESSION['account_id']);
	
		while($travsubjects = mysqli_fetch_array($subjects))
		{
			
			$subjectIdPasser=array();
		
			$subjectIdPasser['subjectID']=$travsubjects['subjectID'];
			
			$subject_title = $travsubjects['subject_title'];
					
			$_SESSION['Student_Schedule_Line'][$subject_title ]=null;
			
	
					$grades=get_gradeByStudentIDSubjectID($_SESSION['account_id'],$subjectIdPasser['subjectID']);
								
						while($travgrades = mysqli_fetch_array($grades))
						{
							$levelIdPasser=array();
							
							$levelIdPasser['levelID']=$travgrades['levelID'];
							
							$level_description=$travgrades ['level_description'];
												
								$_SESSION['Student_Schedule_Line'][$subject_title][$level_description]=null;
							
								
									$section=get_sectionByStudentIDSubjectIDLevelID($_SESSION['account_id'],$subjectIdPasser['subjectID'],$levelIdPasser['levelID']);
											
											while($travsectionNo=mysqli_fetch_array($section))
											{
											
												$sectionNo=$travsectionNo['sectionNo'];
												$sectionName=$travsectionNo['section_name'];
												
												$_SESSION['Student_Schedule_Line'][$subject_title][$level_description][$sectionNo][$sectionName]=null;
									
											
												
											}
					
						}
						
			
		
					

	
		}

		
		$display_box=array();
		$announce_lecture=post_announcement_lecture_to_all_students($_SESSION['account_id']);
		
		while($display = mysqli_fetch_array($announce_lecture))
		{


				$passer=array();

				$passer['date_created']=$display['date_created'];
				$passer['timespan']=get_time_difference_php($passer['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
				$passer['file_path']=$display['file_path'];
				$passer['file_name']=$display['file_name'];
				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];
				$passer['level_description']=$display['level_description'];
				$passer['teacher']=$display['reg_fname'] . " " . $display['reg_lname']; 
				$passer['image']=$display['image']; 

				$display_box[]=$passer;
				
		}

	include "views/Student_Page.php";
}

function spage_progress()
{

	include "views/Student_Page_Progress.php";

}

function spage_exercise()
{
	include "model/online_exercise.php";

	$all_exercises=array();

	$result=get_all_student_exercise();


		while($travexercises = mysqli_fetch_array($result))
		{
			$passer=array();
			$eidHolder=array();

			$passer['sectionNo']=$travexercises['sectionNo'];
			$passer['section_name']=$travexercises['section_name'];
			$passer['typeID']=$travexercises['typeID'];
			$passer['exerciseName']=$travexercises['exerciseName'];
			$passer['date_created']=$travexercises['date_created'];

			$exerciseID=$travexercises['exerciseID'];

			$eidHolder[$exerciseID]=null;
				
			/*$questions=get_all_student_exercise_questions($exerciseID);*/

			/*while($travquestions = mysqli_fetch_array($questions))
			{
				$qidHolder=array();

				$questionNo=$travquestions['questionNo'];

				$qidHolder[$questionNo]=null;

				$choices=get_all_student_exercise_choices($questionNo);*/

			/*	while($travquestions=mysqli_fetch_array($choices))
				{
					$cidHolder=array();

					$oe_choices=$travquestions['oe_choices'];

					$cidHolder[$oe_choices]=null;

					$qidHolder[$questionNo]['choices']=$cidHolder;
				}*/

				/*$eidHolder[$exerciseID]['questionNo'][]=$qidHolder;

				$eidHolder[$exerciseID]['oe_question'][]=$travquestions['oe_question'];*/
			/*}*/

				$passer['exerciseID']=$eidHolder;

				$all_exercises[]=$passer;	

		}

	include "views/Student_Exercise_Page.php";
}

function ppage()
{

	include "views/Parent_Page.php";
}

function createexer()
{

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			
			if(isset($_GET['cc']))
			{
			
				switch($_GET['cc'])
				{
					case 'mic':multiplechoice();
								break;
					case 'te':trueorfalse();
								break;
					case 'me':matchingtype();
								break;
					case 'fs';fillintheblanks();
								break;
					default:
					break;
				
				}
				
			}
			
			
		
			
		}
	
	include "views/CreateExercise.php";
	
}

function multiplechoice()
{
	
	include "model/online_exercise.php";
		
		if(!isset($_SESSION['question_no']))
		{
			$_SESSION['question_no']=1;
		}
		
		$_SESSION['question_no']++;
		
		$question=$answer=$exerciseName="";
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$insert_success;
		$exerciseName=$_POST['exerciseName'];
		
		
		
		if(isset($_GET['n']))
		{
			
			if(!isset($_SESSION['exerciseName']) or empty($_SESSION['exerciseName']))
			{
				$_SESSION['exerciseName']=$exerciseName;
			}
			
			if(!isset($_SESSION['question_date_created']) or empty($_SESSION['question_date_created']))
			{
				$_SESSION['question_date_created']= date("Y-m-d H:i:s");  
				
			}
			
			
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
				
				
				
				header("Location:index.php?r=lss&tr=ce&cc=mic&nq");
				exit;
			
	
		}							
		
		if(isset($_GET['x']))
		{
		
			$questions_discarded=discard_questions($_SESSION['question_date_created']);
			if(!$questions_discarded)
			{
				//
			}
			$_SESSION['questionNo']=null;
			$_SESSION['question_date_created']=null;
			$_SESSION['exerciseName']=null;
			$_SESSION['question_no']=null;
			$_SESSION['question_no']=1;
			header("Location:index.php?r=lss&tr=ce&rm");
			exit;
			
		}
		
		if(isset($_GET['s']))
		{	
		
		if(!empty($question))
		{
				
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
			
		}
		
				$_SESSION['date_created']= date("Y-m-d H:i:s"); 
				
				$multi_id=create_exercise($_SESSION['exerciseName'],'multi',$_SESSION['date_created'],$_SESSION['question_date_created']);
				
				post_ol_exercise_to_all($multi_id);
				
				
				$_SESSION['questionNo']=null;
				$_SESSION['question_date_created']=null;
				$_SESSION['date_created']=null;
				$_SESSION['exerciseName']=null;
				$_SESSION['question_no']=null;
				$_SESSION['question_no']=1;
				header("Location:index.php?r=lss&tr=ce&ms");
				exit;
			
		}
	
		
}

function trueorfalse()
{
	
	include "model/online_exercise.php";
		
		
		if(!isset($_SESSION['question_no']))
		{
			$_SESSION['question_no']=1;
		}
		
		$_SESSION['question_no']++;
		
		$question=$answer=$exerciseName="";
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$insert_success;
		$exerciseName=$_POST['exerciseName'];
		
		
		
		if(isset($_GET['n']))
		{
			
			if(!isset($_SESSION['exerciseName']) or empty($_SESSION['exerciseName']))
			{
				$_SESSION['exerciseName']=$exerciseName;
			}
			
			if(!isset($_SESSION['question_date_created']) or empty($_SESSION['question_date_created']))
			{
				$_SESSION['question_date_created']= date("Y-m-d H:i:s");  
				
			}
			
			
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
				
				header("Location:index.php?r=lss&tr=ce&cc=te&nq");
				exit;
				
		}							
		
		if(isset($_GET['x']))
		{
		
			$questions_discarded=discard_questions($_SESSION['question_date_created']);
			if(!$questions_discarded)
			{
				//
			}
			$_SESSION['questionNo']=null;
			$_SESSION['question_date_created']=null;
			$_SESSION['exerciseName']=null;
			$_SESSION['question_no']=null;
			$_SESSION['question_no']=1;
			header("Location:index.php?r=lss&tr=ce&rm");
			exit;
			
		}
		
		if(isset($_GET['s']))
		{	
		
		if(!empty($question))
		{
			
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
			
		}
		
				$_SESSION['date_created']= date("Y-m-d H:i:s"); 
				
				$true_id=create_exercise($_SESSION['exerciseName'],'true',$_SESSION['date_created'],$_SESSION['question_date_created']);
				
				post_ol_exercise_to_all($true_id);
				
				$_SESSION['questionNo']=null;
				$_SESSION['question_date_created']=null;
				$_SESSION['date_created']=null;
				$_SESSION['exerciseName']=null;
				$_SESSION['question_no']=null;
				$_SESSION['question_no']=1;
				header("Location:index.php?r=lss&tr=ce&ts");
				exit;
			
		}
	
		
}

function matchingtype()
{
	
	include "model/online_exercise.php";
		
		if(!isset($_SESSION['question_no']))
		{
			$_SESSION['question_no']=1;
		}
		
		$_SESSION['question_no']++;
		
		$question=$answer=$exerciseName="";
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$insert_success;
		$exerciseName=$_POST['exerciseName'];
		
		
		
		if(isset($_GET['n']))
		{
			
			if(!isset($_SESSION['exerciseName']) or empty($_SESSION['exerciseName']))
			{
				$_SESSION['exerciseName']=$exerciseName;
			}
			
			if(!isset($_SESSION['question_date_created']) or empty($_SESSION['question_date_created']))
			{
				$_SESSION['question_date_created']= date("Y-m-d H:i:s");  
				
			}
			
			
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
				
				header("Location:index.php?r=lss&tr=ce&cc=me&nq");

				exit;
			
	
		}							
		
		if(isset($_GET['x']))
		{
		
			$questions_discarded=discard_questions($_SESSION['question_date_created']);
			if(!$questions_discarded)
			{
				//
			}
			$_SESSION['questionNo']=null;
			$_SESSION['question_date_created']=null;
			$_SESSION['exerciseName']=null;
			$_SESSION['question_no']=null;
			$_SESSION['question_no']=1;
			header("Location:index.php?r=lss&tr=ce&rm");
			exit;
			
		}
		
		if(isset($_GET['s']))
		{	
		
		if(!empty($question))
		{
				
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
			
		}
		
				$_SESSION['date_created']= date("Y-m-d H:i:s"); 
				
				$mat_id=create_exercise($_SESSION['exerciseName'],'mat',$_SESSION['date_created'],$_SESSION['question_date_created']);
				
				post_ol_exercise_to_all($mat_id);
				
				$_SESSION['questionNo']=null;
				$_SESSION['question_date_created']=null;
				$_SESSION['date_created']=null;
				$_SESSION['exerciseName']=null;
				$_SESSION['question_no']=null;
				$_SESSION['question_no']=1;
				header("Location:index.php?r=lss&tr=ce&mts");
				exit;
			
		}
	
		
}

function fillintheblanks()
{
	
	include "model/online_exercise.php";
		
		if(!isset($_SESSION['question_no']))
		{
			$_SESSION['question_no']=1;
		}
		
		$_SESSION['question_no']++;
		
		$question=$answer=$exerciseName="";
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$insert_success;
		$exerciseName=$_POST['exerciseName'];
		
		
		
		if(isset($_GET['n']))
		{
			
			if(!isset($_SESSION['exerciseName']) or empty($_SESSION['exerciseName']))
			{
				$_SESSION['exerciseName']=$exerciseName;
			}
			
			if(!isset($_SESSION['questino_date_created']) or empty($_SESSION['question_date_created']))
			{
				$_SESSION['question_date_created']= date("Y-m-d H:i:s");  
				
			}
			
			
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
			
				header("Location:index.php?r=lss&tr=ce&cc=fs&nq");
				exit;
			
	
		}							
		
		if(isset($_GET['x']))
		{
		
			$questions_discarded=discard_questions($_SESSION['question_date_created']);
			if(!$questions_discarded)
			{
				//
			}
			$_SESSION['questionNo']=null;
			$_SESSION['question_date_created']=null;
			$_SESSION['exerciseName']=null;
			$_SESSION['question_no']=null;
			$_SESSION['question_no']=1;
			header("Location:index.php?r=lss&tr=ce&rm");
			exit;
			
		}
		
		if(isset($_GET['s']))
		{	
		
		if(!empty($question))
		{
			
				$_SESSION['questionNo']=create_questions($question,$answer,$_SESSION['question_date_created']);
		
				foreach($_POST['choices'] as $choices)
				{
				  $insert_success=create_choices( $_SESSION['questionNo'],$choices,$_SESSION['question_date_created']);
				}
				
				if(!$insert_success)
				{
					//
				}
			
		}
		
				$_SESSION['date_created']= date("Y-m-d H:i:s"); 
				
				$fill_id=create_exercise($_SESSION['exerciseName'],'fill',$_SESSION['date_created'],$_SESSION['question_date_created']);
				
				post_ol_exercise_to_all($fill_id);
				
				$_SESSION['questionNo']=null;
				$_SESSION['question_date_created']=null;
				$_SESSION['date_created']=null;
				$_SESSION['exerciseName']=null;
				$_SESSION['question_no']=null;
				$_SESSION['question_no']=1;
				header("Location:index.php?r=lss&tr=ce&fibs");
				exit;
			
		}
	
		
}

function logout()
{
	session_unset(); 
    session_destroy();
    header("Location:index.php?");
    
}

?>