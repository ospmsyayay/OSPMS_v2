  <!--@author Darryl-->
  <!--@copyright 2014-->
<!-- Start of  Navigation Bar -->
<nav class="navbar navbar-custom navbar-static-top navbar-fixed-top" role="navigation">

	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#parent-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src="views/res/logo_TES1946.png" style="width:30px; height:30px;"/>
			</a>
		</div><!-- navbar-header -->

		<div class="collapse navbar-collapse" id="parent-navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
					<?php
						if(!isset($_GET['pt']))
						{
							home();
						}
						else 
						{
							switch($_GET['pt'])
							{
								case 's':parentpage();break;
								case 'acc':account();break;


							}
						}

						function home()
						{
							echo '<li class="active">
									<a href="index.php?r=lss"><i class="fa fa-home fa-2x"></i><h2 class="visible-xs-inline"> Home</h2></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-file-text-o fa-2x"></i><h2 class="visible-xs-inline"> Reports</h2></a>
								</li>';
						}

						function parentpage()
						{
							echo '<li>
									<a href="index.php?r=lss"><i class="fa fa-home fa-2x"></i><h2 class="visible-xs-inline"> Home</h2></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-file-text-o fa-2x"></i><h2 class="visible-xs-inline"> Reports</h2></a>
								</li>';
						}

						function account()
						{
							echo '<li>
									<a href="index.php?r=lss"><i class="fa fa-home fa-2x"></i><h2 class="visible-xs-inline"> Home</h2></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-file-text-o fa-2x"></i><h2 class="visible-xs-inline"> Reports</h2></a>
								</li>';
						}

						
					?>
					
			</ul>
			<ul class="nav navbar-nav navbar-right">
					<li>
						<?php if(isset($_SESSION['profile_pic']))
	                   	{
	                    	echo '<img src="views/res/'.$_SESSION['profile_pic'].'" class=" profile-parent-img img-rounded shadow" />';
	                    }
	                    ?>
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
						role="button" aria-expanded="false"><i class="fa fa-caret-square-o-down fa-2x"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li role="presentation"> 
									<a role="menuitem" tabindex="-1" href="index.php?r=lss&pt=acc"><i class="fa fa-cog fa-spin"></i> Settings</a>
								</li>
								<li class="divider"></li>	
								<li role="presentation"> 
									<a role="menuitem" tabindex="-1" href="index.php?r=xt"><span class="glyphicon glyphicon-off"></span> Logout</a>
								</li> 	
							</ul>	
					</li>
			</ul>	
		</div>	
	</div><!-- container-fluid -->	

</nav>
<!-- End of Navigation Bar -->