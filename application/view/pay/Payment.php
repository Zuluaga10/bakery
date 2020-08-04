
<?php

$url = 'https://api.mercadopago.com/v1/payments?access_token=TEST-8497676622443940-080121-fa83332099f0f3cf78041aead13b99d4-416979880';

    

    $token = $_POST['token'];

	$installments = $_POST['installments'];

    $transaction_amount = $_POST['transaction_amount'];
    $description = $_POST['description'];
    $payment_method_id = $_POST['payment_method_id'];
    $email = $_POST['email'];
    $payer=["email" => $email];
    

	$fields_string = 'token='.$token.'&installments='.$installments.'&transaction_amount='.$transaction_amount.'&description='.$description.'&payment_method_id='.$payment_method_id.'&payer='.$payer;

	//open connection

	$ch = curl_init();

	//set the url, number of POST vars, POST data

	curl_setopt($ch,CURLOPT_URL, $url);

	curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	//execute post

	$result = curl_exec($ch);

	print_r($result);

	//close connection

    curl_close($ch);