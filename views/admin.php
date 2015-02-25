<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <title>Admin</title>
            <link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
            <link href="views/css/exDesign.css" rel="stylesheet"/>
            <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>

             <!-- Load jQuery UI CSS  -->
            <link href="views/plugins/jquery-ui/jquery-ui.css" rel="stylesheet"/>
            <link href="views/plugins/jquery-ui/jquery-ui.structure.css" rel="stylesheet"/>
            <link href="views/plugins/jquery-ui/jquery-ui.theme.css" rel="stylesheet"/>
    </head>
    <body class="skin-blue" onload="check()">
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
            if(isset($_GET['fe']))
            {   
        ?>
            alert('File already exist');
        <?php
            }
            if(isset($_GET['if']))
            {
        ?>
            alert('invalid file');
        <?php
            }
            if(isset($_GET['ape']))
            {    
        ?>
            alert('Admin Information Updated');
        <?php
            }
            if(isset($_GET['tpe']))
            {    
        ?>
            alert('Teacher Information Updated');
        <?php 
            }
            if(isset($_GET['spe']))
            {    
        ?>
            alert('Student Information Updated');
        <?php
            }
            if(isset($_GET['sbse']))
            { 
        ?>
            alert('Subject Information Updated');
        <?php
            }
            if(isset($_GET['scse']))
            { 
        ?>
            alert('Section Information Updated');
        <?php
            }
            if(isset($_GET['gle']))
            {
        ?>
            alert('Grade Level Information Updated');
        <?php 
            }
            if(isset($_GET['pse']))
            {   
        ?>
            alert('Post Information Updated');
        <?php
            }
            if(isset($_GET['uae']))
            {
        ?>
            alert('User Account Updated');
        <?php
            }
            if(isset($_GET['aap']))
            {
        ?>
            alert('New Administrator Account Created');
        <?php        
            }
            if(isset($_GET['atp']))
            { 
        ?> 
            alert('New Teacher Account Created');
        <?php
            }
            if(isset($_GET['asp']))
            {    
        ?>
            alert('New Student Account Created');
        <?php
            }
            if(isset($_GET['asbs']))
            {
        ?>
            alert('New Subject Created');
        <?php        
            }
            if(isset($_GET['ascs']))
            {
        ?>
            alert('New Section Created');
        <?php        
            }
            if(isset($_GET['agl']))
            {
        ?>
            alert('New Grade Level Created');
        <?php        
            }
            if(isset($_GET['aps']))
            {
        ?>
            alert('New Post Created');
        <?php        
            } 

        ?>       
        }  
         </script>   
<!--Start of navbar admin-->
    <?php include "views/parts/navi-bar-admin.php";?>   
<!--End of navbar admin-->

<!--Start of main -->
    <div class="main container-fluid">
        <div class="row">

                <!--Start of left content-->
                <div class="aside-left col-md-2">
                    <?php include "views/parts/side-bar-admin.php";?>
                </div>
                <!--End of left content-->

                <!--Start of mid content-->
                    <div class="main-content col-md-10 col-md-offset-2">
                        <div class="row content_header"><!--//row for admin-content-header -->
                          
                        </div><!--//row for admin-content-header -->

                        <div class="row content_"><!--row for admin-main-content-->
                             
                        </div><!--row for admin-main-content-->
                        
                    </div>
                <!--End of mid content-->

        </div><!--row-->
    </div><!--container-fluid-->
<!--End of main -->

         <!-- Load jQuery JS -->
        <script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
        <!-- Load jQuery UI Main JS  -->
        <script src="views/plugins/jquery-ui/jquery-ui.js"></script>

        <script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
