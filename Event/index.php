<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Add Event Page</title>
</head>
<body>


<form id="mainform" action="submit_event.php" method="POST">

<!-- For Title -->
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Event Title : </label>
	<div class="col-sm-10">
	<input type="text" name="event_title" id="event_title" class="input-group" required>
    </div>
	

</div>



<div class="form-group row">
	<label class="col-sm-2 col-form-label">Start Date : </label>
	<div class="col-sm-10">
	<input type="date" name="start_date" id="start_date" class="input-group" required>
    </div>
	

</div>



<div class="form-group row">
	<label class="col-sm-2 col-form-label">Recurrence (Repeat Every): </label>
	<div class="col-sm-10 row">
		<span  id="repeat_count" class="col-sm-4">	
	<input type="number" name="type_count" id="type_count" class="input-group" min="1" max="10">

	<select  name="type_count_day" id="type_count_day">
		<option value="1">Sun</option>
		<option value="2">Mon</option>

		<option value="3">Tue</option>

		<option value="4">Wed</option>

		<option value="5">Thur</option>

		<option value="6">Fri</option>
		<option value="7">Sat</option>
	</select>

</span>
<div class="col-sm-8">
<select  name="repeat_type" id="repeat_type">
		<option value="1">Day</option>
		<option value="2">Week</option>

		<option value="3">Month</option>

		<option value="4">Year</option>

		
	</select>


</div>

    </div>
	

</div>

<hr>

<div class="form-group row">
	<label class="col-sm-4 col-form-label">Ends : </label>
<div class="col-sm-8 row">

	<label class="col-sm-4 col-form-label"> 
		<input type="radio" name="end_occur_radio" class="end_occur_radio" value="1" >
      ON : 
</label>

<div class="col-sm-8">
	<input type="date" name="end_date" id="end_date" class="input-group">

</div>

<label class="col-sm-4 col-form-label"> 
		<input type="radio" name="end_occur_radio" class="end_occur_radio" value="2" >
      After : 
</label>

<div class="col-sm-8 row">
	<div class="col-sm-8">
<input type="number" name="end_occurrence" id="end_occurrence" class="input-group" >
	</div>

	<label class="col-sm-4 col-form-label">Occurrences : </label>
</div>
<p></p>
<div class="col-sm-8">
	<button class="btn btn-info" type="submit">Submit</button>
	<a class="btn btn-info" href="view_event.php" target="_blank">View All Event</a>
	
</div>
<p></p>

</div>
<hr>
</div>








</form>

<script type="text/javascript">
$("#type_count").attr("required","true");
$(".end_occur_radio").attr("required","true");

 $("#repeat_type").on('change',function () 
  {

if ($(this).val()=="2") 
{

$("#type_count").css("display","none");
$("#type_count_day").css("display","block");
$("#type_count").attr("required","false");
$("#type_count_day").attr("required","true");

}
else{

$("#type_count").css("display","block");
$("#type_count_day").css("display","none");

$("#type_count").attr("required","true");
$("#type_count_day").attr("required","false");

}

  });






$(".end_occur_radio").on('change',function () 
  {

if ($(this).val()=="1") 
{


$("#end_date").attr("required","true");
$("#end_occurrence").attr("required","false");

}
else{



$("#end_date").attr("required","false");
$("#end_occurrence").attr("required","true");

}

  });



  $("#mainform").submit(function (event) 
  {
   
  event.preventDefault();
  var form=$(this);
 


    $.ajax({
      type: "POST",
      url: "submit_event.php",
      data: form.serialize(),
      success: function(resp)
      {

console.log(resp);
alert("Successfully Create Event..");
      }

  }); //End Ajax Call
     

  
  }); // End Default Form 

</script>
</body>
</html>