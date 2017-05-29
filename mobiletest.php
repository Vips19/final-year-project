<?php
	/*require('php-uk/textlocal.class.php');
 
	$textlocal = new Textlocal('vibhashpratik19@gmail.com', '3391f9ae6f51d9d6cdc10f072242c56edb24c872c0dca866e9fb3970c7318e79');
 
	$numbers = array(918513981035);
	$sender = 'Jims Autos';
	$message = 'This is  message';
 
	$response = $textlocal->sendSms($numbers, $message, $sender);
	print_r($response);*/
	/*// Textlocal account details
	$username = 'vibhashpratik19@gmail.com';
	$hash = '3391f9ae6f51d9d6cdc10f072242c56edb24c872c0dca866e9fb3970c7318e79';
	
	// Message details
	$numbers = array(918513981035);
	$sender = urlencode('Jims Autos');
	$message = rawurlencode('This is your message');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
*/
	$mob=$_GET['mob'];
	$otp=$_GET['otp'];
	$eid=$_GET['eid'];
	$mob="91".$mob;
// Authorisation details.
	$username = "vibhashpratik19@gmail.com";
	$hash = "3391f9ae6f51d9d6cdc10f072242c56edb24c872c0dca866e9fb3970c7318e79";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "$mob"; // A single number or a comma-seperated list of numbers
	$message = "Your One Time Password (OTP) is $otp";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo $result;
	header("location:Set_admin_pass.php?flag=VERIFIED&otp=&eid=".$eid);
?>