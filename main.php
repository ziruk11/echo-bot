<?php

define("TOKEN", "YOUR_BOT_TOKEN");

// A simple function to execute telegram api methods
function execurl($method, $params){ //$method : string  -  name of the method  |  $params : array  -  parameters of the request
    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, "https://api.telegram.org/bot" . TOKEN . "/$method");
    curl_setopt($ch1, CURLOPT_POST, true);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, http_build_query($params));
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

execurl("sendMessage", array(
    'chat_id' => $chatId,
    'text' => $text
));

?>
