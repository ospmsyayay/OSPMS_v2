  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
		<title>Online Student Performance Monitoring System</title>
 
		<link href="views/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>

       
	</head>
    
	<body>
	
<div class="header-wrapper">
	<?php include "views/parts/navi-bar-teacher.php";?>

</div><!--header-wrapper-->
<div class="wrapper-separator-holder">
	<div class="wrapper-separator"></div>
</div>	
<div class="viewport">
	<div class="content">
		<div class="container">
			<?php include "views/parts/side-bar-teacher.php";?>
			<div class="right-wrapper">
					<div class="right-column">
						<div class="right-column-fixed">
							<div class="student-list-title-holder panel panel-default ">
								<div id="student-list-title">
									<h5>Student List</h5>

								</div>

									<div>
										<form id="student-search-form" class="form-search form-horizontal pull-right">
							                <div class="input-append span12" id="search-query-holder">
							                    <input type="text" class="search-query" placeholder="Search Student" id="student-search">
							                    <i class="icon-search"></i>
							                    
							                </div>
							            </form>
							    	</div>
								
							</div>
							
						
							
					

						</div><!--right-column-fixed-->

						<div id="student-progress-container">
							<div id="result"></div>
								<div class="student_table">
									<?php

										foreach ($display_students as $display) 
										{
									?>		
											<div class="progress-student-container">
									     			<div class="progress-student-img-holder">
									     			<?php echo '<img src="views/res/' .$display['image'] . '" class="student-img"/>';?>
									     			</div>

											     	<div class="progress-student-details">						     	
												    <?php echo '<a class="navbar-link getLRN" href="index.php?r=lss&tr=s" id="'.$display['student_lrn'].'">';
												     	  echo '<p class="student-name">' .$display['reg_lname']. ', '.$display['reg_fname'].' '.$display['reg_mname'].'</p></a>'; 
												     	  echo '<p class="student-lrn">'.$display['student_lrn'].'</p>';
												    ?> 	  
											     	</div> 
							     				  </div>
							     	<?php			  
										}
									 	
							     	?>
								</div><!--student table-->							
						</div><!--student-progress-container-->
					</div><!--right-column-->
				</div><!--right-wrapper-->	
		</div><!--container-->
	</div><!--content-->
</div><!--viewport-->

 
        <script src="views/plugins/bootstrap/transition.js"></script>
        <script src="views/plugins/bootstrap/jquery.min.js"></script>
        <script src="views/plugins/bootstrap/bootstrap.min.js"></script>
		<script src="views/plugins/bootstrap/tab.js"></script>
		<script src="views/plugins/bootstrap/tooltip.js"></script>
		<script src="views/plugins/bootstrap/popover.js"></script>
		<script src="views/js/scripts.js"></script>
		
		
     <!-- JavaScript Test -->
