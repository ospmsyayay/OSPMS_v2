<!--@author Darryl-->
  <!--@copyright 2014-->
<?php

include "config.php";

$cxn = mysqli_connect($host,$user,$pass,$db);

if( mysqli_connect_errno($cxn) ){ //connected
	echo "Error connecting to MySQL"
		.mysqli_connect_error();
}

?>