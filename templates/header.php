<?php

$login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : null;
$password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : null;

function getStatusAuthorization($login, $password) {
    if (isset($_POST["login"]) && isset($_POST["password"])) {

        require ($_SERVER['DOCUMENT_ROOT'] . '/include/logins.php');
        require ($_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php');

        $array = array_combine($logins, $passwords);

        return isset($array[$login]) && $array[$login] == $password;
    }
    return false;
}

$tryAuthorization = isset($_GET['login']) && $_GET['login'] == "yes";
$successAuthorization = getStatusAuthorization($login, $password);

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
        <div class="logo"><img src="/img/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>


<?php require ($_SERVER['DOCUMENT_ROOT'] . "/helpers/functions.php"); ?>
<?php showMenu($menuList, "header"); ?>