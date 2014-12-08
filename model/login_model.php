<!--@author Darryl-->
  <!--@copyright 2014-->
<?php

function get_user($username){
include "config/conn.php";

 $result = mysqli_query ($cxn,"SELECT * FROM create_account  WHERE username_='".$username."'") ;
  
 return $result;

}

function get_profilename($reg_id)
{
include "config/conn.php";

 $profilename = mysqli_query ($cxn,"SELECT reg_lname, reg_fname FROM registration  WHERE reg_id='".$reg_id."'");
  
 return $profilename;


}

/*
function clean_input($input){
$input=trim($input);
$input=stripslashes($input);
$input=htmlspecialchars($input);
return $input;
}
*/


?>	