
<?php 
	if(isset($_GET['ap_filter']))
	{
		$ap_filter=$_GET['ap_filter'];
		/*echo "{\"filter\": [" . json_encode($ap_filter). "]}";*/
		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($ap_filter))
		{
				
				$join="Select registration.* from admin inner join registration on admin.admin_id=registration.reg_id 
				where reg_id LIKE '%$ap_filter%' or reg_lname LIKE '%$ap_filter%' or reg_fname LIKE '%$ap_filter%' 
				or reg_mname LIKE '%$ap_filter%' or reg_gender LIKE '%$ap_filter%' or reg_status LIKE '%$ap_filter%' 
				or CAST(reg_birthday AS char) LIKE '%$ap_filter%' or reg_address LIKE '%$ap_filter%'"; 
	
				$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

				$first = true;
				echo "{\"ap_filter\": [";
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
		else if(empty($ap_filter))
		{

			$join="Select registration.* from admin inner join registration on admin.admin_id=registration.reg_id"; 
	
			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"ap_filter\": [";
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

	if(isset($_GET['tp_filter']))
	{
		$tp_filter=$_GET['tp_filter'];
		/*echo "{\"filter\": [" . json_encode($tp_filter). "]}";*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($tp_filter))
		{
			$join="Select registration.*, teacher.t_position from teacher inner join registration on teacher.teacherID=registration.reg_id 
			where reg_id LIKE '%$tp_filter%' or reg_lname LIKE '%$tp_filter%' or reg_fname LIKE '%$tp_filter%' or reg_mname LIKE '%$tp_filter%'
			or reg_gender LIKE '%$tp_filter%' or reg_status LIKE '%$tp_filter%' or CAST(reg_birthday AS char) LIKE '%$tp_filter%' or reg_address LIKE '%$tp_filter%'
			or t_position LIKE '%$tp_filter%'";

			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"tp_filter\": [";
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
		else if(empty($tp_filter))
		{
			$join="Select registration.*, teacher.t_position from teacher inner join registration on teacher.teacherID=registration.reg_id";

			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"tp_filter\": [";
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

	if(isset($_GET['sp_filter']))
	{
		$sp_filter=$_GET['sp_filter'];
		/*echo "{\"filter\": [" . json_encode($sp_filter). "]}";*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($sp_filter))
		{
			$join="SELECT registration1.*,registration2.reg_lname,registration2.reg_fname,registration2.reg_mname 
			from student as studentprofile inner join registration as registration1 on studentprofile.student_lrn=registration1.reg_id 
			left join parent as parentprofile on studentprofile.parentID=parentprofile.parentID 
			left join registration as registration2 on parentprofile.parentID=registration2.reg_id 
			where registration1.reg_id LIKE '%$sp_filter%' or registration1.reg_lname LIKE '%$sp_filter%' or registration1.reg_fname LIKE '%$sp_filter%' 
			or registration1.reg_mname LIKE '%$sp_filter%' or registration1.reg_gender LIKE '%$sp_filter%' or registration1.reg_status LIKE '%$sp_filter%' 
			or CAST(registration1.reg_birthday AS char) LIKE '%$sp_filter%' or registration1.reg_address LIKE '%$sp_filter%' 
			or registration2.reg_lname LIKE '%$sp_filter%' or registration2.reg_fname LIKE '%$sp_filter%' or registration2.reg_mname LIKE '%$sp_filter%'";
			  
						
			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"sp_filter\": [";
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
		else if(empty($sp_filter))
		{
			$join="SELECT registration1.*,registration2.reg_lname,registration2.reg_fname,registration2.reg_mname 
			from student as studentprofile inner join registration as registration1 on studentprofile.student_lrn=registration1.reg_id 
			left join parent as parentprofile on studentprofile.parentID=parentprofile.parentID 
			left join registration as registration2 on parentprofile.parentID=registration2.reg_id";
			  
						
			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"sp_filter\": [";
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

	if(isset($_GET['sbs_filter']))
	{
		$sbs_filter=$_GET['sbs_filter'];
		/*echo "{\"filter\": [" . json_encode($sbs_filter). "]}";*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($sbs_filter))
		{
			$sql="Select * from subject_ where subjectID LIKE '%$sbs_filter%' or subject_title LIKE '%$sbs_filter%'";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"sbs_filter\": [";
			while($display = mysqli_fetch_array($sql))
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
		else if(empty($sbs_filter))
		{
			$sql="Select * from subject_";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"sbs_filter\": [";
			while($display = mysqli_fetch_array($sql))
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

	if(isset($_GET['scs_filter']))
	{
		$scs_filter=$_GET['scs_filter'];
		/*echo "{\"filter\": [" . json_encode($scs_filter). "]}";*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($scs_filter))
		{
			$sql="Select * from section_list where sectionID LIKE '%$scs_filter%' or sectionNo LIKE '%$scs_filter%' or section_name LIKE '%$scs_filter%'";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"scs_filter\": [";
			while($display = mysqli_fetch_array($sql))
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
		else if(empty($scs_filter))
		{
			$sql="Select * from section_list";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"scs_filter\": [";
			while($display = mysqli_fetch_array($sql))
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

	if(isset($_GET['gl_filter']))
	{
		$gl_filter=$_GET['gl_filter'];
		/*echo "{\"filter\": [" . json_encode($gl_filter). "]}";*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($gl_filter))
		{
			$sql="Select * from grade_level where levelID LIKE '%$gl_filter%' or level_description LIKE '%$gl_filter%'";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"gl_filter\": [";
			while($display = mysqli_fetch_array($sql))
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
		else if(empty($gl_filter))
		{
			$sql="Select * from grade_level";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"gl_filter\": [";
			while($display = mysqli_fetch_array($sql))
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

	if(isset($_GET['ps_filter']))
	{
		$ps_filter=$_GET['ps_filter'];
		/*echo "{\"filter\": [" . json_encode($ps_filter). "]}";*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($ps_filter))
		{
			$sql="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, section.sectionNo, section.section_name 
			from section inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
			inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created 
			where CAST(announcement_lecture.date_created as char) LIKE '%$ps_filter%' or announcement_lecture.messageorfile_caption LIKE '%$ps_filter%' 
			or announcement_lecture.file_path LIKE '%$ps_filter%' or announcement_lecture.file_name LIKE '%$ps_filter%' or section.sectionNo LIKE '%$ps_filter%' 
			or section.section_name LIKE '%$ps_filter%' order by date_created desc";
			
			$sql= mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"ps_filter\": [";
			while($display = mysqli_fetch_array($sql))
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
		else if(empty($ps_filter))
		{
			$sql="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, 
			announcement_lecture.file_path, announcement_lecture.file_name, section.sectionNo, section.section_name 
			from section inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
			inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created order by date_created desc";
			
			$sql= mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

			$first = true;
			echo "{\"ps_filter\": [";
			while($display = mysqli_fetch_array($sql))
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

	if(isset($_GET['edit_admin_id']))
	{
		$edit_admin_id=$_GET['edit_admin_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT * FROM registration inner join admin on registration.reg_id=admin.admin_id where reg_id='$edit_admin_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

		$first = true;
		echo "{\"edit_admin\": [";
		while($row = mysqli_fetch_array($fetch))
		{
			if($first) 
			{
				echo json_encode($row);
				$first = false;
			}		 
			else 
			{
				echo ',' . json_encode($row);
			}
		}
		
		echo "]}";	

	}

	if(isset($_GET['edit-admin-form']))
	{
		
		/*echo "{\"form\":[".json_encode($_POST['edadmid'])."],\"upload\":[".json_encode($_FILES)."]}";*/
		$response = array();

		$id = $_POST['edadmid'];
		$reg_lname = clean($_POST['edadmlname']);
		$reg_fname = clean($_POST['edadmfname']);
		$reg_mname = clean($_POST['edadmmname']);
		$reg_gender = clean($_POST['edadmgender']);
		$reg_status = clean($_POST['edadmstatus']);
			
		$reg_address = clean($_POST['edadmaddress']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) )
		{
		
			$result=admin_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{
				$sql="UPDATE registration SET reg_lname = '$reg_lname', reg_fname = '$reg_fname', reg_mname = '$reg_mname', 
								  reg_gender = '$reg_gender', reg_status = '$reg_status',
								  reg_address = '$reg_address', image = '".$result['file_name']."' where reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Admin Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration SET reg_lname = '$reg_lname', reg_fname = '$reg_fname', reg_mname = '$reg_mname', 
								  reg_gender = '$reg_gender', reg_status = '$reg_status', reg_address = '$reg_address' where reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Admin Information Updated');
				}	
			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}

		echo json_encode($response);			
	}

	function admin_img($id)
	{
	
		$data = array();

			if(!empty($_FILES['edadmimg']['name']))
			{
				$name = $_FILES['edadmimg']['name'];
				$tmp_name = $_FILES['edadmimg']['tmp_name'];
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
					
						$location = "../res/";

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

						$sql="SELECT image FROM registration where reg_id='$id' and image='$name'";

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
								$data=array('success' => 'File Saved','file_name' => $name);
							}
							else
							{
								$data = array('error'=>'There was an error uploading your file');
							}	
						}	
						
					
						
				}
				else
				{
					$data = array('error'=>'Invalid file extension');
				}
			}
			else
			{
				$data = array('empty'=>'$_FILES is empty');
			}	

				return $data;
	}

	if(isset($_GET['edit_teacher_id']))
	{
		$edit_teacher_id=$_GET['edit_teacher_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT * FROM registration inner join teacher on registration.reg_id=teacher.teacherID where reg_id='$edit_teacher_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

		$first = true;
		echo "{\"edit_teacher\": [";
		while($row = mysqli_fetch_array($fetch))
		{
			if($first) 
			{
				echo json_encode($row);
				$first = false;
			}		 
			else 
			{
				echo ',' . json_encode($row);
			}
		}
		
		echo "]}";	
	}	

	if(isset($_GET['edit-teacher-form']))
	{
		
		$response = array();

		$id = $_POST['edteachid'];
		$reg_lname = clean($_POST['edteachlname']);
		$reg_fname = clean($_POST['edteachfname']);
		$reg_mname = clean($_POST['edteachmname']);
		$reg_gender = clean($_POST['edteachgender']);
		$reg_status = clean($_POST['edteachstatus']);
			
		$reg_address = clean($_POST['edteachaddress']);
		$t_position = clean($_POST['edteachtposition']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) )
		{
		
			$result=teacher_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="UPDATE registration inner join teacher on registration.reg_id=teacher.teacherID 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status',
					registration.reg_address = '$reg_address', registration.image = '".$result['file_name']."', 
					teacher.t_position='$t_position' where registration.reg_id='$id'";			  

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Teacher Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration inner join teacher on registration.reg_id=teacher.teacherID 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status',
					registration.reg_address = '$reg_address', teacher.t_position='$t_position' where registration.reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Teacher Information Updated');
				}	
			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}

		echo json_encode($response);			
	}

	function teacher_img($id)
	{
	
		$data = array();

			if(!empty($_FILES['edteachimg']['name']))
			{
				$name = $_FILES['edteachimg']['name'];
				$tmp_name = $_FILES['edteachimg']['tmp_name'];
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
					
						$location = "../res/";

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

						$sql="SELECT image FROM registration where reg_id='$id' and image='$name'";

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
								$data=array('success' => 'File Saved','file_name' => $name);
							}
							else
							{
								$data = array('error'=>'There was an error uploading your file');
							}	
						}	
						
					
						
				}
				else
				{
					$data = array('error'=>'Invalid file extension');
				}
			}
			else
			{
				$data = array('empty'=>'$_FILES is empty');
			}	

				return $data;
	}

	if(isset($_GET['edit_student_id']))
	{
		$edit_student_id=$_GET['edit_student_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT registration1.*,registration2.reg_lname,registration2.reg_fname,registration2.reg_mname from student as studentprofile 
		inner join registration as registration1 on studentprofile.student_lrn=registration1.reg_id 
		left join parent as parentprofile on studentprofile.parentID=parentprofile.parentID 
		left join registration as registration2 on parentprofile.parentID=registration2.reg_id 
		where registration1.reg_id = '$edit_student_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

		$first = true;
		echo "{\"edit_student\": [";
		while($row = mysqli_fetch_array($fetch))
		{
			if($first) 
			{
				echo json_encode($row);
				$first = false;
			}		 
			else 
			{
				echo ',' . json_encode($row);
			}
		}
		
		echo "]}";	
	}

	if(isset($_GET['edit-student-form']))
	{
		
		$response = array();

		$id = $_POST['edstudid'];
		$reg_lname = clean($_POST['edstudlname']);
		$reg_fname = clean($_POST['edstudfname']);
		$reg_mname = clean($_POST['edstudmname']);
		$reg_gender = clean($_POST['edstudgender']);
		$reg_status = clean($_POST['edstudstatus']);
		$reg_address = clean($_POST['edstudaddress']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) )
		{
		
			$result=student_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status',
					registration.reg_address = '$reg_address', registration.image = '".$result['file_name']."' 
					where registration.reg_id='$id'";			  

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Student Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status',
					registration.reg_address = '$reg_address' where registration.reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Student Information Updated');
				}	
			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}

		echo json_encode($response);			
	}

	function student_img($id)
	{
	
		$data = array();

			if(!empty($_FILES['edstudimg']['name']))
			{
				$name = $_FILES['edstudimg']['name'];
				$tmp_name = $_FILES['edstudimg']['tmp_name'];
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
					
						$location = "../res/";

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

						$sql="SELECT image FROM registration where reg_id='$id' and image='$name'";

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
								$data=array('success' => 'File Saved','file_name' => $name);
							}
							else
							{
								$data = array('error'=>'There was an error uploading your file');
							}	
						}	
						
					
						
				}
				else
				{
					$data = array('error'=>'Invalid file extension');
				}
			}
			else
			{
				$data = array('empty'=>'$_FILES is empty');
			}	

				return $data;
	}	

	if(isset($_GET['edit_subject_id']))
	{
		$edit_subject_id=$_GET['edit_subject_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT * FROM subject_ where subjectID = '$edit_subject_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

		$first = true;
		echo "{\"edit_subject\": [";
		while($row = mysqli_fetch_array($fetch))
		{
			if($first) 
			{
				echo json_encode($row);
				$first = false;
			}		 
			else 
			{
				echo ',' . json_encode($row);
			}
		}
		
		echo "]}";	
	}

	if(isset($_GET['edit-subject-form']))
	{
		
		$response = array();

		$id = $_POST['edsubid'];
		$subject_title = clean($_POST['edsubtitle']);
		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($subject_title) )
		{
		
				$sql="UPDATE subject_ SET subject_title = '$subject_title' where subjectID='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Subject Information Updated');
				}	
				else 
				{
					$response = array('error' => 'Subject Information Update Failed');
				}
					
		}

		echo json_encode($response);			
	}

	if(isset($_GET['edit_section_id']))
	{
		$edit_section_id=$_GET['edit_section_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT * FROM section_list where sectionID = '$edit_section_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

		$first = true;
		echo "{\"edit_section\": [";
		while($row = mysqli_fetch_array($fetch))
		{
			if($first) 
			{
				echo json_encode($row);
				$first = false;
			}		 
			else 
			{
				echo ',' . json_encode($row);
			}
		}
		
		echo "]}";	
	}

	if(isset($_GET['edit-section-form']))
	{
		
		$response = array();

		$id= $_POST['edsecid'];
		$sectionNo = clean($_POST['edsecno']);
		$section_name= clean($_POST['edsecname']);
		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($sectionNo) and !empty($section_name) )
		{
		
				$sql="UPDATE section_list SET sectionNo = '$sectionNo', section_name = '$section_name' where sectionID='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Section Information Updated');
				}	
				else 
				{
					$response = array('error' => 'Section Information Update Failed');
				}
					
		}

		echo json_encode($response);			
	}

	if(isset($_GET['edit_grade_id']))
	{
		$edit_grade_id=$_GET['edit_grade_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT * FROM grade_level where levelID = '$edit_grade_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

		$first = true;
		echo "{\"edit_grade\": [";
		while($row = mysqli_fetch_array($fetch))
		{
			if($first) 
			{
				echo json_encode($row);
				$first = false;
			}		 
			else 
			{
				echo ',' . json_encode($row);
			}
		}
		
		echo "]}";	
	}

	if(isset($_GET['edit-grade-form']))
	{
		
		$response = array();

		$id= $_POST['edgradeid'];
		$level_description = clean($_POST['edgradedesc']);		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($level_description) )
		{
		
				$sql="UPDATE grade_level SET level_description = '$level_description' where levelID='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Grade Level Information Updated');
				}	
				else 
				{
					$response = array('error' => 'Grade Level Update Failed');
				}
					
		}

		echo json_encode($response);			
	}

	if(isset($_GET['announcement_lecture_id']))
	{
		$edit_post_date=$_GET['announcement_lecture_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT announcement_lecture.date_created, announcement_lecture.messageorfile_caption,announcement_lecture.file_path, announcement_lecture.file_name, section_list.sectionNo, section_list.section_name 
		from section_list inner join section on section_list.sectionID=section.sectionID 
		inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
		inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created 
		where announcement_lecture.date_created = '$edit_post_date' 
		order by date_created desc";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

		$first = true;
		echo "{\"edit_post\": [";
		while($row = mysqli_fetch_array($fetch))
		{
			if($first) 
			{
				echo json_encode($row);
				$first = false;
			}		 
			else 
			{
				echo ',' . json_encode($row);
			}
		}
		
		echo "]}";	
	}

	if(isset($_GET['edit-post-form']))
	{
		
		$response = array();

		$date_created = $_POST['edpostdate'];
		$messageorfile_caption = clean($_POST['edpostmorf']);
		$file_path = clean($_POST['edpostfile_path']);
		$file_name = clean($_POST['edpostfile_name']);


		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($messageorfile_caption) )
		{
		
			$result=post_file($date_created);

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="UPDATE announcement_lecture 
				SET messageorfile_caption = '$messageorfile_caption', file_path = '$file_path', file_name = '".$result['file_name']."' where date_created='$date_created'";			  

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Post Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without file update
			{
				$sql="UPDATE announcement_lecture 
				SET messageorfile_caption = '$messageorfile_caption', file_path = '$file_path' where date_created='$date_created'";	

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database.');
				if($successful)
				{
					$response = array('success' => 'Post Information Updated');
				}	
			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}

		echo json_encode($response);			
	}

	function post_file($date_created)
	{
	
		$data = array();

			if(!empty($_FILES['edpostfile']['name']))
			{
				$name = $_FILES['edpostfile']['name'];
				$tmp_name = $_FILES['edpostfile']['tmp_name'];
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
					
						$location = "../../model/uploaded_files/";

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

						$sql="SELECT file_name FROM announcement_lecture where date_created='$date_created' and file_name='$name'";

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
								$data=array('success' => 'File Saved','file_name' => $name);
							}
							else
							{
								$data = array('error'=>'There was an error uploading your file');
							}	
						}	
						
					
						
				}
				else
				{
					$data = array('error'=>'Invalid file extension');
				}
			}
			else
			{
				$data = array('empty'=>'$_FILES is empty');
			}	

				return $data;
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
		
?>