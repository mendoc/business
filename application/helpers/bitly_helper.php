<?php
defined('BASEPATH') or exit('No direct script access allowed');

function raccourcir_lien($lien)
{
    $fields = array("domain" => "bit.ly", "long_url" => $lien);
 
    $fields = json_encode($fields);

    $url = 'https://api-ssl.bitly.com/v4/shorten';

    $token = 'e4b8a39eb1ccb75e0be8feaf88449c63b4ad48cb';

    $headers = array(
        'Content-Type:application/json',
        'Authorization:Bearer ' . $token
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $resultat = curl_exec($ch);

	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);

    if ($status != 200) {
        return "";
   } else {
       $data = json_decode($resultat, TRUE);
       return $data['link'];
   }
}