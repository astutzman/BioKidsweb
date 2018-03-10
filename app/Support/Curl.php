<?php

namespace App\Support;

class Curl

{

	public function post($url, $payload)
	{
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);

		curl_close();

		return $response;

	}
}

?>