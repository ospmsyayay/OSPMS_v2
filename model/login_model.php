<!--@author Darryl-->
  <!--@copyright 2014-->
<?php

function get_user($username){
include "config/conn.php";

 $result = mysqli_query ($cxn,"SELECT * FROM create_account  WHERE username_='".$username."'") ;
  
 return $result;

}

function get_profile($reg_id)
{
include "config/conn.php";

 $profilename = mysqli_query ($cxn,"SELECT reg_lname, reg_fname, image FROM registration  WHERE reg_id='".$reg_id."'");
  
 return $profilename;


}



?>	