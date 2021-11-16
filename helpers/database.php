<?php

function connect()
{
    static $dbh = null;
    if (!$dbh) {
        $dbh = new PDO('mysql:host=localhost;dbname=php_db', 'root', '');
    }
    return $dbh;
}

function checkLoginPassword($login, $password): bool
{
    $dbh = connect();
    $sth = $dbh->prepare('SELECT password FROM users WHERE email = :email');
    $sth->execute(array(':email' => mb_strtolower($login)));
    $result = $sth->fetchAll();
    return !empty($result[0][0]) && password_verify($password, $result[0][0]);
}

function getProfile()
{
    $dbh = connect();
    $sth = $dbh->prepare('SELECT full_name, email, phone FROM users WHERE email = :email');
    $sth->execute(array(':email' => mb_strtolower($_SESSION['login'])));
    $user = $sth->fetchAll()[0];

    $sth = $dbh->prepare('SELECT g.name FROM users AS u INNER JOIN group_user AS gu ON u.id = gu.user_id INNER JOIN `groups` AS g on gu.group_id = g.id WHERE u.email = :email');
    $sth->execute(array(':email' => mb_strtolower($_SESSION['login'])));
    $groups = $sth->fetchAll();

    require $_SERVER['DOCUMENT_ROOT'] . "/templates/profile.php";
}