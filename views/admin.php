<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <link href="views/bootstrap.css" rel="stylesheet"/>
            <link href="views/admin.css" rel="stylesheet" />
    </head>
    <body class="skin-blue" onload="check()">
        <script>
        function check()
        {
        <?php
            if (isset($_GET['ss']))
            {                               
        ?>
                alert('Login Successful');
        <?php                   
            }
         ?>
         }
         </script>   
  
        <header class="header">
            <a href="index.php?r=lss" class="logo">
                OSPMS Admin
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
              
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                    
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>
                            <?php 
                                if((isset($_SESSION['reg_fname'])))
                                {
                                echo ''.$_SESSION['reg_fname'].'';                     
                                }
                            ?> 
                        <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                    
                                <li class="user-header bg-light-blue">
                                    <img src="views/res/avatar5.png" class="img-circle" alt="User Image" />
                                    <?php
                                      if((isset($_SESSION['reg_lname'])) and (isset($_SESSION['reg_fname'])))
                                        {
                                            echo '<p>Hi, '.$_SESSION['reg_fname'].'</p>';                     
                                         }
                                        
                                    ?>
                                </li>
                                
                         
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="index.php?r=xt" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
        
            <aside class="left-side sidebar-offcanvas">
           
                <section class="sidebar">
                 
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="views/res/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                        <?php 
                        if(isset($_SESSION['reg_fname']))
                        {
                            echo '<p>Hello, '.$_SESSION['reg_fname'].'</p>';
                        }
                        ?>   
                        </div>
                    </div>
             
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php?r=lss&ap">
                                <i class=""></i> <span>Manage Administrator Profile </span>
                            </a>
                        </li>
                         <li>
                            <a href="index.php?r=lss&tp">
                                <i class=""></i> <span>Manage Teacher Profile</span>
                            </a>
                        </li>
                         <li>
                            <a href="index.php?r=lss&sp">
                                <i class=""></i> <span>Manage Student Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?r=lss&sbs">
                                <i class=""></i> <span>Manage Subjects</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?r=lss&scs">
                                <i class=""></i> <span>Manage Sections</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?r=lss&gl">
                                <i class=""></i> <span>Manage Grade Levels</span>
                            </a>
                        </li>
                         <li>
                            <a href="index.php?r=lss&ps">
                                <i class=""></i> <span>Manage Posts</span>
                            </a>
                        </li>
                        
                    </ul>
                </section>
         
            </aside>

            <aside class="right-side">
            <?php    
            if(isset($_GET['ap']))
            {
            ?>
                <section class="content-header">
                    <h1>
                        Administrator Profile
                        <small>Control panel</small>
                    </h1>
                    
                </section>

                <section class="content">

                    <div class="row">
                        <!-- upper -->
                   <!--  <form action="#" method="" class="sidebar-form"> -->
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="ap_filter" />
                            <span class="input-group-btn">
                                <button type='button' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Birthday</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody id="ap-box">
                                     <?php   
                                        foreach($adminlist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['reg_id'].'</td>';
                                            echo '<td>'.$row['reg_lname'].'</td>';
                                            echo '<td>'.$row['reg_fname'].'</td>';
                                            echo '<td>'.$row['reg_mname'].'</td>';
                                            echo '<td>'.$row['reg_gender'].'</td>';
                                            echo '<td>'.$row['reg_status'].'</td>';
                                            echo '<td>'.$row['reg_birthday'].'</td>';
                                            echo '<td>'.$row['reg_address'].'</td>';
                                            echo '<td><div align="left"><img src="'.$row['image'].'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>
                           </table>
                        </section>

                        <section class="col-lg-2 connectedSortable"> 
                            <a href="#">Add Administrator</a>
                            <a href="#">Edit Profile</a>
                                            
                        </section>
                    </div>

                </section>
            <?php    
            }

            else if(isset($_GET['tp']))
            {   
            ?>
             <section class="content-header">
                    <h1>
                        Teacher Profile
                        <small>Control panel</small>
                    </h1>
                    
                </section>

                <section class="content">

                    <div class="row">
                        <!-- upper -->
                        <!-- <form action="#" method="" class="sidebar-form"> -->
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="tp_filter"/>
                            <span class="input-group-btn">
                                <button type='button' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                   <!--  </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Birthday</th>
                                        <th>Address</th>
                                        <th>Position</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody id="tp-box">    
                                     <?php   
                                        foreach($teacherlist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['reg_id'].'</td>';
                                            echo '<td>'.$row['reg_lname'].'</td>';
                                            echo '<td>'.$row['reg_fname'].'</td>';
                                            echo '<td>'.$row['reg_mname'].'</td>';
                                            echo '<td>'.$row['reg_gender'].'</td>';
                                            echo '<td>'.$row['reg_status'].'</td>';
                                            echo '<td>'.$row['reg_birthday'].'</td>';
                                            echo '<td>'.$row['reg_address'].'</td>';
                                            echo '<td>'.$row['t_position'].'</td>';
                                            echo '<td><div align="left"><img src="'.$row['image'].'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                            </table>
                        </section>

                        <section class="col-lg-2 connectedSortable"> 
                            <a href="#">Add Teacher</a>
                            <a href="#">Edit Profile</a>
                                            
                        </section>
                    </div>

                </section>
            <?php 
            }
            else if(isset($_GET['sp']))
             {   
            ?>
             <section class="content-header">
                    <h1>
                        Student Profile
                        <small>Control panel</small>
                    </h1>
                    
                </section>

                <section class="content">

                    <div class="row">
                        <!-- upper -->
                        <!-- <form action="#" method="" class="sidebar-form"> -->
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="sp_filter"/>
                            <span class="input-group-btn">
                                <button type='button' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Birthday</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Guardian</th>
                                    </tr>
                                </thead>
                                <tbody id="sp-box">    
                                     <?php   
                                        foreach($studentlist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['reg_id'].'</td>';
                                            echo '<td>'.$row['reg_lname'].'</td>';
                                            echo '<td>'.$row['reg_fname'].'</td>';
                                            echo '<td>'.$row['reg_mname'].'</td>';
                                            echo '<td>'.$row['reg_gender'].'</td>';
                                            echo '<td>'.$row['reg_status'].'</td>';
                                            echo '<td>'.$row['reg_birthday'].'</td>';
                                            echo '<td>'.$row['reg_address'].'</td>';
                                            echo '<td><div align="left"><img src="'.$row['image'].'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>';
                                            echo '<td>'.$row['p_reg_lname'].' '.$row['p_reg_fname'].' '.$row['p_reg_mname'].'</td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                            </table>
                        </section>

                        <section class="col-lg-2 connectedSortable"> 
                            <a href="#">Add Student</a>
                            <a href="#">Edit Profile</a>
                                            
                        </section>
                    </div>

                </section>
             <?php
             }
             else if(isset($_GET['sbs']))
             {   
             ?>
             <section class="content-header">
                    <h1>
                        Subject
                        <small>Control panel</small>
                    </h1>
                    
                </section>

                <section class="content">

                    <div class="row">
                        <!-- upper -->
                        <!-- <form action="#" method="" class="sidebar-form"> -->
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="sbs_filter"/>
                            <span class="input-group-btn">
                                <button type='button' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject Title</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="sbs-box">
                                     <?php   
                                        foreach($subjectlist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['subjectID'].'</td>';
                                            echo '<td>'.$row['subject_title'].'</td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>
                            </table>
                        </section>

                        <section class="col-lg-2 connectedSortable"> 
                            <a href="#">Add Subject</a>
                            <a href="#">Edit Subject</a>
                                            
                        </section>
                    </div>

                </section>
             <?php 
             }
             else if(isset($_GET['scs']))
             { 
             ?>
                 <section class="content-header">
                    <h1>
                        Section
                        <small>Control panel</small>
                    </h1>
                    
                </section>

                <section class="content">

                    <div class="row">
                        <!-- upper -->
                        <!-- <form action="#" method="" class="sidebar-form"> -->
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="scs_filter"/>
                            <span class="input-group-btn">
                                <button type='button' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject Title</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="scs-box">
                                     <?php   
                                        foreach($sectionlist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['sectionNo'].'</td>';
                                            echo '<td>'.$row['section_name'].'</td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                                
                            </table>
                        </section>

                        <section class="col-lg-2 connectedSortable"> 
                            <a href="#">Add Section</a>
                            <a href="#">Edit Section</a>
                                            
                        </section>
                    </div>

                </section>
             <?php
              }
              else if(isset($_GET['gl']))
             { 
             ?> 
                <section class="content-header">
                    <h1>
                        Grade level
                        <small>Control panel</small>
                    </h1>
                    
                </section>

                <section class="content">

                    <div class="row">
                        <!-- upper -->
                        <!-- <form action="#" method="" class="sidebar-form"> -->
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="gl_filter"/>
                            <span class="input-group-btn">
                                <button type='button' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Grade level</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="gl-box">
                                    <?php   
                                        foreach($gradelevellist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['levelID'].'</td>';
                                            echo '<td>'.$row['level_description'].'</td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                                    
                            </table>
                        </section>

                        <section class="col-lg-2 connectedSortable"> 
                            <a href="#">Add Grade level</a>
                            <a href="#">Edit Grade level</a>
                                            
                        </section>
                    </div>

                </section>
             <?php
             }
            else if(isset($_GET['ps']))
             { 
             ?> 
                 <section class="content-header">
                    <h1>
                        Announcement/Lecture 
                        <small>Control panel</small>
                    </h1>
                    
                </section>

                <section class="content">

                    <div class="row">
                        <!-- upper -->
                        <!-- <form action="#" method="" class="sidebar-form"> -->
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="ps_filter"/>
                            <span class="input-group-btn">
                                <button type='button' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>Date Created</th>
                                        <th>Message or File Caption</th>
                                        <th>File Path</th>
                                        <th>File Name</th>
                                        <th>Section No</th>
                                        <th>Section Name</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="ps-box">    
                                     <?php   
                                        foreach($announcement_lecturelist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['date_created'].'</td>';
                                            echo '<td>'.$row['messageorfile_caption'].'</td>';
                                            echo '<td>'.$row['file_path'].'</td>';
                                            echo '<td>'.$row['file_name'].'</td>';
                                            echo '<td>'.$row['sectionNo'].'</td>';
                                            echo '<td>'.$row['section_name'].'</td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                            </table>
                        </section>

                        <section class="col-lg-2 connectedSortable"> 
                            <a href="#">Add announcement</a>
                            <a href="#">Edit announcement</a>
                                            
                        </section>
                    </div>

                </section>
             <?php
             }
             else
             {
             ?>   
                 <section class="content-header">
                    <h1>
                        Welcome Administrator
                    </h1>
                    
                </section>
                <section class="welcome-content">
                  
                </section>   


             <?php
             }   
             ?> 
            </aside>
        </div>


        <script src="views/app.js" type="text/javascript"></script>
        <script src="views/dashboard.js" type="text/javascript"></script>
        <script src="views/demo.js" type="text/javascript"></script>



        <script src="views/transition.js"></script>
        <script src="views/jquery.min.js"></script>
        <script src="views/bootstrap.min.js"></script>
        <script src="views/tab.js"></script>
        <script src="views/tooltip.js"></script>
        <script src="views/popover.js"></script>
        <script src="views/scripts.js"></script>
           
 <script>
                $('#ap_filter').on('keyup', ap_filter);
                $('#tp_filter').on('keyup', tp_filter);
                $('#sp_filter').on('keyup', sp_filter);
                $('#sbs_filter').on('keyup', sbs_filter);
                $('#scs_filter').on('keyup', scs_filter);
                $('#gl_filter').on('keyup', gl_filter);
                $('#ps_filter').on('keyup', ps_filter);

                function ap_filter() 
                {
                    
                    var filter=$('#ap_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/get_for_administrator.php',
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
                                            '<td><div align="left"><img src="'+rowData.image+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '</tr>');
                           
                        $('#ap-box').append(display);
                    }
                     

                }

                function tp_filter()
                {
                    var filter=$('#tp_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/get_for_administrator.php',
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
                                            '<td><div align="left"><img src="'+rowData.image+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                        '</tr>');
                           
                        $('#tp-box').append(display);
                    }
                }

                 function sp_filter()
                 {
                    var filter=$('#sp_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/get_for_administrator.php',
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
                                            '<td><div align="left"><img src="'+rowData[8]+'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>'+
                                            '<td>'+rowData[9]+' '+rowData[10]+' '+rowData[11]+'</td>'+
                                        '</tr>');
                           
                        $('#sp-box').append(display);
                    }


                 }

                 function sbs_filter()
                 {
                    var filter=$('#sbs_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/get_for_administrator.php',
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
                                            '<td>'+rowData.subjectID+'</td>'+
                                            '<td>'+rowData.subject_title+'</td>'+
                                        '</tr>');
                           
                        $('#sbs-box').append(display);
                    }
                 }

                 function scs_filter()
                 {
                    var filter=$('#scs_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/get_for_administrator.php',
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
                                            '</tr>');
                               
                            $('#scs-box').append(display);
                        }

                   
                 }

                 function gl_filter()
                 {
                    var filter=$('#gl_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/get_for_administrator.php',
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
                                                '<td>'+rowData.levelID+'</td>'+
                                                '<td>'+rowData.level_description+'</td>'+
                                            '</tr>');
                               
                            $('#gl-box').append(display);
                        }
                 }

                 function ps_filter()
                 {
                    var filter=$('#ps_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            ps_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                            /* alert(JSON.stringify(response['ps_filter']));*/
                            display_ps_filter(response['ps_filter']);     
                             
                        },


                        });

                        function display_ps_filter(data) 
                        {
                            $('#ps-box').empty()
                            

                                for (var i = 0; i < data.length; i++) 
                                {

                                        reset_table(data[i]);
                              
                                }

                        }

                        function reset_table(rowData)
                        {

                            var display = $('<tr>'+
                                                '<td>'+rowData.date_created+'</td>'+
                                                '<td>'+rowData.messageorfile_caption+'</td>'+
                                                '<td>'+rowData.file_path+'</td>'+
                                                '<td>'+rowData.file_name+'</td>'+
                                                '<td>'+rowData.sectionNo+'</td>'+
                                                '<td>'+rowData.section_name+'</td>'+
                                            '</tr>');
                               
                            $('#ps-box').append(display);
                        }

                    
                 } 
               
 </script>          
    </body>
</html>
