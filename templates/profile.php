<h2>Полное имя:</h2>
<p><?= $user['full_name'] ?></p>
<h2>Email:</h2>
<p><?= $user['email'] ?></p>
<h2>Телефон:</h2>
<p><?= $user['phone'] ?></p>
<h2>Группы:</h2>
<?php foreach ($groups as $group): ?>
    <p><?= $group['name'] ?></p>
<?php endforeach;
