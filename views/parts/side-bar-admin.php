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
<!--Start of Side bar menu-->
<div class="panel panel-info">
  	
  	<ul class="list-group" id="admin-side-menu">
	    <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="gl">
            <h6 class="panel-title admin-side-menu-title">
                  Add Grade 
            </h6>
    	</li>
	    <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="scs"> 
	    	<h6 class="panel-title admin-side-menu-title">
                   Add Section
            </h6>
        </li>
	    <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="sbs">
	    	<h6 class="panel-title admin-side-menu-title">
                   Add Subject
            </h6>
        </li>
	    <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="tp">
	    	<h6 class="panel-title admin-side-menu-title">
                   Add Teacher 
            </h6>
        </li>
	    <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="sp">	    	
	    	<h6 class="panel-title admin-side-menu-title">
                   Add Student
            </h6>
        </li>
        <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="cs">	    	
	    	<h6 class="panel-title admin-side-menu-title">
                   Add Class Schedule
            </h6>
        </li>
        <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="ap">	    	
	    	<h6 class="panel-title admin-side-menu-title">
                    Add Administrator 
            </h6>
        </li>
        <li class="list-group-item side-menu admin-side-menu-heading" side-menu-id="ua">	    	
	    	<h6 class="panel-title admin-side-menu-title">
                    User Accounts
            </h6>
        </li>
  	</ul>	
</div>
<!--End of Side bar menu-->

				