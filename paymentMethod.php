<?php
	require_once 'config.php';
	require_once 'connect.php';

	$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWD);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$donateToId = $_POST['donate_to_id'];
	$cardNumber = mysqli_real_escape_string($db, $_POST['card_number']);
	$holderName = mysqli_real_escape_string($db, $_POST['holder_name']);
	$expDate = mysqli_real_escape_string($db, $_POST['expiry_date']);
	$amount = $_POST['amount_paid'];

	$update = "UPDATE donate_to SET remaining_amount = remaining_amount + '$amount' WHERE donate_to_id = '$donateToId'";

	$done = $db->query($update);

	if($done){
		header("");
		alert("Donation has been successfully done.");
	}else{
		alert("Error while adding donation.");
	}