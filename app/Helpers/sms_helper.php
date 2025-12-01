<?php

if (!function_exists('sms_send')) {
    function sms_send($number, $message)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = env("BULKSMSBD_API_KEY");
        $senderid = env("SENDER_ID");

        $data = [
            "api_key"  => $api_key,
            "senderid" => $senderid,
            "number"   => $number,
            "message"  => $message
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
