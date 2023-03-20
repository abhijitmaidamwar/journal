<!doctype html>
<html lang="en">
	<?php
	include 'header.php';
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
					<h4>Join as Reviewer</h4>
					<div style="width: 100%;">
						<form role="form" class="form-horizontal">
							<!-- Personal Information Starts -->
							<div class="form-group">

								<div class="col-sm-12">
									<input type="text" placeholder="Reviwer's Name"  class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="tel" placeholder="Contact Number"  class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="email" placeholder="Email Id"  class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" placeholder="Address"  class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" placeholder="Area"  class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12 text-center">
								<input type="submit" name="submit" class="form-group btn btn-info" value="Send Request"/>
								</div>
							</div>
							
						</form>
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