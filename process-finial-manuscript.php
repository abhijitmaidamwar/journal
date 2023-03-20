<?php
session_start();
include("lib/library.class.php");
$lib = new library;
$hostname = $lib->hostname();

if(!empty($_POST) && !empty($_FILES)){
	// print_r($_POST);
	// print_r($_FILES);
	// exit;
		
	$table = 'finialmanuscript';
	
	$checkdata = $lib->select($table,array("pagekey" => $_POST['pagekey']));
	
	
		$namechanger = date("HisdmY");
		$_FILES['manuscript']['name'] = str_replace(' ','-',$namechanger.$_FILES['manuscript']['name']);
		$_FILES['copyrightform']['name'] = str_replace(' ','-',$namechanger.$_FILES['copyrightform']['name']);
		
		$paymentproof = "";
		if($_FILES['paymentproof']['name']){
			$_FILES['paymentproof']['name'] = str_replace(' ','-',$namechanger.$_FILES['paymentproof']['name']);
			$paymentproof = $_FILES['paymentproof']['name'];	
		}
		
		
		
		if(!empty($_FILES['manuscript'])){		
			$src = $_FILES['manuscript']['tmp_name'];
			$dest = 'finial-docs/finial-manuscripts/'.$_FILES['manuscript']['name'];
			move_uploaded_file($src,$dest);
		}
		
		if(!empty($_FILES['copyrightform'])){		
			$src = $_FILES['copyrightform']['tmp_name'];
			$dest = 'finial-docs/copyrightform/'.$_FILES['copyrightform']['name'];
			move_uploaded_file($src,$dest);
		}
		
		if(!empty($_FILES['paymentproof'])){		
			$src = $_FILES['paymentproof']['tmp_name'];
			$dest = 'finial-docs/paymentproof/'.$_FILES['paymentproof']['name'];
			move_uploaded_file($src,$dest);
		}
	
		$payment_details = $lib->getamount($_POST['author_type'],$_POST['nofauthors'],$_POST['nofpages'],$_POST['pay_mode']);
		
		if($payment_details){
			$data = array(
				'pagekey' => $_POST['pagekey'],
				'paperId' => $_POST['paperId'],
				'title' => addslashes($_POST['title']),
				'nameofauthor' => addslashes($_POST['nameofauthor']),
				'email' => $_POST['email'],
				'contact' => $_POST['contact'],
				'coauthor' => implode(',',$_POST['coauthor']),
				'coauthor_email' => implode(',',$_POST['coauthor_email']),
				'author_type' => $_POST['author_type'],
				'nofauthors' => $_POST['nofauthors'],
				'nofpages' => $_POST['nofpages'],
				'pay_mode' => $_POST['pay_mode'],
				'amount' => $payment_details['amount'],
				'currency' => $payment_details['currency'],
				'currency_symbol' => $payment_details['currency_symbol'],
				'per_paper' => $payment_details['per_paper'],
				'final_amt' => $payment_details['final_amt'],
				'area' => $_POST['area'],
				'manuscript' => $_FILES['manuscript']['name'],
				'copyrightform' => $_FILES['copyrightform']['name'],
				'paymentproof' => $paymentproof,
				'paymode'  => '',
				'txnid'  => '',
				'txnDetails'  => '',
				'paymentstatus'  => '',
				'is_done' => 1,
				'status' => 0,
				'volume' => 0,
				'number' => 0,
				"year" => "",
				"finalscript" => "",
				"pstatus" => 0,
				"is_delete" => 0,
				'doinumber' => '',
				'publishonline' => ''
			);

			if($checkdata){
				$insert = $lib->update($table,$checkdata[0]['id'],$data);
			} else {
				$insert = $lib->insert($table,$data);	
			}
			
		}

		if($_POST['pay_mode'] == 'payment_gateway') {
			$_SESSION['payment_gateway'] = array(
				'pagekey' => $_POST['pagekey'],
				'paperId' => $_POST['paperId']
			);
			echo 2;
		} else {
			if($insert){
				$to  = $_POST['nameofauthor']." <".$_POST['email'].">";				
				$subject = 'About Final Manuscript Submssion- Dt. '.date("d-m-Y").' Time '.date("h:i:s") . ' | IJIES | '.$_POST['paperId'];
				
				$mail = $lib->sendmail_finalmanuscript($to,$subject,$_POST['nameofauthor'],$_POST['pagekey'],$_POST['paperId']);
				
				if($mail){
					echo "1";
				} else {
					echo "0";
				}
					
			} else {
				echo "0";
			}	
		}
	}
?>
