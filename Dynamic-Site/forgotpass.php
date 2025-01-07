<?php 
	include"inc/header.php";
	Session::chkLogin();
	
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['forgotpass'])){
		$retrivepassmsg = $usr->retrivePassword($_POST);
	}
?>
<!--Header Section End------------->


<!--Forgot Password Form Start------------->
<div class="container form_container background" style="background-image:url(images/1.jpg);background-blend-mode:overlay;">
	<div class="mcol_8 register">
	<div class="mcol_12">
		<form action="" method="POST">
		<table class="tbl_form">
			<caption><h1>forgot password</h1></caption>
		<?php if(isset($retrivepassmsg)){ ?>
			<tr>
				<td colspan="2">
					<?php echo $retrivepassmsg; ?>
				</td>
			</tr>
		<?php } ?>
			
			<tr>
				<td>
					<label for="email">Email Address</label>
				</td>
				<td>
					<input type="email" placeholder="Enter email address" name="email">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="username">Username</label>
				</td>
				<td>
					<input type="text" placeholder="Enter username" name="username">
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<button class="btn_success" type="submit" name="forgotpass">Send</button>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
				<p><a href="signin.php">Sign In Now</a></p>
				</td>
			</tr>
		</table>
		</form>
	</div>
	</div>
</div>
<!--Forgot Password Form End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->