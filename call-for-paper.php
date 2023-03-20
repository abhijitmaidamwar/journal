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
					<h4>Call for Paper</h4>
					<?php $query = mysql_query("select * from callforpaper where id = 1");
						while ($data = mysql_fetch_array($query)) {
					?>
					<table class="table table-striped" >
						<thead>
							<th colspan="2" class="text-center">Call for Paper - Vol. <?php echo $data['volume'] ?> No. <?php echo $data['number'] ?>, <?php echo $data['year'] ?>  </th>
						</thead> 
						<tbody>
							<tr>
								<td>Submission Last Date</td>
								<td><?php echo $data['lastDate'] ?></td>
							</tr>
							<?php }?>
							<tr>
								<td>Initial Online Submission</td>
								<td><a href="submit-manuscript-online">Click here to submit Sample Manuscript</a></td>
							</tr>
							<tr>
								<td>Submit via Email</td>
								<td>ijiesjournal@gmail.com</td>
							</tr>
							<tr>
								<td>Final Online Submission</td>
								<td>(Only Accepted Papers)</td>
							</tr>
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