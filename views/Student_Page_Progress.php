  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Student Page Progress</title>
		<link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
    
		<body>
		
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
					<div class="main-content col-md-9">
						<div class="row"><!--//row for content-->
							<div class="col-md-12 content">

								<div class="row"><!--//row for header-->
									<div class="col-md-10 progress-header">Choose Section</div>
								</div><!--//row for header-->

										<div class="row"><!--//row for container-->
		    								<div class="col-md-12 progress-container-relative">
		    								<!-- /1st Grading Period -->
		    									<div class="row"><!--//row for progress period-->
		    										<div class="progress-period">1st Grading Period</div>
		    									</div><!--//row for progress period-->
			        							
			        							<div class="row"><!--//row for progress space-->
				        							<div class="col-md-6 student-progress-space table-responsive">
														<!-- <canvas id="firstChart" class="col-md-12 chart"></canvas> -->
														<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">
													</div>


													<div class="col-md-6 student-progress-table">
														<div class="row"><!--//row for legend-table-->
															<div class="col-md-12 legend-table">

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="knowledge-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Knowledge-15%</h5>

																	<div class="col-md-1 legend">
																		<div class="beggining-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(B)-Beginning 74-below</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="processskills-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Process/Skills-25%</h5>

																	<div class="col-md-1 legend">
																		<div class="developing-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(D)-Developing 75-79</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="understanding-bg center-block"></div> 
																	</div>
																	<h5 class="col-md-5">Understanding-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="approaching-bg center-block"></div>
																	</div>
																	<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class=" performanceproducts-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Performance/Products-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="proficient-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(P)-Proficient 85-89</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 col-md-offset-6 legend">
																		<div class="advanced-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>
																</div><!--//row for legend-->
																
															</div>
														</div><!--//row for legend-table-->

														<div class="row"><!--//row for progress-data-->
															<div class="col-md-12 progress-data table-responsive"> 
																<table class="table table-bordered table-hover table-condensed">
																		<thead>
																		    <tr>
									                                       <th><h6>Week No.<h6></th>
									                                       <th class=""><h6>Knowledge</h6></th>
									                                       <th class=""><h6>Process/skills</h6></th>
									                                       <th class=""><h6>Understanding </h6></th>
									                                       <th class=""><h6>Performance/Products</h6></th>
									                                       <th><h6>Tentative</h6></th>
									                                    </tr>
																		<thead>
																		<tbody id="first-grading-table">
																			
																			
																		</tbody>
																</table>
															</div>
														</div><!--//row for legend-->

													
													</div><!--student-progress-table-->
												</div><!--row for progress space-->
											<!-- //2nd Grading Period -->
												<div class="row"><!--//row for progress period-->
		    										<div class="progress-period">2nd Grading Period</div>
		    									</div><!--//row for progress period-->
			        							
			        							<div class="row"><!--//row for progress space-->
				        							<div class="col-md-6 student-progress-space table-responsive">
														<!-- <canvas id="secondChart" class="col-md-12 chart"></canvas> -->
														<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">
													</div>


													<div class="col-md-6 student-progress-table">
														<div class="row"><!--//row for legend-table-->
															<div class="col-md-12 legend-table">

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="knowledge-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Knowledge-15%</h5>

																	<div class="col-md-1 legend">
																		<div class="beggining-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(B)-Beginning 74-below</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="processskills-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Process/Skills-25%</h5>

																	<div class="col-md-1 legend">
																		<div class="developing-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(D)-Developing 75-79</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="understanding-bg center-block"></div> 
																	</div>
																	<h5 class="col-md-5">Understanding-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="approaching-bg center-block"></div>
																	</div>
																	<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class=" performanceproducts-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Performance/Products-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="proficient-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(P)-Proficient 85-89</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 col-md-offset-6 legend">
																		<div class="advanced-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>
																</div><!--//row for legend-->
																
															</div>
														</div><!--//row for legend-table-->

														<div class="row"><!--//row for progress-data-->
															<div class="col-md-12 progress-data table-responsive"> 
																<table class="table table-bordered table-hover table-condensed">
																		<thead>
																		    <tr>
									                                       <th><h6>Week No.<h6></th>
									                                       <th class=""><h6>Knowledge </h6></th>
									                                       <th class=""><h6>Process/skills</h6></th>
									                                       <th class=""><h6>Understanding</h6></th>
									                                       <th class=""><h6>Performance/Products</h6></th>
									                                       <th><h6>Tentative</h6></th>
									                                    </tr>
																		<thead>
																		<tbody id="second-grading-table">
																			
																		</tbody>
																</table>
															</div>
														</div><!--//row for legend-->

													
													</div><!--student-progress-table-->
												</div><!--row for progress space-->
											<!-- //3rd Grading Period -->
												<div class="row"><!--//row for progress period-->
		    										<div class="progress-period">3rd Grading Period</div>
		    									</div><!--//row for progress period-->
			        							
			        							<div class="row"><!--//row for progress space-->
				        							<div class="col-md-6 student-progress-space table-responsive">
														<!-- <canvas id="thirdChart" class="col-md-12 chart"></canvas> -->
														<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">
													</div>


													<div class="col-md-6 student-progress-table">
														<div class="row"><!--//row for legend-table-->
															<div class="col-md-12 legend-table">

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="knowledge-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Knowledge-15%</h5>

																	<div class="col-md-1 legend">
																		<div class="beggining-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(B)-Beginning 74-below</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="processskills-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Process/Skills-25%</h5>

																	<div class="col-md-1 legend">
																		<div class="developing-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(D)-Developing 75-79</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="understanding-bg center-block"></div> 
																	</div>
																	<h5 class="col-md-5">Understanding-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="approaching-bg center-block"></div>
																	</div>
																	<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class=" performanceproducts-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Performance/Products-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="proficient-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(P)-Proficient 85-89</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 col-md-offset-6 legend">
																		<div class="advanced-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>
																</div><!--//row for legend-->
																
															</div>
														</div><!--//row for legend-table-->

														<div class="row"><!--//row for progress-data-->
															<div class="col-md-12 progress-data table-responsive"> 
																<table class="table table-bordered table-hover table-condensed">
																		<thead>
																		    <tr>
									                                       <th><h6>Week No.<h6></th>
									                                       <th class=""><h6>Knowledge </h6></th>
									                                       <th class=""><h6>Process/skills</h6></th>
									                                       <th class=""><h6>Understanding</h6></th>
									                                       <th class=""><h6>Performance/Products</h6></th>
									                                       <th><h6>Tentative</h6></th>
									                                    </tr>
																		<thead>
																		<tbody id="third-grading-table">
																			
																			
																		</tbody>
																</table>
															</div>
														</div><!--//row for legend-->

													
													</div><!--student-progress-table-->
												</div><!--row for progress space-->
											<!-- //4th Grading Period -->
												<div class="row"><!--//row for progress period-->
		    										<div class="progress-period">4th Grading Period</div>
		    									</div><!--//row for progress period-->
			        							
			        							<div class="row"><!--//row for progress space-->
				        							<div class="col-md-6 student-progress-space table-responsive">
														<!-- <canvas id="fourthChart" class="col-md-12 chart"></canvas> -->
														<img src="views/res/blank_canvas.JPG"  class="blank_canvas img-responsive">
													</div>


													<div class="col-md-6 student-progress-table">
														<div class="row"><!--//row for legend-table-->
															<div class="col-md-12 legend-table">

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="knowledge-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Knowledge-15%</h5>

																	<div class="col-md-1 legend">
																		<div class="beggining-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(B)-Beginning 74-below</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="processskills-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Process/Skills-25%</h5>

																	<div class="col-md-1 legend">
																		<div class="developing-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(D)-Developing 75-79</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class="understanding-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Understanding-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="approaching-bg center-block"></div>
																	</div>
																	<h6 class="col-md-5">(AP)-Approaching Proficiency 80-74</h6>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 legend">
																		<div class=" performanceproducts-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">Performance/Products-30%</h5>

																	<div class="col-md-1 legend">
																		<div class="proficient-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5">(P)-Proficient 85-89</h5>
																</div><!--//row for legend-->

																<div class="row"><!--//row for legend-->
																	<div class="col-md-1 col-md-offset-6 legend">
																		<div class="advanced-bg center-block"></div>
																	</div>
																	<h5 class="col-md-5 ">(A)-Proficient 90-above</h5>
																</div><!--//row for legend-->
																
															</div>
														</div><!--//row for legend-table-->

														<div class="row"><!--//row for progress-data-->
															<div class="col-md-12 progress-data table-responsive"> 
																<table class="table table-bordered table-hover table-condensed">
																		<thead>
																		    <tr>
									                                       <th><h6>Week No.<h6></th>
									                                       <th class=""><h6>Knowledge </h6></th>
									                                       <th class=""><h6>Process/skills</h6></th>
									                                       <th class=""><h6>Understanding</h6></th>
									                                       <th class=""><h6>Performance/Products</h6></th>
									                                       <th><h6>Tentative</h6></th>
									                                    </tr>
																		<thead>
																		<tbody id="fourth-grading-table">
																			
																			
																		</tbody>
																</table>
															</div>
														</div><!--//row for legend-->

													
													</div><!--student-progress-table-->
												</div><!--row for progress space-->
											
										</div><!--//row for container-->
											
										</div><!--//container-relative-->
									
								</div><!--//progress-header-->
							</div><!--//content-->
						</div><!--//row for content-->

					</div>
				<!--End of mid content-->

		</div><!--row-->
	</div><!--container-fluid-->
