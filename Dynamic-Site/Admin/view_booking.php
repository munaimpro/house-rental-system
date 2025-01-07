<?php
	include"inc/header.php";
	
	/*========================
	Access Control
	========================*/
	if(Session::get("userLevel") == 1){
		echo"<script>window.location='../index.php'</script>";
	}
	
	if((!isset($_GET['renterid']) || !isset($_GET['ownerid']) || !isset($_GET['adid'])) || ($_GET['renterid'] == NULL || $_GET['ownerid'] == NULL || $_GET['adid'] == NULL)){
		echo"<script>window.location='../index.php'</script>";
	} else{
		$renterId = $_GET['renterid'];
		$ownerId  = $_GET['ownerid'];
		$adId 	  = $_GET['adid'];
		
		$renterinfo = $bk->getBookingRenter($renterId, $ownerId, $adId);
		$ownerinfo = $bk->getOwnerInfo($ownerId);
		
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancel_book'])){
			$CancelBook = $bk->cancelBooking($renterId, $ownerId, $adId);
			
		}
	}
?>


<!--Add Property Section Start------------->
<div class="container">
	<div class="mcol_12 admin_page_title">
		<div class="page_title overflow">
			<h1 class="sub-title">property booking</h1>
			<h4><a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i><span>sign out</span></a></h4>
		</div>
	</div>
	
	<div class="responsive_mcol_small mcol_12">
		<?php include"inc/sidebar.php";?>
		
		<div class="responsive_mcol  responsive_mcol_small mcol_8">
		<!--Admin Content Start------------->
			<div class="admin_content overflow">
				<form action="" method="POST">
			
			<!--Book Property Block Start: Rentar ------------->
				<div class="add_property_block overflow">
				<?php
					if($renterinfo){
						while($rentInfo = $renterinfo->fetch_assoc()){ 
				?>
					<div class="property_block_title">
						<h2>rentar details</h2>
					</div>
					
					<div class="property_block_body overflow">
					<?php
						if(isset($CancelBook)){
							echo $CancelBook;
						}
					?>
						<div class="add_property_title">
							<p>full name</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="" value="<?php echo $rentInfo['renterName'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>E-Mail address</p>
						</div>
						
						<div class="add_property_field">
							<input type="email" value="<?php echo $rentInfo['renterMail']?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>mobile number</p>
						</div>
						
						<div class="add_property_field">
							<input type="phone" value="<?php echo $rentInfo['renterPhone']?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>address</p>
						</div>
						
						<div class="add_property_field">
							<textarea name="raddress"><?php echo $rentInfo['renterAddress']?></textarea>
						</div>
					</div>
				<?php } } ?>
				</div>
			<!--Book Property Block End------------->
			
			
			<!--Book Property Block Start: Owner ------------->
				<div class="add_property_block overflow">
				<?php
					if($ownerinfo){
						while($ownInfo = $ownerinfo->fetch_assoc()){ 
				?>
					<div class="property_block_title">
						<h2>owner details</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>full name</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="" value="<?php echo $ownInfo['firstName']." ".$ownInfo['lastName']?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>E-Mail address</p>
						</div>
						
						<div class="add_property_field">
							<input type="email" value="<?php echo $ownInfo['userEmail']?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>mobile number</p>
						</div>
						
						<div class="add_property_field">
							<input type="phone" value="<?php echo $ownInfo['cellNo']?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>address</p>
						</div>
						
						<div class="add_property_field">
							<textarea name="owaddress"><?php echo $ownInfo['userAddress']?></textarea>
						</div>
					</div>
				<?php } } ?>
				</div>
			<!--Book Property Block End------------->
			
			
			<!--Book Property Block Start: Price ------------->
				<div class="add_property_block overflow">
				<?php
					$getAd = $bk->getBookedPropertyById($adId, $renterId, $ownerId);
					if($getAd){
						while($ad = $getAd->fetch_assoc()){ 
				?>
					<div class="property_block_title">
						<h2>price details</h2>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>rent type</p>
						</div>
						
						<div class="add_property_field">
							<select name="renttype">
								<option value="mo"<?php if($ad['rentType'] == "mo"){?>selected="selected"<?php } ?>>Per month</option>
								<option value="we"<?php if($ad['rentType'] == "we"){?>selected="selected"<?php } ?>>Per week</option>
							</select>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>rent (BDT)</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="adrent" value="<?php echo $ad['adRent'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>gas bill</p>
						</div>
						
						<div class="add_property_field">
							<input type="text" name="gasbill" value="<?php echo $ad['gasBill'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>electric bill</p>
						</div>
						<div class="add_property_field">
							<input type="text" name="electricbill" value="<?php echo $ad['electricBill'];?>"/>
						</div>
					</div>
					
					<div class="property_block_body overflow">
						<div class="add_property_title">
							<p>service charge</p>
						</div>
						
						<div class="add_property_field">
							<input type="number" name="scharge" value="<?php echo $ad['sCharge'];?>"/>
						</div>
					</div>
				<?php
					if(Session::get("userLevel") == 3){
				?>	
					<div class="action_button overflow">
						<button onclick="return confirm('Are you sure to cancel this booking?')" type="submit" name="cancel_book">cancel booking</button>
					</div>
				<?php } ?>
				<?php } } else{
					echo"<script>window.location='../index.php'</script>";
				} ?>
				</div>
			<!--Book Property Block End------------->
			</div>
		<!--Admin Content End------------->
		
		</div>
	</div>
</div>
<!--Add Property Section Start------------->


<!--Footer Section Start------------->		
<?php include"inc/footer.php";?>
<!--Footer Section End------------->