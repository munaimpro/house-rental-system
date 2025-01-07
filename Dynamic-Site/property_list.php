<?php
include"inc/header.php";
	
/*===========================
Pagination process
===========================*/
	$per_page = 10;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page; 
	error_reporting(0);
?>
<!--Header Section End------------->

<div class="page_title">
	<h1 class="sub-title">property list</h1>
</div>

<!--Property List Section Start------------->
<div class="container">
	<div class="responsive_mcol mcol_12">
	
<!--Property Filter Section Start------------->
		<div class="responsive_mcol mcol_3">
			<div class="property_category property_filter">
				<form action="" method="POST">
				<nav>
					<ul>
						<li>filter by area</li>
						<li>
							<input type="search" name="adarea" <?php if(isset($_POST['adarea'])){?> value="<?php echo $_POST['adarea'];?>" <?php } ?> placeholder="Search Area"/>
						</li>
					</ul>
					
					<ul>	
						<li>property type</li>
					<?php
						$getcat = $cat->getAllCat();
						if($getcat){
							while($cat = $getcat->fetch_assoc()){ ?>
						<li>
							<input type="radio" name="catid" value="<?php echo $cat['catId']; ?>"/> <?php echo $cat['catName']; ?>
						</li>
					<?php } } ?>
					</ul>
					
					<ul>
						<li>bedroom</li>
						<li>
							<select class="select" name="totalbed">
								<option value="">bedroom</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="3+">3+</option>
							</select>
						</li>
					</ul>
					
					<ul>
						<li>price</li>
						<li>
							<select class="select" name="price">
								<option value="">price</option>
								<option value="10-">below 10,000</option>
								<option value="10">10,000 - 20,000</option>
								<option value="20">20,000 - 30,000</option>
								<option value="30">30,000 - 40,000</option>
								<option value="40">40,000 - 50,000</option>
								<option value="50+">50,000+</option>
							</select>
						</li>
					</ul>
					
					<div class="action_button overflow">
						<button type="submit" name="filter">Search</button>
					</div>
				</nav>
				</form>
			</div>
		</div>

<!--Property Content Section Start------------->
		<div class="responsive_mcol mcol_9">
	<!--Property List By Filter------------->	
		<?php
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['filter'])){
				$filterAd = $pro->getFilterAd($_POST);
				if($filterAd){
					while($fAd = $filterAd->fetch_assoc()){ 
		?>	
			<div class="property_box">
				<a href="property_details.php?adid=<?php echo $fAd['adId'];?>">
					<div class="property_box_content overflow">
						<div class="property_box_img">
							<img src="<?php echo $fAd['adImg'];?>" alt="ad image"/>
						</div>
						<div class="property_box_text">
							<p><?php echo $fAd['adTitle'];?></p>
							<h3><i class="fa-brands fa-accusoft"></i><?php echo $fAd['catName'];?></h3>
							<p><i class="fa-solid fa-file-pen"></i>Posted on: <?php echo $fm->formatDate($fAd['adDate']);?></p>
							<p><i class="fa-solid fa-location-dot"></i><?php echo $fAd['adAddress'];?></p>
							<p><img class="taka_sign" src="images/taka.png" alt="taka"/><?php echo $fAd['adRent'];?>/<?php if($fAd['rentType'] == "mo"){echo"Month";} else{ echo"Week"; }
							if(!empty($fAd['adNegotiable'])){ ?><span> (negotiable)</span><?php } ?></p>
						</div>
					</div>
				</a>
			</div>
		<?php } } else{
			echo"<h2>Searched Ad Not Available</h2>";
		} ?>
		
	<!--Property List By Search------------->
		<?php } elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['adSearch'])){
			$searchAd = $src->getSearchAd($_POST);
				if($searchAd){
					while($sAd = $searchAd->fetch_assoc()){ ?>
						<div class="property_box">
					<a href="property_details.php?adid=<?php echo $sAd['adId'];?>">
						<div class="property_box_content overflow">
							<div class="property_box_img">
								<img src="<?php echo $sAd['adImg'];?>" alt="ad image"/>
							</div>
							<div class="property_box_text">
								<p><?php echo $sAd['adTitle'];?></p>
								<h3><i class="fa-brands fa-accusoft"></i><?php echo $sAd['catName'];?></h3>
								<p><i class="fa-solid fa-file-pen"></i>Posted on: <?php echo $fm->formatDate($sAd['adDate']);?></p>
								<p><i class="fa-solid fa-location-dot"></i><?php echo $sAd['adAddress'];?></p>
								<p><img class="taka_sign" src="images/taka.png" alt="taka"/><?php echo $sAd['adRent'];?>/<?php if($sAd['rentType'] == "mo"){echo"Month";} else{ echo"Week"; };
								if(!empty($sAd['adNegotiable'])){ ?><span> (negotiable)</span><?php } ?></p>
							</div>
						</div>
					</a>
			</div>
			<?php } } else{
						echo"<h2>Searched Ad Not Available</h2>";
					} 
			} else{ 
			$getAllAd = $pro->getPropertyByPage($start_from, $per_page);
			if($getAllAd){
				while($getad = $getAllAd->fetch_assoc()){ 
		?>
		
		<!--Main Property List------------->	
			<div class="property_box">
				<a href="property_details.php?adid=<?php echo $getad['adId'];?>">
					<div class="property_box_content overflow">
						<div class="property_box_img">
							<img src="<?php echo $getad['adImg'];?>" alt="ad image"/>
						</div>
						<div class="property_box_text">
							<p><?php echo $getad['adTitle'];?></p>
							<h3><i class="fa-brands fa-accusoft"></i><?php echo $getad['catName'];?></h3>
							<p><i class="fa-solid fa-file-pen"></i>Posted on: <?php echo $fm->formatDate($getad['adDate']);?></p>
							<p><i class="fa-solid fa-location-dot"></i><?php echo $getad['adAddress'];?></p>
							<p><img class="taka_sign" src="images/taka.png" alt="taka"/><?php echo $getad['adRent'];?>/<?php if($getad['rentType'] == "mo"){echo"Month";} else{ echo"Week"; }
							if(!empty($getad['adNegotiable'])){ ?><span> (negotiable)</span><?php } ?></p>
						</div>
					</div>
				</a>
			</div>
			<?php } } } ?>	
		</div>
	</div>
	
	<!--Pagination Section Start-------------->
	<?php if($getAllAd){ ?>
	<div class="mcol_12">
	<?php
		$getAdRows = $pro->getPropertyRows();
		$total_pg  = ceil($getAdRows/$per_page);
	?>
		<div class="pagination">
			<ul>
				<li><a href="?page=1">prev</a></li>
			<?php for($i = 1; $i<= $total_pg; $i++){ ?>
				<li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php } ?>
				<li><a href="?page=<?php echo $total_pg; ?>">next</a></li>
			</ul>
		</div>
	</div>
	<?php } ?>
</div>
<!--Property List Section End------------->

	
<!--Footer Section Start------------->
<?php include"inc/footer.php"; ?>
<!--Footer Section End------------->