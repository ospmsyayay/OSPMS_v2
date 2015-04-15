 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Teacher Page Encoding Spreadsheet</title>
        <link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
    
	<body onload="check()">
     <script>
        function check()
        {
        <?php
            if(isset($_GET['ex']))
            {   
        ?>      
            alert('File error');
            window.location.href='index.php?r=lss&tr=tres';
        <?php 
            }
            if(isset($_GET['er']))
            {
        ?>
            alert('There was an error reading the spreadsheet');
             window.location.href='index.php?r=lss&tr=tres';
        <?php        
            }    
            if(isset($_GET['if']))
            {
        ?>
            alert('invalid file');
            window.location.href='index.php?r=lss&tr=tres';
        <?php
            }

           if (isset($_GET['excel']))
            {
        ?>
            alert('Uploaded Excel');
             window.location.href='index.php?r=lss&tr=tres';
        <?php   
            }

        ?>  

        }
     </script>   
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
                    <div class="row"><!--//row for encoding-container -->
                        <div class="col-md-7" id="encoding-container">
                            <div class="row"><!--//row for encoding-title -->
                                 <div class="col-md-12" id="encoding-page-title">Encoding Page Spreadsheet</div>
                            </div><!--//row for encoding-title -->    

                                                         <div class="row"><!--//row for encoding-space -->
                                <div class="col-md-12 encoding-page-space">
                                    <div class="row"><!--//row for encoding-workspace -->
                                        <div class="col-md-12 encoding-workspace">
                                            
                                                <form class="form-horizontal" method="post" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="grading-period" class="col-md-3 control-label">Grading Period</label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" id="sheet-grading-period" name="sheet-gradingPeriod"  required="required">
                                                                <option value="" selected disabled>Grading Period</option>
                                                                <option value="1st">1st Grading Period</option>
                                                                <option value="2nd">2nd Grading Period</option>
                                                                <option value="3rd">3rd Grading Period</option>
                                                                <option value="4th">4th Grading Period</option>
                                                            </select>
                                                        </div>

                                                        <label for="week-number" class="col-md-2 control-label">Week No.</label>
                                                        <div class="col-md-2">
                                                            <select class="form-control" id="sheet-week-number" name="sheet-weekNumber"  placeholder="Choose Week Number" required="required">
                                                                <option value="" selected disabled></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                            </select>
                                                        </div>    

                                                    </div>
            
                                                    <div class="form-group">
                                                        <label for="section-name" class="col-md-3 control-label">Section Name</label>
                                                        <div class="col-md-5">
                                                            <select class="form-control" id="sheet-section-name" name="sheet-sectionName"  required="required">
                                                                <option value="" selected disabled>Select Section</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="spreadsheet" class="col-md-3 control-label">Class Record</label>
                                                        <div class="col-md-5">
                                                            <input type="file" name="spreadsheet" id="spreadsheet" accept="*"/>
                                                        </div>
                                                    </div>    
                                                     
                                                    <div class="form-group">
                                                        <div class="col-md-4 col-md-offset-4">
                                                            <button type="reset" class="btn btn-sky text-uppercase">Clear</button>
                                                            <button type="submit" class="btn btn-fresh text-uppercase">Submit</button>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                                <?php
                                                if(!empty($spreadsheet))
                                                {
                                                   
            
                                                    print_r($sheet_result_gather);
                                                    
                                                
                                                      /*  echo '<div class="row"><!--//row -->s
                                                                    <div class="col-md-12 progress-data table-responsive">
                                                                        <table class="table table-bordered table-hover table-condensed">
                                                                            
                                                                            <tbody>';

                                                                        foreach ($spreadsheet as $row) 
                                                                        { 
                                                                            foreach($row as $rowArray)
                                                                            {
                                                                                echo '<tr>';
                                                                                foreach($rowArray as $values)
                                                                                 {
                                                                                    echo '<td>'.$values.'<td>';
                                                                                 }
                                                                                echo '</tr>';   
                                                                            }      
                                                                           
                                                                        } 

                                                        echo                '</tbody>
                                                                        </table>
                                                                    </div>
                                                                </div><!--//row -->';*/
                                                    
                                                }    
                                                    
                                                ?>

                                        </div><!--encoding workspace-->
                                    </div><!--//row for encoding-workspace --> 
                                </div><!--encoding space-->
                            </div><!--//row for encoding-space --> 
                          
                        </div><!--encoding-container-->
                    </div><!--//row for encoding-container -->   
                </div>
                <!--End of mid content-->   
        </div><!--row-->
    </div><!--container-fluid-->
<!--End of main --> 


						




<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
<script src="views/js/scripts.js"></script>     

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
             
                        url: 'views/ajax/get_sectionlist_encoding.php',
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
             
                        url: 'views/ajax/get_sectionlist_encoding.php',
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
             
                        url: 'views/ajax/get_sectionlist_encoding.php',
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
                    $("#sheet-section-name").empty();

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
                         $("#sheet-section-name").append(display); 
                    }
                    

                }
               
        </script>       		
	</body>
    
    
</html>