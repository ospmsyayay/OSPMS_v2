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
						case 'Admin':if(!isset($GET['an']))
										{
											admin();break;
										}
										
										break;
						case 'Teacher': 
										if(!isset($_GET['tr']))
										{
											tpage();break;
										}
										else{
											switch($_GET['tr'])
											{
											
												case 'trp':tpage_progress();break;
												case 'tre':tpage_encode();break;
												case 'tres':tpage_encode_spreadsheet();break;
												/*case 'trce':tpage_createexer(); break;*/
												/*case 'trce':createexer();break;*/
												/*case 's':t_spage_progress();break;*/
												case 'acc':taccount_settings();break;
												/*case 'tprnt':tprint();break;*/
											}
										}
										break;
						case 'Student': 
										if(!isset($_GET['st']))
										{
											spage();break;
										}
										else{
											switch($_GET['st'])
											{
												case 'stp':spage_progress();break;
												/*case 'sep':spage_exercise();break;*/
												case 'acc':saccount_settings();break;
											}
										}
										break;
						case 'Parent': 
										if(!isset($_GET['pt']))
										{
											ppage();break;
										}
										else{
											switch($_GET['pt'])
											{
												case 's':p_spage_progress();break;
												case 'acc':paccount_settings();break;
											}
										}
										break;
						
										
					}
					
				}
				break;

		case 'xt':logout();break;								


				default: header("Location: index.php");
			}
		}


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
                    /*echo "<script>alert('username doesnt exist!')</script>";*/
                    header("Location:index.php?r=lss&ue");
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
					           $_SESSION['password'] = $password;
							   $_SESSION['user_type'] = ucwords(strtolower($user_type));
							   $_SESSION['account_id'] = $account_id;
							   
									$profile=get_profile($_SESSION['account_id']);
									 $fetch_profile=mysqli_fetch_array($profile);
									 
										$_SESSION['reg_lname']=$fetch_profile['reg_lname'];
										$_SESSION['reg_fname']=$fetch_profile['reg_fname'];
										$_SESSION['profile_pic']=$fetch_profile['image'];
							
					           header("Location: index.php?r=lss&ss");
					          
				            }
                            else
                            {
				               /* echo"<script>alert('Incorrect Password')</script>";*/
				               header("Location:index.php?r=lss&ip");
								
                            }
                }

			
        }  
        else
	   { 
		/*echo "<script>alert('Please enter username and password')</script>";*/
		header("Location:index.php?r=lss&peup");
	   }
	
		
}
include "views/HomePage.php";	
}


function admin()
{
	/*include "model/administrator.php";

	$adminlist=array();
	$teacherlist=array();
	$studentlist=array();
	$subjectlist=array();
	$sectionlist=array();
	$gradelevellist=array();
	$announcement_lecturelist=array();
	$edit_admin=array();
	$user_accounts=array();
	
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
				$pass['reg_lname']=$row[6];
				$pass['reg_fname']=$row[7];
				$pass['reg_mname']=$row[8];

				$announcement_lecturelist[]=$pass;
			}


		}

		if(isset($_GET['ua']))
		{
			$fetch=get_allaccounts();
			while($row=mysqli_fetch_array($fetch))
			{
				$pass=array();
				$pass['username']=$row[0];
				$pass['password']=$row[1];
				$pass['secret_question']=$row[2];
				$pass['secret_answer']=$row[3];
				$pass['user_type']=$row[4];
				$pass['account_id']=$row[5];
				$pass['reg_fname']=$row[6];
				$pass['reg_lname']=$row[7];

				$user_accounts[]=$pass;
			}


		}
		
	}//End of Get*/


	include "views/admin.php";
}

