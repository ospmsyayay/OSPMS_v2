<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Admin</title>
            <link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
            <link type="text/css" href="views/plugins/jquery-timepicker/jquery.timepicker.css" rel="stylesheet"/>
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
                <div class="left-content col-md-3">
                    <?php include "views/parts/side-bar-admin.php";?>
                </div>
                <!--End of left content-->

                <!--Start of mid content-->
                    <div class="main-content col-md-9">
                        <div class="row content_header"><!--//row for admin-content-header -->
                          
                        </div><!--//row for admin-content-header -->

                        <div class="row content_"><!--row for admin-main-content-->
                             
                        </div><!--row for admin-main-content-->

                            <!-- MODAL Announce-->
                            <div class="modal fade" id="announce-message-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-announce">
                                    <div class="modal-content modal-content-announce">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-bullhorn"></i> School Announcement</h4>
                                        </div>
                                        <form method="post" id="announce-message">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <textarea name="announcement_message" id="announcement_message" class="form-control" placeholder="Write Announcement" style="height: 120px;"></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer clearfix">

                                                <button type="button" class="btn btn-primary pull-right" id="submitAnnouncementMessage"><i class="fa fa-bullhorn"></i> Post Announcement</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        
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
        <script type="text/javascript" src="views/plugins/jquery-timepicker/jquery.timepicker.js"></script>
       

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
            $(document.body).on('focus','#sched_start_time',function()
            {           
                $(this).timepicker({
                    'minTime': '5:45am',
                    'maxTime': '6:30pm',
                    'timeFormat': 'h:i A',
                    useSelect: true
                });
            });

            $(document.body).on('focus','#sched_end_time',function()
            {
                $(this).timepicker({
                    'minTime': '5:45am',
                    'maxTime': '6:30pm',
                    'timeFormat': 'h:i A',
                    useSelect: true
                });
            });

            $(document.body).on('keyup','#sched_start_time',function()
            {
                var start_time=$(this).val();

                 var converted=ConvertTimeformat("24", start_time);
                alert(converted);                  

            });

            $(document.body).on('keyup','#sched_end_time',function()
            {
                var end_time=$(this).val();

                var converted=ConvertTimeformat("24", end_time);
                alert(converted);

            });

            function ConvertTimeformat(format, str) 
            {
                var time = $("#starttime").val();
                var hours = Number(time.match(/^(\d+)/)[1]);
                var minutes = Number(time.match(/:(\d+)/)[1]);
                var AMPM = time.match(/\s(.*)$/)[1];
                if (AMPM == "PM" && hours < 12) hours = hours + 12;
                if (AMPM == "AM" && hours == 12) hours = hours - 12;
                var sHours = hours.toString();
                var sMinutes = minutes.toString();
                if (hours < 10) sHours = "0" + sHours;
                if (minutes < 10) sMinutes = "0" + sMinutes;
                var new_time=sHours + ":" + sMinutes;
                return new_time;
            }


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
                    case 'ann':ann();break;
                }
 
            });

function display_ann()
{
    $('.content_header').empty();
    $('.content_').empty();
    
     var header = $('<div class="admin-content-header">'+
                        '<h1>'+
                            'Add School Announcement '+
                            '<small>Control panel</small>'+
                        '</h1>'+
                    '</div>');

    $('.content_header').append(header);
     var display = $('<div class="admin-main-content">'+
                            '<form class="form-horizontal" role="form">'+
                                '<div class="form-group no-margin-bottom">'+

                                    '<div class="has-margin content">'+   
                                        '<div class="col-md-4">'+
                                            '<button type="button" class="btn btn-primary" id="add-ann">Add School Announcement</button>'+
                                        '</div>'+
                                    '</div>'+   

                                '</div>'+
                            '</form>'+

                            '<div class="col-md-12 result-table">'+
                                '<div class="col-md-offset-1 col-md-10 table-responsive">'+
                                    '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
                                        '<thead>'+
                                            '<tr class="info">'+
                                                '<th>Date Created</th>'+
                                                '<th>Announcement</th>'+
                                                '<th>Active</th>'+
                                                '<th></th>'+
                                            '</tr>'+
                                        '<thead>'+
                                        '<tbody id="ann-box">'+
                                          
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+    
                            '</div>'+
                    '</div><!--admin-main-content-->');
           
        $('.content_').append(display);
}

