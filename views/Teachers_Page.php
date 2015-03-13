<!--@author Darryl-->
<!--@copyright 2014-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Teacher Page</title>
        <link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
        <link href="colorbox.css" rel="stylesheet"/>
		<script src="../jquery.colorbox.js"></script>
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
				<div class="left-content col-md-3">
					<?php include "views/parts/side-bar-teacher.php";?>
				</div>
				<!--End of left content-->

				<!--Start of mid content-->
				<div class="main-content col-md-6">
 					<div class="row"><!--//row for right column fixed -->
 						<div class="col-md-12">
 							<div class="row announcement-box"><!--//row for postbox-container -->
 								


	 						</div><!--//row for postbox container-->	
	 					</div><!--right-column-fixed-->
	 				</div><!--//row for right column fixed -->

					<div class="row"><!--//row for post title fixed-->
						<div class="col-md-12 content">
							<div class="row"><!--//row for post title-->

								<div class="panel panel-default no-margin-bottom no-border">
								  <div class="panel-heading" id="post-title">
								  	<div class="has-inline"><i class="fa fa-comments-o fa-lg"></i> Post to All Sections</div>
								  </div>
								</div>

							</div><!--//row for post title-->
						</div>
					</div><!--//row for post title fixed-->

					<div class="row post-container"><!--//row for post-box-->
						<?php   
                        foreach($display_box as $display)
                        {

                     	
					echo'<div id="post-container">
							<!-- post box -->
                            <div class="panel post-box no-margin-bottom">
                            	<div class="post-box-header panel-heading">
                            		<div class="row"><!--//row for header-->
	                            		<div class="col-md-12">
	                            			<img src="views/res/'.$_SESSION['profile_pic'].'" class="shadow post-message-img img-circle pull-left" />
	                            			<div><a class="message-author"><small> '.$_SESSION['reg_fname'].' '.$_SESSION['reg_lname']. ' <i class="fa fa-bullhorn"></i> '.$display['level_description'].'::'. $display['sectionNo'].'-'.$display['section_name'].': '.$display['subject_title'].'</small></a></div>
	                            			<strong><i class="timespan fa fa-clock-o fa-fw"></i>'.$display['date_created'].'</strong>
	                            			<div><small class="timespan">'.$display['timespan'].'</small></div>
	                            		</div>

			                        </div><!--//row for header-->    
                        		</div><!--panel-heading-->
    
                                <div class="panel-body">
                                    <!-- box -->
                                    <div class="box" id="'.$display['message_id'].'">
                                        <div class="message">
                                            '.$display['messageorfile_caption'].'
                                        </div>';
                                if( (!empty($display['file_path'])) and (!empty($display['file_name'])) )
                                {
                                echo 	'<div class="attachment">
                                			<form action="" method="post" name="download">
	                                            <div class="row">';

	                                    $temp = explode(".",$display['file_name']);
	                                    $nameoffile = $temp[0];
	                                    $extension = end($temp);

                                    	if(
                                        ($extension=='doc')||($extension=='docx')||($extension=='docm')||
                                        ($extension=='docb')||($extension=='dotm')||
                                        ($extension=='dotx')
                                      	) 
                                      	{
	                                        echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/word.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';

	                                        echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';

	                                    }

                                        else if ($extension=='pdf') 
                                        {
                                        	 echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/adobe.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';

	                                        echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';
                                        }

                                       	else if(
                                        ($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')
                                        ||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb')
                                        )
                                      	{
                                      		 echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/excel.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
	                                       	echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';    	
                                      	}

                                      	else if
	                                    ( 
                                        ($extension=='ppt')||($extension=='pptx')||($extension=='pptm')||($extension=='potx')||
                                        ($extension=='potm')||($extension=='ppam')||($extension=='ppsx')||($extension=='ppsm')||
                                        ($extension=='sldx')||($extension=='sldm')
	                                    )
                                        {
                                        	 echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/powerpoint.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
	                                       	echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';
                                        }

                                        else if
                                      	( 
                                        $extension=='7z'
                                      	)
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/7z.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';

	                                        echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';
                                        }

                                        else if
                                       	(
                                    	$extension=='rar'
                                   		)
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/rar.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';

	                                       	echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';
                                        }

                                         else if
                                        (
                                        $extension=='swf'
                                        )
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/swf.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';

	                                       	echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';
                                        }

                                        else if
                                        (
                                        $extension=='zip'
										)
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/zip.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';

	                                       	echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';
                                        }

                                        else
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="'.$display['file_path'].$display['file_name'].'" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';

	                                       	echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="file_name" value="'.$display['file_name'].'" type="hidden"/>
	                                                    <div class="btn-group" role="group">
	                                                    	<button type="submit" class="btn btn-primary btn-xs">
	                                        					Download <span class="glyphicon glyphicon-save"></span>
	                                        				</button>
	                                        				
	                                                    </div>  
	                                            	</div>

	                                            </div><!--//row-->
	                                        </form>
                                        </div><!-- //attachment -->';
                                        }

                                }

                            echo    '</div><!--//box-->
                                    <!-- chat item -->
                                </div><!-- //panel-body -->

                                <div class="panel-footer">
                                	'.$display['comments'].'
                                	<div class="row has-padding-top-5">
                                		<div class="col-md-12">
                                			<div class="">
	                                			<img src="views/res/'.$_SESSION['profile_pic'].'" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />
	                                		</div>

	                                		<div class="input-group col-md-11 col-md-offset-1">
	                                			<input type="hidden" id="announcement_id" name="announcement_id" value="'.$display['announcement_id'].'"/>
	                                        	<textarea class="form-control input-sm commentarea" name="comment" id="comment_general" placeholder="Write a comment..." rows="1" wrap="hard"></textarea>
	                                    	</div>
                                		</div>
	                                </div><!--//row-->
	                               
                                </div><!--//panel-footer-->
                            </div><!-- //post box -->
                        </div><!--post-container-->';
                      
                        }   
                        ?>    
					</div><!--//row for post box-->

					<!--Modal for view all-->
					<div class="modal fade view-all-parent-msg-lg" tabindex="-1" role="dialog" aria-labelledby="ViewAll" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-narrow modal-lg">
					    <div class="modal-content modal-content-narrow">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  
							    <!--Start of main -->
								<div class="main container-fluid view-all-parent-msg">
									<div class="row">

										<!--Start of mid content-->
											<div class="main-content col-md-12 view-all-parent-msg-main-content">

												 <div class="row"><!--//row  -->
							 						<div class="col-md-12">
							 							<div class="row announcement-box-parent"><!--//row for announcement-box-parent -->
							 								


								 						</div><!--//row for announcement-box-parent-->	
								 					</div><!--col-->
								 				</div><!--//row -->

								 				<div class="row"><!--//row -->
													<div class="col-md-12 content">
														<div class="row"><!--//row-->

															<div class="panel panel-default no-margin-bottom no-border">
															  <div class="panel-heading" id="post-title-parent">
															  	
															  </div>
															</div>

														</div><!--//row-->
													</div>
												</div><!--//row-->

												<div class="row post-container-parent"><!--//row for post-container-parent-->

												</div><!--//row for post-container-parent-->	



											</div>
										<!--End of mid content-->
									
									</div><!--row-->
								</div><!--container-fluid-->
								<!--End of main -->	


					    </div>
					  </div>
					</div>
					<!--Modal for view all-->	

					<!--Modal for progress-->
					<div class="modal fade view-student-progress-lg" tabindex="-1" role="dialog" aria-labelledby="ViewProgress" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-full modal-lg">
					    <div class="modal-content modal-content-full">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  
							    <!--Start of main -->
								<div class="main container-fluid view-student-progress">
									<div class="row">

										<!--Start of mid content-->
											<div class="main-content col-md-12 view-student-progress-main-content"></div>
										<!--End of mid content-->
									
									</div><!--row-->
								</div><!--container-fluid-->
								<!--End of main -->	


					    </div>
					  </div>
					</div>
					<!--Modal for progress-->	

					<!-- Private Message MODAL -->
			        <div class="modal fade" id="private-message-modal" tabindex="-1" role="dialog" aria-hidden="true">
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Private Message to Parent</h4>
			                    </div>
			                    <form method="post" id="private-message">
			                        <div class="modal-body">

			                            <div class="form-group">
			                                <textarea name="private_message" id="private_message" class="form-control" placeholder="Private Message" style="height: 120px;"></textarea>
			                            </div>

			                        </div>
			                        <div class="modal-footer clearfix">

			                            <button type="button" class="btn btn-primary pull-right" id="submitPrivateMessage"><i class="fa fa-envelope"></i> Send Message</button>
			                        </div>
			                    </form>
			                </div><!-- /.modal-content -->
			            </div><!-- /.modal-dialog -->
			        </div><!-- /.modal -->

				</div>
				<!--End of mid content-->

				<!--Start of right content-->
				<div class="right-content col-md-3">

				</div>
				<!--End of right content-->

		</div><!--row-->
	</div><!--container-fluid-->
