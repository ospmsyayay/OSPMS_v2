  <!--@author Darryl-->
  <!--@copyright 2014-->

<!--Start of Welcome Box-->				
	<div class="welcome-box content">
		 <?php if(isset($_SESSION['profile_pic']))
   		{
    		echo '<img src="views/res/'.$_SESSION['profile_pic'].'" class="welcome-box-img img-thumbnail shadow"/>';
    	}
    	?>
		
		<?php 
		if((isset($_SESSION['reg_lname'])) and (isset($_SESSION['reg_fname'])))
		{
			echo '<a href="#" class="navbar-link" ><h5 id="greetings-parent">Hi, '.$_SESSION['reg_fname'].'</h5></a>';						
		}
		?>
	</div>
<!--End of Welcome Box-->

					<div id="subject-list">
						<h4 id="subject-list-title"><i class="glyphicon glyphicon-book"></i> Subjects</h4> 

						<div class="panel-group" id="Menu1">
							<?php
							if(isset($_SESSION['Parent_Student_Schedule_Line']))
							{  
							foreach($_SESSION['Parent_Student_Schedule_Line'] as $subjectName => $grade)
							{
					
								
							?>
								<div class="panel panel-default subjectmenu">
											  <div class="panel-heading ">
												<h4 class="panel-title">
												  <?php 
												  
												  echo '<a data-toggle="collapse" data-parent="#Menu1" onclick="getSubjectId(this)" href="#'.$subjectName.'GradeMenu" id="'.$subjectName.'" class="toHighlight" >
												  <span class="glyphicon glyphicon-map-marker"></span>'.$subjectName.'
												  </a>';?>
												  
												</h4>
											  </div><!--panel-heading-->
											  <!--   -->
										<?php 
								
											
										/*echo '<div id="'.$subjectName.'GradeMenu" class="panel-collapse collapse">'; */
										
										?>
												<!-- <div class="panel-body"> -->
															<!--//Grade level-->
												<?php 
												
												/*foreach($grade as $gradelevel => $section)
												{	*/
													
							
												?>
																<!-- <div class="panel-heading subjectmenu">
																	<h4 class="panel-title"> -->
																		<?php /*echo '<a id="'.$gradelevel.'" onclick="getGradeId(this)" class="toHighlight" data-toggle="collapse" data-parent="#'.$subjectName.'GradeMenu" href="#'.$subjectName.$gradelevel.'" >
																			<i class="glyphicon glyphicon-pushpin"></i> '.$gradelevel.'
																			<i class="glyphicon glyphicon-chevron-down"></i>'*/;?>
																		<!-- </a> -->
																	<!-- </h4> -->
																<!-- </div> --><!--panel-heading subjectmenu-->
																 
																<?php 
																				
																/*echo '<div id="'.$subjectName.$gradelevel.'" class="panel-collapse collapse">';*/
																		
																?>				
																		<!-- <div class="panel-body"> -->
																					
																		<?php 
																			
																			/*foreach($section as $sectionNo => $sectionName)
																			{				
																			
																					foreach($sectionName as $section_name => $end)
																				{	*/
																		?>					
																					<!--sections-->
																					<!-- <div class="panel-heading subjectmenu">
																						<h4 class="panel-title"> -->
																						<?php
																							/*echo '<a href="#"  onclick="getSectionId(this)" id="'.$section_name.'" class="toHighlight" ><i class="glyphicon glyphicon-pencil" ></i>'.$sectionNo.'-'.$section_name.'</a>';*/
																						?>	
																					<!-- 	</h4>
																					
																					</div> --><!--panel-heading subjectmenu-->
																		<?php 
																			/*	}
																			}*/
																		?>					
																					
																				<!-- </div> --><!--panel-body-->
																
						
																		<!-- </div> --><!--panel-collapse collapse-->
																	
									
												<?php 

											/*	}*/

												?>	

												<!-- </div> --><!--//Grade level-->
						
										<!-- </div>	 -->
												
															
												
								</div><!--subject menu-->	
						<?php 
						}		
						}
					 	?>
					</div><!--Menu 1-->	
					 
				   </div><!--subject-list--> 
