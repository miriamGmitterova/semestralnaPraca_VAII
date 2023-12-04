<?php
session_start();
if (isset($_SESSION['prihlaseny'])) {
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}
