<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['admin'] == 1 && isset($_POST['pouzivatelskeMeno'])) {
    $url = "localhost:8080/user/{$_POST['pouzivatelskeMeno']}";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($status != 200) {
        die ("Error: call to URL $url failed with status $status, response $json_response, " . curl_error($curl) . ". curl_errno ". curl_errno($curl));
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}
