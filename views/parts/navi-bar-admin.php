  <!--@author Darryl-->
  <!--@copyright 2014-->

<!-- Start of  Navigation Bar -->
<nav class="navbar navbar-custom navbar-static-top navbar-fixed-top no-margin" role="navigation">

	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#teacher-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src="views/res/logo_TES1946.png" style="width:30px; height:30px;"/>
			</a>
			
		</div><!-- navbar-header -->

		<div class="collapse navbar-collapse" id="teacher-navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
				<li class="active">
					<a href="index.php?r=lss"><p>OSPMS Admin</p></a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
					<li>
						<?php if(isset($_SESSION['profile_pic']))
	                   	{
	                    	echo '<img src="views/res/'.$_SESSION['profile_pic'].'" class=" profile-admin-img img-rounded shadow" />';
	                    }
	                    ?>
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
						role="button" aria-expanded="false"><i class="fa fa-caret-square-o-down fa-2x"></i></a>
							<ul class="dropdown-menu" role="menu">
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

