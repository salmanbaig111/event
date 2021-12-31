<?php
include('connect.php');

if (isset($_POST['event'])) 
{

$id=$_POST['id'];
	if ($_POST['event']=="delete")
	 {
	
$qry=mysqli_query($con,"DELETE from event_tbl where event_id=".$id);

echo "success";
		// code...
	}



	if ($_POST['event']=="view")
	 {



   $qry=mysqli_query($con,"SELECT * from event_tbl where event_id=".$id);

 if ($row=mysqli_fetch_assoc($qry))
 {
 	
 	$end_occurrence = $row['end_occurrence'];

 	if ($end_occurrence == '0') {
 		getDataEnddateWise($row);
 	}
   else{
       getDataEndOccurrenceWise($row);
   }
 }
	
}

}


function getDataEndOccurrenceWise($row){

$repeat_count = $row['repeat_count'];
$week = 7;
for($i = 0 ; $i < $row['end_occurrence']; $i++){

	$r = $repeat_count * $i;


if($row['repeat_type'] == 'day'){

echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$r.' day')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$r.' day')) ."</tr>";

}

if($row['repeat_type'] == 'week'){
   $weekday = $week* $r ;
	echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$weekday.' day')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$weekday.' day'))."</tr>" ;
}


if($row['repeat_type'] == 'month'){

	echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$r.' month')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$r.' month'))."</tr>" ;
}


if($row['repeat_type'] == 'year'){

echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$r.' year')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$r.' year'))."</tr>" ;
	
}

}


}


function getDataEnddateWise($row){



$repeat_count = $row['repeat_count'];
$week = 7;

$condition = true;
$i = 0 ; 
while ($condition ) {
	 

$r = $repeat_count * $i;


if($row['repeat_type'] == 'day'   && strtotime($row['start_date'].' +'.$r.' day') < strtotime($row['end_date'])){

	echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$r.' day')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$r.' day'))."</tr>" ;

	}
else 
if($row['repeat_type'] == 'week'   && strtotime($row['start_date'].' +'.$week* $r.' day') < strtotime($row['end_date']))  {
   $weekday = $week* $r ;
	echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$weekday.' day')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$weekday.' day'))."</tr>" ;
} 
else 
if($row['repeat_type'] == 'month'   && strtotime($row['start_date'].' +'.$r.' month') < strtotime($row['end_date'])) {

	echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$r.' month')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$r.' month'))."</tr>" ;
} 
else 
if($row['repeat_type'] == 'year'   && strtotime($row['start_date'].' +'.$r.' year') < strtotime($row['end_date'])) {

echo  "<tr><td>".  date('Y-m-d',strtotime($row['start_date'].' +'.$r.' year')) . "</td><td>". date('D',strtotime($row['start_date'].' +'.$r.' year'))."</tr>" ;
	
} 
else 
 $condition = false ; 


$i ++ ; 

}


}
 


?>