function ann()
{
       display_ann();


     $.ajax({

        url: 'views/ajax/get_for_administrator.php?ann',
        type: 'GET',
       dataType: 'json',

       success: function(response) 
       {
             
            display_school_announcement(response['school_announcement']);
            
        },


        });


   
}

function display_school_announcement(data) 
{
    $('#ann-box').empty()


    for (var i = 0; i < data.length; i++) 
    {

            display_school_announcement_table(data[i]);
  
    }

}

function display_school_announcement_table(row)
{

    /*alert(row.sa_active);*/

    var display = $('<tr>'+
                        '<td>'+row.sa_date_created+'</td>'+
                        '<td>'+row.sa_message+'</td>'+
                        '<td>'+row.sa_active+'</td>'+
                        '<td><button type="button" id="'+row.sa_date_created+'" class="btn btn-danger delete-ann-id col-lg-11">Delete</button></td>'+
                    '</tr>');

    $('#ann-box').append(display);
}

$(document.body).on('click', '#add-ann', function()
{
    $('#announce-message-modal').modal('show')
});

$(document.body).on('click', '#submitAnnouncementMessage', function()
{
    var announcement=$("#announcement_message").val();
    /*alert(announcement);*/

    $.ajax({

    url: 'views/ajax/get_for_administrator.php?add-announcement',
    type: 'GET',
    data: {
        announcement:announcement
    },
   dataType: 'json',

   success: function(response) 
   {
        
        display_school_announcement(response['school_announcement']);
        alert(response.success); 
        $("#announcement_message").val('');
        $('#announce-message-modal').modal('hide')  
         
    },


    });

});

$(document.body).on('click','.set-active', function(){
    var edit_id=$(this).attr('id');
    var is_active=$(this).attr('is-active');
    /*alert(edit_id);*/
    /*alert(is_active);*/

    $.ajax({

    url: 'views/ajax/get_for_administrator.php?set-announcement',
    type: 'GET',
    data: {
        edit_id:edit_id,is_active:is_active
    },
   dataType: 'json',

   success: function(response) 
   {
        
        display_school_announcement(response['school_announcement']);  
        alert(response.set);
         
    },


    });

});

