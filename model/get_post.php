<!--@author Darryl-->
  <!--@copyright 2014-->
<?php 
function get_announcement($teacherID)
{
	include "config/conn.php";
	
	$sql="Select date_created, message from write_announcement where teacherID='".$teacherID."' order by date_created desc"  ;
	
	$post_announcement= mysqli_query($cxn,$sql);
	
	return $post_announcement;
	

}

function get_upload($teacherID)
{
    include "config/conn.php";
    
    $sql="Select date_created, file_caption, file_path, file_name from post_lecture where teacherID='".$teacherID."' order by date_created desc"  ;
    
    $get_lecture= mysqli_query($cxn,$sql);
    
    return $get_lecture;
    

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
/*
function merge($array, $copyBuffer, $low, $middle, $high)
{

    //$array - being sorted
    //copyBuffer - temp space
    //low - beginning of first sorted subarray
    //middle - end of first sorted subarray
    //middle + 1 - beginning of second sorted subarray
    //high - end of second sorted subarray

    //Initialize i1 and i2 to the first items in each subarray
    $i1 = low;
    $i2 = middle + 1;

    //Interleave items from the subarrays into the copyBuffer in such a way that order is maintained

    for( $i = $low; $i <= $high; $i++)
    {
        if($i1 > $middle)
            $copyBuffer[$i]=$array[$i2++];  //First subarray exhausted
        else if ($i2 > $high)
            $copyBuffer[$i]=$array[$i1++];  //Second subarray exhausted
        else if ($array[$i1] < $array[$i2])
            $copyBuffer[$i] = $array[$i1++]; //Item in first subarray is less
        else
            $copyBuffer[$i] = $array[$i2++]; //Item in second subarray is less
    }
    
    for ($i = $low; $i <= $high; $i++)  //Copy sorted items back into
         $array[$i]= $copyBuffer[$i];    //proper position in $array
    }

}
*/