<!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
        <!--<link rel="stylesheet" type="text/css" href="views/bootstrap.min.css"/>-->
		<link href="views/bootstrap.css" rel="stylesheet"/>
        <link href="views/exDesign.css" rel="stylesheet"/>
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
	<?php include "views/parts/navi-bar-teacher.php";?>
</div><!--header-wrapper-->

<div class="wrapper-separator"></div>
<div class="viewport">
	<div class="content">
		<div class="container">
			<?php include "views/parts/side-bar-teacher.php";?>
			
			<div class="right-wrapper">
				<div class="right-column">
					<div class="right-column-fixed">
							<div id="postbox-container">
								<ul id="myTab" class="nav nav-tabs">
										<li class="active"><a href="#announcement" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span> Write Announcement</a></li>
										<li><a href="#lecture-exercises" data-toggle="tab"><span class="glyphicon glyphicon-upload"></span> Post Lecture Files </a></li>
										<li><a href="#create-exercises" data-toggle="tab" ><span class="glyphicon glyphicon-tasks"></span> Create Online Exercise</a></li>
										<li><a href="#attendance-sheet" data-toggle="tab">Attendance Sheet</a></li>
									  </ul>
									  <div id="myTabContent" class="tab-content">
										<div class="tab-pane fade in active" id="announcement">
									
											<div class="msgbox">
												<div class="row">
													<div class="col-md-12 col-md-12">
													
															<div class="panel-body">                
																<form accept-charset="UTF-8" action="" method="POST">
																	<textarea class="form-control counted" name="message" placeholder="Type in your announcement" 
																	rows="1" required="required"></textarea>
																	<h6 class="pull-left" id="counter">320 characters remaining</h6>
																	<button class="pull-right btn btn-info" type="submit"><span class="glyphicon glyphicon-send"></span>Post</button>
																</form>
																
															</div>
													
													</div>
												</div>
											</div>
										
										</div>
										<div class="tab-pane fade" id="lecture-exercises">
									
												<!--<button type="button" class="btn btn-default btn-cons" onclick="window.location.href='index.php?r=lss&tr=ce'">Create Exercises</button>-->
											
												<div class="msgbox">
													<div class="row">
														<div class="col-md-12 col-md-12">
															
																<div class="panel-body">       
																	<form method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
																			<textarea class="form-control counted" name="lecture-caption" placeholder="Create Title/Caption" 
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
																</div>
														
														</div>
													</div>
											
			
											</div>
										  
										</div>  
										
										<div class="tab-pane fade" id="create-exercises">
											<div class="msgbox">
													<div class="row">
														<div class="col-md-12 col-md-12">
															
																<div class="panel-body text-center "> 

																		<div class="btn-group text-center " data-toggle="buttons-radio">
																		  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=ce&cc=mic'"><span class="glyphicon glyphicon-edit"></span>Multiple Choice</button>
																		  
																		  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=ce&cc=te'"><span class="glyphicon glyphicon-edit"></span>True or False</button>
																		  
																		  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=ce&cc=me'"><span class="glyphicon glyphicon-edit"></span>Matching Type</button>
																		  
																		  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=ce&cc=fs'"><span class="glyphicon glyphicon-edit"></span>Fill in the blank</button>
																		</div>

																	</div>
														
														</div>
													</div>
											
			
											</div>							
										</div>	
										
										<div class="tab-pane fade" id="attendance-sheet">
											<!--<img src="views/res/attendance.png" class="img-rounded shadow attendance" />-->	
											<!--<iframe width="700" height="500" frameborder="0" scrolling="no" src="https://onedrive.live.com/embed?cid=D2A43DA0B1EE900A&resid=D2A43DA0B1EE900A%21117&authkey=AEkUlL1qQ2RPZH0&em=2&AllowTyping=True&ActiveCell='Nov'!D8&wdHideGridlines=True&wdHideHeaders=True&wdDownloadButton=True"></iframe>-->
										</div>
										
										<div class="tab-pane fade" id="photo">
										  
										</div>
										
										<div class="tab-pane fade" id="file">
										  
										</div>
										
									  </div>

							
							</div><!--postbox-container-->

						
					</div><!--right-column-fixed-->
					<div class="post-separator"></div>
					<div id="post-title-fixed">
						<div id="post-title"><span class="glyphicon glyphicon-flag"></span>Latest Post</div>
					</div>
					<div id="post-container-relative">
								<div id="post-container">
								
										<div id="message-container">

											<?php 	
											foreach($display_box as $display)
											{
											?>	

												<div class="post-messages panel panel-default">
													<div class="panel-heading">
														<a href="#" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
															<div><img src="views/res/teacher.jpg" class="img-rounded shadow post-message-img pull-left" /></div>
															<div><a class="navbar-link message-author"><h5><?php echo $_SESSION['reg_fname'];?></h5></a></div>
															<?php echo '</span><abbr class="timespan" title="'.$display['date_created'].'">
															<span class="glyphicon glyphicon-dashboard"></span>  '.$display['timespan'].'<abbr>'; ?>
														</div>

														<div class="panel-body">
															<h4 class="post-teacher"><?php echo $display['message']; ?></h4><span class="glyphicon glyphicon-pushpin pull-right"></span>
															
														</div>

														<?php 
															if(    (!empty($display['file_path'])) and (!empty($display['file'])) )
															{

														?>
															<div class="panel-footer">
																<form action="" method="post" name="download">
																<?php 

																		$temp = explode(".",$display['file']);
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
																	echo '<div><a><img src="'.$display['file_path'].$display['file'].'" class="img-thumbnail post-lecture-image">';
																}




																echo '<p class="pull-right"><span class="glyphicon glyphicon-paperclip"></span>'.$display['file'].'</p>
																					
																	<input name="file_name" value="'.$display['file'].'" type="hidden"/>
																
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
										
									<!--<div class="post-messages">
										<img src="views/res/teacher.jpg" class="img-rounded shadow post-message-img" />
										<img src="views/res/sample_lecture.jpg" class="img-rounded shadow sample_lecture" />
									</div>-->
									
					
								</div><!--post-container-->
						</div><!--post-container-fixed-->
				</div><!--right-column-->		
				
			</div><!--right-wrapper-->	
			
		</div><!--container-->	
	
	
	</div><!--content-->
</div><!--viewport-->
       
        <script src="views/transition.js"></script>
        <script src="views/jquery.min.js"></script>
        <script src="views/bootstrap.min.js"></script>
		<script src="views/tab.js"></script>
		

		<script src="views/tooltip.js"></script>
		<script src="views/popover.js"></script>
		<script src="views/msgbox.js"></script>
		<script src="views/scripts.js"></script>
	
		<!-- JavaScript Test -->
<script>
$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
})
</script>

	</body>
    

</html>