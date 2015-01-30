<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <link href="views/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
            <link href="views/css/admin.css" rel="stylesheet" />
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
                            <button type="button" class="btn btn-primary pull-left" id="add-admin">Add Administrator</button>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-12 rconnectedSortable">                            
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
                                        <th></th>
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
                                            echo '<td><div align="left"><img src="views/res/'.$row['image'].'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>';
                                            echo '<td><button type="button" id="'.$row['reg_id'].'" class="btn btn-warning admin-id">Edit/Update</button></td>';
                                            echo '</tr>';
                                        
                                        }    
                                    ?>
                                </tbody>
                           </table>
                       <!--  <form name="adminidhidden" method="post" id="adminidhidden">
                            <input type="hidden" id="admin-hidden-id" name="admin-id" value=""/>
                        </form> -->
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
                             <button type="button" class="btn btn-primary pull-left" id="add-teacher">Add Teacher</button>
                        </div>
                   <!--  </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-12 connectedSortable">                            

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
                                        <th></th>
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
                                            echo '<td><div align="left"><img src="views/res/'.$row['image'].'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>';
                                            echo '<td><button type="button" id="'.$row['reg_id'].'" class="btn btn-warning teacher-id">Edit/Update</button></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                            </table>
                        </section>

                        <section class="col-lg-2 connectedSortable">
                           
                           
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
                             <button type="button" class="btn btn-primary pull-left" id="add-student">Add Student</button>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-12 connectedSortable">                            

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
                                        <th></th>
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
                                            echo '<td><div align="left"><img src="views/res/'.$row['image'].'" class="img-circle" alt="User Image" width="50px;" height="50px;"/></div></td>';
                                            echo '<td>'.$row['p_reg_lname'].' '.$row['p_reg_fname'].' '.$row['p_reg_mname'].'</td>';
                                            echo '<td><button type="button" id="'.$row['reg_id'].'" class="btn btn-warning student-id">Edit/Update</button></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                            </table>
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
                             <button type="button" class="btn btn-primary pull-left" id="add-subject">Add Subject</button>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-12 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject Title</th>
                                        <th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="sbs-box">
                                     <?php   
                                        foreach($subjectlist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['subjectID'].'</td>';
                                            echo '<td>'.$row['subject_title'].'</td>';
                                            echo '<td><button type="button" id="'.$row['subjectID'].'" class="btn btn-warning col-lg-12 subject-id">Edit/Update</button></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>
                            </table>
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
                             <button type="button" class="btn btn-primary pull-left" id="add-section">Add Section</button>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-12 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Section No</th>
                                        <th>Section Name</th>
                                        <th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="scs-box">
                                     <?php   
                                        foreach($sectionlist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['sectionID'].'</td>';
                                            echo '<td>'.$row['sectionNo'].'</td>';
                                            echo '<td>'.$row['section_name'].'</td>';
                                            echo '<td><button type="button" id="'.$row['sectionID'].'" class="btn btn-warning section-id col-lg-12">Edit/Update</button></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                                
                            </table>
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
                             <button type="button" class="btn btn-primary pull-left" id="add-grade">Add Grade level</button>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-12 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Grade level</th>
                                        <th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="gl-box">
                                    <?php   
                                        foreach($gradelevellist as $row)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$row['levelID'].'</td>';
                                            echo '<td>'.$row['level_description'].'</td>';
                                            echo '<td><button type="button" id="'.$row['levelID'].'" class="btn btn-warning grade-id col-lg-12">Edit/Update</button></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                                    
                            </table>
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
                            <button type="button" class="btn btn-primary pull-left" id="add-post">Add announcement</button>
                        </div>
                    <!-- </form> -->
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-12 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>Date Created</th>
                                        <th>Message or File Caption</th>
                                        <th>File Path</th>
                                        <th>File Name</th>
                                        <th>Section No</th>
                                        <th>Section Name</th>
                                        <th>Teacher</th>
                                        <th></th>
                                       
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
                                            echo '<td>'.$row['reg_lname'].' '.$row['reg_fname'].' '.$row['reg_mname'].'</td>';
                                            echo '<td><button type="button" id="'.$row['date_created'].'" class="btn btn-warning announcement-lecture-id">Edit/Update</button></td>';
                                            echo '</tr>';
                                        }    
                                    ?>
                                </tbody>    
                            </table>
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


        <script src="views/plugins/bootstrap/app.js" type="text/javascript"></script>
        <script src="views/plugins/bootstrap/dashboard.js" type="text/javascript"></script>
        <script src="views/plugins/bootstrap/demo.js" type="text/javascript"></script>
        <script src="views/plugins/bootstrap/transition.js"></script>
        <script src="views/plugins/bootstrap/jquery.min.js"></script>
        <script src="views/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="views/plugins/bootstrap/tab.js"></script>
        <script src="views/plugins/bootstrap/tooltip.js"></script>
        <script src="views/plugins/bootstrap/popover.js"></script>
        <script src="views/js/scripts.js"></script>
         <!-- Load jQuery JS -->
        <script src="views/plugins/bootstrap/jquery-1.11.1.js"></script>
        <!-- Load jQuery UI Main JS  -->
        <script src="views/plugins/jquery-ui/jquery-ui.js"></script>

        <script>
        $(function() 
        {
            $(document.body).on('focus','.bday_datepicker',function(event){
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
                
        });
        </script>

           
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
                                            '<td>'+rowData.subjectID+'</td>'+
                                            '<td>'+rowData.subject_title+'</td>'+
                                            '<td><button type="button" id="'+rowData.subjectID+'" class="btn btn-warning col-lg-12 subject-id">Edit/Update</button></td>'+
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
                                                '<td><button type="button" id="'+rowData.sectionID+'" class="btn btn-warning section-id col-lg-12">Edit/Update</button></td>'+
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
                                                '<td>'+rowData.levelID+'</td>'+
                                                '<td>'+rowData.level_description+'</td>'+
                                                '<td><button type="button" id="'+rowData.levelID+'" class="btn btn-warning grade-id col-lg-12">Edit/Update</button></td>'+
                                            '</tr>');
                               
                            $('#gl-box').append(display);
                        }
                 }

                 function ps_filter()
                 {
                    var filter=$('#ps_filter').val();
                    /*alert(filter);*/
                    
                    
                    $.ajax({
             
                        url: 'views/ajax/get_for_administrator.php',
                        type: 'GET',
                        data: {
                            ps_filter:filter
                        },
                       dataType: 'json',

                       success: function(response) 
                       {
                            
                            /*alert(JSON.stringify(response['ps_filter']));*/
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
                                                '<td>'+rowData.reg_lname+' '+rowData.reg_fname+' '+rowData.reg_mname+'</td>'+
                                                '<td><button type="button" id="'+rowData.date_created+'" class="btn btn-warning announcement-lecture-id">Edit/Update</button></td>'+
                                            '</tr>');
                               
                            $('#ps-box').append(display);
                        }

                    
                 }

                $(function()
                {
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
                                        $('.content-header').empty();
                                        $('.content').empty();

                                        var header = $('<h1>'+
                                                         'Edit Administrator'+
                                                        '<small>Profile</small>'+
                                                      '</h1>');

                                            $('.content-header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    }

                                    function reset_table(row)
                                    {

                                        var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="edit-admin-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-12">'+
                                                                                        '<img class="edit-admin-image pull-left" alt="" src="views/res/'+row.image+'"/>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-12">'+
                                                                                        '<input type="file" name="edadmimg" id="upload-edit-admin-image" class="pull-left admin-edit-image-browse" style="display:none;"/>'+
                                                                                    '</div>'+
                                                                                     
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edadmid" class="form-control" value="'+row.reg_id+'" readonly="true">'+
                                                                                    '</div>'+

                                                                                    '<label class="col-sm-1 control-label">Birthday</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edadmbirthday" class="form-control edit_admin" value="'+row.reg_birthday+'" readonly="true" id="edadbday">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Last name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edadmlname" class="form-control edit_admin" value="'+row.reg_lname+'" readonly="true">'+
                                                                                    '</div>'+

                                                                                    '<label class="col-sm-1 control-label">Address</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edadmaddress" class="form-control edit_admin" value="'+row.reg_address+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">First name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edadmfname" class="form-control edit_admin" value="'+row.reg_fname+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Middle name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edadmmname" class="form-control edit_admin" value="'+row.reg_mname+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                 '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Gender</label>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<select class="form-control edit_admin_select" id="edadmgender" name="edadmgender" required="required" disabled="disabled">'+
                                                                                             '<option value="Male">Male</option>'+
                                                                                             '<option value="Female">Female</option>'+
                                                                                        '</select>'+
                                                                                    '</div>'+        
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Status</label>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<select class="form-control edit_admin_select" id="edadmstatus" name="edadmstatus" required="required" disabled="disabled">'+
                                                                                             '<option value="Single">Single</option>'+
                                                                                             '<option value="Married">Married</option>'+
                                                                                             '<option value="Widowed">Widowed</option>'+
                                                                                        '</select>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="admin-edit-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="button" class="btn btn-warning btn-label-left pull-right" id="admin-edit-update">'+
                                                                                            'Update Information'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="admin-edit-submit">'+
                                                                                            'Save Changes'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);

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


                                    }

                        });//end of admin id

                       
                        $(document.body).on('click', '#admin-edit-update',function(){
                            $('.edit_admin').removeProp("readonly");
                            $('#upload-edit-admin-image').removeProp("style");
                            $('#edadbday').addClass('bday_datepicker');
                            $('.bday_datepicker').datepicker('enable');
                            $('.edit_admin_select').removeAttr('disabled');
                        });

                        $(document.body).on('click', '#admin-edit-reset', function(){
                            $('.edit_admin').prop("readonly","true");
                            $('#upload-edit-admin-image').css("display","none");
                            $('.bday_datepicker').datepicker('disable');
                            $('.edit_admin_select').attr('disabled',true);
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
                                                window.location.href="index.php?r=lss&ap&ape";
                                              
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
                                        $('.content-header').empty();
                                        $('.content').empty();

                                        var header = $('<h1>'+
                                                         'Edit Teacher'+
                                                        '<small>Profile</small>'+
                                                      '</h1>');

                                            $('.content-header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {
                                        
                                        var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
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
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="teacher-edit-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="button" class="btn btn-warning btn-label-left pull-right" id="teacher-edit-update">'+
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
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);

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
                         


                                    }
                        });//end of teacher id

                        $(document.body).on('click', '#teacher-edit-update',function(){
                            $('.edit_teacher').removeProp("readonly");
                            $('#upload-edit-teacher-image').removeProp("style");
                            $('#edteachbday').addClass('bday_datepicker');
                            $('.bday_datepicker').datepicker('enable');
                            $('.edit_teacher_select').removeAttr('disabled');
                        });

                        $(document.body).on('click', '#teacher-edit-reset', function(){
                            $('.edit_teacher').prop("readonly","true");
                            $('#upload-edit-teacher-image').css("display","none");
                            $('.bday_datepicker').datepicker('disable');
                            $('.edit_teacher_select').attr('disabled',true);
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

                                                window.location.href="index.php?r=lss&tp&tpe";
                                              
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
                                       /*alert(JSON.stringify(response['edit_student']));  */
                                        display_edit_student(response['edit_student']);

                                    },


                                    });

                                    function display_edit_student(data) 
                                    {
                                        $('.content-header').empty();
                                        $('.content').empty();

                                        var header = $('<h1>'+
                                                         'Edit Student'+
                                                        '<small>Profile</small>'+
                                                      '</h1>');

                                            $('.content-header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {

                                        var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
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

                                                                                     '<label class="col-sm-1 control-label">Guardian</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edstudparent" class="form-control" value="'+row[9]+' '+row[10]+' '+row[11]+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Middle name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edstudmname" class="form-control edit_student" value="'+row[3]+'" readonly="true">'+
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
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="student-edit-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="button" class="btn btn-warning btn-label-left pull-right" id="student-edit-update">'+
                                                                                            'Update Information'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="student-edit-submit">'+
                                                                                            'Save Changes'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);

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

                                    }
                        });//end of student id

                        $(document.body).on('click', '#student-edit-update',function(){
                            $('.edit_student').removeProp("readonly");
                            $('#upload-edit-student-image').removeProp("style");
                            $('#edstudbday').addClass('bday_datepicker');
                            $('.bday_datepicker').datepicker('enable');
                            $('.edit_student_select').removeAttr('disabled');
                        });

                        $(document.body).on('click', '#student-edit-reset', function(){
                            $('.edit_student').prop("readonly","true");
                            $('#upload-edit-student-image').css("display","none");
                            $('.edit_student_select').attr('disabled',true);
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
                                                window.location.href="index.php?r=lss&sp&spe";
                                              
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


                        $(document.body).on('click','.subject-id',function(event)
                        {
                            var id=$(this).attr('id');
                            
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php',
                                    type: 'GET',
                                    data: {
                                        edit_subject_id:id
                                    },
                                   dataType: 'json',

                                   success: function(response) 
                                   {
                                       /*alert(JSON.stringify(response['edit_subject']));  */
                                        display_edit_subject(response['edit_subject']);

                                    },


                                    });

                                    function display_edit_subject(data) 
                                    {
                                        $('.content-header').empty();
                                        $('.content').empty();

                                        var header = $('<h1>'+
                                                         'Edit Subject'+
                                                        
                                                      '</h1>');

                                            $('.content-header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {

                                        var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="edit-subject-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edsubid" class="form-control" value="'+row.subjectID+'" readonly="true">'+
                                                                                    '</div>'+

                                                                                    '<label class="col-sm-2 control-label">Subject Title</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edsubtitle" class="form-control edit_subject" value="'+row.subject_title+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="subject-edit-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="button" class="btn btn-warning btn-label-left pull-right" id="subject-edit-update">'+
                                                                                            'Update Information'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="subject-edit-submit">'+
                                                                                            'Save Changes'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);
                                    }
                        });//end of subject id
                        
                        $(document.body).on('click', '#subject-edit-update',function(){
                            $('.edit_subject').removeProp("readonly");
                        });

                        $(document.body).on('click', '#subject-edit-reset', function(){
                            $('.edit_subject').prop("readonly","true");
                        });

                        $(document.body).on('submit', '#edit-subject-form', submitEditSubjectForm);

                        function submitEditSubjectForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?edit-subject-form',
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
                                                window.location.href="index.php?r=lss&sbs&sbse";
                                              
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
                        }//end of submit edit subject

                        $(document.body).on('click','.section-id',function(event)
                        {
                            var id=$(this).attr('id');
                            
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php',
                                    type: 'GET',
                                    data: {
                                        edit_section_id:id
                                    },
                                   dataType: 'json',

                                   success: function(response) 
                                   {
                                       /*alert(JSON.stringify(response['edit_section']));  */
                                        display_edit_section(response['edit_section']);

                                    },


                                    });

                                    function display_edit_section(data) 
                                    {
                                        $('.content-header').empty();
                                        $('.content').empty();

                                        var header = $('<h1>'+
                                                         'Edit Section'+
                                                        
                                                      '</h1>');

                                            $('.content-header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {

                                        var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="edit-section-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edsecid" class="form-control" value="'+row.sectionID+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Section No</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edsecno" class="form-control edit_section" value="'+row.sectionNo+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Section No</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edsecname" class="form-control edit_section" value="'+row.section_name+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="section-edit-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="button" class="btn btn-warning btn-label-left pull-right" id="section-edit-update">'+
                                                                                            'Update Information'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="section-edit-submit">'+
                                                                                            'Save Changes'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);
                                    }
                        });//end of section
                        
                        $(document.body).on('click', '#section-edit-update',function(){
                            $('.edit_section').removeProp("readonly");
                        });

                        $(document.body).on('click', '#section-edit-reset', function(){
                            $('.edit_section').prop("readonly","true");
                        });

                        $(document.body).on('submit', '#edit-section-form', submitEditSectionForm);

                        function submitEditSectionForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?edit-section-form',
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
                                                window.location.href="index.php?r=lss&scs&scse";
                                              
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
                        }//end of submit edit section

                        $(document.body).on('click','.grade-id',function(event)
                        {
                            var id=$(this).attr('id');
                            
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php',
                                    type: 'GET',
                                    data: {
                                        edit_grade_id:id
                                    },
                                   dataType: 'json',

                                   success: function(response) 
                                   {
                                       /*alert(JSON.stringify(response['edit_grade']));  */
                                        display_edit_grade(response['edit_grade']);

                                    },


                                    });

                                    function display_edit_grade(data) 
                                    {
                                        $('.content-header').empty();
                                        $('.content').empty();

                                        var header = $('<h1>'+
                                                         'Edit Grade'+
                                                       
                                                      '</h1>');

                                            $('.content-header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {

                                        var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="edit-grade-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edgradeid" class="form-control" value="'+row.levelID+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Grade Level</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edgradedesc" class="form-control edit_grade" value="'+row.level_description+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="grade-edit-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="button" class="btn btn-warning btn-label-left pull-right" id="grade-edit-update">'+
                                                                                            'Update Information'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="grade-edit-submit">'+
                                                                                            'Save Changes'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);
                                    }
                        });//end of grade
                        
                        $(document.body).on('click', '#grade-edit-update',function(){
                            $('.edit_grade').removeProp("readonly");
                        });

                        $(document.body).on('click', '#grade-edit-reset', function(){
                            $('.edit_grade').prop("readonly","true");
                        });

                        $(document.body).on('submit', '#edit-grade-form', submitEditGradeForm);

                        function submitEditGradeForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?edit-grade-form',
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
                                                window.location.href="index.php?r=lss&gl&gle";
                                              
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
                        }//end of submit edit grade/

                        $(document.body).on('change', '#upload-edit-post-file', function(e) 
                        {
                            
                            var file = e.target.files[0].name;
                            $("#upload-edit-post-filename").val(file);
                        });

                        $(document.body).on('click','.announcement-lecture-id',function(event)
                        {
                            var id=$(this).attr('id');
                            
                             $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php',
                                    type: 'GET',
                                    data: {
                                        announcement_lecture_id:id
                                    },
                                   dataType: 'json',

                                   success: function(response) 
                                   {
                                       /*alert(JSON.stringify(response));  */
                                        display_edit_post(response['edit_post']);

                                    },


                                    });

                                    function display_edit_post(data) 
                                    {
                                        $('.content-header').empty();
                                        $('.content').empty();

                                        var header = $('<h1>'+
                                                         'Edit Post'+
                                                       
                                                      '</h1>');

                                            $('.content-header').append(header);

                                            for (var i = 0; i < data.length; i++) 
                                            {

                                                    reset_table(data[i]);
                                          
                                            }

                                    } 

                                    function reset_table(row)
                                    {

                                        var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="edit-post-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Date Created</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edpostdate" class="form-control" value="'+row.date_created+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Message/File Caption</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edpostmorf" class="form-control edit_post" value="'+row.messageorfile_caption+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">File Path</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edpostfile_path" class="form-control" value="'+row.file_path+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">File Name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edpostfile_name" id="upload-edit-post-filename" class="form-control" value="'+row.file_name+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                     '<div class="col-sm-12">'+
                                                                                        '<input type="file" name="edpostfile" id="upload-edit-post-file" class="post-edit-file-browse" style="display:none;"/>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                 '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Section No</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edpostsecno" class="form-control" value="'+row.sectionNo+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                 '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Section Name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edpostsecname" class="form-control" value="'+row.section_name+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Teacher</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="edpostteacher" class="form-control" value="'+row.reg_lname+' '+row.reg_fname+' '+row.reg_mname+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="post-edit-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="button" class="btn btn-warning btn-label-left pull-right" id="post-edit-update">'+
                                                                                            'Update Information'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="post-edit-submit">'+
                                                                                            'Save Changes'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);
                                    }
                        });//end of post
                    
                        $(document.body).on('click', '#post-edit-update',function(){
                            $('.edit_post').removeProp("readonly");
                            $('#upload-edit-post-file').removeProp("style");
                        });

                        $(document.body).on('click', '#post-edit-reset', function(){
                            $('.edit_post').prop("readonly","true");
                            ('#upload-edit-post-file').css("display","none");
                        });

                        $(document.body).on('submit', '#edit-post-form', submitEditPostForm);

                        function submitEditPostForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?edit-post-form',
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
                                                window.location.href="index.php?r=lss&ps&pse";
                                              
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
                        }//end of submit edit post/

                        /**Adding for insert**/
                        $(document.body).on('change', '#upload-add-admin-image', function(e) 
                        {
                            
                            var img = URL.createObjectURL(e.target.files[0]);
                            $('.add-admin-image').attr('src', img);
                        });

                        $('#add-admin').click(function()
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
                                $('.content-header').empty();
                                $('.content').empty();

                                var header = $('<h1>'+
                                                    'Add Administrator'+
                                                '</h1>');

                                $('.content-header').append(header);

                                var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
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
                                                                                    '<div class="col-sm-10">'+
                                                                                        '<button type="reset" class="btn btn-info btn-label-left pull-right" id="admin-add-reset">'+
                                                                                            'Reset All'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="admin-add-submit">'+
                                                                                            'Submit'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                               
                                   
                                $('.content').append(content);
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
                                               window.location.href="index.php?r=lss&ap&aap";
                                              
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

                        $('#add-teacher').on('click', function()
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
                                $('.content-header').empty();
                                $('.content').empty();

                                var header = $('<h1>'+
                                                    'Add Teacher'+
                                                '</h1>');

                                $('.content-header').append(header);

                                var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
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
                                                                                    '<div class="col-sm-10">'+
                                                                                        '<button type="reset" class="btn btn-info btn-label-left pull-right" id="teacher-add-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="teacher-add-submit">'+
                                                                                            'Submit'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);
                                    
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
                                              window.location.href="index.php?r=lss&tp&atp";
                                              
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

                        $('#add-student').on('click', function(){
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
                                $('.content-header').empty();
                                $('.content').empty();

                                var header = $('<h1>'+
                                                    'Add Student'+
                                                '</h1>');

                                $('.content-header').append(header);

                                 var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
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
                                                                                    '<div class="col-sm-3">'+
                                                                                        '<select class="form-control add_student_select" id="addstudgender" name="addstudgender" required="required">'+
                                                                                             '<option value="Male">Male</option>'+
                                                                                             '<option value="Female">Female</option>'+
                                                                                        '</select>'+
                                                                                    '</div>'+       

                                                                                    '<label class="col-sm-2 control-label">First Name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addstudparentfname" class="form-control add_student">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Status</label>'+
                                                                                    '<div class="col-sm-3">'+
                                                                                        '<select class="form-control add_student_select" id="addstudstatus" name="addstudstatus" required="required">'+
                                                                                             '<option value="Single">Single</option>'+
                                                                                             '<option value="Married">Married</option>'+
                                                                                             '<option value="Widowed">Widowed</option>'+
                                                                                        '</select>'+
                                                                                    '</div>'+

                                                                                    '<label class="col-sm-2 control-label">Middle Name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addstudparentmname" class="form-control add_student">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="reset" class="btn btn-info btn-label-left pull-right" id="student-add-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                            
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="student-add-submit">'+
                                                                                            'Submit'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);
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
                                              window.location.href="index.php?r=lss&sp&asp";
                                              
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

                        $('#add-subject').on('click', function(){
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
                                $('.content-header').empty();
                                $('.content').empty();

                                var header = $('<h1>'+
                                                    'Add Subject'+
                                                '</h1>');

                                $('.content-header').append(header);

                                var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="add-subject-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addsubid" class="form-control" value="'+row.subject_id+'" readonly="true">'+
                                                                                    '</div>'+

                                                                                    '<label class="col-sm-2 control-label">Subject Title</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addsubtitle" class="form-control add_subject">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="reset" class="btn btn-info btn-label-left pull-right" id="subject-add-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="subject-add-submit">'+
                                                                                            'Submit'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);

                                
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
                                              window.location.href="index.php?r=lss&sbs&asbs";
                                              
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

                        $('#add-section').on('click', function(){

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
                                $('.content-header').empty();
                                $('.content').empty();

                                var header = $('<h1>'+
                                                    'Add Section'+
                                                '</h1>');

                                $('.content-header').append(header);

                                var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="add-section-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addsecid" class="form-control" value="'+row.section_id+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Section No</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addsecno" class="form-control add_section">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Section No</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addsecname" class="form-control add_section">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="reset" class="btn btn-info btn-label-left pull-right" id="section-add-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                   
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="section-add-submit">'+
                                                                                            'Submit'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                           
                                        $('.content').append(content);
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
                                              window.location.href="index.php?r=lss&scs&ascs";
                                              
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

                        $('#add-grade').on('click', function(){
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
                                $('.content-header').empty();
                                $('.content').empty();

                                var header = $('<h1>'+
                                                    'Add Grade'+
                                                '</h1>');

                                $('.content-header').append(header);

                                var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="add-grade-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">ID</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addgradeid" class="form-control" value="'+row.grade_id+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Grade Level</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addgradedesc" class="form-control add_grade">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="reset" class="btn btn-info btn-label-left pull-right" id="grade-add-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="grade-add-submit">'+
                                                                                            'Submit'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');

                                        $('.content').append(content);
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
                                              window.location.href="index.php?r=lss&gl&agl";
                                              
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

                        $(document.body).on('change', '#upload-add-post-file', function(e) 
                        {
                            
                            var file = e.target.files[0].name;
                            $("#upload-add-post-filename").val(file);
                        });

                        $('#add-post').on('click', function(){
                            $.ajax({
             
                                    url: 'views/ajax/get_for_administrator.php?create-post-id',
                                    type: 'GET',
                                    dataType: 'json',

                                   success: function(response) 
                                   {
                                        /*alert(JSON.stringify(response));  */
                                         display_form_post(response['create_post_id']);
                                         displayTeacherList(response['create_post_teacher_list']); 


                                    },


                                    });

                            function display_form_post(data) 
                            {
                            
                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            reset_table(data[i]);
                                  
                                    }

                            }  
                                
                           
                            function reset_table(row)
                            {
                                $('.content-header').empty();
                                $('.content').empty();

                                var header = $('<h1>'+
                                                    'Add Post'+
                                                '</h1>');

                                $('.content-header').append(header);

                                var content = $('<section class="col-lg-12 connectedSortable">'+                            
                                                            '<div class="row">'+
                                                                '<div class="col-xs-12 col-sm-12">'+
                                                                    '<div class="box">'+
                                                                        '<div class="box-content">'+
                                                                            '<form class="form-horizontal" role="form" id="add-post-form" method="post">'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Date Created</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addpostdate" class="form-control" value="'+row.post_id+'" readonly="true">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Message/File Caption</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addpostmorf" class="form-control add_post">'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">File Name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<input type="text" name="addpostfile_name" class="form-control add_post" id="upload-add-post-filename" readonly="true">'+
                                                                                    '</div>'+
                                                                                     '<div class="col-sm-12">'+
                                                                                        '<input type="file" name="addpostfile" id="upload-add-post-file" class="post-add-file-browse" />'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Teacher Name</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<select class="form-control" id="teacher-name" name="teacher" style="margin-top: 15px; width: 250px;" required="required">'+
                                                                                            '<option value="" selected disabled>Select Teacher Name</option>'+
                                                                                        '</select>'+    
                                                                                        '</select>'+    
                                                                                    '</div>'+    
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<label class="col-sm-2 control-label">Section</label>'+
                                                                                    '<div class="col-sm-4">'+
                                                                                        '<select class="form-control" id="section-name" name="section" style="margin-top: 15px; width: 250px;" required="required">'+
                                                                                             '<option value="" selected disabled>Select Section</option>'+
                                                                                        '</select>'+    
                                                                                    '</div>'+    
                                                                                '</div>'+
                                                                                '<div class="form-group">'+
                                                                                    '<div class="col-sm-8">'+
                                                                                        '<button type="button" class="btn btn-info btn-label-left pull-right" id="post-add-reset">'+
                                                                                            'Reset'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-sm-2">'+
                                                                                        '<button type="submit" class="btn btn-primary btn-label-left" id="post-add-submit">'+
                                                                                            'Submit'+
                                                                                        '</button>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</form>'+
                                                                        '</div><!--box-content-->'+
                                                                    '</div><!--box-->'+
                                                                '</div>'+
                                                            '</div>'+
                                                                  
                                                        '</section>');
                                        $('.content').append(content);
                            }

                            function displayTeacherList(data) 
                            {
                                $("#teacher-name").empty();

                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            drawTeacherRow(data[i]);
                                  
                                    }

                            }

                            function drawTeacherRow(row) 
                            {


                             var display = $('<option value="' + row.teacherID + '">' + row.reg_lname + ', ' + row.reg_fname + ' ' + row.reg_mname + '</option>');
                             $("#teacher-name").append(display); 
                           

                            }


                        });//add-post

                        $(document.body).on('click','#teacher-name', function(event)
                        {
                            var selected_teacher = $(this).val();
                            
                            $.ajax({
                                        url:'views/ajax/get_for_administrator.php?add-post-sectionlist',
                                        type:'GET',
                                        data: {
                                            selected_teacher:selected_teacher
                                        },
                                        dataType: 'json',
                                        success:function(data)
                                        {
                                            /*alert(JSON.stringify(data.section_list));*/
                                            displaySectionList(data.section_list);
                                        }


                            });

                            function displaySectionList(data) 
                            {
                                $("#section-name").empty();

                                    for (var i = 0; i < data.length; i++) 
                                    {

                                            drawSectionRow(data[i]);
                                  
                                    }

                            }

                            function drawSectionRow(row) 
                            {


                             var display = $('<option value="' + row.sectionID + '">' + row.sectionNo + '-' + row.section_name + '</option>');
                             $("#section-name").append(display); 
                           
                            }


                        });
                        
                        $(document.body).on('submit', '#add-post-form', submitAddPostForm);

                        function submitAddPostForm(event)
                        {
                            event.stopPropagation();
                            event.preventDefault();

                             $.ajax({
                                        url: 'views/ajax/get_for_administrator.php?add-post-form',
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
                                              window.location.href="index.php?r=lss&ps&aps";
                                              
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
                        }//end of submit add post


                });//End of Ready      


               
 </script>          
    </body>
</html>
