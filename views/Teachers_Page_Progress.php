  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Teacher Page Progress</title>
		<link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
    
	<body  id="body">
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
					<div class="main-content col-md-9">
						<div class="row"><!--//row for right column fixed -->
							<div class="col-md-12 content">
								<div class="row"><!--//row for student-list-title-holder -->

									<div class="col-md-5">
										<div class="row">
											<div class="panel panel-default no-margin-bottom no-border">
											  <div class="panel-heading" id="student-list-title">
											  	<div class="has-inline"><i class="fa fa-book fa-lg"></i> Student List</div>
											  </div>
											</div>
										</div>
									</div>

									<div class="col-md-4" id="search-query-holder">
                                        <div class="input-group">
                                            <input type="text" name="q" class="form-control" placeholder="Search Student" id="student-search"/>
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                        </div>
                                    </div>

								</div><!--//row for student-list-title-holder -->
							</div><!--right-column-fixed-->
						</div><!--//row for right column fixed -->

						<div class="row"><!--//row for student-progress-container -->
							<div class="col-md-12 content" id="student-progress-container">
									<div class="row"><!--//row for progress-student-container-->
										<div id="student_table">
											<?php
											foreach ($display_students as $display) 
											{

										echo	'<div class="col-md-3 progress-student-container getLRN" id="'.$display['student_lrn'].'">
							     					<div class="progress-student-img-holder">
							     						<img src="views/res/'.$display['image'].'" class="img-circle img-responsive center-block student-img"/>
							     					</div>
							     					<div class="text-center">							     	
							     						<a>
							     						<p class="student-name">'.$display['reg_lname'].', '.$display['reg_fname'].' '.$display['reg_mname'].'</p></a>
							     						<p class="student-lrn">'.$display['student_lrn'].'</p>
							     					</div>
								     			</div>';
											}

							     			?>
								     	</div><!--student table-->	
									</div><!--//row for progress-student-container-->					
							</div><!--student-progress-container-->	
						</div><!--//row for student-progress-container -->		
					</div>
					<!--End of mid content-->

			</div><!--row-->
			<!--Modal-->
			<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".student-modal-lg">Large modal</button> -->
			<div class="modal fade student-modal-lg" tabindex="-1" role="dialog" aria-labelledby="studentChart" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-full modal-lg">
			    <div class="modal-content modal-content-full">

			            <!-- <div class="modal-header"> -->
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
					   <!--  </div> -->
					    <!-- <div class="modal-body">
					       
					    </div>
					    <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					    </div> -->

					    <!--Start of main -->
						<div class="main container-fluid teacher-student-progress">
							<div class="row">
								<!--Start of left content-->
									<div class="left-content col-md-3 teacher-student-left-content">
										
									</div>
								<!--End of left content-->

								<!--Start of mid content-->
									<div class="main-content col-md-9 teacher-student-main-content"></div>
								<!--End of mid content-->
							
							</div><!--row-->
						</div><!--container-fluid-->
						<!--End of main -->	


			    </div>
			  </div>
			</div>
			<!--Modal-->

		</div><!--container-fluid-->
	<!--End of main -->

<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
<script src="views/plugins/chartjs/Chart.js"></script>
		
<script>

