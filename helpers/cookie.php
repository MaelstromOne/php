<?php

$COOKIE_LIFE_TIME = time() + 30 * 86400;

$login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : (isset($_COOKIE["login"]) ? htmlspecialchars($_COOKIE["login"]) : null);
$password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : (isset($_COOKIE["password"]) ? htmlspecialchars($_COOKIE["password"]) : null);

setcookie("login", $login, $COOKIE_LIFE_TIME);
setcookie("password", $password, $COOKIE_LIFE_TIME);
