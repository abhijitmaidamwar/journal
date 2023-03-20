<style>

</style>
<?php
 include("lib/library.class.php");
 $lib = new library;
 
 if(!$_GET) { 

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
					<h4>About IJIES</h4>
					<p>
						IJIES fosters the exchange and dissemination of research publications aimed at the latest developments in all areas of engineering and science. The thrust of this international journal is to publish original full-length articles on experimental and theoretical basic research with scholarly rigour. IJIES particularly welcomes those emerging methodologies and techniques in concise and quantitative expressions of the theoretical and practical engineering and science disciplines. IJIES brings together scientists, academicians, engineers and researchers in the field of engineering and science.
					</p>
					<h4>Why to select IJIES ?</h4>
					<p>
						<ul>
							<li>
								IJIES is approved by “National science library (NSL)”, National Institute of Science Communication and Information Resources (NISCAIR), Council of Scientific and Industrial Research, New Delhi, India , <strong>ISSN : 2456-3463.</strong>
							</li>
							<li>IJIES is registered with crossref indexing as <strong>DOI:10.46335 </strong></li>
							 <li>IJIES Impact factor 2019 value: 5.856</li>
							<li> IJIES does not charge any submission charges for paper.</li>
							<li>
								Strong editorial board having core expertise from all over the globe.
							</li>
							<li>
								Board members and reviewers are from reputed international universities as well as top rank institutes of India like IIT, NIT etc.
							</li>
							<li>
								IJIES is indexed in many of the top indexing bodies.
							</li>
							<li>
								Strong Academic Reviewer Board with experience of more than 20 years in their specialization.
							</li>
							<li>
								Authors query will be solved in same or next day as possible.
							</li>
							<li>
								Delay time in response will be mimimum.
							</li>
							<li>
								Fast review process with valuable comments, if any, in very short time span.
							</li>
						<!--	<li>
								Very nominal processing charges i.e. only Rs. 1200 for authors up to three and Rs.1500 for more than three Authors.
							</li>
							<li>
								For forgein authors fees will be only USD 50.
							</li> -->
							<li>
								Authors can submit papers any time though online submission process.
							</li>
							<li>
								IJIES is an open access journal so no subscription is required for downloading the papers.
							</li>
							<li>
								E-certificate will be issued to every author.
							</li>
							<li>
								IJIES will provide the platform of technical forum to the researchers in all areas of engineering and science.
							</li>
							<li>
								Fast publication of paper in short span of time.
							</li>
						</ul>
					</p>
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
<?php } else{
	$lib->get_content();
}?>