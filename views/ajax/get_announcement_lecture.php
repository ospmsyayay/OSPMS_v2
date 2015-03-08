
<?php 
session_start();

		if(isset($_GET['class_rec_no']))
		{
			$class_rec_no=$_POST['class_rec_no'];

			get_announcement($class_rec_no);
		}	

        if(isset($_GET['ajax_message']))
        {
            $message='';
            $message=clean($_POST['ajax_message']);
            $class_rec_no=$_POST['class_rec_no'];

            /*echo "{\"success\": [" . json_encode($class_rec_no). "]}";
*/
            post_message($message,$class_rec_no);
        
            
        }

        if(isset($_GET['comment']))
        {
            $comment='';
            $comment=clean($_POST['comment']);
            $announcement_id=$_POST['announcement_id'];
            $class_rec_no=$_POST['class_rec_no'];

            /*echo "{\"success\": [" . json_encode($comment). "]}";
*/
            post_comment($comment,$announcement_id,$class_rec_no);
        
            
        }

        if(isset($_GET['comment_general']))
        {
            $comment='';
            $comment=clean($_POST['comment']);
            $announcement_id=$_POST['announcement_id'];

            /*echo "{\"success\": [" . json_encode($comment). "]}";
*/
            post_comment_general($comment,$announcement_id);
        
            
        }

        if(isset($_GET['reset_general']))
        {
            get_announcement_general();
            
        }

        if(isset($_GET['edit_post']))
        {
            $edit_message='';
            $edit_message=clean($_POST['edit_message']);
            $edit_id=$_POST['edit_id'];
            $class_rec_no=$_POST['class_rec_no'];

            edit_post($edit_message, $edit_id, $class_rec_no);
            /*echo "{\"success\": [" . json_encode($edit_message). ",".json_encode($edit_id).",".json_encode($class_rec_no)."]}";*/
            
        }

        if(isset($_GET['delete_post']))
        {
 
            $delete_id=$_POST['delete_id'];
            $class_rec_no=$_POST['class_rec_no'];

            delete_post($delete_id, $class_rec_no);
            /*echo "{\"success\": [" . json_encode($edit_message). ",".json_encode($edit_id).",".json_encode($class_rec_no)."]}";*/
            
        }

