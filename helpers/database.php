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

    $sth = $dbh->prepare('SELECT g.description FROM users AS u INNER JOIN group_user AS gu ON u.id = gu.user_id INNER JOIN `groups` AS g ON gu.group_id = g.id WHERE u.email = :email');
    $sth->execute(array(':email' => mb_strtolower($_SESSION['login'])));
    $groups = $sth->fetchAll();

    require $_SERVER['DOCUMENT_ROOT'] . "/templates/profile.php";
}

function getPosts()
{
    $dbh = connect();

    $sth = $dbh->prepare('SELECT g.name FROM users AS u INNER JOIN group_user AS gu ON u.id = gu.user_id INNER JOIN `groups` AS g ON gu.group_id = g.id WHERE u.email = :email');
    $sth->execute(array(':email' => mb_strtolower($_SESSION['login'])));
    $can_write = $sth->fetchAll()[0]['name'] === 'can_write';

    $sth = $dbh->prepare('SELECT s.name, m.header, m.id FROM users AS u INNER JOIN messages AS m ON u.id = m.user_receiver_id INNER JOIN sections AS s ON m.section_id = s.id WHERE u.email = :email AND m.readed = :readed');
    $sth->execute(array(':email' => mb_strtolower($_SESSION['login']), ':readed' => 0));
    $not_readed_posts = $sth->fetchAll();

    $sth->execute(array(':email' => mb_strtolower($_SESSION['login']), ':readed' => 1));
    $readed_posts = $sth->fetchAll();

    require $_SERVER['DOCUMENT_ROOT'] . "/templates/posts.php";
}

function getPostAdd()
{
    $dbh = connect();
    $sth = $dbh->prepare('SELECT u.id, u.full_name FROM users AS u INNER JOIN group_user AS gu ON u.id = gu.user_id INNER JOIN `groups` AS g ON gu.group_id = g.id WHERE g.name = :name');
    $sth->execute(array(':name' => 'can_write'));
    $users = $sth->fetchAll();

    $sth = $dbh->prepare('SELECT id, name FROM sections');
    $sth->execute();
    $sections = $sth->fetchAll();

    require $_SERVER['DOCUMENT_ROOT'] . "/templates/postadd.php";
}

function getMessage()
{
    $dbh = connect();
    $sth = $dbh->prepare('SELECT m.header, m.created_at, u.full_name, u.email, m.text FROM users AS u INNER JOIN messages AS m ON u.id = m.user_receiver_id WHERE m.id = :id');
    $sth->execute(array(':id' => $_GET['id']));
    $message = $sth->fetchAll()[0];

    require $_SERVER['DOCUMENT_ROOT'] . "/templates/message.php";
}