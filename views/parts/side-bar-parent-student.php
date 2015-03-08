  <!--@author Darryl-->
  <!--@copyright 2014-->

<!--Start of Welcome Box-->				
	<div class="welcome-box content">
		 <?php if(isset($_SESSION['profile_pic']))
   		{
    		echo '<img src="views/res/'.$_SESSION['profile_pic'].'" class="welcome-box-img img-thumbnail shadow pull-left"/>';
    	}
    	?>
		
		<?php 
		if((isset($_SESSION['reg_lname'])) and (isset($_SESSION['reg_fname'])))
		{				
      echo '<div class="has-padding-top">
              <a class="greetings"><strong>Hi, '.$_SESSION['reg_fname'].' '.$_SESSION['reg_lname'].'</strong></a>
              <div class="greetings"><small>'.$_SESSION['user_type'].'</small></div>
            </div>';    
		}
		?>
	</div>
<!--End of Welcome Box-->

