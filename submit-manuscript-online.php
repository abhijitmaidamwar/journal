<!doctype html>
<html lang="en">
	<?php
		include 'header.php';
		
		$lib = new library;
		$hostname = $lib->hostname();
		$area = $lib->select("area",array("status" => 0));


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
                <h4>Submit Sample manuscript</h4>
                     <form enctype="multipart/form-data" method="post"  id="sample-manuscript" onSubmit="return checkData();" class="form-horizontal">
                        <!-- Personal Information Starts -->
                        <div class="form-group">
            
                            <div class="col-sm-12">
                                <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Title" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="nameofauthor" id="nameofauthor" class="form-control" required="required" placeholder="Name Of Author" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email" />
                            </div>
                            <div class="col-sm-6">
                                <input type="tel" name="contact" id="contact" class="form-control" required="required" placeholder="Contact No." />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                 <input type="text" name="coauthor" id="coauthor" class="form-control" placeholder="Name Of Co-author" />
                            </div>
                            
                            <div class="col-sm-6">
                                <select name="area" id="area" class="form-control" required="required">
                                <option value="">Select Area</option>
									<?php foreach($area as $key => $val) { ?>
                                            <option value="<?php echo $val['sector']; ?>"><?php echo $val['sector']; ?></option>
                                	<?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                               <input type="file" name="manuscript" id="manuscript" class="form-control" required="required" style="padding:0px"  />
                                <small>*upload document in word format</small>
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <div class="col-sm-12 col-md-12">
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right" />
                            </div>
                          </div>
                         <div class="form-group">   
                            <div class="col-sm-12 col-md-12">
                            	<div id="enq" style="padding:5px; margin:0px"></div>
                            </div>
                        </div>
                    </form>
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