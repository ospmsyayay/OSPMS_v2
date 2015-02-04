<!--@author Darryl-->
<!--@copyright 2014-->
<!DOCTYPE html>
<html lang="en">
	<head>
	
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
		<link href="views/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
    
		<body onload="check()">
		<script>
		function check()
		{
		<?php
		
			if (isset($_GET['w']))
			{
		?>
				alert('Message Posted');
		<?php	
			}

			if(isset($_GET['l']))
			{
		?>
			alert('Lecture File Saved');
		<?php 
			}
			if(isset($_GET['fnf']))
			{	
		?>	
			alert('File not found!');
		<?php
			}
			if(isset($_GET['dnf']))
			{	
		?>
				alert('Directory not found');
		<?php
			}
			if(isset($_GET['ex']))
			{	
		?>		
			alert('File error');
		<?php 
			}
			if(isset($_GET['fe']))
			{	
		?>
			alert('File already exist');
		<?php
			}
			if(isset($_GET['if']))
			{
		?>
			alert('invalid file');
		<?php
			}
		?>	

		}
		</script>
		
<div class="header-wrapper">
	<?php include "views/parts/navi-bar-parent.php";?>
</div><!--header-wrapper-->

<div class="wrapper-separator-holder">
	<div class="wrapper-separator"></div>
</div>	
<div class="viewport">
	<div class="content">
		<div class="container">

				<div class="p-sections-wrapper">
        			
        			<!-- <div class="primary col-md-8 col-sm-12 col-xs-12"> -->
		                
		                <!-- <section class="heading section"> -->
		                    <!-- <div class="p-section-inner"> -->
		                        <!-- <h2 class="heading">Heading</h2> -->
		                        <!-- <div class="content"> -->
		                         
		                         
		                        <!-- </div> --><!--content-->
		                    <!-- </div> --><!--section-inner-->                 
		                <!-- </section> --><!--section-->
    
		               <!-- <section class="main section">
		                    <div class="p-section-inner">
		                        <h2 class="heading">Main</h2>
		                        <div class="content">     -->
		                           
		                       <!--  </div> --><!--content-->  
		                    <!-- </div> --><!--section-inner-->                 
		                <!-- </section> --><!--section-->

		           <!--  </div> --><!-- primary -->  

		           <!--  <div class="secondary col-md-4 col-sm-12 col-xs-12"> -->
		                <div class="primary col-md-8 col-sm-12 col-xs-12"> 
		                <aside class="students aside section">
		                    <div class="p-right-section-inner">
		                        <h4 id="parent-student-title"><i class="fa fa-child fa-lg"></i> Students</h4> 
		                        <div class="content">
		                        	<?php 
		                        	foreach ($display_students as $row) 
		                        	{
		                        	
			                        	echo   '<div class="parent-students"> 
					                        		<a href="index.php?r=lss&pt=s" id="'.$row['student_lrn'].'" class="getLRN">
					                        			<img src="views/res/'.$row['image'].'" class="parent-student-thumbnail"/>
					                        		</a>	
				                        			<div class="parent-student-name">
				                        				'.$row['reg_fname'].' '.$row['reg_lname'].' 
				                        			</div>	
			                        				<div class="parent-student-progress-link">
			                        					<a href="index.php?r=lss&pt=s" id="'.$row['student_lrn'].'" class="getLRN">Progress</a>
			                        				</div>	
			                      				</div>';
		                      		
		                      		}
		                      		?>
		                      		
		                        </div><!--content-->  
		                    </div><!--section-inner-->                 
		                </aside><!--section-->
		                
		                <aside class="teacher aside section">
		                    <div class="p-right-section-inner">
		                        <h4 id="parent-teacher-title"><i class="fa fa-user fa-lg"></i> Teachers</h4> 
		                        <div class="content">
		                        	<?php 
		                        	foreach ($display_teachers as $row) 
		                        	{
				                           	echo '<div class="parent-teachers"> 
					                        		<a href="#" class="">
					                        			<img src="views/res/'.$row['image'].'" class="parent-teacher-thumbnail"/>
					                        		</a>	
					                        			<div class="parent-teacher-name" id="'.$row['reg_id'].'">
					                        				<a href="#" class="">Mrs. '.$row['reg_fname'].' '.$row['reg_lname'].'</a>
					                        			</div>';

					                        echo		'<div class="parent-teacher-subject">';

					                        		/*		$first=true;
					                        				foreach ($row['subjects'] as $row) 
					                        				{
					                        					
					                        					if($first)
					                        					{
					                        						echo $row['subject_title'];
					                        						$first=false;
					                        					}
					                        					else 
					                        					{
					                        						echo ', '.$row['subject_title'];
					                        					}	
					                        				}
				                        					*/
				                        	echo		'</div>';
				                        				
				                      		echo	 '</div>';
		                      		}
		                      		?>
		                      		
		                        </div><!--content-->
		                    </div><!--section-inner-->
		                </aside><!--section-->
		                
		               
		            </div><!--secondary-->    
       
    			</div><!--sections-wrapper-->

		</div><!--container-->	
	</div><!--content-->
</div><!--viewport-->
       
        <script src="views/plugins/bootstrap/transition.js"></script>
        <script src="views/plugins/bootstrap/jquery.min.js"></script>
        <script src="views/plugins/bootstrap/bootstrap.min.js"></script>
		<script src="views/plugins/bootstrap/tab.js"></script>
		<script src="views/plugins/bootstrap/tooltip.js"></script>
		<script src="views/plugins/bootstrap/popover.js"></script>
		<script src="views/js/msgbox.js"></script>
		<script src="views/js/scripts.js"></script>		
	
		<!-- JavaScript Test -->
<script>
$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
})
</script>

<script>
$(function() 
{
 
  $(document.body).on('click', '.getLRN', function(event)
  {

  		var lrn=$(this).attr('id');
  	
  			$.ajax({
					 
		            url: 'views/ajax/get_for_chart.php',
		            type: 'GET',
		            data: {
		            	plrn:lrn
		            },
		           dataType: 'json',
		           success: function(response) 
		           {
		           		
						  /*alert(JSON.stringify(response['lrn']));*/
		           		 
					}

		          
		            });

  });

});//End of ready

						

</script>		
	</body>
    

</html>