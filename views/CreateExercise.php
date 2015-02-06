
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>CreateExercise</title>
		<link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
	<body onload="check()">
		<script>
		function check()
		{
		
		<?php
		
		
		if(isset($_GET['ms']))
			{
		?>
				alert('Multiple Choice Saved');
		<?php
				
			}
			if(isset($_GET['ts']))
			{
		?>	
				alert('True or False Saved');
		<?php 
			}
			
			if(isset($_GET['mts']))
			{
			
		?>	
				alert('Matching Type Saved');
		<?php 
			}
			
			if(isset($_GET['fibs']))
			{
		?>		
			alert('Fill in the Blanks Saved');
			
		<?php 
			}
		
			if (isset($_GET['rm']))
			{
		?>
				alert('Multiple Choice Discarded!');
		<?php		
			}
		?>
		}
		</script>
		<div class="exercise-container">
			<div class="row">
				<div class="col-md-12 col-md-12">
															
						<div class="panel-body text-center "> 
							<div class="btn-group text-center" data-toggle="buttons-radio">
							  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=trce&cc=mic'"><span class="glyphicon glyphicon-edit"></span>Multiple Choice</button>
							  
							  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=trce&cc=te'"><span class="glyphicon glyphicon-edit"></span>True or False</button>
							  
							  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=trce&cc=me'"><span class="glyphicon glyphicon-edit"></span>Matching Type</button>
							  
							  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss&tr=trce&cc=fs'"><span class="glyphicon glyphicon-edit"></span>Fill in the blank</button>

							  <button type="button" class="btn btn-primary onlineExerMenu" onclick="window.location.href='index.php?r=lss'"><span class="glyphicon glyphicon-log-out"></span>Go Back</button>
							</div>
						</div>
				</div>		
			</div>
			<?php
				
				if (isset($_GET['cc']))
				{
					if($_GET['cc']=="mic")
					{
						
			?>
			<div class="center-exercise">
					<form method="post" action="" role="form">
						
							<label>Exercise Name:</label>
							<br/>
							<input placeholder="Create Exercise Name" name="exerciseName" class="exerciseName" type="text" 
							value="<?php if(isset($_SESSION['exerciseName'])) {echo $_SESSION['exerciseName'];} ?>" <?php if(isset($_GET['nq'])){ ?> readonly="true" <?php } ?>/> 
							<br/>
							<br/>
							<br/>
							
							<label>Question </label>
							<?php 
							if(isset($_SESSION['question_no'])){echo $_SESSION['question_no'];}
							?>:
							<br/>
							<input placeholder="Question" name="question" class="questionModel" type="text" />
							<br/>
							<br/>
							<br/>
						<label>Choices:</label>
						<?php 
						$rows=4;
						$counter=0;
						while($counter<4)
						{
						?>
							<br/>
							<input placeholder="Choices" name="choices[]" class="choicesModel" type="text" />
							<br/>
							<br/>
						
						<?php 
						$counter++;
						}
						?>
							<br/>
							<label>Correct Answer:
							<br/>
							<input placeholder="Correct Answer" name="answer" class="correctModel" type="text" /></label>
							<br/>
							<div class="multi-holder">
							
							<button type="submit" class="btn btn-fresh text-uppercase" formaction="index.php?r=lss&tr=ce&cc=mic&n">Add Question +</button>
						<?php
						if(isset($_GET['nq']))
						{
						?>
							<button type="submit" class="btn btn-sky text-uppercase" formaction="index.php?r=lss&tr=ce&cc=mic&s">Save Exercise</button>
							<button type="submit" class="btn btn-danger text-uppercase" formaction="index.php?r=lss&tr=ce&cc=mic&x">Discard Exercise</button>
						<?php
						}
						?>
						</div>	
					</form>	
			</div>
			
			<?php 
					}
				
				if($_GET['cc']=="te")
					{			
			
			?>
			
			<div class="center-exercise">
						
						<form method="post" action="" role="form">
						
							<label>Exercise Name:</label>
							<br/>
							<input placeholder="Create Exercise Name" name="exerciseName" class="exerciseName" type="text" 
							value="<?php if(isset($_SESSION['exerciseName'])){echo $_SESSION['exerciseName'];} ?>" <?php if(isset($_GET['nq'])){ ?> readonly="true" <?php } ?>/> 
							<br/>
							<br/>
							<br/>
							
							<label>Question </label>
							<?php 
							if(isset($_SESSION['question_no'])) {echo $_SESSION['question_no'];}
							?>:
							<br/>
							<input placeholder="Question" name="question" class="questionModel" type="text" />
							<br/>
							<br/>
							<br/>
						<label>Choices:</label>
						<?php 
						$rows=2;
						$counter=0;
						while($counter<2)
						{
							if($counter==0)
							{
								$value="true";
							}
							else
							{
								$value="false";
							}

						?>
							<br/>
							<input placeholder="Choices" name="choices[]" class="choicesModel" type="text" readonly="true" value="<?php echo $value; ?>" />
							<br/>
							<br/>
						
						<?php 
						$counter++;
						}
						?>
							<br/>
							<label>Correct Answer:
							<br/>
							<input placeholder="Correct Answer" name="answer" class="correctModel" type="text" /></label>
							<br/>
							<div class="multi-holder">
						
							<button type="submit" class="btn btn-fresh text-uppercase" formaction="index.php?r=lss&tr=ce&cc=te&n">Add Question +</button>
						<?php
						if(isset($_GET['nq']))
						{
						?>
							<button type="submit" class="btn btn-sky text-uppercase" formaction="index.php?r=lss&tr=ce&cc=te&s">Save Exercise</button>
							<button type="submit" class="btn btn-danger text-uppercase" formaction="index.php?r=lss&tr=ce&cc=te&x">Discard Exercise</button>
						<?php
						}
						?>
						</div>	
					</form>		
						
			</div>
			
			<?php
					}
					
				if($_GET['cc']=="me")
					{			
			
			?>
			
			<div class="center-exercise">
						
						<form method="post" action="" role="form">
						
							<label>Exercise Name:</label>
							<br/>
							<input placeholder="Create Exercise Name" name="exerciseName" class="exerciseName" type="text" 
							value="<?php if(isset($_SESSION['exerciseName'])){echo $_SESSION['exerciseName'];} ?>" <?php if(isset($_GET['nq'])){ ?> readonly="true" <?php } ?>/> 
							<br/>
							<br/>
							<br/>
							
							<label>Question </label>
							<?php 
							if(isset($_SESSION['question_no'])){echo $_SESSION['question_no'];}
							?>:
							<br/>
							<input placeholder="Question" name="question" class="questionModel" type="text" />
							<br/>
							<br/>
							<br/>
						<label>Choices:</label>
						<?php 
						$rows=1;
						$counter=0;
						while($counter<1)
						{
						?>
							<br/>
							<input placeholder="Choices" name="choices[]" class="choicesModel" type="text" />
							<br/>
							<br/>
						
						<?php 
						$counter++;
						}
						?>
							<br/>
							<label>Correct Answer:
							<br/>
							<input placeholder="Correct Answer" name="answer" class="correctModel" type="text" /></label>
							<br/>
							<div class="multi-holder">
						
							<button type="submit" class="btn btn-fresh text-uppercase" formaction="index.php?r=lss&tr=ce&cc=me&n">Add Question +</button>
						<?php
						if(isset($_GET['nq']))
						{
						?>
							<button type="submit" class="btn btn-sky text-uppercase" formaction="index.php?r=lss&tr=ce&cc=me&s">Save Exercise</button>
							<button type="submit" class="btn btn-danger text-uppercase" formaction="index.php?r=lss&tr=ce&cc=me&x">Discard Exercise</button>
						<?php
						}
						?>
						</div>	
					</form>					
						
			</div>
			
			<?php
					}
				if($_GET['cc']=="fs")
					{			
			
			?>
			
			<div class="center-exercise">
						
						<form method="post" action="" role="form">
						
							<label>Exercise Name:</label>
							<br/>
							<input placeholder="Create Exercise Name" name="exerciseName" class="exerciseName" type="text" 
							value="<?php if(isset($_SESSION['exerciseName'])){echo $_SESSION['exerciseName'];} ?>" <?php if(isset($_GET['nq'])){ ?> readonly="true" <?php } ?>/> 
							<br/>
							<br/>
							<br/>
							
							<label>Question </label>
							<?php 
							if(isset($_SESSION['question_no'])){echo $_SESSION['question_no'];}
							?>:
							<br/>
							<input placeholder="Question" name="question" class="questionModel" type="text" />
							<br/>
							<br/>
							<br/>
						<label>Choices:</label>
						<?php 
						$rows=1;
						$counter=0;
						while($counter<1)
						{
						?>
							<br/>
							<input placeholder="Choices" name="choices[]" class="choicesModel" type="text" />
							<br/>
							<br/>
						
						<?php 
						$counter++;
						}
						?>
							<br/>
							<label>Correct Answer:
							<br/>
							<input placeholder="Correct Answer" name="answer" class="correctModel" type="text" /></label>
							<br/>
							<div class="multi-holder">
						
							<button type="submit" class="btn btn-fresh text-uppercase" formaction="index.php?r=lss&tr=ce&cc=fs&n">Add Question +</button>
						<?php
						if(isset($_GET['nq']))
						{
						?>
							<button type="submit" class="btn btn-sky text-uppercase" formaction="index.php?r=lss&tr=ce&cc=fs&s">Save Exercise</button>
							<button type="submit" class="btn btn-danger text-uppercase" formaction="index.php?r=lss&tr=ce&cc=fs&x">Discard Exercise</button>
						<?php
						}
						?>
						</div>	
					</form>				
						
			</div>
		
		<?php
				}
				
			}
		?>
		</div>
		
		
	</body>
</html>