$(function() 
{
			var class_rec_no;
			var grade;
			var sectionno;
			var section;
			var subject;
			var chart_class_rec_no;
			var lrn;

	 		$('.side-menu').on('click', function () 
            {
                $('.side-menu').removeClass('teacher-side-menu-click');
                $(this).addClass('teacher-side-menu-click');

                 grade=$(this).attr('grade');
                 sectionno=$(this).attr('sectionno');
                 section=$(this).attr('section');
                 subject=$(this).attr('subject');

                $('#student-list-title').empty();
                var display = $('<div class="has-inline"><i class="fa fa-book fa-lg"></i> '+sectionno+'-'+section+':'+subject+'-Student List</div>');
				$('#student-list-title').append(display);

				//pass class_rec_no
                class_rec_no=$(this).attr('side-menu-id');
               /* alert(class_rec_no);*/

	        	$.ajax({
		 
		            url: 'views/ajax/get_for_chart.php?class_rec_no',
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
							setsearch_ajax();
		           			displayStudents(response['student_list']);
		           			
						}
						
		          	},
		          	error: function(jqXHR, textStatus, errorThrown)
		          	{
		            	
		            		alert('ERROR: ' + textStatus+' '+errorThrown);
		            	
		          	},
		          	complete: function()
		            {
		            	// Completed
		            }


		            });


            });

			function displayStudents(data) 
			{
				$("#student_table").empty();

				    for (var i = 0; i < data.length; i++) 
				    {

				    		drawStudentRow(data[i]);
				  
				    }

			}

			function drawStudentRow(rowData) 
			{


				if(rowData.image!=null && rowData.reg_lname!=null && rowData.reg_fname!=null && rowData.reg_mname!=null && rowData.student_lrn!=null)
				{	

				     var display = $('<div class="col-md-3 progress-student-container getLRN" id="'+rowData.student_lrn+'">'+
					     					'<div class="progress-student-img-holder">'+
					     						'<img src="views/res/'+ rowData.image +'" class="img-circle img-responsive center-block student-img"/>'+
					     					'</div>'+
					     					'<div class="text-center">'+							     	
					     						'<a>'+
					     						'<p class="student-name">'+rowData.reg_lname+', '+rowData.reg_fname+' '+rowData.reg_mname+'</p></a>'+
					     						'<p class="student-lrn">'+rowData.student_lrn+'</p>'+
					     					'</div>'+
						     			'</div>');


				   	 $("#student_table").append(display); 
			   	}
			    

			}

			function setsearch_ajax()
	        {
	         	$('#search-query-holder').empty();

	         	var display=$('<div class="input-group">'+
	                                '<input type="text" name="q" class="form-control" placeholder="Search Student" id="student-search-class"/>'+
	                                '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
	                            '</div>');

	         	$('#search-query-holder').append(display);


	        }

	        $(document.body).on('keyup', '#student-search-class', student_filter_class);
						
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

			$(document.body).on('keyup', '#student-search', student_filter);
						
			function student_filter()
			{
				var filter=$(this).val();
				/*alert(filter);*/

				$.ajax({
 
			            url: 'views/ajax/get_for_chart.php?student_search',
			            type: 'POST',
			            data: {
			            	student_search:filter
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							  /*alert(JSON.stringify(response['student_filter']));*/
								
			           			displayStudents(response['student_filter']);
			           		 
						}


            		   });
			}

			
			$(document.body).on('click', '.getLRN', function()
			{
		  		lrn=$(this).attr('id');
		  		/*alert(lrn);*/
		  		
	  			$.ajax({
						 
			            url: 'views/ajax/get_for_chart.php?passLRN',
			            type: 'POST',
			            data: {
			            	lrn:lrn
			            },
			           dataType: 'json',
			           success: function(response) 
			           {
			           		
							  /*console.log(JSON.stringify(response['lrn']));*/

							 /* alert(JSON.stringify(response));*/
							/* alert(response['ts_profile_pic']+' '+response['ts_reg_lname']+' '+response['ts_reg_fname']);*/
							/*alert(response['lrn']);*/
							/*alert(class_rec_no);
							alert(lrn);*/
							setSideBar(response['ts_profile_pic'],response['ts_reg_lname'],response['ts_reg_fname'],response['teacher_student_school_year'],response['Teacher_Student_Schedule_Line']);
							
							/*alert(lrn);
							alert(class_rec_no);*/
							
				  			reset_();
				  			/*chart(class_rec_no,lrn);*/
				  			$('.student-modal-lg').modal('show')
						}

			          
			            });

	  			
	  			
		  		
			});

