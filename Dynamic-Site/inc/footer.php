<!--Footer Section Start------------->		
	<footer class="footersection overflow">
		<div class="footer-top overflow">
			<div class="footer_top_upper overflow">
			<!--Footer content 1------------->
				<div class="footer_content">
					<h2>about us</h2>
					<div class="footer_text overflow">
						<div class="text_icon">
							<i class="fa-solid fa-location-dot"></i>
						</div>
						<div class="text_body">
							<h3>address</h3>
							<p>Dhanmondi, Dhaka</p>
						</div>
					</div>
					
					<div class="footer_text overflow">
						<div class="text_icon">
							<i class="fa-solid fa-envelopes-bulk"></i>
						</div>
						<div class="text_body">
							<h3>for any question</h3>
							<p>houserental@gmail.com</p>
						</div>
					</div>
					
					<div class="footer_text overflow">
						<div class="text_icon">
							<i class="fa-solid fa-mobile-screen"></i>
						</div>
						<div class="text_body">
							<h3>help & support</h3>
							<p>01232-231324</p>
						</div>
					</div>
				</div>
			
			<!--Footer content 2------------->	
				<div class="footer_content">
					<h2>recent property</h2>
				<?php
					$getrp = $pro->recentProperty();
					if($getrp){
						while($recentad = $getrp->fetch_assoc()){ 
				?>
					<div class="footer_text">
						<a href="property_details.php?adid=<?php echo $recentad['adId']; ?>">
							<div class="footer_property overflow">
								<div class="text_icon text_img">
									<img src="<?php echo $recentad['adImg'];?>" alt="recent ad"/>
								</div>
								<div class="text_body">
									<p><?php echo $recentad['adTitle'];?></p>
									<p><?php echo $fm->formatDate($recentad['adDate']);?></p>
								</div>
							</div>
						</a>
					</div>
				<?php } } ?>
				</div>
			<!--Footer content 3------------->
				<div class="footer_content">
					<h2>quick links</h2>
					<div class="footer_text">
						<nav class="footer_nav">
							<ul>
								<li><a href="property_list.php">list of property &raquo;</a></li>
								<li><a href="Admin/add_property.php">post property &raquo;</a></li>
								<li><a href="help_support.php">help & support &raquo;</a></li>
								<li><a href="signup.php">signup &raquo;</a></li>
							</ul>
						</nav>
					</div>
				</div>	
			</div>
		
		<!--Footer social links------------->	
			<div class="footer_top_lower">
				<nav class="footer_social">
					<ul>
						<li><a href=""><p class="fb"><i class="fa-brands fa-facebook-f"></i></p></a></li>
						<li><a href=""><p class="tw"><i class="fa-brands fa-twitter"></i></p></a></li>
						<li><a href=""><p class="gp"><i class="fa-brands fa-google-plus-g"></i></p></a></li>
					</ul>
				</nav>
			</div>
		</div>
		
		<div class="footer-bottom">
			<p>&copy; 2022. All Rights Reserved</p>
		</div>
	</footer>
<!--Footer Section End------------->

<!--Script for responsive navbar Start------------>
<script>
	var navList = document.getElementById("navList");
	function togglebtn(){
		navList.classList.toggle("hidemenu");
	}
	
	var dashboardNav = document.getElementById("dashboardNav");
	function togglebtn_dashboard(){
		dashboardNav.classList.toggle("hide_dashboard_menu");
	}
</script>
<!--Script for responsive navbar End------------>

<!--JavaScript File for Slick Slider Start------------>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>

<!-- Slick Slider Javascript cdn ---->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--JavaScript File for Slick Slider End------------>

<!--Script for Slick Slider Start------------>
<script type="text/javascript">
	$('.slider').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
	{
      breakpoint: 773,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
</script>
<!--Script for Slick Slider End------------>
</body>
</html>