<?php

require($_SERVER['DOCUMENT_ROOT'] . "/helpers/functions.php");
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/data.php");

$login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : null;
$password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : null;
$tryAuthorization = isset($_GET['login']) && $_GET['login'] == "yes";
$successAuthorization = getStatusAuthorization($login, $password);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title></title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="/img/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clear">
    <?php showMenu($menuList, "header", 'sort',SORT_ASC); ?>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">

            <h1><?=getTitle($menuList, parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))?></h1>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>

        </td>