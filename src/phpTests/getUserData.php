<?php
    session_start();
    $url = "localhost:8080/user/ganco541";
    $content = json_encode("");
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($status != 200) {
        die ("Error: call to URL $url failed with status $status, response $json_response, " . curl_error($curl) . ". curl_errno ". curl_errno($curl));
    }
    echo $json_response . "\n\r";
    $decoded = json_decode($json_response);
    echo $decoded->id . "\n\r";
    echo $decoded->pouzivatelskeMeno . "\n\r";
    echo $decoded->heslo . "\n\r";
    echo $decoded->email . "\n\r";
    echo $decoded->krstneMeno . "\n\r";
    if ($decoded->krstneMeno == null) {
        echo "null\n\r";
    }
    echo $decoded->priezvisko . "\n\r";
    if ($decoded->priezvisko == null) {
        echo "null\n\r";
    }
    echo $decoded->admin . "\n\r";