<!--End of main -->

<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
<script src="views/plugins/chartjs/Chart.js"></script>

     <!-- JavaScript Test -->
<script>

$(function () 
{

	$(document.body).on('click', '.side-menu', function () 
	{
	    $('.side-menu').removeClass('student-side-menu-click');
	    $(this).addClass('student-side-menu-click');

	     var grade_=$(this).attr('grade');
	     var sectionno_=$(this).attr('sectionno');
	     var section_=$(this).attr('section');
	     var subject_=$(this).attr('subject');

		//pass class_rec_no
	    chart_class_rec_no=$(this).attr('side-menu-id');

	/*alert(class_rec_no);
	alert(lrn);*/

	   reset_container(grade_,sectionno_,section_,subject_);

	   chart(chart_class_rec_no);



	});	

function reset_container(grade,sectionno,section,subject)
{
	$('.main-content').empty();

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

												'<div class="alert-first-grading content">'+

												'</div>'+

											
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

												'<div class="alert-second-grading content">'+

												'</div>'+

											
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

												'<div class="alert-third-grading content">'+

												'</div>'+

											
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

												'<div class="alert-fourth-grading content">'+

												'</div>'+

											
											'</div><!--student-progress-table-->'+
										'</div><!--row for progress space-->'+
									
								'</div><!--//row for container-->'+
									
								'</div><!--//container-relative-->'+
							
						'</div><!--//progress-header-->'+
					'</div><!--//content-->'+
				'</div><!--//row for content-->');

	$('.main-content').append(display);
} 

function chart(class_rec_no) 
{
				getFirstChart(class_rec_no);
				getSecondChart(class_rec_no);
				getThirdChart(class_rec_no);
				getFourthChart(class_rec_no);

		        function getFirstChart(class_rec_no) 
		        {
		        
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?onload',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '1st', chart_class_rec_no:class_rec_no
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


			            var grading_period=response['grading_period'];
			            var week_of_grading=response['week_of_grading'];

/*			            alert(grading_period);
			            alert(week_of_grading);*/

			            var week_no="";

			            //Week 1, 2, 3, 4, 5, 6, 7, 8

			            if(grading_period == '1st Grading Period')
			            {

		            		if(week_of_grading == '2')
			            	{

			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1 ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }


			            	}

		            		if(week_of_grading == '3')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            					week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '4')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '5')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '6')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }
			            	}

		            		if(week_of_grading == '7')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            	}	

			        		if(week_of_grading == '8')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }

					            //7th Week
					            if( jQuery.isEmptyObject(response['grading_week7_k']) && jQuery.isEmptyObject(response['grading_week7_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week7_u']) && jQuery.isEmptyObject(response['grading_week7_pp']) )
					            {
				            		week_no=week_no+"7, ";

				            		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
					            }
			            	}			


			            }
			            else if(grading_period == '2nd Grading Period')
			            {
		            		//1st Week
				            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
				            {
				            	week_no=week_no+"1, ";
				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }

		            		//2nd Week
				           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
				            {
				            	week_no=week_no+"2, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }

				            //3rd Week
				            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
				            {
				            	week_no=week_no+"3, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }

				            //4th Week
				            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
				            {
				            	week_no=week_no+"4, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }


				            //5th Week
				            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
				            {
				            	week_no=week_no+"5, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }

				            //6th Week
				            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
				            {
				            	week_no=week_no+"6, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }

				            //7th Week
				            if( jQuery.isEmptyObject(response['grading_week7_k']) && jQuery.isEmptyObject(response['grading_week7_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week7_u']) && jQuery.isEmptyObject(response['grading_week7_pp']) )
				            {
			            		week_no=week_no+"7, ";

			            		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }

				            //8th Week
				            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
				            {
				            	week_no=week_no+"8, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-first-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-first-grading").append(display);
				            }


			            }	




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
					        	/*legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"*/
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

		        function getSecondChart(class_rec_no) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?onload',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '2nd', chart_class_rec_no:class_rec_no
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

			            var grading_period=response['grading_period'];
			            var week_of_grading=response['week_of_grading'];

/*			            alert(grading_period);
			            alert(week_of_grading);*/

			            var week_no="";

			            //Week 1, 2, 3, 4, 5, 6, 7, 8

			            if(grading_period == '2nd Grading Period')
			            {

		            		if(week_of_grading == '2')
			            	{

			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1 ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }


			            	}

		            		if(week_of_grading == '3')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            					week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '4')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '5')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '6')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }
			            	}

		            		if(week_of_grading == '7')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            	}	

			        		if(week_of_grading == '8')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }

					            //7th Week
					            if( jQuery.isEmptyObject(response['grading_week7_k']) && jQuery.isEmptyObject(response['grading_week7_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week7_u']) && jQuery.isEmptyObject(response['grading_week7_pp']) )
					            {
				            		week_no=week_no+"7, ";

				            		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
					            }
			            	}			


			            }
			            else if(grading_period == '3rd Grading Period')
			            {
		            		//1st Week
				            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
				            {
				            	week_no=week_no+"1, ";
				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }

		            		//2nd Week
				           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
				            {
				            	week_no=week_no+"2, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }

				            //3rd Week
				            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
				            {
				            	week_no=week_no+"3, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }

				            //4th Week
				            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
				            {
				            	week_no=week_no+"4, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }


				            //5th Week
				            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
				            {
				            	week_no=week_no+"5, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }

				            //6th Week
				            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
				            {
				            	week_no=week_no+"6, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }

				            //7th Week
				            if( jQuery.isEmptyObject(response['grading_week7_k']) && jQuery.isEmptyObject(response['grading_week7_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week7_u']) && jQuery.isEmptyObject(response['grading_week7_pp']) )
				            {
			            		week_no=week_no+"7, ";

			            		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }

				            //8th Week
				            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
				            {
				            	week_no=week_no+"8, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-second-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-second-grading").append(display);
				            }


			            }	





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
					        	/*legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"*/
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

		        function getThirdChart(class_rec_no) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?onload',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '3rd', chart_class_rec_no:class_rec_no
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

			            var grading_period=response['grading_period'];
			            var week_of_grading=response['week_of_grading'];

/*			            alert(grading_period);
			            alert(week_of_grading);*/

			            var week_no="";

			            //Week 1, 2, 3, 4, 5, 6, 7, 8

			            if(grading_period == '3rd Grading Period')
			            {

		            		if(week_of_grading == '2')
			            	{

			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1 ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }


			            	}

		            		if(week_of_grading == '3')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            					week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '4')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '5')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '6')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }
			            	}

		            		if(week_of_grading == '7')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            	}	

			        		if(week_of_grading == '8')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }

					            //7th Week
					            if( jQuery.isEmptyObject(response['grading_week7_k']) && jQuery.isEmptyObject(response['grading_week7_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week7_u']) && jQuery.isEmptyObject(response['grading_week7_pp']) )
					            {
				            		week_no=week_no+"7, ";

				            		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
					            }
			            	}			


			            }
			            else if(grading_period == '4th Grading Period')
			            {
		            		//1st Week
				            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
				            {
				            	week_no=week_no+"1, ";
				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }

		            		//2nd Week
				           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
				            {
				            	week_no=week_no+"2, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }

				            //3rd Week
				            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
				            {
				            	week_no=week_no+"3, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }

				            //4th Week
				            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
				            {
				            	week_no=week_no+"4, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }


				            //5th Week
				            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
				            {
				            	week_no=week_no+"5, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }

				            //6th Week
				            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
				            {
				            	week_no=week_no+"6, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }

				            //7th Week
				            if( jQuery.isEmptyObject(response['grading_week7_k']) && jQuery.isEmptyObject(response['grading_week7_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week7_u']) && jQuery.isEmptyObject(response['grading_week7_pp']) )
				            {
			            		week_no=week_no+"7, ";

			            		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }

				            //8th Week
				            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
				            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
				            {
				            	week_no=week_no+"8, ";

				            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-third-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-third-grading").append(display);
				            }


			            }	



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
					        	/*legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"*/
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

		        function getFourthChart(class_rec_no) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php?onload',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '4th', chart_class_rec_no:class_rec_no
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

			            var grading_period=response['grading_period'];
			            var week_of_grading=response['week_of_grading'];

/*			            alert(grading_period);
			            alert(week_of_grading);*/

			            var week_no="";

			            //Week 1, 2, 3, 4, 5, 6, 7, 8

			            if(grading_period == '4th Grading Period')
			            {

		            		if(week_of_grading == '2')
			            	{

			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1 ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }


			            	}

		            		if(week_of_grading == '3')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            					week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '4')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '5')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            	}

		            		if(week_of_grading == '6')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }
			            	}

		            		if(week_of_grading == '7')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            	}	

			        		if(week_of_grading == '8')
			            	{
			            		//1st Week
					            if( jQuery.isEmptyObject(response['grading_week1_k']) && jQuery.isEmptyObject(response['grading_week1_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week1_u']) && jQuery.isEmptyObject(response['grading_week1_pp']) )
					            {
					            	week_no=week_no+"1, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

			            		//2nd Week
					           	if( jQuery.isEmptyObject(response['grading_week2_k']) && jQuery.isEmptyObject(response['grading_week2_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week2_u']) && jQuery.isEmptyObject(response['grading_week2_pp']) )
					            {
					            	week_no=week_no+"2, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //3rd Week
					            if( jQuery.isEmptyObject(response['grading_week3_k']) && jQuery.isEmptyObject(response['grading_week3_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week3_u']) && jQuery.isEmptyObject(response['grading_week3_pp']) )
					            {
					            	week_no=week_no+"3, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //4th Week
					            if( jQuery.isEmptyObject(response['grading_week4_k']) && jQuery.isEmptyObject(response['grading_week4_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week4_u']) && jQuery.isEmptyObject(response['grading_week4_pp']) )
					            {
					            	week_no=week_no+"4, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }


					            //5th Week
					            if( jQuery.isEmptyObject(response['grading_week5_k']) && jQuery.isEmptyObject(response['grading_week5_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week5_u']) && jQuery.isEmptyObject(response['grading_week5_pp']) )
					            {
					            	week_no=week_no+"5, ";

					            	var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //6th Week
					            if( jQuery.isEmptyObject(response['grading_week6_k']) && jQuery.isEmptyObject(response['grading_week6_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week6_u']) && jQuery.isEmptyObject(response['grading_week6_pp']) )
					            {
					            	week_no=week_no+"6, ";

					           		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }

					            //7th Week
					            if( jQuery.isEmptyObject(response['grading_week7_k']) && jQuery.isEmptyObject(response['grading_week7_ps']) 
					            	&& jQuery.isEmptyObject(response['grading_week7_u']) && jQuery.isEmptyObject(response['grading_week7_pp']) )
					            {
				            		week_no=week_no+"7, ";

				            		var alert_message="<strong>Please be informed</strong> that the <strong>teacher skipped </strong> Week <strong>"+
					            						week_no+"</strong> due to some important matters.";

				            		$(".alert-fourth-grading").empty();
				            		var display=$('<div class="alert alert-danger">'+alert_message+'</div>');

				            		$(".alert-fourth-grading").append(display);
					            }
			            	}			


			            }



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
					        	/*legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"*/
					        });
					        /*$('.student-page-space').append(studentChart.generateLegend());*/
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

});//Ready

</script>


	</body>
    
    
</html>