  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
        
        <link href="views/carousel.css" rel="stylesheet"/>
		<link href="views/bootstrap.css" rel="stylesheet"/>
        <link href="views/exDesign.css" rel="stylesheet"/>
	</head>
    
	<body>
	
<div class="header-wrapper">
	<?php include "views/parts/navi-bar-home.php";?>
</div><!--header-wrapper-->

<div class="viewport">
	<div class="content">
			<div class="container">
					<div id="login-banner" class=" col-md-7 ">     
						<div id="logo-container">
							<img alt="logo" src="views/res/logo_TES1946.png"/>
						</div>
						<div id="login-title-container">
							<h3 id="login-title">Tunasan Elementary School</h3>
							<h4 id="login-title2">Welcome to TES Online Student Performance Monitoring System</h4>
						</div>	
					</div>
					
				 <div id="home-container">   
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  
								  <div class="carousel-inner">
									<div class="item active">
									  <img src="views/res/carousel_5.jpg" alt="First slide"/>
									  <div class="container">
										<div class="carousel-caption">
										  
										</div>
									  </div>
									</div>
									
									<div class="item">
									  <img src="views/res/carousel_1.jpg" alt="Second slide"/>
									  <div class="container">
										<div class="carousel-caption">
										  
										</div>
									  </div>
									</div>
									
									<div class="item">
									  <img src="views/res/carousel_2.jpg" alt="Third slide"/>
									  <div class="container">
										<div class="carousel-caption">
										 
										</div>
									  </div>
									</div>
									
									 <div class="item">
									  <img src="views/res/carousel_3.jpg" alt="Fourth slide"/>
									  <div class="container">
										<div class="carousel-caption">
										 
										</div>
									  </div>
									</div>
									
									 <div class="item">
									  <img src="views/res/carousel_4.jpg" alt="Fifth slide"/>
									  <div class="container">
										<div class="carousel-caption">
										 
										</div>
									  </div>
									</div>
						</div>
					</div>
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div><!-- /.carousel -->
					
					<div id="login-set" class=" col-md-7 ">
						<div id="login" class="col-md-offset-3">
								<fieldset id="fs_border">
									<legend class="panel-title">Login</legend>
									<form method="post" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="username" class="title">Username:</label>
										<input type="text" id="username" name="user" class="form-control" placeholder="Enter username" required="required"/>
									</div>
									<div class="form-group">
										<label for="password" class="title">Password:</label>
										<input type="password" id="password" name="pass" class="form-control" placeholder="Enter password" required="required"/>
									</div>
									<div class="home_btn">
										
											<button type="submit" class="btn btn-fresh text-uppercase" id="submit">Login</button>
											<button type="reset" class="btn btn-sky text-uppercase" >Clear</button>
				
									</div>
									</form>
								</fieldset>
						</div>						
					</div> 
			</div>
	</div>	
</div><!--viewport-->

       
        <script src="views/jquery.min.js"></script>
        <script src="views/transition.js"></script>
        <script src="views/carousel.js"></script>
        <script src="views/bootstrap.min.js"></script>
        <!--<script src="../../assets/js/docs.min.js"></script>-->
		
	</body>
</html>