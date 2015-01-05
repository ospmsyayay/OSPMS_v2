  <!--@author Darryl-->
  <!--@copyright 2014-->
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
    						<a class="navbar-brand" href="index.php?r=lss&tr=trp">Progress</a>
    					</li>
                        <li>
    						<a class="navbar-brand" href="index.php?r=lss&tr=tre">Encode</a>
    					</li>
                        <li>
    						<a class="navbar-brand" href="#">Reports</a>
    					</li>
    					<li>
    						<a class="navbar-brand" href="index.php?r=lss&tr=testing">Testing</a>
    					</li>
				
				    </ul>
                   <?php if(isset($_SESSION['profile_pic']))
                   	{
                    	echo '<img src="'.$_SESSION['profile_pic'].'" class="shadow profile-teacher-img" />';
                    }
                    ?>
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
								<li role="presentation"> <a role="menuitem" tabindex="-1" href="index.php?r=xt">Logout</a> </li> 
							</ul> 
					</div>
					
			</div><!--header content-->
	
		</div><!-- /.container-->
	</div><!--header-inner-->
</div><!--/#header-->   