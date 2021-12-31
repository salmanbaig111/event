<?php
include('connect.php');

$event_title=$_POST['event_title'];
$start_date=$_POST['start_date'];
$type_count=$_POST['type_count'];
$type_count_day=$_POST['type_count_day'];
$repeat_type=$_POST['repeat_type'];
$end_date=$_POST['end_date'];
$end_occurrence=$_POST['end_occurrence'];

if ($end_occurrence!="0" && $end_occurrence!=null) {
$end_date=null;	
}



$qry=mysqli_query($con,"INSERT into event_tbl(`event_name`, `start_date`, `repeat_type`, `repeat_count`, `end_date`, `end_occurrence`) values('$event_title','$start_date','$repeat_type','$type_count','$end_date','$end_occurrence') ");

echo json_encode(array("message"=>"done"));


?>