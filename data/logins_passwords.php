<?php
$logins = [
    "test",
    "test2",
    "test3",
];

$passwords = [
    "test",
    "test2",
    "test3",
];

function checkLoginPassword($login, $password): bool
{
    global $logins;
    global $passwords;
    $array = array_combine($logins, $passwords);
    return isset($array[$login]) && $array[$login] == $password;
};
