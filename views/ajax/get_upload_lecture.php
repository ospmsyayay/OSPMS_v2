
<?php 

if( isset($_FILES) and isset($_GET['caption']) and isset($_GET['class_rec']))
{

	$caption=clean($_GET['caption']);
	$class_rec_no=$_GET['class_rec'];

	/*echo "{\"success\": [" .json_encode($_FILES). ", " .json_encode($_GET['caption']). ", " .json_encode($class_rec_no). "]}";*/

	post_lecture($caption,$class_rec_no);   
			

}

function post_lecture($caption,$class_rec_no)
{
	if(!empty($caption))
	{
		$result=lecture_uploaded($caption);

		if(isset($result['success']) || array_key_exists('success', $result))
		{

			$upload_date= date("Y-m-d H:i:s"); 
					

				$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

					 
					 $sql="INSERT INTO announcement_lecture VALUES('".$upload_date."','".$caption."','model/uploaded_files/','".$result['file_name']."')";
                        
					    $announcement_lecture_inserted= mysqli_query($cxn,$sql);
					    
					    if($announcement_lecture_inserted==true)
					    {
					        $query="Select class_rec_no from section where class_rec_no='$class_rec_no'";

					        $fetch_class_rec= mysqli_query($cxn,$query);


					         	while($each_rec = mysqli_fetch_array($fetch_class_rec))
						        {
						            
						            $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$upload_date."')";

						            $insert_done=mysqli_query($cxn,$insert);
						        }

						     get_announcement($class_rec_no,$result['success']);   
					    }    
			
			
		}

		else if(isset($result['error']) || array_key_exists('error', $result))
		{
			echo json_encode($result);
		}	

	}	
}


function lecture_uploaded($caption)
{
	
		$data = array();


				$name = $_FILES['upload_lecture_ajax']['name'];
				$tmp_name = $_FILES['upload_lecture_ajax']['tmp_name'];
				/*$upload_error = $_FILES['upload_lecture']['error'];*/
				$allowedextension = array('gif', 'jpeg', 'jpg','JPG','png',
									  'doc','docx','docm','docb','pdf','dotm','dotx',
									  'xls','xlsx','xlsm','xltx','xltm','xlsb',
									  'ppt','pptx','pptm','potx','potm','ppam','ppsx','ppsm','sldx','sldm',
									  '7z','rar','swf','zip');


				$temp = explode(".",$name);
				$nameoffile = $temp[0];
				$extension = end($temp);

				if(in_array($extension,$allowedextension))
				{
					
						$location = "../../model/uploaded_files/";

						$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

						$sql="SELECT messageorfile_caption, file_path, file_name FROM announcement_lecture 
						where messageorfile_caption = '".$caption."' and file_name = '".$name."'";

        				$result=mysqli_query($cxn,$sql);

        				$file_exists = mysqli_num_rows($result);


						if($file_exists > 0)
						{
							$data = array('error' => 'File already exist');
						} 
						else
						{
							
							if(move_uploaded_file($tmp_name,$location.$name))
							{
								/*$files[] = $location.$name;*/
								$data=array('success' => 'Lecture File Saved','file_name' => $name);
							}
							else
							{
								$data = array('error'=>'There was an error uploading your files');
							}	
						}	
						
					
						
				}
				else
				{
					$data = array('error'=>'Invalid file extension or Upload Empty');
				}

				return $data;
}

