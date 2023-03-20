<?php 
session_start();
$bookid = $_GET['bid'];
echo $bookid;

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
				<div class="col-xs-12 col-md-7">
					<h4>Books</h4>
					<!--<p class="text-center">
						Welcomes the proposal of conferences in various domains of engineering and Science.
					</p>-->
					
					<table class="table table-strped journal-list" border="1">
						<tbody>
						
						<tr><td>
						test
							
						</td></tr>
						
						<?php 
					 $select ="Select * from books where id ='".$bookid."'";
					 $result = mysql_query($select);
						$book_details = mysql_fetch_array($result);
						print_r($book_details);
					?>
                       
						</tbody>
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