<!--End of main -->			
      
<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
<script src="views/plugins/jQuery-slimScroll/jquery.slimscroll.min.js"></script>
<script src="views/plugins/chartjs/Chart.js"></script>
<script src="views/plugins/colorbox/jquery.colorbox.js"></script>

<script>
$(function () 
{	
	 $('[data-toggle="popover"]').popover()

	 $(document.body).on({
		    mouseenter: function(){
			    
			    $(this).slimScroll({
			    height: '150px'
				});
		    },
		    mouseleave: function(){
		    
		    }
		}, '.post-parent-box');

	  $(document.body).on({
		    mouseenter: function()
		    {

		        $(this).slimScroll({
			    height: '500px'
				});
		    },
		    mouseleave: function()
		    {
		        
		    }
		}, '#student-list-side-menu');


			var class_rec_no;
		    var grade;
            var sectionno;
            var section;
            var subject;

			$(document.body).on('focus', '.textarea', function () 
            {
            	this.rows=3;
            });

           	$(document.body).on('focus', '.captionarea', function () 
            {
            	this.rows=3;
            });

            $(document.body).on('keyup', '.textarea', function () 
            {
            	AutoGrowTextArea(this);
            });

            $(document.body).on('keyup', '.captionarea', function () 
            {
            	AutoGrowTextArea(this);
            });

            $(document.body).on('keyup', '.commentarea', function () 
            {
            	AutoGrowTextArea(this);
            });

/*        	$(document.body).on('paste, keydown', '.textarea', function () 
            {
            	AutoGrowTextArea(this);
            });

        	$(document.body).on('paste, keydown', '.captionarea', function () 
            {
            	AutoGrowTextArea(this);
            });

            $(document.body).on('paste, keydown', '.commentarea', function () 
            {
            	AutoGrowTextArea(this);
            });*/


 			$('.side-menu').on('click', function () 
            {
                $('.side-menu').removeClass('teacher-side-menu-click');
                $(this).addClass('teacher-side-menu-click');

                 grade=$(this).attr('grade');
                 sectionno=$(this).attr('sectionno');
                 section=$(this).attr('section');
                 subject=$(this).attr('subject');

                $('#post-title').empty();
                var display = $('<div class="has-inline"><i class="fa fa-comments-o fa-lg"></i> Post to '+grade+'::'+sectionno+'-'+section+':'+subject+'</div>');
				$('#post-title').append(display);

				$('.announcement-box').empty();
				var box =$('<div class="col-md-12 content" id="postbox-container">'+
										'<div class="row">'+
											'<ul id="myTab" class="nav nav-tabs col-md-12">'+
	                                                '<li class="active">'+
	                                                	'<a href="#announcement" data-toggle="tab">'+
	                                                		'<span class="glyphicon glyphicon-pencil"></span> Write Announcement'+
	                                                	'</a>'+
	                                                '</li>'+
	                                                '<li><a href="#lecture-exercises" data-toggle="tab">'+
	                                                	'<span class="glyphicon glyphicon-upload"></span> Post Lecture Files'+
		                                                '</a>'+
		                                            '</li>'+
/*		                                            '<li><a href="#announcement-parent" data-toggle="tab">'+
	                                                	'<i class="fa fa-bullhorn"></i> Post to Parents'+
		                                                '</a>'+
		                                            '</li>'+*/
	                                        '</ul>'+

	                                        '<div id="myTabContent" class="tab-content">'+
	                                            '<div class="tab-pane fade in active" id="announcement">'+
	                                                '<div class="col-md-12">'+
	                                                    '<div class="panel-body" id="announce-box">'+                
	                                                        '<form accept-charset="UTF-8" method="POST">'+
	                                                            '<textarea class="form-control input-sm textarea" name="message" id="message_ajax" placeholder="Type in your announcement" rows="1" required="required"  wrap="hard"></textarea>'+
	                                                            '<button type="button" class="pull-right btn btn-info btn-sm" id="getMessage">'+
	                                                            	'<span class="glyphicon glyphicon-send"></span> Post'+
	                                                            '</button>'+
	                                                        '</form>'+
	                                                    '</div>'+
	                                                '</div>'+
	                                            '</div>'+

	                                            '<div class="tab-pane fade" id="lecture-exercises">'+                             
	                                                '<div class="col-md-12">'+
	                                                    '<div class="panel-body" id="upload-box">'+       
	                                                        '<form method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="upload_ajax">'+
	                                                                '<textarea id="caption-box" class="form-control input-sm captionarea" name="lecture-caption" placeholder="Create Title/Caption" rows="1" required="required"  wrap="hard"></textarea>'+
	                                                                
	                                                                '<div class="choose-file-container">'+
	                                                                    '<div><small>Choose File..(max 64 MB)</small></div>'+
	                                                                    '<div class="row">'+
	                                                                    	'<div class="col-md-10">'+
		                                                                		'<input type="file" name="upload_lecture_ajax" size="40" id="upload_lecture_ajax" accept="*" class="pull-left"/>'+
		                                                                	'</div>'+
		                                                                	'<div class="col-md-2">'+
			                    												'<button class="pull-right btn btn-info btn-sm" type="submit">'+
			                                                                        	'<span class="glyphicon glyphicon-send"></span> Upload'+
			                                                                    '</button>'+
			                                                                '</div>'+
	                                                                    '</div>'+
	                                                                '</div>'+
	                                                        '</form>'+
	                                                    '</div>'+
	                                                '</div>'+
	                                            '</div>'+

/*	                                            '<div class="tab-pane fade" id="announcement-parent">'+
	                                                '<div class="col-md-12">'+
	                                                    '<div class="panel-body" id="announce-parent-box">'+                
	                                                        '<form accept-charset="UTF-8" method="POST">'+
	                                                            '<textarea class="form-control input-sm textarea" id="message_parent" name="message-parent" placeholder="Announcement to Parents" rows="1" required="required"  wrap="hard"></textarea>'+
	                                                            '<button class="pull-right btn btn-info btn-sm" type="button" id="getMessageParent">'+
	                                                            	'<span class="glyphicon glyphicon-send"></span> Post'+
	                                                            '</button>'+
	                                                        '</form>'+
	                                                    '</div>'+
	                                                '</div>'+
	                                            '</div>'+*/

	                                        '</div>'+
										'</div><!--row-->'+
								'</div><!--postbox-container-->');
				$('.announcement-box').append(box);

				$('.right-content').empty();
				var right = $('<div class="row">'+
									'<div class="col-md-12">'+
							            '<div class="panel panel-warning content has-margin-bottom-10 tf-box">'+
							                '<div class="panel-heading">'+
							                    '<h3 class="panel-title"></h3>'+
							                    
							                        '<!-- Tabs -->'+
							                        '<ul class="nav nav-tabs" role="tablist">'+
							                            '<li role="presentation" class="active">'+
							                            	'<a href="#postparents" role="tab" data-toggle="tab">'+
							                            		'<i class="fa fa-street-view"></i>To Parents'+
							                            	'</a>'+
							                            '</li>'+
							                            '<li>'+
							                            	'<a href="#messageparents" role="tab" data-toggle="tab">'+
							                            		'<i class="fa fa-bullhorn"></i>Message Parents'+
							                            	'</a>'+
							                        	'</li>'+ 
							                        '</ul>'+
							                   
							                '</div>'+
							                '<div class="panel-body post-parent-body">'+
							                    '<div class="tab-content">'+
							                        '<div class="tab-pane fade in active" id="postparents">'+

							                        	'<div class="post-parent-box">'+
							                        		'<div class="no-padding-top-bottom post-parent-box-container-box">'+
																														
															'</div><!--no padding-->'+
														'</div><!--post-parent-box-->'+
							                        '</div><!--tab-pane-->'+

							                        '<div class="tab-pane fade" id="messageparents">'+
							                        	'<div class="tab-pane fade in active" id="post-parent-msg-write">'+
				                                                '<div class="col-md-12 no-padding no-padding-top-bottom">'+
				                                                    '<div class="panel-body" id="post-parent-msg-write-box">'+                
				                                                        '<form accept-charset="UTF-8" method="POST">'+
				                                                            '<textarea class="form-control input-sm textarea" name="post_parent_msg" id="post_parent_msg" placeholder="Write Announcement.." rows="1" required="required"  wrap="hard"></textarea>'+
				                                                            '<button type="button" class="pull-right btn btn-info btn-sm" id="getMessageParent">'+
				                                                            	'<span class="glyphicon glyphicon-send"></span> Post'+
				                                                            '</button>'+
				                                                        '</form>'+
				                                                    '</div>'+
				                                                '</div>'+
				                                            '</div>'+
							                        '</div>'+
							                    '</div>'+
							                '</div><!--panel-body-->'+
							                '<div class="panel-footer post-parent-msg-footer">'+
							                	'<a class="post-parent-msg-controls col-md-offset-9 control-anchor" id="viewall">'+
							                		'<i class="fa fa-eye"></i> View All</a>'+
							                '</div>'+	
							            '</div>'+
							        '</div>'+
								'</div><!--row-->'+
								'<div class="row">'+
									'<div class="col-md-12">'+

										'<div class="panel panel-info">'+
											
											'<div class="panel-heading" id="student_list">'+
										  		'<i class="fa fa-child"></i> Students'+
										    '</div>'+
										    '<div class="row">'+
				                               	 '<div class="input-group-sm col-md-12" id="search-query-holder">'+
				                                    '<input type="text" name="search_student" class="form-control input-sm" placeholder="Search Student" id="student-search"/>'+
				                                 '</div>'+
				                     		'</div>'+	
											
										  	'<ul class="list-group" id="student-list-side-menu">'+

										  	'</ul>'+	
										'</div><!--panel-->'+
									'</div><!--col-md-12-->'+

								'</div><!--row-->')
				$('.right-content').append(right);

				//pass class_rec_no
                class_rec_no=$(this).attr('side-menu-id');
               /* alert(class_rec_no);*/

	        	$.ajax({
		 
		            url: 'views/ajax/get_announcement_lecture.php?class_rec_no',
		            type: 'POST',
		            data: {
		            	class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							/*alert(JSON.stringify(response['announcement_lecture']));*/
		           			display_announcement_lecture(response['announcement_lecture']);
		           			
						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: ' + textStatus);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });


					$.ajax({
		 
		            url: 'views/ajax/get_right_side.php?post_parent_msg_init',
		            type: 'POST',
		            data: {
		            	class_rec_no_init:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							/*alert(JSON.stringify(response['teacher_feedback']));*/
							display_teacher_feedback(response['teacher_feedback']);
						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: '+ textStatus+' '+errorThrown);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });

	        	$.ajax({
		 
		            url: 'views/ajax/get_right_side.php?class_rec_no',
		            type: 'POST',
		            data: {
		            	class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							/*alert(JSON.stringify(response['student_list']));*/
		           			displayStudents(response['student_list']);
		           			
						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: ' + textStatus+' '+errorThrown);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });



            });//

			function displayStudents(data) 
			{
				$("#student-list-side-menu").empty();

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawStudentRow(data[i]);
				  
				    }

			}

			function drawStudentRow(rowData) 
			{


				if(rowData.image!=null && rowData.reg_lname!=null && rowData.reg_fname!=null && rowData.reg_mname!=null && rowData.student_lrn!=null)
				{	

				   	 var display = $('<li class="list-group-item list-side-menu student-list-side-menu-heading" student-lrn="'+rowData.student_lrn+'">'+
					                      '<div class="">'+
					                        '<img src="views/res/'+ rowData.image +'" class="menu-box-img img-thumbnail shadow pull-left"/>'+
					                      '</div>'+                          
					                      '<div class="has-margin-left-35">'+
					                        '<div class="panel-title student-list-side-menu-title col-md-offset-1">'+rowData.reg_lname+', '+rowData.reg_fname+' '+rowData.reg_mname+'</div>'+
					                        '<div class="panel-title student-list-side-menu-title col-md-offset-1"><small><strong>'+rowData.student_lrn+'</strong><small></div>'+
					                        '<div class="panel-title student-list-side-menu-title col-md-offset-1">'+
												/*'<a class="student-list-controls"><i class="fa fa-line-chart"></i> Progress </a>'+*/
												'<a class="student-list-controls message-parent" student-lrn="'+rowData.student_lrn+'"><i class="fa fa-bullhorn"></i> Message Parent </a>'+
											'</div>'+
					                      '</div>'+
					                     
					                    '</li>');

					$("#student-list-side-menu").append(display); 
			   	}
			    

			}

			$(document.body).on('click', '#viewall', function()
			{
				$('.view-all-parent-msg-lg').modal('show')
				viewAllMsgParent();

			});

			function viewAllMsgParent()
			{
				$('#post-title-parent').empty();
                var display = $('<div class="has-inline"><i class="fa fa-comments-o fa-lg"></i> Post to '+grade+'::'+sectionno+'-'+section+':'+subject+' Parents</div>');
				$('#post-title-parent').append(display);

				$('.announcement-box-parent').empty();
				var box =$('<div class="col-md-12 content" id="postbox-container">'+
										'<div class="row">'+
											'<ul id="myTab" class="nav nav-tabs col-md-12">'+
	                                                '<li class="active">'+
	                                                	'<a href="#announcement" data-toggle="tab">'+
	                                                		'<span class="glyphicon glyphicon-pencil"></span> Write Announcement'+
	                                                	'</a>'+
	                                                '</li>'+

	                                        '</ul>'+

	                                        '<div id="myTabContent" class="tab-content">'+
	                                            '<div class="tab-pane fade in active" id="announcement">'+
	                                                '<div class="col-md-12">'+
	                                                    '<div class="panel-body" id="announce-box">'+                
	                                                        '<form accept-charset="UTF-8" method="POST">'+
	                                                            '<textarea class="form-control input-sm textarea" name="message_ajax_parent" id="message_ajax_parent" placeholder="Type in your announcement" rows="1" required="required"  wrap="hard"></textarea>'+
	                                                            '<button type="button" class="pull-right btn btn-info btn-sm" id="getMessageParentModal">'+
	                                                            	'<span class="glyphicon glyphicon-send"></span> Post'+
	                                                            '</button>'+
	                                                        '</form>'+
	                                                    '</div>'+
	                                                '</div>'+
	                                            '</div>'+



	                                        '</div>'+
										'</div><!--row-->'+
								'</div><!--postbox-container-->');
				$('.announcement-box-parent').append(box);

				/*alert(class_rec_no);*/
					 $.ajax({
		 
		            url: 'views/ajax/get_right_side.php?get-parent-msg-modal',
		            type: 'POST',
		            data: {
		            	class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							/*alert(JSON.stringify(response['teacher_feedback_modal']));*/
		           			display_teacher_feedback_modal(response['teacher_feedback_modal']);
		           			
						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: ' + textStatus);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });


			}

			function display_teacher_feedback_modal(data) 
			{
				$(".post-container-parent").empty();
				

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawRowModal(data[i]);
				  
				    }

			}

			function drawRowModal(row) 
			{

				var display = $('<div id="post-container">'+
									'<!-- post box -->'+
		                            '<div class="panel post-box no-margin-bottom">'+
		                            	'<div class="post-box-header panel-heading">'+
		                            		'<div class="row"><!--//row for header-->'+
			                            		'<div class="col-md-12">'+
			                            			'<img src="views/res/'+row.teacher_image+'" class="shadow post-message-img img-circle pull-left" />'+
			                            			'<div><a class="parent-message-author"><small> '+row.teacher_lname+', '+row.teacher_fname+ ' '+row.teacher_mname+' <i class="fa fa-bullhorn"></i> '+row.level_description+'>>'+row.sectionNo+'-'+row.section_name+': '+row.subject_title+' Parents </small></a></div>'+
			                            			'<strong><i class="timespan fa fa-clock-o fa-fw"></i>'+row.feedback_date_created+'</strong>'+
			                            			'<div><small class="timespan">'+row.timespan+'</small></div>'+
			                            		'</div>'+
					                            '<div class="col-md-1 btn-group pull-right">'+
					                                '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">'+
					                                    '<i class="fa fa-pencil-square-o fa-lg"></i>'+
					                                '</button>'+
					                                '<ul class="dropdown-menu slidedown">'+
					                                '<input type="hidden" id="control_id_modal" value="'+row.feedback_message_id+'"/>'+
					                                '<input type="hidden" id="edit_id_modal" value="'+row.announcement_id+'"/>'+
					                                    '<li>'+
					                                        '<a class="edit-post-modal">'+
					                                            '<i class="fa fa-pencil fa-fw"></i>Edit Post'+
					                                        '</a>'+
					                                    '</li>'+
					                                    '<li class="divider"></li>'+
					                                    '<li>'+
					                                        '<a class="delete-post-modal">'+
					                                            '<i class="fa fa-trash-o fa-fw"></i>Delete Post'+
					                                        '</a>'+
					                                    '</li>'+
					                                '</ul>'+
					                            '</div>'+
					                        '</div><!--//row for header-->'+    
		                        		'</div><!--panel-heading-->'+
		    
		                                '<div class="panel-body">'+
		                                    '<!-- box -->'+
		                                    '<div class="box" id="'+row.feedback_message_id+'">'+
		                                        '<div class="message">'+
		                                            row.feedback_message+
		                                        '</div>'+
		                             

		                            	    '</div><!--//box-->'+
		                                    '<!-- chat item -->'+
		                                '</div><!-- //panel-body -->'+

		                                '<div class="panel-footer">'+
		                                	row.comments+
			                                '<div class="row has-padding-top-5">'+
		                                		'<div class="col-md-12">'+
		                                			'<div class="">'+
			                                			'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />'+
			                                		'</div>'+

			                                		'<div class="input-group col-md-11 col-md-offset-1">'+
			                                			'<input type="hidden" id="announcement_id_modal" name="announcement_id_modal" value="'+row.announcement_id+'"/>'+
			                                        	'<textarea class="form-control input-sm commentarea" name="comment_ajax_modal" id="comment_ajax_modal" placeholder="Write a comment..." rows="1"  wrap="hard"></textarea>'+
			                                    	'</div>'+
		                                		'</div>'+
			                                '</div><!--//row-->'+
			                               
		                                '</div><!--//panel-footer-->'+
		                            '</div><!-- //post box -->'+
		                        '</div><!--post-container-->');



				$(".post-container-parent").append(display);

			}

			$(document.body).on('click', '#getMessageParentModal',  getMessageParentModal);

			function getMessageParentModal()
			{
				/*alert(class_rec_no);*/
				var message_ajax_parent = $('#message_ajax_parent').val();



				if(!isNullOrWhiteSpace(message_ajax_parent) )
				{
					/*alert(message_ajax_parent);*/

					$.ajax({
		 
		            url: 'views/ajax/get_right_side.php?message_ajax_parent',
		            type: 'POST',
		            data: {
		            	message_ajax_parent:message_ajax_parent, class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							$('#message_ajax_parent').val('');
							$('.textarea').removeAttr('style');
							$('.textarea').attr('rows', '1');
							alert(response.success);

							display_teacher_feedback_modal(response['teacher_feedback_modal']);

						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: '+ textStatus+' '+errorThrown);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });
				}
				else
				{
					alert('Empty Field');

		           $('.textarea').attr('rows', '1');
		      
				}	
	


			}

			$(document.body).on("keypress", "#comment_ajax_modal", getCommentModal);

			function getCommentModal(e)
			{
				var announcement_id;
			    var code = (e.keyCode ? e.keyCode : e.which);
			    if (code == 13) 
			    {
			        e.preventDefault();
			        e.stopPropagation();
			        var comment=$(this).val();
			        var announcement_id=$(this).prev('input[name="announcement_id_modal"]').val();
			        /*alert(announcement_id);*/
			        if(!isNullOrWhiteSpace(comment))
					{

							$.ajax({
				 
				            url: 'views/ajax/get_right_side.php?comment',
				            type: 'POST',
				            data: {
				            	comment:comment, announcement_id:announcement_id, class_rec_no:class_rec_no
				            },
				           dataType: 'json',

							success: function(response, textStatus, jqXHR)
				            {
								
								if(typeof response.error === 'undefined')
								{
									/*alert(response.success);*/

									display_teacher_feedback_modal(response['teacher_feedback_modal']);

								}
								
				          	},
				          	error: function(jqXHR, textStatus, errorThrown)
				          	{
				            	
				            		alert('ERROR: '+ textStatus+' '+errorThrown);
				            	
				          	},
				          	complete: function()
				            {
				            	// Completed
				            }


				            });

					}	




			    }//if
				


			}

			$(document.body).on("click", ".edit-post-modal", editPostModal);

			function editPostModal()
			{

				var control_id=$(this).parents("ul").find('input#control_id_modal').val();
				/*alert('Control_id: '+control_id);*/
				var message=$('#'+control_id).children('.message').text();
				/*alert('Message: '+message);*/
				var editarea=$('<textarea class="form-control input-sm textarea" name="message_edit" id="message_edit_'+control_id+'"'+ 
								 'rows="1" required="required"  wrap="hard"></textarea>'+
									'<div class="btn-group pull-right" role="group">'+
										'<button type="button" class="btn btn-default btn-xs" id="message_edit_'+control_id+'_cancel">'+
                        					'Cancel'+
                        				'</button>'+
                                    	'<button type="button" class="btn btn-primary btn-xs" id="message_edit_'+control_id+'_done">'+
                        					'Done Editing'+
                        				'</button>'+
                        			'</div>');
				
				$('#'+control_id).children('.message').empty();
				$('#'+control_id).children('.message').append(editarea);
				$('#'+control_id).children('.message').css('padding-bottom','35px');

				var editpost=$(this);

				$("textarea#message_edit_"+control_id).val(message);

				$(document.body).on("click", "#message_edit_"+control_id+"_cancel", function()
				{

				/*alert(class_rec_no);*/
					 $.ajax({
		 
		            url: 'views/ajax/get_right_side.php?get-parent-msg-modal',
		            type: 'POST',
		            data: {
		            	class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							/*alert(JSON.stringify(response['teacher_feedback_modal']));*/
		           			display_teacher_feedback_modal(response['teacher_feedback_modal']);
		           			
						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: ' + textStatus);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });


					
				});

				$(document.body).on("click", "#message_edit_"+control_id+"_done", function()
				{
					var edit_id=$(editpost).parents("ul").find('input#edit_id_modal').val();
					var edit_message=$("textarea#message_edit_"+control_id).val();
/*					alert(edit_id);
					alert(edit_message);
					alert(class_rec_no);*/

					    if(!isNullOrWhiteSpace(edit_message))
						{				
							$.ajax({
			 
				            url: 'views/ajax/get_right_side.php?edit_post',
				            type: 'POST',
				            data: {
				            	edit_message:edit_message, edit_id:edit_id, class_rec_no:class_rec_no
				            },
				           dataType: 'json',

							success: function(response, textStatus, jqXHR)
				            {
								
								if(typeof response.error === 'undefined')
								{
									
				           			/*alert(response.success);*/
				           			display_teacher_feedback_modal(response['teacher_feedback_modal']);
								}
								
				          	},
/*				          	error: function(jqXHR, textStatus, errorThrown)
				          	{
				            	
				            		alert('ERROR: ' + textStatus);
				            	
				          	},*/
				          	complete: function()
				            {
				            	// Completed
				            }


				            });
						}
	

					
				});



				


			}

			$(document.body).on("click", ".delete-post-modal", deletePostModal);
			function deletePostModal()
			{
				var delete_id=$(this).parents("ul").find('input#edit_id_modal').val();
				
				$.ajax({
 
	            url: 'views/ajax/get_right_side.php?delete_post',
	            type: 'POST',
	            data: {
	            	 delete_id:delete_id, class_rec_no:class_rec_no
	            },
	            dataType: 'json',

				success: function(response, textStatus, jqXHR)
	            {
					
					if(typeof response.error === 'undefined')
					{

	           			display_teacher_feedback_modal(response['teacher_feedback_modal']);
	           			
					}
					
	          	},
/*	          	error: function(jqXHR, textStatus, errorThrown)
	          	{
	            	
	            		alert('ERROR: ' + textStatus);
	            	
	          	},*/
	          	complete: function()
	            {
	            	// Completed
	            }


	            });
				
			
			}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			var studentlrn;

			$(document.body).on('click', '.message-parent', function()
			{
				$('#private-message-modal').modal('show')
				studentlrn=$(this).attr('student-lrn');
				
			});

			$(document.body).on('click', '#submitPrivateMessage',  getPrivateParent);

			function getPrivateParent()
			{

				var private_message = $('#private_message').val();
/*				alert(private_message);
				alert(studentlrn);
				alert(class_rec_no);*/


					if(!isNullOrWhiteSpace(private_message) )
					{
						$.ajax({
			 
			            url: 'views/ajax/get_right_side.php?post_private_msg',
			            type: 'POST',
			            data: {
			            	private_message:private_message, class_rec_no:class_rec_no, studentlrn:studentlrn
			            },
			           dataType: 'json',

						success: function(response, textStatus, jqXHR)
			            {
							
							if(typeof response.error === 'undefined')
							{
								$('#private_message').val('');
								/*alert(response['success']);*/
								reset_tf_box();
								display_teacher_feedback(response['teacher_feedback']);
								$('#private-message-modal').modal('hide')
								alert('Message Sent');
							}
							
			          	},
/*			          	error: function(jqXHR, textStatus, errorThrown)
			          	{
			            	
			            		alert('ERROR: '+ textStatus+' '+errorThrown);
			            	
			          	},*/
			          	complete: function()
			            {
			            	// Completed
			            }


			            });
					}
					else
					{
						alert('Empty Field');
			      
					}

			}		

	        $(document.body).on('keyup', '#student-search', student_filter_class);
						
			function student_filter_class()
			{
				var filter=$(this).val();
				/*alert(filter);*/
				/*alert(class_rec_no);*/

				$.ajax({
 
			            url: 'views/ajax/get_for_chart.php?student_search_class',
			            type: 'POST',
			            data: {
			            	student_search_class:filter, class_rec_no_class:class_rec_no
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							  /*alert(JSON.stringify(response['student_filter_class']));*/
								
			           			displayStudents(response['student_filter_class']);
			           		 
						}


            		   });
			}



			function display_announcement_lecture(data) 
			{
				$(".post-container").empty();
				

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawRow(data[i]);
				  
				    }

			}

			function drawRow(row) 
			{

				var display = $('<div id="post-container">'+
									'<!-- post box -->'+
		                            '<div class="panel post-box no-margin-bottom">'+
		                            	'<div class="post-box-header panel-heading">'+
		                            		'<div class="row"><!--//row for header-->'+
			                            		'<div class="col-md-12">'+
			                            			'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow post-message-img img-circle pull-left" />'+
			                            			'<div><a class="message-author"><small> <?php echo $_SESSION["reg_fname"].' '.$_SESSION["reg_lname"];?> <i class="fa fa-bullhorn"></i> '+row.level_description+'::'+row.sectionNo+'-'+row.section_name+': '+row.subject_title+'</small></a></div>'+
			                            			'<strong><i class="timespan fa fa-clock-o fa-fw"></i>'+row.date_created+'</strong>'+
			                            			'<div><small class="timespan">'+row.timespan+'</small></div>'+
			                            		'</div>'+
					                            '<div class="col-md-1 btn-group pull-right">'+
					                                '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">'+
					                                    '<i class="fa fa-pencil-square-o fa-lg"></i>'+
					                                '</button>'+
					                                '<ul class="dropdown-menu slidedown">'+
					                                '<input type="hidden" id="control_id" value="'+row.message_id+'"/>'+
					                                '<input type="hidden" id="edit_id" value="'+row.announcement_id+'"/>'+
					                                    '<li>'+
					                                        '<a class="edit-post">'+
					                                            '<i class="fa fa-pencil fa-fw"></i>Edit Post'+
					                                        '</a>'+
					                                    '</li>'+
					                                    '<li class="divider"></li>'+
					                                    '<li>'+
					                                        '<a class="delete-post">'+
					                                            '<i class="fa fa-trash-o fa-fw"></i>Delete Post'+
					                                        '</a>'+
					                                    '</li>'+
					                                '</ul>'+
					                            '</div>'+
					                        '</div><!--//row for header-->'+    
		                        		'</div><!--panel-heading-->'+
		    
		                                '<div class="panel-body">'+
		                                    '<!-- box -->'+
		                                    '<div class="box" id="'+row.message_id+'">'+
		                                        '<div class="message">'+
		                                            row.messageorfile_caption+
		                                        '</div>'+
		                                        row.display_attachment+

		                            	    '</div><!--//box-->'+
		                                    '<!-- chat item -->'+
		                                '</div><!-- //panel-body -->'+

		                                '<div class="panel-footer">'+
		                                	row.comments+
			                                '<div class="row has-padding-top-5">'+
		                                		'<div class="col-md-12">'+
		                                			'<div class="">'+
			                                			'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />'+
			                                		'</div>'+

			                                		'<div class="input-group col-md-11 col-md-offset-1">'+
			                                			'<input type="hidden" id="announcement_id" name="announcement_id" value="'+row.announcement_id+'"/>'+
			                                        	'<textarea class="form-control input-sm commentarea" name="comment" id="comment_ajax" placeholder="Write a comment..." rows="1"  wrap="hard"></textarea>'+
			                                    	'</div>'+
		                                		'</div>'+
			                                '</div><!--//row-->'+
			                               
		                                '</div><!--//panel-footer-->'+
		                            '</div><!-- //post box -->'+
		                        '</div><!--post-container-->');



				$(".post-container").append(display);

			}

			$(document.body).on('click', '#getMessage',  getMessage);

			function getMessage()
			{
				/*alert(class_rec_no);*/
				var ajax_message = $('#message_ajax').val();

				if(!isNullOrWhiteSpace(ajax_message) )
				{
					$.ajax({
		 
		            url: 'views/ajax/get_announcement_lecture.php?ajax_message',
		            type: 'POST',
		            data: {
		            	ajax_message:ajax_message, class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							$('#message_ajax').val('');
							$('.textarea').removeAttr('style');
							$('.textarea').attr('rows', '1');
							alert(response.success);
							display_announcement_lecture(response['announcement_lecture']);

						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: '+ textStatus+' '+errorThrown);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });
				}
				else
				{
					alert('Empty Field');

		           $('.textarea').attr('rows', '1');
		      
				}	
	


			}

            $(document.body).on('submit', '#upload_ajax',  uploadFiles);

            function uploadFiles(event)
            {
                var caption = $('#caption-box').val();
                /*alert(caption);*/

                event.stopPropagation();
                event.preventDefault();

                if(!isNullOrWhiteSpace(caption))
				{
					  $.ajax({
                        url: 'views/ajax/get_upload_lecture.php?caption='+caption+'&class_rec='+class_rec_no,
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
                            	$('#caption-box').val('');
                            	$('#upload_lecture_ajax').val('');
                            	$('.captionarea').removeAttr('style');
								$('.captionarea').attr('rows', '1');
                                alert(data.success);
                                display_announcement_lecture(data.announcement_lecture);

                            }
                            else
                            {
                                alert('Error: '+data.error);
                            }   

                            
                        },
/*                        error: function(jqXHR, textStatus, errorThrown)
                        {
                            
                                alert('ERROR: ' + textStatus+' '+errorThrown);
                            
                        },*/
                        complete: function()
                        {
                            // Completed
                        }
            
                    });    


				}
				else
				{
					alert('Empty Field');

		           $('.captionarea').attr('rows', '1');
		      
				}	

            }

            //message parent
/*            $(document.body).on('click', '#getMessageParent',  getMessageParent);

			function getMessageParent()
			{
				
				var ajax_message = $('#message_parent').val();

				if(!isNullOrWhiteSpace(ajax_message) )
				{
					$.ajax({
		 
		            url: 'views/ajax/get_announcement_lecture.php?ajax_message_parent',
		            type: 'POST',
		            data: {
		            	ajax_message_parent:ajax_message, class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							$('#message_parent').val('');
							$('.textarea').removeAttr('style');
							$('.textarea').attr('rows', '1');
							alert(response.success);
							display_announcement_lecture(response['announcement_lecture']);

						}
						
		          	},
		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: '+ textStatus+' '+errorThrown);
		            	
		          	},
		          	complete: function()
		            {
		            	// Completed
		            }


		            });
				}
				else
				{
					alert('Empty Field');

		           $('.textarea').attr('rows', '1');
		      
				}	
	


			}*/

            $(document.body).on("keypress", "#comment_ajax", getComment);

			function getComment(e)
			{
				var announcement_id;
			    var code = (e.keyCode ? e.keyCode : e.which);
			    if (code == 13) 
			    {
			        e.preventDefault();
			        e.stopPropagation();
			        var comment=$(this).val();
			        var announcement_id=$(this).prev('input[name="announcement_id"]').val();
			       /* alert(announcement_id);*/
			        if(!isNullOrWhiteSpace(comment))
					{

							$.ajax({
				 
				            url: 'views/ajax/get_announcement_lecture.php?comment',
				            type: 'POST',
				            data: {
				            	comment:comment, announcement_id:announcement_id, class_rec_no:class_rec_no
				            },
				           dataType: 'json',

							success: function(response, textStatus, jqXHR)
				            {
								
								if(typeof response.error === 'undefined')
								{

									display_announcement_lecture(response['announcement_lecture']);

								}
								
				          	},
/*				          	error: function(jqXHR, textStatus, errorThrown)
				          	{
				            	
				            		alert('ERROR: '+ textStatus+' '+errorThrown);
				            	
				          	},*/
				          	complete: function()
				            {
				            	// Completed
				            }


				            });

					}	




			    }//if
				


			}

			//Comment General
			$(document.body).on("keypress", "#comment_general", getCommentGeneral);

			function getCommentGeneral(e)
			{
				var announcement_id;
			    var code = (e.keyCode ? e.keyCode : e.which);
			    if (code == 13) 
			    {
			        e.preventDefault();
			        e.stopPropagation();
			        var comment=$(this).val();
			        var announcement_id=$(this).prev('input[name="announcement_id"]').val();
			       /* alert(announcement_id);*/
			        if(!isNullOrWhiteSpace(comment))
					{

							$.ajax({
				 
				            url: 'views/ajax/get_announcement_lecture.php?comment_general',
				            type: 'POST',
				            data: {
				            	comment:comment, announcement_id:announcement_id
				            },
				           dataType: 'json',

							success: function(response, textStatus, jqXHR)
				            {
								
								if(typeof response.error === 'undefined')
								{

									display_announcement_lecture_general(response['announcement_lecture']);

								}
								
				          	},
				          	error: function(jqXHR, textStatus, errorThrown)
				          	{
				            	
				            		alert('ERROR: '+ textStatus+' '+errorThrown);
				            	
				          	},
				          	complete: function()
				            {
				            	// Completed
				            }


				            });

					}	




			    }//if
				


			}

			function display_announcement_lecture_general(data) 
			{
				$('.announcement-box').empty();
				$(".post-container").empty();
				

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawRow(data[i]);
				  
				    }

				    function drawRow(row) 
					{

						var display = $('<div id="post-container">'+
											'<!-- post box -->'+
				                            '<div class="panel post-box no-margin-bottom">'+
				                            	'<div class="post-box-header panel-heading">'+
				                            		'<div class="row"><!--//row for header-->'+
					                            		'<div class="col-md-12">'+
					                            			'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow post-message-img img-circle pull-left" />'+
					                            			'<div><a class="message-author"><small> <?php echo $_SESSION["reg_fname"].' '.$_SESSION["reg_lname"];?> <i class="fa fa-bullhorn"></i> '+row.level_description+'::'+row.sectionNo+'-'+row.section_name+': '+row.subject_title+'</small></a></div>'+
					                            			'<strong><i class="timespan fa fa-clock-o fa-fw"></i>'+row.date_created+'</strong>'+
					                            			'<div><small class="timespan">'+row.timespan+'</small></div>'+
					                            		'</div>'+
/*							                            '<div class="col-md-1 btn-group pull-right">'+
							                                '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">'+
							                                    '<i class="fa fa-pencil-square-o fa-lg"></i>'+
							                                '</button>'+
							                                '<ul class="dropdown-menu slidedown">'+
							                                '<input type="hidden" id="control_id" value="'+row.message_id+'"/>'+
							                                '<input type="hidden" id="delete_id" value="'+row.announcement_id+'"/>'+
							                                    '<li>'+
							                                        '<a class="edit-post">'+
							                                            '<i class="fa fa-pencil fa-fw"></i>Edit Post'+
							                                        '</a>'+
							                                    '</li>'+
							                                    '<li class="delete-post"></li>'+
							                                    '<li>'+
							                                        '<a href="#">'+
							                                            '<i class="fa fa-trash-o fa-fw"></i>Delete Post'+
							                                        '</a>'+
							                                    '</li>'+
							                                '</ul>'+
							                            '</div>'+*/
							                        '</div><!--//row for header-->'+    
				                        		'</div><!--panel-heading-->'+
				    
				                                '<div class="panel-body">'+
				                                    '<!-- box -->'+
				                                    '<div class="box" id="'+row.message_id+'">'+
				                                        '<div class="message">'+
				                                            row.messageorfile_caption+
				                                        '</div>'+
				                                        row.display_attachment+

				                            	    '</div><!--//box-->'+
				                                    '<!-- chat item -->'+
				                                '</div><!-- //panel-body -->'+

				                                '<div class="panel-footer">'+
				                                	row.comments+
					                                '<div class="row has-padding-top-5">'+
				                                		'<div class="col-md-12">'+
				                                			'<div class="">'+
					                                			'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />'+
					                                		'</div>'+

					                                		'<div class="input-group col-md-11 col-md-offset-1">'+
					                                			'<input type="hidden" id="announcement_id" name="announcement_id" value="'+row.announcement_id+'"/>'+
					                                        	'<textarea class="form-control input-sm commentarea" name="comment" id="comment_general" placeholder="Write a comment..." rows="1"  wrap="hard"></textarea>'+
					                                    	'</div>'+
				                                		'</div>'+
					                                '</div><!--//row-->'+
					                               
				                                '</div><!--//panel-footer-->'+
				                            '</div><!-- //post box -->'+
				                        '</div><!--post-container-->');



						$(".post-container").append(display);

					}

			}
			$(document.body).on("click", ".edit-post", editPost);

			function editPost()
			{

				var control_id=$(this).parents("ul").find('input#control_id').val();
				/*alert(control_id);*/
				var message=$('#'+control_id).children('.message').text();
				/*alert(message);*/
				var editarea=$('<textarea class="form-control input-sm textarea" name="message_edit" id="message_edit_'+control_id+'"'+ 
								 'rows="1" required="required"  wrap="hard"></textarea>'+
									'<div class="btn-group pull-right" role="group">'+
										'<button type="button" class="btn btn-default btn-xs" id="message_edit_'+control_id+'_cancel">'+
                        					'Cancel'+
                        				'</button>'+
                                    	'<button type="button" class="btn btn-primary btn-xs" id="message_edit_'+control_id+'_done">'+
                        					'Done Editing'+
                        				'</button>'+
                        			'</div>');
				
				$('#'+control_id).children('.message').empty();
				$('#'+control_id).children('.message').append(editarea);
				$('#'+control_id).children('.message').css('padding-bottom','35px');

				var editpost=$(this);

				$("textarea#message_edit_"+control_id).val(message);

				$(document.body).on("click", "#message_edit_"+control_id+"_cancel", function()
				{

						$.ajax({
			 
			            url: 'views/ajax/get_announcement_lecture.php?class_rec_no',
			            type: 'POST',
			            data: {
			            	class_rec_no:class_rec_no
			            },
			           dataType: 'json',

						success: function(response, textStatus, jqXHR)
			            {
							
							if(typeof response.error === 'undefined')
							{
								/*alert(JSON.stringify(response['announcement_lecture']));*/
			           			display_announcement_lecture(response['announcement_lecture']);
			           			
							}
							
			          	},
/*			          	error: function(jqXHR, textStatus, errorThrown)
			          	{
			            	
			            		alert('ERROR: ' + textStatus);
			            	
			          	},*/
			          	complete: function()
			            {
			            	// Completed
			            }


			            });


					
				});

				$(document.body).on("click", "#message_edit_"+control_id+"_done", function()
				{
					var edit_id=$(editpost).parents("ul").find('input#edit_id').val();
					var edit_message=$("textarea#message_edit_"+control_id).val();
/*					alert(edit_id);
					alert(edit_message);
					alert(class_rec_no);*/

					    if(!isNullOrWhiteSpace(edit_message))
						{				
							$.ajax({
			 
				            url: 'views/ajax/get_announcement_lecture.php?edit_post',
				            type: 'POST',
				            data: {
				            	edit_message:edit_message, edit_id:edit_id, class_rec_no:class_rec_no
				            },
				           dataType: 'json',

							success: function(response, textStatus, jqXHR)
				            {
								
								if(typeof response.error === 'undefined')
								{
									/*alert(JSON.stringify(response['success']));*/
									/*alert(JSON.stringify(response['announcement_lecture']));*/
				           			display_announcement_lecture(response['announcement_lecture']);
				           			
								}
								
				          	},
/*				          	error: function(jqXHR, textStatus, errorThrown)
				          	{
				            	
				            		alert('ERROR: ' + textStatus);
				            	
				          	},*/
				          	complete: function()
				            {
				            	// Completed
				            }


				            });
						}
	

					
				});



				


			}

			$(document.body).on("click", ".delete-post", deletePost);
			function deletePost()
			{
				var delete_id=$(this).parents("ul").find('input#edit_id').val();
				/*alert(delete_id);*/
				$.ajax({
 
	            url: 'views/ajax/get_announcement_lecture.php?delete_post',
	            type: 'POST',
	            data: {
	            	 delete_id:delete_id, class_rec_no:class_rec_no
	            },
	            dataType: 'json',

				success: function(response, textStatus, jqXHR)
	            {
					
					if(typeof response.error === 'undefined')
					{
						/*alert(JSON.stringify(response['success']));*/
						/*alert(JSON.stringify(response['announcement_lecture']));*/
	           			display_announcement_lecture(response['announcement_lecture']);
	           			
					}
					
	          	},
/*	          	error: function(jqXHR, textStatus, errorThrown)
	          	{
	            	
	            		alert('ERROR: ' + textStatus);
	            	
	          	},
*/	          	complete: function()
	            {
	            	// Completed
	            }


	            });
				
			
			}

			//Right SIDE
			$(document.body).on('click', '#getMessageParent',  getMessageParent);

			function getMessageParent()
			{
				/*alert(class_rec_no);*/
				var post_parent_msg = $('#post_parent_msg').val();
				/*alert(post_parent_msg);*/
				/*alert(class_rec_no);*/

				if(!isNullOrWhiteSpace(post_parent_msg) )
				{
					$.ajax({
		 
		            url: 'views/ajax/get_right_side.php?post_parent_msg',
		            type: 'POST',
		            data: {
		            	post_parent_msg:post_parent_msg, class_rec_no:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							$('#post_parent_msg').val('');
							$('.textarea').removeAttr('style');
							$('.textarea').attr('rows', '1');
							/*alert(response.success);
							/*alert(JSON.stringify(response['teacher_feedback']));*/
							reset_tf_box();
							display_teacher_feedback(response['teacher_feedback']);
						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: '+ textStatus+' '+errorThrown);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });
				}
				else
				{
					alert('Empty Field');

		           $('.textarea').attr('rows', '1');
		      
				}	
	


			}

			function reset_tf_box()
			{
				$('.tf-box').empty();
				var right = $(				'<div class="panel-heading">'+
							                    '<h3 class="panel-title"></h3>'+
							                    
							                        '<!-- Tabs -->'+
							                        '<ul class="nav nav-tabs" role="tablist">'+
							                            '<li role="presentation" class="active">'+
							                            	'<a href="#postparents" role="tab" data-toggle="tab">'+
							                            		'<i class="fa fa-street-view"></i>To Parents'+
							                            	'</a>'+
							                            '</li>'+
							                            '<li>'+
							                            	'<a href="#messageparents" role="tab" data-toggle="tab">'+
							                            		'<i class="fa fa-bullhorn"></i>Message Parents'+
							                            	'</a>'+
							                        	'</li>'+ 
							                        '</ul>'+
							                   
							                '</div>'+
							                '<div class="panel-body post-parent-body">'+
							                    '<div class="tab-content">'+
							                        '<div class="tab-pane fade in active" id="postparents">'+

							                        	'<div class="post-parent-box">'+
							                        		'<div class="no-padding-top-bottom post-parent-box-container-box">'+
																														
															'</div><!--no padding-->'+
														'</div><!--post-parent-box-->'+
							                        '</div><!--tab-pane-->'+

							                        '<div class="tab-pane fade" id="messageparents">'+
							                        	'<div class="tab-pane fade in active" id="post-parent-msg-write">'+
				                                                '<div class="col-md-12 no-padding no-padding-top-bottom">'+
				                                                    '<div class="panel-body" id="post-parent-msg-write-box">'+                
				                                                        '<form accept-charset="UTF-8" method="POST">'+
				                                                            '<textarea class="form-control input-sm textarea" name="post_parent_msg" id="post_parent_msg" placeholder="Write Announcement.." rows="1" required="required"  wrap="hard"></textarea>'+
				                                                            '<button type="button" class="pull-right btn btn-info btn-sm" id="getMessageParent">'+
				                                                            	'<span class="glyphicon glyphicon-send"></span> Post'+
				                                                            '</button>'+
				                                                        '</form>'+
				                                                    '</div>'+
				                                                '</div>'+
				                                            '</div>'+
							                        '</div>'+
							                    '</div>'+
							                '</div><!--panel-body-->'+
							                '<div class="panel-footer post-parent-msg-footer">'+
							                	'<a class="post-parent-msg-controls col-md-offset-9 control-anchor" id="viewall">'+
							                		'<i class="fa fa-eye"></i> View All</a>'+
							                '</div>')
				$('.tf-box').append(right);
			}

			function display_teacher_feedback(data) 
			{
				if(!jQuery.isEmptyObject(data))
				{
					$(".post-parent-box-container-box").empty();
				

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawFeedbackRow(data[i]);
				  
				    }
				}
				else
				{
					/*alert('empty');*/
					$('.post-parent-body').css("height","5px");
				}	


			}

			function drawFeedbackRow(row) 
			{

				var display = $('<div class="post-parent-box-container">'+
									'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>"  class="post-parent-img img-circle pull-left">'+
									'<div class="has-margin-left-45">'+
										'<div class="post-parent-msg" id="'+row.feedback_message_id+'">'+
											'<a class="post-parent-msg-author"><?php echo $_SESSION["reg_fname"].' '.$_SESSION["reg_lname"].' ';?></a>'+ 
											'<div class="post-parent-msg-container ">'+row.feedback_message+'</div>'+
										'</div>'+
										'<div><small class="post-parent-msg-timespan"><strong>'+row.feedback_date_created+'</strong></small></div>'+
                                    	'<div><small class="post-parent-msg-timespan">'+row.timespan+'</small></div>'+

										'<div class="">'+
											'<input type="hidden" id="feedback_control_id" value="'+row.feedback_message_id+'"/>'+
					                        '<input type="hidden" id="feedback_edit_id" value="'+row.feedback_announcement_id+'"/>'+
											'<a class="post-parent-msg-controls feedback-edit-post"><i class="fa fa-pencil"></i> Edit </a>'+
											'<a class="post-parent-msg-controls feedback-remove-post"><i class="fa fa-times"></i> Remove </a>'+
										'</div>'+
									'</div> <!-- //body -->'+
								'</div> <!-- //container -->');



				$(".post-parent-box-container-box").append(display);

			}

			//feedback edit
			$(document.body).on("click", ".feedback-edit-post", feedbackEditPost);

			function feedbackEditPost()
			{

				var feedback_control_id=$(this).parents("div").find('input#feedback_control_id').val();
				/*alert(feedback_control_id);*/
				var feedback_message=$('#'+feedback_control_id).children('.post-parent-msg-container').text();
				/*alert(feedback_message);*/
				var editarea=$('<textarea class="form-control input-sm textarea" name="feedback_message_edit" id="feedback_message_edit_'+feedback_control_id+'"'+ 
								 'rows="1" required="required"  wrap="hard"></textarea>'+
									'<div class="btn-group pull-right" role="group">'+
										'<button type="button" class="btn btn-default btn-xs" id="feedback_message_edit_'+feedback_control_id+'_cancel">'+
                        					'Cancel'+
                        				'</button>'+
                                    	'<button type="button" class="btn btn-primary btn-xs" id="feedback_message_edit_'+feedback_control_id+'_done">'+
                        					'Done Editing'+
                        				'</button>'+
                        			'</div>');
				
				$('#'+feedback_control_id).children('.post-parent-msg-container').empty();
				$('#'+feedback_control_id).children('.post-parent-msg-container').append(editarea);
				$('#'+feedback_control_id).children('.post-parent-msg-container').css('padding-bottom','35px');

				var editpost=$(this);

				$("textarea#feedback_message_edit_"+feedback_control_id).val(feedback_message);

				$(document.body).on("click", "#feedback_message_edit_"+feedback_control_id+"_cancel", function()
				{

					$.ajax({
		 
		            url: 'views/ajax/get_right_side.php?post_parent_msg_init',
		            type: 'POST',
		            data: {
		            	class_rec_no_init:class_rec_no
		            },
		           dataType: 'json',

					success: function(response, textStatus, jqXHR)
		            {
						
						if(typeof response.error === 'undefined')
						{
							/*alert(JSON.stringify(response['teacher_feedback']));*/
							display_teacher_feedback(response['teacher_feedback']);
						}
						
		          	},
/*		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: '+ textStatus+' '+errorThrown);
		            	
		          	},*/
		          	complete: function()
		            {
		            	// Completed
		            }


		            });


					
				});

				$(document.body).on("click", "#feedback_message_edit_"+feedback_control_id+"_done", function()
				{

					var feedback_edit_id=$(editpost).parents("div").find('input#feedback_edit_id').val();
					var feedback_edit_message=$("textarea#feedback_message_edit_"+feedback_control_id).val();
					/*alert('edit: '+feedback_edit_id);
					alert('message: '+feedback_edit_message);
					alert('class_rec_no: '+class_rec_no);*/

					    if(!isNullOrWhiteSpace(feedback_edit_message))
						{				
							$.ajax({
			 
				            url: 'views/ajax/get_right_side.php?feedback_edit_post',
				            type: 'POST',
				            data: {
				            	feedback_edit_message:feedback_edit_message, feedback_edit_id:feedback_edit_id, feedback_class_rec_no:class_rec_no
				            },
				           dataType: 'json',

							success: function(response, textStatus, jqXHR)
				            {
								
								if(typeof response.error === 'undefined')
								{
									/*alert(JSON.stringify(response['teacher_feedback']));*/
									display_teacher_feedback(response['teacher_feedback']);
				           			
								}
								
				          	},
/*				          	error: function(jqXHR, textStatus, errorThrown)
				          	{
				            	
				            		alert('ERROR: ' + textStatus);
				            	
				          	},*/
				          	complete: function()
				            {
				            	// Completed
				            }


				            });
						}
	

					
				});



				


			}

			$(document.body).on("click", ".feedback-remove-post", feedbackDeletePost);
			function feedbackDeletePost()
			{
				/*alert('pumasok');*/
				var feedback_delete_id=$(this).parents("div").find('input#feedback_edit_id').val();
				/*alert(feedback_delete_id);*/
				$.ajax({
 
	            url: 'views/ajax/get_right_side.php?feedback_delete_post',
	            type: 'POST',
	            data: {
	            	 feedback_delete_id:feedback_delete_id, feedback_class_rec_no:class_rec_no
	            },
	            dataType: 'json',

				success: function(response, textStatus, jqXHR)
	            {
					
					if(typeof response.error === 'undefined')
					{
						
						/*alert(JSON.stringify(response['teacher_feedback']));*/
	           			display_teacher_feedback(response['teacher_feedback']);
	           			
					}
					
	          	},
/*	          	error: function(jqXHR, textStatus, errorThrown)
	          	{
	            	
	            		alert('ERROR: ' + textStatus);
	            	
	          	},
*/	          	complete: function()
	            {
	            	// Completed
	            }


	            });
				
			
			}

			
/*			$(document.body).on("click", ".preview", function()
			{
				var doc_type=$(this).attr('doc-type');


				if(doc_type=='word')
				{
					
					$(this).colorbox({rel:'preview',iframe:true, width:"61%", height:"100%", transition:"fade"});
					

				}
				else if(doc_type=='pdf')
				{
					
					$(this).colorbox({rel:'preview',iframe:true,  width:"61%", height:"100%", transition:"fade"});
					
				}	
				else if(doc_type=='excel')
				{
					
					$(this).colorbox({rel:'preview',iframe:true,  width:"61%", height:"100%", transition:"fade"});
					
				}
				else if(doc_type=='powerpoint')	
				{
					
					$(this).colorbox({rel:'preview',iframe:true,  width:"61%", height:"100%", transition:"fade"});
					
				}
				else if(doc_type=='archive')
				{
					
					$(this).colorbox({rel:'preview',iframe:true, width:"61%", height:"100%", transition:"fade"});
					
				}
				else if(doc_type=='image')
				{
					
					$(this).colorbox({rel:'preview',iframe:true, width:"61%", height:"100%", transition:"fade"});
					
				}	
				
			});*/


			function isNullOrWhiteSpace(str) 
			{
			  return (!str || str.length === 0 || /^\s*$/.test(str))
			}

			function AutoGrowTextArea(textField)
			{
			  if (textField.clientHeight < textField.scrollHeight)
			  {
			    textField.style.height = textField.scrollHeight + "px";
			    if (textField.clientHeight < textField.scrollHeight)
			    {
			      textField.style.height = 
			        (textField.scrollHeight * 2 - textField.clientHeight) + "px";
			    }
			  }
			}


});
</script>
	
	</body>
    

</html>