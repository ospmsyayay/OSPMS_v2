  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Student Page</title>
		<link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
    
	<body onload="check()">
		<script>
		function check()
		{
		<?php
			
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
		
<!--Start of navbar student-->
	<?php include "views/parts/navi-bar-student.php";?>   
<!--End of navbar student-->

<!--Start of main -->
	<div class="main container-fluid">
		<div class="row">

				<!--Start of left content-->
				<div class="left-content col-md-3">
					<?php include "views/parts/side-bar-student.php";?>
				</div>
				<!--End of left content-->

				<!--Start of mid content-->
				<div class="main-content col-md-6">

					<div class="row"><!--//row for post title fixed-->
						<div class="col-md-12 content">
							<div class="row"><!--//row for post title-->

								<div class="panel panel-default no-margin-bottom no-border">
								  <div class="panel-heading" id="student-post-title">
								  	<div class="has-inline"><i class="fa fa-comments-o fa-lg"></i> Post to Subjects</div>
								  </div>
								</div>

							</div><!--//row for post title-->
						</div>
					</div><!--//row for post title fixed-->

					<div class="row student-post-container"><!--//row for post-box-->
						<?php   
                        foreach($display_box as $display)
                        {

                     	
					echo'<div id="student-post-container">
							<!-- post box -->
                            <div class="panel student-post-box no-margin-bottom">
                            	<div class="student-post-box-header panel-heading">
                            		<div class="row"><!--//row for header-->
	                            		<div class="col-md-11">
	                            			<img src="views/res/'.$display['teacher_image'].'" class="shadow student-post-message-img img-circle pull-left" />
	                            			<div><a class="student-message-author"><small> '.$display['teacher_fname'].' '.$display['teacher_lname']. ' <i class="glyphicon glyphicon-chevron-right"></i> '.$display['level_description'].'::'. $display['sectionNo'].'-'.$display['section_name'].': '.$display['subject_title'].'</small></a></div>
	                            			<strong><i class="student-timespan fa fa-clock-o fa-fw"></i>'.$display['date_created'].'</strong>
	                            			<div><small class="student-timespan">'.$display['timespan'].'</small></div>
	                            		</div>

			                        </div><!--//row for header-->    
                        		</div><!--panel-heading-->
    
                                <div class="panel-body">
                                    <!-- box -->
                                    <div class="box" id="'.$display['message_id'].'">
                                        <div class="student-message">
                                            '.$display['messageorfile_caption'].'
                                        </div>';
                                if( (!empty($display['file_path'])) and (!empty($display['file_name'])) )
                                {
                                echo 	'<div class="student-attachment">
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
	                                                	<div><img src="views/res/word.png" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
	                                    }

                                        else if ($extension=='pdf') 
                                        {
                                        	 echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/adobe.png" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                        }

                                       	else if(
                                        ($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')
                                        ||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb')
                                        )
                                      	{
                                      		 echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/excel.png" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                      	}

                                      	else if
	                                    ( 
                                        ($extension=='ppt')||($extension=='pptx')||($extension=='pptm')||($extension=='potx')||
                                        ($extension=='potm')||($extension=='ppam')||($extension=='ppsx')||($extension=='ppsm')||
                                        ($extension=='sldx')||($extension=='sldm')
	                                    )
                                        {
                                        	 echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/powerpoint.png" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                        }

                                        else if
                                      	( 
                                        $extension=='7z'
                                      	)
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/7z.png" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                        }

                                        else if
                                       	(
                                    	$extension=='rar'
                                   		)
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/rar.jpg" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                        }

                                         else if
                                        (
                                        $extension=='swf'
                                        )
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/swf.jpg" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                        }

                                        else if
                                        (
                                        $extension=='zip'
										)
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="views/res/zip.jpg" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                        }

                                        else
                                        {
                                        	echo	'<div class="col-md-2">
	                                                	<div><img src="'.$display['file_path'].$display['file_name'].'" class="img-thumbnail student-post-lecture-image pull-left img-responsive"></div>
	                                            	</div>';
                                        }



	                                        echo   	'<div class="has-padding-left has-padding-right">
	                                            		<div class="pull-right">
	                                                		<i class="fa fa-thumb-tack"></i>
	                                            		</div>
	                                    	           	
	                                    	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$display['file_name'].'</p>
	                                                    <input name="student_file_name" value="'.$display['file_name'].'" type="hidden"/>
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

                            echo    '</div><!--//box-->
                                    <!-- chat item -->
                                </div><!-- //panel-body -->

                                <div class="panel-footer">
                                	'.$display['comments'].'
                                	<div class="row has-padding-top-5">
                                		<div class="col-md-12">
                                			<div class="">
	                                			<img src="views/res/'.$_SESSION['profile_pic'].'" class="shadow student-post-comment-img img-thumbnail pull-left img-responsive" />
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
					

					
				</div>
			<!--End of mid content-->

		</div><!--row-->
	</div><!--container-fluid-->
<!--End of main -->


<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>

<script>

$(function () 
{

			var class_rec_no;

            $(document.body).on('keyup', '.commentarea', function () 
            {
            	AutoGrowTextArea(this);
            });


 			$('.side-menu').on('click', function () 
            {
                $('.side-menu').removeClass('student-side-menu-click');
                $(this).addClass('student-side-menu-click');

                var grade=$(this).attr('grade');
                var sectionno=$(this).attr('sectionno');
                var section=$(this).attr('section');
                var subject=$(this).attr('subject');

                $('#student-post-title').empty();
                var display = $('<div class="has-inline"><i class="fa fa-comments-o fa-lg"></i> Post to '+grade+'::'+sectionno+'-'+section+':'+subject+'</div>');
				$('#student-post-title').append(display);

				//pass class_rec_no
                class_rec_no=$(this).attr('side-menu-id');
               /* alert(class_rec_no);*/

	        	$.ajax({
		 
		            url: 'views/ajax/get_for_student_announcement_lecture.php?class_rec_no',
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


            });

			function display_announcement_lecture(data) 
			{
				$(".student-post-container").empty();
				

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawRow(data[i]);
				  
				    }

			}

			function drawRow(row) 
			{

  				var display=$('<div id="student-post-container">'+
									'<!-- post box -->'+
		                            '<div class="panel student-post-box no-margin-bottom">'+
		                            	'<div class="student-post-box-header panel-heading">'+
		                            		'<div class="row"><!--//row for header-->'+
			                            		'<div class="col-md-11">'+
			                            			'<img src="views/res/'+row.teacher_image+'" class="shadow student-post-message-img img-circle pull-left" />'+
			                            			'<div><a class="student-message-author"><small> '+row.teacher_fname+' '+row.teacher_lname+ ' <i class="glyphicon glyphicon-chevron-right"></i> '+row.level_description+'::'+row.sectionNo+'-'+row.section_name+': '+row.subject_title+'</small></a></div>'+
			                            			'<strong><i class="student-timespan fa fa-clock-o fa-fw"></i>'+row.date_created+'</strong>'+
			                            			'<div><small class="student-timespan">'+row.timespan+'</small></div>'+
			                            		'</div>'+

					                        '</div><!--//row for header-->'+    
		                        		'</div><!--panel-heading-->'+
		    
		                                '<div class="panel-body">'+
		                                    '<!-- box -->'+
		                                    '<div class="box" id="'+row.message_id+'">'+
		                                        '<div class="student-message">'+
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
			                                			'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow student-post-comment-img img-thumbnail pull-left img-responsive" />'+
			                                		'</div>'+

			                                		'<div class="input-group col-md-11 col-md-offset-1">'+
			                                			'<input type="hidden" id="announcement_id" name="announcement_id" value="'+row.announcement_id+'"/>'+
			                                        	'<textarea class="form-control input-sm commentarea" name="comment" id="comment_ajax" placeholder="Write a comment..." rows="1" wrap="hard"></textarea>'+
			                                    	'</div>'+
		                                		'</div>'+
			                                '</div><!--//row-->'+
			                               
		                                '</div><!--//panel-footer-->'+
		                            '</div><!-- //post box -->'+
		                        '</div><!--post-container-->');



				$(".student-post-container").append(display);

			}

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
				 
				            url: 'views/ajax/get_for_student_announcement_lecture.php?comment',
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
				 
				            url: 'views/ajax/get_for_student_announcement_lecture.php?comment_general',
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

			function display_announcement_lecture_general(data) 
			{
				$(".student-post-container").empty();
				

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawRow(data[i]);
				  
				    }

				    function drawRow(row) 
					{

  				var display=$('<div id="student-post-container">'+
									'<!-- post box -->'+
		                            '<div class="panel student-post-box no-margin-bottom">'+
		                            	'<div class="student-post-box-header panel-heading">'+
		                            		'<div class="row"><!--//row for header-->'+
			                            		'<div class="col-md-11">'+
			                            			'<img src="views/res/'+row.teacher_image+'" class="shadow student-post-message-img img-circle pull-left" />'+
			                            			'<div><a class="student-message-author"><small> '+row.teacher_fname+' '+row.teacher_lname+ ' <i class="glyphicon glyphicon-chevron-right"></i> '+row.level_description+'::'+row.sectionNo+'-'+row.section_name+': '+row.subject_title+'</small></a></div>'+
			                            			'<strong><i class="student-timespan fa fa-clock-o fa-fw"></i>'+row.date_created+'</strong>'+
			                            			'<div><small class="student-timespan">'+row.timespan+'</small></div>'+
			                            		'</div>'+

					                        '</div><!--//row for header-->'+    
		                        		'</div><!--panel-heading-->'+
		    
		                                '<div class="panel-body">'+
		                                    '<!-- box -->'+
		                                    '<div class="box" id="'+row.message_id+'">'+
		                                        '<div class="student-message">'+
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
			                                			'<img src="views/res/<?php echo $_SESSION["profile_pic"];?>" class="shadow student-post-comment-img img-thumbnail pull-left img-responsive" />'+
			                                		'</div>'+

			                                		'<div class="input-group col-md-11 col-md-offset-1">'+
			                                			'<input type="hidden" id="announcement_id" name="announcement_id" value="'+row.announcement_id+'"/>'+
			                                        	'<textarea class="form-control input-sm commentarea" name="comment" id="comment_general" placeholder="Write a comment..." rows="1" wrap="hard"></textarea>'+
			                                    	'</div>'+
		                                		'</div>'+
			                                '</div><!--//row-->'+
			                               
		                                '</div><!--//panel-footer-->'+
		                            '</div><!-- //post box -->'+
		                        '</div><!--post-container-->');



						$(".student-post-container").append(display);

					}

			}


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



});//Ready

</script>


	</body>
    
    
</html>