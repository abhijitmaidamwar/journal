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
				<div class="col-xs-12 col-md-7" >
					<h4>Editorial Board</h4>
					<br />
					<?php $queryE = mysql_query("SELECT * FROM boardmembers where category = 3 ORDER BY sequence ASC ");
					while ($editor = mysql_fetch_array($queryE)) { ?>
						<p>
						<h5 style="margin: 0px;"><b><?php echo $editor['memberName']; ?></b></h5>
						<?php echo $editor['profession']; ?>
						
						<b ><?php echo $editor['designation']; ?></b>

					</p>
					<?php 
					}
					 ?>
					
					
					<br />
					<h4>International Advisory / Editorial Board</h4>
					<table class="table table-strped">
						<?php
							$i=1;
							$queryA = mysql_query("SELECT * FROM boardmembers where category = 2 ORDER BY sequence ASC ");
							while ($advisory  = mysql_fetch_array($queryA)) { ?>
						<tr>
							<td><?php echo $i++; ?> </td>
							<td><h6 style="margin: 0;"><b> <?php echo $advisory['memberName']; ?></b></h6>
							<?php echo $advisory['profession']; ?>
							</td>
						</tr>
						<?php } ?>
						
						
					</table>
					
					<br />
					<h4>Editorial Board Members</h4>
					<table class="table table-strped">
						<?php
							$i=1;
							$queryM = mysql_query("SELECT * FROM boardmembers where category = 1 ORDER BY sequence ASC ");
							while ($eMembers  = mysql_fetch_array($queryM)) { ?>
						<tr>
							<td><?php echo $i++; ?> </td>
							<td><h6 style="margin: 0;"><b> <?php echo $eMembers['memberName']; ?></b></h6>
							<?php echo $eMembers['profession']; ?>
							</td>
						</tr>
						<?php } ?>
						
						
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