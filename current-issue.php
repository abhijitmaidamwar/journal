<!doctype html>
<html lang="en">
	<?php
	error_reporting(0);
	include 'header.php';
	$lib = new library;
	$hostname = $lib->hostname();
	$finalscripts = $lib->select("finialmanuscript",array("pstatus" => 1));
	$sr = 1;
	
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
				<div class="col-xs-12 col-md-9">
					<h4><?php echo "Vol. ".$finalscripts[0]['volume']." No.".$finalscripts[0]['number'].", ".$finalscripts[0]['year'];?></h4>
					<table class="table table-strped journal-list">
						<tbody>
                        <?php if(!empty($finalscripts )){
							foreach($finalscripts as $key => $val) { ?>
                        <tr>
								<td><?php echo $sr++."."; ?></td>
								<td><a href="finial-docs/finial-pdf/<?php echo  $val['finalscript']; ?>" target="_blank" download><h5 style="margin: 0; padding: 0; font-weight:bold;"><?php echo $val['title']; ?></h5></a> (<?php echo $val['nameofauthor']; ?>,<?php echo $val['coauthor']; ?>)<br>
 								<a href="finial-docs/finial-pdf/<?php echo  $val['finalscript']; ?>" target="_blank" download><h5 style="margin: 0; padding: 0;"><?php echo $val['doinumber']; ?></h5></a>

								 </td>
							</tr>
                        <?php } } else { ?>
                        <h4>No results found!</h4>
                        <?php } ?>
							<!--<tr>
								<td>1.</td>
								<td><a href="assets/journal/IJIES-201671.pdf" target="_blank"><h5 style="margin: 0; padding: 0;"> Computer Aided Analysis of Twisted Blade Micro Wind Turbine</h5></a> (Mr. Pavankumar S. Nikure , Dr. Chandrashekhar N. Sakhale) </td>
							</tr>
							<tr>
								<td>2.</td>
								<td><a href="assets/journal/IJIES-201672.pdf" target="_blank"><h5 style="margin: 0; padding: 0;"> Design and Development of Maize Reaper Machine </h5></a> (Prof.C.K.Tembhurkar, Mr. Avinash Kumar Singh, Mr. Prakash Kumar Singh)</td>
							</tr>
							<tr>
								<td>3</td>
								<td><a href="assets/journal/IJIES-201673.pdf" target="_blank"><h5 style="margin: 0; padding: 0;"> Evaluating Performance of Testing Laboratory using Six Sigma</h5></a> (Pranil.V.Sawalakhe, Sunil.V.Deshmukh, Ramesh.R.Lakhe)</td>
							</tr>
							<tr>
								<td>4</td>
								<td><a href="assets/journal/IJIES-201674.pdf" target="_blank"><h5 style="margin: 0; padding: 0;"> A Survey for Segmentation Techniques for Handwritten Devnagari Text Document </h5></a> (Mrs. Snehal S. Golait)</td>
							</tr>
							<tr>
								<td>5</td>
								<td><a href="assets/journal/IJIES-201675.pdf" target="_blank"><h5 style="margin: 0; padding: 0;"> Design and Fabrication of Windmill Using Magnetic Levitation</h5></a> (Nitin Sawarkar, Sumedh Dongre, PG.T.Dhanuskar,Deepak Hajare)</td>
							</tr>
							<tr>
								<td>6.</td>
								<td><a href="assets/journal/IJIES-201676.pdf" target="_blank"><h5 style="margin: 0; padding: 0;"> Fabrication and Simulation of Mecanum Wheel for Automation </h5></a> (Sushil Lanjewar, Pradeep Sargaonkar) </td>
							</tr>
							<tr>
								<td>7.</td>
								<td><a href="assets/journal/IJIES-201677.pdf" target="_blank"><h5 style="margin: 0; padding: 0;">Stress Analysis of Bolts Failure in Flange Joint of Coiler Drum in Steckel Furnace by Using Fem Methods</h5></a> (P. N. Awachat, V.K. Parate, S.S. Jane) </td>
							</tr>-->
						</tbody>
					</table>

				</div>
				<!-- Left Sidebar Start -->

				<!-- Left Sidebar End -->
			</div>
		</div>
		<!-- Footer Section Starts -->
		<?php
		include 'footer.php';
		?>
	</body>
</html>