<script>
$(function() 
{
            $(document.body).on('focus','.bday_datepicker',function(event)
            {
                event.preventDefault();
                $(this).datepicker({
        
                /* minDate: new Date(1999, 10 - 1, 25),
                    maxDate: '+30Y',*/
                    yearRange: "-100:+0", 
                    changeMonth: true,
                    changeYear: true,
                    /*showButtonPanel: true,*/
                    dateFormat: 'yy-mm-dd'
                });
            });

            $('.side-menu').on('click', function () 
            {
                $('.side-menu').removeClass('admin-side-menu-click');
                $(this).addClass('admin-side-menu-click');
                var side_menu_id=$(this).attr('side-menu-id');
                switch(side_menu_id)
                {
                    case 'cs':cs();break;
                    case 'ap':ap();break;
                    case 'tp':tp();break;
                    case 'sp':sp();break;
                    case 'scs':scs();break;
                    case 'sbs':sbs();break;
                    case 'gl':gl();break;
                    case 'ua':ua();break;
                }
 
            });
                function cs()
                {
                    display_cs();

                    function display_cs()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'Add Class Schedule '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                        var display = $('<div class="admin-main-content">'+
                                            '<div class="row"><!--//row for form -->'+
                                                '<div class="col-md-4">'+
                                                    '<form class="form-horizontal" method="post" role="form">'+
                                                        '<div class="form-group" id="cs_sy">'+
                                                        '</div>'+
                
                                                        '<div class="form-group">'+
                                                            '<label for="level-name" class="col-md-4 control-label">Grade level:</label>'+
                                                            '<div class="col-md-8">'+
                                                                '<select class="form-control" id="level-name" name="level"  required="required">'+
                                                                    '<option value="" selected disabled>Grade level</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>'+
                                                         '<div class="form-group">'+
                                                            '<label for="section-name" class="col-md-4 control-label">Section</label>'+
                                                            '<div class="col-md-8">'+
                                                                '<select class="form-control" id="section-name" name="section"  required="required">'+
                                                                    '<option value="" selected disabled>Section</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label for="teacher-name" class="col-md-4 control-label">Teacher</label>'+
                                                            '<div class="col-md-8">'+
                                                                '<select class="form-control" id="teacher-name" name="teacher" required="required">'+
                                                                    '<option value="" selected disabled>Teacher</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<div class="col-md-offset-4 col-md-8">'+
                                                                '<button type="reset" class="btn btn-sky text-uppercase">Clear</button>'+
                                                                '<button type="submit" class="btn btn-fresh text-uppercase">Submit</button>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</form>'+
                                                '</div><!--//form-->'+
                                                '<div class="col-md-8">'+
                                                      '<div class="form-group">'+
                                                            '<label class="col-md-5 control-label">Add Existing Students</label>'+
                                                        '</div>'+
                                                '</div>'+
                                            '</div><!--//row for form -->'+ 
                                        '</div><!--admin-main-content-->');
                           
                        $('.content_').append(display);
                    }

                      $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?cs',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                            /*alert(JSON.stringify(response['cs']));*/
                            /*alert(JSON.stringify(response['level']));*/
                            /*alert(JSON.stringify(response['section']));*/
                            /*alert(JSON.stringify(response['teacher']));*/
                            display_cs_school_year(response['cs']);
                            display_cs_level(response['level']);
                            display_cs_section(response['section']);
                            display_cs_teacher(response['teacher']);
                            
                        },


                        });

                        
                        function display_cs_school_year(data) 
                        {
                            $('#cs_sy').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    display_school_year(data[i]);
                          
                            }

                        }

                        function display_school_year(row)
                        {
                           var display = $('<label class="col-md-4 control-label">School Year: </label>'+
                                            '<label class="cold-md-8 control-label">'+row.school_year+'</label>');
                       
                            $('#cs_sy').append(display);
                        }

                        function display_cs_level(data)
                        {
                            for (var i = 0; i < data.length; i++) 
                            {

                                    display_level(data[i]);
                          
                            }
                        }

                        function display_level(row)
                        {
                            var display = $('<option value="' + row.levelID + '">' + row.level_description + '</option>');
                            $("#level-name").append(display); 
                        }

                        function display_cs_section(data)
                        {
                            for (var i = 0; i < data.length; i++) 
                            {

                                    display_section(data[i]);
                          
                            }
                        }

                        function display_section(row)
                        {
                            var display = $('<option value="' + row.sectionID + '">' + row.sectionNo + '-' + row.section_name +'</option>');
                            $("#section-name").append(display); 
                        }

                        function display_cs_teacher(data)
                        {
                            for (var i = 0; i < data.length; i++) 
                            {

                                    display_teacher(data[i]);
                          
                            }
                        }

                        function display_teacher(row)
                        {
                            var display = $('<option value="' + row.reg_id + '">' + row.reg_lname + ', ' + row.reg_fname +'</option>');
                            $("#teacher-name").append(display); 
                        }
                }

                function ap()
                {
                    display_ap();

                    function display_ap()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'Administrator Profile '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                        var display = $('<div class="admin-main-content">'+
                                            '<form class="form-horizontal" role="form">'+
                                                '<div class="form-group no-margin-bottom">'+
                                                    '<div class="has-margin content">'+
                                                        '<div class="col-md-4 col-md-offset-1">'+
                                                            '<div class="input-group">'+
                                                                '<input type="text" name="q" class="form-control" placeholder="Search..." id="ap_filter"/>'+
                                                                '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                            '</div>'+
                                                        '</div>'+    
                                                        '<div class="col-md-4">'+
                                                            '<button type="button" class="btn btn-primary" id="add-admin">Add Administrator</button>'+
                                                        '</div>'+
                                                    '</div>'+   
                                                '</div>'+
                                            '</form>'+

                                            '<div class="col-md-12 table-responsive result-table">'+
                                                '<table class="table table-bordered table-hover table-condensed content">'+
                                                    '<thead>'+
                                                        '<tr class="info">'+
                                                            '<th>ID</th>'+
                                                            '<th>Last Name</th>'+
                                                            '<th>First Name</th>'+
                                                            '<th>Middle Name</th>'+
                                                            '<th>Gender</th>'+
                                                            '<th>Status</th>'+
                                                            '<th>Birthday</th>'+
                                                            '<th>Address</th>'+
                                                            '<th>Image</th>'+
                                                            '<th></th>'+
                                                        '</tr>'+
                                                    '<thead>'+
                                                    '<tbody id="ap-box">'+
                                                       
                                                        
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                    '</div><!--admin-main-content-->');
                           
                        $('.content_').append(display);
                    }

                      $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?ap',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                           /*  alert(JSON.stringify(response['ap']));*/
                            
                            display_ap_data(response['ap']);
                            
                        },


                        });

                        
                        function display_ap_data(data) 
                        {
                            $('#ap-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    table(data[i]);
                          
                            }

                        }

                        function table(rowData)
                        {
                           var display = $('<tr>'+
                                        '<td>'+rowData.reg_id+'</td>'+
                                        '<td>'+rowData.reg_lname+'</td>'+
                                        '<td>'+rowData.reg_fname+'</td>'+
                                        '<td>'+rowData.reg_mname+'</td>'+
                                        '<td>'+rowData.reg_gender+'</td>'+
                                        '<td>'+rowData.reg_status+'</td>'+
                                        '<td>'+rowData.reg_birthday+'</td>'+
                                        '<td>'+rowData.reg_address+'</td>'+
                                        '<td><div align="left"><img src="views/res/'+rowData.image+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                        '<td><button type="button" id="'+rowData.reg_id+'" class="btn btn-warning admin-id">Edit/Update</button></td>'+
                                        '</tr>');
                       
                            $('#ap-box').append(display);
                        }
                }



                function tp()
                {
                    display_tp();

                    function display_tp()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'Teacher Profile '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                         var display = $('<div class="admin-main-content">'+
                                                '<form class="form-horizontal" role="form">'+
                                                    '<div class="form-group no-margin-bottom">'+
                                                        '<div class="has-margin content">'+
                                                            '<div class="col-md-4 col-md-offset-1">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="text" name="q" class="form-control" placeholder="Search..." id="tp_filter"/>'+
                                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                                '</div>'+
                                                            '</div>'+    
                                                            '<div class="col-md-4">'+
                                                                '<button type="button" class="btn btn-primary" id="add-teacher">Add Teacher</button>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
                                                '</form>'+

                                                '<div class="col-md-12 table-responsive result-table">'+
                                                    '<table class="table table-bordered table-hover table-condensed content">'+
                                                        '<thead>'+
                                                            '<tr class="info">'+
                                                                '<th>ID</th>'+
                                                                '<th>Last Name</th>'+
                                                                '<th>First Name</th>'+
                                                                '<th>Middle Name</th>'+
                                                                '<th>Gender</th>'+
                                                                '<th>Status</th>'+
                                                                '<th>Birthday</th>'+
                                                                '<th>Address</th>'+
                                                                '<th>Position</th>'+
                                                                '<th>Image</th>'+
                                                                '<th></th>'+
                                                            '</tr>'+
                                                        '<thead>'+
                                                        '<tbody id="tp-box">'+
                                                          
                                                        '</tbody>'+
                                                    '</table>'+
                                                '</div>'+
                                        '</div><!--admin-main-content-->');
                               
                            $('.content_').append(display);
                    }    
                     $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?tp',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                             /*alert(JSON.stringify(response['tp']));*/

                            display_tp_data(response['tp']);
                            
                        },


                        });

                        function display_tp_data(data) 
                        {
                            $('#tp-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    table(data[i]);
                          
                            }

                        }

                        function table(rowData)
                        {
                            var display = $('<tr>'+
                                            '<td>'+rowData.reg_id+'</td>'+
                                            '<td>'+rowData.reg_lname+'</td>'+
                                            '<td>'+rowData.reg_fname+'</td>'+
                                            '<td>'+rowData.reg_mname+'</td>'+
                                            '<td>'+rowData.reg_gender+'</td>'+
                                            '<td>'+rowData.reg_status+'</td>'+
                                            '<td>'+rowData.reg_birthday+'</td>'+
                                            '<td>'+rowData.reg_address+'</td>'+
                                            '<td>'+rowData.t_position+'</td>'+
                                            '<td><div align="left"><img src="views/res/'+rowData.image+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '<td><button type="button" id="'+rowData.reg_id+'" class="btn btn-warning teacher-id">Edit/Update</button></td>'+
                                            '</tr>');
                           
                            $('#tp-box').append(display);
                        }
                }

                function sp()
                {
                     display_sp();

                    function display_sp()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'Student Profile '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                         var display = $('<div class="admin-main-content">'+
                                                '<form class="form-horizontal" role="form">'+
                                                    '<div class="form-group no-margin-bottom">'+
                                                        '<div class="has-margin content">'+
                                                            '<div class="col-md-4 col-md-offset-1">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="text" name="q" class="form-control" placeholder="Search..." id="sp_filter"/>'+
                                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                                '</div>'+
                                                            '</div>'+    
                                                            '<div class="col-md-4">'+
                                                                '<button type="button" class="btn btn-primary" id="add-student">Add Student</button>'+
                                                                '<button type="button" class="btn btn-success" id="add-student-excel">Add Student Spreadsheet</button>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
                                                '</form>'+

                                                '<div class="col-md-12 table-responsive result-table">'+
                                                    '<table class="table table-bordered table-hover table-condensed content">'+
                                                        '<thead>'+
                                                            '<tr class="info">'+
                                                                '<th>ID</th>'+
                                                                '<th>Last Name</th>'+
                                                                '<th>First Name</th>'+
                                                                '<th>Middle Name</th>'+
                                                                '<th>Gender</th>'+
                                                                '<th>Status</th>'+
                                                                '<th>Birthday</th>'+
                                                                '<th>Address</th>'+
                                                                '<th>Image</th>'+
                                                                '<th>Guardian</th>'+
                                                                '<th></th>'+
                                                            '</tr>'+
                                                        '<thead>'+
                                                        '<tbody id="sp-box">'+
                                                          
                                                        '</tbody>'+
                                                    '</table>'+
                                                '</div>'+
                                        '</div><!--admin-main-content-->');
                               
                            $('.content_').append(display);
                    }    
                     $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?sp',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                             /*alert(JSON.stringify(response['sp']));*/

                            display_sp_data(response['sp']);
                            
                        },


                        });

                        function display_sp_data(data) 
                        {
                            $('#sp-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    table(data[i]);
                          
                            }

                        }

                        function table(rowData)
                        {
                             var display = $('<tr>'+
                                            '<td>'+rowData[0]+'</td>'+
                                            '<td>'+rowData[1]+'</td>'+
                                            '<td>'+rowData[2]+'</td>'+
                                            '<td>'+rowData[3]+'</td>'+
                                            '<td>'+rowData[4]+'</td>'+
                                            '<td>'+rowData[5]+'</td>'+
                                            '<td>'+rowData[6]+'</td>'+
                                            '<td>'+rowData[7]+'</td>'+
                                            '<td><div align="left"><img src="views/res/'+rowData[8]+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '<td>'+rowData[9]+' '+rowData[10]+' '+rowData[11]+'</td>'+
                                            '<td><button type="button" id="'+rowData[0]+'" class="btn btn-warning student-id">Edit/Update</button></td>'+
                                        '</tr>');
                           
                            $('#sp-box').append(display);
                        }

                }

                function scs()
                {
                    display_scs();

                    function display_scs()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'Sections '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                         var display = $('<div class="admin-main-content">'+
                                                '<form class="form-horizontal" role="form">'+
                                                    '<div class="form-group no-margin-bottom">'+
                                                        '<div class="has-margin content">'+
                                                            '<div class="col-md-4 col-md-offset-1">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="text" name="q" class="form-control" placeholder="Search..." id="scs_filter"/>'+
                                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                                '</div>'+
                                                            '</div>'+    
                                                            '<div class="col-md-4">'+
                                                                '<button type="button" class="btn btn-primary" id="add-section">Add Section</button>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
                                                '</form>'+

                                                '<div class="col-md-12 result-table">'+
                                                    '<div class="col-md-offset-1 col-md-10 table-responsive">'+
                                                        '<table class="table table-bordered table-hover table-condensed content">'+
                                                            '<thead>'+
                                                                '<tr class="info">'+
                                                                    '<th>Section No</th>'+
                                                                    '<th>Section Name</th>'+
                                                                    '<th></th>'+
                                                                '</tr>'+
                                                            '<thead>'+
                                                            '<tbody id="scs-box">'+
                                                              
                                                            '</tbody>'+
                                                        '</table>'+
                                                    '</div>'+    
                                                '</div>'+
                                        '</div><!--admin-main-content-->');
                               
                            $('.content_').append(display);
                    }    
                     $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?scs',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                             /*alert(JSON.stringify(response['scs']));*/

                            display_scs_data(response['scs']);
                            
                        },


                        });

                        function display_scs_data(data) 
                        {
                            $('#scs-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    table(data[i]);
                          
                            }

                        }

                        function table(rowData)
                        {
                              var display = $('<tr>'+
                                                '<td>'+rowData.sectionNo+'</td>'+
                                                '<td>'+rowData.section_name+'</td>'+
                                                '<td><button type="button" id="'+rowData.sectionID+'" class="btn btn-danger section-id col-lg-11">Delete</button></td>'+
                                            '</tr>');
                               
                            $('#scs-box').append(display);
                        }

                }

                function sbs()
                {
                    display_sbs();

                    function display_sbs()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'Subjects '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                         var display = $('<div class="admin-main-content">'+
                                                '<form class="form-horizontal" role="form">'+
                                                    '<div class="form-group no-margin-bottom">'+
                                                        '<div class="has-margin content">'+
                                                            '<div class="col-md-4 col-md-offset-1">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="text" name="q" class="form-control" placeholder="Search..." id="sbs_filter"/>'+
                                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                                '</div>'+
                                                            '</div>'+    
                                                            '<div class="col-md-4">'+
                                                                '<button type="button" class="btn btn-primary" id="add-subject">Add Subject</button>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
                                                '</form>'+

                                                '<div class="col-md-12 result-table">'+
                                                    '<div class="col-md-offset-1 col-md-10 table-responsive">'+
                                                        '<table class="table table-bordered table-hover table-condensed content">'+
                                                            '<thead>'+
                                                                '<tr class="info">'+
                                                                    '<th>Subject</th>'+
                                                                    '<th></th>'+
                                                                '</tr>'+
                                                            '<thead>'+
                                                            '<tbody id="sbs-box">'+
                                                              
                                                            '</tbody>'+
                                                        '</table>'+
                                                    '</div>'+    
                                                '</div>'+
                                        '</div><!--admin-main-content-->');
                               
                            $('.content_').append(display);
                    }    
                     $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?sbs',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                             /*alert(JSON.stringify(response['sbs']));*/

                            display_sbs_data(response['sbs']);
                            
                        },


                        });

                        function display_sbs_data(data) 
                        {
                            $('#sbs-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    table(data[i]);
                          
                            }

                        }

                        function table(rowData)
                        {

                            var display = $('<tr>'+
                                            '<td>'+rowData.subject_title+'</td>'+
                                            '<td><button type="button" id="'+rowData.subjectID+'" class="btn btn-danger col-lg-11 subject-id">Delete</button></td>'+
                                        '</tr>');
                           
                            $('#sbs-box').append(display);
                        }
                }

                function gl()
                {
                    display_gl();

                    function display_gl()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'Grade Levels '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                         var display = $('<div class="admin-main-content">'+
                                                '<form class="form-horizontal" role="form">'+
                                                    '<div class="form-group no-margin-bottom">'+
                                                        '<div class="has-margin content">'+
                                                            '<div class="col-md-4 col-md-offset-1">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="text" name="q" class="form-control" placeholder="Search..." id="gl_filter"/>'+
                                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                                '</div>'+
                                                            '</div>'+    
                                                            '<div class="col-md-4">'+
                                                                '<button type="button" class="btn btn-primary" id="add-grade">Add Grade Level</button>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
                                                '</form>'+

                                                '<div class="col-md-12 result-table">'+
                                                    '<div class="col-md-offset-1 col-md-10 table-responsive">'+
                                                        '<table class="table table-bordered table-hover table-condensed content">'+
                                                            '<thead>'+
                                                                '<tr class="info">'+
                                                                    '<th>Grade Level</th>'+
                                                                    '<th></th>'+
                                                                '</tr>'+
                                                            '<thead>'+
                                                            '<tbody id="gl-box">'+
                                                              
                                                            '</tbody>'+
                                                        '</table>'+
                                                    '</div>'+    
                                                '</div>'+
                                        '</div><!--admin-main-content-->');
                               
                            $('.content_').append(display);
                    }    
                     $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?gl',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                             /*alert(JSON.stringify(response['gl']));*/

                            display_gl_data(response['gl']);
                            
                        },


                        });

                        function display_gl_data(data) 
                        {
                            $('#gl-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    table(data[i]);
                          
                            }

                        }

                        function table(rowData)
                        {

                            var display = $('<tr>'+
                                                '<td>'+rowData.level_description+'</td>'+
                                                '<td><button type="button" id="'+rowData.levelID+'" class="btn btn-danger grade-id col-lg-11">Delete</button></td>'+
                                            '</tr>');
                               
                            $('#gl-box').append(display);
                        }
                }

                function ua()
                {
                    display_ua();

                    function display_ua()
                    {
                        $('.content_header').empty();
                        $('.content_').empty();
                        
                         var header = $('<div class="admin-content-header">'+
                                            '<h1>'+
                                                'User Accounts '+
                                                '<small>Control panel</small>'+
                                            '</h1>'+
                                        '</div>');

                        $('.content_header').append(header);
                         var display = $('<div class="admin-main-content">'+
                                                '<form class="form-horizontal" role="form">'+
                                                    '<div class="form-group no-margin-bottom">'+
                                                        '<div class="has-margin content">'+
                                                            '<div class="col-md-4 col-md-offset-1">'+
                                                                '<div class="input-group">'+
                                                                    '<input type="text" name="q" class="form-control" placeholder="Search..." id="ua_filter"/>'+
                                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                                '</div>'+
                                                            '</div>'+    
                                                        '</div>'+   
                                                    '</div>'+
                                                '</form>'+

                                                '<div class="col-md-12 result-table">'+
                                                    '<div class="col-md-12 table-responsive">'+
                                                        '<table class="table table-bordered table-hover table-condensed content">'+
                                                            '<thead>'+
                                                                '<tr class="info">'+
                                                                    '<th>Username</th>'+
                                                                    '<th>Password</th>'+
                                                                    '<th>Secret Question</th>'+
                                                                    '<th>Secret Answer</th>'+
                                                                    '<th>User type</th>'+
                                                                    '<th>Account Id</th>'+
                                                                    '<th>First Name</th>'+
                                                                    '<th>Last Name</th>'+
                                                                    
                                                                '</tr>'+
                                                            '<thead>'+
                                                            '<tbody id="ua-box">'+
                                                              
                                                            '</tbody>'+
                                                        '</table>'+
                                                    '</div>'+    
                                                '</div>'+
                                        '</div><!--admin-main-content-->');
                               
                            $('.content_').append(display);
                    }    
                     $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?ua',
                        type: 'GET',
                       dataType: 'json',

                       success: function(response) 
                       {
                             /*alert(JSON.stringify(response['ua']));*/

                            display_ua_data(response['ua']);
                            
                        },


                        });

                        function display_ua_data(data) 
                        {
                            $('#ua-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    table(data[i]);
                          
                            }

                        }

                        function table(row)
                        {

                            var display = $('<tr>'+
                                            '<td>'+row.username_+'</td>'+
                                            '<td>'+row.password_+'</td>'+
                                            '<td>'+row.secret_question+'</td>'+
                                            '<td>'+row.secret_answer+'</td>'+
                                            '<td>'+row.user_type+'</td>'+
                                            '<td>'+row.account_id+'</td>'+
                                            '<td>'+row.reg_fname+'</td>'+
                                            '<td>'+row.reg_lname+'</td>'+
                                            '</tr>');
                               
                            $('#ua-box').append(display);
                        }
                }
                
                $(document.body).on('keyup', '#ap_filter', ap_filter);
                $(document.body).on('keyup', '#tp_filter', tp_filter);
                $(document.body).on('keyup', '#sp_filter', sp_filter);
                $(document.body).on('keyup', '#sbs_filter', sbs_filter);
                $(document.body).on('keyup', '#scs_filter', scs_filter);
                $(document.body).on('keyup', '#gl_filter', gl_filter);
                $(document.body).on('keyup', '#ua_filter', ua_filter);

                function ap_filter() 
                {
                    
                    var filter=$('#ap_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            ap_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                             /*alert(JSON.stringify(response['ap_filter']));*/

                             display_ap_filter(response['ap_filter']);
                                
                             
                        },


                        });

                    function display_ap_filter(data) 
                    {
                        $('#ap-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    }

                    function reset_table(rowData)
                    {

                        var display = $('<tr>'+
                                            '<td>'+rowData.reg_id+'</td>'+
                                            '<td>'+rowData.reg_lname+'</td>'+
                                            '<td>'+rowData.reg_fname+'</td>'+
                                            '<td>'+rowData.reg_mname+'</td>'+
                                            '<td>'+rowData.reg_gender+'</td>'+
                                            '<td>'+rowData.reg_status+'</td>'+
                                            '<td>'+rowData.reg_birthday+'</td>'+
                                            '<td>'+rowData.reg_address+'</td>'+
                                            '<td><div align="left"><img src="views/res/'+rowData.image+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '<td><button type="button" id="'+rowData.reg_id+'" class="btn btn-warning admin-id">Edit/Update</button></td>'+
                                            '</tr>');
                           
                        $('#ap-box').append(display);
                    }
                     

                }

                function tp_filter()
                {
                    var filter=$('#tp_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            tp_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                           /*  alert(JSON.stringify(response['tp_filter']));*/
                                
                            display_tp_filter(response['tp_filter']);
                        },


                        });


                    function display_tp_filter(data) 
                    {
                        $('#tp-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    }

                    function reset_table(rowData)
                    {

                        var display = $('<tr>'+
                                            '<td>'+rowData.reg_id+'</td>'+
                                            '<td>'+rowData.reg_lname+'</td>'+
                                            '<td>'+rowData.reg_fname+'</td>'+
                                            '<td>'+rowData.reg_mname+'</td>'+
                                            '<td>'+rowData.reg_gender+'</td>'+
                                            '<td>'+rowData.reg_status+'</td>'+
                                            '<td>'+rowData.reg_birthday+'</td>'+
                                            '<td>'+rowData.reg_address+'</td>'+
                                            '<td>'+rowData.t_position+'</td>'+
                                            '<td><div align="left"><img src="views/res/'+rowData.image+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '<td><button type="button" id="'+rowData.reg_id+'" class="btn btn-warning teacher-id">Edit/Update</button></td>'+
                                            '</tr>');
                           
                        $('#tp-box').append(display);
                    }
                }

                 function sp_filter()
                 {
                    var filter=$('#sp_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            sp_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                            /* alert(JSON.stringify(response['sp_filter']));*/
                                
                             display_sp_filter(response['sp_filter']);
                        },


                        });

                    function display_sp_filter(data) 
                    {
                        $('#sp-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    }

                    function reset_table(rowData)
                    {

                        var display = $('<tr>'+
                                            '<td>'+rowData[0]+'</td>'+
                                            '<td>'+rowData[1]+'</td>'+
                                            '<td>'+rowData[2]+'</td>'+
                                            '<td>'+rowData[3]+'</td>'+
                                            '<td>'+rowData[4]+'</td>'+
                                            '<td>'+rowData[5]+'</td>'+
                                            '<td>'+rowData[6]+'</td>'+
                                            '<td>'+rowData[7]+'</td>'+
                                            '<td><div align="left"><img src="views/res/'+rowData[8]+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '<td>'+rowData[9]+' '+rowData[10]+' '+rowData[11]+'</td>'+
                                            '<td><button type="button" id="'+rowData[0]+'" class="btn btn-warning student-id">Edit/Update</button></td>'+
                                        '</tr>');
                           
                        $('#sp-box').append(display);
                    }


                 }

                 function sbs_filter()
                 {
                    var filter=$('#sbs_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            sbs_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                             /*alert(JSON.stringify(response['sbs_filter']));*/
                             display_sbs_filter(response['sbs_filter']);
                                
                             
                        },


                        });

                    function display_sbs_filter(data) 
                    {
                        $('#sbs-box').empty()
                        

                            for (var i = 0; i < data.length; i++) 
                            {

                                    reset_table(data[i]);
                          
                            }

                    }

                    function reset_table(rowData)
                    {

                         var display = $('<tr>'+
                                            '<td>'+rowData.subject_title+'</td>'+
                                            '<td><button type="button" id="'+rowData.subjectID+'" class="btn btn-danger col-lg-11 subject-id">Delete</button></td>'+
                                        '</tr>');
                           
                        $('#sbs-box').append(display);
                    }
                 }

                 function scs_filter()
                 {
                    var filter=$('#scs_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            scs_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                             /*alert(JSON.stringify(response['scs_filter']));*/
                             display_sbs_filter(response['scs_filter'])    
                             
                        },


                        });

                        function display_sbs_filter(data) 
                        {
                            $('#scs-box').empty()
                            

                                for (var i = 0; i < data.length; i++) 
                                {

                                        reset_table(data[i]);
                              
                                }

                        }

                        function reset_table(rowData)
                        {

                             var display = $('<tr>'+
                                                '<td>'+rowData.sectionNo+'</td>'+
                                                '<td>'+rowData.section_name+'</td>'+
                                                '<td><button type="button" id="'+rowData.sectionID+'" class="btn btn-danger section-id col-lg-11">Delete</button></td>'+
                                            '</tr>');
                               
                            $('#scs-box').append(display);
                        }

                   
                 }

                 function gl_filter()
                 {
                    var filter=$('#gl_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            gl_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                            /* alert(JSON.stringify(response['gl_filter']));*/
                            display_gl_filter(response['gl_filter']);    
                             
                        },


                        });

                        function display_gl_filter(data) 
                        {
                            $('#gl-box').empty()
                            

                                for (var i = 0; i < data.length; i++) 
                                {

                                        reset_table(data[i]);
                              
                                }

                        }

                        function reset_table(rowData)
                        {

                            var display = $('<tr>'+
                                                '<td>'+rowData.level_description+'</td>'+
                                                '<td><button type="button" id="'+rowData.levelID+'" class="btn btn-danger grade-id col-lg-11">Delete</button></td>'+
                                            '</tr>');
                               
                            $('#gl-box').append(display);
                        }
                 }


                 function ua_filter()
                 {
                    var filter=$('#ua_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            ua_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                            /* alert(JSON.stringify(response['ua_filter']));*/
                            display_ua_filter(response['ua_filter']);    
                             
                        },


                        });

                        function display_ua_filter(data) 
                        {
                            $('#ua-box').empty()
                            

                                for (var i = 0; i < data.length; i++) 
                                {

                                        reset_table(data[i]);
                              
                                }

                        }

                        function reset_table(row)
                        {

                            var display = $('<tr>'+
                                            '<td>'+row.username_+'</td>'+
                                            '<td>'+row.password_+'</td>'+
                                            '<td>'+row.secret_question+'</td>'+
                                            '<td>'+row.secret_answer+'</td>'+
                                            '<td>'+row.user_type+'</td>'+
                                            '<td>'+row.account_id+'</td>'+
                                            '<td>'+row.reg_fname+'</td>'+
                                            '<td>'+row.reg_lname+'</td>'+
                                            '</tr>');
                               
                            $('#ua-box').append(display);
                        }
                 }

               
                        $(document.body).on('change', '#upload-edit-admin-image', function(e) 
                        {
                            
                            var img = URL.createObjectURL(e.target.files[0]);
                            $('.edit-admin-image').attr('src', img);
                        });

                        $(document.body).on('click','.admin-id',function(event)
                        {
                            var id=$(this).attr('id');
                                   
                                   $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php',
                                    type: 'GET',
                                    data: {
                                        edit_admin_id:id
                                    },
                                   dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response['edit_admin'])); */   
                                        display_edit_admin(response['edit_admin']);

                                    },


                                    });

                                    function display_edit_admin(data) 
                                    {
                                        $('.content_header').empty();
                                        $('.content_').empty();

                                        var header = $('<div class="admin-content-header">'+
                                                            '<h1>'+
                                                                'Edit Administrator '+
                                                                '<small>Profile</small>'+
                                                            '</h1>'+
                                                        '</div>');

                                            $('.content_header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    }

                                    function reset_table(row)
                                    {

                                        var content = $('<div class="admin-main-content">'+
                                                            '<form class="form-horizontal" role="form" id="edit-admin-form" method="post">'+
                                                                '<div class="form-group">'+
                                                                    '<div class="col-md-12">'+
                                                                        '<img class="edit-admin-image pull-left" alt="" src="views/res/'+row.image+'"/>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-12">'+
                                                                        '<input type="file" name="edadmimg" id="upload-edit-admin-image" class="pull-left admin-edit-image-browse" style="display:none;"/>'+
                                                                    '</div>'+
                                                                     
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-md-2 control-label">ID</label>'+
                                                                    '<div class="col-md-4">'+
                                                                        '<input type="text" name="edadmid" class="form-control" value="'+row.reg_id+'" readonly="true">'+
                                                                    '</div>'+

                                                                    '<label class="col-md-1 control-label">Birthday</label>'+
                                                                    '<div class="col-md-4">'+
                                                                        '<input type="text" name="edadmbirthday" class="form-control edit_admin" value="'+row.reg_birthday+'" readonly="true" id="edadbday">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-md-2 control-label">Last name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edadmlname" class="form-control edit_admin" value="'+row.reg_lname+'" readonly="true">'+
                                                                    '</div>'+

                                                                    '<label class="col-md-1 control-label">Address</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edadmaddress" class="form-control edit_admin" value="'+row.reg_address+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-md-2 control-label">First name</label>'+
                                                                    '<div class="col-md-4">'+
                                                                        '<input type="text" name="edadmfname" class="form-control edit_admin" value="'+row.reg_fname+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-md-2 control-label">Middle name</label>'+
                                                                    '<div class="col-md-4">'+
                                                                        '<input type="text" name="edadmmname" class="form-control edit_admin" value="'+row.reg_mname+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-md-2 control-label">Gender</label>'+
                                                                    '<div class="col-md-2">'+
                                                                        '<select class="form-control edit_admin_select" id="edadmgender" name="edadmgender" required="required" disabled="disabled">'+
                                                                            '<option value="Male">Male</option>'+
                                                                            '<option value="Female">Female</option>'+
                                                                        '</select>'+
                                                                    '</div>'+        
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-md-2 control-label">Status</label>'+
                                                                    '<div class="col-md-2">'+
                                                                        '<select class="form-control edit_admin_select" id="edadmstatus" name="edadmstatus" required="required" disabled="disabled">'+
                                                                            '<option value="Single">Single</option>'+
                                                                            '<option value="Married">Married</option>'+
                                                                            '<option value="Widowed">Widowed</option>'+
                                                                        '</select>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+

                                                                    '<div class="col-md-offset-8 col-md-2">'+
                                                                        '<button type="button" class="btn btn-success btn-label-left pull-right" id="admin-edit-update">'+
                                                                            'Update Information'+
                                                                        '</button>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-2">'+
                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="admin-edit-submit">'+
                                                                            'Save Changes'+
                                                                        '</button>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</form>'+
                                                        '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);

                                        if(row.reg_gender=='Male')
                                        {
                                            $('#edadmgender option[value=Male]').attr('selected','selected');
                                        }
                                        else if (row.reg_gender=='Female')
                                        {
                                            $('#edadmgender option[value=Female]').attr('selected','selected');
                                        } 

                                        if(row.reg_status=='Single')
                                        {
                                            $('#edadmstatus option[value=Single]').attr('selected','selected');
                                        }
                                        else if(row.reg_status=='Married')
                                        {
                                            $('#edadmstatus option[value=Married]').attr('selected','selected');
                                        }
                                        else if(row.reg_status=='Widowed')
                                        {
                                            $('#edadmstatus option[value=Widowed]').attr('selected','selected');
                                        }    

                                    $('#admin-edit-submit').attr('disabled',true);
                                    }

                        });//end of admin id

                       
                        $(document.body).on('click', '#admin-edit-update',function(){
                            $('.edit_admin').removeProp("readonly");
                            $('#upload-edit-admin-image').removeAttr("style");
                            $('#edadbday').addClass('bday_datepicker');
                            $('.bday_datepicker').datepicker('enable');
                            $('.edit_admin_select').removeAttr('disabled');
                            $('#admin-edit-submit').attr('disabled',false);
                        });

                       
                        $(document.body).on('submit', '#edit-admin-form', submitEditAdminForm);

                        function submitEditAdminForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?edit-admin-form',
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
                                                ap();
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
                        }//end of submit edit admin

                        $(document.body).on('change', '#upload-edit-teacher-image', function(e) 
                        {
                            
                            var img = URL.createObjectURL(e.target.files[0]);
                            $('.edit-teacher-image').attr('src', img);
                        });


                        $(document.body).on('click','.teacher-id',function(event)
                        {
                            var id=$(this).attr('id');
                            
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php',
                                    type: 'GET',
                                    data: {
                                        edit_teacher_id:id
                                    },
                                   dataType: 'json',

                                   success: function(response) 
                                   {
                                      /* alert(JSON.stringify(response['edit_teacher']));  */
                                        display_edit_teacher(response['edit_teacher']);
                                    
                                    },


                                    });

                                    function display_edit_teacher(data) 
                                    {
                                        $('.content_header').empty();
                                        $('.content_').empty();

                                        var header = $('<div class="admin-content-header">'+
                                                            '<h1>'+
                                                                'Edit Teacher '+
                                                                '<small>Profile</small>'+
                                                            '</h1>'+
                                                        '</div>');

                                            $('.content_header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {
                                        
                                        var content = $('<div class="admin-main-content">'+
                                                            '<form class="form-horizontal" role="form" id="edit-teacher-form" method="post">'+
                                                                '<div class="form-group">'+
                                                                    '<div class="col-sm-12">'+
                                                                        '<img class="edit-teacher-image pull-left" alt="" src="views/res/'+row.image+'"/>'+
                                                                    '</div>'+
                                                                    '<div class="col-sm-12">'+
                                                                        '<input type="file" name="edteachimg" id="upload-edit-teacher-image" class="pull-left teacher-edit-image-browse" style="display:none;"/>'+
                                                                    '</div>'+
                                                                     
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachid" class="form-control" value="'+row.reg_id+'" readonly="true">'+
                                                                    '</div>'+

                                                                    '<label class="col-sm-1 control-label">Birthday</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachbirthday" class="form-control edit_teacher" value="'+row.reg_birthday+'" readonly="true" id="edteachbday">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Last name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachlname" class="form-control edit_teacher" value="'+row.reg_lname+'" readonly="true">'+
                                                                    '</div>'+

                                                                    '<label class="col-sm-1 control-label">Address</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachaddress" class="form-control edit_teacher" value="'+row.reg_address+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">First name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachfname" class="form-control edit_teacher" value="'+row.reg_fname+'" readonly="true">'+
                                                                    '</div>'+

                                                                     '<label class="col-sm-1 control-label">Position</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachtposition" class="form-control edit_teacher" value="'+row.t_position+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Middle name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachmname" class="form-control edit_teacher" value="'+row.reg_mname+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Gender</label>'+
                                                                    '<div class="col-sm-2">'+
                                                                        '<select class="form-control edit_teacher_select" id="edteachgender" name="edteachgender" required="required" disabled="disabled">'+
                                                                             '<option value="Male">Male</option>'+
                                                                             '<option value="Female">Female</option>'+
                                                                        '</select>'+
                                                                    '</div>'+        
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Status</label>'+
                                                                    '<div class="col-sm-2">'+
                                                                        '<select class="form-control edit_teacher_select" id="edteachstatus" name="edteachstatus" required="required" disabled="disabled">'+
                                                                             '<option value="Single">Single</option>'+
                                                                             '<option value="Married">Married</option>'+
                                                                             '<option value="Widowed">Widowed</option>'+
                                                                        '</select>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<div class="col-md-offset-8 col-sm-2">'+
                                                                        '<button type="button" class="btn btn-success btn-label-left pull-right" id="teacher-edit-update">'+
                                                                            'Update Information'+
                                                                        '</button>'+
                                                                    '</div>'+
                                                                    '<div class="col-sm-2">'+
                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="teacher-edit-submit">'+
                                                                            'Save Changes'+
                                                                        '</button>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</form>'+
                                                        '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);

                                        if(row.reg_gender=='Male')
                                        {
                                            $('#edteachgender option[value=Male]').attr('selected','selected');
                                        }
                                        else if (row.reg_gender=='Female')
                                        {
                                            $('#edteachgender option[value=Female]').attr('selected','selected');
                                        } 

                                        if(row.reg_status=='Single')
                                        {
                                            $('#edteachstatus option[value=Single]').attr('selected','selected');
                                        }
                                        else if(row.reg_status=='Married')
                                        {
                                            $('#edteachstatus option[value=Married]').attr('selected','selected');
                                        }
                                        else if(row.reg_status=='Widowed')
                                        {
                                            $('#edteachstatus option[value=Widowed]').attr('selected','selected');
                                        }    
                         

                                         $('#teacher-edit-submit').attr('disabled',true);
                                    }
                        });//end of teacher id

                        $(document.body).on('click', '#teacher-edit-update',function(){
                            $('.edit_teacher').removeProp("readonly");
                            $('#upload-edit-teacher-image').removeAttr("style");
                            $('#edteachbday').addClass('bday_datepicker');
                            $('.bday_datepicker').datepicker('enable');
                            $('.edit_teacher_select').removeAttr('disabled');
                            $('#teacher-edit-submit').attr('disabled',false);
                        });

                        $(document.body).on('submit', '#edit-teacher-form', submitEditTeacherForm);

                        function submitEditTeacherForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?edit-teacher-form',
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
                                                tp();
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
                        } //end of submit edit teacher

                        $(document.body).on('change', '#upload-edit-student-image', function(e) 
                        {
                            
                            var img = URL.createObjectURL(e.target.files[0]);
                            $('.edit-student-image').attr('src', img);
                        });

                        $(document.body).on('click','.student-id',function(event)
                        {
                            var id=$(this).attr('id');
                            
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php',
                                    type: 'GET',
                                    data: {
                                        edit_student_id:id
                                    },
                                   dataType: 'json',

                                   success: function(response) 
                                   {
                                       /*alert(JSON.stringify(response['edit_student']));*/  
                                        display_edit_student(response['edit_student']);

                                    },


                                    });

                                    function display_edit_student(data) 
                                    {
                                        $('.content_header').empty();
                                        $('.content_').empty();

                                        var header = $('<div class="admin-content-header">'+
                                                            '<h1>'+
                                                                'Edit Student '+
                                                                '<small>Profile</small>'+
                                                            '</h1>'+
                                                        '</div>');

                                            $('.content_header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {

                                        var content = $('<div class="admin-main-content">'+
                                                            '<form class="form-horizontal" role="form" id="edit-student-form" method="post">'+
                                                                '<div class="form-group">'+
                                                                    '<div class="col-sm-12">'+
                                                                        '<img class="edit-student-image pull-left" alt="" src="views/res/'+row[8]+'"/>'+
                                                                    '</div>'+
                                                                    '<div class="col-sm-12">'+
                                                                        '<input type="file" name="edstudimg" id="upload-edit-student-image" class="pull-left student-edit-image-browse" style="display:none;"/>'+
                                                                    '</div>'+
                                                                     
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudid" class="form-control" value="'+row[0]+'" readonly="true">'+
                                                                    '</div>'+

                                                                    '<label class="col-sm-1 control-label">Birthday</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudbirthday" class="form-control edit_student" value="'+row[6]+'" readonly="true" id="edstudbday">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Last name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudlname" class="form-control edit_student" value="'+row[1]+'" readonly="true">'+
                                                                    '</div>'+

                                                                    '<label class="col-sm-1 control-label">Address</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudaddress" class="form-control edit_student" value="'+row[7]+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">First name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudfname" class="form-control edit_student" value="'+row[2]+'" readonly="true">'+
                                                                    '</div>'+
                                                                    '<label class="col-sm-1 control-label">Guardian:</label>'+
                                                                    '<input type="hidden" name="edstudparentid" value="'+row[9]+'"/>'+ 

                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Middle name</label>'+
                                                                    '<div class="col-sm-3">'+
                                                                        '<input type="text" name="edstudmname" class="form-control edit_student" value="'+row[3]+'" readonly="true">'+
                                                                    '</div>'+

                                                                    '<label class="col-sm-2 control-label">Last Name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudparentlname" class="form-control edit_student" value="'+row[10]+'" readonly="true">'+
                                                                    '</div>'+

                                                                '</div>'+
                                                                 '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Gender</label>'+
                                                                    '<div class="col-sm-2">'+
                                                                        '<select class="form-control edit_student_select" id="edstudgender" name="edstudgender" required="required" disabled="disabled">'+
                                                                             '<option value="Male">Male</option>'+
                                                                             '<option value="Female">Female</option>'+
                                                                        '</select>'+
                                                                    '</div>'+ 

                                                                    '<label class="col-md-offset-1 col-sm-2 control-label">First Name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudparentfname" class="form-control edit_student"  value="'+row[11]+'" readonly="true">'+
                                                                    '</div>'+
       
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">Status</label>'+
                                                                    '<div class="col-sm-2">'+
                                                                        '<select class="form-control edit_student_select" id="edstudstatus" name="edstudstatus" required="required" disabled="disabled">'+
                                                                             '<option value="Single">Single</option>'+
                                                                             '<option value="Married">Married</option>'+
                                                                             '<option value="Widowed">Widowed</option>'+
                                                                        '</select>'+
                                                                    '</div>'+
                                                                    '<label class="col-md-offset-1 col-sm-2 control-label">Middle Name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudparentmname" class="form-control edit_student"  value="'+row[12]+'" readonly="true">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<div class="col-md-offset-8 col-md-2">'+
                                                                        '<button type="button" class="btn btn-success btn-label-left pull-right" id="student-edit-update">'+
                                                                            'Update Information'+
                                                                        '</button>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-2">'+
                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="student-edit-submit">'+
                                                                            'Save Changes'+
                                                                        '</button>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</form>'+
                                                        '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);

                                        if(row.reg_gender=='Male')
                                        {
                                            $('#edstudgender option[value=Male]').attr('selected','selected');
                                        }
                                        else if (row.reg_gender=='Female')
                                        {
                                            $('#edstudgender option[value=Female]').attr('selected','selected');
                                        } 

                                        if(row.reg_status=='Single')
                                        {
                                            $('#edstudstatus option[value=Single]').attr('selected','selected');
                                        }
                                        else if(row.reg_status=='Married')
                                        {
                                            $('#edstudstatus option[value=Married]').attr('selected','selected');
                                        }
                                        else if(row.reg_status=='Widowed')
                                        {
                                            $('#edstudstatus option[value=Widowed]').attr('selected','selected');
                                        }

                                        $('#student-edit-submit').attr('disabled',true);

                                    }
                        });//end of student id

                        $(document.body).on('click', '#student-edit-update',function(){
                            $('.edit_student').removeProp("readonly");
                            $('#upload-edit-student-image').removeAttr("style");
                            $('#edstudbday').addClass('bday_datepicker');
                            $('.bday_datepicker').datepicker('enable');
                            $('.edit_student_select').removeAttr('disabled');
                            $('#student-edit-submit').attr('disabled',false);
                        });

                        $(document.body).on('submit', '#edit-student-form', submitEditStudentForm);

                        function submitEditStudentForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?edit-student-form',
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
                                                sp();
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
                        }//end of submit edit student

                        /**Adding for insert**/
                        $(document.body).on('change', '#upload-add-admin-image', function(e) 
                        {
                            
                            var img = URL.createObjectURL(e.target.files[0]);
                            $('.add-admin-image').attr('src', img);
                        });

                        $(document.body).on('click','#add-admin',function()
                        {
                              $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php?create-admin-id',
                                    type: 'GET',
                                    dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response.create_admin_id));*/     
                                         display_form_admin(response['create_admin_id']);


                                    },


                                    });

                            function display_form_admin(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            reset_table(data[i]);
                                  
                                    }

                            }  
                                
                           
                            function reset_table(row)
                            {
                                $('.content_header').empty();
                                $('.content_').empty();

                                var header = $('<div class="admin-content-header">'+
                                                    '<h1>'+
                                                        'Add Administrator'+
                                                    '</h1>'+
                                                '</div>');

                                $('.content_header').append(header);

                                var content = $('<div class="admin-main-content">'+
                                                    '<form class="form-horizontal" role="form" id="add-admin-form" method="post">'+
                                                        '<div class="form-group">'+
                                                            '<div class="col-sm-12">'+
                                                                '<img class="add-admin-image pull-left" alt="" src="views/res/default_profile_pic.jpg"/>'+
                                                            '</div>'+
                                                            '<div class="col-sm-12">'+
                                                                '<input type="file" name="addadmimg" id="upload-add-admin-image" class="pull-left admin-add-image-browse"/>'+
                                                            '</div>'+
                                                             
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">ID</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addadmid" class="form-control" value="'+row.admin_id+'" readonly="true">'+
                                                            '</div>'+

                                                            '<label class="col-sm-1 control-label">Birthday</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addadmbirthday" class="form-control add_admin bday_datepicker" id="addadbday">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Last name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addadmlname" class="form-control add_admin">'+
                                                            '</div>'+

                                                            '<label class="col-sm-1 control-label">Address</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addadmaddress" class="form-control add_admin">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">First name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addadmfname" class="form-control add_admin">'+
                                                            '</div>'+
                                                            

                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Middle name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addadmmname" class="form-control add_admin">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Gender</label>'+
                                                            '<div class="col-sm-2">'+
                                                                '<select class="form-control add_admin_select" id="addadmgender" name="addadmgender" required="required">'+
                                                                     '<option value="Male">Male</option>'+
                                                                     '<option value="Female">Female</option>'+
                                                                '</select>'+
                                                            '</div>'+     
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Status</label>'+
                                                            '<div class="col-sm-2">'+
                                                                '<select class="form-control add_admin_select" id="addadmstatus" name="addadmstatus" required="required">'+
                                                                     '<option value="Single">Single</option>'+
                                                                     '<option value="Married">Married</option>'+
                                                                     '<option value="Widowed">Widowed</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<div class="col-md-offset-10 col-md-4">'+
                                                                '<button type="submit" class="btn btn-primary btn-label-left text-uppercase" id="admin-add-submit">'+
                                                                    'Submit'+
                                                                '</button>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</form>'+
                                                '</div><!--admin-main-content-->');
                               
                                   
                                $('.content_').append(content);
                            }

                        });//add-admin

                       
                        $(document.body).on('submit', '#add-admin-form', submitAddAdminForm);

                        function submitAddAdminForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-admin-form',
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
                                               /* alert(JSON.stringify(data));*/
                                              /* window.location.href="index.php?r=lss&ap&aap";*/
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
                        }//end of submit add admin

                        $(document.body).on('change', '#upload-add-teacher-image', function(e) 
                        {
                            
                            var img = URL.createObjectURL(e.target.files[0]);
                            $('.add-teacher-image').attr('src', img);
                        });

                        $(document.body).on('click', '#add-teacher', function()
                        {
                           $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php?create-teacher-id',
                                    type: 'GET',
                                    dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response.create_teacher_id));*/     
                                         display_form_teacher(response['create_teacher_id']);


                                    },


                                    });

                            function display_form_teacher(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            reset_table(data[i]);
                                  
                                    }

                            }  
                                
                           
                            function reset_table(row)
                            {
                                $('.content_header').empty();
                                $('.content_').empty();

                                var header = $('<div class="admin-content-header">'+
                                                    '<h1>'+
                                                        'Add Teacher'+
                                                    '</h1>'+
                                                '</div>');

                                $('.content_header').append(header);

                                var content = $('<div class="admin-main-content">'+
                                                    '<form class="form-horizontal" role="form" id="add-teacher-form" method="post">'+
                                                        '<div class="form-group">'+
                                                            '<div class="col-sm-12">'+
                                                                '<img class="add-teacher-image pull-left" alt="" src="views/res/default_profile_pic.jpg"/>'+
                                                            '</div>'+
                                                            '<div class="col-sm-12">'+
                                                                '<input type="file" name="addteachimg" id="upload-add-teacher-image" class="pull-left teacher-add-image-browse"/>'+
                                                            '</div>'+
                                                             
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">ID</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachid" class="form-control" value="'+row.teacher_id+'" readonly="true">'+
                                                            '</div>'+

                                                            '<label class="col-sm-1 control-label">Birthday</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachbirthday" class="form-control add_teacher bday_datepicker" id="addteachbday">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Last name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachlname" class="form-control add_teacher">'+
                                                            '</div>'+

                                                            '<label class="col-sm-1 control-label">Address</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachaddress" class="form-control add_teacher">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">First name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachfname" class="form-control add_teacher">'+
                                                            '</div>'+

                                                             '<label class="col-sm-1 control-label">Position</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachtposition" class="form-control add_teacher">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Middle name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachmname" class="form-control add_teacher">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Gender</label>'+
                                                            '<div class="col-sm-2">'+
                                                                '<select class="form-control add_teacher_select" id="addteachgender" name="addteachgender" required="required">'+
                                                                     '<option value="Male">Male</option>'+
                                                                     '<option value="Female">Female</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Status</label>'+
                                                            '<div class="col-sm-2">'+
                                                                '<select class="form-control add_teacher_select" id="addteachstatus" name="addteachstatus" required="required">'+
                                                                     '<option value="Single">Single</option>'+
                                                                     '<option value="Married">Married</option>'+
                                                                     '<option value="Widowed">Widowed</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<div class="col-md-offset-10 col-md-2">'+
                                                                '<button type="submit" class="btn btn-primary btn-label-left text-uppercase" id="teacher-add-submit">'+
                                                                    'Submit'+
                                                                '</button>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</form>'+
                                                '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);
                                    
                            }
                        });//add-teacher

                        $(document.body).on('submit', '#add-teacher-form', submitAddTeacherForm);

                        function submitAddTeacherForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-teacher-form',
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
                                               /* alert(JSON.stringify(data));*/
                                              /*window.location.href="index.php?r=lss&tp&atp";*/
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
                        }//end of submit add teacher

                        $(document.body).on('change', '#upload-add-student-image', function(e) 
                        {
                            
                            var img = URL.createObjectURL(e.target.files[0]);
                            $('.add-student-image').attr('src', img);
                        });

                        $(document.body).on('click', '#add-student', function(){
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php?create-student-id',
                                    type: 'GET',
                                    dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response.create_student_id));*/     
                                         display_form_student(response['create_student_id']);


                                    },


                                    });

                            function display_form_student(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            reset_table(data[i]);
                                  
                                    }

                            }  
                                
                           
                            function reset_table(row)
                            {
                                $('.content_header').empty();
                                $('.content_').empty();

                                var header = $('<div class="admin-content-header">'+
                                                    '<h1>'+
                                                        'Add Student'+
                                                    '</h1>'+
                                                '</div>');

                                $('.content_header').append(header);

                                 var content = $('<div class="admin-main-content">'+
                                                    '<form class="form-horizontal" role="form" id="add-student-form" method="post">'+
                                                        '<div class="form-group">'+
                                                            '<div class="col-sm-12">'+
                                                                '<img class="add-student-image pull-left" alt="" src="views/res/default_profile_pic.jpg"/>'+
                                                            '</div>'+
                                                            '<div class="col-sm-12">'+
                                                                '<input type="file" name="addstudimg" id="upload-add-student-image" class="pull-left student-add-image-browse"/>'+
                                                            '</div>'+
                                                             
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">ID</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudid" class="form-control" value="'+row.student_id+'" readonly="true">'+
                                                            '</div>'+

                                                            '<label class="col-sm-1 control-label">Birthday</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudbirthday" class="form-control add_student bday_datepicker" id="addstudbday">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Last name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudlname" class="form-control add_student">'+
                                                            '</div>'+

                                                            '<label class="col-sm-1 control-label">Address</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudaddress" class="form-control add_student">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">First name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudfname" class="form-control add_student">'+
                                                            '</div>'+

                                                             '<label class="col-sm-1 control-label">Guardian:</label>'+
                                                             
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Middle name</label>'+
                                                            '<div class="col-sm-3">'+
                                                                '<input type="text" name="addstudmname" class="form-control add_student">'+
                                                            '</div>'+

                                                            '<label class="col-sm-2 control-label">Last Name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudparentlname" class="form-control add_student">'+
                                                            '</div>'+

                                                        '</div>'+

                                                        '<div class="form-group">'+
                                                           '<label class="col-sm-2 control-label">Gender</label>'+
                                                            '<div class="col-sm-2">'+
                                                                '<select class="form-control add_student_select" id="addstudgender" name="addstudgender" required="required">'+
                                                                     '<option value="Male">Male</option>'+
                                                                     '<option value="Female">Female</option>'+
                                                                '</select>'+
                                                            '</div>'+       

                                                            '<label class="col-md-offset-1 col-sm-2 control-label">First Name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudparentfname" class="form-control add_student">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">Status</label>'+
                                                            '<div class="col-sm-2">'+
                                                                '<select class="form-control add_student_select" id="addstudstatus" name="addstudstatus" required="required">'+
                                                                     '<option value="Single">Single</option>'+
                                                                     '<option value="Married">Married</option>'+
                                                                     '<option value="Widowed">Widowed</option>'+
                                                                '</select>'+
                                                            '</div>'+

                                                            '<label class="col-md-offset-1 col-sm-2 control-label">Middle Name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudparentmname" class="form-control add_student">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<div class="col-md-offset-10 col-md-2">'+
                                                                '<button type="submit" class="btn btn-primary btn-label-left text-uppercase" id="student-add-submit">'+
                                                                    'Submit'+
                                                                '</button>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</form>'+
                                                '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);
                            }
                        });//add-student

                        $(document.body).on('submit', '#add-student-form', submitAddStudentForm);

                        function submitAddStudentForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-student-form',
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
                                               /*alert(JSON.stringify(data));*/
                                              /*window.location.href="index.php?r=lss&sp&asp";*/
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
                        }//end of submit add student

                        $(document.body).on('click', '#add-subject', function(){
                            $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php?create-subject-id',
                                    type: 'GET',
                                    dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response.create_subject_id));*/     
                                         display_form_subject(response['create_subject_id']);


                                    },


                                    });

                            function display_form_subject(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            reset_table(data[i]);
                                  
                                    }

                            }  
                                
                           
                            function reset_table(row)
                            {
                                $('.content_header').empty();
                                $('.content_').empty();

                                var header = $('<div class="admin-content-header">'+
                                                    '<h1>'+
                                                        'Add Subject'+
                                                    '</h1>'+
                                                '</div>');

                                $('.content_header').append(header);

                                var content = $('<div class="admin-main-content">'+
                                                    '<div class="has-padding-top">'+
                                                        '<form class="form-horizontal" role="form" id="add-subject-form" method="post">'+
                                                             '<input type="hidden" name="addsubid" class="form-control" value="'+row.subject_id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label class="col-sm-4 control-label">Subject Title</label>'+
                                                                '<div class="col-sm-4">'+
                                                                    '<input type="text" name="addsubtitle" class="form-control add_subject">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="form-group">'+
                                                                '<div class="col-md-offset-7 col-md-2">'+
                                                                    '<button type="submit" class="btn btn-primary btn-label-left text-uppercase" id="subject-add-submit">'+
                                                                        'Submit'+
                                                                    '</button>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</form>'+
                                                    '</div>'+    
                                                '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);

                                
                            }
                        });//add-subject

                        $(document.body).on('submit', '#add-subject-form', submitAddSubjectForm);

                        function submitAddSubjectForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-subject-form',
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
                                               /*alert(JSON.stringify(data));*/
                                              /*window.location.href="index.php?r=lss&sbs&asbs";*/
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
                        }//end of submit add subject

                        $(document.body).on('click','#add-section', function(){

                            $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php?create-section-id',
                                    type: 'GET',
                                    dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response.create_section_id));*/     
                                         display_form_section(response['create_section_id']);


                                    },


                                    });

                            function display_form_section(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            reset_table(data[i]);
                                  
                                    }

                            }  
                                
                           
                            function reset_table(row)
                            {
                                $('.content_header').empty();
                                $('.content_').empty();

                                var header = $('<div class="admin-content-header">'+
                                                    '<h1>'+
                                                        'Add Section'+
                                                    '</h1>'+
                                                '</div>');

                                $('.content_header').append(header);

                                var content = $('<div class="admin-main-content">'+
                                                    '<div class="has-padding-top">'+
                                                        '<form class="form-horizontal" role="form" id="add-section-form" method="post">'+
                                                            '<input type="hidden" name="addsecid" class="form-control" value="'+row.section_id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label class="col-sm-4 control-label">Section No</label>'+
                                                                '<div class="col-sm-4">'+
                                                                    '<input type="text" name="addsecno" class="form-control add_section">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="form-group">'+
                                                                '<label class="col-sm-4 control-label">Section Name</label>'+
                                                                '<div class="col-sm-4">'+
                                                                    '<input type="text" name="addsecname" class="form-control add_section">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="form-group">'+
                                                                '<div class="col-md-offset-7 col-md-2">'+
                                                                    '<button type="submit" class="btn btn-primary btn-label-left text-uppercase" id="section-add-submit">'+
                                                                        'Submit'+
                                                                    '</button>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</form>'+
                                                    '</div>'+    
                                                '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);
                            }
                        });//add-section
                        
                        $(document.body).on('submit', '#add-section-form', submitAddSectionForm);

                        function submitAddSectionForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-section-form',
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
                                               /*alert(JSON.stringify(data));*/
                                              /*window.location.href="index.php?r=lss&scs&ascs";*/
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
                        }//end of submit add section

                        $(document.body).on('click', '#add-grade', function(){
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php?create-grade-id',
                                    type: 'GET',
                                    dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response.create_grade_id));*/     
                                         display_form_grade(response['create_grade_id']);


                                    },


                                    });

                            function display_form_grade(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            reset_table(data[i]);
                                  
                                    }

                            }  
                                
                           
                            function reset_table(row)
                            {
                                $('.content_header').empty();
                                $('.content_').empty();

                                var header = $('<div class="admin-content-header">'+
                                                    '<h1>'+
                                                        'Add Grade'+
                                                    '</h1>'+
                                                '</div>');

                                $('.content_header').append(header);

                                var content = $('<div class="admin-main-content">'+
                                                    '<div class="has-padding-top">'+
                                                        '<form class="form-horizontal" role="form" id="add-grade-form" method="post">'+
                                                            '<input type="hidden" name="addgradeid" class="form-control" value="'+row.grade_id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label class="col-sm-4 control-label">Grade Level</label>'+
                                                                '<div class="col-sm-4">'+
                                                                    '<input type="text" name="addgradedesc" class="form-control add_grade">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="form-group">'+
                                                                '<div class="col-md-offset-7 col-md-2">'+
                                                                    '<button type="submit" class="btn btn-primary btn-label-left text-uppercase" id="grade-add-submit">'+
                                                                        'Submit'+
                                                                    '</button>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</form>'+
                                                    '</div>'+    
                                                '</div><!--admin-main-content-->');

                                        $('.content_').append(content);
                            }
                        });//add-grade

                        $(document.body).on('submit', '#add-grade-form', submitAddGradeForm);

                        function submitAddGradeForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-grade-form',
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
                                               /*alert(JSON.stringify(data));*/
                                              /*window.location.href="index.php?r=lss&gl&agl";*/
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
                        }//end of submit add grade

                        //Add student from spreadsheet
                        $(document.body).on('click', '#add-student-excel', function()
                        {
                           display_add_student_excel();

                            function display_add_student_excel()
                            {
                                $('.content_header').empty();
                                $('.content_').empty();
                                
                                 var header = $('<div class="admin-content-header">'+
                                                    '<h1>'+
                                                        'Add Student From Spreadsheet '+
                                                    '</h1>'+
                                                '</div>');

                                $('.content_header').append(header);
                                var display = $('<div class="admin-main-content">'+
                                                    '<div class="row"><!--//row for form -->'+
                                                        '<div class="col-md-12 has-padding-top">'+
                                                            '<form class="form-horizontal" method="post" role="form" id="add-student-spreadsheet">'+
                                                               
                                                                '<div class="form-group">'+
                                                                    '<label for="section-name" class="col-md-3 control-label">Upload Spreadsheet:</label>'+
                                                                    '<div class="col-md-3">'+
                                                                        '<input type="file" name="addstudentexcel" id="addstudentexcel" accept="*" />'+
                                                                    '</div>'+
                                                                    '<div class="col-md-2">'+
                                                                        '<button type="submit" class="btn btn-fresh text-uppercase" id="scan-student">Scan Spreadsheet</button>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-2">'+
                                                                        '<button type="button" class="btn btn-primary text-uppercase" id="save-scan-student">Save to database</button>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-2">'+
                                                                        '<button type="reset" class="btn btn-warning text-uppercase" id="reset-scan-student">Reset</button>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</form>'+
                                                        '</div><!--//form-->'+
                                                    '</div><!--//row for form -->'+ 
                                                    '<div class="row"><!--//row for table-->'+
                                                        '<div class="col-md-12">'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-md-5 control-label">Scanned Students</label>'+
                                                                '</div>'+
                                                                '<div class="col-md-12 table-responsive result-table">'+
                                                                    '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
                                                                        '<thead>'+
                                                                            '<tr class="info">'+
                                                                                '<th>No.</th>'+
                                                                                '<th>Last Name</th>'+
                                                                                '<th>First Name</th>'+
                                                                                '<th>Middle Name</th>'+
                                                                                '<th>Gender</th>'+
                                                                                '<th>Status</th>'+
                                                                                '<th>Birthday</th>'+
                                                                                '<th>Address</th>'+
                                                                                '<th>Guardian Last Name</th>'+
                                                                                '<th>Guardian First Name</th>'+
                                                                                '<th>Guardian Middle Name</th>'+
                                                                            '</tr>'+
                                                                        '<thead>'+
                                                                        '<tbody id="scan-student-box">'+
                                                                          
                                                                        '</tbody>'+
                                                                    '</table>'+
                                                                '</div>'+
                                                        '</div>'+
                                                    '</div><!--//row for form -->'+ 
                                                '</div><!--admin-main-content-->');
                           
                                $('.content_').append(display);

                                $('#scan-student').attr('disabled',true);
                                $('#save-scan-student').attr('disabled',true);
                            }

                        });//end of add student from spreadsheet
                        $(document.body).on('change', '#addstudentexcel', function() 
                        {
                            $('#scan-student').attr('disabled',false);
                        });
                        
                        $(document.body).on('click', '#scan-student',function(){

                            $('#save-scan-student').attr('disabled',false);
                        });

                        $(document.body).on('click', '#reset-scan-student',function(){

                            $('#scan-student').attr('disabled',true);
                            $('#save-scan-student').attr('disabled',true);
                            $('#addstudentexcel').prop('disabled', false);
                            $('#scan-student-box').empty();
                        });

                        
                        $(document.body).on('submit', '#add-student-spreadsheet', submitAddStudentSpreadsheet);

                        function submitAddStudentSpreadsheet(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-student-spreadsheet',
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
                                               /*alert(JSON.stringify(data));*/
                                              /*window.location.href="index.php?r=lss&gl&agl";*/
                                                /*console.log(JSON.stringify(data.success));*/
                                              display_scan_data(data.success);
                                              submitScanStudent(data.success); 
                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
                                                $('#scan-student').attr('disabled',true);
                                                $('#save-scan-student').attr('disabled',true);
                                                $('#addstudentexcel').prop('disabled', false);
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

                            function display_scan_data(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            table_data(i+1,data[i]);
                                  
                                    }

                            }

                            function table_data(counter,row)
                            {
                                 var display = $('<tr>'+
                                                    '<td>'+counter+'</td>'+
                                                    '<td>'+row.lastname+'</td>'+
                                                    '<td>'+row.firstname+'</td>'+
                                                    '<td>'+row.middlename+'</td>'+
                                                    '<td>'+row.gender+'</td>'+
                                                    '<td>'+row.status+'</td>'+
                                                    '<td>'+row.birthday+'</td>'+
                                                    '<td>'+row.address+'</td>'+
                                                    '<td>'+row.guardianlastname+'</td>'+
                                                    '<td>'+row.guardianfirstname+'</td>'+
                                                    '<td>'+row.guardianmiddlename+'</td>'+
                                                '</tr>');
                               
                                $('#scan-student-box').append(display);
                                $('#scan-student').attr('disabled',true);
                                $('#addstudentexcel').prop('disabled', true); // Prevent Multiple Files Uploads
                            }  
                                      
                        }//end of submit add student spreadsheet

                        function submitScanStudent(data)
                        {
                            var scan_student=JSON.stringify(data);
                            /*alert(scan_student);*/
                            $(document.body).on('click', '#save-scan-student', function()
                            {
                                $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-scan-student',
                                        type: 'POST',
                                        data: {scan_student : scan_student},
                                        dataType: 'json',
                                        success: function(data, textStatus, jqXHR)
                                        {
                                            
                                            if(typeof data.error === 'undefined')
                                            {
                                               
                                                /*console.log(JSON.stringify(data.success));*/
                                                if( "skipped" in data ) 
                                                {
                                                    if (data.success !== undefined)
                                                    {
                                                        alert(data.success + "\n" +data.skipped);
                                                    }
                                                    else
                                                    {
                                                        alert(data.skipped);
                                                    }    
                                                   
                                                }
                                                else
                                                {
                                                    if (data.success !== undefined)
                                                    {
                                                        alert(data.success);
                                                    }
                                                    
                                                }    

                                                

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

                            });
                        }


                  


});//End of Ready      


               
 </script>          
    </body>
</html>
