<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_9d9ddeb9ee376a8f08a35526eb6",
                  "X-Auth-Token:test_666438b725563bc13a889bbc413"));
$payload = Array(
    'purpose' => 'buy',
    'amount' => '1200',
    'phone' => '9999999999',
    'buyer_name' => 'ruchi tare',
    'redirect_url' => 'http://localhost/hotel/order.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'ruchitare2001@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

 $response=json_decode($response);
 $_SESSION['TID']=$response->payment_request->id;
 header('location:'.$response->payment_request->longurl);
 dei();
?>