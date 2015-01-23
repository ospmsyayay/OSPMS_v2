  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- <meta charset="UTF-8"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
		<link href="views/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
	</head>
    
	<body onload="check()">
		<script>
		function check()
		{
		<?php
			if (isset($_GET['ss']))
			{
					
		?>
				alert('Login Successful');
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
		?>	

		}
		</script>
		
<div class="header-wrapper">
	<?php include "views/parts/navi-bar-student.php";?>   
</div><!--header-wrapper-->
<div class="wrapper-separator-holder">
	<div class="wrapper-separator"></div>
</div>	
<div class="viewport">
	<div class="content">
		<div class="container">
			<?php include "views/parts/side-bar-student.php";?>
			<div class="right-wrapper">
					<div class="right-column">
						<div id="student-post-title-fixed">

							<div id="student-post-title"><span class="glyphicon glyphicon-flag"></span>Post From Subjects</div>
						
						</div>
					<div id="student-post-container-relative">
								<div id="student-post-container">
								
										<div id="student-message-container">
											<?php 	
											foreach($display_box as $display)
											{
											?>	

												<div class="post-messages panel panel-default">
														
													<div class="panel-heading">
															<a href="#" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
															<?php echo '<div><img src="views/res/'.$display['image'].'" class="shadow post-message-img pull-left" /></div>'; ?>
															<div><a class="navbar-link message-author"><h5><?php echo $display['teacher'] . ' <i class="glyphicon glyphicon-chevron-right"></i>' .$display['subject_title'].'::'.$display['level_description']. '-'. $display['sectionNo'] . '-' . $display['section_name'] . ' ' ;?></h5></a></div>
															<?php echo '</span><abbr class="timespan" title="'.$display['date_created'].'">
															<span class="glyphicon glyphicon-dashboard"></span>  '.$display['timespan'].'<abbr>'; ?>
													</div>

													<div class="panel-body">
														<h4 class="post-teacher"><?php echo $display['messageorfile_caption']; ?></h4>
														<span class="glyphicon glyphicon-pushpin pull-right"></span>
														
													</div>

														<?php 
															if( (!empty($display['file_path'])) and (!empty($display['file_name'])) )
															{

														?>
															<div class="panel-footer">
																<form action="" method="post" name="download">
																<?php 

																		$temp = explode(".",$display['file_name']);
																		$nameoffile = $temp[0];
																		$extension = end($temp);
																if(
																	($extension=='doc')||($extension=='docx')||($extension=='docm')||
																	($extension=='docb')||($extension=='dotm')||
																	($extension=='dotx')
																  )	
																  {

																  	echo '<div><a><img src="views/res/word.png" class="img-thumbnail post-lecture-image">';
																  }

																else if ($extension=='pdf') 
																{
																	echo '<div><a><img src="views/res/adobe.png" class="img-thumbnail post-lecture-image">';
																}	

																else if(
																 	($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')
																 	||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb')
																 	)
																  {


																  		echo '<div><a><img src="views/res/excel.png" class="img-thumbnail post-lecture-image">';
																  }
																else if
																  (	
																  	($extension=='ppt')||($extension=='pptx')||($extension=='pptm')||($extension=='potx')||
																  	($extension=='potm')||($extension=='ppam')||($extension=='ppsx')||($extension=='ppsm')||
																  	($extension=='sldx')||($extension=='sldm')
																  )
																{

																		echo '<div><a><img src="views/res/powerpoint.png" class="img-thumbnail post-lecture-image">';
																}

																else if
																  (	
																  	$extension=='7z'
																  )
																{
																		echo '<div><a><img src="views/res/7z.png" class="img-thumbnail post-lecture-image">';

																}

																else if(
																	$extension=='rar'
																   )
																{

																		echo '<div><a><img src="views/res/rar.jpg" class="img-thumbnail post-lecture-image">';
																}	

																else if(
																	$extension=='swf'
																   )
																{

																		echo '<div><a><img src="views/res/swf.jpg" class="img-thumbnail post-lecture-image">';
																}

																else if(
																	$extension=='zip'

																   )
																{
																		echo '<div><a><img src="views/res/zip.jpg" class="img-thumbnail post-lecture-image">';
																}

																else
																{
																	echo '<div><a><img src="'.$display['file_path'].$display['file_name'].'" class="img-thumbnail post-lecture-image">';
																}




																echo '<p class="pull-right"><span class="glyphicon glyphicon-paperclip"></span>'.$display['file_name'].'</p>
																					
																	<input name="student_file_name" value="'.$display['file_name'].'" type="hidden"/>
																
																	<button class=" btn btn-primary" type="submit">Download File <span class="glyphicon glyphicon-save"></span></button>
																			</a>
																		</div>	
																';?>

																</form>
															</div>
														<?php 
															}
															else
															{	
														?>
															
														<div class="panel-footer">
															<span class="glyphicon glyphicon-fire"></span>
															<span class="glyphicon glyphicon-tags pull-right"></span>
														</div>
														<?php 
															}
														?>
														
												</div>
												
												
											<?php
											}	
											?>



										</div>


										
								</div><!--post-container-->
					</div><!--post-container-relative-->
							
					</div><!--right-column-->
			</div><!--right-wrapper-->
		</div><!--container-->
	</div><!--content-->
</div><!--viewport-->

  		<script src="views/plugins/bootstrap/jquery.min.js"></script>
        <script src="views/plugins/bootstrap/transition.js"></script>
        <script src="views/plugins/bootstrap/jquery.min.js"></script>
        <script src="views/plugins/bootstrap/bootstrap.min.js"></script>
		<script src="views/plugins/bootstrap/tab.js"></script>
		<script src="views/plugins/bootstrap/modal.js"></script>
		<script src="views/plugins/bootstrap/tooltip.js"></script>
		<script src="views/plugins/bootstrap/popover.js"></script>
		<script src="views/plugins/chartjs/Chart.js"></script>

     <!-- JavaScript Test -->
<script>

$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
});