$(document.body).on('click', '.delete-ann-id', function()
{
    var delete_id=$(this).attr('id');
    /*alert(delete_id);*/

    $.ajax({

    url: 'views/ajax/get_for_administrator.php?delete-announcement',
    type: 'GET',
    data: {
        delete_id:delete_id
    },
   dataType: 'json',

   success: function(response) 
   {
        
        display_school_announcement(response['school_announcement']);  
        alert(response.deleted);
         
    },


    });
});





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
                                '<form class="form-horizontal" method="post" role="form" id="add-class-sched">'+
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
                                        '<label for="section-name" class="col-md-4 control-label">Subject</label>'+
                                        '<div class="col-md-8">'+
                                            '<select class="form-control" id="subject-name" name="subject"  required="required">'+
                                                '<option value="" selected disabled>Subject</option>'+
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
                                        '<label for="sched-day" class="col-md-4 control-label">Sched Days</label>'+
                                        '<div class="col-md-6">'+
                                            '<select class="form-control" id="sched-day" name="schedday" required="required">'+
                                                '<option value="" selected disabled>Sched Days</option>'+
                                                '<option value="MWF">MWF</option>'+
                                                '<option value="TTH">TTH</option>'+
                                                '<option value="M">M</option>'+
                                                '<option value="T">T</option>'+
                                                '<option value="W">W</option>'+
                                                '<option value="TH">TH</option>'+
                                                '<option value="F">F</option>'+
                                                '<option value="Sat">Sat</option>'+
                                                '<option value="MTWTHF">MTWTHF</option>'+
                                                '<option value="MTWTHFSat">MTWTHFSat</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="form-group">'+
                                        '<label for="sched_start_time" class="col-md-4 control-label">Start Time</label>'+
                                        '<div class="input-group bootstrap-timepicker col-md-5" >'+
                                            '<input type="text" id="sched_start_time" name="schedstart" class="form-control" />'+
                                            '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="form-group">'+
                                        '<label for="sched_end_time" class="col-md-4 control-label">End Time</label>'+
                                        '<div class="input-group bootstrap-timepicker col-md-5" >'+
                                            '<input type="text" id="sched_end_time" name="schedend" class="form-control" />'+
                                            '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="form-group">'+
                                        '<div class="col-md-offset-4 col-md-8">'+
                                            '<button type="reset" class="btn btn-sky text-uppercase" id="add-sched-clear">Clear</button>'+
                                            '<button type="submit" class="btn btn-fresh text-uppercase">Submit</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</form>'+
                            '</div><!--//form-->'+
                            '<div class="col-md-8">'+
                                '<form class="form-horizontal" role="form">'+
                                    '<div class="form-group no-margin-bottom">'+
                                        '<label class="col-md-7">Add Students-(Click Row to Add Existing Students)</label>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<div class="has-margin content">'+
                                            '<div class="col-md-5">'+
                                                '<div class="input-group">'+
                                                    '<input type="text" name="q" class="form-control" placeholder="Search..." id="cs_filter"/>'+
                                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<button type="button" class="btn btn-success" id="select-all-ex-student">Select All</button>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<button type="button" class="btn btn-danger" id="deselect-all-ex-student">Deselect All</button>'+
                                            '</div>'+    
                                        '</div>'+   
                                    '</div>'+
                                '</form>'+

                                '<div class="col-md-12 table-responsive result-table">'+
                                    '<table class="table table-bordered table-hover table-condensed content" id="ex-student-table">'+
                                        '<thead>'+
                                            '<tr class="info">'+
                                                '<th>No.</th>'+
                                                '<th>Last Name</th>'+
                                                '<th>First Name</th>'+
                                                '<th>Middle Name</th>'+
                                                '<th>Grade</th>'+
                                                /*'<th>Add</th>'+*/
                                            '</tr>'+
                                        '<thead>'+
                                        '<tbody id="ex-student-box">'+
                                           
                                            
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+

                            '</div>'+
                        '</div><!--//row for form -->'+ 
                    '</div><!--admin-main-content-->');
       
    $('.content_').append(display);
}
                function cs()
                {
                    display_cs();


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
                            display_cs_subject(response['subject']);
                            display_cs_teacher(response['teacher']);
                            display_cs_ex_students(response['ex_students']);
                            
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
                                            '<label class="cold-md-8 control-label">'+row.school_year+'</label>'+
                                            '<input type="hidden" name="schoolyear" value="'+row.school_year+'"/>');
                       
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

                        function display_cs_subject(data)
                        {

                            for (var i = 0; i < data.length; i++) 
                            {

                                    display_subject(data[i]);
                          
                            }

                        }

                        function display_subject(row)
                        {

                            var display = $('<option value="' + row.subjectID + '">' +row.subject_title +'</option>');
                            $("#subject-name").append(display); 
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


                        function display_cs_ex_students(data)
                        {
                            for (var i = 0; i < data.length; i++) 
                            {

                                    display_ex_students(i+1,data[i]);
                          
                            }
                        }

 
                        function display_ex_students(counter,row)
                        {
                            var tr;
                            if(counter%2 != 0)
                            {
                                tr = '<tr id="'+row.reg_id+'" class="row_select tr-striped-orange">';
                            }
                            else
                            {
                                tr='<tr id="'+row.reg_id+'" class="row_select">'
                            }

                            var display = $(tr +
                                                '<td class="data-hover">'+counter+'</td>'+
                                                '<td class="data-hover">'+row.reg_lname+'</td>'+
                                                '<td class="data-hover">'+row.reg_fname+'</td>'+
                                                '<td class="data-hover">'+row.reg_mname+'</td>'+
                                                '<td class="data-hover">'+row.grade+'</td>'+
                                                /*'<td class="data-hover"></td>'+*/
                                            '</tr>');
                       
                            $('#ex-student-box').append(display);
                        }
                        $('#deselect-all-ex-student').attr('disabled',true);
                }
                $(document.body).on('click', '#add-sched-clear', function()
                { 
                    $("#section-name").empty();
                    var display = $('<option value="" selected disabled>Section</option>');

                    $("#section-name").append(display); 
                });
                

                $(document.body).on('click', '#level-name', function()
                { 
                    var id=$(this).val();

                        $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php?cs-get-section',
                        type: 'GET',
                        data: {
                            levelID:id
                        },
                       dataType: 'json',

                       success: function(response) 
                       {

                            display_cs_section(response['section']);
                            
                        },


                        });

                        function display_cs_section(data)
                        {
                            if(jQuery.isEmptyObject(data))
                            {
                                $("#section-name").empty();
                                var display = $('<option value="" selected disabled>Section</option>');

                                $("#section-name").append(display); 
                            } 
                            else
                            {
                                $("#section-name").empty();

                                for (var i = 0; i < data.length; i++) 
                                {

                                        display_section(data[i]);
                              
                                }
                            }   



                        }

                        function display_section(row)
                        {

                            var display = $('<option value="' + row.sectionID + '">' + row.sectionNo + '-' + row.section_name +'</option>');

                            $("#section-name").append(display); 
                        }

                });


                /*var glyphicon='<span class="glyphicon glyphicon-ok" style="display:block; text-align:center;" aria-hidden="true"></span>';*/
                var addexistingstudents = {}; 
                $(document.body).on('click', '.row_select', function()
                {   
                    
                    var selected_id=$(this).attr('id');
                    var no=$(this).children(':first').text();

                     $(this).toggleClass("table-striped-green");


                     if($(this).hasClass('table-striped-green'))
                     {
                       addexistingstudents["row"+no]=selected_id;
                       /*console.log(addexistingstudents);*/

/*                       if(jQuery.isEmptyObject(addexistingstudents))
                       {
                            alert('Empty Object');
                       } */
                     }
                     else
                     {
                       delete addexistingstudents["row"+no];
                       /*console.log(addexistingstudents);*/

 /*                       if(jQuery.isEmptyObject(addexistingstudents))
                       {
                            alert('Empty Object');
                       } */
                     }   
                     
                     
                     /*$(this).children(':last').toggleClass("has-success");
                     
                    if (glyphicon != '') 
                    {

                        $(this).children(':last').append(glyphicon);

                        glyphicon = '';
                    } 
                    else 
                    {
                        $(this).children(':last').children(':last').toggle();
                    }*/
                     /*alert(selected_id);*/ 
                });

               
                $(document.body).on('click', '#select-all-ex-student', function()
                {
                    $('#ex-student-table > tbody  > tr').each(function() 
                    {
                        var selected_id=$(this).attr('id');
                        var no=$(this).children(':first').text();

                        if(!$(this).hasClass('table-striped-green'))
                        {
                           $(this).addClass('table-striped-green'); 
                           addexistingstudents["row"+no]=selected_id;
                           /*console.log(addexistingstudents);*/
                        }

                    });

                    $(this).attr('disabled',true);
                    $('#deselect-all-ex-student').attr('disabled',false);
                });

                $(document.body).on('click', '#deselect-all-ex-student', function()
                {
                    $('#ex-student-table > tbody  > tr').each(function() 
                    {
                        var selected_id=$(this).attr('id');
                        var no=$(this).children(':first').text();

                        if($(this).hasClass('table-striped-green'))
                        {
                           $(this).removeClass('table-striped-green');
                           delete addexistingstudents["row"+no];
                           /*console.log(addexistingstudents);*/
                        }
                    });
                    $(this).attr('disabled',true);
                    $('#select-all-ex-student').attr('disabled',false);
                });

                $(document.body).on('submit', '#add-class-sched', submitAddClassSchedForm);

                function submitAddClassSchedForm(event)
                {
                    event.stopPropagation();
                    event.preventDefault();

                    if(jQuery.isEmptyObject(addexistingstudents))
                    {
                        alert('Please Add Students');
                        /*alert(JSON.stringify(addexistingstudents));*/
                    }
                    else
                    {
 
                            $.ajax({
                                url: 'views/ajax/get_for_administrator.php?add-class-sched',
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
                                      /*  alert(data.success);*/

                                      add_student_to_schedule(data.class_rec_no,data.levelID);
                                      
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
                            
                       /* alert(JSON.stringify(addexistingstudents));*/
                        function add_student_to_schedule(class_rec_no,levelID)
                        {
                            var add_existing_student=JSON.stringify(addexistingstudents);

                                $.ajax({
                                    url: 'views/ajax/get_for_administrator.php?add-student-to-schedule',
                                    type: 'POST',
                                    data: {add_existing_student : add_existing_student, class_rec_no:class_rec_no, levelID:levelID },
                                    dataType: 'json',
                                    success: function(data, textStatus, jqXHR)
                                    {
                                        
                                        if(typeof data.error === 'undefined')
                                        {

                                            if(typeof data.error === 'undefined')
                                            {

                                              cs();
                                              alert(data.success);
                                              /*console.log(JSON.stringify(data.success));*/

                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
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
                        }

                    }//else    

 
                }//end of submit add class schedule

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
                            '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
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



                function ap()
                {
                    display_ap();


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
                                '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
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

                function tp()
                {
                    display_tp();

   
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
                                        '<div class="col-md-5">'+
                                            '<button type="button" class="btn btn-primary" id="add-student">Add Student</button>'+
                                            '<button type="button" class="btn btn-success" id="add-student-excel">Add Student Spreadsheet</button>'+
                                        '</div>'+
                                    '</div>'+   
                                '</div>'+
                            '</form>'+

                            '<div class="col-md-12 table-responsive result-table">'+
                                '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
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

                function sp()
                {
                     display_sp();

   
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
                                    '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
                                        '<thead>'+
                                            '<tr class="info">'+
                                                '<th>Section No</th>'+
                                                '<th>Section Name</th>'+
                                                '<th>Grade level</th>'+
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

                function scs()
                {
                    display_scs();

   
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
                                                '<td>'+rowData.level_description+'</td>'+
                                                '<td><button type="button" id="'+rowData.sectionID+'" class="btn btn-danger delete-section-id col-lg-11">Delete</button></td>'+
                                            '</tr>');
                               
                            $('#scs-box').append(display);
                        }

                }

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
                                    '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
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

                function sbs()
                {
                    display_sbs();

  
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
                                            '<td><button type="button" id="'+rowData.subjectID+'" class="btn btn-danger col-lg-11 delete-subject-id">Delete</button></td>'+
                                        '</tr>');
                           
                            $('#sbs-box').append(display);
                        }
                }

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
                                    '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
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

                function gl()
                {
                    display_gl();

  
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
                                                '<td><button type="button" id="'+rowData.levelID+'" class="btn btn-danger delete-grade-id col-lg-11">Delete</button></td>'+
                                            '</tr>');
                               
                            $('#gl-box').append(display);
                        }
                }

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
                                    '<table class="table table-bordered table-hover table-condensed table-striped-orange content">'+
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
                function ua()
                {
                    display_ua();

    
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
                $(document.body).on('keyup', '#cs_filter', cs_filter);
                $(document.body).on('keyup', '#ap_filter', ap_filter);
                $(document.body).on('keyup', '#tp_filter', tp_filter);
                $(document.body).on('keyup', '#sp_filter', sp_filter);
                $(document.body).on('keyup', '#sbs_filter', sbs_filter);
                $(document.body).on('keyup', '#scs_filter', scs_filter);
                $(document.body).on('keyup', '#gl_filter', gl_filter);
                $(document.body).on('keyup', '#ua_filter', ua_filter);

                function cs_filter() 
                {
                    
                    var filter=$('#cs_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            cs_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                             /*alert(JSON.stringify(response['cs_filter']));*/

                             display_cs_ex_students(response['cs_filter']);
                                
                             
                        },


                        });


                    function display_cs_ex_students(data)
                    {
                        $('#ex-student-box').empty();

                        for (var i = 0; i < data.length; i++) 
                        {

                                display_ex_students(i+1,data[i]);
                      
                        }
                    }

                    function display_ex_students(counter,row)
                    {
                        
                         var tr;
                            if(counter%2 != 0)
                            {
                                tr = '<tr id="'+row.reg_id+'" class="row_select tr-striped-orange">';
                            }
                            else
                            {
                                tr='<tr id="'+row.reg_id+'" class="row_select">'
                            }

                            var display = $(tr +
                                                '<td class="data-hover">'+counter+'</td>'+
                                                '<td class="data-hover">'+row.reg_lname+'</td>'+
                                                '<td class="data-hover">'+row.reg_fname+'</td>'+
                                                '<td class="data-hover">'+row.reg_mname+'</td>'+
                                                '<td class="data-hover">'+row.grade+'</td>'+
                                                /*'<td class="data-hover"></td>'+*/
                                            '</tr>');
                       
                            $('#ex-student-box').append(display);
                        
                    }
                     

                }

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
                                            '<td><button type="button" id="'+rowData.subjectID+'" class="btn btn-danger col-lg-11 delete-subject-id">Delete</button></td>'+
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
                                                '<td>'+rowData.level_description+'</td>'+
                                                '<td><button type="button" id="'+rowData.sectionID+'" class="btn btn-danger delete-section-id col-lg-11">Delete</button></td>'+
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
                                                '<td><button type="button" id="'+rowData.levelID+'" class="btn btn-danger delete-grade-id col-lg-11">Delete</button></td>'+
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

/*                                                                    '<label class="col-md-1 control-label">Address</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edadmaddress" class="form-control edit_admin" value="'+row.reg_address+'" readonly="true">'+
                                                                    '</div>'+*/
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

/*                                                                    '<label class="col-sm-1 control-label">Address</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachaddress" class="form-control edit_teacher" value="'+row.reg_address+'" readonly="true">'+
                                                                    '</div>'+*/
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="col-sm-2 control-label">First name</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachfname" class="form-control edit_teacher" value="'+row.reg_fname+'" readonly="true">'+
                                                                    '</div>'+
/*
                                                                     '<label class="col-sm-1 control-label">Position</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edteachtposition" class="form-control edit_teacher" value="'+row.t_position+'" readonly="true">'+
                                                                    '</div>'+*/
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
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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

/*                                                                    '<label class="col-sm-1 control-label">Address</label>'+
                                                                    '<div class="col-sm-4">'+
                                                                        '<input type="text" name="edstudaddress" class="form-control edit_student" value="'+row[7]+'" readonly="true">'+
                                                                    '</div>'+*/
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
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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
/*
                                                            '<label class="col-sm-1 control-label">Address</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addadmaddress" class="form-control add_admin">'+
                                                            '</div>'+*/
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
                                              ap();
                                              alert(data.success);

                                              
                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
                                            }   

                                            
                                        },
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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

/*                                                            '<label class="col-sm-1 control-label">Address</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachaddress" class="form-control add_teacher">'+
                                                            '</div>'+*/
                                                        '</div>'+
                                                        '<div class="form-group">'+
                                                            '<label class="col-sm-2 control-label">First name</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachfname" class="form-control add_teacher">'+
                                                            '</div>'+

/*                                                             '<label class="col-sm-1 control-label">Position</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addteachtposition" class="form-control add_teacher">'+
                                                            '</div>'+*/
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
                                              tp();
                                              alert(data.success);
                                              
                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
                                            }   

                                            
                                        },
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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
/*
                                                            '<label class="col-sm-1 control-label">Address</label>'+
                                                            '<div class="col-sm-4">'+
                                                                '<input type="text" name="addstudaddress" class="form-control add_student">'+
                                                            '</div>'+*/
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
                                              sp();
                                              alert(data.success);
                                              
                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
                                            }   

                                            
                                        },
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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
                                         display_form_subject_list(response['subjectlist']);
                                         display_learning_areas(response['subjectlist']);


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
                                                    '<div class="row has-padding-top">'+
                                                        '<div class="col-md-6">'+
                                                                '<form class="form-horizontal" role="form" id="add-subject-form" method="post">'+
                                                                     '<input type="hidden" name="addsubid" class="form-control" value="'+row.subject_id+'">'+
                                                                    '<div class="form-group">'+
                                                                        '<label class="col-md-4 control-label">Subject Title</label>'+
                                                                        
                                                                        '<div class="col-md-7">'+
                                                                            '<select class="form-control" id="addsubtitle" name="addsubtitle"  required="required">'+
                                                                                '<option value="" selected disabled></option>'+
                                                                            '</select>'+
                                                                        '</div>'+
                                                            
                                                                    '</div>'+
                                                                    '<div class="form-group">'+
                                                                        '<div class="col-md-offset-8 col-md-2">'+
                                                                            '<button type="submit" class="btn btn-primary btn-label-left text-uppercase" id="subject-add-submit">'+
                                                                                'Submit'+
                                                                            '</button>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</form>'+
                                                        '</div><!--//has-padding-top-->'+ 

                                                        '<div class="col-md-5 table-responsive no-padding">'+ 
                                                            '<div class="panel panel-info">'+
                                                                '<div class="panel-body">'+

                                                                    '<div class="panel panel-default no-margin-bottom">'+
                                                                      '<div class="panel-heading learning-areas-title">'+
                                                                        '<div>K12 Learning Areas for Grade  1-3 </div>'+
                                                                      '</div>'+
                                                                    '</div>'+
                                                                    '<div class="panel-body">'+

                                                                        '<table class="table table-bordered table-hover table-striped-orange">'+
                                                                            '<tbody id="learning-areas-table">'+
                                                                                
                                                                                
                                                                            '</tbody>'+
                                                                        '</table>'+
                                                                    '</div>'+    

                                                                '</div><!--panel-body-->'+
                                                            '</div><!-panel-info-->'+    
                                                        '</div>'+

                                                    '</div>'+
                                                '</div><!--admin-main-content-->');
                                           
                                        $('.content_').append(content);

                                
                            }

                            function display_form_subject_list(data)
                            {
                                for (var i = 0; i < data.length; i++) 
                                {

                                        display_subject_list(data[i]);
                              
                                }
                            }

                            function display_subject_list(row)
                            {
                                var display = $('<option value="' + row.subject_name + '">' + row.subject_name + '</option>');
                                $("#addsubtitle").append(display); 
                            }

                            function display_learning_areas(data)
                            {

                                $("#learning-areas-table").empty();

                                for (var i = 0; i < data.length; i++) 
                                {

                                        drawRow(data[i]);
                                    
                              
                                }

                                function drawRow(row) 
                                {
                                    var display = $('<tr>' +
                                                        '<td>'+row.subject_name+'</td>'+
                                                    '</tr>');
                                   
                                    $("#learning-areas-table").append(display);

                                }
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
                                              sbs();
                                              alert(data.success);
                                              
                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
                                            }   

                                            
                                        },
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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
                                         display_form_section_grade_level(response['level']);

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
                                                                '<label for="addseclevelname" class="col-md-4 control-label">Grade level:</label>'+
                                                                '<div class="col-md-2">'+
                                                                    '<select class="form-control" id="addseclevelname" name="addseclevelname"  required="required">'+
                                                                        '<option value="" selected disabled></option>'+
                                                                    '</select>'+
                                                                '</div>'+
                                                            '</div>'+