function get_announcement($class_rec_no,$success_message)
{

	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

			$sql="Select announcement_lecture.date_created, announcement_lecture.messageorfile_caption, announcement_lecture.file_path, 
	        announcement_lecture.file_name, grade_level.level_description, section_list.sectionNo, 
	        section_list.section_name, subject_.subject_title, school_year from section 
	        inner join grade_level on section.levelID=grade_level.levelID 
	        inner join section_list on section.sectionID=section_list.sectionID 
	        inner join subject_ on section.subjectID=subject_.subjectID 
	        inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
	        inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created 
	        where section.class_rec_no = '$class_rec_no' order by date_created desc";
	 
				
			$announcement_result=mysqli_query($cxn,$sql) or die('Unable to connect to Database.');

	    	$first = true;
			echo "{\"announcement_lecture\": [";
			while($display = mysqli_fetch_array($announcement_result))
			{
				$passer=array();

				$passer['date_created']=convert_datetime_to_12hr($display['date_created']);
				$passer['timespan']=get_time_difference_php($display['date_created']);
				$passer['messageorfile_caption']=$display['messageorfile_caption'];
                if(empty($display['file_path']))
                {
                    $passer['file_path']='';
                }
                else
                {
                    $passer['file_path']=$display['file_path'];
                }   

                if(empty($display['file_name']))
                {
                    $passer['file_name']='';
                }
                else
                {
                    $passer['file_name']=$display['file_name'];
                }     
				
				$passer['level_description']=$display['level_description'];
				$passer['sectionNo']=$display['sectionNo'];
				$passer['section_name']=$display['section_name'];
				$passer['subject_title']=$display['subject_title'];

				
				$attachment="";
				

                if( (!empty($passer['file_path'])) and (!empty($passer['file_name'])) )
                {

                $attachment='<div class="attachment">
                			<form action="" method="post" name="download">
                                <div class="row">';

                        $temp = explode(".",$passer['file_name']);
                        $nameoffile = $temp[0];
                        $extension = end($temp);

                    	if(
                        ($extension=='doc')||($extension=='docx')||($extension=='docm')||
                        ($extension=='docb')||($extension=='dotm')||
                        ($extension=='dotx')
                      	) 
                      	{
                            $attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/word.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }

                        else if ($extension=='pdf') 
                        {
                        	$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/adobe.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }

                       	else if(
                        ($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')
                        ||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb')
                        )
                      	{
                      		$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/excel.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                      	}

                      	else if
                        ( 
                        ($extension=='ppt')||($extension=='pptx')||($extension=='pptm')||($extension=='potx')||
                        ($extension=='potm')||($extension=='ppam')||($extension=='ppsx')||($extension=='ppsm')||
                        ($extension=='sldx')||($extension=='sldm')
                        )
                        {
                        	$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/powerpoint.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }

                        else if
                      	( 
                        $extension=='7z'
                      	)
                        {
                        	$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/7z.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }

                        else if
                       	(
                    	$extension=='rar'
                   		)
                        {
                        	$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/rar.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }

                         else if
                        (
                        $extension=='swf'
                        )
                        {
                        	$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/swf.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }

                        else if
                        (
                        $extension=='zip'
						)
                        {
                        	$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="views/res/zip.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }

                        else
                        {
                        	$attachment=$attachment .'<div class="col-md-2">
                                    	<div><img src="'.$passer['file_path'].$passer['file_name'].'" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                	</div>';
                        }



                            $attachment=$attachment .'<div class="has-padding-left has-padding-right">
                                		<div class="pull-right">
                                    		<i class="fa fa-thumb-tack"></i>
                                		</div>
                        	           	
                        	           	<p><span class="glyphicon glyphicon-paperclip"></span> '.$passer['file_name'].'</p>
                                        <input name="file_name" value="'.$passer['file_name'].'" type="hidden"/>
                                        <div class="btn-group" role="group">
                                        	<button type="submit" class="btn btn-primary btn-xs">
                            					Download <span class="glyphicon glyphicon-save"></span>
                            				</button>
                            				<button type="button" class="btn btn-primary btn-xs">
                            					Preview
                            				</button>
                                        </div>  
                                	</div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                }

														
				$passer['display_attachment']=$attachment;
                $passer['announcement_id']=$display['date_created'];

                $comments="";
                //select comments
                $sql="SELECT announcement_lecture_comments.*, registration.reg_lname, registration.reg_fname, registration.image 
                FROM announcement_lecture_comments inner join registration on announcement_lecture_comments.account_id=registration.reg_id
                where announcement_lecture_comments.post_date_created='".$display['date_created']."'";

                $select_comments= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Pulling Comments Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
                while($comment = mysqli_fetch_array($select_comments))
                {
                    $comments=$comments .   '<div class="row has-padding-top-5">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <img src="views/res/'.$comment['image'].'" class="shadow post-comment-img img-thumbnail pull-left img-responsive" />
                                                    </div>

                                                    <div class="input-group col-md-11 col-md-offset-1">
                                                        <div class="comment"><a class="comment-author">'.$comment['reg_fname'].' '.$comment['reg_lname'].' </a>'.$comment['comment_message'].'
                                                        </div>
                                                        <div><small class="comment-timespan"><strong>'.convert_datetime_to_12hr($comment['comment_date_created']).'</strong></small></div>
                                                        <div><small class="comment-timespan">'.get_time_difference_php($comment['comment_date_created']).'</small></div>
                                                    </div>
                                                </div>
                                            </div><!--//row-->';
                }

                $passer['comments']=$comments;
                $passer['message_id']=createMessageId();


				if($first) 
				{

					echo json_encode($passer);
						 $first = false;

				}		 
				else 
				{
					echo ',' . json_encode($passer);
				}
			}
				
			echo "],\"success\": [".json_encode($success_message)."]}";
}

function clean($str)
{
	$cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');
	
	$str = @trim($str);
	if(get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}
	return mysqli_real_escape_string($cxn,$str);
}

 function get_time_difference_php($created_time)
 {
        date_default_timezone_set('Asia/Manila'); //Change as per your default time
        $str = strtotime($created_time);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return intval($time_differnce/$years)." years ago";
        }else if(intval($time_differnce/$years) > 0)
        {
            return intval($time_differnce/$years)." year ago";
        }else if(intval($time_differnce/$months) > 1)
        {
            return intval($time_differnce/$months)." months ago";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return intval(($time_differnce/$months))." month ago";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return intval(($time_differnce/$days))." days ago";
        }else if (intval(($time_differnce/$days)) > 0) 
        {
            return intval(($time_differnce/$days))." day ago";
        }else if (intval(($time_differnce/$hours)) > 1) 
        {
            return intval(($time_differnce/$hours))." hours ago";
        }else if (intval(($time_differnce/$hours)) > 0) 
        {
            return intval(($time_differnce/$hours))." hour ago";
        }else if (intval(($time_differnce/$minutes)) > 1) 
        {
            return intval(($time_differnce/$minutes))." minutes ago";
        }else if (intval(($time_differnce/$minutes)) > 0) 
        {
            return intval(($time_differnce/$minutes))." minute ago";
        }else if (intval(($time_differnce)) > 1) 
        {
            return intval(($time_differnce))." seconds ago";
        }else
        {
            return "few seconds ago";
        }
  }

function convert_datetime_to_12hr($datetime)
{
    $new_time=date("Y-m-d h:i A", strtotime($datetime));

    return $new_time;
  
}

function createMessageId()
{
    $rand9int=$message_id="";
        
        $rand9int=strval(mt_rand ( 100000000 , 999999999 ));

        $message_id="M" . $rand9int;

        return $message_id;
}
		
?>