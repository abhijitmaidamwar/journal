<!doctype html>
<html lang="en">
	<?php
		include 'header.php';
		error_reporting(0);
		$lib = new library;
		$hostname = $lib->hostname();
		$urlArray = explode("/",$_GET['url']);
		$key = explode(".",$urlArray[1]);
		//print_r($key[0]);
		//356a192b7913b04c54574d18c28d46e6395428ab

		$area = $lib->select("area",array("status" => 0));
		$checkforscript = $lib->select("finialmanuscript",array("pagekey" => $key[0]));
		
		$fetchscript = $lib->select("samplemanuscript",array("pagekey" => $key[0], "status" => 0),"AND");
		// echo "<pre>";
		// print_r($checkforscript[0]);
		// echo "</pre>";
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
                <h4>Submit Final Manuscript</h4>
                 <div id="hideForm">
                <?php if(!empty($checkforscript)) {?>
					    <h4>Hello Author! You have uploaded your final manuscript successfully!</h4>			   	
			 			<?php
			 			if($checkforscript[0]['paymentstatus'] == 'success' && $checkforscript[0]['pay_mode'] == "payment_gateway"){
			 				echo "Your online payment has been recieved successfully to us. Thank You!! We will get back to you soon.<br />";
							
							$coAuthors = explode(",",$checkforscript[0]['coauthor']);
							$coauthor_email = explode(",",$checkforscript[0]['coauthor_email']);
							
							echo "<hr />";							
							echo "Paper Id: ".$checkforscript[0]['paperId']."<br />";
							echo "Title: ".$checkforscript[0]['title']."<br />";
							echo "Area: ".$checkforscript[0]['area']."<br />";
							echo "Name of Author: ".$checkforscript[0]['nameofauthor']."<br />";
							echo "Email: ".$checkforscript[0]['email']."<br />";
							echo "Contact: ".$checkforscript[0]['contact']."<br />";
							
							echo "Co-Authors: <br />";
							foreach ($coAuthors as $key => $coAuthor) {
								echo $coAuthor." (".$coauthor_email[$key]."),<br />";
							}
							echo "<b>Paid Amt.: ".$checkforscript[0]['currency_symbol'].$checkforscript[0]['final_amt']."/-</b><br />";
							echo "Pay Mode: ".$checkforscript[0]['paymode']."<br />";
							echo "Txn Id.: ".strtoupper($checkforscript[0]['txnid'])."<br />";
							echo "Payment Status.: ".ucwords($checkforscript[0]['paymentstatus'])."<br />";
			 			}

						if($checkforscript[0]['pay_mode'] == "cash_or_onlinetransfer"){
							echo "Your payment proof has been recieved successfully to us. Thank You!! We will get back to you soon.<br />";
							
							$coAuthors = explode(",",$checkforscript[0]['coauthor']);
							$coauthor_email = explode(",",$checkforscript[0]['coauthor_email']);
							
							echo "<hr />";							
							echo "Paper Id: ".$checkforscript[0]['paperId']."<br />";
							echo "Title: ".$checkforscript[0]['title']."<br />";
							echo "Area: ".$checkforscript[0]['area']."<br />";
							echo "Name of Author: ".$checkforscript[0]['nameofauthor']."<br />";
							echo "Email: ".$checkforscript[0]['email']."<br />";
							echo "Contact: ".$checkforscript[0]['contact']."<br />";
							
							echo "Co-Authors: <br />";
							foreach ($coAuthors as $key => $coAuthor) {
								echo $coAuthor." (".$coauthor_email[$key]."),<br />";
							}
							echo "<b>Amount: ".$checkforscript[0]['currency_symbol'].$checkforscript[0]['final_amt']."/-</b><br />";
							echo "Pay Mode: ".ucwords(str_replace("_", " ", $checkforscript[0]['pay_mode']))."<br />";
						}
			 			?>
			 			
			 			
                <?php
				} else {
					if(!empty($fetchscript[0]['pagekey'])) { ?>
                     <form enctype="multipart/form-data" method="post"  id="finial-manuscript" onSubmit="return checkFinial();" class="form-horizontal">
                     <input type="hidden" name="pagekey" id="pagekey" value="<?php echo $fetchscript[0]['pagekey']; ?>" />
                     <input type="hidden" name="paperId" id="paperId" value="<?php echo $fetchscript[0]['paperId']; ?>" />
                        <!-- Personal Information Starts -->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Title" value="<?php echo $fetchscript[0]['title']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-12">
                        		<label>Author Type</label>
                        		<select name="author_type" id="author_type" class="form-control">
                        			<option value="foreign">Foreign</option>
                        			<option value="indian">Indian</option>
                        		</select>
                    		</div>
                		</div>
                		<div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="nameofauthor" id="nameofauthor" class="form-control" required="required" placeholder="Name Of Author" value="<?php echo $fetchscript[0]['nameofauthor']; ?>" />
                            </div>
                            <div class="col-sm-6">
                                <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email" value="<?php echo $fetchscript[0]['email']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="tel" name="contact" id="contact" class="form-control" required="required" placeholder="Contact No." value="<?php echo $fetchscript[0]['contact']; ?>" />
                            </div>
                        
                            <div class="col-sm-6">
                                <select name="area" id="area" class="form-control" required="required">
                                <option value="">Select Area</option>
									<?php 
									foreach($area as $key => $val) { 
										if($fetchscript[0]['area'] == $val['sector']): ?>
											<option selected="selected" value="<?php echo $val['sector']; ?>"><?php echo $val['sector']; ?></option>
									<?php
										else: ?>
											<option value="<?php echo $val['sector']; ?>"><?php echo $val['sector']; ?></option>
									<?php
										endif;	
									?>
                                            
                                	<?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-12">
                            	<h4>Co-Authors</h4>
                        	</div>
                        	<div id="morefields">
                        	<?php
                        	$coauthors = explode(",",$fetchscript[0]['coauthor']);
                        	$coauthors_email = explode(",",$fetchscript[0]['coauthor_email']);
                        	foreach ($coauthors as $key => $coauthor):
								$coauthor = trim($coauthor);
                        	?>
	                        	<div class="col-sm-12 added-field">
	                        		<div class="row">
			                        	<div class="col-sm-5">
			                        		 <label>Co-Authors Name</label>
			                                 <input type="text" name="coauthor[]" id="coauthor" class="form-control" required="required" placeholder="Name Of Co-author" value="<?php echo $coauthor; ?>" />
			                            </div>
			                            <div class="col-sm-5">
			                        		 <label>Co-Authors Email</label>
			                                 <input type="email" name="coauthor_email[]" id="coauthor_email" class="form-control" required="required" placeholder="Email Of Co-author" value="<?php echo $coauthors_email[$key]; ?>" />
			                            </div>
			                            <div class="col-sm-2" style="text-align: center;">
			                            	<label>&nbsp;</label><br />
			                            	<a href="javascript:void(0);" class="btn btn-danger form-control remove-field"><i class="fa fa-times"></i></a>
		                            	</div>
		                            </div>
	                            </div>
                            <?php
                            endforeach;
                            ?>
                            </div>
                            <div class="col-sm-12">
                            	<a class="btn btn-info btn-xs pull-right" id="addmore" style="margin-top: 10px;" href="javascript:void(0);">Add More <i class="fa fa-plus"></i></a>
                        	</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                               <input type="file" name="manuscript" id="manuscript" class="form-control" required="required" style="padding:0px"  />
                                <small>*upload manuscript document here in word format</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                               <input type="file" name="copyrightform" id="copyrightform" class="form-control" required="required" style="padding:0px"  />
                                <small>*upload copy right form here</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                            	<label>Number of Authors</label>
                                <input type="number" readonly="readonly" min="1" name="nofauthors" id="nofauthors" class="form-control" required="required" placeholder="No. of Authors" value="<?php echo floor(count($coauthors) + 1); ?>" />
                            </div>
                            <div class="col-sm-4">
                            	<label>Number of Pages</label>
                                <input type="number" min="1" name="nofpages" id="nofpages" class="form-control" required="required" placeholder="No. of Pages" />
                            </div>
                            <div class="col-sm-4">
                            	<label>Total Amount</label>
                            	<h3 id="totalamt" style="margin: 0px;"></h>
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-12">
                            	<h4>Payment Mode</h4>
                        	</div>
                        	<div class="col-sm-6">
                        		<input type="radio" checked="checked" name="pay_mode" class="pay_mode" value="cash_or_onlinetransfer" /> Cash / Online Transfer <small>(Please upload your payment proof)</small> <br />
                               	<input type="file" name="paymentproof" id="paymentproof" class="form-control" required="required" style="padding:0px"  />
                                <small>*upload payment proof here</small>
                            </div>
                            <div class="col-sm-6">
                        		<input type="radio" name="pay_mode" class="pay_mode" value="payment_gateway" /> Credit/Debit/Net Banking
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <div class="col-sm-12 col-md-12">
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right" />
                            </div>
                          </div>
                    </form>
					<script>
						$(function(){
							getAmount();
							
							$("#author_type,#nofpages").on('change',function(){
								getAmount();
							});
						});
						
						$("#addmore").on('click',function(){
							$("#morefields").append('<div class="col-sm-12 added-field"><div class="row"><div class="col-sm-5"><label>Co-Authors Name</label><input type="text" name="coauthor[]" id="coauthor" class="form-control" required="required" placeholder="Name Of Co-author" /></div><div class="col-sm-5"><label>Co-Authors Email</label><input type="email" name="coauthor_email[]" id="coauthor_email" class="form-control" required="required" placeholder="Email Of Co-author" /></div><div class="col-sm-2" style="text-align: center;"><label>&nbsp;</label><br /><a href="javascript:void(0);" class="btn btn-danger form-control remove-field"><i class="fa fa-times"></i></a></div></div></div>');
							var nofauthors = $("#nofauthors").val();
							nofauthors = parseInt(nofauthors) + 1;
							$("#nofauthors").val(nofauthors);
							getAmount();
						});
						
						$("#morefields").on('click','.remove-field',function(e){
							var r = confirm('Are you sure? You want to remove this size / field?');
							var deleted;
							if(r){
								if(this.id == ""){
									$(this).closest('div.added-field').remove();
									var nofauthors = $("#nofauthors").val();
									nofauthors = nofauthors - 1;
									$("#nofauthors").val(nofauthors);
								}
							}
							getAmount();
						});
						
						$(".pay_mode").on('change',function(){
							if($(this).val() == 'cash_or_onlinetransfer'){
								$("#paymentproof").removeAttr('disabled');
							} else {
								$("#paymentproof").attr('disabled','disabled');
							}
						});
						
						function getAmount(){
							var author_type = $("#author_type").val();
							var nofauthors = $("#nofauthors").val();
							var coauthor = $("input[name='coauthor[]']").map(function(){return $(this).val();}).get();
							var nofpages = $("#nofpages").val();
							
							var datastring = 'nofauthors='+nofauthors+'&coauthor='+coauthor+'&nofpages='+nofpages+'&author_type='+author_type+'&servicetype=getamount'; 
							$.ajax({
								type: 'post',
								url: '<?php echo $hostname; ?>action.php',
								data: datastring,
								dataType: 'json',
								success: function(res){
									// alert(res);
									$("#totalamt").html(res.currency_symbol+""+res.final_amt);
								}
							});
						}
					</script>                    
                   <?php } else{
				   		?>
                        <h4>Hello Author! After the approval of your sample manuscript, we will send you a link for the submssion of finial manuscript on your submited Email-Id ! </h4>
                        <?php
				   }
				   }?> 
                  </div>
                  <div class="form-group">   
                            <div class="col-sm-12 col-md-12">
                            	<div id="enq" style="padding:5px; margin:0px"></div>
                            </div>
                        </div>
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