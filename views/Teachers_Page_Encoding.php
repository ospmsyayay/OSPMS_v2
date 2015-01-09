 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
        <!--<link rel="stylesheet" type="text/css" href="views/bootstrap.min.css"/>-->
		<link href="views/bootstrap.css" rel="stylesheet"/>
        <link href="views/exDesign.css" rel="stylesheet"/>
        <link href="views/encoding.css" rel="stylesheet"/>
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
						
						<div id="encoding-container">
                         
							 <div id="encoding-page-title">Encoding Page </div>
                    						
                                            <div class="encoding-page-space">
                                                <div class="encoding-workspace">
                                                    <?php
                                                        include('config/conn.php');
                                                        include('model/utility.php');

                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                                        {
                                                            $grading_id=createGradingId();
                                                            $student_lrn = $_POST['studentName'];
                                                            $class_rec_no =$_POST['sectionName'];
                                                            $grading_period = $_POST['gradingPeriod'];
                                                            $week_number = $_POST['weekNumber'];
                                                            $knowledge = $_POST['knowledge'];
                                                            $processskills = $_POST['processskills'];
                                                            $understanding = $_POST['understanding'];
                                                            $performanceproducts = $_POST['performanceproducts'];

                                                            /*$kQuizzes = $_POST['k-quizzes'];
                                                            $kRecitation = $_POST['k-recitation'];
                                                            $kRawScore = $_POST['k-raw-score'];
                                                            $psQuizzes = $_POST['ps-quizzes'];
                                                            $psRecitation = $_POST['ps-recitation'];
                                                            $psRawScore = $_POST['ps-raw-score'];
                                                            $uQuizzes = $_POST['u-quizzes'];
                                                            $uRecitation = $_POST['u-recitation'];
                                                            $uOpenEndedQ = $_POST['u-open-ended-q'];
                                                            $ppGroupWork = $_POST['pp-group-work'];
                                                            $ppProject = $_POST['pp-project'];
                                                            $ppHomework = $_POST['pp-homework'];
                                                            $ppOthers = $_POST['pp-others'];*/

                                                            /* $tentativeGrade = (  (($kQuizzes + $kRecitation + $kRawScore) / 3) * 0.15) + (   (($psQuizzes + $psRecitation + $psRawScore) / 3) * 0.25) + ((($uQuizzes + $uRecitation + $uOpenEndedQ) / 3) * 0.30) + ((($ppGroupWork + $ppProject + $ppHomework + $ppOthers) / 4) * 0.30);*/
                                                            
                                                            $tentativeGrade = ($knowledge * 0.15) + ($processskills * 0.25) + ($understanding * 0.30) + ($performanceproducts * 0.30);
                                                            $legend=mark_proficiency($tentativeGrade);

                                                           /* $query = mysqli_query($cxn, "INSERT INTO grading (student_lrn, grading_period, week_number, k_quizzes, k_recitation, k_raw_score, ps_quizzes, ps_recitation, ps_raw_score, u_quizzes, u_recitation, u_open_ended_q, pp_group_work, pp_project, pp_homework, pp_others, tentative_grade) 
                                                                VALUES ('$sn', '$gp', '$wn', $kQuizzes, $kRecitation, $kRawScore, $psQuizzes, $psRecitation, $psRawScore, $uQuizzes, $uRecitation, $uOpenEndedQ, $ppGroupWork, $ppProject, $ppHomework, $ppOthers, $tentativeGrade)") or die('Unable to connect to Database.<br>' . mysqli_error($cxn));*/


                                                            $query = mysqli_query($cxn, "INSERT INTO student_rating (grading_id, student_lrn, class_rec_no, grading_period, week_number, knowledge, processskills, understanding, performanceproducts, tentative_grade, legend) 
                                                            VALUES ('$grading_id', '$student_lrn', '$class_rec_no', '$grading_period', '$week_number', $knowledge, $processskills, $understanding, $performanceproducts, $tentativeGrade, '$legend')") or die('Unable to connect to Database.<br>'. mysqli_error($cxn));


                                                            if($query) {
                                                                echo '<script>alert("Successfully uploaded student\'s grade.");</script>';
                                                            } else {
                                                                echo '<script>alert("Failed to upload student\'s grade.");</script>';
                                                            }
                                                        }
                                                    ?>
                                                    <form class="form-horizontal" method="post" role="form">
                                                        <div class="form-group">
                                                            <label for="student-name" class="title">Section Name:</label>
                                                            <select class="form-control" id="section-name" name="sectionName" style="margin-top: 15px; width: 250px;" required="required" onclick="get_section(this);" >
                                                                <option value="" selected disabled>Select Section</option>
                                                               
                                                            </select>
                                                        </div>
                                                         <div class="form-group">

                                                            <label for="student-name" class="title">Student Name:</label>
                                                            <select class="form-control" id="student-name" name="studentName" style="margin-top: 15px; width: 250px;" required="required">
                                                                <option value="" selected disabled>Select Student Name</option>
                                                                <?php
                                                                   /* include('config/conn.php');

                                                                    $query = mysqli_query($cxn, "SELECT * FROM student INNER JOIN registration ON registration.reg_id=student.student_lrn") or die('Cannot connect to Database.');

                                                                    while($row = mysqli_fetch_array($query)) {
                                                                        echo '<option value="' . $row['student_lrn'] . '">' . $row['reg_lname'] . ', ' . $row['reg_fname'] . ' ' . substr($row['reg_mname'], 0, 1) . '.</option>';
                                                                    }*/
                                                                ?> 
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="grading-period" class="title">Grading Period:</label>
                                                            <select class="form-control" id="grading-period" name="gradingPeriod" style="margin-top: 15px; width: 250px;" required="required">
                                                                <option value="" selected disabled>Select Grading Period</option>
                                                                <option value="1st">1st Grading Period</option>
                                                                <option value="2nd">2nd Grading Period</option>
                                                                <option value="3rd">3rd Grading Period</option>
                                                                <option value="4th">4th Grading Period</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="week-number" class="title">Week Number:</label>
                                                            <input type="number" class="form-control" id="week-number" name="weekNumber" style="margin-top: 15px; width: 250px;" min="1" max="7" placeholder="Choose Week Number" required="required">
                                                        </div>
                                                       
                                                        <h1 class="text-center">Knowledge</h1>
                                                         <div class="form-group">
                                                           <label for="knowledge" class="title">K Area: </label>
                                                           <input type="text" name="knowledge" class="form-control" placeholder="Enter Knowledge Rating" required="required">
                                                           <div id="addon">%</div>
                                                         </div>  
                                                        <!-- <div class="form-group">
                                                            <label for="k-quizzes" class="title">Quizzes:</label>
                                                            <input type="text" name="k-quizzes" class="form-control" placeholder="Enter Quizzes" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="k-recitation" class="title">Recitation:</label>
                                                            <input type="text" name="k-recitation" class="form-control" placeholder="Enter Recitation" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="k-raw-score" class="title">P.T/Raw Score:</label>
                                                            <input type="text" name="k-raw-score" class="form-control" placeholder="Enter P.T/Raw Score" required="required">
                                                            <div id="addon">%</div>
                                                        </div> -->

                                                        <h1 class="text-center">Process/Skills</h1>
                                                         <div class="form-group">
                                                           <label for="processskills" class="title">PS Area: </label>
                                                           <input type="text" name="processskills" class="form-control" placeholder="Enter Process/Skills Rating" required="required">
                                                           <div id="addon">%</div>
                                                         </div>  
                                                        <!-- <div class="form-group">
                                                            <label for="ps-quizzes" class="title">Quizzes:</label>
                                                            <input type="text" name="ps-quizzes" class="form-control" placeholder="Enter Quizzes" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ps-recitation" class="title">Recitation:</label>
                                                            <input type="text" name="ps-recitation" class="form-control" placeholder="Enter Recitation" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ps-raw-score" class="title">P.T/Raw Score:</label>
                                                            <input type="text" name="ps-raw-score" class="form-control" placeholder="Enter P.T/Raw Score" required="required">
                                                            <div id="addon">%</div>
                                                        </div> -->
                                                        <h1 class="text-center">Understanding</h1>
                                                         <div class="form-group">
                                                           <label for="understanding" class="title">U Area: </label>
                                                           <input type="text" name="understanding" class="form-control" placeholder="Enter Understanding Rating" required="required">
                                                           <div id="addon">%</div>
                                                         </div>  
                                                       <!--  <div class="form-group">
                                                            <label for="u-quizzes" class="title">Quizzes:</label>
                                                            <input type="text" name="u-quizzes" class="form-control" placeholder="Enter Quizzes" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="u-recitation" class="title">Recitation:</label>
                                                            <input type="text" name="u-recitation" class="form-control" placeholder="Enter Recitation" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="u-open-ended-q" class="title">Open/Ended Q.:</label>
                                                            <input type="text" name="u-open-ended-q" class="form-control" placeholder="Enter Open/Ended Q." required="required">
                                                            <div id="addon">%</div>
                                                        </div> -->
                                                        <h1 class="text-center">Performance/Products</h1>
                                                         <div class="form-group">
                                                           <label for="performanceproducts" class="title">PP Area: </label>
                                                           <input type="text" name="performanceproducts" class="form-control" placeholder="Enter Performance/Products Rating" required="required">
                                                           <div id="addon">%</div>
                                                         </div>  
                                                       <!--  <div class="form-group">
                                                            <label for="pp-group-work" class="title">Group Work:</label>
                                                            <input type="text" name="pp-group-work" class="form-control" placeholder="Enter Group Work" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pp-project" class="title">Project:</label>
                                                            <input type="text" name="pp-project" class="form-control" placeholder="Enter Project" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pp-homework" class="title">Homework:</label>
                                                            <input type="text" name="pp-homework" class="form-control" placeholder="Enter Homework" required="required">
                                                            <div id="addon">%</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pp-others" class="title">Others:</label>
                                                            <input type="text" name="pp-others" class="form-control" placeholder="Enter Others" required="required">
                                                            <div id="addon">%</div>
                                                        </div> -->
                                                        <div class="home_btn">
                                                            <button type="submit" class="btn btn-fresh text-uppercase">Submit</button>
                                                            <button type="reset" class="btn btn-sky text-uppercase">Clear</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
											
											<!--<div class="encoding-page-space">
												<img src="views/res/" class="img-rounded shadow process-img" />
												
											</div>-->
											
										
							
						</div><!--encoding-container-->
							
					</div><!--right-column-->
			</div><!--right-wrapper-->	
		</div><!--container-->
	</div><!--content-->
</div><!--viewport-->

  <script src="views/jquery.min.js"></script>
        <script src="views/transition.js"></script>
        <script src="views/jquery.min.js"></script>
        <script src="views/bootstrap.min.js"></script>
		<script src="views/tab.js"></script>
		
		<script src="views/modal.js"></script>
		<script src="views/tooltip.js"></script>
		<script src="views/popover.js"></script>
        <script src="views/scripts.js"></script>
		
     <!-- JavaScript Test -->
<script>
$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
})
</script>
<script>

                function getSubjectId(menu) 
                {
                    
                    var subject=menu.id;
                    
                    
                    $.ajax({
             
                        url: 'views/get_sectionlist_encoding.php',
                        type: 'GET',
                        data: {
                            subject:subject
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                           /* alert(JSON.stringify(response['sectionlist_bySubject']));*/
                            displaySection(response['sectionlist_bySubject']);

                             /* alert(JSON.stringify(response['student_list_bySubject']));*/
                                
                               /* displayStudents(response['student_list_bySubject']);*/

                             
                        }


                        });

                 }


                  function getGradeId(menu) 
                {
                    
                    var grade=menu.id;
                    
                    
                    
                    $.ajax({
             
                        url: 'views/get_sectionlist_encoding.php',
                        type: 'GET',
                        data: {
                            grade:grade
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                            /*alert(JSON.stringify(response['sectionlist_byGrade']));*/

                            displaySection(response['sectionlist_byGrade']);

                             /* alert(JSON.stringify(response['student_list_byGrade']));
                                */
                               /* displayStudents(response['student_list_byGrade']);*/
                             
                        }


                        });

                 }

                   function getSectionId(menu) 
                {
                    
                    var section=menu.id;
                    
                    
                    $.ajax({
             
                        url: 'views/get_sectionlist_encoding.php',
                        type: 'GET',
                        data: {
                            section:section
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                            /*alert(JSON.stringify(response['sectionlist_bySection']));*/

                            displaySection(response['sectionlist_bySection']);

                            /*  alert(JSON.stringify(response['student_list_bySection']));*/
                                
                                /*displayStudents(response['student_list_bySection']);*/
                             
                        }


                        });

                 }




                  function displaySection(data) 
                {
                    $("#section-name").empty();

                        for (var i = 0; i < data.length; i++) 
                        {

                                drawSection(data[i]);
                      
                        }

                }

                function drawSection(rowData) 
                {


                    if(rowData.class_rec_no!=null && rowData.level_description!=null && rowData.sectionNo!=null && rowData.section_name!=null)
                    {   
                     
                         var display = $('<option value="' + rowData.class_rec_no + '">' + rowData.level_description + '-' + rowData.sectionNo + ' ' + rowData.section_name + '</option>');
                         $("#section-name").append(display); 
                    }
                    

                }

                function get_section(select)
                {

                     var selected_section = select.value;
                /*
                        alert(selected_section);*/


                    $.ajax({
             
                        url: 'views/get_studentlist_encoding.php',
                        type: 'GET',
                        data: {
                            selected_section:selected_section
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
    

                              /*alert(JSON.stringify(response['student_list']));*/
                                
                                displayStudents(response['student_list']);
                             
                        }

                         });



                
                }
               

                function displayStudents(data) 
                {
                    $("#student-name").empty();

                        for (var i = 0; i < data.length; i++) 
                        {

                                drawStudentRow(data[i]);
                      
                        }

                }

                function drawStudentRow(rowData) 
                {


                    if(rowData.reg_lname!=null && rowData.reg_fname!=null && rowData.reg_mname!=null && rowData.student_lrn!=null)
                    {   
                          
                         var display = $('<option value="' + rowData.student_lrn + '">' + rowData.reg_lname + ', ' + rowData.reg_fname + ' ' + rowData.reg_mname + '</option>');
                         $("#student-name").append(display); 
                    }
                    

                }

                    
               

               
        </script>       		
	</body>
    
    
</html>