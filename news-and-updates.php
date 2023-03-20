<!doctype html>
<html lang="en">
	<?php
	include 'header.php';
	error_reporting(0);
	$lib = new library;
	$hostname = $lib->hostname();
	//print_r($hostname);
	$urlArray = explode("/",$_GET['url']);
	$subpage = explode(".",$urlArray[1]);
	
	$newsDetails = $lib->select('news',array('alias' => $subpage[0], 'status' => 0),'AND');
	
	//print_r($newsDetails);
	
	?>
	<body>
		<!-- Header Section Starts -->
		<?php
		include 'nav.php';
		?>
		<!-- Header Section Ends -->
		<div class="container-main">
			<div class="row">
				<!--Left Sidebar Start -->
				<?php
				include 'left-sidebar.php';
				?>
				<!--Left Sidebar End -->
				<div class="col-xs-12 col-md-7">
			
									<div>
                                    	<h4><?php echo $newsDetails[0]['title']; ?></h4>
                                        <p style="text-align:justify"><?php echo $newsDetails[0]['details']; ?></p>
                                    </div>
				</div>
				<!-- Left Sidebar Start -->
				<?php
				include 'right-sidebar.php';
				?>
				<!-- Left Sidebar End -->
			</div>
		</div>
		<!-- Footer Section Starts -->
		<?php
		include 'footer.php';
		?>
	</body>

	<!-- Mirrored from ecommerceforest.com/bootstrap/fashion-shoes/shoes-shoppe/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Dec 2015 17:02:56 GMT -->
</html>