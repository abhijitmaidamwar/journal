<footer id="footer-area" style="margin-top: 5px;">
	<!-- Copyright Area Starts -->
	<div class="copyright">
		<!-- Container Starts -->
		<div class="container">
			<!-- Starts -->
			 <p class="pull-left">
				&copy; 2020 . IJIES
			</p>
			<!-- Ends -->
			<!-- Payment Gateway Links Starts -->
		<ul class="pull-right list-inline">
			<table align="center">
	<tbody>
		<tr align="center">
			<td style="padding-left: 10px; padding-right: 10px;"> <a href="https://www.facebook.com/IJIES-Journal-112899400618938/" target="_blank"> <img src="/images/facebook.png"> </a></td>
			<td style="padding-left: 10px; padding-right: 10px;"> <a href="https://twitter.com/IjiesJ" target="_blank"> <img src="/images/twitter.png"> </a> </td>
			<td style="padding-left: 10px; padding-right: 10px;"> <a href="https://www.linkedin.com/in/ijies-journal-5ab485153/" target="_blank"> <img src="/images/linkedin.png"> </a> </td>
		</tr>
	</tbody>
</table></ul>

			<ul class="pull-right list-inline">
				<li>
					<a href="terms-and-condition">Terms & Conditions</a>
				</li>
				<li>
					<a href="privacy-policy">Privacy Policy</a>
				</li>
				<li>
					<a href="contact-us">Contact Us</a>
				</li>
				
					<li>
					<a href="https://www.wownet.in/" target="_blank"  style="display: none;">website development company nagpur</a>
				</li>
				<li>
					<a href="http://www.wnt.in.net/" target="_blank"  style="display: none;">Website development company nagpur</a>
				</li>
			</ul>
			<!-- Payment Gateway Links Ends -->
		</div>
		<!-- Container Ends -->
	</div>
	<!-- Copyright Area Ends -->
</footer>
<!-- Footer Section Ends -->
<!-- JavaScript Files -->
<script src="<?php echo $hostname; ?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo $hostname; ?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo $hostname; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $hostname; ?>js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo $hostname; ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo $hostname; ?>js/custom.js"></script>

<script>
			function checkData(){
				
				$("#submit").val("SENDING...").addClass('disabled');
				
				var title = $('#title');
				var nameofauthor = $('#nameofauthor');
				var email = $('#email');
				var contact = $('#contact');
				var coauthor = $('#coauthor');
				var area = $('#area');
				var manuscript = $('#manuscript');
				
				var datastring = new FormData($("#sample-manuscript")[0]);
				
				$.ajax({
					type:'POST',
					url:'<?php echo $hostname; ?>submit-data.php',
					processData: false,
    				contentType: false,
					data: datastring,
					success:function(result){
					console.log("result==",result);
					if(result == 1){
							$("#submit").val("Submit").removeClass('disabled');
							$('#enq').addClass("alert").addClass("alert-success").html('Your sample manuscript is submited successfully. we will get back to you soon!').fadeIn();
							$("#sample-manuscript")[0].reset();
						}else{
							$("#submit").val("Submit").removeClass('disabled');
							$('#enq').addClass("alert").addClass("alert-danger").html('Somthing went wrong! Please try again.').fadeIn();
							$("#sample-manuscript")[0].reset();
						}
					}
				});
				return false;
			}
		</script>
        
        <script>
			// load data rem
			jQuery(document).ready(function ($) {
   		 $(window).load(function () {
       	 setTimeout(function(){
          	  $('#loaddata').fadeOut('slow', function () {
            });
        },6000);

			});  
		});
			// load data rem end
			function checkFinial(){
				
				$("#submit").val("SENDING...").addClass('disabled');
				
				var datastring = new FormData($("#finial-manuscript")[0]);
				
				$.ajax({
					type:'POST',
					url:'<?php echo $hostname; ?>process-finial-manuscript.php',
					processData: false,
    				contentType: false,
					data: datastring,
					success:function(result){
						//alert(result);
//						console.log(result);
//						return false;
						if(result == 1){
							//	alert(result);return false;
							$("#submit").val("Submit").removeClass('disabled');
							$("#hideForm").hide();
							$('#enq').addClass("alert").addClass("alert-success").html('Your final manuscript is submited successfully. we will get back to you soon!').fadeIn();
							$("#finial-manuscript")[0].reset();
						} else if(result == 2){
							window.location.href = '<?php echo $hostname; ?>redirect-to-gateway.php'
						} else {
							// alert(result);return false;
							$("#submit").val("Submit").removeClass('disabled');
							$("#hideForm").hide();
							$('#enq').addClass("alert").addClass("alert-danger").html('Somthing went wrong! Please try again.').fadeIn();
							$("#finial-manuscript")[0].reset();
						}
					}
				});
				
				return false;
			}
		</script>
