<?php 
$segments = explode('/', $_SERVER['REQUEST_URI']);
$bookid = $segments[2];

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
		 $select ="Select id, title from books where id ='".$bookid."'";
		 $result = mysql_query($select);
		 $book_details = mysql_fetch_array($result);
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
					<h4>Book Title - <?php echo $book_details['title'];?></h4>
					<!--<p class="text-center">
						Welcomes the proposal of books in various domains of engineering and Science.
					</p>-->
					
					<table class="table table-strped journal-list" >
						<tbody>
                        <?php 
                        //$books = $lib->select('chapters',"book_id=".$bookid,'','ORDER BY id');
						 $sel ="Select * from chapters where book_id ='".$bookid."'";
						 $res = mysql_query($sel);
						 while($books_array = mysql_fetch_array($res))
						 {
							$books[] = $books_array;
						 }
                       $sr = 1;
                        if(!empty($books)){
							foreach($books as $key => $conference) {
								   

                        ?>
						<tr>
							<td><?php echo $sr++."."; ?></td>
							<!--<td><a href="book_details/bid=<?php //echo $conference['id'];?>" target="_blank"><h5 style="margin: 0; padding: 0;"> <?php //echo $conference['chapter_title']; ?></h5></a>
						
								<br />
								
								Authors: <?php //echo $conference['author']; ?>-->
								<td><a href="/assets/books/pdf/<?php echo $conference['chapter_pdf']; ?>" target="_blank" ><h5 style="margin: 0; padding: 0; font-weight:bold;"><?php echo ucwords($conference['chapter_title']); ?></h5></a> (<?php echo $conference['chapter_author']; ?>)<br>  </td>
								
								
								
								
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