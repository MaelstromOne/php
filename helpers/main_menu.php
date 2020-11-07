<?php

$menuList = [
    [
        'title' => 'Главная',
        'path' => '/',
        'sort' => 1,
    ],
    [
        'title' => 'О нас',
        'path' => '/route/about/',
        'sort' => 2,
    ],
    [
        'title' => 'Каталог',
        'path' => '/route/catalog/',
        'sort' => 3,
    ],
    [
        'title' => 'Контакты',
        'path' => '/route/contacts/',
        'sort' => 4,
    ],
    [
        'title' => 'Новости',
        'path' => '/route/news/',
        'sort' => 5,
    ]
];

function showMenu(array $menuList, string $layout = "header")
{
    $menuList = $layout == "header" ? arraySort($menuList,'sort',SORT_ASC)
        : arraySort($menuList,'title', SORT_DESC);

    $divClass = $layout == "header" ? "clear" : "clearfix";
    $ulClass = $layout == "header" ? "" : "bottom";
    $elementClass = $layout == "header" ? "horizontal-element" : "vertical-element";


    return include ($_SERVER['DOCUMENT_ROOT'] . "/templates/main_menu.php");
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
    return $line < ($length + strlen($appends)) ?? substr($line, 0, $length) . $appends;
}

?>