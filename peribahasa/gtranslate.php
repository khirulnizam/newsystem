<?php
//the function receive input text in Malay
function gtranslate($text){
   $apiKey = 'AIzaSyAvCqEmOpj9S3JzNDCndjFD6Zvp3eBPPtM';
	//source is Malay(ms) and target is ENglish (en)

    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=ms&target=en';

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);
    $responseDecoded = json_decode($response, true);
    $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);      //Here we fetch the HTTP response code
    curl_close($handle);

    if($responseCode != 200) {
        $output= 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
        $output=$output. 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
    }

    else {
        //echo 'Source: ' . $text . '<br>';
        $output= $responseDecoded['data']['translations'][0]['translatedText'];
    }
    return $output;//this function will return the output translation which is in English

}

?>