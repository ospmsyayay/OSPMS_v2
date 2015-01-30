<!--@author Darryl-->
<!--@copyright 2014-->
<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        <title>Online Student Performance Monitoring System</title>
        <link href="views/plugins/bootstrap/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
    </head>
    
        <body onload="check()">
        <script>
        function check()
        {
        <?php
            if(isset($_GET['icp']))
            {   
        ?>      
            alert('Invalid current password!');
            window.location.href='index.php?r=lss&tr=acc';
        <?php 
            }
            else if(isset($_GET['npm']))
            {   
        ?>
            alert('New passwords do not match!');
            window.location.href='index.php?r=lss&tr=acc';
        <?php
            }
            else if(isset($_GET['pce']))
            {
        ?>
            alert('Password cannot be empty!');
            window.location.href='index.php?r=lss&tr=acc';
        <?php
            }
            else if(isset($_GET['pts']))
            {    
        ?>
            alert('Password too short');
            window.location.href='index.php?r=lss&tr=acc';
        <?php
            }
            else if(isset($_GET['pmco']))
            {    
        ?>
            alert('Password must be 16 characters only.');
            window.location.href='index.php?r=lss&tr=acc';
        <?php 
            }
            else if(isset($_GET['pmd']))
            {    
        ?>
            alert('Password must differ from old password.');
            window.location.href='index.php?r=lss&tr=acc';
        <?php
            }
            else if(isset($_GET['cp']))
            {
        ?>
            alert('Password Changed');        
        <?php        
            }    
           
        ?>       
        }  
         </script>       
       
<div class="header-wrapper">
    <?php include "views/parts/navi-bar-student.php";?>
</div><!--header-wrapper--> 
<div class="viewport">
    <div class="content">
        <div class="container">

                    <div class="account-settings-header col-xs-12 col-sm-12 col-md-12 ol-lg-12">
                      
                            <?php if(isset($_SESSION['profile_pic']))
                            {
                                echo '<img src="views/res/'.$_SESSION['profile_pic'].'" class="profile-image img-circle pull-left shadow" />';
                            }
                            ?>
                            <div class="profile-content pull-left">
                                <?php 
                                if((isset($_SESSION['reg_lname'])) and (isset($_SESSION['reg_fname'])))
                                {
                                    echo '<h1 class="account-name">'.$_SESSION['reg_fname'].' '.$_SESSION['reg_lname'].'</h1>';                     
                                }
                                ?>
                                <h2 class="account-name-small">Account Settings</h2>
                            </div><!--profile-->
                      
                    </div>

                    <div class="sections-wrapper">            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section-inner">
                                <div class="box">
                                    <div class="box-content">
                                        <form class="form-horizontal" role="form" id="account-settings-form" method="post">
                                           
                                            <div class="form-group">

                                                <label class="col-sm-4 control-label">ID</label>
                                                <div class="col-sm-6">
                                                    <?php 
                                                    if(isset($_SESSION['account_id']))
                                                    {
                                                        echo '<input type="text" name="accountid" class="form-control" value="'.$_SESSION['account_id'].'" readonly="true">';                     
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Username</label>
                                                <div class="col-sm-6">
                                                    <?php 
                                                    if(isset($_SESSION['username']))
                                                    {
                                                        echo '<input type="text" name="accountusername" class="form-control" value="'.$_SESSION['username'].'"readonly="true">';                     
                                                    }
                                                    ?>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Current Password</label>
                                                <div class="col-sm-6">
                                                    <input type="password" name="accountcurrentpass" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">New Password</label>
                                                <div class="col-sm-6">
                                                    <input type="password" name="accountnewpass" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Re-Type Password</label>
                                                <div class="col-sm-6">
                                                    <input type="password" name="accountrepass" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <button type="submit" class="btn btn-warning btn-label-left pull-right" id="account-settings-submit">
                                                        Change Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!--box-content-->
                                </div><!--box-->
                            </div>
                    </div><!--sections wrapper-->

        </div><!--container-->  
    </div><!--content-->
</div><!--viewport-->
       
        <script src="views/plugins/bootstrap/transition.js"></script>
        <script src="views/plugins/bootstrap/jquery.min.js"></script>
        <script src="views/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="views/plugins/bootstrap/tab.js"></script>
        <script src="views/plugins/bootstrap/tooltip.js"></script>
        <script src="views/plugins/bootstrap/popover.js"></script>
        <script src="views/js/msgbox.js"></script>
        <script src="views/js/scripts.js"></script>     
    
        <!-- JavaScript Test -->
<script>
$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
})
</script>
<script>
$(function()
{

    $('button[type="submit"]').attr('disabled',true);

    $('input[type="password"]').on('keyup',function()
    {
        if($(this).val() != '') 
        {
            $('button[type="submit"]').attr('disabled' , false);
        }
        else
        {
            $('button[type="submit"]').attr('disabled' , true);
        }
    });  

});//End of ready
                        

</script>       
    </body>
    

</html>