<script>


		        function getSubjectId(menu) 
		        {
		        	
		        	var subject=menu.id;
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_student_list.php',
			            type: 'GET',
			            data: {
			            	subject:subject
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							/*  alert(JSON.stringify(response['student_list_bySubject']));*/
								setsearch_ajax('subject');
			           			displayStudents(response['student_list_bySubject']);
			           		 
						}


			            });

		         }


		          function getGradeId(menu) 
		        {
		        	
		        	var grade=menu.id;
		        	
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_student_list.php',
			            type: 'GET',
			            data: {
			            	grade:grade
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							  /*alert(JSON.stringify(response['student_list_byGrade']));*/
								setsearch_ajax('grade');
			           			displayStudents(response['student_list_byGrade']);
			           		 
						}


			            });

		         }

		           function getSectionId(menu) 
		        {
		        	
		        	var section=menu.id;
		        	
		        	
		        	$.ajax({
			 
			            url: 'views/ajax/get_student_list.php',
			            type: 'GET',
			            data: {
			            	section:section
			            },
			           dataType: 'json',

			           success: function(response) 
			           {
			           		
							/*  alert(JSON.stringify(response['student_list_bySection']));*/
								setsearch_ajax('section');
			           			displayStudents(response['student_list_bySection']);
			           		 
						}


			            });

		         }

		         function setsearch_ajax(category)
		         {
		         	$('#search-query-holder').empty();

		         	var display=$('<input type="text" class="search-query" placeholder="Search Student" id="student-search-'+category+'" onkeyup="student_filter_'+category+'()">'+
							            '<i class="icon-search"></i>');

		         	$('#search-query-holder').append(display);
		         }

						function displayStudents(data) 
						{
							$(".student_table").empty();

							    for (var i = 0; i < data.length; i++) 
							    {

							    		drawStudentRow(data[i]);
							  
							    }

						}

						function drawStudentRow(rowData) 
						{


							if(rowData.image!=null && rowData.reg_lname!=null && rowData.reg_fname!=null && rowData.reg_mname!=null && rowData.student_lrn!=null)
							{	
								  
							     var display = $('<div class="progress-student-container">' +
							     					'<div class="progress-student-img-holder">' +
							     						'<img src="views/res/' + rowData.image + '" class="student-img"/>' +
							     					'</div>' +
							     					'<div class="progress-student-details">' +							     	
							     						'<a class="navbar-link" href="index.php?r=lss&tr=s" id="'+rowData.student_lrn+'" onclick="getLRN(this)">' +
							     						'<p class="student-name">' +rowData.reg_lname+', '+rowData.reg_fname+' '+rowData.reg_mname+'</p></a>' +
							     						'<p class="student-lrn">'+rowData.student_lrn+'</p>'+
							     					'</div>' +
							     				  '</div>');


							   	 $(".student_table").append(display); 
						   	}
						    

						}

						

						$('#student-search').on('keyup', student_filter);
						
						function student_filter()
						{
							var filter=$('#student-search').val();
							/*alert(filter);*/

							$.ajax({
			 
						            url: 'views/ajax/get_student_list.php',
						            type: 'GET',
						            data: {
						            	student_search:filter
						            },
						           dataType: 'json',

						           success: function(response) 
						           {
						           		
										 /* alert(JSON.stringify(response['student_filter']));*/
											
						           			displayStudents(response['student_filter']);
						           		 
									}


			            		   });
						}

						function student_filter_subject()
						{
							var filter=$('#student-search-subject').val();
							/*alert(filter);*/

							$.ajax({
			 
						            url: 'views/ajax/get_student_list.php',
						            type: 'GET',
						            data: {
						            	student_search_subject:filter
						            },
						           dataType: 'json',

						           success: function(response) 
						           {
						           		
										  /*alert(JSON.stringify(response['student_filter']));*/
											
						           			displayStudents(response['student_filter_subject']);
						           		 
									}


			            		   });
						}

						function student_filter_grade()
						{
							var filter=$('#student-search-grade').val();
							/*alert(filter);*/

							$.ajax({
			 
						            url: 'views/ajax/get_student_list.php',
						            type: 'GET',
						            data: {
						            	student_search_grade:filter
						            },
						           dataType: 'json',

						           success: function(response) 
						           {
						           		
										 /*alert(JSON.stringify(response['student_filter']));*/
											
						           			displayStudents(response['student_filter_grade']);
						           		 
									}


			            		   });
						}

						function student_filter_section()
						{
							var filter=$('#student-search-section').val();
							/*alert(filter);*/

							$.ajax({
			 
						            url: 'views/ajax/get_student_list.php',
						            type: 'GET',
						            data: {
						            	student_search_section:filter
						            },
						           dataType: 'json',

						           success: function(response) 
						           {
						           		
										  /*alert(JSON.stringify(response['student_filter']));*/
											
						           			displayStudents(response['student_filter_section']);
						           		 
									}


			            		   });
						}
						
						function getLRN(p)
						{
							var lrn=p.id;
							/*alert(lrn);*/
		        	
		        	
				        	$.ajax({
					 
					            url: 'views/ajax/get_for_chart.php',
					            type: 'GET',
					            data: {
					            	lrn:lrn
					            },
					           dataType: 'json',
					           success: function(response) 
					           {
					           		
									  /*alert(JSON.stringify(response['lrn']));*/
					           		 
								}

					          
					            });


						}

						$(function() 
						{
					 
						  $(document.body).on('click', '.getLRN', function(event)
						  {

						  		var lrn=$(this).attr('id');
						  	
						  			$.ajax({
											 
								            url: 'views/ajax/get_for_chart.php',
								            type: 'GET',
								            data: {
								            	lrn:lrn
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