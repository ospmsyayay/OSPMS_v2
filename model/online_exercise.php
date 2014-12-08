<!--@author Darryl-->
  <!--@copyright 2014-->
<?php


function create_exercise($exerciseName,$desc,$date_created,$question_date_created)
{

	include "config/conn.php";

	$typeID="";
	$selectTypeID="Select typeID from ol_exercise_type where type_desc LIKE'$desc%'";
	$getTypeID=mysqli_query($cxn,$selectTypeID);
	$row = mysqli_fetch_row($getTypeID);
	$typeID = $row[0];

	$sql="INSERT INTO create_ol_exercise
		VALUES('0','".$typeID."','".$exerciseName."','".$date_created."')";
						
	$create_exercise_inserted= mysqli_query($cxn,$sql);

	
	$exerciseId="";
	if($create_exercise_inserted)
	{
		$selectExerciseId="select exerciseID from create_ol_exercise where typeID = '".$typeID."' AND exerciseName='".$exerciseName."' AND date_created='".$date_created."'";
		$getExerciseId=mysqli_query($cxn,$selectExerciseId);
		$row = mysqli_fetch_row($getExerciseId);
		$exerciseId = $row[0];
	}

	
	$update_create_questions="UPDATE create_questions SET exerciseID='".$exerciseId."' WHERE date_created='".$question_date_created."'";
	$update_successful=mysqli_query($cxn,$update_create_questions);
	
	return $update_successful;
 	

}


function create_questions($question,$answer,$question_date_created)
{

include "config/conn.php";
$questionNo="";

$sql="INSERT INTO create_questions
		VALUES('0',NULL,'".$question."','".$answer."','".$question_date_created."')";
					
	$question_inserted= mysqli_query($cxn,$sql);

	if($question_inserted)
	{
		$selectQuestionNo="select questionNo from create_questions where
		oe_question='".$question."' and oe_correct='".$answer."' and '".$question_date_created."'";
		$getQuestionNo=mysqli_query($cxn,$selectQuestionNo);
		$row = mysqli_fetch_row($getQuestionNo);
		$questionNo = $row[0];
	}
	
	return $questionNo;

}

function create_choices( $questionNo,$choices,$question_date_created)
{
include "config/conn.php";

$sql="INSERT INTO oe_choices  VALUES('".$questionNo."','".$choices."','".$question_date_created."')";
	
$choices_created = mysqli_query($cxn,$sql);
	
	return $choices_created;  	

}

function discard_questions($question_date_created)
{

include "config/conn.php";

$questions_discarded="";
$discard_choices="DELETE FROM oe_choices where date_created='".$question_date_created."'";
$choices_discarded= mysqli_query($cxn,$discard_choices);

if($choices_discarded)
{
	$discard_questions="DELETE FROM create_questions where date_created='".$question_date_created."'";
	$questions_discarded= mysqli_query($cxn,$discard_questions);
}

	return $questions_discarded;

}

?>	