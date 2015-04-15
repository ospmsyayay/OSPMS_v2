  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Parent Student Page Progress</title>
		<link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
<body> 
<div class="header-wrapper">
	<?php include "views/parts/navi-bar-parent.php";?>     
</div><!--header-wrapper-->
<div class="wrapper-separator-holder">
	<div class="wrapper-separator"></div>
</div>	
<div class="viewport">
	<div class="content">
		<div class="container">
			<?php include "views/parts/side-bar-parent-student.php";?>
			<div class="right-wrapper">
				<div class="right-column">
						
				</div><!--right-column-->
			</div><!--right-wrapper-->
		</div><!--container-->
	</div><!--content-->
</div><!--viewport-->

 <script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
<script src="views/plugins/chartjs/Chart.js"></script>
<script src="views/js/scripts.js"></script>		
		
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

        url: 'views/ajax/get_for_chart.php',
        type: 'GET',
        data: {
        	ps_subject_chart:subject
        },
       dataType: 'json',

       success: function(response) 
       {
       		/*alert(JSON.stringify(response['clicked']));*/
       		reset_container(subject);

			chart('subject'); 
			
       		 
		},


        });

 }


function getGradeId(menu) 
{

var grade=menu.id;



$.ajax({

    url: 'views/ajax/get_for_chart.php',
    type: 'GET',
    data: {
    	ps_grade_chart:grade
    },
   dataType: 'json',

   success: function(response) 
   {
   		/*alert(JSON.stringify(response['clicked']));*/

   		reset_container();

   		chart('grade'); 
	
   		 
	},


    });

}

function getSectionId(menu) 
{

var section=menu.id;

$.ajax({

    url: 'views/ajax/get_for_chart.php',
    type: 'GET',
    data: {
    	ps_section_chart:section
    },
   dataType: 'json',

   success: function(response) 
   {
   		/*alert(JSON.stringify(response['clicked']));*/
   		reset_container();

		chart('section'); 
	
	},


    });

}

function reset_container(subject)
{
	$('.right-column').empty();

	var display=$('<div id="student-container">'+
		        							'<div class="progress-header">'+subject+'</div>'+
		        							'<div class="progress-container-relative">'+
			        							'<div class="progress-period">1st Grading Period</div>'+
			        							'<div class="student-page-space">'+
													'<canvas id="firstChart" width="600" height="350" style="margin-left: 15px;"></canvas>'+
												'</div>'+

												'<div class="progress-period">2nd Grading Period</div>'+
												'<div class="student-page-space">'+
													'<canvas id="secondChart" width="600" height="350" style="margin-left: 15px;"></canvas>'+
												'</div>'+

												'<div class="progress-period">3rd Grading Period</div>'+
												'<div class="student-page-space">'+
													'<canvas id="thirdChart" width="600" height="350" style="margin-left: 15px;"></canvas>'+
												'</div>'+

												'<div class="progress-period">4th Grading Period</div>'+
												'<div class="student-page-space">'+
													'<canvas id="fourthChart" width="600" height="350" style="margin-left: 15px;"></canvas>'+
												'</div>'+
											'</div>'+
									'</div>');

	$('.right-column').append(display);
} 

function chart(category) 
{
				getFirstChart(category);
				getSecondChart(category);
				getThirdChart(category);
				getFourthChart(category);

		        function getFirstChart(category) 
		        {
		        
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '1st', ps_onload:category
			            },
			            dataType: 'json',
			            success: function(response) {

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
					        	legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"
					        });
			            }
			        });
			        return false;
		        }; 

		        function getSecondChart(category) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '2nd', ps_onload:category
			            },
			            dataType: 'json',
			            success: function(response) {

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
					        	legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"
					        });
			            }
			        });
			        return false;
		        };

		        function getThirdChart(category) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '3rd', ps_onload:category
			            },
			            dataType: 'json',
			            success: function(response) {

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
					        	legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"
					        });
			            }
			        });
			        return false;
		        }; 

		        function getFourthChart(category) 
		        {
		        	$.ajax({
			            url: 'views/ajax/get_for_chart.php',
			            method: 'GET',
			            data: {
			            	gradingPeriod: '4th', ps_onload:category
			            },
			            dataType: 'json',
			            success: function(response) {

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
					        	legendTemplate : "<div class=\"<%=name.toLowerCase()%>-legend\" style=\"position: relative; bottom: 15px; margin: 25px 0 25px 25px;\"><% for (var i=0; i<datasets.length; i++){%><span style=\"background-color:<%=datasets[i].fillColor%>; border: 2px solid <%=datasets[i].fillColor%>; border-radius: 5px; padding: 5px; margin: 5px;\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span><%}%></div>"
					        });
					        $('.student-page-space').append(studentChart.generateLegend());
			            }
			        });
			        return false;
		        };
}		         
</script>
	</body>
    
    
</html>