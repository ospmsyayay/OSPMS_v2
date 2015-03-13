
<?php 
	if(isset($_GET['cs']))
	{
		$sy=get_school_year();

		echo "{\"cs\": [{\"school_year\":". json_encode($sy)."}]";
		$fetch_level=get_allgradelevel();
		$first = true;
			echo ",\"level\": [";
			while($display = mysqli_fetch_array($fetch_level))
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

		$fetch_subject=get_allsubject();
		$first = true;
			echo "],\"subject\": [";
			while($display = mysqli_fetch_array($fetch_subject))
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

		$fetch_teacher=get_allteacher();
		$first = true;
			echo "],\"teacher\": [";
			while($display = mysqli_fetch_array($fetch_teacher))
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

		$fetch_existing_students=get_existing_students();
		$first = true;
			echo "],\"ex_students\": [";
			while($display = mysqli_fetch_array($fetch_existing_students))
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

	if(isset($_GET['cs-get-section']))
	{
		$levelID=$_GET['levelID'];
		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT section_list.sectionID, section_list.sectionNo, section_list.section_name, grade_level.level_description 
		FROM section_list inner join grade_level on section_list.level_id=grade_level.levelID where section_list.level_id='$levelID'"; 

		$fetch_section=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

		$first = true;
			echo "{\"section\": [";
			while($display = mysqli_fetch_array($fetch_section))
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

	if(isset($_GET['ap']))
	{
		$fetch=get_alladmin();
		$first = true;
			echo "{\"ap\": [";
			while($display = mysqli_fetch_array($fetch))
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

	if(isset($_GET['tp']))
	{
		$fetch=get_allteacher();
		$first = true;
			echo "{\"tp\": [";
			while($display = mysqli_fetch_array($fetch))
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

	if(isset($_GET['sp']))
	{
		$fetch=get_allstudent();
		$first = true;
			echo "{\"sp\": [";
			while($display = mysqli_fetch_array($fetch))
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

	if(isset($_GET['scs']))
	{
		$fetch=get_allsection();
		$first = true;
			echo "{\"scs\": [";
			while($display = mysqli_fetch_array($fetch))
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

	if(isset($_GET['sbs']))
	{
		$fetch=get_allsubject();
		$first = true;
			echo "{\"sbs\": [";
			while($display = mysqli_fetch_array($fetch))
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

	if(isset($_GET['gl']))
	{
		$fetch=get_allgradelevel();
		$first = true;
			echo "{\"gl\": [";
			while($display = mysqli_fetch_array($fetch))
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

	if(isset($_GET['ua']))
	{
		$fetch=get_allaccounts();
		$first = true;
			echo "{\"ua\": [";
			while($display = mysqli_fetch_array($fetch))
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

function get_alladmin()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$join="Select registration.* from admin inner join registration on admin.admin_id=registration.reg_id";
	  
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

	
	return $join_result;
	

}

function get_allteacher()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$join="Select  registration.*, teacher.t_position from teacher inner join registration on teacher.teacherID=registration.reg_id";
	  
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

	
	return $join_result;
	

}

function get_allstudent()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$join="SELECT registration1.*,registration2.reg_lname,registration2.reg_fname,registration2.reg_mname 
	from student as studentprofile inner join registration as registration1 on studentprofile.student_lrn=registration1.reg_id 
	left join parent as parentprofile on studentprofile.parentID=parentprofile.parentID 
	left join registration as registration2 on parentprofile.parentID=registration2.reg_id";
	  
				
	$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

	
	return $join_result;
	


}

function get_allsubject()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$sql="Select * from subject_";

	$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
	return $sql;
}

function get_allsection()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$sql="SELECT section_list.sectionID, section_list.sectionNo, section_list.section_name, grade_level.level_description 
	FROM section_list inner join grade_level on section_list.level_id=grade_level.levelID order by grade_level.level_description, sectionNo ";

	$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

	return $sql;
}

function get_allgradelevel()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$sql="Select * from grade_level";

	$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

	return $sql;


}


function get_allaccounts()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$sql="SELECT create_account.*, registration.reg_fname, registration.reg_lname FROM create_account 
	inner join registration on create_account.account_id=registration.reg_id";

	$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

	return $sql;
}

function get_school_year()
{
    $current_year = date("Y", strtotime("today"));
    return strval($current_year).'-'.strval($current_year+1);
                        
}    

function get_existing_students()
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

	$sql="SELECT distinct registration.reg_id, registration.reg_lname, registration.reg_fname, registration.reg_mname, student_schedule_line.grade 
	from student inner join registration on student.student_lrn = registration.reg_id 
	left join student_schedule_line on student.student_lrn=student_schedule_line.student_lrn order by grade";

	$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
	return $sql;
}
	if(isset($_GET['cs_filter']))
	{
		$cs_filter=$_GET['cs_filter'];
		/*echo "{\"filter\": [" . json_encode($cs_filter). "]}";*/
		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($cs_filter))
		{
				
				$join="SELECT distinct registration.reg_id, registration.reg_lname, registration.reg_fname, registration.reg_mname, student_schedule_line.grade 
						from student inner join registration on student.student_lrn = registration.reg_id 
						left join student_schedule_line on student.student_lrn=student_schedule_line.student_lrn 
						where reg_lname LIKE '%$cs_filter%' or reg_fname LIKE '%$cs_filter%' 
						or reg_mname LIKE '%$cs_filter%' or grade LIKE '%$cs_filter%' 
						order by grade"; 
	
				$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

				$first = true;
				echo "{\"cs_filter\": [";
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
		else if(empty($cs_filter))
		{

			$join="SELECT distinct registration.reg_id, registration.reg_lname, registration.reg_fname, registration.reg_mname, student_schedule_line.grade 
					from student inner join registration on student.student_lrn = registration.reg_id 
					left join student_schedule_line on student.student_lrn=student_schedule_line.student_lrn order by grade";
	
			$join_result=mysqli_query($cxn,$join) or die('Unable to connect to Database. '. mysqli_error($cxn));

			$first = true;
			echo "{\"cs_filter\": [";
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
			$sql="SELECT section_list.sectionID, section_list.sectionNo, section_list.section_name, grade_level.level_description 
			FROM section_list inner join grade_level on section_list.level_id=grade_level.levelID
			where section_list.sectionID LIKE '%$scs_filter%' or section_list.sectionNo LIKE '%$scs_filter%' or section_list.section_name LIKE '%$scs_filter%' or
			grade_level.level_description LIKE '%$scs_filter%' order by grade_level.level_description, sectionNo ";

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
			$sql="SELECT section_list.sectionID, section_list.sectionNo, section_list.section_name, grade_level.level_description 
			FROM section_list inner join grade_level on section_list.level_id=grade_level.levelID order by grade_level.level_description, sectionNo ";

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

	if(isset($_GET['ua_filter']))
	{
		$ua_filter=$_GET['ua_filter'];
		/*echo "{\"filter\": [" . json_encode($ua_filter). "]}";*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if(!empty($ua_filter))
		{
			$sql="SELECT create_account.*, registration.reg_fname, registration.reg_lname 
					from create_account inner join registration on create_account.account_id=registration.reg_id 
					where create_account.username_ LIKE '%$ua_filter%' or create_account.password_ LIKE '%$ua_filter%' 
					or create_account.secret_question LIKE '%$ua_filter%' or create_account.secret_answer LIKE '%$ua_filter%' or create_account.user_type LIKE '%$ua_filter%'
					or create_account.account_id LIKE '%$ua_filter%' or registration.reg_fname LIKE '%$ua_filter%' or registration.reg_lname LIKE '%$ua_filter%'";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

			$first = true;
			echo "{\"ua_filter\": [";
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
		else if(empty($ua_filter))
		{
			$sql="SELECT * from create_account inner join registration on create_account.account_id=registration.reg_id";

			$sql=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

			$first = true;
			echo "{\"ua_filter\": [";
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

	//edit

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
		/*$reg_address = clean($_POST['edadmaddress']);*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday))
		{
		
			$result=admin_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{
				$sql="UPDATE registration SET reg_lname = '$reg_lname', reg_fname = '$reg_fname', reg_mname = '$reg_mname', 
								  reg_gender = '$reg_gender', reg_status = '$reg_status', reg_birthday = '".$reg_birthday."',
								  image = '".$result['file_name']."' where reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Admin Information Updated');
					
				}
				else
				{
					$response = array('error' => 'Update Admin Information Failed');
				}	

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration SET reg_lname = '$reg_lname', reg_fname = '$reg_fname', reg_mname = '$reg_mname', 
								  reg_gender = '$reg_gender', reg_status = '$reg_status', reg_birthday = '".$reg_birthday."' where reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Admin Information Updated');
				}
				else
				{
					$response = array('error' => 'Update Admin Information Failed');
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
/*		$reg_address = clean($_POST['edteachaddress']);
		$t_position = clean($_POST['edteachtposition']);*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday))
		{
		
			$result=teacher_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="UPDATE registration inner join teacher on registration.reg_id=teacher.teacherID 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
				 	registration.image = '".$result['file_name']."' where registration.reg_id='$id'";			  

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Teacher Information Updated');
					
				}
				else
				{
					$response = array('error' => 'Update Teacher Information Failed');
				}		

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				$sql="UPDATE registration inner join teacher on registration.reg_id=teacher.teacherID 
				SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
					registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."'
				    where registration.reg_id='$id'";

				$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($successful)
				{
					$response = array('success' => 'Teacher Information Updated');
				}
				else
				{
					$response = array('error' => 'Update Teacher Information Failed');
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

		$sql="SELECT registration1.*,registration2.reg_id, registration2.reg_lname,registration2.reg_fname,registration2.reg_mname from student as studentprofile 
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
/*		$reg_address = clean($_POST['edstudaddress']);*/
		$parentid = clean($_POST['edstudparentid']);
		$parent_lname = clean($_POST['edstudparentlname']);
		$parent_fname = clean($_POST['edstudparentfname']);
		$parent_mname = clean($_POST['edstudparentmname']);
		$parent_defaultbday = date('Y-m-d');

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday) and !empty($parentid) and !empty($parent_lname) and ! empty($parent_fname) )
		{
		
			$result=student_img($id);

			if(isset($result['success']) || array_key_exists('success', $result))
			{
				if($parentid!='null')
				{
					//update parent first
					$sql="UPDATE registration inner join parent on registration.reg_id=parent.parentID 
					inner join student on parent.parentID=student.parentID 
					SET registration.reg_lname = '$parent_lname', registration.reg_fname = '$parent_fname', registration.reg_mname = '$parent_mname' 
					where registration.reg_id='$parentid'";		
					$p_updated = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($p_updated)
					{
						//update student
						$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn
						SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
							registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
						    registration.image = '".$result['file_name']."' 
							where registration.reg_id='$id'";			  

						$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
						if($successful)
						{
							$response = array('success' => 'Student Information Updated');
							
						}
						else
						{
							$response = array('error' => 'Update Student Information Failed');
						}		
					}
					else
					{
						$response = array('error' => 'Update Student Information Failed');
					}		

				}
				else if($parentid=='null')
				{
					$parent_id=createParentId();

					$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_birthday) 
											VALUES ('$parent_id','$parent_lname','$parent_fname','$parent_mname', '".$parent_defaultbday."')";

					$p_registered=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($p_registered)
					{
						$sql="INSERT INTO parent(parentID) VALUES ('$parent_id')";

						$p_added=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

						$pusername=createUsername($parent_id,$parent_fname,$parent_mname,$parent_lname);
						$ppassword=generate_password_alphanum(8);

						$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
						VALUES ('$pusername', '$ppassword', 'parent', '$parent_id')";

						$paccount_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

						if($p_added)
						{
							//update student schedule line
							$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn
							SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
								registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
								registration.image = '".$result['file_name']."', student.parentID = '$parent_id' 
								where registration.reg_id='$id'";	

							$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
							if($successful)
							{
								$response = array('success' => 'Student Information Updated');
							}
							else
							{
								$response = array('error' => 'Update Student Information Failed');
							}
						}
						else
						{
							$response = array('error' => 'Update Student Information Failed');
						}						
					}
					else
					{
						$response = array('error' => 'Update Student Information Failed');
					}					
				}	
				

			}

			else if(isset($result['empty']) || array_key_exists('empty', $result))//without image update
			{
				if($parentid!='null')
				{
					//update parent first
					$sql="UPDATE registration inner join parent on registration.reg_id=parent.parentID 
					inner join student on parent.parentID=student.parentID 
					SET registration.reg_lname = '$parent_lname', registration.reg_fname = '$parent_fname', registration.reg_mname = '$parent_mname' 
					where registration.reg_id='$parentid'";		
					$p_updated = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($p_updated)
					{
						$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn 
						SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
							registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."'
							where registration.reg_id='$id'";

						$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
						if($successful)
						{
							$response = array('success' => 'Student Information Updated');
						}
						else
						{
							$response = array('error' => 'Update Student Information Failed');
						}			
					}
					else
					{
						$response = array('error' => 'Update Student Information Failed');
					}		
				}
				else if($parentid=='null')
				{
					$parent_id=createParentId();

					$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_birthday) 
											VALUES ('$parent_id','$parent_lname','$parent_fname','$parent_mname', '".$parent_defaultbday."')";

					$p_registered=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($p_registered)
					{
						$sql="INSERT INTO parent(parentID) VALUES ('$parent_id')";

						$p_added=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

						$pusername=createUsername($parent_id,$parent_fname,$parent_mname,$parent_lname);
						$ppassword=generate_password_alphanum(8);

						$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
						VALUES ('$pusername', '$ppassword', 'parent', '$parent_id')";

						$paccount_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

						if($p_added)
						{
							//update student schedule line
							$sql="UPDATE registration inner join student on registration.reg_id=student.student_lrn 
							SET registration.reg_lname = '$reg_lname', registration.reg_fname = '$reg_fname', registration.reg_mname = '$reg_mname', 
							registration.reg_gender = '$reg_gender', registration.reg_status = '$reg_status', registration.reg_birthday = '".$reg_birthday."',
							student.parentID = '$parent_id' where registration.reg_id='$id'";	

							$successful = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
							if($successful)
							{
								$response = array('success' => 'Student Information Updated');
							}
							else
							{
								$response = array('error' => 'Update Student Information Failed');
							}
						}
						else
						{
							$response = array('error' => 'Update Student Information Failed');
						}						
					}
					else
					{
						$response = array('error' => 'Update Student Information Failed');
					}				

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
	//add schedule
	if(isset($_GET['add-class-sched']))
	{
		$response = array();

		$school_year = $_POST['schoolyear'];
		$levelID = $_POST['level'];
		$sectionID = $_POST['section'];
		$subjectID = $_POST['subject'];
		$teacherID = $_POST['teacher'];
		$sched_days = $_POST['schedday'];
		$sched_start_time = date("H:i", strtotime($_POST['schedstart']));
		$sched_end_time = date("H:i", strtotime($_POST['schedend']));

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		if( !empty($school_year) and !empty($levelID) and !empty($sectionID) and !empty($subjectID) and !empty($teacherID) 
			and !empty($sched_days) and !empty($sched_start_time) and !empty($sched_end_time) )
		{
			//check first if sched exist

			$sql="SELECT * FROM section where sectionID='$sectionID' and sched_days='$sched_days' and sched_start_time ='".$sched_start_time."' 
										and sched_end_time='".$sched_end_time."' and subjectID = '$subjectID' and teacherID= '$teacherID' 
										and levelID = '$levelID' and school_year='$school_year'";
			
			$check_sched=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

			$num_rows = mysqli_num_rows($check_sched);
			if ($num_rows==0)
			{
				$class_rec_no=createClassRecNo();

				$sql="INSERT INTO section (class_rec_no, sectionID, sched_days, sched_start_time, sched_end_time, subjectID, teacherID, levelID, school_year) 
										VALUES ('$class_rec_no','$sectionID','$sched_days','".$sched_start_time."','".$sched_end_time."','$subjectID','$teacherID','$levelID','$school_year')";
				$schedule_inserted=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($schedule_inserted==true)
				{
					$response = array('class_rec_no' => $class_rec_no, 'levelID' => $levelID);
				}
				else
				{
					$response = array('error' => 'Insert Class Schedule Failed!');
				}	
			}
			else
			{
				$response = array('error' => 'Class Schedule Already Exist!');
			}	
			

			
		}
		else
		{
			$response = array('error' => 'Submit Goes Wrong! Form Incomplete');
		}	


		echo json_encode($response);

	}

	if(isset($_GET['add-student-to-schedule']))
	{
		$response = array();
		$tester=array();

		$add_student_to_schedule=json_decode($_POST['add_existing_student'], true);
		$class_rec_no=$_POST['class_rec_no'];
		$grade_level;

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		//Get first the level description
		$sql="SELECT grade_level.level_description FROM section 
		inner join grade_level on section.levelID=grade_level.levelID where class_rec_no='$class_rec_no'";
		$result = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
		while ($row = mysqli_fetch_array ($result))
	    {
	         $grade_level= $row ['level_description'];
			 
	    }

		//Insert the student ids
		foreach ($add_student_to_schedule as $key => $student_id) 
		{

			//check first if student already inserted
			$sql="SELECT * FROM student_schedule_line where class_rec_no='$class_rec_no' and student_lrn='$student_id'";
			$check = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
			$num_rows = mysqli_num_rows($check);
      
         	if ($num_rows==0)
            {
            	$sql="INSERT INTO student_schedule_line (class_rec_no, student_lrn, grade)
            											VALUES ('$class_rec_no','$student_id','$grade_level')";
            	$student_inserted = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
            	if($student_inserted==false)
            	{
            		$response = array('error' => 'Failed to insert Student ID: '.$student_id.' at '.$key );
            	}	
            }  

		}

		$response = array('success' => 'Students Successfully Added to Class Schedule');	

		echo json_encode($response);
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
		/*$reg_address = clean($_POST['addadmaddress']);*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday)  )
		{
			
			$result=new_admin_img();

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, image) 
										VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','".$result['file_name']."')";

				$registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($registered)
				{
					$sql="INSERT INTO admin (admin_id) VALUES ('$id')";

					$admin_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($admin_created)
					{

						$username=createUsername($id,$reg_fname,$reg_mname,$reg_lname);
						$password=generate_password_alphanum(8);

						$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
						VALUES ('$username', '$password', 'admin', '$id')";

						$account_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
						if($account_created)
						{
							$response = array('success' => 'New Administrator Account Created');
						}
						else
						{
							$response = array('error' => 'Add Administrator Failed');
						}	

					}
					else
					{
						$response = array('error' => 'Add Administrator Failed');
					}	
					
					
				}
				else
				{
					$response = array('error' => 'Add Administrator Failed');
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
/*		$reg_address = clean($_POST['addteachaddress']);
		$t_position = clean($_POST['addteachtposition']);*/

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday) )
		{
		
			$result=new_teacher_img();

			if(isset($result['success']) || array_key_exists('success', $result))
			{

				$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, image) 
										VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','".$result['file_name']."')";

				$registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($registered)
				{
					$sql="INSERT INTO teacher (teacherID) VALUES ('$id')";

					$teacher_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($teacher_created)
					{	
						$username=createUsername($id,$reg_fname,$reg_mname,$reg_lname);
						$password=generate_password_alphanum(8);

						$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
						VALUES ('$username', '$password', 'teacher', '$id')";

						$account_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
						if($account_created)
						{
							$response = array('success' => 'New Teacher Account Created');
						}
						else
						{
							$response = array('error' => 'Add Teacher Failed');
						}	

						
					}
					else
					{
						$response = array('error' => 'Add Teacher Failed');
					}
				}
				else
				{
					$response = array('error' => 'Add Teacher Failed');
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
/*		$reg_address = clean($_POST['addstudaddress']);*/
		$parent_lname = clean($_POST['addstudparentlname']);
		$parent_fname = clean($_POST['addstudparentfname']);
		$parent_mname = clean($_POST['addstudparentmname']);
		$parent_defaultbday = date('Y-m-d');

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($reg_lname) and !empty($reg_fname) and !empty($reg_birthday) and !empty($parent_lname) and !empty($parent_fname) )
		{
		
			$result=new_student_img();

			if(isset($result['success']) || array_key_exists('success', $result))
			{
				$parent_id=createParentId();

				$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_birthday) 
										VALUES ('$parent_id','$parent_lname','$parent_fname','$parent_mname', '".$parent_defaultbday."')";

				$p_registered=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				if($p_registered)
				{
					$sql="INSERT INTO parent(parentID) VALUES ('$parent_id')";

					$p_added=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

					$pusername=createUsername($parent_id,$parent_fname,$parent_mname,$parent_lname);
					$ppassword=generate_password_alphanum(8);

					$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
					VALUES ('$pusername', '$ppassword', 'parent', '$parent_id')";

					$paccount_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

					if($p_added)
					{
						$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, image) 
										VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','".$result['file_name']."')";

						$s_registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
						if($s_registered)
						{
							$sql="INSERT INTO student (student_lrn, parentID) VALUES ('$id', '$parent_id')";

							$student_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
							if($student_created)
							{
								$username=createUsername($id,$reg_fname,$reg_mname,$reg_lname);
								$password=generate_password_alphanum(8);

								$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
								VALUES ('$username', '$password', 'student', '$id')";

								$account_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
								if($account_created)
								{
									$response = array('success' => 'New Student Account Created');
								}
								else
								{
									$response = array('error' => 'Add Student Failed');
								}	

							}
							else
							{
								$response = array('error' => 'Add Student Failed');
							}
						}
						else
						{
							$response = array('error' => 'Add Student Failed');
						}
					}
					else
					{
						$response = array('error' => 'Add Student Failed');
					}

				}
				else
				{
					$response = array('error' => 'Add Student Failed');
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

		echo "{\"create_subject_id\": [{\"subject_id\":". json_encode($subject_id)."}";

		//get subject list
		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT subject_name FROM curr_subject_list";

		$subjectlist = mysqli_query($cxn, $sql) or die('Unable to connect to Database. Get Subject List Failed'. mysqli_error($cxn));

		$first = true;
		echo "],\"subjectlist\": [";
		while($display = mysqli_fetch_array($subjectlist))
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


	if(isset($_GET['add-subject-form']))
	{
		
		$response = array();

		$id = $_POST['addsubid'];
		$subject_title = clean($_POST['addsubtitle']);
		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($subject_title) )
		{
			
			//Check if subject name already existing

			$sql="SELECT subject_title FROM subject_ where subject_title='$subject_title'";
			$check_subject_if_exist = mysqli_query($cxn, $sql) or die('Unable to connect to Database. Check Subject If Exist Failed'. mysqli_error($cxn));
			$num_rows = mysqli_num_rows($check_subject_if_exist);
          
         	if ($num_rows==0)
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
            	$response = array('error' => 'Subject Already Existing');
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

		echo "{\"create_section_id\": [{\"section_id\":". json_encode($section_id)."}";
		$fetch_level=get_allgradelevel();
		$first = true;
			echo "],\"level\": [";
			while($display = mysqli_fetch_array($fetch_level))
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

	//get section list
	if(isset($_GET['get-section-list']))
	{
		$gradelevel=$_GET['gradelevel'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		$sql="SELECT section_name FROM curr_section_list where grade_level='$gradelevel'";

		$sectionlist = mysqli_query($cxn, $sql) or die('Unable to connect to Database. Get Section List Failed'. mysqli_error($cxn));

		$first = true;
		echo "{\"sectionlist\": [";
		while($display = mysqli_fetch_array($sectionlist))
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

	if(isset($_GET['add-section-form']))
	{
		
		$response = array();

		$id= $_POST['addsecid'];
		$section_name= clean($_POST['addsecname']);
		$level=$_POST['addseclevelname'];
		

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($section_name) )
		{
			//Check if section name already existing

			$sql="SELECT section_name FROM section_list where section_name='$section_name'";
			$check_section_if_exist = mysqli_query($cxn, $sql) or die('Unable to connect to Database. Check Section If Exist Failed'. mysqli_error($cxn));
			$num_rows = mysqli_num_rows($check_section_if_exist);
          
             	if ($num_rows==0)
                {
                	//Get the last section no
                	$last_section_no;
                	$sql="SELECT sectionNo FROM section_list where level_id='$level' order by sectionNo desc limit 1";
                	$section_no = mysqli_query($cxn, $sql) or die('Unable to connect to Database. Get Last Section No Failed'. mysqli_error($cxn));
                	while($row = mysqli_fetch_array($section_no))
					{
						$last_section_no=$row['sectionNo'];
					}

					if(!empty($last_section_no))
					{
						//increment last section no

							$sectionNo=$last_section_no+1;

							$sql="INSERT INTO section_list(sectionID, sectionNo, section_name, level_id) VALUES ('$id','$sectionNo','$section_name','$level')";

							$section_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. Section Increment Failed'. mysqli_error($cxn));
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
						$last_section_no=1;
						$sectionNo=$last_section_no;

						$sql="INSERT INTO section_list(sectionID, sectionNo, section_name, level_id) VALUES ('$id','$sectionNo','$section_name','$level')";

						$section_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. Section Not Increment Failed'. mysqli_error($cxn));
						if($section_created)
						{
							$response = array('success' => 'New Section Added');
						}	
						else 
						{
							$response = array('error' => 'Add Section Failed');
						}
						
					}	
					
                }
                else
                {
                	$response = array('error' => 'Section Already Existing');
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
		$level= clean($_POST['addgradedesc']);		
		$level_description = 'Grade '.$level;
		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

		if( !empty($level_description) )
		{
				$sql="SELECT * FROM grade_level where level_description = '$level_description'";
				$description = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
				$num_rows = mysqli_num_rows($description);
          
             	if ($num_rows==0)
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
                	$response = array('error' => 'Grade Level Already Existing');
                }	


					
		}
		else
		{
			$response = array('error' => 'The form is incomplete');
		}	

		echo json_encode($response);			
	}

	//delete grade
	if(isset($_GET['delete-grade']))
	{
		$response = array();

		$grade_id=$_POST['grade_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		//check first if use in section table
		$sql="SELECT levelID FROM section where levelID='$grade_id'";
		$fetch_level = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
		$num_rows = mysqli_num_rows($fetch_level);
  
     	if($num_rows==0)
        {
        	//Delete section_list first
        	$sql="DELETE FROM section_list where level_id='$grade_id'";
        	$section_list_deleted = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
        	if($section_list_deleted==true)
        	{
        		//
        	}

        	//Delete grade level
        	$sql="DELETE FROM grade_level where levelID='$grade_id'";
        	$level_deleted = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
        	if($level_deleted==true)
        	{
        		$response = array('success' => 'Grade level Deleted');
        	}


        }
        else
        {
        	$response = array('error' => 'Grade level is currently in use');
        } 

        echo json_encode($response);	
	}

	//delete section
	if(isset($_GET['delete-section']))
	{
		$response = array();

		$section_id=$_POST['section_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		//check first if use in section table
		$sql="SELECT sectionID FROM section where sectionID='$section_id'";
		$fetch_section = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
		$num_rows = mysqli_num_rows($fetch_section);
  
     	if($num_rows==0)
        {

		    //Delete section list
	    	$sql="DELETE FROM section_list where sectionID='$section_id'";
	    	$section_list_deleted = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
	    	if($section_list_deleted==true)
	    	{
	    		$response = array('success' => 'Section Deleted');
	    	}

	    }
        else
        {
        	$response = array('error' => 'Section is currently in use');
        } 

    	echo json_encode($response);
	}

	//delete subject
	if(isset($_GET['delete-subject']))
	{
		$response = array();

		$subject_id=$_POST['subject_id'];

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
		//check first if use in section table
		$sql="SELECT subjectID FROM section where subjectID='$subject_id'";
		$fetch_subject = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
		$num_rows = mysqli_num_rows($fetch_subject);
  
     	if($num_rows==0)
        {

		    //Delete subject
	    	$sql="DELETE FROM subject_ where subjectID='$subject_id'";
	    	$subject_deleted = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
	    	if($subject_deleted==true)
	    	{
	    		$response = array('success' => 'Subject Deleted');
	    	}

	    }
        else
        {
        	$response = array('error' => 'Subject is currently in use');
        } 

    	echo json_encode($response);
	}


	//Add Student Spreadsheet
	if(isset($_GET['add-student-spreadsheet']))
	{
		$response = array();

		$add_student_spreadsheet=array();

		$result=add_student_excel_upload();
		
		if(isset($result['success']) || array_key_exists('success', $result))
		{
			$add_student_spreadsheet[]=$result['data'];

					$sheet_result_gather=array();
					$sheet_row_flag=array();
					$sheet_col_flag=array();
					$tester=array();
					$has_error='';
					$error='';

					//process spreadsheet

					//Find Flags in spreadsheet
					foreach ($add_student_spreadsheet as $singlesheet) 
					{
						foreach ($singlesheet as $sheetNo => $row) 
					    { 
					        foreach($row as $rowNo => $rowArray)
					        {
					         
					            foreach($rowArray as $col => $values)
					            {

					            	//Get the lastname flag coordinates
				                	$row_new_value=preg_replace('/\s+/','',$values);
				                	$row_lastname_length=strlen('lastname');
				                	$row_lastname=substr($row_new_value, 0 , $row_lastname_length);
			                        $row_valid_flag=strcasecmp($row_lastname, 'lastname');
			                        //If scanned value matched
			                        if($row_valid_flag == 0)
			                        {
			                            $row_flag=array('sheetNo'=>$sheetNo,'flag'=>'lastname', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_row_flag[]=$row_flag;
			                            
			                        }
			                        else
									{
										//Prompt LASTNAME Flag do not exist in spreadsheet
									}	//End of valid flag

			                        //The mandatory fields are LASTNAME, FIRSTNAME
			                        //Get the information flags coordinates

			                        //LASTNAME
			                        $col_lastname_value=preg_replace('/\s+/','',$values);
				                	$col_lastname_length=strlen('lastname');
				                	$col_lastname=substr($col_lastname_value, 0 , $col_lastname_length);
			                        $col_lastname_flag=strcasecmp($col_lastname, 'lastname');
			                        //If scanned value matched
			                        if($col_lastname_flag == 0)
			                        {
			                            $lastname_flag=array('sheetNo'=>$sheetNo,'flag'=>'lastname', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$lastname_flag;
			                            
			                        }
			                        else
									{
										//Prompt LASTNAME Flag do not exist in spreadsheet
									}	//End of valid flag

									//FIRSTNAME
									$col_firstname_value=preg_replace('/\s+/','',$values);
				                	$col_firstname_length=strlen('firstname');
				                	$col_firstname=substr($col_firstname_value, 0 , $col_firstname_length);
			                        $col_firstname_flag=strcasecmp($col_firstname, 'firstname');
			                        //If scanned value matched
			                        if($col_firstname_flag == 0)
			                        {
			                            $firstname_flag=array('sheetNo'=>$sheetNo,'flag'=>'firstname', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$firstname_flag;
			                            
			                        }
			                        else
									{
										//Prompt FIRSTNAME Flag do not exist in spreadsheet
									}	//End of valid flag

									//MIDDLENAME
									$col_middlename_value=preg_replace('/\s+/','',$values);
				                	$col_middlename_length=strlen('middlename');
				                	$col_middlename=substr($col_middlename_value, 0 , $col_middlename_length);
			                        $col_middlename_flag=strcasecmp($col_middlename, 'middlename');
			                        //If scanned value matched
			                        if($col_middlename_flag == 0)
			                        {
			                            $middlename_flag=array('sheetNo'=>$sheetNo,'flag'=>'middlename', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$middlename_flag;
			                            
			                        }
			                      

									//GENDER
									$col_gender_value=preg_replace('/\s+/','',$values);
				                	$col_gender_length=strlen('gender');
				                	$col_gender=substr($col_gender_value, 0 , $col_gender_length);
			                        $col_gender_flag=strcasecmp($col_gender, 'gender');
			                        //If scanned value matched
			                        if($col_gender_flag == 0)
			                        {
			                            $gender_flag=array('sheetNo'=>$sheetNo,'flag'=>'gender', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$gender_flag;
			                            
			                        }

			                        //STATUS
									$col_status_value=preg_replace('/\s+/','',$values);
				                	$col_status_length=strlen('status');
				                	$col_status=substr($col_status_value, 0 , $col_status_length);
			                        $col_status_flag=strcasecmp($col_status, 'status');
			                        //If scanned value matched
			                        if($col_status_flag == 0)
			                        {
			                            $status_flag=array('sheetNo'=>$sheetNo,'flag'=>'status', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$status_flag;
			                            
			                        }

			                        //BIRTHDAY
									$col_birthday_value=preg_replace('/\s+/','',$values);
				                	$col_birthday_length=strlen('birthday');
				                	$col_birthday=substr($col_birthday_value, 0 , $col_birthday_length);
			                        $col_birthday_flag=strcasecmp($col_birthday, 'birthday');
			                        //If scanned value matched
			                        if($col_birthday_flag == 0)
			                        {
			                            $birthday_flag=array('sheetNo'=>$sheetNo,'flag'=>'birthday', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$birthday_flag;
			                            
			                        }

			                        //ADDRESS
									$col_address_value=preg_replace('/\s+/','',$values);
				                	$col_address_length=strlen('address');
				                	$col_address=substr($col_address_value, 0 , $col_address_length);
			                        $col_address_flag=strcasecmp($col_address, 'address');
			                        //If scanned value matched
			                        if($col_address_flag == 0)
			                        {
			                            $address_flag=array('sheetNo'=>$sheetNo,'flag'=>'address', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$address_flag;
			                            
			                        }

			                        //GUARDIAN LASTNAME
									$col_glastname_value=preg_replace('/\s+/','',$values);
				                	$col_glastname_length=strlen('guardianlastname');
				                	$col_glastname=substr($col_glastname_value, 0 , $col_glastname_length);
			                        $col_glastname_flag=strcasecmp($col_glastname, 'guardianlastname');
			                        //If scanned value matched
			                        if($col_glastname_flag == 0)
			                        {
			                            $glastname_flag=array('sheetNo'=>$sheetNo,'flag'=>'guardianlastname', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$glastname_flag;
			                            
			                        }

			                        //GUARDIAN FIRSTNAME
									$col_gfirstname_value=preg_replace('/\s+/','',$values);
				                	$col_gfirstname_length=strlen('guardianfirstname');
				                	$col_gfirstname=substr($col_gfirstname_value, 0 , $col_gfirstname_length);
			                        $col_gfirstname_flag=strcasecmp($col_gfirstname, 'guardianfirstname');
			                        //If scanned value matched
			                        if($col_gfirstname_flag == 0)
			                        {
			                            $gfirstname_flag=array('sheetNo'=>$sheetNo,'flag'=>'guardianfirstname', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$gfirstname_flag;
			                            
			                        }
			       
			                        //GUARDIAN MIDDLENAME
									$col_gmiddlename_value=preg_replace('/\s+/','',$values);
				                	$col_gmiddlename_length=strlen('guardianmiddlename');
				                	$col_gmiddlename=substr($col_gmiddlename_value, 0 , $col_gmiddlename_length);
			                        $col_gmiddlename_flag=strcasecmp($col_gmiddlename, 'guardianmiddlename');
			                        //If scanned value matched
			                        if($col_gmiddlename_flag == 0)
			                        {
			                            $gmiddlename_flag=array('sheetNo'=>$sheetNo,'flag'=>'guardianmiddlename', 'row'=>$rowNo, 'column'=>$col);
				    					$sheet_col_flag[]=$gmiddlename_flag;
			                            
			                        }
				
				                	//End of Get the information flags coordinates
					               
					            }//End of rowArray
					            
					        }//End of row      
					       
					    }//End of singlesheet
					}//End of spreadsheet

					$counter=0;
					foreach ($add_student_spreadsheet as $spreadsheetno => $sheet) 
			        {

			            foreach ($sheet as $sheetno => $sheetrow) 
			            { 

			                //Initialize array for current sheet rows
			                $current_sheet_rows=array();
			                //Initialize  array for current sheet columns
			                $current_sheet_columns=array();

			                //Find the last row flag for the current sheet
			                foreach ($sheet_row_flag as $row_flag_) 
			                {
			                    if($row_flag_['sheetNo']==$sheetno)//get all rows for current sheet
			                    {
			                        $current_sheet_rows[]=$row_flag_;
			                    }
			                            
			                }

			                //Find the last column flag for the current sheet
			                foreach ($sheet_col_flag as $col_flag_) 
			                {
			                    if($col_flag_['sheetNo']==$sheetno)//get all columns for current sheet
			                    {
			                        $current_sheet_columns[]=$col_flag_;
			                    }
			                            
			                }

							$batchrow=count($current_sheet_rows);
							$num_of_column;
							while ($batchrow > 0) 
							{

								if($batchrow > 1)
					            {
					                $current_row=(int) $current_sheet_rows[0]['row'];
			                        $next_row=(int) $current_sheet_rows[1]['row'];
			                        //Get the fields columns
			                        $field_column=array();
			                        

			                        foreach ($current_sheet_columns as $columnrow) 
			                        {
			                            if($columnrow['row']==$current_row)
			                            {
			                                
			                                $field_column[]=$columnrow;

			                            }   
			                        }

			                       $num_of_column=count($field_column);
			                       
			                       $scanned_value=array();
			                       
			                        //$singlesheet[0]=>$row 
			                        for ($row_counter=$current_row+1; $row_counter < $next_row ; $row_counter++)
			                        { 
			                            
			                            //$row[0]=>$rowarray 
			                           	$blank_columns=false;
			                        	$lastname=$firstname=$middlename=$gender=$status=$birthday=$address=$guardianlastname=$guardianfirstname=$guardianmiddlename='';
			                            //There should be all blank row checker 
			                            foreach($add_student_spreadsheet[$spreadsheetno][$sheetno][$row_counter] as $column_ => $value_)
			                            {
			                            	//Load field columns
			                            	foreach ($field_column as $field) 
			                            	{
			                            		if($column_==$field['column'])
			                                    {
			                                    	if($field['flag']=='lastname')
			                                    	{
			                                    		$lastname=$value_;
			                                    	}
			                                    	if($field['flag']=='firstname')
			                                    	{
			                                    		$firstname=$value_;
			                                    	}
			                                    	if($field['flag']=='middlename')
			                                    	{
			                                    		$middlename=$value_;
			                                    	}		
			                                    	if($field['flag']=='gender')
			                                    	{
			                                    		$gender=$value_;
			                                    	}
			                                    	if($field['flag']=='status')
			                                    	{
			                                    		$status=$value_;
			                                    	}
			                                    	if($field['flag']=='birthday')
			                                    	{
			                                    		$birthday=$value_;
			                                    	}				
			                                    	if($field['flag']=='address')
			                                    	{
			                                    		$address=$value_;
			                                    	}
			                                    	if($field['flag']=='guardianlastname')
			                                    	{
			                                    		$guardianlastname=$value_;
			                                    	}
			                                    	if($field['flag']=='guardianfirstname')
			                                    	{
			                                    		$guardianfirstname=$value_;
			                                    	}		
			                                    	if($field['flag']=='guardianmiddlename')
			                                    	{
			                                    		$guardianmiddlename=$value_;
			                                    	}			
			                                    	
			                                 	}

			                            	}//end of Load field columns    	
			                            }

					          			if(empty($lastname) and empty($firstname) and empty($middlename) and empty($gender) and empty($status) and empty($birthday) 
					          			and empty($address) and empty($guardianlastname) and empty($guardianfirstname) and empty($guardianmiddlename))
					          			{
					          				$blank_columns=true;
					          			}

					          			if($blank_columns==false)
					          			{

						          			foreach($add_student_spreadsheet[$spreadsheetno][$sheetno][$row_counter] as $column_ => $value_)
				                            {
				                                //Load field columns
				                            	foreach ($field_column as $field) 
				                            	{
				                            		if($column_==$field['column'])
				                                    {
				                                    	if(!empty($value_))
				                                    	{
				                                    		$value_ = ucwords(strtolower($value_));
				                                    		$scanned_value[$field['flag']]=$value_;
				                                    	}
				                                    	else
				                                    	{
				                                    		

				                                    		if($field['flag']=='lastname')
				                                    		{
				                                    			$error=$error . ' Last Name Empty at row:'.$row_counter.' col: '.$column_.'. ';
				                                    		}

				                                    		if($field['flag']=='firstname')
				                                    		{
				                                    			$error=$error . ' First Name Empty at row:'.$row_counter.' col: '.$column_.'. ';
				                      
				                                    		}

				                                    		if(!empty($error))
				                                    		{
				                                    			
				                                    			$has_error=$error;

				                                    		}	

				                                    		
				                                    		$scanned_value[$field['flag']]="";
				                                    	}	
				                                       
				                                    }

				                            	}//end of Load field columns

				                            }//rowArray
				                            $sheet_result_gather[$counter]=$scanned_value;
				                            $counter++;
					          			}	

			                        }//row    

					            }//end if greater than 1 row
					           	else //If one row
					            {	

					         		$current_row=(int) $current_sheet_rows[0]['row'];
					                $sheetrows=count($sheetrow);
					                //Get the fields columns
			                        $field_column=array();

			                        foreach ($current_sheet_columns as $columnrow) 
			                        {
			                            if($columnrow['row']==$current_row)
			                            {
			                                
			                                $field_column[]=$columnrow;

			                            }   
			                        }
					               

									$num_of_column=count($field_column);

			                        $scanned_value=array();

			                        //$singlesheet[0]=>$row 
			                        for ($row_counter=$current_row+1; $row_counter < $sheetrows+1 ; $row_counter++)
			                        { 
			                            
			                            //$row[0]=>$rowarray 
			                        	$blank_columns=false;
			                        	$lastname=$firstname=$middlename=$gender=$status=$birthday=$address=$guardianlastname=$guardianfirstname=$guardianmiddlename='';
			                            //There should be all blank row checker 
			                            foreach($add_student_spreadsheet[$spreadsheetno][$sheetno][$row_counter] as $column_ => $value_)
			                            {
			                            	//Load field columns
			                            	foreach ($field_column as $field) 
			                            	{
			                            		if($column_==$field['column'])
			                                    {
			                                    	if($field['flag']=='lastname')
			                                    	{
			                                    		$lastname=$value_;
			                                    	}
			                                    	if($field['flag']=='firstname')
			                                    	{
			                                    		$firstname=$value_;
			                                    	}
			                                    	if($field['flag']=='middlename')
			                                    	{
			                                    		$middlename=$value_;
			                                    	}		
			                                    	if($field['flag']=='gender')
			                                    	{
			                                    		$gender=$value_;
			                                    	}
			                                    	if($field['flag']=='status')
			                                    	{
			                                    		$status=$value_;
			                                    	}
			                                    	if($field['flag']=='birthday')
			                                    	{
			                                    		$birthday=$value_;
			                                    	}				
			                                    	if($field['flag']=='address')
			                                    	{
			                                    		$address=$value_;
			                                    	}
			                                    	if($field['flag']=='guardianlastname')
			                                    	{
			                                    		$guardianlastname=$value_;
			                                    	}
			                                    	if($field['flag']=='guardianfirstname')
			                                    	{
			                                    		$guardianfirstname=$value_;
			                                    	}		
			                                    	if($field['flag']=='guardianmiddlename')
			                                    	{
			                                    		$guardianmiddlename=$value_;
			                                    	}			
			                                    	
			                                 	}

			                            	}//end of Load field columns    	
			                            }

					          			if(empty($lastname) and empty($firstname) and empty($middlename) and empty($gender) and empty($status) and empty($birthday) 
					          			and empty($address) and empty($guardianlastname) and empty($guardianfirstname) and empty($guardianmiddlename))
					          			{
					          				$blank_columns=true;
					          			}

					          			if($blank_columns==false)
					          			{
					          				
						          			foreach($add_student_spreadsheet[$spreadsheetno][$sheetno][$row_counter] as $column_ => $value_)
				                            {
				                                //Load field columns
				                            	foreach ($field_column as $field) 
				                            	{
				                            		if($column_==$field['column'])
				                                    {
				                                    	if(!empty($value_))
				                                    	{
				                                    		$value_ = ucwords(strtolower($value_));
				                                    		$scanned_value[$field['flag']]=$value_;
				                                    	}
				                                    	else
				                                    	{
				                                    		

				                                    		if($field['flag']=='lastname')
				                                    		{
				                                    			$error=$error . ' Last Name Empty at row:'.$row_counter.' col: '.$column_.'.' . "\n";
				                                    		}

				                                    		if($field['flag']=='firstname')
				                                    		{
				                                    			$error=$error . ' First Name Empty at row:'.$row_counter.' col: '.$column_.'.'. "\n";
				                      
				                                    		}

				                                    		if(!empty($error))
				                                    		{
				                                    			
				                                    			$has_error= $error;

				                                    		}	

				                                    		
				                                    		$scanned_value[$field['flag']]="";
				                                    	}	
				                                       
				                                    }

				                            	}//end of Load field columns

				                            }//rowArray
				                            $sheet_result_gather[$counter]=$scanned_value;
				                            $counter++;
					          			}	



			                        }//row  

					            }//End of If one row


				                //Do the remove rows after scan
			                    array_shift($current_sheet_rows);
			                    //Remove the cols flags by row

			                    for ($i=0; $i < $num_of_column; $i++) 
			                    { 
			                    
			                    	array_shift($current_sheet_columns);
			                    }
								

								$batchrow--;
							}//end of while

			            }//End of singlesheet
			        }//End of spread sheet

			        if(!empty($sheet_result_gather) and empty($has_error))
			        {
			        	$response = array('success' => $sheet_result_gather);
			        }
			        else
			        {
			        	if(!empty($has_error))
			        	{
			        		$response = array('error' => $has_error . 'Please fix your spreadsheet and try again');
			        	}
			        	else
			        	{
			        		$response = array('error' => 'Scan Empty! Something is wrong with the spreadsheet format');
			        	}	
	        	
			        }	
			       
		}
		else if(isset($result['error']) || array_key_exists('error', $result))
		{
			$response = array('error' => $result['error']);
		}

		echo json_encode($response);	

	}

function add_student_excel_upload()
{
	include '../plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';

	$sheetData=array();//initialize 
	$result=array();

	$name = $_FILES['addstudentexcel']['name'];
	$inputFile = $_FILES['addstudentexcel']['tmp_name'];
	$allowedextension = array('xls','xlsx');


	$temp = explode(".",$name);
	$nameoffile = $temp[0];
	$extension = end($temp);
	if(in_array($extension,$allowedextension))
	{
		if($_FILES['addstudentexcel']['error']>0)
		{
			
			$result=array('error'=>'File error'); 
			
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
						$objWriter->save('../../model/uploaded_files/spreadsheets/csv/'.$nameoffile.'-'.$sheetName.'.csv');

						//read csv
						$csvFile='../../model/uploaded_files/spreadsheets/csv/'.$nameoffile.'-'.$sheetName.'.csv';
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
					$location = "../../model/uploaded_files/spreadsheets/";
					if(move_uploaded_file($inputFile,$location.$name))
					{
						$result=array('success' => 'excel',
									'file_name' => $name,'data'=>$sheetData);
					}
					else
					{	
						$rowData = array('error'=>'File error');
					}	
				}
				else
				{
					$rowData = array('error'=>'There was an error reading the spreadsheet');
				}	

		}
	}
	else
	{
		$result=array('error'=>'Invalid File or No File Selected'); 
		
	}

	return $result;
}

if(isset($_GET['add-scan-student']))
{
	$response = array();

	$scan_student=json_decode($_POST['scan_student'], true);
	$skipped_students="";
	//Insert the data
	foreach ($scan_student as $row) 
	{
		$id = createStudentId();
		$reg_lname = clean($row['lastname']);
		$reg_fname = clean($row['firstname']);
		$reg_mname = clean($row['middlename']);
		$reg_gender = clean($row['gender']);
		$reg_status = clean($row['status']);
		$reg_birthday;
		if(!empty($row['birthday']))
		{
			$reg_birthday = date('Y-m-d',strtotime($row['birthday']));
		}
		else
		{
			$reg_birthday = date('Y-m-d');
		}	
		
		$reg_address = clean($row['address']);
		$parent_lname = clean($row['guardianlastname']);
		$parent_fname = clean($row['guardianfirstname']);
		$parent_mname = clean($row['guardianmiddlename']);
		$parent_defaultbday = date('Y-m-d');

		$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

    	if( !empty($reg_lname) and !empty($reg_fname) )
		{
			//check first if student already existing in database
			$sql="SELECT reg_lname, reg_fname, reg_birthday FROM registration where reg_lname='$reg_lname' and reg_fname='$reg_fname' and reg_birthday='".$reg_birthday."'";
			$is_existing=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
			$num_rows = mysqli_num_rows($is_existing);

	        if ($num_rows==0)
	        {
	        	if(!empty($parent_lname) or !empty($parent_fname) or !empty($parent_mname))
				{
					$parent_id=createParentId();

					$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_birthday) 
											VALUES ('$parent_id','$reg_lname','$reg_fname','$reg_mname', '".$parent_defaultbday."')";

					$p_registered=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($p_registered)
					{
						$sql="INSERT INTO parent(parentID) VALUES ('$parent_id')";

						$p_added=mysqli_query($cxn,$sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

						$pusername=createUsername($parent_id,$parent_fname,$parent_mname,$parent_lname);
						$ppassword=generate_password_alphanum(8);

						$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
						VALUES ('$pusername', '$ppassword', 'parent', '$parent_id')";

						$paccount_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));

						if($p_added)
						{
							$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, reg_address) 
											VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','$reg_address')";

							$s_registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
							if($s_registered)
							{
								$sql="INSERT INTO student (student_lrn, parentID) VALUES ('$id', '$parent_id')";

								$student_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
								if($student_created)
								{
									$username=createUsername($id,$reg_fname,$reg_mname,$reg_lname);
									$password=generate_password_alphanum(8);

									$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
									VALUES ('$username', '$password', 'student', '$id')";

									$account_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
									if($account_created)
									{
										$response = array('success' => 'New Student Accounts Created');
									}
									else
									{
										$response = array('error' => 'Add Students Failed');
									}	

								}
								else
								{
									$response = array('error' => 'Add Students Failed');
								}
							}
							else
							{
								$response = array('error' => 'Add Students Failed');
							}
						}
						else
						{
							$response = array('error' => 'Add Students Failed');
						}

					}
					else
					{
						$response = array('error' => 'Add Students Failed');
					}						

				}

				else
				{
					$sql="INSERT INTO registration (reg_id, reg_lname, reg_fname, reg_mname, reg_gender, reg_status, reg_birthday, reg_address) 
					VALUES ('$id','$reg_lname','$reg_fname','$reg_mname','$reg_gender','$reg_status','".$reg_birthday."','$reg_address')";

					$s_registered = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
					if($s_registered)
					{
						$sql="INSERT INTO student (student_lrn) VALUES ('$id')";

						$student_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
						if($student_created)
						{
							$username=createUsername($id,$reg_fname,$reg_mname,$reg_lname);
							$password=generate_password_alphanum(8);

							$sql="INSERT INTO create_account (username_, password_, user_type, account_id) 
							VALUES ('$username', '$password', 'student', '$id')";

							$account_created = mysqli_query($cxn, $sql) or die('Unable to connect to Database. '. mysqli_error($cxn));
							if($account_created)
							{
								$response = array('success' => 'New Student Accounts Created');
							}
							else
							{
								$response = array('error' => 'Add Students Failed');
							}	

						}
						else
						{
							$response = array('error' => 'Add Students Failed');
						}
					}
					else
					{
						$response = array('error' => 'Add Students Failed');
					}
				}	


	        }//else if already existing
	        else
	        {
	        	//List the skipped students
	        	$skipped_students = $skipped_students . $reg_lname . ", ". $reg_fname . "\n";

	        }	
					
		}
		else
		{
			$response = array('error' => 'Lastname and Firstname are empty! Something went wrong in scanning.');
		}


	}//end of foreach

	if(!empty($skipped_students))
	{
		$response['skipped']= "Skipped Students are already in database: \n" . $skipped_students;
	}
	
	echo json_encode($response);
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

	function createUsername($reg_id,$reg_fname,$reg_mname,$reg_lname)
	{
	    $usertype=$finitial=$minitial=$linitial=$num="";

	    $usertype=substr($reg_id, 0, 2);
	    $finitial=substr($reg_fname,0,1);
	    $minitial=substr($reg_mname,0,1);
	    $linitial=substr($reg_lname,0,1);
	    $num=substr($reg_id,11,6); 

	    return $usertype.strtoupper($finitial).strtoupper($minitial).strtoupper($linitial).$num;
	}

	function generate_password_alphanum($length)
	{
	  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
	            '0123456789';

	  $str = '';
	  $max = strlen($chars) - 1;

	  for ($i=0; $i < $length; $i++)
	    $str .= $chars[mt_rand(0, $max)];

	  return $str;
	}	

	function createClassRecNo()
	{
	    $rand5int=$class_rec_no="";
	        
	        $rand5int=strval(mt_rand ( 10000 , 99999 ));

	        $class_rec_no="ECRN-" . $rand5int;

	        return $class_rec_no;
	}     						
		
?>