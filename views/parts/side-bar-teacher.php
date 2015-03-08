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
  <?php echo '<div class="panel-heading text-center" id="subject-list"><i class="glyphicon glyphicon-book"></i> School Year '.$_SESSION['school_year'].'</div>';?>
  	
  	<ul class="list-group" id="teacher-side-menu">

    <?php 
        if(isset($_SESSION['TeacherLoad']))
        {   
          foreach($_SESSION['TeacherLoad'] as $load)
          {
              echo  '<li class="list-group-item side-menu teacher-side-menu-heading" side-menu-id="'.$load['class_rec_no'].'" grade="'.$load['level_description'].'" sectionno="'.$load['sectionNo'].'" section="'.$load['section_name'].'" subject="'.$load['subject_title'].'">
                      <div class="panel-title teacher-side-menu-title col-md-offset-1"><em><strong>'.$load['level_description'].'</strong>::'.$load['sectionNo'].'-'.$load['section_name'].'</em>: <strong>'.$load['subject_title'].'</strong></div>
                      <div class="panel-title teacher-side-menu-title col-md-offset-1 text-uppercase"><small>'.$load['sched_days'].' '.$load['sched_start_time'].'-'.$load['sched_end_time'].'</small></div>
                    </li>';
          }
        }
            
    ?>

  	</ul>	
</div>
<!--End of Side bar menu-->
