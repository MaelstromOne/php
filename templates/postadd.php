<form method="post">
    <p>
        <label>Заголовок</label><br>
        <input type="text" name="header" required>
    </p>
    <p>
        <label>Текст сообщения</label><br>
        <input type="text" name="text" required>
    <p>
    <p>
        <label>Пользователи</label><br>
        <select name="to_user" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['full_name'] ?></option>
            <?php endforeach; ?>
        </select>
    <p>
    <p>
        <label>Разделы сообщения</label><br>
        <select name="section" required>
            <?php foreach ($sections as $section): ?>
                <option value="<?= $section['id'] ?>"><?= $section['name'] ?></option>
            <?php endforeach; ?>
        </select>
    <p>
        <input type="submit" value="Отправить">
</form>