function tpage()
{

		include "model/teacher_load.php";
		include "model/announcement_lecture.php";
		include "model/utility.php";


	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		
/*			if(isset($_POST['message']))
		    {
		   	
				$message=clean($_POST['message']);
				if(!empty($message))
				{
				
					$message_date_created= date("Y-m-d H:i:s");  
						
					write_announcement_to_all_subjects($_SESSION['account_id'],$message_date_created,$message);

					header("Location: index.php?r=lss&w");
				}

			}*/
			
/*			if(isset($_POST['lecture-caption']))
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
			}*/
			
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
		$sa_box=array();
		$sa_announcement=get_school_announcement();
		while($display = mysqli_fetch_array($sa_announcement))
		{
				$passer=array();

				$passer['sa_date_created']=convert_datetime_to_12hr($display['sa_date_created']);
				$passer['timespan']=get_time_difference_php($display['sa_date_created']);
				$passer['sa_message']=$display['sa_message'];
				
				$sa_box[]=$passer;

		}


		$_SESSION['school_year']=get_school_year();
		
		$_SESSION['TeacherLoad']=array();
		
		$teacherload=get_subjectsBySchoolYear($_SESSION['account_id'],$_SESSION['school_year']);
		while($travload = mysqli_fetch_array($teacherload))
		{
			$passer=array();

			$passer['class_rec_no']=$travload['class_rec_no'];
			$passer['level_description']=$travload['level_description'];
			$passer['sectionNo']=$travload['sectionNo'];
			$passer['section_name']=$travload['section_name'];
			$passer['subject_title']=$travload['subject_title'];
			$passer['sched_days']=$travload['sched_days'];
			$passer['sched_start_time']=convert_time_to_12hr($travload['sched_start_time']);
			$passer['sched_end_time']=convert_time_to_12hr($travload['sched_end_time']);

			$_SESSION['TeacherLoad'][]=$passer;
	
		}


		$display_box=array();
		$announce_lecture=get_announcement_lecture_to_all_subjects($_SESSION['account_id']);
		
		while($display = mysqli_fetch_array($announce_lecture))
		{


				$passer=array();

				$passer['date_created']=convert_datetime_to_12hr($display['date_created']);
				$passer['timespan']=get_time_difference_php($display['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
				$passer['file_path']=$display['file_path'];
				$passer['file_name']=$display['file_name'];
				$passer['level_description']=$display['level_description'];
				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];
				$passer['announcement_id']=$display['date_created'];

				$comments="";
                //select comments
				$select_comments=post_comments($display['date_created']);
				while($comment = mysqli_fetch_array($select_comments))
                {
                    $comments=$comments .   '<div class="row has-padding-top-5">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <img src="views/res/'.$comment['image'].'" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />
                                                    </div>

                                                    <div class="input-group col-md-11 col-md-offset-1">
                                                        <div class="comment"><a class="comment-author">'.$comment['reg_fname'].' '.$comment['reg_lname'].' </a>'.$comment['comment_message'].'
                                                        </div>
                                                        <div><small class="comment-timespan"><strong>'.convert_datetime_to_12hr($comment['comment_date_created']).'</strong></small></div>
                                                        <div><small class="comment-timespan">'.get_time_difference_php($comment['comment_date_created']).'</small></div>
                                                    </div>
                                                </div>
                                            </div><!--//row-->';
                }

                $passer['comments']=$comments;
                $passer['message_id']=createMessageId();


				

				$display_box[]=$passer;
				
		}

	include "views/Teachers_Page.php";	
	
}


function lecture_uploaded($caption)
{
	$name = $_FILES['upload_lecture']['name'];
	$tmp_name = $_FILES['upload_lecture']['tmp_name'];
	$allowedextension = array('gif', 'jpeg', 'jpg','JPG','png',
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
		case 'JPG':
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

/*function t_spage_progress()
{
	include "views/Teacher_Student_Page_Progress.php";
}*/


function tpage_encode()
{
/*	include 'model/students.php';
    include 'model/utility.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $grading_id=createGradingId();
        $student_lrn = $_POST['studentName'];*/
        /*$class_rec_no =$_POST['sectionName'];*/
   /*     $grading_period = $_POST['gradingPeriod'];
        $week_number = $_POST['weekNumber'];
        $knowledge = $_POST['knowledge'];
        $processskills = $_POST['processskills'];
        $understanding = $_POST['understanding'];
        $performanceproducts = $_POST['performanceproducts'];

        $tentativeGrade = ($knowledge * 0.15) + ($processskills * 0.25) + ($understanding * 0.30) + ($performanceproducts * 0.30);
        $legend=mark_proficiency($tentativeGrade);


      	$inserted=insert_student_rating($grading_id, $student_lrn, $class_rec_no, $grading_period, $week_number, 
								$knowledge, $processskills, $understanding, $performanceproducts, $tentativeGrade, $legend);


        if($inserted) {
            echo '<script>alert("Successfully uploaded student\'s grade.");</script>';
        } else {
            echo '<script>alert("Failed to upload student\'s grade.");</script>';
        }


    }*/

	include "views/Teachers_Page_Encoding.php";
}

function tpage_encode_spreadsheet()
{
	include "model/encoding.php";
	//Upload Spread Sheet

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    	$grading_period = $_POST['sheet-gradingPeriod'];
        $week_number = $_POST['sheet-weekNumber'];
        $class_rec_no =$_POST['sheet-sectionName'];

        //Initialize spreadsheet array
   		$spreadsheet=array();

		$result=excel_upload();
		
		if(isset($result['success']) || array_key_exists('success', $result))
		{
			$spreadsheet[]=$result['data'];

		}
		else if(isset($result['error']) || array_key_exists('error', $result))
		{
			switch($result['error'])
			{
				case 'ex':header("Location:index.php?r=lss&tr=tres&ex");break;
				case 'er':header("Location:index.php?r=lss&tr=tres&er");break;
				case 'if':header("Location:index.php?r=lss&tr=tres&if");break;
			}
		}

		$sheet_result_gather=array();

		$sheet_subject_flag=array();
		$sheet_gender_flag=array();
		$sheet_average_flag=array();
		$tester=array();

		$validsubjects=array();

		//get valid subjects
		$valid_subjects=get_validsubjects();
		while($listofsubjects = mysqli_fetch_array($valid_subjects))
		{
			$passer=array();
			$passer['subjectID']=$listofsubjects['subjectID'];
			$passer['subject_title']=$listofsubjects['subject_title'];
			$validsubjects[]=$passer;

		}

		//process spreadsheet

		//Find Subject ,Gender and Average Flags in spreadsheet 
		foreach ($spreadsheet as $singlesheet) 
		{
			foreach ($singlesheet as $sheetNo => $row) 
		    { 
		        foreach($row as $rowNo => $rowArray)
		        {
		         
		            foreach($rowArray as $col => $values)
		            {
		            	//Load valid subjects to compare
				            
		             	foreach($validsubjects as $subject_row)
		             	{
		             		
	             			$newsubject=preg_replace('/\s+/','',$subject_row['subject_title']);
					 		$newsubject_length=strlen($newsubject);
					 		$newvalue=substr(preg_replace('/\s+/','', $values), 0 , $newsubject_length);
					 		$validsubject=strcasecmp($newsubject, $newvalue);


		             		//If scanned subject matched with database subjects
			                if($validsubject == 0)
	             			{
	             				//Save the subject to array
		    					$subject=array('sheetNo'=>$sheetNo,'subject'=>$subject_row['subject_title'], 
		    									'scan_value'=>$newvalue, 'row'=>$rowNo, 'column'=>$col);
		    					$sheet_subject_flag[]=$subject;
		    				}	
				             				
				        }//End of valid subjects			
	
		             	//Get the gender flags coordinates
		             	$boyflag = stripos($values,'boy');
		             	$girlflag = stripos($values,'girl');
	
		                if ($boyflag !== false) 
		                {
		                	$boy_flag=array();
	    					$boy_flag=array('sheetNo'=>$sheetNo,'gender'=>$values, 'row'=>$rowNo, 'column'=>$col);
	    					$sheet_gender_flag[]=$boy_flag;
	    					
						}
						else if($girlflag !== false)
	                	{
	                		$girl_flag=array();
	                		$girl_flag=array('sheetNo'=>$sheetNo,'gender'=>$values, 'row'=>$rowNo, 'column'=>$col);
	                		$sheet_gender_flag[]=$girl_flag;
	                	}
	                	else
	                	{
	                		//Prompt Gender Flags do not exist in spreadsheet 
	                	}	
	                	//End of Get gender flags coordinates	

	                	//Get the average flags coordinates
	                	$valid_average= stripos($values,'average');
		                if ($valid_average !== false) 
		                {
	    					$average=array('sheetNo'=>$sheetNo,'average'=>$values, 'row'=>$rowNo, 'column'=>$col);
	    					$sheet_average_flag[]=$average;
						}
						else
						{
							//Prompt Average Flags do not exist in spreadsheet
						}	
	                	//End of Get the average flags coordinates

		               
		            }//End of rowArray
		            
		        }//End of row      
		       
		    }//End of singlesheet
		}//End of spreadsheet

		$subjectlist=array();

		//get teacher's subjectlist
		$subjects=get_subjectlist($_SESSION['account_id'],$class_rec_no);
		while($listofsubjects = mysqli_fetch_array($subjects))
		{
			$passer=array();
			$passer['subjectID']=$listofsubjects['subjectID'];
			$passer['subject_title']=$listofsubjects['subject_title'];
			$subjectlist[]=$passer;

		}

		$studentlist=array();

		//get studentlist
		$fetch_students=get_studentlist($_SESSION['account_id'],$class_rec_no);
		while($listofstudents = mysqli_fetch_array($fetch_students))
		{
			$passer=array();
			$passer['student_lrn']=$listofstudents['student_lrn'];
			$passer['reg_lname']=$listofstudents['reg_lname'];
			$passer['reg_fname']=$listofstudents['reg_fname'];
			$studentlist[]=$passer;

		}
		$counter=0;
		//Start Scanning the spreadsheet
		foreach ($spreadsheet as $spreadsheetno => $sheet) 
        {

            foreach ($sheet as $sheetno => $sheetrow) 
            { 
            	//Initialize array for current sheet subjects
                $current_sheet_subject=array();
                //Initialize array for current sheet rows
                $current_sheet_rows=array();
                //Initialize  array for current sheet average columns
                $current_sheet_average_columns=array();

                //Find the last subject flag for the current sheet
                foreach ($sheet_subject_flag as $subject_row) 
                {
                    if($subject_row['sheetNo']==$sheetno)//get all rows for current sheet
                    {
                        $current_sheet_subject[]=$subject_row;
                    }
                            
                }

                //Find the last gender flag for the current sheet
                foreach ($sheet_gender_flag as $gender_row) 
                {
                    if($gender_row['sheetNo']==$sheetno)//get all rows for current sheet
                    {
                        $current_sheet_rows[]=$gender_row;
                    }
                            
                }

                //Find the last average flag for the current sheet
                foreach ($sheet_average_flag as $average_row) 
                {
                    if($average_row['sheetNo']==$sheetno)//get all cols for current sheet
                    {
                        $current_sheet_average_columns[]=$average_row;
                    }
                            
                }

               	$subject_found=false;
                //Start comparing subject
                foreach($current_sheet_subject as $current_subject_row)
                {
                 	//Load subjectlist to compare      
	                foreach($subjectlist as $subjectrow)
	                {
	                   
                        $new_subject=preg_replace('/\s+/','',$subjectrow['subject_title']);
                        $valid_subject=strcasecmp($new_subject, $current_subject_row['scan_value']);
                        //If scanned subject matched
                        if($valid_subject == 0)
                        {
                            $subject_found=true;
                            
                        }//End of valid subject

	            	}//End of subjectlist row     
	            	
                    //If scanned subject found
                    if($subject_found==true)
                    {
                        //Save the subject to array
                       $sheet_result_gather[$counter]['scan_subject']=$current_subject_row;

                        $num_of_rows=count($current_sheet_rows);
                   		$student_counter=0;
                   		if($num_of_rows > 1)
			            {
			                $current_row=(int) $current_sheet_rows[0]['row'];
                            $next_row=(int) $current_sheet_rows[1]['row'];
                            //Get the average columns
                            $average_column=array();

                            foreach ($current_sheet_average_columns as $averagerow) 
                            {
                                if($averagerow['row']==$current_row)
                                {
                                    $passer=array();
                                    $passer['column']=$averagerow['column'];
                                    $average_column[]=$passer;

                                }   
                            }
                           
                            $kAverage=$psAverage=$uAverage=$ppAverage="";

                            $kAverage=$average_column[0]['column'];
                            $psAverage=$average_column[1]['column'];
                            $uAverage=$average_column[2]['column'];
                            $ppAverage=$average_column[3]['column'];

                           $student_found=false;
                           $scanned_student=array();

                           $student_scan_ready=true;
                            //$singlesheet[0]=>$row 
                            for ($row_counter=$current_row; $row_counter < $next_row ; $row_counter++)
                            { 
                                
                                //$row[0]=>$rowarray 
                                foreach($spreadsheet[$spreadsheetno][$sheetno][$row_counter] as $column_ => $value_)
                                {
                                    //$rowarray[0]=>$values
                                		if($student_scan_ready==true)
                                		{
	                                		foreach($studentlist as $student_row)
	                                        {
	                                            //Separate lastname and firstname from scan
	                                            $studentname = explode(',',$value_,2);

	                                            if(isset($studentname[0]) and isset($studentname[1]))
	                                            {   //trim lastname and firstname from scan
	                                                $lname=preg_replace('/\s+/','',$studentname[0]);
	                                                $fname=preg_replace('/\s+/','',$studentname[1]);

	                                                //Separate lastname and firstname from database
	                                                //trim lastname and firstname
	                                                $reg_lname=preg_replace('/\s+/','',$student_row['reg_lname']);
	                                                $reg_fname=preg_replace('/\s+/','',$student_row['reg_fname']);

	                                                //Get length
	                                                $reg_lname_length=strlen($reg_lname);
	                                                $reg_fname_length=strlen($reg_fname);

	                                                //Create a substring
	                                                $lastname=substr($lname, 0 , $reg_lname_length);
	                                                $firstname=substr($fname, 0 , $reg_fname_length);

	                                                $valid_lastname=strcasecmp($reg_lname, $lastname);
	                                                $valid_firstname=strcasecmp($reg_fname, $firstname);

	     
	                                                //Check if Name is Valid
	                                                if(($valid_lastname == 0) and ($valid_firstname == 0))
	                                                {
	                                                    $student_found=true; 
	                                                    $scanned_student=array('sheetNo'=>$sheetno,'student'=>$student_row['reg_lname'].', '.$student_row['reg_fname'], 
	                                                            'scan_value'=>$lastname.', '.$firstname, 'row'=>$row_counter, 'column'=>$column_, 'student_found'=>true);
	                                                    
	                                                }

	                                            }
	                                            else
	                                            {
	                                                //Prompt Comma Issues
	                                            } 
	                                                  
	                                        }//foreach
                                		}//End of scan ready

 
                                       
                                       //Check if Name is Valid
                                        if($student_found==true)
                                        {
                                            $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]=$scanned_student;

                                            $student_scan_ready=false;
                                            $student_found=false;
                                         
                                        }
                                        else
                                        {
                                            //Prompt Scan Error//Skipp Scanning
                                        }

                                        if($student_scan_ready==false)
                                		{
                                			//If Name is validated, Get the 4 averages
	                                        if($column_==$kAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['kAverage']=$value_;
	                                            }   
	                                        }
	                                        if($column_==$psAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['psAverage']=$value_;
	                                            }   
	                                        }   
	                                        if($column_==$uAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['uAverage']=$value_;
	                                            }   
	                                        }   
	                                        if($column_==$ppAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['ppAverage']=$value_;

	                                                //Done with scanning row
	                                                $student_counter++;
	                                                $student_scan_ready=true;
	                                            }   
	                                        }         
                                		}//End of scan ready false

                                        

                                }//rowArray

                            }//row                            
			            }
			            else //If one row
			            {	
			            	//Get the current row and the next row which will be the end point of scanning
			                $current_row=(int) $current_sheet_rows[0]['row'];
			                $sheetrows=count($sheetrow);
			                //Get the average columns
			                $average_column=array();

			                foreach ($current_sheet_average_columns as $averagerow) 
			                {
			                    if($averagerow['row']==$current_row)
			                    {
			                        $passer=array();
			                        $passer['column']=$averagerow['column'];
			                        $average_column[]=$passer;

			                    }   
			                }
			               
			                $kAverage=$psAverage=$uAverage=$ppAverage="";

			                $kAverage=$average_column[0]['column'];
			                $psAverage=$average_column[1]['column'];
			                $uAverage=$average_column[2]['column'];
			                $ppAverage=$average_column[3]['column'];

                           $student_found=false;
                           $scanned_student=array();

                           $student_scan_ready=true;
                            //$singlesheet[0]=>$row 
                            for ($row_counter=$current_row; $row_counter < $sheetrows+1 ; $row_counter++)
                            { 
                                
                                //$row[0]=>$rowarray 
                                foreach($spreadsheet[$spreadsheetno][$sheetno][$row_counter] as $column_ => $value_)
                                {
                                    //$rowarray[0]=>$values
                                		if($student_scan_ready==true)
                                		{
	                                		foreach($studentlist as $student_row)
	                                        {
	                                            //Separate lastname and firstname from scan
	                                            $studentname = explode(',',$value_,2);

	                                            if(isset($studentname[0]) and isset($studentname[1]))
	                                            {   //trim lastname and firstname from scan
	                                                $lname=preg_replace('/\s+/','',$studentname[0]);
	                                                $fname=preg_replace('/\s+/','',$studentname[1]);

	                                                //Separate lastname and firstname from database
	                                                //trim lastname and firstname
	                                                $reg_lname=preg_replace('/\s+/','',$student_row['reg_lname']);
	                                                $reg_fname=preg_replace('/\s+/','',$student_row['reg_fname']);

	                                                //Get length
	                                                $reg_lname_length=strlen($reg_lname);
	                                                $reg_fname_length=strlen($reg_fname);

	                                                //Create a substring
	                                                $lastname=substr($lname, 0 , $reg_lname_length);
	                                                $firstname=substr($fname, 0 , $reg_fname_length);

	                                                $valid_lastname=strcasecmp($reg_lname, $lastname);
	                                                $valid_firstname=strcasecmp($reg_fname, $firstname);

	     
	                                                //Check if Name is Valid
	                                                if(($valid_lastname == 0) and ($valid_firstname == 0))
	                                                {
	                                                    $student_found=true; 
	                                                    $scanned_student=array('sheetNo'=>$sheetno,'student'=>$student_row['reg_lname'].', '.$student_row['reg_fname'], 
	                                                            'scan_value'=>$lastname.', '.$firstname, 'row'=>$row_counter, 'column'=>$column_, 'student_found'=>true);
	                                                    
	                                                }

	                                            }
	                                            else
	                                            {
	                                                //Prompt Comma Issues
	                                            } 
	                                                  
	                                        }//foreach
                                		}//End of scan ready

 
                                       
                                       //Check if Name is Valid
                                        if($student_found==true)
                                        {
                                            $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]=$scanned_student;

                                            $student_scan_ready=false;
                                            $student_found=false;
                                         
                                        }
                                        else
                                        {
                                            //Prompt Scan Error//Skipp Scanning
                                        }

                                        if($student_scan_ready==false)
                                		{
                                			//If Name is validated, Get the 4 averages
	                                        if($column_==$kAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['kAverage']=$value_;
	                                            }   
	                                        }
	                                        if($column_==$psAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['psAverage']=$value_;
	                                            }   
	                                        }   
	                                        if($column_==$uAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['uAverage']=$value_;
	                                            }   
	                                        }   
	                                        if($column_==$ppAverage)
	                                        {
	                                            if(is_numeric($value_))
	                                            {
	                                                $sheet_result_gather[$counter]['scan_subject']['scan_student'][$student_counter]['ppAverage']=$value_;

	                                                //Done with scanning row
	                                                $student_counter++;
	                                                $student_scan_ready=true;
	                                            }   
	                                        }         
                                		}//End of scan ready false

                                        

                                }//rowArray

                            }//row                            

			            }//End of If one row

                        $subject_found=false;
                        $counter++;
                        //Do the remove rows after scan
                        array_shift($current_sheet_rows);
                        //Remove the 4 average flags by row
                        array_shift($current_sheet_average_columns);
                       	array_shift($current_sheet_average_columns);
                       	array_shift($current_sheet_average_columns);
                       	array_shift($current_sheet_average_columns);
                        
                    
                    }//End of valid subject
                    else if($subject_found==false)
                    {
                    	
                        //Do the remove rows after scan
                        array_shift($current_sheet_rows);
                       	//Remove the 4 average flags by row
                       	array_shift($current_sheet_average_columns);
                       	array_shift($current_sheet_average_columns);
                       	array_shift($current_sheet_average_columns);
                       	array_shift($current_sheet_average_columns);
                      
                    }       

                }//end comparing subject

            }//End of singlesheet
        }//End of spread sheet
		            	

	}

	include "views/Teachers_Page_Encoding_Spreadsheet.php";


}

