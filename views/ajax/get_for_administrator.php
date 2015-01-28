
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
	
				$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
	
			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
			  
						
			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
			  
						
			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
			$sql="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
			section_list.sectionNo, section_list.section_name, registration.reg_lname, registration.reg_fname, registration.reg_mname 
			from section_list inner join section on section_list.sectionID=section.sectionID
			inner join registration on section.teacherID=registration.reg_id 
			inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
			inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created 
			where CAST(announcement_lecture.date_created as char) LIKE '%$ps_filter%' or announcement_lecture.messageorfile_caption LIKE '%$ps_filter%' 
			or announcement_lecture.file_path LIKE '%$ps_filter%' or announcement_lecture.file_name LIKE '%$ps_filter%' or section_list.sectionNo LIKE '%$ps_filter%' 
			or section_list.section_name LIKE '%$ps_filter%' order by date_created desc";
			
			$sql= mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
			$sql="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, announcement_lecture.file_name, 
			section_list.sectionNo, section_list.section_name, registration.reg_lname, registration.reg_fname, registration.reg_mname 
			from section_list inner join section on section_list.sectionID=section.sectionID
			inner join registration on section.teacherID=registration.reg_id 
			inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
			inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created order by date_created desc";
			
			$sql= mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
		$reg_birthday = date('Y-m-d',strtotime($_POST['edadmbirthday']));
		$reg_address = clean($_POST['edadmaddress']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday))
		{
		
			$result=admin_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{
				$sql="UPDATE registration SET reg_lname = '$reg_lname', reg_fname = '$reg_fname', reg_mname = '$reg_mname', 
								  reg_gender = '$reg_gender', reg_status = '$reg_status', reg_birthday = '".$reg_birthday."',
								  reg_address = '$reg_address', image = '".$result['file_name']."' where reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Admin Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration SET reg_lname = '$reg_lname', reg_fname = '$reg_fname', reg_mname = '$reg_mname', 
								  reg_gender = '$reg_gender', reg_status = '$reg_status', reg_birthday = '".$reg_birthday."', reg_address = '$reg_address' where reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
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
		else
		{
			$response = array('error' => 'The form is incomplete');
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

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
		$reg_birthday = date('Y-m-d',strtotime($_POST['edteachbirthday']));
		$reg_address = clean($_POST['edteachaddress']);
		$t_position = clean($_POST['edteachtposition']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday))
		{
		
			$result=teacher_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="UPDATE registration inner join teacher on registration.reg_id=teacher.teacherID 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
					registration.reg_address = '$reg_address', registration.image = '".$result['file_name']."', 
					teacher.t_position='$t_position' where registration.reg_id='$id'";			  

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Teacher Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration inner join teacher on registration.reg_id=teacher.teacherID 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
					registration.reg_address = '$reg_address', teacher.t_position='$t_position' where registration.reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
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
		else
		{
			$response = array('error' => 'The form is incomplete');
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

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
		$reg_birthday = date('Y-m-d',strtotime($_POST['edstudbirthday']));
		$reg_address = clean($_POST['edstudaddress']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday))
		{
		
			$result=student_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
					registration.reg_address = '$reg_address', registration.image = '".$result['file_name']."' 
					where registration.reg_id='$id'";			  

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Student Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
					registration.reg_address = '$reg_address' where registration.reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
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
		else
		{
			$response = array('error' => 'The form is incomplete');
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

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Subject Information Updated');
				}	
				else 
				{
					$response = array('error' => 'Subject Information Update Failed');
				}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	if(isset($_GET['edit_section_id']))
	{
		$edit_section_id=$_GET['edit_section_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT * FROM section_list where sectionID = '$edit_section_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Section Information Updated');
				}	
				else 
				{
					$response = array('error' => 'Section Information Update Failed');
				}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	if(isset($_GET['edit_grade_id']))
	{
		$edit_grade_id=$_GET['edit_grade_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT * FROM grade_level where levelID = '$edit_grade_id'";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Grade Level Information Updated');
				}	
				else 
				{
					$response = array('error' => 'Grade Level Update Failed');
				}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	if(isset($_GET['announcement_lecture_id']))
	{
		$edit_post_date=$_GET['announcement_lecture_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT announcement_lecture.date_created, announcement_lecture.messageorfile_caption,announcement_lecture.file_path, announcement_lecture.file_name, 
		section_list.sectionNo, section_list.section_name, registration.reg_lname, registration.reg_fname, registration.reg_mname 
		from section_list inner join section on section_list.sectionID=section.sectionID 
		inner join registration on section.teacherID=registration.reg_id 
		inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
		inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created
		where announcement_lecture.date_created = '$edit_post_date' 
		order by announcement_lecture.date_created desc";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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


		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($messageorfile_caption) )
		{
		
			$result=post_file($date_created);

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="UPDATE announcement_lecture 
				SET messageorfile_caption = '$messageorfile_caption', file_name = '".$result['file_name']."' where date_created='$date_created'";			  

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Post Information Updated');
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without file update
			{
				$sql="UPDATE announcement_lecture 
				SET messageorfile_caption = '$messageorfile_caption' where date_created='$date_created'";	

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
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
		else
		{
			$response = array('error' => 'The form is incomplete');
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

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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

	//add admin
	if(isset($_GET['create-admin-id']))
	{
		$admin_id=createAdminId();

		echo "{\"create_admin_id\": [{\"admin_id\":". json_encode($admin_id)."}]}";

	}

	if(isset($_GET['add-admin-form']))
	{
		
		$response = array();

		$id = $_POST['addadmid'];
		$reg_lname = clean($_POST['addadmlname']);
		$reg_fname = clean($_POST['addadmfname']);
		$reg_mname = clean($_POST['addadmmname']);
		$reg_gender = clean($_POST['addadmgender']);
		$reg_status = clean($_POST['addadmstatus']);
		$reg_birthday = date('Y-m-d',strtotime($_POST['addadmbirthday']));
		$reg_address = clean($_POST['addadmaddress']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday))
		{
			
			$result=new_admin_img();

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, reg_address, image) 
										VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','$reg_address','".$result['file_name']."')";

				$registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($registered)
				{
					$sql="INSERT INTO admin (admin_id) VALUES ('$id')";

					$admin_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($admin_created)
					{
						$response = array('success' => 'New Administrator Account Created');
					}
					else
					{
						$response = array('error' => 'Add Administrator Failed');
					}	
					
					
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image
			{
				$response = array('error' => $result['empty']);
			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);
				
	}

	function new_admin_img()
	{
	
		$data = array();

			if(!empty($_FILES['addadmimg']['name']))
			{
				$name = $_FILES['addadmimg']['name'];
				$tmp_name = $_FILES['addadmimg']['tmp_name'];
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

						$sql="SELECT image FROM registration where image='$name'";

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
				$data = array('empty'=>'upload file is empty');
			}	

				return $data;
	}
	
	//add teacher
	if(isset($_GET['create-teacher-id']))
	{
		$teacher_id=createTeacherId();

		echo "{\"create_teacher_id\": [{\"teacher_id\":". json_encode($teacher_id)."}]}";

	}

	if(isset($_GET['add-teacher-form']))
	{
		
		$response = array();

		$id = $_POST['addteachid'];
		$reg_lname = clean($_POST['addteachlname']);
		$reg_fname = clean($_POST['addteachfname']);
		$reg_mname = clean($_POST['addteachmname']);
		$reg_gender = clean($_POST['addteachgender']);
		$reg_status = clean($_POST['addteachstatus']);
		$reg_birthday = date('Y-m-d',strtotime($_POST['addteachbirthday']));
		$reg_address = clean($_POST['addteachaddress']);
		$t_position = clean($_POST['addteachtposition']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday))
		{
		
			$result=new_teacher_img();

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, reg_address, image) 
										VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','$reg_address','".$result['file_name']."')";

				$registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($registered)
				{
					$sql="INSERT INTO teacher (teacherID, t_position) VALUES ('$id', '$t_position')";

					$teacher_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($teacher_created)
					{
						$response = array('success' => 'New Teacher Account Created');
					}
					else
					{
						$response = array('error' => 'Add Teacher Failed');
					}
				}
			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$response = array('error' => $result['empty']);
			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	function new_teacher_img()
	{
	
		$data = array();

			if(!empty($_FILES['addteachimg']['name']))
			{
				$name = $_FILES['addteachimg']['name'];
				$tmp_name = $_FILES['addteachimg']['tmp_name'];
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

						$sql="SELECT image FROM registration where image='$name'";

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
				$data = array('empty'=>'upload file is empty');
			}	

				return $data;
	}

	//add student
	if(isset($_GET['create-student-id']))
	{
		$student_id=createStudentId();

		echo "{\"create_student_id\": [{\"student_id\":". json_encode($student_id)."}]}";

	}

	if(isset($_GET['add-student-form']))
	{
		
		$response = array();

		$id = $_POST['addstudid'];
		$reg_lname = clean($_POST['addstudlname']);
		$reg_fname = clean($_POST['addstudfname']);
		$reg_mname = clean($_POST['addstudmname']);
		$reg_gender = clean($_POST['addstudgender']);
		$reg_status = clean($_POST['addstudstatus']);
		$reg_birthday = date('Y-m-d',strtotime($_POST['addstudbirthday']));
		$reg_address = clean($_POST['addstudaddress']);
		$parent_lname = clean($_POST['addstudparentlname']);
		$parent_fname = clean($_POST['addstudparentfname']);
		$parent_mname = clean($_POST['addstudparentmname']);
		$parent_defaultbday = date('Y-m-d');

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday) and !empty($parent_lname) and !empty($parent_fname))
		{
		
			$result=new_student_img();

			if(isset($result['success']) || array_key_exists('success', $result))
			{
				$parent_id=createParentId();

				$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_birthday) 
										VALUES ('$parent_id','$reg_lname','$reg_fname','$reg_mname', '".$parent_defaultbday."')";

				$p_registered=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($p_registered)
				{
					$sql="INSERT INTO parent(parentID) VALUES ('$parent_id')";

					$p_added=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

					if($p_added)
					{
						$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, reg_address, image) 
										VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','$reg_address','".$result['file_name']."')";

						$s_registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
						if($s_registered)
						{
							$sql="INSERT INTO student (student_lrn, parentID) VALUES ('$id', '$parent_id')";

							$student_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
							if($student_created)
							{
								$response = array('success' => 'New Student Account Created');
							}
							else
							{
								$response = array('error' => 'Add Student Failed');
							}
						}
					}	
				}						

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$response = array('error' => $result['empty']);
			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	function new_student_img()
	{
	
		$data = array();

			if(!empty($_FILES['addstudimg']['name']))
			{
				$name = $_FILES['addstudimg']['name'];
				$tmp_name = $_FILES['addstudimg']['tmp_name'];
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

						$sql="SELECT image FROM registration where image='$name'";

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

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
				$data = array('empty'=>'upload file is empty');
			}	

				return $data;
	}

	//add subject
	if(isset($_GET['create-subject-id']))
	{
		$subject_id=createSubjectId();

		echo "{\"create_subject_id\": [{\"subject_id\":". json_encode($subject_id)."}]}";

	}

	if(isset($_GET['add-subject-form']))
	{
		
		$response = array();

		$id = $_POST['addsubid'];
		$subject_title = clean($_POST['addsubtitle']);
		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($subject_title) )
		{
		
				$sql="INSERT INTO subject_ (subjectID, subject_title) VALUES ('$id', '$subject_title')";

				$subject_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($subject_created)
				{
					$response = array('success' => 'New Subject Created');
				}	
				else 
				{
					$response = array('error' => 'Add Subject Failed');
				}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	//add section
	if(isset($_GET['create-section-id']))
	{
		$section_id=createSectionId();

		echo "{\"create_section_id\": [{\"section_id\":". json_encode($section_id)."}]}";

	}

	if(isset($_GET['add-section-form']))
	{
		
		$response = array();

		$id= $_POST['addsecid'];
		$sectionNo = clean($_POST['addsecno']);
		$section_name= clean($_POST['addsecname']);
		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($sectionNo) and !empty($section_name) )
		{
		
				$sql="INSERT INTO section_list(sectionID, sectionNo, section_name) VALUES ('$id','$sectionNo','$section_name')";

				$section_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($section_created)
				{
					$response = array('success' => 'New Section Added');
				}	
				else 
				{
					$response = array('error' => 'Add Section Failed');
				}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	//add grade
	if(isset($_GET['create-grade-id']))
	{
		$grade_id=createGradeId();

		echo "{\"create_grade_id\": [{\"grade_id\":". json_encode($grade_id)."}]}";

	}

	if(isset($_GET['add-grade-form']))
	{
		
		$response = array();

		$id= $_POST['addgradeid'];
		$level_description = clean($_POST['addgradedesc']);		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($level_description) )
		{

				$sql="INSERT INTO grade_level (levelID, level_description) VALUES ('$id','$level_description')";

				$grade_level_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($grade_level_created)
				{
					$response = array('success' => 'New Grade Level Added');
				}	
				else 
				{
					$response = array('error' => 'Add Grade Level Failed');
				}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	//add post
	if(isset($_GET['create-post-id']))
	{
		$post_id=date('Y-m-d H:i:s');

		echo "{\"create_post_id\": [{\"post_id\":". json_encode($post_id)."}";

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT distinct section.teacherID, registration.reg_lname, registration.reg_fname, registration.reg_mname 
		from section inner join teacher on section.teacherID=teacher.teacherID 
		inner join registration on teacher.teacherID=registration.reg_id order by registration.reg_lname";

		$fetch=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

		$first = true;
		echo "],\"create_post_teacher_list\": [";
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

	if(isset($_GET['add-post-sectionlist']))
	{
		$selected_teacher=$_GET['selected_teacher'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT distinct section.sectionID, section_list.sectionNo, section_list.section_name 
		FROM section inner join section_list on section.sectionID=section_list.sectionID 
		where section.teacherID='$selected_teacher'";

		$section_list=mysqli_query($cxn, $sql) or die('Unable to connect to Database'.mysqli_error($cxn));

		$first = true;
		echo "{\"section_list\":[";
		while($row = mysqli_fetch_array($section_list))
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

	if(isset($_GET['add-post-form']))
	{
		
		$response = array();

		$date_created = $_POST['addpostdate'];
		$messageorfile_caption = clean($_POST['addpostmorf']);
		$teacher_id=clean($_POST['teacher']);
		$section_id=clean($_POST['section']);

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($messageorfile_caption) and !empty($teacher_id) and !empty($section_id) )
		{
		
			$result=new_post_file();

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="INSERT INTO announcement_lecture(date_created, messageorfile_caption, file_path, file_name) 
												VALUES ('$date_created','$messageorfile_caption','model/uploaded_files/','".$result['file_name']."')";			  

				$post_inserted = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($post_inserted )
				{
					$query="SELECT class_rec_no from section where section.teacherID = '$teacher_id' and section.sectionID='$section_id'"; 

			        $fetch_class_rec= mysqli_query($cxn,$query);


			        while($each_rec = mysqli_fetch_array($fetch_class_rec))
			        {
			            
			            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$date_created."')";

			            $insert_done=mysqli_query($cxn,$insert);

			            if($insert_done)
			            {
			            	$response = array('success' => 'New Post Created');
			            }
			            else 
						{
							$response = array('error' => 'Add Post Failed');
						}		
			        }
					
				}
				else 
				{
					$response = array('error' => 'Add Post Failed');
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without file update
			{
				$sql="INSERT INTO announcement_lecture(date_created, messageorfile_caption) 
												VALUES ('$date_created','$messageorfile_caption')";			  

				$post_inserted = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($post_inserted )
				{

			        $query="SELECT class_rec_no from section where section.teacherID = '$teacher_id' and section.sectionID='$section_id'"; 

			        $fetch_class_rec= mysqli_query($cxn,$query);


			        while($each_rec = mysqli_fetch_array($fetch_class_rec))
			        {
			            
			            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$date_created."')";

			            $insert_done=mysqli_query($cxn,$insert);

			            if($insert_done)
			            {
			            	$response = array('success' => 'New Post Created');
			            }
			            else 
						{
							$response = array('error' => 'Add Post Failed');
						}		
			        }

				}
				else 
				{
					$response = array('error' => 'Add Post Failed');
				}	

			}	
			else if(isset($result['error']) || array_key_exists('error', $result))
			{
				$response = array('error' => $result['error']);
			}
					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	function new_post_file()
	{
	
		$data = array();

			if(!empty($_FILES['addpostfile']['name']))
			{
				$name = $_FILES['addpostfile']['name'];
				$tmp_name = $_FILES['addpostfile']['tmp_name'];
				
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

						$sql="SELECT file_name FROM announcement_lecture where file_name='$name'";

        				$result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

        				$file_exists = mysqli_num_rows($result);


						if($file_exists > 0)
						{
							$data = array('error' => 'File already exist');
						} 
						else
						{
							
							if(move_uploaded_file($tmp_name,$location.$name))
							{
								
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

	function createAdminId()
	{

    $rand1int=$rand6int=$admin_id=$strdate=$datetoday="";

        $strdate = explode('-',date("Y-m-d"));
        $strdate0=substr($strdate[0], 2, 2); 
        $datetoday=$strdate0.$strdate[1].$strdate[2];
        
        $rand1int=strval(mt_rand (0,9));
        $rand6int=strval(mt_rand (100000,999999));


        $admin_id="MA" . $datetoday . $rand1int . "-" . $rand6int;

        return $admin_id;

	}

	function createTeacherId()
	{
	    $rand1int=$rand6int=$teacher_id=$strdate=$datetoday="";

	        $strdate = explode('-',date("Y-m-d"));
	        $strdate0=substr($strdate[0], 2, 2); 
	        $datetoday=$strdate0.$strdate[1].$strdate[2];
	        
	        $rand1int=strval(mt_rand (0,9));
	        $rand6int=strval(mt_rand (100000,999999));


	        $teacher_id="MT" . $datetoday . $rand1int . "-" . $rand6int;

	        return $teacher_id;

	}

	function createStudentId()
	{
	    $rand1int=$rand6int=$student_id=$strdate=$datetoday="";

	        $strdate = explode('-',date("Y-m-d"));
	        $strdate0=substr($strdate[0], 2, 2); 
	        $datetoday=$strdate0.$strdate[1].$strdate[2];
	        
	        $rand1int=strval(mt_rand (0,9));
	        $rand6int=strval(mt_rand (100000,999999));


	        $student_id="MS" . $datetoday . $rand1int . "-" . $rand6int;

	        return $student_id;

	}

	function createParentId()
	{
	    $rand1int=$rand6int=$parent_id=$strdate=$datetoday="";

	        $strdate = explode('-',date("Y-m-d"));
	        $strdate0=substr($strdate[0], 2, 2); 
	        $datetoday=$strdate0.$strdate[1].$strdate[2];
	        
	        $rand1int=strval(mt_rand (0,9));
	        $rand6int=strval(mt_rand (100000,999999));


	        $parent_id="MP" . $datetoday . $rand1int . "-" . $rand6int;

	        return $parent_id;

	}

	function createSubjectId()
	{
	    $rand4int=$subject_id="";
	        
	        $rand4int=strval(mt_rand ( 1000 , 9999 ));

	        $subject_id="EAS-" . $rand4int;

	        return $subject_id;
	}

	function createSectionId()
	{
	    $rand5int=$section_id="";
	        
	        $rand5int=strval(mt_rand ( 10000 , 99999 ));

	        $section_id="S" . $rand5int;

	        return $section_id;
	}

	function createGradeId()
	{
	    $rand4int=$grade_id="";
	        
	        $rand4int=strval(mt_rand ( 1000 , 9999 ));

	        $grade_id="G" . $rand4int;

	        return $grade_id;
	}						
		
?>