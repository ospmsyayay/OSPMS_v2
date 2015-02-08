<!--@author Darryl-->
<!--@copyright 2014-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Teacher Page</title>
        <link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
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
		
<!--Start of navbar teacher-->
	<?php include "views/parts/navi-bar-teacher.php";?>   
<!--End of navbar teacher-->

<!--Start of main -->
	<div class="main container-fluid">
		<div class="row">

				<!--Start of left content-->
				<div class="aside-left col-md-2">
					<?php include "views/parts/side-bar-teacher.php";?>
				</div>
				<!--End of left content-->

				<!--Start of mid content-->
				<div class="main-content col-md-10 col-md-offset-2">
					<div class="row"><!--//row for right column fixed -->
						<div class="col-md-6 right-column-fixed">
							<div class="row"><!--//row for postbox-container -->
								<div class="col-md-12" id="postbox-container">
									<div class="row"><!--//row for mayTab-->

										<ul id="myTab" class="nav nav-tabs">
												<li class="active"><a href="#announcement" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span> Write Announcement</a></li>
												<li><a href="#lecture-exercises" data-toggle="tab"><span class="glyphicon glyphicon-upload"></span> Post Lecture Files </a></li>
										</ul><!--my tab-->
									
										<div id="myTabContent" class="tab-content">
											<div class="tab-pane fade in active" id="announcement">
												<div class="col-md-12">
													<div class="panel-body" id="announce-box">                
														<form accept-charset="UTF-8" action="" method="POST">
															<textarea class="form-control counted" name="message" placeholder="Type in your announcement" 
															rows="1" required="required"></textarea>
															<h6 class="pull-left" id="counter">320 characters remaining</h6>
															<button class="pull-right btn btn-info" type="submit"><span class="glyphicon glyphicon-send"></span>Post</button>
														</form>
													</div>
												</div>
											</div><!--announcement-->

											<div class="tab-pane fade" id="lecture-exercises">								
												<div class="col-md-12">
													<div class="panel-body" id="upload-box">       
														<form method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
																<textarea id="caption-box" class="form-control counted" name="lecture-caption" placeholder="Create Title/Caption" 
																			rows="1" required="required"></textarea>
																
																<div class="choose-file-container">
																	<div style="position:relative;">
																		<a class='btn btn-primary' href='javascript:;'>
																			Choose File..(max 64 MB)
																			<input type="file" style='position:absolute;
																			z-index:2;
																			top:0;
																			left:0;
																			filter: 
																			alpha(opacity=0);
																			-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
																			opacity:0;
																			background-color:transparent;
																			color:transparent;' 
																			name="upload_lecture" size="40"  onchange='$("#upload-file-info").html($(this).val());'
																			id="upload_lecture" accept="*" class="pull-left"/>
																		</a>
																		&nbsp;
																		<span class='label label-info' id="upload-file-info"></span>
																		<button class="pull-right btn btn-info" type="submit"><span class="glyphicon glyphicon-send"></span>Post</button>
																	</div>
																<!--<input type="file" name="upload_lecture" id="upload_lecture" accept="*" class="pull-left"/>-->
																<!--<button class="pull-right btn btn-info" type="submit"><span class="glyphicon glyphicon-send"></span>Post</button>-->

																</div>
														</form>
													</div><!--upload box-->
												</div>
											</div><!--lecture exercises--> 
										</div><!--tab content-->

									</div><!--//row for mayTab-->
										
								</div><!--postbox-container-->
							</div><!--//row for postbox container-->	
						</div><!--right-column-fixed-->
					</div><!--//row for right column fixed -->

					<div class="row"><!--//row for post title fixed-->
						<div class="col-md-6" id="post-title-fixed">
							<div class="row"><!--//row for post title-->
								<div id="post-title"><span class="glyphicon glyphicon-flag"></span>Post to All Subjects</div>
							</div><!--//row for post title-->
						</div>
					</div><!--//row for post title fixed-->

					<div class="row"><!--//row for post container relative-->
						<div class="col-md-7" id="post-container-relative">
							<div class="row"><!--//row for post container-->
								<div id="col-md-12 post-container">
									<div class="row"><!--//row for message container-->
										<div class="col-md-12" id="message-container">
											<?php 	
											foreach($display_box as $display)
											{
													
											?>	

											<div class="post-messages panel panel-default">
													
												<div class="panel-heading">
														<a href="#" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
														<?php echo '<div><img src="views/res/'.$_SESSION['profile_pic'].'" class="shadow post-message-img pull-left" /></div>';?>
														<div><a class="navbar-link message-author"><h5><?php echo $_SESSION['reg_fname'] . ' <i class="glyphicon glyphicon-chevron-right"></i>' .$display['subject_title'].'::'.$display['level_description']. '-'. $display['sectionNo'] . '-' . $display['section_name'] . ' ' ;?></h5></a></div>
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
																				
																<input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
															
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
										</div><!--message container-->	

									</div><!--//row for message container-->
								</div><!--post-container-->

							</div><!--//row for post container-->
						</div><!--post-container-relative-->
					</div><!--//row for post container relative-->	

					
						
				</div>
				<!--End of mid content-->

		</div><!--row-->
	</div><!--container-fluid-->
<!--End of main -->			
      
<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
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

		        function getSubjectId(menu) 
		        {
		        	
		        	var subject=menu.id;
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_announcement_lecture.php',
			            type: 'POST',
			            data: {
			            	subject:subject
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
								
								/*alert(JSON.stringify(response['announcement_lecture_bySubject']));*/
							  	change_post_title(response['category']);
								change_announce_box('subject');
								change_upload_box('subject');
			           			display_announcement_lecture(response['announcement_lecture_bySubject']);
			           		 
						},


			            });

		         }


		        function getGradeId(menu) 
		        {
		        	
		        	var grade=menu.id;
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_announcement_lecture.php',
			            type: 'POST',
			            data: {
			            	grade:grade
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           			
							  /*alert(JSON.stringify(response['announcement_lecture_byGrade']));*/
							  	change_post_title(response['category']);
								change_announce_box('grade');
								change_upload_box('grade');
			           			display_announcement_lecture(response['announcement_lecture_byGrade']);
			           		 
						},


			            });

		         }

		           function getSectionId(menu) 
		        {
		        	
		        	var section=menu.id;
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_announcement_lecture.php',
			            type: 'POST',
			            data: {
			            	section:section
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							 /* alert(JSON.stringify(response['announcement_lecture_bySection']));*/
							 	change_post_title(response['category']);
								change_announce_box('section');
								change_upload_box('section');
			           			display_announcement_lecture(response['announcement_lecture_bySection']);
			           		 
						},


			            });

		         }
		         		function change_post_title(category)
		         		{
		         			$('#post-title-fixed').empty();

		         			var display = $('<div class="row"><!--//row for post title-->'+
												'<div id="post-title"><span class="glyphicon glyphicon-flag"></span>Post to '+category+'</div>'+
											'</div><!--//row for post title-->');

		         			$('#post-title-fixed').append(display);
		         			/*alert(category);*/
		         		}

		         		function change_announce_box(category)
		         		{
							$('#announce-box').empty();

							var display = $('<textarea class="form-control counted" name="get_message" id="message'+category+'" placeholder="Type in your announcement"'+ 
												'rows="1" required="required"></textarea>'+
												'<h6 class="pull-left" id="counter">320 characters remaining</h6>'+
												'<button class="pull-right btn btn-info" onclick="getMessage'+category+'()">'+
												'<span class="glyphicon glyphicon-send"></span>Post</button>');

							$('#announce-box').append(display);


							
		         		}
		         		
		         		
		         		function change_upload_box(category)
		         		{
		         			$('#upload-box').empty();

		         			var display = $('<form method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="upload_ajax_'+category+'">'+
		         							'<textarea id="caption'+category+'" class="form-control counted" name="get_lecture-caption"'+ 
		         								'placeholder="Create Title/Caption" rows="1" required="required"></textarea>'+
															'<div class="choose-file-container">'+
																'<div style="position:relative;">'+
																
																						'<input type="file"'+  
																						'name="upload_lecture_ajax" size="40"' +
																						'id="upload_lecture_ajax_'+category+'" accept="*" class="pull-left"/>'+
																			
																					'<button class="pull-right btn btn-info" type="submit"><span class="glyphicon glyphicon-send"></span>Post</button>'+
																				'</div>'+

																			'</div>'+
																			'</form>');

		         			$('#upload-box').append(display);
		         		}

		         		function display_announcement_lecture(data) 
						{
							$("#message-container").empty();
							

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
													'<div><img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow post-message-img pull-left" /></div>'+
													'<div><a class="navbar-link message-author"><h5><?php echo $_SESSION["reg_fname"] . "<i class=\"glyphicon glyphicon-chevron-right\"></i>" . "'+rowData.subject_title+'"."::"."'+rowData.level_description+'". "-". "'+rowData.sectionNo+'" . "-" . "'+rowData.section_name+'" . " " ;?></h5></a></div>'+
													'</span><abbr class="timespan" title="'+rowData.date_created+'">'+
													'<span class="glyphicon glyphicon-dashboard"></span>  '+rowData.timespan+'<abbr>'+
												'</div>'+
												'<div class="panel-body">'+
													'<h4 class="post-teacher">'+rowData.messageorfile_caption+'</h4><span class="glyphicon glyphicon-pushpin pull-right"></span>'+
												'</div>'+
												rowData.display_footer+
											'</div>');



							$("#message-container").append(display);

						}

						function getMessagesubject()
						{
							var ajax_message = $('#messagesubject').val();
				
				        	$.ajax({
					 
					            url: 'views/ajax/get_announcement_lecture.php',
					            type: 'POST',
					            data: {
					            	ajax_message_subject:ajax_message
					            },
					           dataType: 'json',

								success: function(response, textStatus, jqXHR)
					            {
									
									if(typeof response.error === 'undefined')
									{
										alert(response.success);
										display_announcement_lecture(response['announcement_lecture_bySubject']);

									}
									
					          	},
					          	error: function(jqXHR, textStatus, errorThrown)
					          	{
					            	
					            		alert('ERROR: ' + textStatus);
					            	
					          	},
					          	complete: function()
					            {
					            	// Completed
					            }


					            });

						}


						function getMessagegrade()
						{
							var ajax_message = $('#messagegrade').val();
						
				        	$.ajax({
					 
					            url: 'views/ajax/get_announcement_lecture.php',
					            type: 'POST',
					            data: {
					            	ajax_message_grade:ajax_message
					            },
					           dataType: 'json',

								success: function(response, textStatus, jqXHR)
					            {
									
									if(typeof response.error === 'undefined')
									{
										alert(response.success);
										display_announcement_lecture(response['announcement_lecture_byGrade']);

									}
									
					          	},
					          	error: function(jqXHR, textStatus, errorThrown)
					          	{
					            	
					            		alert('ERROR: ' + textStatus);
					            	
					          	},
					          	complete: function()
					            {
					            	// Completed
					            }


					            });

						}

						function getMessagesection()
						{
							var ajax_message = $('#messagesection').val();
			
				        	$.ajax({
					 
					            url: 'views/ajax/get_announcement_lecture.php',
					            type: 'POST',
					            data: {
					            	ajax_message_section:ajax_message
					            },
					           dataType: 'json',

							   success: function(response, textStatus, jqXHR)
					            {
									
									if(typeof response.error === 'undefined')
									{
										alert(response.success);
										display_announcement_lecture(response['announcement_lecture_bySection']);
									}
									
					          	},
					          	error: function(jqXHR, textStatus, errorThrown)
					          	{
					            	
					            		alert('ERROR: ' + textStatus);
					            	
					          	},
					          	complete: function()
					            {
					            	// Completed
					            }




					            });

						}

						$(function(){

							$(document.body).on('submit', '#upload_ajax_subject',  uploadFilesSubject);
							$(document.body).on('submit', '#upload_ajax_grade', uploadFilesGrade);
							$(document.body).on('submit', '#upload_ajax_section', uploadFilesSection);

	
							function uploadFilesSubject(event)
							{
								var ajax_message = $('#captionsubject').val();
								/*alert(ajax_message);*/

								event.stopPropagation();
						        event.preventDefault();

							    $.ajax({
							            url: 'views/ajax/get_upload_lecture.php?captionsubject='+ajax_message,
							            type: 'POST',
							            data: new FormData(this),
							            contentType: false, 
							            cache: false,
							            processData: false,
							            dataType: 'json',
							            success: function(data, textStatus, jqXHR)
							            {
											
											if(typeof data.error === 'undefined')
											{
												alert(data.success);
												display_announcement_lecture(data.announcement_lecture_bySubject);

											}
											else
											{
												alert('Error: '+data.error);
											}	

											
							          	},
							          	error: function(jqXHR, textStatus, errorThrown)
							          	{
							            	
							            		alert('ERROR: ' + textStatus);
							            	
							          	},
							          	complete: function()
							            {
							            	// Completed
							            }
							
							        });    


						    }


						    function uploadFilesGrade(event)
							{
								var ajax_message = $('#captiongrade').val();
								/*alert(ajax_message);*/

								event.stopPropagation();
						        event.preventDefault();

							    $.ajax({
							            url: 'views/ajax/get_upload_lecture.php?captiongrade='+ajax_message,
							            type: 'POST',
							            data: new FormData(this),
							            contentType: false, 
							            cache: false,
							            processData: false,
							            dataType: 'json',
							            success: function(data, textStatus, jqXHR)
							            {
											
											if(typeof data.error === 'undefined')
											{
												alert(data.success);
												display_announcement_lecture(data.announcement_lecture_byGrade);

											}
											else
											{
												alert('Error: '+data.error);
											}	

											
							          	},
							          	error: function(jqXHR, textStatus, errorThrown)
							          	{
							            	
							            		alert('ERROR: ' + textStatus);
							            	
							          	},
							          	complete: function()
							            {
							            	// Completed
							            }
							
							        });    


						    }

						    function uploadFilesSection(event)
							{
								var ajax_message = $('#captionsection').val();
								/*alert(ajax_message);*/

								event.stopPropagation();
						        event.preventDefault();

							    $.ajax({
							            url: 'views/ajax/get_upload_lecture.php?captionsection='+ajax_message,
							            type: 'POST',
							            data: new FormData(this),
							            contentType: false, 
							            cache: false,
							            processData: false,
							            dataType: 'json',
							            success: function(data, textStatus, jqXHR)
							            {
											
											if(typeof data.error === 'undefined')
											{
												alert(data.success);
												display_announcement_lecture(data.announcement_lecture_bySection);

											}
											else
											{
												alert('Error: '+data.error);
											}	

											
							          	},
							          	error: function(jqXHR, textStatus, errorThrown)
							          	{
							            	
							            		alert('ERROR: ' + textStatus);
							            	
							          	},
							          	complete: function()
							            {
							            	// Completed
							            }
							
							        });    


						    }



						    
						});//End of ready
						

        </script>		
	</body>
    

</html>