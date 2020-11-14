<div class="<?= $divClass ?>">
    <ul class="main-menu <?= $ulClass ?>">
        <?php foreach ($menuList as $element): ?>
            <li>
                <a href="<?= $element['path'] ?>"
                   class="<?= $elementClass ?> <?= isCurrentUrl($element['path']) ? "selected-menu" : "" ?>">
                    <?= cutString($element['title']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>