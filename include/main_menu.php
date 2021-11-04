<ul class="main-menu <?= $ulClass ?>">
    <?php foreach ($menuList as $element): ?>
        <li>
            <a href="<?= $element['path'] ?>"
               class="<?= isCurrentUrl($element['path']) ? "active" : "" ?>">
                <?= cutString($element['title']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
