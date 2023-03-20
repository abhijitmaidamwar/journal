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
		
		

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var options = {
    "key": "ISADKvreTrb2Ng", // Enter the Key ID generated from the Dashboard
    "amount": "1",
    "currency": "INR",
    "description": "Testing Payment",
    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
    "prefill":
    {
      "email": "rv@gmail.com",
      "contact": 9175562329,
    },
    config: {
      display: {
        blocks: {
          utib: { //name for Axis block
            name: "Pay using Axis Bank",
            instruments: [
              {
                method: "card",
                issuers: ["UTIB"]
              },
              {
                method: "netbanking",
                banks: ["UTIB"]
              },
            ]
          },
          other: { //  name for other block
            name: "Other Payment modes",
            instruments: [
              {
                method: "card",
                issuers: ["ICIC"]
              },
              {
                method: 'netbanking',
              }
            ]
          }
        },
        hide: [
          {
          method: "upi"
          }
        ],
        sequence: ["block.utib", "block.other"],
        preferences: {
          show_default_blocks: false // Should Checkout show its default blocks?
        }
      }
    },
    "handler": function (response) {
      alert('Ritisha'+response.razorpay_payment_id);
    },
    "modal": {
      "ondismiss": function () {
        if (confirm("Are you sure, you want to close the form?")) {
          txt = "You pressed OK!";
          console.log("Checkout form closed by the user");
        } else {
          txt = "You pressed Cancel!";
          console.log("Complete the Payment")
        }
      }
    }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    rzp1.open();
    e.preventDefault();
  }
</script>




		
		
		
		
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
					<p class="text-center">
						Welcomes the proposal of books in various domains of engineering and Science.
					</p>
					
					<table class="table table-strped journal-list" >
						<tbody>
                        <?php 
                        $books = $lib->select('books','','','ORDER BY id');
						$sr = 1;
                        if(!empty($books)){
							foreach($books as $key => $conference) {
								
								
                                // $issueLink = 0;
                                // if($conference['volume'] != "" &&  $conference['number'] != "" && $conference['year'] != ""){
                                    // $issueLink = 1;
                                    // $conLink = $lib->hostname().'archives/vol-'.$conference['volume'].'-no-'.$conference['number'];
                                // } else {
                                    // $conLink = $lib->hostname() .'conference_docs/'.$conference['conference_doc'];
                                // }
								
								if($conference['chapterwise'] == 'yes' ){
								
									$titlelink = "chapters/".$conference['id'];
								}else{
									$titlelink = "download_book.php?b=".$conference['pdf_path'];
									
								}
                        ?>
						
						<tr>
							<td><?php echo $sr++."."; ?></td>
							<td><a href="<?php echo $titlelink;?>"><h5 style="margin: 0; padding: 0;"> <?php echo $conference['title']; ?></h5></a>
							<?php 
							/*if($conference['image_path'] == ''){
							?>
							
								<span style="font-size: 12px;"><a href=""><img src="assets/books/noimg.jpg" height="50" width="50" alt="Click Here to Download" title="Click Here to Download"/></a></span>
							<?php }
							else{
							?>
							<a href=""><img src="assets/books/<?php echo $conference['image_path'];?>" height="50" width="50" alt="Click Here to Download" title="Click Here to Download"/></a>
							</td></tr>
							<?php 
							}*/
							?>							
							
							
							
								<?php //if($issueLink): 
								if($conference['chapterwise'] == 'yes' ):
								?>
									<span style="font-size: 12px;">
									<a class="btn btn-info btn-xs pull-right" href="chapters/<?php echo $conference['id'];?>"> <strong>Explore</strong></a></span>
									<?php
								else:
								
									/*if($conference['image_path'] == ''){
									?>
									<a class="btn btn-info btn-xs pull-right" href="book_details/bid=<?php echo $conference['id'];?>" target="_blank" ><img src="assets/books/noimg.jpg" height="50" width="50" alt="" title=""/></a>
									<?php 
									}else{
									?>
									<a class="btn btn-info btn-xs pull-right" href="book_details/bid=<?php echo $conference['id'];?>" target="_blank" ><img src="assets/books/<?php echo $conference['image_path'];?>" height="50" width="50" alt="" title=""/></a>
									<?php 
									}*/
									?>
									<a class="btn btn-info btn-xs pull-right" href="download_book.php?b=<?php echo $conference['pdf_path'];?>"  target="_blank" download> <strong>Download</strong></a>
									<?php
								endif; ?>
								<br />
								ISBN: <?php echo $conference['isbn_num']; ?>
								<br />
								Authors: <?php echo $conference['author']; ?>
								<br />
								Book Type: <?php echo $conference['book_type']; ?></td>
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