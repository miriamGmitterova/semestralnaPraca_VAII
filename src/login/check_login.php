<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pouzivatelskeMeno']) && isset($_POST['heslo']) && !isset($_SESSION['prihlaseny'])) {
    $_SESSION['loginError'] = "Zlé používateľské meno alebo heslo, skúste znova.";

    $url = "localhost:8080/user/{$_POST['pouzivatelskeMeno']}/getHeslo";
    //$content = json_encode("");
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
    $heslo = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($status != 200) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    //Tu bude kontrola hashu
    if (password_verify($_POST['heslo'], $heslo)) {
        $url = "localhost:8080/user/{$_POST['pouzivatelskeMeno']}";
        //$content = json_encode("");
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
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
        $decoded = json_decode($json_response);

        $_SESSION['userID'] = $decoded->id;
        $_SESSION['pouzivatelskeMeno'] = $decoded->pouzivatelskeMeno;
        //Netreba ulozit
        //$_SESSION['heslo'] = $decoded->heslo;
        $_SESSION['email'] = $decoded->email;
        if (isset($_SESSION['krstneMeno'])) unset($_SESSION['krstneMeno']);
        if ($decoded->krstneMeno != null) $_SESSION['krstneMeno'] = $decoded->krstneMeno;
        if (isset($_SESSION['priezvisko'])) unset($_SESSION['priezvisko']);
        if ($decoded->priezvisko != null) $_SESSION['priezvisko'] = $decoded->priezvisko;
        $_SESSION['admin'] = $decoded->admin;
        $_SESSION['prihlaseny'] = true;
        unset($_SESSION['loginError']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}