function excel_upload()
{
	include 'views/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';

	$sheetData=array();//initialize 
	$result=array();

	$name = $_FILES['spreadsheet']['name'];
	$inputFile = $_FILES['spreadsheet']['tmp_name'];
	$allowedextension = array('xls','xlsx');


	$temp = explode(".",$name);
	$nameoffile = $temp[0];
	$extension = end($temp);
	if(in_array($extension,$allowedextension))
	{
		if($_FILES['spreadsheet']['error']>0)
		{
			
			$result=array('error'=>'ex'); 
			
		}
		else
		{
			
			
			try{
				//Read spreadsheet workbook
				$inputFileType=PHPExcel_IOFactory::identify($inputFile);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objReader->setReadDataOnly(false);
				$objReader->setLoadAllSheets();
				$objPHPExcel = $objReader->load($inputFile);
				$loadedSheetNames = $objPHPExcel->getSheetNames();

				//Get Sheet Name 
				foreach ($loadedSheetNames as $sheetIndex => $sheetName) 
				{

	                	//convert to csv
						$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'csv');
						$objWriter->setDelimiter('`');
						$objWriter->setEnclosure(' ');
						$objWriter->setLineEnding("\n");
						$objWriter->setSheetIndex($sheetIndex);
						$objWriter->save('model/uploaded_files/spreadsheets/csv/'.$nameoffile.'-'.$sheetName.'.csv');

						//read csv
						$csvFile='model/uploaded_files/spreadsheets/csv/'.$nameoffile.'-'.$sheetName.'.csv';
						$inputCSVType=PHPExcel_IOFactory::identify($csvFile);
						$csvReader=PHPExcel_IOFactory::createReader($inputCSVType);
						$csvReader->setDelimiter('`');
						$csvReader->setEnclosure(' ');
						$csvReader->setLineEnding("\n");
						$csvReader->setReadDataOnly(false);
						$csvPHPExcel = $csvReader->load($csvFile);
	
						$sheetData[] = $csvPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	                	
				}	

			}
			catch(PHPExcel_Reader_Exception $e)
			{
				die($e->getMessage());
			}

		
				if(!empty($sheetData))
				{
					$location = "model/uploaded_files/spreadsheets/";
					if(move_uploaded_file($inputFile,$location.$name))
					{
						$result=array('success' => 'excel',
									'file_name' => $name,'data'=>$sheetData);
					}
					else
					{	
						$rowData = array('error'=>'ex');
					}	
				}
				else
				{
					$rowData = array('error'=>'er');
				}	

		}
	}
	else
	{
		$result=array('error'=>'if'); 
		
	}

	return $result;
}



