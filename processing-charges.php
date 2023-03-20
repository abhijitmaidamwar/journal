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
					<h4>Article Processing Charges (APC)</h4>
					<h5> Indian Delegates</h5>
				

					<div class="panel panel-info">
						<div class="panel-heading">
							<h5>Rs.1500</h5>
						</div>
						<div class="panel-body">

							<ul>
								<li>
									Indian Authors
								</li>
							<!--	<li>
									Papers having more than 3 authors
								</li>
								<li>
									Number of pages more than 7 max upto 12
								</li>
								<li>Rs. 50 per page above 12 pages</li> -->
								<li>
									E-Certificate to all authors
								</li>
							</ul>
							<p><form><script src="https://checkout.razorpay.com/v1/payment-

button.js" data-payment_button_id="pl_JrxUOhVbWdRZmT" async> 

</script> </form></p>
						</div>
					</div>

					<h5>Outside India</h5>
					<div class="panel panel-info">
						<div class="panel-heading">
							<h5>60 US $</h5>
						</div>
						<div class="panel-body">
							<ul>
								<li>
									Authors are from outside India.
								</li>
							<!--	<li>
									Paper having maximum 5 Authors
								</li>
								<li>
									Maximum pages should 10.
								</li> -->
								<li>
									E-Certificate to all authors
								</li>
							</ul>
					<p>	<form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_Jry95tvZLmDe4T" async> </script> </form></p>
						</div>
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

</html>