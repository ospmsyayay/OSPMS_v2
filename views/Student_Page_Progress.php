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
				<div class="aside-left col-md-2">
					<?php include "views/parts/side-bar-student.php";?>
				</div>
				<!--End of left content-->

				<!--Start of mid content-->
					<div class="main-content col-md-10 col-md-offset-2"></div>
				<!--End of mid content-->

		</div><!--row-->
	</div><!--container-fluid-->
<!--End of main -->

<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
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
		     /*   	alert(subject);*/
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_for_chart.php',
			            type: 'GET',
			            data: {
			            	subject_chart:subject
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		/*alert(JSON.stringify(response['clicked']));*/
			           		reset_container(subject);

							getFirstChart('subject'); 
							getSecondChart('subject');
							getThirdChart('subject');
							getFourthChart('subject');
			           		 
						},


			            });

		         }


		        function reset_container(subject)
		        {
		        	$('.main-content').empty();

		        	var display=$('<div class="row"><!--//row for content-->'+
		        					'<div class="col-md-12 content">'+

		        						'<div class="row"><!--//row for header-->'+
		        							'<div class="col-md-10 progress-header">'+subject+'</div>'+
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
											                                       '<th class="knowledge-title"><h6>Knowledge</h6></th>'+
											                                       '<th class="processskills-title"><h6>Process/skills</h6></th>'+
											                                       '<th class="understanding-title"><h6>Understanding </h6></th>'+
											                                       '<th class="performanceproducts-title"><h6>Performance/Products</h6></th>'+
											                                       '<th><h6>Grade</h6></th>'+
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
											                                       '<th class="knowledge-title"><h6>Knowledge </h6></th>'+
											                                       '<th class="processskills-title"><h6>Process/skills</h6></th>'+
											                                       '<th class="understanding-title"><h6>Understanding</h6></th>'+
											                                       '<th class="performanceproducts-title"><h6>Performance/Products</h6></th>'+
											                                       '<th><h6>Grade</h6></th>'+
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
											                                       '<th class="knowledge-title"><h6>Knowledge </h6></th>'+
											                                       '<th class="processskills-title"><h6>Process/skills</h6></th>'+
											                                       '<th class="understanding-title"><h6>Understanding</h6></th>'+
											                                       '<th class="performanceproducts-title"><h6>Performance/Products</h6></th>'+
											                                       '<th><h6>Grade</h6></th>'+
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
											                                       '<th class="knowledge-title"><h6>Knowledge </h6></th>'+
											                                       '<th class="processskills-title"><h6>Process/skills</h6></th>'+
											                                       '<th class="understanding-title"><h6>Understanding</h6></th>'+
											                                       '<th class="performanceproducts-title"><h6>Performance/Products</h6></th>'+
											                                       '<th><h6>Grade</h6></th>'+
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

		        	$('.main-content').append(display);
		        } 

	

		        function getFirstChart(category) 
		        {
		        	

		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '1st', onload:category
			            },
			            dataType: 'json',
			            success: function(response) {
			            /*alert(JSON.stringify(response));*/
			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week"],
				                datasets: [
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: response['knowledge']
				            
				                    },
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: response['process']
				                    },
				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: response['understanding']
				                    },
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: response['performance']
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

		        function getSecondChart(category) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '2nd', onload:category
			            },
			            dataType: 'json',
			            success: function(response) {
			            	/*alert(JSON.stringify(response));*/
			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week"],
				                datasets: [
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: response['knowledge']
				                    },
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: response['process']
				                    },
				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: response['understanding']
				                    },
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: response['performance']
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

		        function getThirdChart(category) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '3rd', onload:category
			            },
			            dataType: 'json',
			            success: function(response) {
			            	/*alert(JSON.stringify(response));*/
			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week"],
				                datasets: [
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: response['knowledge']
				                    },
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: response['process']
				                    },
				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: response['understanding']
				                    },
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: response['performance']
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

		        function getFourthChart(category) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	s_gradingPeriod: '4th', onload:category
			            },
			            dataType: 'json',
			            success: function(response) 
			            {
			            	/*alert(JSON.stringify(response));*/
			                var chartData = {
				                labels: ["1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week"],
				                datasets: [
				                    {
				                        label: "Knowledge - 15%",
				                        fillColor: "rgba(57, 117, 189, 0.75)",
				                        strokeColor: "rgba(7, 67, 139, 0.75)",
				                        highlightFill: "rgba(57, 117, 189, 1)",
				                        highlightStroke: "rgba(7, 67, 139, 1)",
				                        data: response['knowledge']
				                    },
				                    {
				                        label: "Process/Skills - 25%",
				                        fillColor: "rgba(195, 57, 55, 0.75)",
				                        strokeColor: "rgba(145, 7, 5, 0.75)",
				                        highlightFill: "rgba(195, 57, 55, 1)",
				                        highlightStroke: "rgba(145, 7, 5, 1)",
				                        data: response['process']
				                    },
				                    {
				                        label: "Understanding - 30%",
				                        fillColor: "rgba(144, 183, 66, 0.75)",
				                        strokeColor: "rgba(94, 133, 16, 0.75)",
				                        highlightFill: "rgba(144, 183, 66, 1)",
				                        highlightStroke: "rgba(94, 133, 16, 1)",
				                        data: response['understanding']
				                    },
				                    {
				                        label: "Performance - 30%",
				                        fillColor: "rgba(133, 81, 154, 0.75)",
				                        strokeColor: "rgba(83, 31, 104, 0.75)",
				                        highlightFill: "rgba(133, 81, 154, 1)",
				                        highlightStroke: "rgba(83, 31, 104, 1)",
				                        data: response['performance']
				                    }
				                ]
				            };

				            var ctx = document.getElementById("fourthChart").getContext("2d")
					        var studentChart = new Chart(ctx).Bar(chartData, {
					        	/*legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"*/
					        });

					       /* $('.student-progress-space').append(studentChart.generateLegend());*/

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
		
        </script>		

	</body>
    
    
</html>