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
					<div class="top-panel-left">  
	                    <ul class="nav navbar-nav">
	                        <li>
	    						<a class="navbar-brand" href="index.php?r=lss"><i class="fa fa-home fa-lg"></i> Home</a>
	    					</li>
	    					<li>
	    						<a class="navbar-brand" href="index.php?r=lss&tr=trp"><i class="fa fa-bar-chart fa-lg"></i> Progress</a>
	    					</li>
	                        <li>
	    						<a class="navbar-brand" href="index.php?r=lss&tr=trce"><i class="fa fa-puzzle-piece fa-lg"></i> Create Exercise</a>
	    					</li>
	    					<li>
	    						<a class="navbar-brand" href="index.php?r=lss&tr=tre"><i class="fa fa-calculator fa-lg"></i> Encode</a>
	    					</li>
	                        <li>
	    						<a class="navbar-brand" href="#"><i class="fa fa-file-text-o fa-lg"></i> Reports</a>
	    					</li>
	    			
					    </ul>
					</div>    
					<div class="top-panel-right pull-right">
						<?php if(isset($_SESSION['profile_pic']))
	                   	{
	                    	echo '<img src="views/res/'.$_SESSION['profile_pic'].'" class="shadow profile-teacher-img" />';
	                    }
	                    ?>
						<div id="user-dropdown" class="dropdown"> 
							<button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"> 
								<i class="fa fa-caret-square-o-down"></i>
							</button>
							
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
										<li role="presentation"> 
											<a role="menuitem" tabindex="-1" href="index.php?r=lss&tr=acc"><i class="fa fa-cog fa-spin"></i> Settings</a> </li>
											<li class="divider"></li>	
									<li role="presentation"> <a role="menuitem" tabindex="-1" href="index.php?r=xt"><span class="glyphicon glyphicon-off"></span> Logout</a> </li> 	
								</ul> 
							
						</div>
					</div>
                  
					
			</div><!--header content-->
	
		</div><!-- /.container-->
	</div><!--header-inner-->
</div><!--/#header-->   