function reset_()
{
	$('.teacher-student-main-content').empty();

	var display=$('<div class="row"><!--//row for content-->'+
					'<div class="col-md-12 content">'+

						'<div class="row"><!--//row for header-->'+
							'<div class="col-md-10 progress-header">Choose Section</div>'+
						'</div><!--//row for header-->'+

								'<div class="row"><!--//row for container-->'+
    								'<div class="col-md-12 progress-container-relative">'+
    								//1st Grading Period
    									'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">1st Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												/*'<canvas id="firstChart" class="col-md-12 chart"></canvas>'+*/
												'<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge</h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding </h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="first-grading-table">'+
																	
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									//2nd Grading Period
										'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">2nd Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												/*'<canvas id="secondChart" class="col-md-12 chart"></canvas>'+*/
												'<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge </h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding</h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="second-grading-table">'+
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									//3rd Grading Period
										'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">3rd Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												/*'<canvas id="thirdChart" class="col-md-12 chart"></canvas>'+*/
												'<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge </h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding</h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="third-grading-table">'+
																	
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									//4th Grading Period
										'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">4th Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												/*'<canvas id="fourthChart" class="col-md-12 chart"></canvas>'+*/
												'<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge </h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding</h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="fourth-grading-table">'+
																	
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									
								'</div><!--//row for container-->'+
									
								'</div><!--//container-relative-->'+
							
						'</div><!--//progress-header-->'+
					'</div><!--//content-->'+
				'</div><!--//row for content-->');

	$('.teacher-student-main-content').append(display);
} 

			function setSideBar(ts_profile_pic,ts_reg_lname,ts_reg_fname,teacher_student_school_year,Teacher_Student_Schedule_Line)
			{
				$('.teacher-student-left-content').empty();
				setWelcomeBox(ts_profile_pic,ts_reg_lname,ts_reg_fname);
				setSidebarMenu(teacher_student_school_year,Teacher_Student_Schedule_Line);
			}

			function setWelcomeBox(ts_profile_pic,ts_reg_lname,ts_reg_fname)
			{
				
				var display = $('<!--Start of Welcome Box-->'+				
									'<div class="welcome-box content">'+
										'<img src="views/res/'+ts_profile_pic+'" class="welcome-box-img img-thumbnail shadow pull-left"/>'+
												'<div class="has-padding-top">'+
									              '<a class="greetings"><strong>'+ts_reg_lname+' '+ts_reg_fname+'</strong></a>'+
									              '<div class="greetings"><small>Student</small></div>'+
									            '</div>'+ 						
									'</div>'+
								'<!--End of Welcome Box-->');


				   	 $(".teacher-student-left-content").append(display); 
				
				
			}

			function setSidebarMenu(teacher_student_school_year,Teacher_Student_Schedule_Line)
			{
				var display = $('<!--Start of Side bar menu-->'+
									'<div class="panel panel-info">'+
									  '<div class="panel-heading text-center" id="subject-list"><i class="glyphicon glyphicon-book"></i> School Year '+teacher_student_school_year+'</div>'+
									  	'<ul class="list-group" id="student-side-menu">'+
									  	'</ul>'+	
									'</div>'+
								'<!--End of Side bar menu-->');
				$(".teacher-student-left-content").append(display);

				setMenu(Teacher_Student_Schedule_Line); 

				function setMenu(data)
				{
					$("#student-side-menu").empty();

				    for (var i = 0; i < data.length; i++) 
				    {
				    	for (var j = 0; j < data[i].length; j++) 
				    	{
				    		drawMenuRow(data[i][j]);
				  		}
				    }
				}

				function drawMenuRow(row) 
				{	
					var display = $('<li class="list-group-item chart-side-menu student-side-menu-heading" chart-side-menu-id="'+row.class_rec_no+'" grade="'+row.level_description+'" sectionno="'+row.sectionNo+'" section="'+row.section_name+'" subject="'+row.subject_title+'">'+
										'<div class="">'+
					                        '<img src="views/res/'+row.teacher_image+'" class="menu-box-img img-thumbnail shadow pull-left"/>'+
					                    '</div>'+                          
					                    '<div class="has-margin-left-35">'+
					                        '<div class="panel-title student-side-menu-title col-md-offset-1">'+row.teacher_lname+', '+row.teacher_fname+' '+row.teacher_mname+'</div>'+
					                        '<div class="panel-title student-side-menu-title col-md-offset-1"><em><strong>'+row.level_description+'</strong>::'+row.sectionNo+'-'+row.section_name+'</em>: <strong>'+row.subject_title+'</strong></div>'+
					                        '<div class="panel-title student-side-menu-title col-md-offset-1 text-uppercase"><small>'+row.sched_days+' '+row.sched_start_time+'-'+row.sched_end_time+'</small></div>'+
                   					 	'</div>'+
                   					 '</li>');


					   	 $("#student-side-menu").append(display); 

				}

			}
  				

$(document.body).on('click', '.chart-side-menu', function () 
{
    $('.chart-side-menu').removeClass('student-side-menu-click');
    $(this).addClass('student-side-menu-click');

     var grade_=$(this).attr('grade');
     var sectionno_=$(this).attr('sectionno');
     var section_=$(this).attr('section');
     var subject_=$(this).attr('subject');

	//pass class_rec_no
    chart_class_rec_no=$(this).attr('chart-side-menu-id');

/*alert(class_rec_no);
alert(lrn);*/

   reset_container(grade_,sectionno_,section_,subject_);

   chart(chart_class_rec_no,lrn);



});	



