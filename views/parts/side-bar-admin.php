  <!--@author Darryl-->
  <!--@copyright 2014-->
  
<!--Start of Welcome Box-->				
	<div class="admin-welcome-box content">
		 <?php if(isset($_SESSION['profile_pic']))
   		{
    		echo '<img src="views/res/'.$_SESSION['profile_pic'].'" class="admin-welcome-box-img img-thumbnail shadow"/>';
    	}
    	?>
		
		<?php 
		if((isset($_SESSION['reg_lname'])) and (isset($_SESSION['reg_fname'])))
		{
			echo '<a href="#" class="navbar-link" ><h5 class="greetings">Hi, '.$_SESSION['reg_fname'].'</h5></a>';						
		}
		?>
	</div>
<!--End of Welcome Box-->
<!--Start of Side bar menu-->
<div class="panel-group" id="admin-side-menu">
	<div class="panel panel-info">
    	<div class="side-menu admin-side-menu-heading" side-menu-id="gl">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                       Add Grade Level
	            </h6>
	        </div>
    	</div>
    </div>
    <div class="panel panel-info">
    	<div class="side-menu admin-side-menu-heading" side-menu-id="scs">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                       Add Section
	            </h6>
	        </div>
    	</div>
    </div>
    <div class="panel panel-info">
    	<div class="side-menu admin-side-menu-heading" side-menu-id="sbs">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                       Add Subject
	            </h6>
	        </div>
    	</div>
    </div>
    <div class="panel panel-info">
    	<div class="side-menu admin-side-menu-heading" side-menu-id="tp">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                        Add Teacher 
	            </h6>
	        </div>
    	</div>
    </div>
    <div class="panel panel-info">
    	<div class="side-menu admin-side-menu-heading" side-menu-id="sp">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                       Add Student
	            </h6>
	        </div>
    	</div>
    </div>
	<div class="panel panel-info">
	    <div class="side-menu admin-side-menu-heading" side-menu-id="cs">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                        Add Class Schedule
	            </h6>
	        </div>
	    </div>
	</div>    
	<div class="panel panel-info">
	    <div class="side-menu admin-side-menu-heading" side-menu-id="ap">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                        Add Administrator 
	            </h6>
	        </div>
	    </div>
	</div>    
    <div class="panel panel-info">
    	<div class="side-menu admin-side-menu-heading" side-menu-id="ua">
	        <div class="panel-heading" data-parent="admin-side-menu">
	            <h6 class="panel-title admin-side-menu-title">
                       User Accounts
	            </h6>
	        </div>
    	</div>
    </div>
</div>
<!--End of Side bar menu-->

				