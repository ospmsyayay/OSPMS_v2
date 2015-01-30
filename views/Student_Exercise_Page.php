<!--@author Darryl-->
<!--@copyright 2014-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- <meta charset="UTF-8"> -->
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
		<link href="views/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
	</head>
    
		<body>
		
		
<div class="header-wrapper">
	<?php include "views/parts/navi-bar-student.php";?>
</div><!--header-wrapper-->

<div class="wrapper-separator-holder">
	<div class="wrapper-separator"></div>
</div>	
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
								<?php 
									/*foreach($all_exercises as $exercise)
									{*/
								?>
										<div id="student-exercise">
												<form class="form-horizontal" role="form">
													<div id="exercise-title">
														<?php
														/*echo '<h4>Exercise Name: '.$exercise['exerciseName'].'</h4>'*/
														echo '<div>'.print_r($all_exercises).'</div>';
														?>
													</div>
													<?php
													/*foreach($exercise['exerciseID'] as $eidHolder)
													{	
														foreach($eidHolder as $question)
														{	
															echo '<div>'.print_r($eidHolder).'</div>';*/
															/*foreach($question['questionNo'] as $qidHolder)
															{
																foreach($qidHolder as $questionNo => $choices)
																{*/
													?>	
																<!-- <div class="panel panel-default">
																	<div class="panel-heading">
																		<?php
																	
																			/*echo '<h5>Question No: 1 <h5/>';*/
																			/*echo '<h6>Question: '.$question['oe_question'].'</h6>';*/
																		
																		?>
																	</div>
																
																	<div class="panel panel-body">
																		<?php
																			/*foreach ($choices['choices'] as $choice)*/
																			{ 
																				/*foreach($choice as $oe_choices => $value)*/
																				{	
																					/*echo '<h5>Choices: '.$oe_choices.'</h5>';*/
																					/*echo '<p>A) '.$oe_choices.' </p>';*/
																				}
																			}
																		?>
																	</div>

																	<div class="panel panel-footer">
																		<input placeholder="answer" name="qanswer" type="text" id="answer-box"/>
																	</div>	

																</div> -->

													<?php
															/*	}
															}*/

													/*	}
													}		*/	
													?>

												</form>	
										</div><!--student-exercise-->
								<?php
									/*} */
								?>			

							</div><!--student-exercise-container-->	
					</div><!--student-exercise-container-relative-->
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
		<script src="views/js/msgbox.js"></script>
		<script src="views/js/scripts.js"></script>
		
	
		<!-- JavaScript Test -->
<script>
$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
})
</script>


	</body>
    

</html>