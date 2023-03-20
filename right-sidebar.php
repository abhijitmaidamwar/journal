<?php
error_reporting(0);
$lib = new library;
$hostname = $lib->hostname();

$news = $lib->select("news",array("status" => 0));
?>
<div class="col-xs-12 col-md-2 right-sidebar">
	<h5>Current News & Updates</h5>

	<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
		<div id="vmarquee" style="position: absolute; width: 100%;">
				<?php foreach($news as $key => $val) { ?>
                	<p><a href="<?php echo $hostname; ?>news-and-updates/<?php echo $val['alias']; ?>"><?php echo $val['title']; ?></a><br /></p>
                <?php } ?><!--
				<p><a href="vol-1-no-1">Browse Vol.1 No.1, 2016</a><br /></p>
				<p><a href="#">Call for Paper Vol.1 No.2, 2016</a><br /></p>
				<p><a href="conferences">Welcomes the proposal of conferences in various domains of engineering and Science. </a></p>-->
			
		</div>
	</div>

	<a href="<?php echo $hostname; ?>book-guidelines" class="btn btn-sm btn-info " style="width:100%; margin-bottom: 5px; display: none;">Books</a>
<!--	<a href="<?php echo $hostname; ?>conferences" class="btn btn-sm btn-info" style="width:100%; margin-bottom: 5px;">Conferences</a>
	<a href="<?php echo $hostname; ?>reviewer" class="btn btn-sm btn-info" style="width:100%; margin-bottom: 5px;">Reviewer Login</a> -->

<a href="https://www.doi.org/" target="_blank">	<img src="assets/doilogo.jpg" width="100%" style="padding-top: 10px; padding-bottom: 10px;"></a>
<a href="https://jgateplus.com/search/footer-html/PublisherPartners.jsp" target="_blank">	<img src="assets/jgate.jpg" width="100%" style="padding-top: 10px; padding-bottom: 10px;"></a>
<a href="https://scholar.google.co.in/scholar?q=ijies.net&btnG=&hl=en&as_sdt=0%2C5" target="_blank">	<img src="assets/GoogleScholar.jpg" width="100%" style="padding-top: 10px; padding-bottom: 10px;"></a>
	
</div>

	
</div>
 