<?php

require ($_SERVER['DOCUMENT_ROOT'] . '/include/logins.php');
require ($_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php');

require_once ($_SERVER['DOCUMENT_ROOT'] . "/helpers/main_menu.php");

$successAuthorization = isset($_POST["login"]) && array_combine($logins, $passwords)[$_POST["login"]] == $_POST["password"];

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<?php showMenu($menuList, "header"); ?>