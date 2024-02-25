<?php 
	session_start();
	if(isset($_SESSION['email'])){
?>
<h3>Apply Leave</h3><br>
<div class="row">
	<div class="col-md-6">
		<form action="" method="post">
			<div class="form-group">
			<input class="form-control" type="text" name="subject" placeholder="Enter Subject" />
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="5" cols="50" name="message" placeholder="Type Message"></textarea>
			</div>
			<input type="submit" class="btn btn-warning" name="submit_leave" />
		</form>
	</div>
</div>
<?php  
}
else{
	header('Location:user_login.php');
}