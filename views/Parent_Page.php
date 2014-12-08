  <!--@author Darryl-->
  <!--@copyright 2014-->
 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
		<title>Online Student Performance Monitoring System</title>
        <!--<link rel="stylesheet" type="text/css" href="views/bootstrap.min.css"/>-->
        <link href="views/carousel.css" rel="stylesheet"/>
		<link href="views/bootstrap.css" rel="stylesheet"/>
        <link href="views/exDesign.css" rel="stylesheet"/>
	</head>
    
		<body onload="check()">
		<script>
		function check()
		{
		<?php
			if ($_GET['p']=="success")
			{								
		?>
				alert('Login Successful');
		<?php					
			}
		?>
		}
		</script>

<div class="header-wrapper">

<div id="t-page-header" class="header shadow">

	<div id="t-page-header-inner" class="navbar navbar-default header-inner shadow" role="navigation" > 
		
        <div class="container">
            <div id="t-page-header-content" class="navbar-header header-content">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="user-dropdown">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
						<!--<a class="navbar-brand" href="#">Project Name</a>-->
					  </div>
					  
                    <ul class="nav navbar-nav">
                       <li>
    						<a class="navbar-brand" href="index.php?r=lss">Home</a>
    					</li>
    					<li>
    						<a class="navbar-brand" href="index.php?r=lss&pt=ptp">Progress</a>
    					</li>
                        <li>
    						<a class="navbar-brand" href="index.php?r=lss&pt=pte">Encode</a>
    					</li>
                        <li>
    						<a class="navbar-brand" href="#">Reports</a>
    					</li>
				
				    </ul>
                    
                    <div class="form-group" id="nav-search"> 
							<input type="text" class="form-control" placeholder="Search" />
								<span id="search-icon"class="glyphicon glyphicon-search"></span>
					</div>
		
                    
                     <img src="views/res/teacher.jpg" class="img-rounded shadow profile-teacher-img" />
			
					<div id="user-dropdown" class="dropdown"> 
						<button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"> 
							<span class="caret"></span> 
						</button> 
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1"> 
								<li role="presentation"> 
								<a role="menuitem" tabindex="-1" href="#">Account Settings</a> </li>
									<li class="divider"></li>
								<li role="presentation"> <a role="menuitem" tabindex="-1" href="#">Profile</a> </li> 
									<li class="divider"></li>
								<li role="presentation"> <a role="menuitem" tabindex="-1" href="#"> Settings </a> </li> 
									<li class="divider"></li>
								<li role="presentation"> <a role="menuitem" tabindex="-1" href="#"> Help </a> </li> 
									<li class="divider"></li>	
								<li role="presentation" class="divider"></li> 
								<li role="presentation"> <a role="menuitem" tabindex="-1" href="index.php?">Logout</a> </li> 
							</ul> 
							
							
					</div>
			</div><!--header content-->
	
	</div><!-- /.container-->
	</div><!--header-inner-->
</div><!--/#header-->   
</div><!--header-wrapper-->

<div class="viewport">
	<div class="content">
		<div class="container">
			<div class="left-wrapper">
				<div class="left-column" >
					 <div id="thumbnail-parent">
						<img src="views/res/parent.jpg" class="img-rounded shadow" id="thumbnail-parent-img"/>
						<a href="#" class="navbar-link" ><h5 id="greetings-parent">Hi, Parent</h5></a>
					</div> 
					
					<div id="parent-profile">
						<h3 id="parent-profile-title"></h3>
						<div class="panel-group" id="accordion">
											<div class="panel panel-default">
											  <div class="panel-heading">
												<h4 class="panel-title">
												  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
														Profile Overview
												  </a>
												</h4>
											  </div>
											  <div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													
												</div>
											  </div>
											</div>
											<div class="panel panel-default">
											  <div class="panel-heading">
												<h4 class="panel-title">
												  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
													Child's Academic Progress
												  </a>
												</h4>
											  </div>
											  <div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													
												</div>
											  </div>
											</div>
											
						</div>
					</div><!--subject-list-->
				</div>
			</div><!--left-wrapper-->	
			<div class="right-wrapper">
					<div class="right-column">
						
						<div id="parent-container">
							<div id="parent-title"></div>
											
											<div class="student-container">
												<img src="views/res/student1.jpg" class="img-rounded shadow student-img" />
												<p class="student-name"><a class="navbar-link"><h1 id="greetings-student">Alcantara, Jerome L.</h1></a></p>
											</div>
											
											<div class="parent-page-space">
												<img src="views/res/graph.jpg" class="img-rounded shadow progress-img" />
										
											</div>
											
											<!--<div class="encoding-page-space">
												<img src="views/res/" class="img-rounded shadow process-img" />
												
											</div>-->
											
										
							
						</div><!--parent-container-->
							
					</div><!--right-column-->
			</div><!--right-wrapper-->
		</div><!--container-->
	</div><!--content-->
</div><!--viewport-->


  <script src="views/jquery.min.js"></script>
        <script src="views/transition.js"></script>
        <script src="views/carousel.js"></script>
        <script src="views/jquery.min.js"></script>
        <script src="views/bootstrap.min.js"></script>
		<script src="views/tab.js"></script>
		
		<script src="views/modal.js"></script>
		<script src="views/tooltip.js"></script>
		<script src="views/popover.js"></script>
		
		
        <!--<script src="../../assets/js/docs.min.js"></script>-->
     <!-- JavaScript Test -->
<script>
$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
})
</script>		
	</body>
    
    
</html>