function post_message($message,$class_rec_no)
{
    if(!empty($message))
    {
        $message_date_created='';
        $message_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO announcement_lecture(date_created, messageorfile_caption) VALUES('".$message_date_created."','".$message."')";
                
            $announcement_lecture_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Post Message Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($announcement_lecture_inserted==true)
            {
                $query="Select class_rec_no from section where class_rec_no='$class_rec_no'"; 

                $fetch_class_rec= mysqli_query($cxn,$query) or die('Unable to connect to Database. Select Class Rec No Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));


                while($each_rec = mysqli_fetch_array($fetch_class_rec))
                {
                    
                    $insert="INSERT INTO post_announcement_lecture VALUES('".$each_rec['class_rec_no']."','".$message_date_created."')";

                    $insert_done=mysqli_query($cxn,$insert) or die('Unable to connect to Database. Insert Announcement Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
                }

                get_announcement($class_rec_no);

            }    


        
    }

}

	
function get_announcement($class_rec_no)
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
	 
				
			$announcement_result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. Get Announcement Problem '.mysqli_error($cxn));

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
				
			echo "],\"success\": [".json_encode("Message Posted")."]}";
}
//Edit Post
function edit_post($edit_message, $edit_id, $class_rec_no)
{
    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

    $sql="UPDATE announcement_lecture SET messageorfile_caption = '$edit_message' where date_created='$edit_id'";

    $post_edited= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Edit Post Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
    if($post_edited==true)
    {
        get_announcement($class_rec_no);

    }    
}

//Delete Post
function delete_post($delete_id, $class_rec_no)
{
    $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

/*    $sql="DELETE FROM announcement_lecture_comments WHERE post_date_created='".$delete_id."'";

    $comments_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Comments Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($comments_deleted==true)
    {

    }    */


    $sql="DELETE FROM post_announcement_lecture WHERE class_rec_no='$class_rec_no' and date_created='".$delete_id."'";
    $post_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Post Announcement Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($post_deleted==true)
    {
         get_announcement($class_rec_no);
    }    

/*    $sql="DELETE FROM announcement_lecture WHERE date_created='".$delete_id."'";
    $announcement_deleted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Delete Announcement Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
    if($announcement_deleted==true)
    {
        get_announcement($class_rec_no);

    }    */
}

//Comment
function post_comment($comment,$announcement_id,$class_rec_no)
{
    if(!empty($comment))
    {
        $comment_date_created='';
        $comment_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO announcement_lecture_comments(comment_date_created, account_id, comment_message, post_date_created) VALUES('".$comment_date_created."','".$_SESSION['account_id']."','".$comment."','".$announcement_id."')";
                
            $comment_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Post Comment Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($comment_inserted==true)
            {
                get_announcement($class_rec_no);

            }    

    }


}

//Comment General
function post_comment_general($comment,$announcement_id)
{
    if(!empty($comment))
    {
        $comment_date_created='';
        $comment_date_created= date("Y-m-d H:i:s");  

        $cxn = mysqli_connect('localhost', 'root', 'unix', 'ospms');

        $sql="INSERT INTO announcement_lecture_comments(comment_date_created, account_id, comment_message, post_date_created) VALUES('".$comment_date_created."','".$_SESSION['account_id']."','".$comment."','".$announcement_id."')";
                
            $comment_inserted= mysqli_query($cxn,$sql) or die('Unable to connect to Database. Post Comment Problem '. mysqli_errno($cxn) .' '. mysqli_error($cxn));
            
            if($comment_inserted==true)
            {
                get_announcement_general();

            }    

    }


}

//Get announcement general
function get_announcement_general()
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
            where section.teacherID = '".$_SESSION['account_id']."' order by date_created desc";
     
                
            $announcement_result=mysqli_query($cxn,$sql) or die('Unable to connect to Database. Get Announcement General Problem '.mysqli_error($cxn));

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
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

                        else if ($extension=='pdf') 
                        {
                            $attachment=$attachment .'<div class="col-md-2">
                                        <div><img src="views/res/adobe.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                    </div>';

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
                                            <button type="button" class="btn btn-primary btn-xs preview" doc-type="pdf">
                                                Preview
                                            </button>
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

                        else if(
                        ($extension=='xls')||($extension=='xlsx')||($extension=='xlsm')
                        ||($extension=='xltx')||($extension=='xltm')||($extension=='xlsb')
                        )
                        {
                            $attachment=$attachment .'<div class="col-md-2">
                                        <div><img src="views/res/excel.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                    </div>';

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
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
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
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

                        else if
                        ( 
                        $extension=='7z'
                        )
                        {
                            $attachment=$attachment .'<div class="col-md-2">
                                        <div><img src="views/res/7z.png" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                    </div>';

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
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

                        else if
                        (
                        $extension=='rar'
                        )
                        {
                            $attachment=$attachment .'<div class="col-md-2">
                                        <div><img src="views/res/rar.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                    </div>';

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

                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

                         else if
                        (
                        $extension=='swf'
                        )
                        {
                            $attachment=$attachment .'<div class="col-md-2">
                                        <div><img src="views/res/swf.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                    </div>';

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
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

                        else if
                        (
                        $extension=='zip'
                        )
                        {
                            $attachment=$attachment .'<div class="col-md-2">
                                        <div><img src="views/res/zip.jpg" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                    </div>';

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
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

                        else
                        {
                            $attachment=$attachment .'<div class="col-md-2">
                                        <div><img src="'.$passer['file_path'].$passer['file_name'].'" class="img-thumbnail post-lecture-image pull-left img-responsive"></div>
                                    </div>';

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
                                          
                                        </div>  
                                    </div>

                                </div><!--//row-->
                            </form>
                        </div><!-- //attachment -->';
                        }

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
                
            echo "],\"success\": [".json_encode("Message Posted")."]}";
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