function reset_container(grade,sectionno,section,subject)
{
	$('.teacher-student-main-content').empty();

	var display=$('<div class="row"><!--//row for content-->'+
					'<div class="col-md-12 content">'+

						'<div class="row"><!--//row for header-->'+
							'<div class="col-md-10 progress-header">'+grade+'::'+sectionno+'-'+section+': '+subject+'</div>'+
						'</div><!--//row for header-->'+

								'<div class="row"><!--//row for container-->'+
    								'<div class="col-md-12 progress-container-relative">'+
    								//1st Grading Period
    									'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">1st Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												'<canvas id="firstChart" class="col-md-12 chart"></canvas>'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge</h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding </h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="first-grading-table">'+
																	
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									//2nd Grading Period
										'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">2nd Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												'<canvas id="secondChart" class="col-md-12 chart"></canvas>'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge </h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding</h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="second-grading-table">'+
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									//3rd Grading Period
										'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">3rd Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												'<canvas id="thirdChart" class="col-md-12 chart"></canvas>'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge </h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding</h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="third-grading-table">'+
																	
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									//4th Grading Period
										'<div class="row"><!--//row for progress period-->'+
    										'<div class="progress-period">4th Grading Period</div>'+
    									'</div><!--//row for progress period-->'+
	        							
	        							'<div class="row"><!--//row for progress space-->'+
		        							'<div class="col-md-6 student-progress-space table-responsive">'+
												'<canvas id="fourthChart" class="col-md-12 chart"></canvas>'+
											'</div>'+


											'<div class="col-md-6 student-progress-table">'+
												'<div class="row"><!--//row for legend-table-->'+
													'<div class="col-md-12 legend-table">'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="knowledge-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Knowledge-15%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="beggining-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(B)-Beginning 74-below</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="processskills-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Process/Skills-25%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="developing-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(D)-Developing 75-79</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class="understanding-bg center-block"></div>'+ 
															'</div>'+
															'<h5 class="col-md-5">Understanding-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="approaching-bg center-block"></div>'+
															'</div>'+
															'<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 legend">'+
																'<div class=" performanceproducts-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">Performance/Products-30%</h5>'+

															'<div class="col-md-1 legend">'+
																'<div class="proficient-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5">(P)-Proficient 85-89</h5>'+
														'</div><!--//row for legend-->'+

														'<div class="row"><!--//row for legend-->'+
															'<div class="col-md-1 col-md-offset-6 legend">'+
																'<div class="advanced-bg center-block"></div>'+
															'</div>'+
															'<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>'+
														'</div><!--//row for legend-->'+
														
													'</div>'+
												'</div><!--//row for legend-table-->'+

												'<div class="row"><!--//row for progress-data-->'+
													'<div class="col-md-12 progress-data table-responsive">'+ 
														'<table class="table table-bordered table-hover table-condensed">'+
																'<thead>'+
																    '<tr>'+
							                                       '<th><h6>Week No.<h6></th>'+
							                                       '<th class=""><h6>Knowledge </h6></th>'+
							                                       '<th class=""><h6>Process/skills</h6></th>'+
							                                       '<th class=""><h6>Understanding</h6></th>'+
							                                       '<th class=""><h6>Performance/Products</h6></th>'+
							                                       '<th><h6>Tentative</h6></th>'+
							                                    '</tr>'+
																'<thead>'+
																'<tbody id="fourth-grading-table">'+
																	
																	
																'</tbody>'+
														'</table>'+
													'</div>'+
												'</div><!--//row for legend-->'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									
								'</div><!--//row for container-->'+
									
								'</div><!--//container-relative-->'+
							
						'</div><!--//progress-header-->'+
					'</div><!--//content-->'+
				'</div><!--//row for content-->');

	$('.teacher-student-main-content').append(display);
} 

