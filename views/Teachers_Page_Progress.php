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
    
	<body>
	
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
						<div class="col-md-9 right-column-fixed">
							<div class="row"><!--//row for student-list-title-holder -->
								<div class="student-list-title-holder">
									<div class="col-md-7" id="student-list-title">
										Student List
									</div>

									<div class="col-md-4" id="search-query-holder">
										<input type="text" class="search-query" placeholder="Search Student" id="student-search">
									<i class="icon-search"></i>
									</div>


								</div><!--student-list-title-holder-->
							</div><!--//row for student-list-title-holder -->
						</div><!--right-column-fixed-->
					</div><!--//row for right column fixed -->

					<div class="row"><!--//row for student-progress-container -->
						<div class="col-md-12" id="student-progress-container">
								<div class="row"><!--//row for progress-student-container-->
									<div id="student_table">
										<?php

											foreach ($display_students as $display) 
											{
										?>		
													<div class="col-md-3 progress-student-container">
											     			<div class="progress-student-img-holder">
											     			<?php echo '<img src="views/res/' .$display['image'] . '" class="img-circle img-responsive center-block student-img "/>';?>
											     			</div>

													     	<div class="text-center">						     	
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
								</div><!--//row for progress-student-container-->						
						</div><!--student-progress-container-->	
					</div><!--//row for student-progress-container -->		
				</div>
				<!--End of mid content-->

		</div><!--row-->
	</div><!--container-fluid-->
<!--End of main -->				

<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
		
		
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
								  
							     var display = $('<div class="col-md-3 progress-student-container">'+
							     					'<div class="progress-student-img-holder">' +
							     						'<img src="views/res/' + rowData.image + '" class="img-circle img-responsive center-block student-img"/>' +
							     					'</div>' +
							     					'<div class="text-center">' +							     	
							     						'<a class="navbar-link getLRN" href="index.php?r=lss&tr=s" id="'+rowData.student_lrn+'">' +
							     						'<p class="student-name">' +rowData.reg_lname+', '+rowData.reg_fname+' '+rowData.reg_mname+'</p></a>' +
							     						'<p class="student-lrn">'+rowData.student_lrn+'</p>'+
							     					'</div>'+
							     				'</div>');


							   	 $("#student_table").append(display); 
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
						           		
										  /*alert(JSON.stringify(response['student_filter']));*/
											
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