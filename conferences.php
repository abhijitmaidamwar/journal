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
					<h4>Conferences</h4>
					<p class="text-center">
						Welcomes the proposal of conferences in various domains of engineering and Science.
					</p>
					
					<table class="table table-strped journal-list">
						<tbody>
                        <?php 
                        $conferences = $lib->select('conferences',array('status'=>0),'','ORDER BY conference_date DESC');
						$sr = 1;
                        if(!empty($conferences)){
							foreach($conferences as $key => $conference) {
                                $issueLink = 0;
                                if($conference['volume'] != "" &&  $conference['number'] != "" && $conference['year'] != ""){
                                    $issueLink = 1;
                                    $conLink = $lib->hostname().'archives/vol-'.$conference['volume'].'-no-'.$conference['number'];
                                } else {
                                    $conLink = $lib->hostname() .'conference_docs/'.$conference['conference_doc'];
                                }

                        ?>
                                <tr>
                                    <td><?php echo $sr++."."; ?></td>
                                    <td><a href="<?php echo $conLink; ?>" target="_blank"><h5 style="margin: 0; padding: 0;"> <?php echo $conference['title']; ?></h5></a>
                                        <?php if($issueLink): ?>
                                            <span style="font-size: 12px;">(The Papers has been Published to vol <?php echo $conference['volume']; ?> issue <?php echo $conference['number']; ?>.)
                                            <a class="btn btn-info btn-xs pull-right" href="<?php echo $conLink; ?>"> <strong>Explore Conference</strong></a></span>
                                            <?php
                                        else:
                                            ?>
                                            <a class="btn btn-info btn-xs pull-right" href="<?php echo $conLink; ?>" target="_blank" download> <strong>Download</strong></a>
                                            <?php
                                        endif; ?>
                                        <br />
                                        Conference Date: <?php echo date('d-m-Y',strtotime($conference['conference_date'])); ?>
                                        <br />
                                        Organaizer/Venue: <?php echo $conference['organizer']; ?>
                                        <br />
                                        Conference Location: <?php echo $conference['location']; ?></td>
                                </tr>
                        <?php } } else { ?>
                        <h4>No results found!</h4>
                        <?php } ?>
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