<?php
session_start();
if (isset($_SESSION['prihlaseny'])) {
    if ($_SESSION['admin'] == 0) {
        $bool = "true";
    } else {
        $bool = "false";
    }
    $url = "localhost:8080/user/{$_SESSION['pouzivatelskeMeno']}/setAdmin/{$bool}";
    //$content = json_encode("");
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
    $response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($status != 200) {
        die ("Error: call to URL $url failed with status $status, " . curl_error($curl) . ". curl_errno ". curl_errno($curl));
    }
    if ($_SESSION['admin'] == 0) {
        $_SESSION['admin'] = 1;
    } else {
        $_SESSION['admin'] = 0;
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}
