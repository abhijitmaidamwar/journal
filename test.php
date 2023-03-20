<?php 
session_start();

$segments = explode('/', $_SERVER['REQUEST_URI']);

//print_r($segments);
$bookid = $segments[2];
$_SESSION['bookid'] = $bookid;

?>

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
				<div class="col-xs-12 col-md-7 a-guidelines">
					<table cellpadding="5" cellspacing="5" border="0">
					<tr><td><b>Book deails</b></td></tr>
					
					<?php 
					//echo $bookid;
					 $select ="Select * from books where id ='".$bookid."'";
					 $result = mysql_query($select);
						$book_details = mysql_fetch_array($result);
						//print_r($book_details);
					?>
					<tr><td>Title: </td><td><?php echo $book_details['title']; ?></td></tr>
								<tr><td>ISBN: </td><td><?php echo $book_details['isbn_num']; ?></td></tr>
								<tr><td>Free: </td><td><?php if($book_details['free']=='Y'){echo "Yes";}else{ echo "No";} ?></td></tr>
								<?php 
								if($book_details['free']=='N'){
								?>
								<tr><td>Price: </td><td><?php echo "Rs.".$book_details['price'];  ?></td></tr>
								<?php }else{
								?>
								<tr><td>&nbsp;</td></tr>
								<?php 
								}
								
								
							if($book_details['image_path'] == ''){
							?>
							
								<tr><td><a href=""><img src="/assets/books/noimg.jpg" height="100" width="100" alt="Click Here to Download" title="Click Here to Download"/></a></td></tr>
							<?php 	
							}
							else{
							?>
							<tr><td>
							<a href=""><img src="/assets/books/<?php echo $book_details['image_path'];?>" height="100" width="100" alt="Click Here to Download" title="Click Here to Download"/></a>
							</td></tr>	
							<?php 
							}
							
							
							?>
							<tr><td>
							<form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LQFTMYOdBcm3tl" async> </script> </form>
							</td></tr>
							<?php 
							if($book_details['free']=='N'  && $book_details['price']==100 ){
							?>
								<tr><td><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LQDgugCM6ePWuO" async> </script> </form>
								</td></tr>
							<?php 
							}
							if($book_details['free']=='N'  && $book_details['price']==200 ){
							?>							
								<tr><td><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LQDo7RkafGFmeN" async> </script> </form></td></tr>
							<?php 
							}
							if($book_details['free']=='N'  && $book_details['price']==300 ){
							?>
							<tr><td><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LQDr92aCjeBb1C" async> </script> </form></td></tr>
							<?php 
							}
							if($book_details['free']=='N'  && $book_details['price']==400 ){
							?>
							<tr><td><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LQDu3RPrRuRLB6" async> </script> </form></td></tr>
							<?php }
							if($book_details['free']=='N'  && $book_details['price']==500 ){
							?>
							<tr><td><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LQDwO0eGN7Eo2f" async> </script> </form></td></tr>
							<?php
							}							
							
							print_r($_SESSION);
							
							?>							
								
					</table>
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