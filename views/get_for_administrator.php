
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
			$sql="Select * from section_list where sectionNo LIKE '%$scs_filter%' or section_name LIKE '%$scs_filter%'";

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
		
?>