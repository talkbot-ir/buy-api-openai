<?php

// GET KEY FROM :  https://talkbot.ir


	$message = [["role" => "system", "content" => "This is a test promot."]
	,["role" => "user", "content" => "Just Say Hello."],
	["role" => "assistant", "content" => "Hello"],
	["role" => "user", "content" => "Thank you."]];
    $REQ = curl_init();

    curl_setopt_array(
        $REQ,
        array(
            CURLOPT_URL => 'https://api.talkbot.ir/v1/chat/completions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
			
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>
            '{
                "model": "gpt-4-turbo",
                "messages": '.json_encode($message) .',
                "temperature": 0.3,
                "stream": false,
             
                "top_p": 1.0,
                "frequency_penalty": 0.0,
                "presence_penalty": 0.0
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
				'Authorization: Bearer ' .  'sk-5415240fgb4frer5er4tr54tggfr54r4yuhjjnh4e34578g' //کلید شما اینجا قرار میگیرد.
                
            ),
        )
    );

  echo $Response = curl_exec($REQ);

    $error = curl_error($REQ);

    $data = json_decode($Response, true);
