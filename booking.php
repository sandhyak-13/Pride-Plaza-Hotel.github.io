<?php
session_start();

include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
if($eid=="")
{
	header('location:Login.php');
}
$sql= mysqli_query($con,"select * from room_booking_details where email='$eid'");
$res=mysqli_fetch_assoc($sql);
extract($_REQUEST);
error_reporting(1);
if(isset($_POST['submit']))
{
	$name= $_POST['name'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$address= $_POST['address'];
	$zip= $_POST['zip'];
	$room_type= $_POST['room_type'];
	$check_in_date= $_POST['check_in_date'];
	$check_in_time= $_POST['check_in_time'];
	$check_out_date= $_POST['check_out_date'];
	
	$sql="insert into room_booking_details(
	name,email,phone,address,zip,room_type,check_in_date,check_in_time,check_out_date,occupancy) values
	('$name','$email','$phone','$address','$zip','$room_type','$check_in_date','$check_in_time','$check_out_date','$occupancy')";

	$res = mysqli_query($con,$sql);
	
	
	if($res){
		?>
		<script>alert("data inserted");</script>
		<?php
	}else{
		?>
		<script>alert("not inserted")</script><?php
	}
}
?>
<html>
<head>
<title>
booking
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <style>
		.submit{
     background:#0066A2;
     color:white;
     border-style:outset;
     border-color:#0066A2;
     height:50px;
     width:100px;
     font:bold15px arial,sans-serif;
     text-shadow:none;
}
  </style>
</head>
<body><?php include('Menu_Bar.php')?><h1>Booking Form</h1>
	<div class="container-fluid text-center" style="margin-top:50px;">
		<div class="container">
			<div class="row">
				<form  method="POST">
					<div class="col-sm-9">
						<div class="form-group">
						<div class="col-sm-11">
							<div class="row">
								<div class="control-label col-sm-4"><h4>Name:</h4></div>
								<div class="col-sm-4">
									<input type="text"  class="form-control" name="name" placeholder="Please enter name"required>
								</div>
							</div><br>
						</div>
						<br>
					
						<div class="col-sm-11">
								<div class="row">
								<div class="control-label col-sm-4"><h4>Email:</h4></div>
									<div class="col-sm-4">
									<input type="email" class="form-control" name="email" placeholder="Please enter email"required>
								</div>
							</div><br>
						</div>
						<br>
						<div class="col-sm-11">
							<div class="row">
								<div class="control-label col-sm-4"><h4>phone:</h4></div>
								<div class="col-sm-4">
									<input type="number"  class="form-control" name="phone" placeholder="Please Enter mobile.no" required>
								</div>
							</div><br>
						</div>
						<br>
						<div class="col-sm-11">
							<div class="row">
								<div class="control-label col-sm-4"><h4>address</h4></div>
								<div class="col-sm-4">
								<input type="address" class="form-control" name="address" placeholder="Please enter address"required>
							</div>
						</div><br>
					</div>
					<div class="col-sm-11">
						<div class="row">
							<div class="control-label col-sm-4"><h4>zipcode</h4></div>
							<div class="col-sm-4">
								<input type="number"  class="form-control" name="zip" placeholder="Please enter zipcode"required>
							</div>
						</div><br>
					</div>
						</div>
				
				<div class="col-sm-11">
					<div class="form-group">
						<div class="row">
							<div class="control-label col-sm-4"><h4>Room type</h4></div>
							<div class="col-sm-4">
							<select name="room_type"  class="form-control" required>
								<option>Deluxe room</option>
								<option>Luxurious room</option>
								<option>standard room</option>
								<option>suite room</option>
								<option>twin deluxe room</option>
							</select>
							</div>
						</div><br>
		
					
						<div class="row">
							<div class="control-label col-sm-4"><h4>check in date</h4></div>
							<div class="col-sm-4">
							<input type="date"  name="check_in_date" class="form-control" required>
						</div>
					</div><br>
					
		
				<div class="col-sm-12">
					
						<div class="row">
							<div class="control-label col-sm-4"><h4>check in time</h4></div>
							<div class="col-sm-4">
							<input type="time"  name="check_in_time" class="form-control" required>
						</div>
					</div><br>
					</div>
				<br>
				<div class="col-sm-12">
					
						<div class="row">
							<div class="control-label col-sm-4"><h4>check out date</h4></div>
							<div class="col-sm-4">
							<input type="date"  name="check_out_date" class="form-control" required>
						</div>
					</div><br>
					</div>
				</div>
				<div class="col-sm-11">
					
						<div class="row col-sm-11">
							<label class="control-label col-sm-4"><h4 id="top">Occupancy:</h4></label>
							
								<div class="radio-inline"><input type="radio" value="single" name="occupancy"required>single<br></div>
								<div class="radio-inline"><input type="radio" value="twin" name="occupancy"required>twin<br></div>
								<div class="radio-inline"><input type="radio" value="double" name="occupancy"required>dubble</div><br>
							
						</div><br>
					
					
				</div>
				
				<div class="col-sm-12">
								<h2><a href="payment.php" style="align:center; font-size:20px;"><b>Click here to payment</b></a></h2>
						<br>
					</div>
				
				</div>
				<div class="col-sm-12">
				<div class="row"><div class="col-sm-10">
				<input type="submit" name="submit" value="submit" style="background:#0066A2;color:white;font:bold15px arial,sans-serif; height:50px;width:100px;border-radius:10px;"/>
				</div></div>
			</form><br>
			</div>
		</div>
	</div>
	</div>
	<?php
	include('Footer.php');
	?>
</body>
</html>