/*                                                            '<div class="form-group">'+
                                                                '<label class="col-sm-4 control-label">Section No</label>'+
                                                                '<div class="col-sm-1">'+
            
                                                                    '<select class="form-control" name="addsecno" required="required">'+
                                                                        '<option value="" selected disabled></option>'+
                                                                        '<option value="1">1</option>'+
                                                                        '<option value="2">2</option>'+
                                                                        '<option value="3">3</option>'+
                                                                        '<option value="4">4</option>'+
                                                                        '<option value="5">5</option>'+
                                                                        '<option value="6">6</option>'+
                                                                        '<option value="7">7</option>'+
                                                                        '<option value="8">8</option>'+
                                                                        '<option value="9">9</option>'+
                                                                        '<option value="10">10</option>'+

                                                                    '</select>'+
                                                                '</div>'+
                                                            '</div>'+*/

                                                            '<div class="form-group">'+
                                                                '<label for="addsecname" class="col-md-4 control-label">Section Name </label>'+
                                                                '<div class="col-md-2">'+
                                                                    '<select class="form-control" id="addsecname" name="addsecname"  required="required">'+
                                                                        '<option value="" selected disabled></option>'+
                                                                    '</select>'+
                                                                '</div>'+
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<div class="col-md-offset-5 col-md-2">'+
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
                            function display_form_section_grade_level(data)
                            {
                                for (var i = 0; i < data.length; i++) 
                                {

                                        display_level(data[i]);
                              
                                }
                            }

                            function display_level(row)
                            {
                                var display = $('<option value="' + row.levelID + '">' + row.level_description + '</option>');
                                $("#addseclevelname").append(display); 
                            }

                        });//add-section

                        //get section names
                        $(document.body).on('change','#addseclevelname', function(){
                            var gradelevel=$(this).find('option:selected').text();
                            /*alert(gradelevel);*/

                            $.ajax({
     
                            url: 'views/ajax/get_for_administrator.php?get-section-list&gradelevel='+gradelevel,
                            type: 'GET',
                            dataType: 'json',

                           success: function(response) 
                           {
                                /*alert(JSON.stringify(response['sectionlist'])); */    
                              
                                 display_form_section_list(response['sectionlist']);

                            },


                            });
                            

                            function display_form_section_list(data)
                            {
                                $("#addsecname").empty();
                                for (var i = 0; i < data.length; i++) 
                                {

                                        display_section_list(data[i]);
                              
                                }
                            }

                            function display_section_list(row)
                            {
                                var display = $('<option value="' + row.section_name + '">' + row.section_name + '</option>');
                                $("#addsecname").append(display); 
                            }



                        });
                        
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
                                              scs();
                                              alert(data.success);
                                              
                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
                                            }   

                                            
                                        },
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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
                                                                '<label class="col-sm-2 control-label">Grade Level</label>'+

                                                                '<div class="col-md-1">'+
                                                                    '<select class="form-control" name="addgradedesc"  required="required">'+
                                                                        '<option value="" selected disabled></option>'+
                                                                        '<option value="1">1</option>'+
                                                                        '<option value="2">2</option>'+
                                                                        '<option value="3">3</option>'+
                                                                        '<option value="4">4</option>'+
                                                                        '<option value="5">5</option>'+
                                                                        '<option value="6">6</option>'+
                                                                    '</select>'+
                                                                '</div>'+

                                                                '<div class="col-md-2">'+
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
                                              gl();
                                               alert(data.success);
                                              
                                            }
                                            else
                                            {
                                                alert('Error: '+data.error);
                                            }   

                                            
                                        },
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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
/*                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            
                                                alert('ERROR: ' + textStatus);
                                            
                                        },*/
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
                                                        sp();
                                                        alert(data.success + "\n" +data.skipped);
                                                    }
                                                    else
                                                    {
                                                        sp();
                                                        alert(data.skipped);
                                                    }    
                                                   
                                                }
                                                else
                                                {
                                                    if (data.success !== undefined)
                                                    {
                                                        sp();
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
                                            
                                                alert('ERROR: ' + textStatus +' '+ errorThrown);
                                            
                                        },
                                        complete: function()
                                        {
                                            // Completed
                                        }
                            
                                    });  

                            });
                        }

                        $(document.body).on('click', '.delete-grade-id',function()
                        {
                            var id=$(this).attr('id');
                           /* alert(id);*/
                           $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?delete-grade',
                                        type: 'POST',
                                        data: {grade_id : id},
                                        dataType: 'json',
                                        success: function(data, textStatus, jqXHR)
                                        {
                                            
                                            if(typeof data.error === 'undefined')
                                            {
                                               
                                                /*console.log(JSON.stringify(data.success));*/
                                                gl();
                                                 alert(data.success);
                                               
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
                        });

                        $(document.body).on('click', '.delete-section-id',function()
                        {
                            var id=$(this).attr('id');
                            /*alert(id);*/
                            $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?delete-section',
                                        type: 'POST',
                                        data: {section_id : id},
                                        dataType: 'json',
                                        success: function(data, textStatus, jqXHR)
                                        {
                                            
                                            if(typeof data.error === 'undefined')
                                            {
                                               
                                                /*console.log(JSON.stringify(data.success));*/
                                                scs();
                                                alert(data.success);
                                               
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
                        });

                        $(document.body).on('click', '.delete-subject-id',function()
                        {
                            var id=$(this).attr('id');
                            /*alert(id);*/
                            $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?delete-subject',
                                        type: 'POST',
                                        data: {subject_id : id},
                                        dataType: 'json',
                                        success: function(data, textStatus, jqXHR)
                                        {
                                            
                                            if(typeof data.error === 'undefined')
                                            {
                                               
                                                /*console.log(JSON.stringify(data.success));*/
                                                sbs();
                                                alert(data.success);
                                               
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
                        });



                  


});//End of Ready      


               
 </script>          
    </body>
</html>
