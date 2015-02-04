<?php
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str)
{
	include "config/conn.php";
	
	$str = @trim($str);
	if(get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}
	return mysqli_real_escape_string($cxn,$str);
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

function createRandomPassword_allcaps_num() {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}

function generate_password_chars($length)
{
  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789``-=~!@#$%^&*()_+,./<>?;:[]{}\|';

  $str = '';
  $max = strlen($chars) - 1;

  for ($i=0; $i < $length; $i++)
    $str .= $chars[mt_rand(0, $max)];

  return $str;
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


function createGradingId()
{
	$rand7int=$grading_id="";
        
        $rand7int=strval(mt_rand ( 1000000 , 9999999 ));

        $grading_id="GR-" . $rand7int;

        return $grading_id;

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



function mark_proficiency($grade)
{

    if($grade > 89.00)
    {
        return "A";
    }    

    else if($grade > 84.00)
    {
        return "P";
    }
    else if($grade > 79.00)
    {
        return "AP";
    }   
    else if($grade > 74.00)
    {
        return "D";
    }
    else
    {
        return "B";
    }    
}
         
?>