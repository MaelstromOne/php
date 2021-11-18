<?php if ($can_write): ?>

    <h2>Прочитанные сообщения</h2>
    <?php foreach ($readed_posts as $post): ?>
        <a href="<?= "/posts/details.php?id=" . $post['id'] ?>"><?= $post['name'] ?> - <?= $post['header'] ?></a>
        <br>
    <?php endforeach; ?>
    <br>

    <h2>Не прочитанные сообщения</h2>
    <?php foreach ($not_readed_posts as $post): ?>
        <a href="<?= "/posts/details.php?id=" . $post['id'] ?>"><?= $post['name'] ?> - <?= $post['header'] ?></a>
        <br>
    <?php endforeach; ?>
    <br>

    <a href="<?= "/posts/add/" ?>">Написать сообщение</a>

<?php else: ?>
    <h2>Вы сможете отправлять сообщения после прохождения модерации</h2>
<?php endif; ?>
