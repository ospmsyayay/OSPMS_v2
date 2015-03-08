 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Teacher Page Encoding</title>
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
            
        <?php 
            }
            if(isset($_GET['er']))
            {
        ?>
            alert('There was an error reading the spreadsheet');
        <?php        
            }    
            if(isset($_GET['if']))
            {
        ?>
            alert('invalid file');
        <?php
            }

           if (isset($_GET['excel']))
            {
        ?>
                alert('Uploaded Excel');
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
                <div class="left-content col-md-3">
                    <?php include "views/parts/side-bar-teacher.php";?>
                </div>
                <!--End of left content-->

                <!--Start of mid content-->
                <div class="main-content col-md-9">
                    <div class="row"><!--//row for encoding-container -->
                        <div class="col-md-12 content" id="encoding-container">
                           
                            <div class="row">
                                <div class="panel panel-default no-margin-bottom no-border">
                                  <div class="panel-heading" id="encoding-page-title">
                                    <div class="has-inline"><i class="fa fa-database"></i> Encode</div>
                                  </div>
                                </div>
                            </div>    

                             <div class="row"><!--//row for encoding-space -->
                                <div class="col-md-12 encoding-page-space">
                                    <div class="row"><!--//row for encoding-workspace -->
                                        <div class="col-md-12 encoding-workspace has-padding-top">
                                            

                                            <form class="form-horizontal" method="post" id="encode" role="form">
                                                <div class="form-group">
                                                    <label for="grading-period" class="col-md-2 control-label">Grading Period</label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="grading-period" name="gradingPeriod"  required="required">
                                                            <option value="" selected disabled>Grading Period</option>
                                                        </select>
                                                    </div>

                                                    <label for="week-number" class="col-md-2 control-label">Week No.</label>
                                                    <div class="col-md-1">
                                                        <select class="form-control" id="week-number" name="weekNumber"  placeholder="Choose Week Number" required="required">
                                                            <option value="" selected disabled></option>
                                                        </select>
                                                    </div>   

                                                </div>

                                            <!-- <a href="index.php?r=lss&tr=tres">Go to Spreadsheet</a> -->

                                            </form>
                                            <div class="form-group">
                                                 <label class="col-md-12 control-label">Students</label>
                                            </div>
                                            <div class="col-md-12 table-responsive result-table no-padding">
                                                
                                                <table class="table table-bordered table-hover table-condensed table-striped-orange content">
                                                    <thead>
                                                        <tr class="info">
                                                            <th>LRN</th>
                                                            <th>Last Name</th>
                                                            <th>First Name</th>
                                                            <th>Middle Name</th>
                                                        </tr>
                                                    <thead>
                                                    <tbody id="scan-student-box">
                                                      
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div><!--encoding workspace-->
                                    </div><!--//row for encoding-workspace --> 
                                </div><!--encoding space-->
                            </div><!--//row for encoding-space -->  
                          
                        </div><!--encoding-container-->
                    </div><!--//row for encoding-container -->   
                </div>

                            <!--Modal-->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".student-modal-lg">Large modal</button> -->
            <div class="modal fade student-modal-lg" tabindex="-1" role="dialog" aria-labelledby="teacherEncoding" aria-hidden="true">
              <div class="modal-dialog modal-dialog-encode modal-lg">
                <div class="modal-content modal-content-encode">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <!--Start of main -->
                        <div class="main container-fluid teacher-encoding">
                            <div class="row">

                                <!--Start of mid content-->
                                    <div class="col-md-12 teacher-encoding-main-content"></div>
                                <!--End of mid content-->
                            
                            </div><!--row-->
                        </div><!--container-fluid-->
                        <!--End of main --> 


                </div>
              </div>
            </div>
            <!--Modal-->

                <!--End of mid content-->   
        </div><!--row-->
    </div><!--container-fluid-->
<!--End of main --> 


<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
  
<script>
$(function () 
{
    var class_rec_no;
    var grade;
    var sectionno;
    var section;
    var subject;
    var gradingPeriod;
    var weekNumber;

            $('.side-menu').on('click', function () 
            {
                $('.side-menu').removeClass('teacher-side-menu-click');
                $(this).addClass('teacher-side-menu-click');

                 grade=$(this).attr('grade');
                 sectionno=$(this).attr('sectionno');
                 section=$(this).attr('section');
                 subject=$(this).attr('subject');

                $('#encoding-page-title').empty();
                var display = $('<div class="has-inline"><i class="fa fa-database"></i> '+sectionno+'-'+section+': '+subject+' - Encode</div>');
                $('#encoding-page-title').append(display);

                //pass class_rec_no
                class_rec_no=$(this).attr('side-menu-id');
               /* alert(class_rec_no);*/

               $('.encoding-workspace').empty();
               var workspace=$('<form class="form-horizontal" method="post" id="encode" role="form">'+
                                    '<div class="form-group">'+
                                        '<label for="grading-period" class="col-md-2 control-label">Grading Period</label>'+
                                        '<div class="col-md-3">'+
                                            '<select class="form-control" id="grading-period" name="gradingPeriod"  required="required">'+
                                                '<option value="" selected disabled>Grading Period</option>'+
                                                '<option value="1st">1st Grading Period</option>'+
                                                '<option value="2nd">2nd Grading Period</option>'+
                                                '<option value="3rd">3rd Grading Period</option>'+
                                                '<option value="4th">4th Grading Period</option>'+
                                            '</select>'+
                                        '</div>'+

                                        '<label for="week-number" class="col-md-2 control-label">Week No.</label>'+
                                        '<div class="col-md-2">'+
                                            '<select class="form-control" id="week-number" name="weekNumber"  placeholder="Choose Week Number" required="required" style="width:70px;">'+
                                                '<option value="" selected disabled></option>'+
                                                '<option value="1">1</option>'+
                                                '<option value="2">2</option>'+
                                                '<option value="3">3</option>'+
                                                '<option value="4">4</option>'+
                                                '<option value="5">5</option>'+
                                                '<option value="6">6</option>'+
                                                '<option value="7">7</option>'+
                                                '<option value="8">8</option>'+
                                            '</select>'+
                                        '</div>'+   

                                    '</div>'+


                                '<!-- <a href="index.php?r=lss&tr=tres">Go to Spreadsheet</a> -->'+
                                '</form>'+
                                '<div class="form-group">'+
                                     '<label class="col-md-12 control-label">Students-*Click Row</label>'+
                                '</div>'+
                                '<div class="col-md-12 table-responsive result-table no-padding">'+
                                    '<table class="table table-bordered table-hover table-condensed content">'+
                                        '<thead>'+
                                            '<tr class="info">'+
                                                '<th></th>'+
                                                '<th>LRN</th>'+
                                                '<th>Last Name</th>'+
                                                '<th>First Name</th>'+
                                                '<th>Middle Name</th>'+
                                            '</tr>'+
                                        '<thead>'+
                                        '<tbody id="scan-student-box">'+
                                          
                                        '</tbody>'+
                                    '</table>'+
                                '</div>');

                $('.encoding-workspace').append(workspace);


                initEncoding();

            });//end of side menu

            function initEncoding()
            {
                //Get Grading Period and Week Number

                $.ajax({
                    url: 'views/ajax/get_encoding.php?get-grading-period-and-week-no',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data, textStatus, jqXHR)
                    {
                        
                        if(typeof data.error === 'undefined')
                        {
                           
                            /*console.log(JSON.stringify(data.success));*/
                            /*alert(JSON.stringify(data['return']));*/

                            setGradingPeriod(data);
                            setWeekofGrading(data);

                           
                        }
                        else
                        {
                            alert('Error: '+data.error);
                        }   

                        
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        
                            alert('ERROR: ' + textStatus +' '+ errorThrown);
                        
                    },
                    complete: function()
                    {
                        // Completed
                    }
        
                });

    
                getStudentsInit();   
            }

            function setGradingPeriod(data) 
            {
                 

                if(data.grading_period =='1st Grading Period')
                {
                    $('#grading-period option[value=1st]').attr('selected','selected');
                }
                else if (data.grading_period =='2nd Grading Period')
                {
                    $('#grading-period option[value=2nd]').attr('selected','selected');
                } 

                if(data.grading_period =='3rd Grading Period')
                {
                    $('#grading-period option[value=3rd]').attr('selected','selected');
                }
                else if(data.grading_period =='4th Grading Period')
                {
                    $('#grading-period option[value=4th]').attr('selected','selected');
                }

            }

            function setWeekofGrading(data)
            {
                if(data.week_of_grading=='1')
                {
                    $('#week-number option[value=1]').attr('selected','selected');
                }
                else if (data.week_of_grading=='2')
                {
                    $('#week-number option[value=2]').attr('selected','selected');
                } 

                if(data.week_of_grading=='3')
                {
                    $('#week-number option[value=3]').attr('selected','selected');
                }
                else if(data.week_of_grading=='4')
                {
                    $('#week-number option[value=4]').attr('selected','selected');
                }
                else if(data.week_of_grading=='5')
                {
                    $('#week-number option[value=5]').attr('selected','selected');
                }    
                else if(data.week_of_grading=='6')
                {
                    $('#week-number option[value=6]').attr('selected','selected');
                }    
                else if(data.week_of_grading=='7')
                {
                    $('#week-number option[value=7]').attr('selected','selected');
                }   
                else if(data.week_of_grading=='8')
                {
                    $('#week-number option[value=8]').attr('selected','selected');
                }   
            }
  

            function getStudentsInit()
            {

                $.ajax({
                    url: 'views/ajax/get_encoding.php?get-students-init',
                    type: 'GET',
                    data: {
                            class_rec_no:class_rec_no
                        },
                    dataType: 'json',
                    success: function(data, textStatus, jqXHR)
                    {
                        
                        if(typeof data.error === 'undefined')
                        {
                            /*alert(data['grading_period']);
                            alert(data['week_of_grading']);
                            alert(data['class_rec_no']);*/

                            displayStudents(data['student_list']);

                        }
                        else
                        {
                            alert('Error: '+data.error);
                        }   

                        
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        
                            alert('ERROR: ' + textStatus +' '+ errorThrown);
                        
                    },
                    complete: function()
                    {
                        // Completed
                    }
        
                });
            }

            function displayStudents(data) 
            {
                $("#scan-student-box").empty();

                    for (var i = 0; i < data.length; i++) 
                    {

                            drawStudentRow(i+1,data[i]);
                        
                  
                    }

            }

            function drawStudentRow(counter,row) 
            {


                var tr;
                        if(counter%2 != 0)
                        {
                            tr = '<tr id="'+row.student_lrn+'" class="row_select tr-striped-orange">';
                        }
                        else
                        {
                            tr='<tr id="'+row.student_lrn+'" class="row_select">'
                        }

                        var display = $(tr +
                                            '<td><div><img src="views/res/'+row.image+'" class="img-circle center-block" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '<td>'+row.student_lrn+'</td>'+
                                            '<td>'+row.reg_lname+'</td>'+
                                            '<td>'+row.reg_fname+'</td>'+
                                            '<td>'+row.reg_mname+'</td>'+
                                        '</tr>');
                   
                        $("#scan-student-box").append(display); 
                 


            }


            $(document.body).on('click', '.row_select', function()
            {
                var student_lrn=$(this).attr('id');
                gradingPeriod=$("#grading-period").val();
                weekNumber=$("#week-number").val();

                $(this).toggleClass("table-striped-green");
/*                alert(class_rec_no);
                alert(student_lrn);*/
/*                alert(grade);
                alert(sectionno);
                alert(section);
                alert(subject);
                alert(gradingPeriod);
                alert(weekNumber);*/


                $.ajax({
                    url: 'views/ajax/get_encoding.php?set-encode-workspace',
                    type: 'POST',
                    data: {
                            class_rec_no:class_rec_no, student_lrn:student_lrn
                        },
                    dataType: 'json',
                    success: function(data, textStatus, jqXHR)
                    {
                        
                        if(typeof data.error === 'undefined')
                        {
                            /*alert(JSON.stringify(data['first_grading']));
                            alert(JSON.stringify(data['second_grading']));
                            alert(JSON.stringify(data['third_grading']));
                            alert(JSON.stringify(data['fourth_grading']));*/
                            setmodal(grade,sectionno,section,subject,class_rec_no,student_lrn,gradingPeriod,weekNumber);
                            set_first_grading_summary(data['first_grading']);
                            set_second_grading_summary(data['second_grading']);
                            set_third_grading_summary(data['third_grading']);
                            set_fourth_grading_summary(data['fourth_grading']);

                            
                        }
                        else
                        {
                            alert('Error: '+data.error);
                        }   

                        
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        
                            alert('ERROR: ' + textStatus +' '+ errorThrown);
                        
                    },
                    complete: function()
                    {
                        // Completed
                    }
        
                });



                $('.student-modal-lg').modal('show')
            });

            function setmodal(grade,sectionno,section,subject,class_rec_no,student_lrn,gradingPeriod,weekNumber)
            {
                $('.teacher-encoding-main-content').empty();
                var modal_workspace=$('<div class="panel panel-info">'+
                                            '<div class="panel-body">'+

                                                    '<div class="row">'+
                                                        //1st Grading Period
                                                        '<div class="col-md-4 ">'+
                                                            '<div class="progress-period">1st Grading Period</div>'+
                                                        '</div>'+
                                                        //2nd Grading Period
                                                        '<div class="col-md-4 ">'+
                                                            '<div class="progress-period">2nd Grading Period</div>'+
                                                        '</div>'+
                                                    '</div>'+

                                                    '<div class="row">'+
                                                        '<div class="col-md-4 table-responsive">'+ 
                                                            '<table class="table table-bordered table-hover table-striped-orange table-condensed">'+
                                                                    '<thead>'+
                                                                        '<tr>'+
                                                                       '<th><h6>Week No.<h6></th>'+
                                                                       '<th class=""><h6>Knowledge</h6></th>'+
                                                                       '<th class=""><h6>Process/skills</h6></th>'+
                                                                       '<th class=""><h6>Understanding </h6></th>'+
                                                                       '<th class=""><h6>Performance</h6></th>'+
                                                                       
                                                                    '</tr>'+
                                                                    '<thead>'+
                                                                    '<tbody id="first-grading-table">'+
                                                                        
                                                                        
                                                                    '</tbody>'+
                                                            '</table>'+
                                                        '</div>'+

                                                        '<div class="col-md-4 table-responsive">'+ 
                                                            '<table class="table table-bordered table-hover table-striped-orange table-condensed">'+
                                                                    '<thead>'+
                                                                        '<tr>'+
                                                                       '<th><h6>Week No.<h6></th>'+
                                                                       '<th class=""><h6>Knowledge</h6></th>'+
                                                                       '<th class=""><h6>Process/skills</h6></th>'+
                                                                       '<th class=""><h6>Understanding </h6></th>'+
                                                                       '<th class=""><h6>Performance</h6></th>'+
                                                                       
                                                                    '</tr>'+
                                                                    '<thead>'+
                                                                    '<tbody id="second-grading-table">'+
                                                                        
                                                                        
                                                                    '</tbody>'+
                                                            '</table>'+
                                                        '</div>'+

                                                        '<div class="col-md-4">'+
                                                            '<div class="panel panel-info">'+
                                                                '<div class="panel-body">'+
                                                                        '<div class="panel panel-default no-margin-bottom">'+
                                                                          '<div class="panel-heading progress-encode">'+
                                                                            '<div>'+sectionno+'-'+section+':'+subject+' - '+gradingPeriod+' Grading: Week '+weekNumber+'</div>'+
                                                                          '</div>'+
                                                                        '</div>'+

                                                                        '<form class="form-horizontal" method="post" id="encode-assess" role="form">'+
                                                                        '<input type="hidden" name="studentlrn" value="'+student_lrn+'">'+
                                                                        '<input type="hidden" name="class_rec_no" value="'+class_rec_no+'">'+
                                                                        '<input type="hidden" name="gradingPeriod" value="'+gradingPeriod+'">'+
                                                                        '<input type="hidden" name="weekNumber" value="'+weekNumber+'">'+
                                                                         '<div class="form-group content">'+
                                                                           '<label for="knowledge" class="col-md-6 control-label">Knowledge</label>'+
                                                                           '<div class="col-md-3">'+
                                                                                '<select class="form-control" id="knowledge" name="knowledge" required="required" style="width:80px;">'+
                                                                                    '<option value="" selected disabled></option>'+
                                                                                    '<option value="100">100</option>'+
                                                                                    '<option value="99">99</option>'+
                                                                                    '<option value="98">98</option>'+
                                                                                    '<option value="97">97</option>'+
                                                                                    '<option value="96">96</option>'+
                                                                                    '<option value="95">95</option>'+
                                                                                    '<option value="94">94</option>'+
                                                                                    '<option value="93">93</option>'+
                                                                                    '<option value="92">92</option>'+
                                                                                    '<option value="91">91</option>'+
                                                                                    '<option value="90">90</option>'+
                                                                                    '<option value="89">89</option>'+
                                                                                    '<option value="88">88</option>'+
                                                                                    '<option value="87">87</option>'+
                                                                                    '<option value="86">86</option>'+
                                                                                    '<option value="85">85</option>'+
                                                                                    '<option value="84">84</option>'+
                                                                                    '<option value="83">83</option>'+
                                                                                    '<option value="82">82</option>'+
                                                                                    '<option value="81">81</option>'+
                                                                                    '<option value="80">80</option>'+
                                                                                    '<option value="79">79</option>'+
                                                                                    '<option value="78">78</option>'+
                                                                                    '<option value="77">77</option>'+
                                                                                    '<option value="76">76</option>'+
                                                                                    '<option value="75">75</option>'+
                                                                                    '<option value="74">74</option>'+
                                                                                    '<option value="73">73</option>'+
                                                                                    '<option value="72">72</option>'+
                                                                                    '<option value="71">71</option>'+
                                                                                    '<option value="70">70</option>'+
                                                                                    '<option value="69">69</option>'+
                                                                                    '<option value="68">68</option>'+
                                                                                    '<option value="67">67</option>'+
                                                                                    '<option value="66">66</option>'+
                                                                                    '<option value="65">65</option>'+
                                                                                    '<option value="64">64</option>'+
                                                                                    '<option value="63">63</option>'+
                                                                                    '<option value="62">62</option>'+
                                                                                    '<option value="61">61</option>'+
                                                                                    '<option value="60">60</option>'+
                                                                                    '<option value="59">59</option>'+
                                                                                    '<option value="58">58</option>'+
                                                                                    '<option value="57">57</option>'+
                                                                                    '<option value="56">56</option>'+
                                                                                    '<option value="55">55</option>'+
                                                                                    '<option value="54">54</option>'+
                                                                                    '<option value="53">53</option>'+
                                                                                    '<option value="52">52</option>'+
                                                                                    '<option value="51">51</option>'+
                                                                                    '<option value="50">50</option>'+
                                                                                '</select>'+
                                                                            '</div>'+
                                                                         '</div>'+  
                                                                  
                                                                       
                                                                         '<div class="form-group">'+
                                                                           '<label for="processskills" class="col-md-6 control-label">Process/Skills</label>'+
                                                                           '<div class="col-md-3">'+
                                                                                '<select class="form-control" id="processskills" name="processskills" required="required" style="width:80px;">'+
                                                                                    '<option value="" selected disabled></option>'+
                                                                                    '<option value="100">100</option>'+
                                                                                    '<option value="99">99</option>'+
                                                                                    '<option value="98">98</option>'+
                                                                                    '<option value="97">97</option>'+
                                                                                    '<option value="96">96</option>'+
                                                                                    '<option value="95">95</option>'+
                                                                                    '<option value="94">94</option>'+
                                                                                    '<option value="93">93</option>'+
                                                                                    '<option value="92">92</option>'+
                                                                                    '<option value="91">91</option>'+
                                                                                    '<option value="90">90</option>'+
                                                                                    '<option value="89">89</option>'+
                                                                                    '<option value="88">88</option>'+
                                                                                    '<option value="87">87</option>'+
                                                                                    '<option value="86">86</option>'+
                                                                                    '<option value="85">85</option>'+
                                                                                    '<option value="84">84</option>'+
                                                                                    '<option value="83">83</option>'+
                                                                                    '<option value="82">82</option>'+
                                                                                    '<option value="81">81</option>'+
                                                                                    '<option value="80">80</option>'+
                                                                                    '<option value="79">79</option>'+
                                                                                    '<option value="78">78</option>'+
                                                                                    '<option value="77">77</option>'+
                                                                                    '<option value="76">76</option>'+
                                                                                    '<option value="75">75</option>'+
                                                                                    '<option value="74">74</option>'+
                                                                                    '<option value="73">73</option>'+
                                                                                    '<option value="72">72</option>'+
                                                                                    '<option value="71">71</option>'+
                                                                                    '<option value="70">70</option>'+
                                                                                    '<option value="69">69</option>'+
                                                                                    '<option value="68">68</option>'+
                                                                                    '<option value="67">67</option>'+
                                                                                    '<option value="66">66</option>'+
                                                                                    '<option value="65">65</option>'+
                                                                                    '<option value="64">64</option>'+
                                                                                    '<option value="63">63</option>'+
                                                                                    '<option value="62">62</option>'+
                                                                                    '<option value="61">61</option>'+
                                                                                    '<option value="60">60</option>'+
                                                                                    '<option value="59">59</option>'+
                                                                                    '<option value="58">58</option>'+
                                                                                    '<option value="57">57</option>'+
                                                                                    '<option value="56">56</option>'+
                                                                                    '<option value="55">55</option>'+
                                                                                    '<option value="54">54</option>'+
                                                                                    '<option value="53">53</option>'+
                                                                                    '<option value="52">52</option>'+
                                                                                    '<option value="51">51</option>'+
                                                                                    '<option value="50">50</option>'+
                                                                                '</select>'+
                                                                            '</div>'+
                                                                         '</div>'+  
                                                                    
                                                                   
                                                                         '<div class="form-group">'+
                                                                           '<label for="understanding" class="col-md-6 control-label">Understanding</label>'+
                                                                           '<div class="col-md-3">'+
                                                                                '<select class="form-control" id="understanding" name="understanding" required="required" style="width:80px;">'+
                                                                                    '<option value="" selected disabled></option>'+
                                                                                    '<option value="100">100</option>'+
                                                                                    '<option value="99">99</option>'+
                                                                                    '<option value="98">98</option>'+
                                                                                    '<option value="97">97</option>'+
                                                                                    '<option value="96">96</option>'+
                                                                                    '<option value="95">95</option>'+
                                                                                    '<option value="94">94</option>'+
                                                                                    '<option value="93">93</option>'+
                                                                                    '<option value="92">92</option>'+
                                                                                    '<option value="91">91</option>'+
                                                                                    '<option value="90">90</option>'+
                                                                                    '<option value="89">89</option>'+
                                                                                    '<option value="88">88</option>'+
                                                                                    '<option value="87">87</option>'+
                                                                                    '<option value="86">86</option>'+
                                                                                    '<option value="85">85</option>'+
                                                                                    '<option value="84">84</option>'+
                                                                                    '<option value="83">83</option>'+
                                                                                    '<option value="82">82</option>'+
                                                                                    '<option value="81">81</option>'+
                                                                                    '<option value="80">80</option>'+
                                                                                    '<option value="79">79</option>'+
                                                                                    '<option value="78">78</option>'+
                                                                                    '<option value="77">77</option>'+
                                                                                    '<option value="76">76</option>'+
                                                                                    '<option value="75">75</option>'+
                                                                                    '<option value="74">74</option>'+
                                                                                    '<option value="73">73</option>'+
                                                                                    '<option value="72">72</option>'+
                                                                                    '<option value="71">71</option>'+
                                                                                    '<option value="70">70</option>'+
                                                                                    '<option value="69">69</option>'+
                                                                                    '<option value="68">68</option>'+
                                                                                    '<option value="67">67</option>'+
                                                                                    '<option value="66">66</option>'+
                                                                                    '<option value="65">65</option>'+
                                                                                    '<option value="64">64</option>'+
                                                                                    '<option value="63">63</option>'+
                                                                                    '<option value="62">62</option>'+
                                                                                    '<option value="61">61</option>'+
                                                                                    '<option value="60">60</option>'+
                                                                                    '<option value="59">59</option>'+
                                                                                    '<option value="58">58</option>'+
                                                                                    '<option value="57">57</option>'+
                                                                                    '<option value="56">56</option>'+
                                                                                    '<option value="55">55</option>'+
                                                                                    '<option value="54">54</option>'+
                                                                                    '<option value="53">53</option>'+
                                                                                    '<option value="52">52</option>'+
                                                                                    '<option value="51">51</option>'+
                                                                                    '<option value="50">50</option>'+
                                                                                '</select>'+
                                                                           '</div>'+
                                                                         '</div>'+  
                                                                  
                                                                    
                                                                         '<div class="form-group">'+
                                                                           '<label for="performanceproducts" class="col-md-6 control-label">Performance/Products</label>'+
                                                                           '<div class="col-md-3">'+
                                                                                 '<select class="form-control" id="performanceproducts" name="performanceproducts" required="required" style="width:80px;">'+
                                                                                    '<option value="" selected disabled></option>'+
                                                                                 '<option value="100">100</option>'+
                                                                                    '<option value="99">99</option>'+
                                                                                    '<option value="98">98</option>'+
                                                                                    '<option value="97">97</option>'+
                                                                                    '<option value="96">96</option>'+
                                                                                    '<option value="95">95</option>'+
                                                                                    '<option value="94">94</option>'+
                                                                                    '<option value="93">93</option>'+
                                                                                    '<option value="92">92</option>'+
                                                                                    '<option value="91">91</option>'+
                                                                                    '<option value="90">90</option>'+
                                                                                    '<option value="89">89</option>'+
                                                                                    '<option value="88">88</option>'+
                                                                                    '<option value="87">87</option>'+
                                                                                    '<option value="86">86</option>'+
                                                                                    '<option value="85">85</option>'+
                                                                                    '<option value="84">84</option>'+
                                                                                    '<option value="83">83</option>'+
                                                                                    '<option value="82">82</option>'+
                                                                                    '<option value="81">81</option>'+
                                                                                    '<option value="80">80</option>'+
                                                                                    '<option value="79">79</option>'+
                                                                                    '<option value="78">78</option>'+
                                                                                    '<option value="77">77</option>'+
                                                                                    '<option value="76">76</option>'+
                                                                                    '<option value="75">75</option>'+
                                                                                    '<option value="74">74</option>'+
                                                                                    '<option value="73">73</option>'+
                                                                                    '<option value="72">72</option>'+
                                                                                    '<option value="71">71</option>'+
                                                                                    '<option value="70">70</option>'+
                                                                                    '<option value="69">69</option>'+
                                                                                    '<option value="68">68</option>'+
                                                                                    '<option value="67">67</option>'+
                                                                                    '<option value="66">66</option>'+
                                                                                    '<option value="65">65</option>'+
                                                                                    '<option value="64">64</option>'+
                                                                                    '<option value="63">63</option>'+
                                                                                    '<option value="62">62</option>'+
                                                                                    '<option value="61">61</option>'+
                                                                                    '<option value="60">60</option>'+
                                                                                    '<option value="59">59</option>'+
                                                                                    '<option value="58">58</option>'+
                                                                                    '<option value="57">57</option>'+
                                                                                    '<option value="56">56</option>'+
                                                                                    '<option value="55">55</option>'+
                                                                                    '<option value="54">54</option>'+
                                                                                    '<option value="53">53</option>'+
                                                                                    '<option value="52">52</option>'+
                                                                                    '<option value="51">51</option>'+
                                                                                    '<option value="50">50</option>'+
                                                                                '</select>'+
                                                                           '</div>'+
                                                                         '</div>'+  
                                                                        
                                                                        '<div class="form-group">'+
                                                                            '<div class="col-md-6 col-md-offset-4">'+
                                                                                '<button type="reset" class="btn btn-info text-uppercase">Clear</button>'+
                                                                                '<button type="submit" class="btn btn-success text-uppercase">Submit</button>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        
                                                                    '</form>'+

                                                                '</div>'+
                                                            '</div>'+    
                                                        '</div>'+

                                                    '</div>'+
                            

                                                    '<div class="row">'+
                                                        //3rd Grading Period
                                                        '<div class="col-md-4">'+
                                                            '<div class="progress-period">3rd Grading Period</div>'+
                                                        '</div>'+
                                                        //4th Grading Period
                                                        '<div class="col-md-4">'+
                                                            '<div class="progress-period">4th Grading Period</div>'+
                                                        '</div>'+
                                                    '</div>'+

                                                    '<div class="row">'+
                                                        '<div class="col-md-4 table-responsive">'+ 
                                                            '<table class="table table-bordered table-hover table-striped-orange table-condensed">'+
                                                                    '<thead>'+
                                                                        '<tr>'+
                                                                       '<th><h6>Week No.<h6></th>'+
                                                                       '<th class=""><h6>Knowledge</h6></th>'+
                                                                       '<th class=""><h6>Process/skills</h6></th>'+
                                                                       '<th class=""><h6>Understanding </h6></th>'+
                                                                       '<th class=""><h6>Performance</h6></th>'+
                                                                       
                                                                    '</tr>'+
                                                                    '<thead>'+
                                                                    '<tbody id="third-grading-table">'+
                                                                        
                                                                        
                                                                    '</tbody>'+
                                                            '</table>'+
                                                        '</div>'+

                                                        '<div class="col-md-4 table-responsive">'+ 
                                                            '<table class="table table-bordered table-hover table-striped-orange table-condensed">'+
                                                                    '<thead>'+
                                                                        '<tr>'+
                                                                       '<th><h6>Week No.<h6></th>'+
                                                                       '<th class=""><h6>Knowledge</h6></th>'+
                                                                       '<th class=""><h6>Process/skills</h6></th>'+
                                                                       '<th class=""><h6>Understanding </h6></th>'+
                                                                       '<th class=""><h6>Performance</h6></th>'+
                                                                       
                                                                    '</tr>'+
                                                                    '<thead>'+
                                                                    '<tbody id="fourth-grading-table">'+
                                                                        
                                                                        
                                                                    '</tbody>'+
                                                            '</table>'+
                                                        '</div>'+

                                                    '</div>'+

                                            '</div>'+
                                      '</div>');


                $('.teacher-encoding-main-content').append(modal_workspace);
            }

            function set_first_grading_summary(data)
            {

                $("#first-grading-table").empty();

                for (var i = 0; i < data.length; i++) 
                {

                        drawRow(data[i]);
                    
              
                }

                function drawRow(row) 
                {
                    var display = $('<tr>' +
                                        '<td>'+row.week_number+'</td>'+
                                        '<td>'+row.knowledge+'</td>'+
                                        '<td>'+row.processskills+'</td>'+
                                        '<td>'+row.understanding+'</td>'+
                                        '<td>'+row.performanceproducts+'</td>'+
                                    '</tr>');
                   
                    $("#first-grading-table").append(display);

                }

            }



            function set_second_grading_summary(data)
            {
                $("#second-grading-table").empty();

                for (var i = 0; i < data.length; i++) 
                {

                        drawRow(data[i]);
                    
              
                }

                function drawRow(row) 
                {
                    var display = $('<tr>' +
                                        '<td>'+row.week_number+'</td>'+
                                        '<td>'+row.knowledge+'</td>'+
                                        '<td>'+row.processskills+'</td>'+
                                        '<td>'+row.understanding+'</td>'+
                                        '<td>'+row.performanceproducts+'</td>'+
                                    '</tr>');
                   
                    $("#second-grading-table").append(display); 

                }
            }
            function set_third_grading_summary(data)
            {
                $("#third-grading-table").empty();

                for (var i = 0; i < data.length; i++) 
                {

                        drawRow(data[i]);
                    
              
                }

                function drawRow(row) 
                {

                    var display = $('<tr>' +
                                        '<td>'+row.week_number+'</td>'+
                                        '<td>'+row.knowledge+'</td>'+
                                        '<td>'+row.processskills+'</td>'+
                                        '<td>'+row.understanding+'</td>'+
                                        '<td>'+row.performanceproducts+'</td>'+
                                    '</tr>');
                   
                    $("#third-grading-table").append(display); 
                }
            }
            function set_fourth_grading_summary(data)
            {
                $("#fourth-grading-table").empty();

                for (var i = 0; i < data.length; i++) 
                {

                        drawRow(data[i]);
                    
              
                }

                function drawRow(row) 
                {
                    var display = $('<tr>' +
                                        '<td>'+row.week_number+'</td>'+
                                        '<td>'+row.knowledge+'</td>'+
                                        '<td>'+row.processskills+'</td>'+
                                        '<td>'+row.understanding+'</td>'+
                                        '<td>'+row.performanceproducts+'</td>'+
                                    '</tr>');
                   
                    $("#fourth-grading-table").append(display); 

                }
            }



            //Start Encode
            $(document.body).on('submit', '#encode-assess', submitEncodeForm);

                function submitEncodeForm(event)
                {
                    event.stopPropagation();
                    event.preventDefault();
                    /*alert(class_rec_no);*/
                     $.ajax({
                                url: 'views/ajax/get_encoding.php?submit-encode-form',
                                type: 'POST',
                                data: new FormData(this),
                                contentType: false, 
                                cache: false,
                                processData: false,
                                dataType: 'json',
                                success: function(data, textStatus, jqXHR)
                                {
                                    
                                    if(typeof data.error === 'undefined')
                                    {
                                         $('.student-modal-lg').modal('hide')
                                       initEncoding();
                                        alert(data.success);
                                        
                                    }
                                    else
                                    {
                                        alert('Error: '+data.error);
                                    }   

                                    
                                },
                                error: function(jqXHR, textStatus, errorThrown)
                                {
                                    
                                        alert('ERROR: ' + textStatus);
                                    
                                },
                                complete: function()
                                {
                                    // Completed
                                }
                    
                            });    
                }//end of encode

})//Ready
</script>

	</body>
    
    
</html>