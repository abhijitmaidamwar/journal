<?php
//error_reporting(0);
include("lib/library.class.php");
$lib = new library;
$hostname = $lib->hostname();

if(!empty($_POST) && !empty($_FILES)){
	$table = 'samplemanuscript';
	
	$paperId = "IJIES".date('dmy').rand(10,500);
	
	$_FILES['manuscript']['name'] = str_replace(' ','-',$paperId.$_FILES['manuscript']['name']);
	
	if(!empty($_FILES['manuscript'])){		
		$src = $_FILES['manuscript']['tmp_name'];
		$dest = 'sample-manuscripts/'.$_FILES['manuscript']['name'];
		move_uploaded_file($src,$dest);
	}
			
	$data = array(
		'paperId' => $paperId,
		'title' => addslashes($_POST['title']),
		'nameofauthor' => addslashes($_POST['nameofauthor']),
		'email' => $_POST['email'],
		'contact' => $_POST['contact'],
		'coauthor' => addslashes($_POST['coauthor']),
		'area' => $_POST['area'],
		'pagekey' => '',
		'adminApproval' =>'0',
		'status' => '0',
		'manuscript' => $_FILES['manuscript']['name']
	);
	$insert = $lib->insert($table,$data);
	if($insert){
			
			$to  = $_POST['nameofauthor'].' <'.$_POST['email'].'>';
			
			$subject = 'Sample Manuscript Confirmation | IJIES ';
			
			$message = '<div style="font-family: "", sans-serif; color: #3d3e3c; font-size: 13px;">
				<div class="container" style="margin: 0 auto; max-width: 600px; padding: 5px; border-radius: 5px;">
				<div class="logo" style="font-family: "Oswald", sans-serif; float: left; width: 100%; text-align: center; font-size: 22px;">
				<img src="http://meeteternity.in/ijies/images/logo.png" />
				</div>
				<div class="logo" style="font-family: "Oswald", sans-serif; float: left; width: 100%; text-align: center; font-size: 22px;">
				International Journal of Innovations in Engineering and Science
				</div>
				<div class="clear" style="clear: both;"></div>
				<hr style="border-color: #3d3e3c;" />
				<div class="heading" style="border-radius: 5px; font-size: 14px; text-align: center;"><h3> Sample Manuscript Confirmation </h3></div>
				<div class="parent-div" style="width: 100%;">
				<h4>Dear  '.$_POST['nameofauthor'].',</h4>
				<p style="text-align: justify;">Thank you for your interest in <strong>IJIES</strong>. Your sample manuscript is submitted successfully, We will check the manuscript as per our clause if it satisfies the clause we will send you an acceptance letter/mail within 3 to 4 working days.</p>
				<p style="text-align: justify;">Glad to have you...!</p>
				</div>
				<div class="footer" style="padding: 10px; background: #3aa7c4; border-radius: 5px; font-size: 14px; text-align: center;">
				For more details please visit <a style="text-decoration: none; color:#3d3e3c;" href="http://www.ijies.net/" target="_blank">www.ijies.net</a>
				</div>
				</div>
				</div>';
			
			$headers   = array();
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';
			
			// Additional headers
			$headers[] = "From: International Journal of Innovations in Engineering and Science <donotreply@ijies.net>";
			$headers[] = "Reply-To: International Journal of Innovations in Engineering and Science <info@ijies.net>";
			$headers[] = "Subject: {".$subject."}";
			$headers[] = "X-Mailer: PHP/".phpversion();
			
			// Mail it
			$mail = mail($to, $subject, $message, implode("\r\n", $headers));
				if($mail){
					echo "1";
			}		
		
	}else{
		echo "0";
	}

}else{
	echo "0";
}

?>
