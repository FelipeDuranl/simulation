<?php

// $vbeats = $_POST["beats"];
// $vpres = $_POST["pressure"];
// $voxi = $_POST["oxi"];
// $vid = "a8e5a34c-bb94-49e9-8317-1c7d4863ea70";

header("Content-Type: application/json");

$url = "https://3i9lsnazj4.execute-api.us-east-1.amazonaws.com/create/watch";

$data_array = [
    'user_id' => 'a8e5a34c-bb94-49e9-8317-1c7d4863ea70',
    'beats' => 87,
    'pressure' => 95,
    'oxygenation' => 99
    // "user_id" => "a8e5a34c-bb94-49e9-8317-1c7d4863ea70",
	// "beats" => 68,
	// "pressure" => 187,
	// "oxygenation" => 78
];

$data = http_build_query($data_array);

$ch = curl_init(); 

curl_setopt($ch, CURLOPT_URL,  $url); 
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// var_dump($ch);


// print_r(json_last_error());


$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
} else {
    $decoded = json_decode($resp);
    print_r($resp);
    echo '<br>';
    print_r($decoded);

    // $_SESSION['dadossession'] = end($decoded);

    // print_r(end($_SESSION));
    // foreach ($decoded as $key => $val) {
    //     echo $key . ': ' . $val . '<br>';
    // }
}


curl_close($ch);
