<?php

require($_SERVER['DOCUMENT_ROOT'] . "/helpers/data.php");
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/functions.php");
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/cookie.php");

const SESSION_LIFE_TIME = 86400;

session_start([
    'cookie_lifetime' => SESSION_LIFE_TIME,
]);

$tryAuthorization = isset($_GET['login']) && $_GET['login'] == "yes";
$successAuthorization = $tryAuthorization && auth($login, $password);

if ($successAuthorization) {
    $_SESSION['login'] = $login;
}

$authorizated = isset($_SESSION['login']);

$route=strtok($_SERVER["REQUEST_URI"],'?');

$tmp =  $_SERVER['DOCUMENT_ROOT'];

if (!$authorizated && strcmp($route,"/")) {
    header("Location: /");
}
