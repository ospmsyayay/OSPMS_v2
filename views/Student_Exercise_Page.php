<!--@author Darryl-->
<!--@copyright 2014-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Student Page Exercise</title>
		<link href="views/plugins/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="views/css/exDesign.css" rel="stylesheet"/>
        <link href="views/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet"/>
	</head>
    
		<body>
		
		
<!--Start of navbar student-->
	<?php include "views/parts/navi-bar-student.php";?>   
<!--End of navbar student-->

<!--Start of main -->
	<div class="main container-fluid">
		<div class="row">
		
				<!--Start of left content-->
				<div class="aside-left col-md-2">
					<?php include "views/parts/side-bar-student.php";?>
				</div>
				<!--End of left content-->

				<!--Start of mid content-->
					<div class="main-content col-md-10 col-md-offset-2">

						

					</div>	
				<!--End of mid content-->
		</div><!--row-->
	</div><!--container-fluid-->
<!--End of main -->	
			

					

       
<script src="views/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="views/plugins/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>

	
		<!-- JavaScript Test -->
<script>
$(function () {
  $('.js-popover').popover()
  $('.js-tooltip').tooltip()
})
</script>


	</body>
    

</html>