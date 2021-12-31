<?php
include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<link rel="stylesheet" type="text/css" href="css/style.css">


	<title>View Events</title>
</head>
<body>
	<p class="custompad">
		<a class="btn btn-info" href="index.php" target="_blank">Back to Home Page</a>

	</p>

	
<hr>

	<div class="tbl">
<table class="table">
<thead>
<tr>
<td>Title</td>
<td>Start Date</td>

<td>Actions</td>

</tr>
</thead>

<tbody>
<?php

$qry=mysqli_query($con,"select * from event_tbl");
while ($row=mysqli_fetch_assoc($qry)) 
{

echo '
<tr>
<td>'.$row['event_name'].'</td>
<td>'.$row['start_date'].'</td>
<td>
<button class="view" data-id="'.$row['event_id'].'">View</button>
<button class="del" data-id="'.$row['event_id'].'">Del</button>
</td>
</tr>';

	// code...
}

?>

</tbody>
</table>
</div>
<hr>

<table class="table custom">
	<thead>
<tr>
	<th>Date</th>
	<th>Day Name</th>
</tr>
	</thead>
	<tbody class="view_data">

	</tbody>

</table>




</body>

<script type="text/javascript">
$(".custom").css("display","none");
$(".del").on('click',function () 
  {




 $.ajax({
      type: "POST",
      url: "function.php",
      data: {"id":$(this).data("id"),"event":"delete"},
      success: function(resp)
      {

console.log(resp);
alert("Successfully Delete Event..");
window.location="";
      }

  }); //End Ajax Call
     




});





// Start View Event

$(".view").on('click',function () 
  {


$(".custom").css("display","block");

 $.ajax({
      type: "POST",
      url: "function.php",
      data: {"id":$(this).data("id"),"event":"view"},
      success: function(resp)
      {

console.log(resp);
// alert("Successfully Delete Event..");
// window.location="";

$(".view_data").html(resp);
      }

  }); //End Ajax Call
     




});



</script>
</html>