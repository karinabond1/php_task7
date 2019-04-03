<html>
<head>
	<title>%TITLE%</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="css/global.css" rel="stylesheet" media="screen" >
</head>
<body>
<div class="global">
	<div><h2>Contact Form</h2></div>
	

	<form action="" method="post">
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
	<div class="form-group">
    	<label for="exampleFormControlInput1">Name </label>
    	<input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="%NAME%" value=%NAME_VAL%>
  </div>
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
  	<div class="form-group">
    	<label for="exampleFormControlInput1">Email address</label>
    	<input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="%EMAIL%" value=%EMAIL_VAL%>
  </div>
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select the Theme</label>
    <select class="form-control" name="select" id="exampleFormControlSelect1" >%SELECT%
		<option disabled selected>%SELECT%</option>
		<option>Feedback</option>
      	<option>Gratefulness</option>
	 	 <option>Complain</option>
    </select>
  </div>
  <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="%MESSAGE%" value=%MESSAGE_VAL%></textarea>
	</div>
	<input type="submit" name="btn" class="btn btn-warning" value="Send"></button>
</form>
<div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
