 
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
                <div class="aside-left col-md-2">
                    <?php include "views/parts/side-bar-teacher.php";?>
                </div>
                <!--End of left content-->

                <!--Start of mid content-->
                <div class="main-content col-md-10 col-md-offset-2">
                    <div class="row"><!--//row for encoding-container -->
                        <div class="col-md-7" id="encoding-container">
                            <div class="row"><!--//row for encoding-title -->
                                 <div class="col-md-12" id="encoding-page-title">Encoding Page </div>
                            </div><!--//row for encoding-title -->    

                             <div class="row"><!--//row for encoding-space -->
                                <div class="col-md-12 encoding-page-space">
                                    <div class="row"><!--//row for encoding-workspace -->
                                        <div class="col-md-12 encoding-workspace">
                                            
                                                <form class="form-horizontal" method="post" role="form">
                                                    <div class="form-group">
                                                        <label for="grading-period" class="col-md-3 control-label">Grading Period</label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" id="grading-period" name="gradingPeriod"  required="required">
                                                                <option value="" selected disabled>Grading Period</option>
                                                                <option value="1st">1st Grading Period</option>
                                                                <option value="2nd">2nd Grading Period</option>
                                                                <option value="3rd">3rd Grading Period</option>
                                                                <option value="4th">4th Grading Period</option>
                                                            </select>
                                                        </div>

                                                        <label for="week-number" class="col-md-2 control-label">Week No.</label>
                                                        <div class="col-md-2">
                                                            <select class="form-control" id="week-number" name="weekNumber"  placeholder="Choose Week Number" required="required">
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
                                                            <select class="form-control" id="section-name" name="sectionName"  required="required" onclick="get_section(this);" >
                                                                <option value="" selected disabled>Select Section</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="student-name" class="col-md-3 control-label">Student Name</label>
                                                        <div class="col-md-5">
                                                            <select class="form-control" id="student-name" name="studentName"  required="required">
                                                                <option value="" selected disabled>Select Student Name</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                               
                                                     <div class="form-group">
                                                       <label for="knowledge" class="col-md-2 col-md-offset-4 control-label">Knowledge</label>
                                                       <div class="col-md-2">
                                                            <select class="form-control" id="knowledge" name="knowledge" required="required">
                                                                <option value="" selected disabled></option>
                                                                <option value="100">100</option>
                                                                <option value="99">99</option>
                                                                <option value="98">98</option>
                                                                <option value="97">97</option>
                                                                <option value="96">96</option>
                                                                <option value="95">95</option>
                                                                <option value="94">94</option>
                                                                <option value="93">93</option>
                                                                <option value="92">92</option>
                                                                <option value="91">91</option>
                                                                <option value="90">90</option>
                                                                <option value="89">89</option>
                                                                <option value="88">88</option>
                                                                <option value="87">87</option>
                                                                <option value="86">86</option>
                                                                <option value="85">85</option>
                                                                <option value="84">84</option>
                                                                <option value="83">83</option>
                                                                <option value="82">82</option>
                                                                <option value="81">81</option>
                                                                <option value="80">80</option>
                                                                <option value="79">79</option>
                                                                <option value="78">78</option>
                                                                <option value="77">77</option>
                                                                <option value="76">76</option>
                                                                <option value="75">75</option>
                                                                <option value="74">74</option>
                                                                <option value="73">73</option>
                                                                <option value="72">72</option>
                                                                <option value="71">71</option>
                                                                <option value="70">70</option>
                                                                <option value="69">69</option>
                                                                <option value="68">68</option>
                                                                <option value="67">67</option>
                                                                <option value="66">66</option>
                                                                <option value="65">65</option>
                                                                <option value="64">64</option>
                                                                <option value="63">63</option>
                                                                <option value="62">62</option>
                                                                <option value="61">61</option>
                                                                <option value="60">60</option>
                                                                <option value="59">59</option>
                                                                <option value="58">58</option>
                                                                <option value="57">57</option>
                                                                <option value="56">56</option>
                                                                <option value="55">55</option>
                                                                <option value="54">54</option>
                                                                <option value="53">53</option>
                                                                <option value="52">52</option>
                                                                <option value="51">51</option>
                                                                <option value="50">50</option>
                                                            </select>
                                                        </div>
                                                     </div>  
                                              
                                                   
                                                     <div class="form-group">
                                                       <label for="processskills" class="col-md-2 col-md-offset-4 control-label">Process/Skills</label>
                                                       <div class="col-md-2">
                                                            <select class="form-control" id="processskills" name="processskills" required="required">
                                                                <option value="" selected disabled></option>
                                                                <option value="100">100</option>
                                                                <option value="99">99</option>
                                                                <option value="98">98</option>
                                                                <option value="97">97</option>
                                                                <option value="96">96</option>
                                                                <option value="95">95</option>
                                                                <option value="94">94</option>
                                                                <option value="93">93</option>
                                                                <option value="92">92</option>
                                                                <option value="91">91</option>
                                                                <option value="90">90</option>
                                                                <option value="89">89</option>
                                                                <option value="88">88</option>
                                                                <option value="87">87</option>
                                                                <option value="86">86</option>
                                                                <option value="85">85</option>
                                                                <option value="84">84</option>
                                                                <option value="83">83</option>
                                                                <option value="82">82</option>
                                                                <option value="81">81</option>
                                                                <option value="80">80</option>
                                                                <option value="79">79</option>
                                                                <option value="78">78</option>
                                                                <option value="77">77</option>
                                                                <option value="76">76</option>
                                                                <option value="75">75</option>
                                                                <option value="74">74</option>
                                                                <option value="73">73</option>
                                                                <option value="72">72</option>
                                                                <option value="71">71</option>
                                                                <option value="70">70</option>
                                                                <option value="69">69</option>
                                                                <option value="68">68</option>
                                                                <option value="67">67</option>
                                                                <option value="66">66</option>
                                                                <option value="65">65</option>
                                                                <option value="64">64</option>
                                                                <option value="63">63</option>
                                                                <option value="62">62</option>
                                                                <option value="61">61</option>
                                                                <option value="60">60</option>
                                                                <option value="59">59</option>
                                                                <option value="58">58</option>
                                                                <option value="57">57</option>
                                                                <option value="56">56</option>
                                                                <option value="55">55</option>
                                                                <option value="54">54</option>
                                                                <option value="53">53</option>
                                                                <option value="52">52</option>
                                                                <option value="51">51</option>
                                                                <option value="50">50</option>
                                                            </select>
                                                        </div>
                                                     </div>  
                                                
                                               
                                                     <div class="form-group">
                                                       <label for="understanding" class="col-md-2 col-md-offset-4 control-label">Understanding</label>
                                                       <div class="col-md-2">
                                                            <select class="form-control" id="understanding" name="understanding" required="required">
                                                                <option value="" selected disabled></option>
                                                                <option value="100">100</option>
                                                                <option value="99">99</option>
                                                                <option value="98">98</option>
                                                                <option value="97">97</option>
                                                                <option value="96">96</option>
                                                                <option value="95">95</option>
                                                                <option value="94">94</option>
                                                                <option value="93">93</option>
                                                                <option value="92">92</option>
                                                                <option value="91">91</option>
                                                                <option value="90">90</option>
                                                                <option value="89">89</option>
                                                                <option value="88">88</option>
                                                                <option value="87">87</option>
                                                                <option value="86">86</option>
                                                                <option value="85">85</option>
                                                                <option value="84">84</option>
                                                                <option value="83">83</option>
                                                                <option value="82">82</option>
                                                                <option value="81">81</option>
                                                                <option value="80">80</option>
                                                                <option value="79">79</option>
                                                                <option value="78">78</option>
                                                                <option value="77">77</option>
                                                                <option value="76">76</option>
                                                                <option value="75">75</option>
                                                                <option value="74">74</option>
                                                                <option value="73">73</option>
                                                                <option value="72">72</option>
                                                                <option value="71">71</option>
                                                                <option value="70">70</option>
                                                                <option value="69">69</option>
                                                                <option value="68">68</option>
                                                                <option value="67">67</option>
                                                                <option value="66">66</option>
                                                                <option value="65">65</option>
                                                                <option value="64">64</option>
                                                                <option value="63">63</option>
                                                                <option value="62">62</option>
                                                                <option value="61">61</option>
                                                                <option value="60">60</option>
                                                                <option value="59">59</option>
                                                                <option value="58">58</option>
                                                                <option value="57">57</option>
                                                                <option value="56">56</option>
                                                                <option value="55">55</option>
                                                                <option value="54">54</option>
                                                                <option value="53">53</option>
                                                                <option value="52">52</option>
                                                                <option value="51">51</option>
                                                                <option value="50">50</option>
                                                            </select>
                                                       </div>
                                                     </div>  
                                              
                                                
                                                     <div class="form-group">
                                                       <label for="performanceproducts" class="col-md-3 col-md-offset-3 control-label">Performance/Products</label>
                                                       <div class="col-md-2">
                                                             <select class="form-control" id="performanceproducts" name="performanceproducts" required="required">
                                                                <option value="" selected disabled></option>
                                                                <option value="100">100</option>
                                                                <option value="99">99</option>
                                                                <option value="98">98</option>
                                                                <option value="97">97</option>
                                                                <option value="96">96</option>
                                                                <option value="95">95</option>
                                                                <option value="94">94</option>
                                                                <option value="93">93</option>
                                                                <option value="92">92</option>
                                                                <option value="91">91</option>
                                                                <option value="90">90</option>
                                                                <option value="89">89</option>
                                                                <option value="88">88</option>
                                                                <option value="87">87</option>
                                                                <option value="86">86</option>
                                                                <option value="85">85</option>
                                                                <option value="84">84</option>
                                                                <option value="83">83</option>
                                                                <option value="82">82</option>
                                                                <option value="81">81</option>
                                                                <option value="80">80</option>
                                                                <option value="79">79</option>
                                                                <option value="78">78</option>
                                                                <option value="77">77</option>
                                                                <option value="76">76</option>
                                                                <option value="75">75</option>
                                                                <option value="74">74</option>
                                                                <option value="73">73</option>
                                                                <option value="72">72</option>
                                                                <option value="71">71</option>
                                                                <option value="70">70</option>
                                                                <option value="69">69</option>
                                                                <option value="68">68</option>
                                                                <option value="67">67</option>
                                                                <option value="66">66</option>
                                                                <option value="65">65</option>
                                                                <option value="64">64</option>
                                                                <option value="63">63</option>
                                                                <option value="62">62</option>
                                                                <option value="61">61</option>
                                                                <option value="60">60</option>
                                                                <option value="59">59</option>
                                                                <option value="58">58</option>
                                                                <option value="57">57</option>
                                                                <option value="56">56</option>
                                                                <option value="55">55</option>
                                                                <option value="54">54</option>
                                                                <option value="53">53</option>
                                                                <option value="52">52</option>
                                                                <option value="51">51</option>
                                                                <option value="50">50</option>
                                                            </select>
                                                       </div>
                                                     </div>  
                                                    
                                                    <div class="form-group">
                                                        <div class="col-md-4 col-md-offset-4">
                                                            <button type="reset" class="btn btn-sky text-uppercase">Clear</button>
                                                            <button type="submit" class="btn btn-fresh text-uppercase">Submit</button>
                                                        </div>
                                                    </div>
                                                    <a href="index.php?r=lss&tr=tres">Go to Spreadsheet</a>
                                                </form>

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
             
                        url: 'views/ajax/get_studentlist_encoding.php',
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