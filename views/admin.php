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

                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    </form>
             
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
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
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

            if(isset($_GET['tp']))
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
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
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
            if(isset($_GET['sp']))
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
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
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
             if(isset($_GET['sbs']))
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
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Subject Title</th>
                                   
                                </tr>
                             <?php   
                                foreach($subjectlist as $row)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['subjectID'].'</td>';
                                    echo '<td>'.$row['subject_title'].'</td>';
                                    echo '</tr>';
                                }    
                            ?>
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
             if(isset($_GET['scs']))
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
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Subject Title</th>
                                   
                                </tr>
                             <?php   
                                foreach($sectionlist as $row)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['sectionNo'].'</td>';
                                    echo '<td>'.$row['section_name'].'</td>';
                                    echo '</tr>';
                                }    
                            ?>
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
              if(isset($_GET['gl']))
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
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Grade level</th>
                                   
                                </tr>
                             <?php   
                                foreach($gradelevellist as $row)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['levelID'].'</td>';
                                    echo '<td>'.$row['level_description'].'</td>';
                                    echo '</tr>';
                                }    
                            ?>
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
              if(isset($_GET['ps']))
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
                         
                    </div>

                    <div class="row">
     
                        <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Class Rec No</th>
                                    <th>Date Created</th>
                                    <th>Message</th>
                                   
                                </tr>
                             <?php   
                                foreach($announcementlist as $row)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['teacherID'].'</td>';
                                    echo '<td>'.$row['class_rec_no'].'</td>';
                                    echo '<td>'.$row['date_created'].'</td>';
                                    echo '<td>'.$row['message'].'</td>';
                                    echo '</tr>';
                                }    
                            ?>
                            </table>
                        </section>

                         <section class="col-lg-10 connectedSortable">                            

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Class Rec No</th>
                                    <th>Date Created</th>
                                    <th>File Caption</th>
                                    <th>File Path</th>
                                    <th>File Name</th>
                                   
                                </tr>
                             <?php   
                                foreach($uploadlist as $row)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['teacherID'].'</td>';
                                    echo '<td>'.$row['class_rec_no'].'</td>';
                                    echo '<td>'.$row['date_created'].'</td>';
                                    echo '<td>'.$row['file_caption'].'</td>';
                                    echo '<td>'.$row['file_path'].'</td>';
                                    echo '<td>'.$row['file_name'].'</td>';
                                    echo '</tr>';
                                }    
                            ?>
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
           
    </body>
</html>
