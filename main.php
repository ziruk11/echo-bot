<?php

define("TOKEN", "YOUR_BOT_TOKEN");

function execurl($url){
    $ch1 = curl_init("https://api.telegram.org/bot".TOKEN."/".$url);
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type:text/xml'));
    curl_setopt($ch1, CURLOPT_HTTPGET, true);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch1);
    curl_close($ch1);
    return $result;
}

$content = file_get_contents("php://input");

$update = json_decode($content, true);
if(!$update){
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);

execurl("sendMessage?chat_id=$chatId&text=" . urlencode($text));

?>
