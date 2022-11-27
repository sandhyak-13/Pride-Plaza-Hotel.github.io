<?php 
$i=1;
$sql=mysqli_query($con,"select * from admin");
while($res=mysqli_fetch_assoc($sql))
{
?>
<html>
<head>
	<title>admin</title>
</head>
<style>
	input,select
	{
		padding: 14px 90px;
		margin: 8px 10px;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 2px;
		box-sixing: border-box;
	}
</style>
<body>
	<h1 style="background-color:#ddd; border-radius:50px; text-align:center; box-shadow: 9px 9px 9px black; text-shadow: 1px 1px; color:white;">admin</h1><br>
	<div class="container" style="text-align:center">
		<form action="/action.php" method="POST">
			<div class="form-group">
				<label for="email">Name:</label>
				<input type="text" class="form-control" id="username" value="<?php echo $res['username'];?>" placeholder="name" name="name" style="align:center">
		</div><br>
		<div class="form-group">
			<label for="email">Password:</label>
			<input type="pwd" class="form-control" id="pwd"  placeholder="password" name="pwd" value="<?php echo $res['password'];?>" style="align:center">
		</div>
		</form>
	</div>
</body>
<?php 	
}
?>
</html>