<?php
session_start();
include("lib/library.class.php");
$lib = new Library;
$hostname = $lib -> hostname();

if(isset($_SESSION['payment_gateway'])){
	$pagekey = $_SESSION['payment_gateway']['pagekey'];
	$paperId = $_SESSION['payment_gateway']['paperId'];
	
 	$finalPaperdetails = $lib->select('finialmanuscript',array('pagekey'=>$pagekey,'paperId'=>$paperId),'AND');
	
	// echo '<pre>';
 	//print_r($finalPaperdetails);
	// echo '</pre>';
// 	echo "dasdsa==".$paperId;
// 	echo "<br>dasdsa==".$pagekey;
 	//exit;
	// Merchant key here as provided by Payu
	// Testing
//	 $MERCHANT_KEY = "gtKFFx";
	// Live
	$MERCHANT_KEY = "fkqrlsrF";
	
	// Merchant Salt as provided by Payu
	// Testing
//	 $SALT = "eCwWELxi";
	// Live
	$SALT = "BiD4GZkee0";
	
	// End point - change to https://secure.payu.in for LIVE mode
	// Testing
//	 $PAYU_BASE_URL = "https://test.payu.in";
	// Live
	$PAYU_BASE_URL = "https://secure.payu.in";
	
	// Service Provider
	// Testing
//	 $SERVICE_PROVIDER ="";
	// Live
	$SERVICE_PROVIDER = "payu_paisa";
	
	$action = '';
	
	$grandtotal = $finalPaperdetails[0]['final_amt'];
	
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	$checktxnid = $lib->select("finialmanuscript",array("txnid"=>$txnid));
	if(!empty($checktxnid)){
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);	
	}
	
	$author_name_array = explode(' ',$finalPaperdetails[0]['nameofauthor']);
	$user = array(
		'firstname' => $author_name_array[0], 
		'email' => $finalPaperdetails[0]['email'],
		'mobile' => $finalPaperdetails[0]['contact']
	);
	
	$_POST = array("key" => $MERCHANT_KEY, "txnid" => $txnid, "amount" => number_format($grandtotal, 2,'.',''), "firstname" => $user['firstname'], "email" => $user['email'], "phone" => $user['mobile'], "productinfo" => $finalPaperdetails[0]['paperId'], "surl" => $hostname.'action.php', "furl" => $hostname.'action.php', "service_provider" => $SERVICE_PROVIDER);
	
	$posted = array();
	if (!empty($_POST)) {
		//print_r($_POST);
		foreach ($_POST as $key => $value) {
			$posted[$key] = $value;
		}
	}
	
	$formError = 0;
	
	if (empty($posted['txnid'])) {
		// Generate random transaction id
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	} else {
		$txnid = $posted['txnid'];
	}
	$hash = '';
	// Hash Sequence
	$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
	
	$hashData = $_POST['key']."|".$_POST['txnid']."|".$_POST['amount']."|".$_POST['productinfo']."|".$_POST['firstname']."|".$_POST['email']."|".""."|".""."|".""."|".""."|".""."|".""."|".""."|".""."|".""."|".""."|".$SALT;
	$posted['hash'] = hash("sha512",$hashData);
	
	if (empty($posted['hash']) && sizeof($posted) > 0) {
		if (empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {
			$formError = 1;
		} else {
			//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			$hashVarsSeq = explode('|', $hashSequence);
			$hash_string = '';
			foreach ($hashVarsSeq as $hash_var) {
				$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
				$hash_string .= '|';
			}
	
			$hash_string .= $SALT;
	
			$hash = strtolower(hash('sha512', $hash_string));
			$action = $PAYU_BASE_URL . '/_payment';
		}
	} else if (!empty($posted['hash'])) {
		$hash = $posted['hash'];
		$action = $PAYU_BASE_URL . '/_payment';
	}
	?>
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					Please wait we are moving towards Payment Gateway...
	
					<form action="<?php echo $action; ?>" method="post" name="payuForm">
						<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
						<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
						<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
						
						<input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
						<input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
						<input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
						<input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
						<input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" />
						<input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" />
						<input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" />
						<input type="hidden" name="hash" value="<?php echo (empty($posted['hash'])) ? '' : $posted['hash'] ?>" />
						<input type="hidden" name="service_provider" value="<?php echo $SERVICE_PROVIDER; ?>" size="64" />
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<script>
		var hash =  '<?php echo $hash ?>';
		// function submitPayuForm() {
			// if(hash == '') {
				// return;
			// }
			var payuForm = document.forms.payuForm;
			payuForm.submit();
		// }
	
		// $(function(){
			// submitPayuForm();
		// });
	</script>
	<?php	
} else {
	header('Location: '.$hostname.'final-submission-new');
}
?>