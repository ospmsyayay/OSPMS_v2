  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
       
		<link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
    
	<body onload="check()" id="homepage-body">
        <script>
        function check()
        {
        <?php
            if(isset($_GET['ue']))
            {   
        ?>      
            alert('Username doesnt exist!');
            window.location.href='index.php?';
        <?php 
            }
            else if(isset($_GET['ip']))
            {   
        ?>
            alert('Incorrect Password!');
            window.location.href='index.php?';
        <?php
            }
            else if(isset($_GET['peup']))
            {
        ?>
            alert('Please enter username and password!');
            window.location.href='index.php?';

        <?php
            }
           
        ?>       
        }  
         </script>       
<!--Start of page header-->
<div class="page-header no-margin no-padding" id="homepage-banner">
	<div class="container-fluid">
		<div>
	   		<h4 class="text-center">Online Student Performance Monitoring System</h4>
	    </div>
	</div>   	
</div>				
<!--End of page header-->

<!--Start of login--> 
<div class="container">

	<div id="login-container" class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
		<div id="login-set" class="panel">

				<div class="col-xs-12 col-sm-2 col-md-2  col-lg-2 login-banner">
					<img src="views/res/TES_logo.png" class="img-responsive center-block"/>
				</div>

				<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 login-banner">
					<small><h3 id="login-title" class="text-center"> Welcome to Tunasan Elementary School</h3></small>
				</div>
				
				<div class="panel-body">
	
						<fieldset id="fs_border">
							<form method="post" class="form-horizontal" role="form">
								<div class="form-group">
									<div class="input-group col-xs-8 col-xs-offset-2 col-sm-8 co-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="username" name="user" class="form-control" placeholder="Username" required="required"/>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group col-xs-8 col-xs-offset-2 col-sm-8 co-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" id="password" name="pass" class="form-control" placeholder="Password" required="required"/>
									</div>
								</div>
								<div class="form-group">
									 <div class="col-xs-2 col-xs-offset-5 col-sm-2 col-sm-offset-8 col-md-2 col-md-offset-8 col-lg-2 col-lg-8">
										<button type="submit" class="btn btn-fresh text-uppercase">Login</button>
									 </div>
								</div>
							</form>
						</fieldset>
				</div>	

		</div>	
	</div> 
</div><!--container-->
<!--End of login-->


       
        <script src="views/plugins/bootstrap/jquery.min.js"></script>
        <script src="views/plugins/bootstrap/bootstrap.min.js"></script>
		
	</body>
</html>