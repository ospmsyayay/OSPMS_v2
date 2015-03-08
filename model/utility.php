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

function createMessageId()
{
    $rand9int=$message_id="";
        
        $rand9int=strval(mt_rand ( 100000000 , 999999999 ));

        $message_id="M" . $rand9int;

        return $message_id;
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

function get_week_of_grading()
{
            $now = strtotime("today");
            $month = date("M", strtotime("today"));
            $weekOfGrading;
            $weekOfMonth = (int) ceil((date("d", $now) - date("w", $now) - 1) / 7) + 1;
            //Continuous numbering of weeks per Grading
            if($month=='Jun')
            {
                //Exclude week 5 or 6 of June
                if($weekOfMonth>4)
                {
                    $weekOfGrading=4;
                }
                else
                {
                    $weekOfGrading=$weekOfMonth;
                }    
            }
            if($month=='Jul')
            {
                //Weeks 5, 6, 7, 8
                //If 1st week of July 
                if($weekOfMonth==1)
                {
                    $weekOfGrading=5;
                }
                //If 2nd week of July
                if($weekOfMonth==2)
                {
                    $weekOfGrading=6;
                }    
                //If 3rd week of July
                if($weekOfMonth==3)
                {
                    $weekOfGrading=7;
                }    
                //If 4th week of July
                if($weekOfMonth==4)
                {
                    $weekOfGrading=8;
                }    

                //Exclude week 5 or 6 of July
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;
                }    
            }
            if($month=='Aug')
            {
                //If 1st week of August: still week 4 of 1st Grading 
                if($weekOfMonth==1)
                {
                    $weekOfGrading=4;
                }
                //If 2nd week of August: 1st Periodical exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=4;
                }    
                //If 3rd week of August: start of 2nd Grading
                if($weekOfMonth==3)
                {
                    $weekOfGrading=1;
                }    
                //If 4th week of August
                if($weekOfMonth==4)
                {
                    $weekOfGrading=2;
                }    

                //Exclude week 5 or 6 of July
                if($weekOfMonth>4)
                {
                    $weekOfGrading=2;
                }    
            }     
            if($month=='Sep')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=3;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=4;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=5;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=6;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=6;
                }    
            }
            if($month=='Oct')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=7;
                }
                //2nd Periodical Exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;
                }    
                //Start of 3rd Grading
                if($weekOfMonth==3)
                {
                    $weekOfGrading=1;
                }    
                //SemBreak
                if($weekOfMonth==4)
                {
                    $weekOfGrading=1;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=1;
                }    
            }          
            if($month=='Nov')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=2;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=3;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=4;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=5;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=5;
                }    
            }  
            if($month=='Dec')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=6;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=7;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=8;
                }    
                //Christmas Break
                if($weekOfMonth==4)
                {
                    $weekOfGrading=8;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;
                }    
            }
            if($month=='Jan')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=8;
                }
                //3rd Periodical Exam
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;
                }    
                //Start of 4th Grading
                if($weekOfMonth==3)
                {
                    $weekOfGrading=1;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=2;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=2;
                }    
            }    
            if($month=='Feb')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=3;
                }
                
                if($weekOfMonth==2)
                {
                    $weekOfGrading=4;
                }    
                
                if($weekOfMonth==3)
                {
                    $weekOfGrading=5;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=6;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=6;
                }    
            }
            if($month=='Mar')
            {
                
                if($weekOfMonth==1)
                {
                    $weekOfGrading=7;
                }
                //Estimated 4th Grading Examination of Graduating
                if($weekOfMonth==2)
                {
                    $weekOfGrading=8;
                }    
                //Estimated 4th Grading Examination
                if($weekOfMonth==3)
                {
                    $weekOfGrading=8;
                }    
                
                if($weekOfMonth==4)
                {
                    $weekOfGrading=8;
                }    

                
                if($weekOfMonth>4)
                {
                    $weekOfGrading=8;
                }    
            }    
            //April:Releasing of Final Grades
            
            return $weekOfGrading;
}

function get_school_year()
{
    $current_year = date("Y", strtotime("today"));
    return strval($current_year).'-'.strval($current_year+1);
                        
}    

function get_grading_period()
{
    $grading_period="";
    $now = strtotime("today");
    //Get first date of June
    $current_year = date("Y", $now);
    $June = date("$current_year-06-01");
    //Get second week of August
    $first_saturday_of_August = date("Y-m-d",strtotime("first Saturday of August $current_year"));
    $second_week_of_August = date("Y-m-d", strtotime($first_saturday_of_August . " +1 week"));
    //Get second week of October
    $first_saturday_of_October = date("Y-m-d",strtotime("first Saturday of October $current_year"));
    $second_week_of_October = date("Y-m-d", strtotime($first_saturday_of_October . " +1 week"));
    //Get second week of January 
    $first_saturday_of_January = date("Y-m-d",strtotime("first Saturday of January $current_year"));
    $second_week_of_January = date("Y-m-d", strtotime($first_saturday_of_January . " +1 week"));
    //Get third week of March 
    $first_saturday_of_March = date("Y-m-d",strtotime("first Saturday of March $current_year"));
    $third_week_of_March = date("Y-m-d", strtotime($first_saturday_of_March . " +2 week"));
    $today=date("Y-m-d",$now);


    if($today >= $June and $today <= $second_week_of_August)
    {
        //1st Grading Period
        //Estimated 1st Periodical Exam:2nd week of August
        $grading_period="1st Grading Period";

    }

    if($today > $second_week_of_August and $today <= $second_week_of_October)
    {
        //2nd Grading Period
        //Estimated 2nd Periodical Exam:2nd week of October
        $grading_period="2nd Grading Period";
    }
    if($today > $second_week_of_October or $today <= $second_week_of_January)
    {
        //3rd Grading Period
        //Estimated 3rd Periodical Exam:2nd week of January
        $grading_period="3rd Grading Period";
    }
    if($today > $second_week_of_January and $today <= $third_week_of_March)
    {
        //4th Grading Period
        //Estimated 4th Periodical Exam:3rd week of March
         $grading_period="4th Grading Period";
    }
    
    return $grading_period;


}

function createClassRecNo()
{
    $rand5int=$class_rec_no="";
        
        $rand5int=strval(mt_rand ( 10000 , 99999 ));

        $class_rec_no="ECRN-" . $rand5int;

        return $class_rec_no;
}

function convert_time_to_12hr($time)
{
    $new_time=date("h:i A", strtotime($time));

    return $new_time;
}     

function convert_datetime_to_12hr($datetime)
{
    $new_time=date("Y-m-d h:i A", strtotime($datetime));

    return $new_time;
  
}


?>