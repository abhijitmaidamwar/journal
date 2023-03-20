<?php
error_reporting(0);
$lib = new library;
$hostname = $lib->hostname();

if(isset($_POST['submit'])){
	$dataname = "reviewers";	
	
	$data = array(
		"email" => $_POST['email'],
		"epassword" => md5($_POST['password']),
		"status" => "0"
	);
	
	$condimanage = "AND";
	$select = $lib -> select($dataname,$data,$condimanage);
	
	if(!empty($select)){
		session_start();
		
		$_SESSION['memberDetails'] = array(
			"id" => $select[0]['id'],
			"name" => $select[0]['name'],
			"email" => $select[0]['email']
			
		);
			if(!empty($_SESSION['memberDetails'])){
				header('location:reviewer/dashboard/');
			}
	
	}
	else{
		$msg = 'Invaild Credentials';
	}
}

$news = $lib->select("news",array("status" => 0));
?>
<div class="col-xs-12 col-md-2 right-sidebar">
	<h5>Current News & Updates</h5>

	<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
		<div id="vmarquee" style="position: absolute; width: 100%;">
				<?php foreach($news as $key => $val) { ?>
                	<p><a href="<?php echo $hostname; ?>news-and-updates?alias=<?php echo $val['alias']; ?>"><?php echo $val['title']; ?></a><br /></p>
                <?php } ?><!--
				<p><a href="vol-1-no-1">Browse Vol.1 No.1, 2016</a><br /></p>
				<p><a href="#">Call for Paper Vol.1 No.2, 2016</a><br /></p>
				<p><a href="conferences">Welcomes the proposal of conferences in various domains of engineering and Science. </a></p>-->
			
		</div>
	</div>

	<a href="book-guidelines" class="btn btn-sm btn-info" style="width:100%; margin-bottom: 5px;">Books</a>
	<a href="conferences" class="btn btn-sm btn-info" style="width:100%; margin-bottom: 5px;">Conferences</a>
	<h5> Reviewer Login</h5>
	<div style="width: 100%;">
		<form role="form" class="form-horizontal" enctype="multipart/form-data" method="post">
			<!-- Personal Information Starts -->
			<div class="form-group">

				<div class="col-sm-12">
					<input type="text" name="email" id="email" placeholder="Username"  class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<input type="password" name="password" id="password" placeholder="Password"  class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<input type="submit" name="submit" id="submit" value="Login"  class="form-control btn btn-info">
				</div>
			</div>
		</form>
	</div>
</div>