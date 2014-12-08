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
						case 'admin':break;
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
		case 'testing':testing();break;


				default: header("Location: index.php");
			}
		}
function testing()
{

	include "views/TESTING/Admin_Page.php";
}
function login()
{
		
	$username=$password=$user_type=$user_pass="";
    
include "model/login_model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

		$username = $_POST['user'];
		$password = $_POST['pass'];
       
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
							   
									$profilename=get_profilename($_SESSION['account_id']);
									 $profilename=mysqli_fetch_array($profilename);
									 
										$_SESSION['reg_lname']=$profilename['reg_lname'];
										$_SESSION['reg_fname']=$profilename['reg_fname'];
							
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

function signup()
{

	include "views/Signup_Page.php";
}

function tpage()
{

include "model/announcement.php";
include "model/teacher_load.php";
include "model/insert_upload.php";
include "model/get_post.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		
		if(isset($_POST['message']))
		   {
		   	
				$message=$_POST['message'];
				if(!empty($message))
				{
					//$t_loadID = get_t_loadID($_SESSION['account_id']);
					//$row = mysqli_fetch_array($t_loadID);
					//$_SESSION['loadID'] = $row[0];
					
					$message_date_created= date("Y-m-d H:i:s");  
						
					$announcement_inserted=write_announcement($_SESSION['account_id'],'ECRN-79542',
																$message_date_created,$message);
					if($announcement_inserted)
					{
						//
					}
					header("Location: index.php?r=lss&w");
				}

			}
			
			if(isset($_POST['lecture-caption']))
		   	{
				$file_caption=$_POST['lecture-caption'];
					
				
				if(!empty($file_caption))
				{
					$filename=lecture_uploaded();
					
					if(!empty($filename))
					{
						
						$upload_date= date("Y-m-d H:i:s"); 
					

						$lecture_inserted=insert_upload($_SESSION['account_id'],'ECRN-79542',$upload_date,$file_caption,$filename);
					

						if($lecture_inserted)
						{
							//
						}
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
		//$display_message=array();
		$display_box=array();
		$post_message=get_announcement($_SESSION['account_id']);
		
		while($post = mysqli_fetch_array($post_message))
		{
			$passer=array();
			
			$passer['date_created']=$post['date_created'];
			$passer['timespan']=get_time_difference_php($passer['date_created']);
			$passer['message']=$post['message'];
			$passer['file_path']=null;
			$passer['file']=null;

			$display_box[]=$passer;
		
		}

		//$display_lecture_post=array();
		$post_lecture=get_upload($_SESSION['account_id']);

		while($post = mysqli_fetch_array($post_lecture))
		{
			$passer=array();

			$passer['date_created']=$post['date_created'];
			$passer['timespan']=get_time_difference_php($passer['date_created']);
			$passer['message']=$post['file_caption'];
			$passer['file_path']=$post['file_path'];
			$passer['file']=$post['file_name'];

			/*
			foreach($display_box as $display)
			{
				if($display['date_created']<$passer['date_created'])
				{

					insert_to_array($display, $passer, $display_box);
				}
			}	
			*/
			$display_box[]=$passer;


		}	



	include "views/Teachers_Page.php";	
	
}
/*
function insert_to_array(&$edit_array, $insert_array, &$main_array)
{
	$temp=array();
	$temp_remaining=array();
	$temp[]=$edit_array;

	$readyToInsert;
	foreach($main_array as $displayBox)
	{
		if(empty($displayBox))
		{
			$readyToInsert=true;
			continue;
		}

		if($readyToInsert)
		{
			$temp_remaining[]=$displayBox;
		}
	}

	$edit_array['date_created']=$insert_array['date_created'];
	$edit_array['timespan']=$insert_array['timespan'];
	$edit_array['message']=$insert_array['message'];
	$edit_array['image']=$insert_array['image'];



}

*/
function lecture_uploaded()
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
			if(file_exists('model/uploaded_files/'.$name))
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
	include "views/Teachers_Page_Progress.php";
}

function tpage_encode()
{
	include "views/Teachers_Page_Encoding.php";
}

function spage()
{

	include "views/Student_Page.php";
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
				
				$multi_created=create_exercise($_SESSION['exerciseName'],'multi',$_SESSION['date_created'],$_SESSION['question_date_created']);
				if(!$multi_created)
				{
					//
				}
				
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
				
				$multi_created=create_exercise($_SESSION['exerciseName'],'multi',$_SESSION['date_created'],$_SESSION['question_date_created']);
				if(!$multi_created)
				{
					//
				}
				
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
				
				$multi_created=create_exercise($_SESSION['exerciseName'],'multi',$_SESSION['date_created'],$_SESSION['question_date_created']);
				if(!$multi_created)
				{
					//
				}
				
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
				
				$multi_created=create_exercise($_SESSION['exerciseName'],'multi',$_SESSION['date_created'],$_SESSION['question_date_created']);
				if(!$multi_created)
				{
					//
				}
				
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