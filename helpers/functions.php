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

    require $_SERVER['DOCUMENT_ROOT'] . "/include/main_menu.php";
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
    return mb_strimwidth($line, 0, $length, $appends);
}

function isCurrentUrl($url): bool
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;
}

function auth($login, $password): bool
{
    session_start([
        'cookie_lifetime' => SESSION_LIFE_TIME,
    ]);

    if ($login && $password) {
        $success = checkLoginPassword($login, $password);
        if ($success) {
            $_SESSION['login'] = $login;
        }
        return $success;
    }
    return false;
}