function chart(class_rec_no,lrn) 
{
				getFirstChart(class_rec_no,lrn);
				getSecondChart(class_rec_no,lrn);
				getThirdChart(class_rec_no,lrn);
				getFourthChart(class_rec_no,lrn);

		        function getFirstChart(class_rec_no,lrn) 
		        {
		        
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?ts_onload',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '1st', chart_class_rec_no:class_rec_no, chart_lrn:lrn
			            },
			            dataType: 'json',
			            success: function(response) {
/*			            alert(JSON.stringify(response['grading_week1_k']));	
			            alert(JSON.stringify(response['grading_week2_k']));
			            alert(JSON.stringify(response['grading_week3_k']));
			            alert(JSON.stringify(response['grading_week4_k']));
			            alert(JSON.stringify(response['grading_week5_k']));	
			            alert(JSON.stringify(response['grading_week6_k']));
			            alert(JSON.stringify(response['grading_week7_k']));
			            alert(JSON.stringify(response['grading_week8_k']));

			            alert(JSON.stringify(response['grading_week1_ps']));	
			            alert(JSON.stringify(response['grading_week2_ps']));
			            alert(JSON.stringify(response['grading_week3_ps']));
			            alert(JSON.stringify(response['grading_week4_ps']));
			            alert(JSON.stringify(response['grading_week5_ps']));	
			            alert(JSON.stringify(response['grading_week6_ps']));
			            alert(JSON.stringify(response['grading_week7_ps']));
			            alert(JSON.stringify(response['grading_week8_ps']));

			            alert(JSON.stringify(response['grading_week1_u']));	
			            alert(JSON.stringify(response['grading_week2_u']));
			            alert(JSON.stringify(response['grading_week3_u']));
			            alert(JSON.stringify(response['grading_week4_u']));
			            alert(JSON.stringify(response['grading_week5_u']));	
			            alert(JSON.stringify(response['grading_week6_u']));
			            alert(JSON.stringify(response['grading_week7_u']));
			            alert(JSON.stringify(response['grading_week8_u']));

			            alert(JSON.stringify(response['grading_week1_pp']));	
			            alert(JSON.stringify(response['grading_week2_pp']));
			            alert(JSON.stringify(response['grading_week3_pp']));
			            alert(JSON.stringify(response['grading_week4_pp']));
			            alert(JSON.stringify(response['grading_week5_pp']));	
			            alert(JSON.stringify(response['grading_week6_pp']));
			            alert(JSON.stringify(response['grading_week7_pp']));
			            alert(JSON.stringify(response['grading_week8_pp']));*/



			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week","8th Week"],
				                datasets: [
				                	//---------------------Knowledge-------------------------------------------
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: [response['grading_week1_k'],response['grading_week2_k'],response['grading_week3_k'],response['grading_week4_k'],
				                        		response['grading_week5_k'],response['grading_week6_k'],response['grading_week7_k'],response['grading_week8_k']]
				                    
				            
				                    },

				                    //---------------------Process----------------------------------------------------
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: [response['grading_week1_ps'],response['grading_week2_ps'],response['grading_week3_ps'],response['grading_week4_ps'],
				                        		response['grading_week5_ps'],response['grading_week6_ps'],response['grading_week7_ps'],response['grading_week8_ps']]
				                    },

				                    //---------------------Understanding----------------------------------------------------
				                    				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: [response['grading_week1_u'],response['grading_week2_u'],response['grading_week3_u'],response['grading_week4_u'],
				                        		response['grading_week5_u'],response['grading_week6_u'],response['grading_week7_u'],response['grading_week8_u']]
				                    },

				                    //----------------------Performance---------------------------------------------------
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: [response['grading_week1_pp'],response['grading_week2_pp'],response['grading_week3_pp'],response['grading_week4_pp'],
				                        		response['grading_week5_pp'],response['grading_week6_pp'],response['grading_week7_pp'],response['grading_week8_pp']]
				                    }
				                ]
				            };

				            var ctx = document.getElementById("firstChart").getContext("2d")
					        var studentChart = new Chart(ctx).Bar(chartData, {
					        	
					        });

					        display_table_data(response['progress_data']);
			            }
			        });

  					function display_table_data(data) 
                    {
                     
                        $('#first-grading-table').empty();

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    } 

                    function reset_table(row)
                    {

                       var data = $('<tr>'+
										'<td>'+row.week_number+'</td>'+
										'<td>'+row.knowledge+'</td>'+
										'<td>'+row.processskills+'</td>'+
										'<td>'+row.understanding+'</td>'+
										'<td>'+row.performanceproducts+'</td>'+
										'<td id="legend'+row.week_number+row.grading_period+'">'+row.legend+'</td>'+
									'</tr>');
                           
                        $('#first-grading-table').append(data);

                        if(row.legend=='B')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('beggining-bg');
                        }
                        else if (row.legend=='D')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('developing-bg');
                        } 

                        if(row.legend=='AP')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('approaching-bg');
                        }
                        else if(row.legend=='P')
                        {
                           $('#legend'+row.week_number+row.grading_period).addClass('proficient-bg');
                        }
                        else if(row.legend=='A')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('advanced-bg');
                        }    
                    }
                    //end of display table data

			        return false;
		        }; 

		        function getSecondChart(class_rec_no,lrn) 
		        {
		        	
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?ts_onload',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '2nd', chart_class_rec_no:class_rec_no, chart_lrn:lrn
			            },
			            dataType: 'json',
			            success: function(response) {

/*			            alert(JSON.stringify(response['grading_week1_k']));	
			            alert(JSON.stringify(response['grading_week2_k']));
			            alert(JSON.stringify(response['grading_week3_k']));
			            alert(JSON.stringify(response['grading_week4_k']));
			            alert(JSON.stringify(response['grading_week5_k']));	
			            alert(JSON.stringify(response['grading_week6_k']));
			            alert(JSON.stringify(response['grading_week7_k']));
			            alert(JSON.stringify(response['grading_week8_k']));

			            alert(JSON.stringify(response['grading_week1_ps']));	
			            alert(JSON.stringify(response['grading_week2_ps']));
			            alert(JSON.stringify(response['grading_week3_ps']));
			            alert(JSON.stringify(response['grading_week4_ps']));
			            alert(JSON.stringify(response['grading_week5_ps']));	
			            alert(JSON.stringify(response['grading_week6_ps']));
			            alert(JSON.stringify(response['grading_week7_ps']));
			            alert(JSON.stringify(response['grading_week8_ps']));

			            alert(JSON.stringify(response['grading_week1_u']));	
			            alert(JSON.stringify(response['grading_week2_u']));
			            alert(JSON.stringify(response['grading_week3_u']));
			            alert(JSON.stringify(response['grading_week4_u']));
			            alert(JSON.stringify(response['grading_week5_u']));	
			            alert(JSON.stringify(response['grading_week6_u']));
			            alert(JSON.stringify(response['grading_week7_u']));
			            alert(JSON.stringify(response['grading_week8_u']));

			            alert(JSON.stringify(response['grading_week1_pp']));	
			            alert(JSON.stringify(response['grading_week2_pp']));
			            alert(JSON.stringify(response['grading_week3_pp']));
			            alert(JSON.stringify(response['grading_week4_pp']));
			            alert(JSON.stringify(response['grading_week5_pp']));	
			            alert(JSON.stringify(response['grading_week6_pp']));
			            alert(JSON.stringify(response['grading_week7_pp']));
			            alert(JSON.stringify(response['grading_week8_pp']));*/



			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week","8th Week"],
				                datasets: [
				                	//---------------------Knowledge-------------------------------------------
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: [response['grading_week1_k'],response['grading_week2_k'],response['grading_week3_k'],response['grading_week4_k'],
				                        		response['grading_week5_k'],response['grading_week6_k'],response['grading_week7_k'],response['grading_week8_k']]
				                    
				            
				                    },

				                    //---------------------Process----------------------------------------------------
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: [response['grading_week1_ps'],response['grading_week2_ps'],response['grading_week3_ps'],response['grading_week4_ps'],
				                        		response['grading_week5_ps'],response['grading_week6_ps'],response['grading_week7_ps'],response['grading_week8_ps']]
				                    },

				                    //---------------------Understanding----------------------------------------------------
				                    				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: [response['grading_week1_u'],response['grading_week2_u'],response['grading_week3_u'],response['grading_week4_u'],
				                        		response['grading_week5_u'],response['grading_week6_u'],response['grading_week7_u'],response['grading_week8_u']]
				                    },

				                    //----------------------Performance---------------------------------------------------
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: [response['grading_week1_pp'],response['grading_week2_pp'],response['grading_week3_pp'],response['grading_week4_pp'],
				                        		response['grading_week5_pp'],response['grading_week6_pp'],response['grading_week7_pp'],response['grading_week8_pp']]
				                    }
				                ]
				            };

				            var ctx = document.getElementById("secondChart").getContext("2d")
					        var studentChart = new Chart(ctx).Bar(chartData, {
					        	
					        });

					         display_table_data(response['progress_data']);
			            }
			        });

  					function display_table_data(data) 
                    {
                     
                        $('#second-grading-table').empty();

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    } 

                    function reset_table(row)
                    {

                       var data = $('<tr>'+
										'<td>'+row.week_number+'</td>'+
										'<td>'+row.knowledge+'</td>'+
										'<td>'+row.processskills+'</td>'+
										'<td>'+row.understanding+'</td>'+
										'<td>'+row.performanceproducts+'</td>'+
										'<td id="legend'+row.week_number+row.grading_period+'">'+row.legend+'</td>'+
									'</tr>');
                           
                        $('#second-grading-table').append(data);

                        if(row.legend=='B')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('beggining-bg');
                        }
                        else if (row.legend=='D')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('developing-bg');
                        } 

                        if(row.legend=='AP')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('approaching-bg');
                        }
                        else if(row.legend=='P')
                        {
                           $('#legend'+row.week_number+row.grading_period).addClass('proficient-bg');
                        }
                        else if(row.legend=='A')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('advanced-bg');
                        }    
                    }
                    //end of display table data

			        return false;
		        };

		        function getThirdChart(class_rec_no,lrn) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?ts_onload',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '3rd', chart_class_rec_no:class_rec_no, chart_lrn:lrn
			            },
			            dataType: 'json',
			            success: function(response) {

/*			            alert(JSON.stringify(response['grading_week1_k']));	
			            alert(JSON.stringify(response['grading_week2_k']));
			            alert(JSON.stringify(response['grading_week3_k']));
			            alert(JSON.stringify(response['grading_week4_k']));
			            alert(JSON.stringify(response['grading_week5_k']));	
			            alert(JSON.stringify(response['grading_week6_k']));
			            alert(JSON.stringify(response['grading_week7_k']));
			            alert(JSON.stringify(response['grading_week8_k']));

			            alert(JSON.stringify(response['grading_week1_ps']));	
			            alert(JSON.stringify(response['grading_week2_ps']));
			            alert(JSON.stringify(response['grading_week3_ps']));
			            alert(JSON.stringify(response['grading_week4_ps']));
			            alert(JSON.stringify(response['grading_week5_ps']));	
			            alert(JSON.stringify(response['grading_week6_ps']));
			            alert(JSON.stringify(response['grading_week7_ps']));
			            alert(JSON.stringify(response['grading_week8_ps']));

			            alert(JSON.stringify(response['grading_week1_u']));	
			            alert(JSON.stringify(response['grading_week2_u']));
			            alert(JSON.stringify(response['grading_week3_u']));
			            alert(JSON.stringify(response['grading_week4_u']));
			            alert(JSON.stringify(response['grading_week5_u']));	
			            alert(JSON.stringify(response['grading_week6_u']));
			            alert(JSON.stringify(response['grading_week7_u']));
			            alert(JSON.stringify(response['grading_week8_u']));

			            alert(JSON.stringify(response['grading_week1_pp']));	
			            alert(JSON.stringify(response['grading_week2_pp']));
			            alert(JSON.stringify(response['grading_week3_pp']));
			            alert(JSON.stringify(response['grading_week4_pp']));
			            alert(JSON.stringify(response['grading_week5_pp']));	
			            alert(JSON.stringify(response['grading_week6_pp']));
			            alert(JSON.stringify(response['grading_week7_pp']));
			            alert(JSON.stringify(response['grading_week8_pp']));*/



			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week","8th Week"],
				                datasets: [
				                	//---------------------Knowledge-------------------------------------------
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: [response['grading_week1_k'],response['grading_week2_k'],response['grading_week3_k'],response['grading_week4_k'],
				                        		response['grading_week5_k'],response['grading_week6_k'],response['grading_week7_k'],response['grading_week8_k']]
				                    
				            
				                    },

				                    //---------------------Process----------------------------------------------------
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: [response['grading_week1_ps'],response['grading_week2_ps'],response['grading_week3_ps'],response['grading_week4_ps'],
				                        		response['grading_week5_ps'],response['grading_week6_ps'],response['grading_week7_ps'],response['grading_week8_ps']]
				                    },

				                    //---------------------Understanding----------------------------------------------------
				                    				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: [response['grading_week1_u'],response['grading_week2_u'],response['grading_week3_u'],response['grading_week4_u'],
				                        		response['grading_week5_u'],response['grading_week6_u'],response['grading_week7_u'],response['grading_week8_u']]
				                    },

				                    //----------------------Performance---------------------------------------------------
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: [response['grading_week1_pp'],response['grading_week2_pp'],response['grading_week3_pp'],response['grading_week4_pp'],
				                        		response['grading_week5_pp'],response['grading_week6_pp'],response['grading_week7_pp'],response['grading_week8_pp']]
				                    }
				                ]
				            };

				            var ctx = document.getElementById("thirdChart").getContext("2d")
					        var studentChart = new Chart(ctx).Bar(chartData, {
					        	
					        });

					        display_table_data(response['progress_data']);
			            }
			        });

  					function display_table_data(data) 
                    {
                     
                        $('#third-grading-table').empty();

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    } 

                    function reset_table(row)
                    {

                        var data = $('<tr>'+
										'<td>'+row.week_number+'</td>'+
										'<td>'+row.knowledge+'</td>'+
										'<td>'+row.processskills+'</td>'+
										'<td>'+row.understanding+'</td>'+
										'<td>'+row.performanceproducts+'</td>'+
										'<td id="legend'+row.week_number+row.grading_period+'">'+row.legend+'</td>'+
									'</tr>');
                           
                        $('#third-grading-table').append(data);

                        if(row.legend=='B')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('beggining-bg');
                        }
                        else if (row.legend=='D')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('developing-bg');
                        } 

                        if(row.legend=='AP')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('approaching-bg');
                        }
                        else if(row.legend=='P')
                        {
                           $('#legend'+row.week_number+row.grading_period).addClass('proficient-bg');
                        }
                        else if(row.legend=='A')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('advanced-bg');
                        }    
                    }
                    //end of display table data

			        return false;
		        }; 

		        function getFourthChart(class_rec_no,lrn) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?ts_onload',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '4th', chart_class_rec_no:class_rec_no, chart_lrn:lrn
			            },
			            dataType: 'json',
			            success: function(response) {

/*			            alert(JSON.stringify(response['grading_week1_k']));	
			            alert(JSON.stringify(response['grading_week2_k']));
			            alert(JSON.stringify(response['grading_week3_k']));
			            alert(JSON.stringify(response['grading_week4_k']));
			            alert(JSON.stringify(response['grading_week5_k']));	
			            alert(JSON.stringify(response['grading_week6_k']));
			            alert(JSON.stringify(response['grading_week7_k']));
			            alert(JSON.stringify(response['grading_week8_k']));

			            alert(JSON.stringify(response['grading_week1_ps']));	
			            alert(JSON.stringify(response['grading_week2_ps']));
			            alert(JSON.stringify(response['grading_week3_ps']));
			            alert(JSON.stringify(response['grading_week4_ps']));
			            alert(JSON.stringify(response['grading_week5_ps']));	
			            alert(JSON.stringify(response['grading_week6_ps']));
			            alert(JSON.stringify(response['grading_week7_ps']));
			            alert(JSON.stringify(response['grading_week8_ps']));

			            alert(JSON.stringify(response['grading_week1_u']));	
			            alert(JSON.stringify(response['grading_week2_u']));
			            alert(JSON.stringify(response['grading_week3_u']));
			            alert(JSON.stringify(response['grading_week4_u']));
			            alert(JSON.stringify(response['grading_week5_u']));	
			            alert(JSON.stringify(response['grading_week6_u']));
			            alert(JSON.stringify(response['grading_week7_u']));
			            alert(JSON.stringify(response['grading_week8_u']));

			            alert(JSON.stringify(response['grading_week1_pp']));	
			            alert(JSON.stringify(response['grading_week2_pp']));
			            alert(JSON.stringify(response['grading_week3_pp']));
			            alert(JSON.stringify(response['grading_week4_pp']));
			            alert(JSON.stringify(response['grading_week5_pp']));	
			            alert(JSON.stringify(response['grading_week6_pp']));
			            alert(JSON.stringify(response['grading_week7_pp']));
			            alert(JSON.stringify(response['grading_week8_pp']));*/



			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week","8th Week"],
				                datasets: [
				                	//---------------------Knowledge-------------------------------------------
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: [response['grading_week1_k'],response['grading_week2_k'],response['grading_week3_k'],response['grading_week4_k'],
				                        		response['grading_week5_k'],response['grading_week6_k'],response['grading_week7_k'],response['grading_week8_k']]
				                    
				            
				                    },

				                    //---------------------Process----------------------------------------------------
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: [response['grading_week1_ps'],response['grading_week2_ps'],response['grading_week3_ps'],response['grading_week4_ps'],
				                        		response['grading_week5_ps'],response['grading_week6_ps'],response['grading_week7_ps'],response['grading_week8_ps']]
				                    },

				                    //---------------------Understanding----------------------------------------------------
				                    				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: [response['grading_week1_u'],response['grading_week2_u'],response['grading_week3_u'],response['grading_week4_u'],
				                        		response['grading_week5_u'],response['grading_week6_u'],response['grading_week7_u'],response['grading_week8_u']]
				                    },

				                    //----------------------Performance---------------------------------------------------
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: [response['grading_week1_pp'],response['grading_week2_pp'],response['grading_week3_pp'],response['grading_week4_pp'],
				                        		response['grading_week5_pp'],response['grading_week6_pp'],response['grading_week7_pp'],response['grading_week8_pp']]
				                    }
				                ]
				            };

				            var ctx = document.getElementById("fourthChart").getContext("2d")
					        var studentChart = new Chart(ctx).Bar(chartData, {
					        	
					        });
					        
			            	display_table_data(response['progress_data']);
			            }
			        });

  					function display_table_data(data) 
                    {
                     
                        $('#fourth-grading-table').empty();

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    } 

                    function reset_table(row)
                    {

                        var data = $('<tr>'+
										'<td>'+row.week_number+'</td>'+
										'<td>'+row.knowledge+'</td>'+
										'<td>'+row.processskills+'</td>'+
										'<td>'+row.understanding+'</td>'+
										'<td>'+row.performanceproducts+'</td>'+
										'<td id="legend'+row.week_number+row.grading_period+'">'+row.legend+'</td>'+
									'</tr>');
                           
                        $('#fourth-grading-table').append(data);

                        if(row.legend=='B')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('beggining-bg');
                        }
                        else if (row.legend=='D')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('developing-bg');
                        } 

                        if(row.legend=='AP')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('approaching-bg');
                        }
                        else if(row.legend=='P')
                        {
                           $('#legend'+row.week_number+row.grading_period).addClass('proficient-bg');
                        }
                        else if(row.legend=='A')
                        {
                            $('#legend'+row.week_number+row.grading_period).addClass('advanced-bg');
                        }    
                    }
                    //end of display table data
                    
			        return false;
		        };
}		


		         



});//End of ready
       
</script>		
	</body>
    
    
</html>