<!--@author Darryl-->
<!--@copyright 2014-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- <meta charset="UTF-8"> -->
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
        <!--<link rel="stylesheet" type="text/css" href="views/bootstrap.min.css"/>-->
		<link href="views/bootstrap.css" rel="stylesheet"/>
        <link href="views/exDesign.css" rel="stylesheet"/>
	</head>
    
		<body>
		
		
<div class="header-wrapper">
	<?php include "views/parts/navi-bar-student.php";?>
</div><!--header-wrapper-->

<div class="wrapper-separator"></div>
<div class="viewport">
	<div class="content">
		<div class="container">
			<?php include "views/parts/side-bar-student.php";?>
			
			<div class="right-wrapper">
				<div class="right-column">
					<div id="student-exercise-title-fixed">

							<div id="student-exercise-title"><span class="glyphicon glyphicon-flag"></span>Online Exercise</div>
						
					</div>

					<div id="student-exercise-container-relative">
								<div id="student-exercise-container">

										<div id="student-exercise">

											<div id="exercise-title">
												<h4>Exercise Name: Exercise Name</h4>
											</div>
										
											<div class="panel panel-default">
												
													<div class="panel-heading">
														<h5>Question No: <h5/>
														<p>Question:</p>
													</div>

													<div class="panel-body">
														<h5>Choices:</h5>
														<p>A:) TAMA </p>
													</div>

													<div class="panel-footer">
														<label for="answer-box"><h6>Answer:</h6></label>
													</div>
													<input placeholder="Answer" name="answer" type="text" id="answer-box" size="2" max-length="2"/>
											
						
											</div><!--question container-->

											
										</div><!--student-exercise-->

										
								</div><!--student-exercise-container-->
					</div><!--student-exercise-container-relative-->
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