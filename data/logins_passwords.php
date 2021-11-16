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
