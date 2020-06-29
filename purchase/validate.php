<?php
    $amount = $_POST["coins"];
    $id = $_POST["id"];
    $razorpay_order_id = $_POST["razorpay_order_id"];
    $razorpay_payment_id = $_POST["razorpay_payment_id"];
    $razorpay_signature = $_POST["razorpay_signature"];

    echo $amount."<br>";
    echo $id."<br>";
    $generated_signature = hmac_sha256($razorpay_order_id + "|" + $razorpay_payment_id, "OdSHVa8d1zlJfybIXOOAgbgQ");

    if ($generated_signature == $razorpay_signature) {
        echo "payment is successful";
    }
    else{
        echo "payment declined";
    }
?>