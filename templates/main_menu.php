<div class="<?= $divClass ?>">
    <ul class="main-menu <?= $ulClass ?>">
        <?php foreach ($menuList as $element): ?>
            <li><a href="#"><?= $element['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>