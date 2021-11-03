<?php

const PAGE_NOT_FOUND = "Страница не найдена.";

function getTitle(array $menuList, $path)
{
    foreach ($menuList as $item) {
        if ($item['path'] === $path) {
            return $item['title'];
        }
    }

    return PAGE_NOT_FOUND;
}

function showMenu(array $menuList, $layout, $key = 'sort', $sort = SORT_ASC)
{
    $menuList = arraySort($menuList, $key, $sort);
    $ulClass = $layout == "header" ? "" : "bottom";

    require ($_SERVER['DOCUMENT_ROOT'] . "/templates/main_menu.php");
}

function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{
    usort($array, function ($a, $b) use ($key, $sort) {
        return ($a[$key] <=> $b[$key]) * (($sort == SORT_ASC) ? 1 : -1);
    });

    return $array;
}

function cutString($line, $length = 12, $appends = '...'): string
{
    return mb_strimwidth($line,0, $length, $appends);
}

function isCurrentUrl($url)
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;
}

function auth($login, $password) {
    if (isset($_POST["login"]) && isset($_POST["password"])) {

        require ($_SERVER['DOCUMENT_ROOT'] . '/include/logins.php');
        require ($_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php');

        $array = array_combine($logins, $passwords);

        return isset($array[$login]) && $array[$login] == $password;
    }
    return false;
}