function spage()
{
	include "model/student_schedule_line.php";
	include "model/announcement_lecture.php";
	include "model/utility.php";

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

		$sa_box=array();
		$sa_announcement=get_school_announcement();
		while($display = mysqli_fetch_array($sa_announcement))
		{
				$passer=array();

				$passer['sa_date_created']=convert_datetime_to_12hr($display['sa_date_created']);
				$passer['timespan']=get_time_difference_php($display['sa_date_created']);
				$passer['sa_message']=$display['sa_message'];
				
				$sa_box[]=$passer;

		}	

		$_SESSION['student_school_year']=get_school_year();

		$_SESSION['Student_Schedule_Line']=array();
		
		$studentload=get_sectionBySchoolYear($_SESSION['account_id'],$_SESSION['student_school_year']);
	
		while($travload = mysqli_fetch_array($studentload))
		{
			$passer=array();

			$passer['class_rec_no']=$travload['class_rec_no'];
			$passer['teacher_id']=$travload['reg_id'];
			$passer['teacher_lname']=$travload['reg_lname'];
			$passer['teacher_fname']=$travload['reg_fname'];
			$passer['teacher_mname']=$travload['reg_mname'];
			$passer['teacher_image']=$travload['image'];
			$passer['level_description']=$travload['level_description'];
			$passer['sectionNo']=$travload['sectionNo'];
			$passer['section_name']=$travload['section_name'];
			$passer['subject_title']=$travload['subject_title'];
			$passer['sched_days']=$travload['sched_days'];
			$passer['sched_start_time']=convert_time_to_12hr($travload['sched_start_time']);
			$passer['sched_end_time']=convert_time_to_12hr($travload['sched_end_time']);

			$_SESSION['Student_Schedule_Line'][]=$passer;
	
		}

		
		$display_box=array();
		$announce_lecture=post_announcement_lecture_to_all_students($_SESSION['account_id']);
		
		while($display = mysqli_fetch_array($announce_lecture))
		{


				$passer=array();

        		$passer['teacher_id']=$display['reg_id'];
        		$passer['teacher_lname']=$display['reg_lname'];
        		$passer['teacher_fname']=$display['reg_fname'];
        		$passer['teacher_mname']=$display['reg_mname'];
        		$passer['teacher_image']=$display['image'];
				$passer['date_created']=convert_datetime_to_12hr($display['date_created']);
				$passer['timespan']=get_time_difference_php($display['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
				$passer['file_path']=$display['file_path'];
				$passer['file_name']=$display['file_name'];
				$passer['level_description']=$display['level_description'];
				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];
				$passer['announcement_id']=$display['date_created'];

				$comments="";
                //select comments
				$select_comments=post_comments($display['date_created']);
				while($comment = mysqli_fetch_array($select_comments))
                {
                    $comments=$comments .   '<div class="row has-padding-top-5">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <img src="views/res/'.$comment['image'].'" class="shadow student-post-comment-img img-thumbnail pull-left img-responsive" />
                                                    </div>

                                                    <div class="input-group col-md-11 col-md-offset-1">
                                                        <div class="student-comment"><a class="student-comment-author">'.$comment['reg_fname'].' '.$comment['reg_lname'].' </a>'.$comment['comment_message'].'
                                                        </div>
                                                        <div><small class="student-comment-timespan"><strong>'.convert_datetime_to_12hr($comment['comment_date_created']).'</strong></small></div>
                                                        <div><small class="student-comment-timespan">'.get_time_difference_php($comment['comment_date_created']).'</small></div>
                                                    </div>
                                                </div>
                                            </div><!--//row-->';
                }

                $passer['comments']=$comments;
                $passer['message_id']=createMessageId();

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

	/*$result=get_all_student_exercise();*/


		/*while($travexercises = mysqli_fetch_array($result))
		{*/
			/*$passer=array();
			$eidHolder=array();

			$passer['sectionNo']=$travexercises['sectionNo'];
			$passer['section_name']=$travexercises['section_name'];
			$passer['typeID']=$travexercises['typeID'];
			$passer['exerciseName']=$travexercises['exerciseName'];
			$passer['date_created']=$travexercises['date_created'];

			$exerciseID=$travexercises['exerciseID'];

			$eidHolder[$exerciseID]=null;*/
				
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

			/*	$passer['exerciseID']=$eidHolder;

				$all_exercises[]=$passer;	

		}*/

	include "views/Student_Exercise_Page.php";
}

function ppage()
{
	include "model/parent.php";
	include "model/utility.php";
	include "model/announcement_lecture.php";

	$sa_box=array();
	$sa_announcement=get_school_announcement();
	while($display = mysqli_fetch_array($sa_announcement))
	{
			$passer=array();

			$passer['sa_date_created']=convert_datetime_to_12hr($display['sa_date_created']);
			$passer['timespan']=get_time_difference_php($display['sa_date_created']);
			$passer['sa_message']=$display['sa_message'];
			
			$sa_box[]=$passer;

	}

	$display_box=array();
	$announcements=get_announcements($_SESSION['account_id']);
	
	while($display = mysqli_fetch_array($announcements))
	{


			$passer=array();

			$passer['class_rec_no']=$display['class_rec_no'];
			$passer['feedback_date_created']=convert_datetime_to_12hr($display['feedback_date_created']);
			$passer['timespan']=get_time_difference_php($display['feedback_date_created']);
			$passer['parentID']=$display['parentID'];
			$passer['teacher_lname']=$display['reg_lname'];
			$passer['teacher_fname']=$display['reg_fname'];
			$passer['teacher_mname']=$display['reg_mname'];
			$passer['teacher_image']=$display['image'];
			$passer['feedback_message']=$display['feedback_message'];
			$passer['level_description']=$display['level_description'];
			$passer['sectionNo']=$display['sectionNo'];
			$passer['section_name']=$display['section_name'];
			$passer['subject_title']=$display['subject_title'];
			$passer['announcement_id']=$display['feedback_date_created'];

			$comments="";
            //select comments
			$select_comments=post_feedback_comments($display['feedback_date_created']);
			while($comment = mysqli_fetch_array($select_comments))
            {
                $comments=$comments .   '<div class="row has-padding-top-5">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <img src="views/res/'.$comment['image'].'" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />
                                                </div>

                                                <div class="input-group col-md-11 col-md-offset-1">
                                                    <div class="comment"><a class="comment-author">'.$comment['reg_fname'].' '.$comment['reg_lname'].' </a>'.$comment['feedback_comment_message'].'
                                                    </div>
                                                    <div><small class="comment-timespan"><strong>'.convert_datetime_to_12hr($comment['feedback_comment_date_created']).'</strong></small></div>
                                                    <div><small class="comment-timespan">'.get_time_difference_php($comment['feedback_comment_date_created']).'</small></div>
                                                </div>
                                            </div>
                                        </div><!--//row-->';
            }

            $passer['comments']=$comments;
            $passer['message_id']=createMessageId();

			$display_box[]=$passer;

	}		


	$display_students=array();
	$display_teachers=array();
	$display_subjects=array();
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

	$teachers=get_teachers($_SESSION['account_id']);

	while($display = mysqli_fetch_array($teachers))
	{
		$passer=array();
			
		$passer['teacher_id']=$display['reg_id'];
		$passer['teacher_lname']=$display['reg_lname'];
		$passer['teacher_fname']=$display['reg_fname'];
		$passer['teacher_mname']=$display['reg_mname'];
		$passer['teacher_image']=$display['image'];

		$display_teachers[]=$passer;
	}

	/*foreach($display_teachers as $row)
	{
		$row['reg_id'];
	}	
	$subjects=get_subjects($_SESSION['account_id'],$passer['reg_id']);*/

		/*while($display = mysqli_fetch_array($subjects))
		{
			$passer=array();
			$passer['subject_title']=$display['subject_title'];
			$display_subjects[]=$passer;


		}*/


	include "views/Parent_Page.php";
}

function p_spage_progress()
{
	include "views/Parent_Student_Page_Progress.php";
}

function tpage_createexer()
{
	/*include "views/Teacher_CreateExercise.php";*/
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

function taccount_settings()
{
	include "model/accountsettings.php";
	include "model/utility.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$old_password=$currentpass=$newpass=$repass="";

		$fetch=getall_account($_SESSION['account_id']);
		while($row=mysqli_fetch_array($fetch))
		{
			$old_password = $row['password_'];
		}

		$currentpass = clean($_POST['taccountcurrentpass']);
		$newpass = clean($_POST['taccountnewpass']);
		$repass = clean($_POST['taccountrepass']);

     	
     	if($currentpass <> $old_password) 
     	{
     		/*echo "<script>alert('Invalid current password!')</script>";*/
     		header("Location:index.php?r=lss&tr=acc&icp");
     	}

     	else if($newpass <> $repass)
     	{
     		/*echo "<script>alert('New passwords do not match!')</script>";*/
     		header("Location:index.php?r=lss&tr=acc&npm");
     	}

     	else if(empty($currentpass) or empty($newpass) or empty($repass))	
     	{
     		/*echo "<script>alert('Password cannot be empty!')</script>";*/
     		header("Location:index.php?r=lss&tr=acc&pce");
     	}	

     	else if(strlen($newpass)<8 or strlen($repass)<8)
     	{
     		/*echo "<script>alert('Password too short')</script>";*/
     		header("Location:index.php?r=lss&tr=acc&pts");
     	}

     	else if(strlen($newpass)>16 or strlen($repass)>16)
     	{
     		/*echo "<script>alert('Password must be 16 characters only.')</script>";*/
     		header("Location:index.php?r=lss&tr=acc&pmco");
     	}

     	else if($repass == $old_password)
     	{
     		/*echo "<script>alert('Password must differ from old password.')</script>";*/
     		header("Location:index.php?r=lss&tr=acc&pmd");
     	}

     	else
     	{
     		$updated=change_password($_SESSION['account_id'],$repass);
			if($updated)
			{
				header("Location:index.php?r=lss&tr=acc&cp");
			}
     	}	


		
	}

	include "views/Teachers_Account_Settings.php";
}

function saccount_settings()
{
	include "model/accountsettings.php";
	include "model/utility.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$old_password=$currentpass=$newpass=$repass="";

		$fetch=getall_account($_SESSION['account_id']);
		while($row=mysqli_fetch_array($fetch))
		{
			$old_password = $row['password_'];
		}

		$currentpass = clean($_POST['saccountcurrentpass']);
		$newpass = clean($_POST['saccountnewpass']);
		$repass = clean($_POST['saccountrepass']);

     	
     	if($currentpass <> $old_password) 
     	{
     		/*echo "<script>alert('Invalid current password!')</script>";*/
     		header("Location:index.php?r=lss&st=acc&icp");
     	}

     	else if($newpass <> $repass)
     	{
     		/*echo "<script>alert('New passwords do not match!')</script>";*/
     		header("Location:index.php?r=lss&st=acc&npm");
     	}

     	else if(empty($currentpass) or empty($newpass) or empty($repass))	
     	{
     		/*echo "<script>alert('Password cannot be empty!')</script>";*/
     		header("Location:index.php?r=lss&st=acc&pce");
     	}	

     	else if(strlen($newpass)<8 or strlen($repass)<8)
     	{
     		/*echo "<script>alert('Password too short')</script>";*/
     		header("Location:index.php?r=lss&st=acc&pts");
     	}

     	else if(strlen($newpass)>16 or strlen($repass)>16)
     	{
     		/*echo "<script>alert('Password must be 16 characters only.')</script>";*/
     		header("Location:index.php?r=lss&st=acc&pmco");
     	}

     	else if($repass == $old_password)
     	{
     		/*echo "<script>alert('Password must differ from old password.')</script>";*/
     		header("Location:index.php?r=lss&st=acc&pmd");
     	}

     	else
     	{
     		$updated=change_password($_SESSION['account_id'],$repass);
			if($updated)
			{
				header("Location:index.php?r=lss&st=acc&cp");
			}
     	}	


		
	}

	include "views/Student_Account_Settings.php";
}

function paccount_settings()
{
	include "model/accountsettings.php";
	include "model/utility.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$old_password=$currentpass=$newpass=$repass="";

		$fetch=getall_account($_SESSION['account_id']);
		while($row=mysqli_fetch_array($fetch))
		{
			$old_password = $row['password_'];
		}

		$currentpass = clean($_POST['paccountcurrentpass']);
		$newpass = clean($_POST['paccountnewpass']);
		$repass = clean($_POST['paccountrepass']);

     	
     	if($currentpass <> $old_password) 
     	{
     		/*echo "<script>alert('Invalid current password!')</script>";*/
     		header("Location:index.php?r=lss&pt=acc&icp");
     	}

     	else if($newpass <> $repass)
     	{
     		/*echo "<script>alert('New passwords do not match!')</script>";*/
     		header("Location:index.php?r=lss&pt=acc&npm");
     	}

     	else if(empty($currentpass) or empty($newpass) or empty($repass))	
     	{
     		/*echo "<script>alert('Password cannot be empty!')</script>";*/
     		header("Location:index.php?r=lss&pt=acc&pce");
     	}	

     	else if(strlen($newpass)<8 or strlen($repass)<8)
     	{
     		/*echo "<script>alert('Password too short')</script>";*/
     		header("Location:index.php?r=lss&pt=acc&pts");
     	}

     	else if(strlen($newpass)>16 or strlen($repass)>16)
     	{
     		/*echo "<script>alert('Password must be 16 characters only.')</script>";*/
     		header("Location:index.php?r=lss&pt=acc&pmco");
     	}

     	else if($repass == $old_password)
     	{
     		/*echo "<script>alert('Password must differ from old password.')</script>";*/
     		header("Location:index.php?r=lss&pt=acc&pmd");
     	}

     	else
     	{
     		$updated=change_password($_SESSION['account_id'],$repass);
			if($updated)
			{
				header("Location:index.php?r=lss&pt=acc&cp");
			}
     	}	


		
	}

	include "views/Parent_Account_Settings.php";

}

/*function tprint()
{
	include "views/Teachers_Page_File.php";
}*/

function logout()
{
	session_unset(); 
    session_destroy();
    header("Location:index.php?");
    
}

?>