</script>

<script>


		        function getSubjectId(menu) 
		        {
		        	
		        	var subject=menu.id;
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_for_student_announcement_lecture.php',
			            type: 'POST',
			            data: {
			            	subject:subject
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							/*  alert(JSON.stringify(response['announcement_lecture_bySubject']));*/
								change_post_title(response['category']);
			           			display_announcement_lecture(response['announcement_lecture_bySubject']);
			           		 
						},


			            });

		         }


		          function getGradeId(menu) 
		        {
		        	
		        	var grade=menu.id;
		        	
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_for_student_announcement_lecture.php',
			            type: 'POST',
			            data: {
			            	grade:grade
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							 /* alert(JSON.stringify(response['announcement_lecture_byGrade']));*/
								change_post_title(response['category']);
			           			display_announcement_lecture(response['announcement_lecture_byGrade']);
			           		 
						},


			            });

		         }

		           function getSectionId(menu) 
		        {
		        	
		        	var section=menu.id;
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_for_student_announcement_lecture.php',
			            type: 'POST',
			            data: {
			            	section:section
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							 /* alert(JSON.stringify(response['announcement_lecture_bySection']));*/
								change_post_title(response['category']);
			           			display_announcement_lecture(response['announcement_lecture_bySection']);
			           		 
						},


			            });

		         }

		         		function change_post_title(category)
		         		{
		         			$('#student-post-title-fixed').empty();

		         			var display = $('<div id="student-post-title"><span class="glyphicon glyphicon-flag"></span>Post From '+category+'</div>');

		         			$('#student-post-title-fixed').append(display);
		         			/*alert(category);*/
		         		}

		         		function display_announcement_lecture(data) 
						{
							$("#student-message-container").empty();

							    for (var i = 0; i < data.length; i++) 
							    {

							    		drawRow(data[i]);
							  
							    }

						}

						function drawRow(rowData) 
						{

							var display = $('<div class="post-messages panel panel-default">'+
												'<div class="panel-heading">'+
													'<a href="#" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>'+
													'<div><img src="views/res/'+rowData.image+'" class="shadow post-message-img pull-left" /></div>'+
													'<div><a class="navbar-link message-author"><h5><?php echo "'+rowData.teacher+'" . "<i class=\"glyphicon glyphicon-chevron-right\"></i>" . "'+rowData.subject_title+'"."::"."'+rowData.level_description+'". "-". "'+rowData.sectionNo+'" . "-" . "'+rowData.section_name+'" . " " ;?></h5></a></div>'+
													'</span><abbr class="timespan" title="'+rowData.date_created+'">'+
													'<span class="glyphicon glyphicon-dashboard"></span>  '+rowData.timespan+'<abbr>'+
												'</div>'+
												'<div class="panel-body">'+
													'<h4 class="post-teacher">'+rowData.messageorfile_caption+'</h4><span class="glyphicon glyphicon-pushpin pull-right"></span>'+
												'</div>'+
												rowData.display_footer+
											'</div>');



							$("#student-message-container").append(display);

						}


        </script>		
	</body>
    
    
</html>