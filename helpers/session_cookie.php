<?php
const SESSION_LIFE_TIME = 86400;
const COOKIE_LIFE_TIME = 30 * 86400;

$login    = $_POST["login"] ?? $_COOKIE["login"] ?? null;
$password = $_POST["password"] ?? null;
$showMenuAuthorization = ($_GET['login'] ?? null) == "yes";
$successAuthorization = auth($login, $password);

setcookie("login", $login, time() + COOKIE_LIFE_TIME, "/");

$authorized = isset($_SESSION['login']);
$route = strtok($_SERVER["REQUEST_URI"],'?');
$isRootRoute = !strcmp($route,"/");

if (!$authorized && !$isRootRoute) {
    header("Location: /");
    die();
}
