<?php
$email = "tet@gmail.com";

session_start();
$keyid = "";
$keySecret = "";
$username = "tes";
$uaseremail = "tesst@gmail.com";

$api = new Api($keyID, $keySecret);
$actual_amount = "100";
$curency = "INR";
$receipt = str_replace('.', '', microtime(true)) . rand(1, 10000) . $email;
$orderData = [
    'receipt'         => $receipt,
    'amount'          => $actual_amount * 100, // 39900 rupees in paise
    'currency'        => $curency
];

$razorpayOrder = $api->order->create($orderData);

$order_id = $razorpayOrder['id'];
$order_receipt = $razorpayOrder['receipt'];
$order_amount = $razorpayOrder['amount'];
$order_currency = $razorpayOrder['currency'];
$order_created_at = $razorpayOrder['created_at'];
$_SESSION['razerpay_order_id'] = $order_id
?>

<form action="satus.php" method="POST">
    <script src="testPay" data-key="<? $keyid ?>" data-amount="<? $order_amount ?>" data-currency="<? $curency ?>"
        data-order_id="<? $order_id ?>" data-buttontext="PAYEMNT" data-name="companyName"
        data-description="some desription" data-image="https://example.com/your_logo.jpg"
        data-prefill.name="<? $username ?>" data-prefill.email="<? $uaseremail ?>" data-theme.color="#F37254"></script>
    <input type="hidden" custom="Hidden Element" name="hidden">
</form>