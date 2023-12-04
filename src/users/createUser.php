<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['admin'] == 1 && isset($_POST['pouzivatelskeMeno']) && isset($_POST['heslo']) && isset($_POST['email'])) {
    $url = "localhost:8080/user/save";
    $username = $_POST['pouzivatelskeMeno'];
    $hashedPassword = password_hash($_POST['heslo'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $arrayRequest = array("pouzivatelskeMeno" => $username, "heslo" => $hashedPassword, "email" => $email);
    $content = json_encode($arrayRequest);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($status != 201) {
        die ("Error: call to URL $url failed with status $status, response $json_response, " . curl_error($curl) . ". curl_errno ". curl_errno($curl));
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}
