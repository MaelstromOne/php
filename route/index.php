<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/templates/header.php"); ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">

                <h1>Возможности проекта</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>

            </td>

            <?php if ($_GET['login'] == "yes"): ?>
                <?php if ($successAuthorization): ?>
                    <?php   require 'include/success.php'; ?>
                <?php else: ?>
                    <td class="right-collum-index">

                        <div class="project-folders-menu">
                            <ul class="project-folders-v">
                                <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
                                <li><a href="#">Регистрация</a></li>
                                <li><a href="#">Забыли пароль?</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="index-auth">
                            <?php if (isset($_POST["login"])): ?>
                                <p style="color: red"> <?= "Неверный логин или пароль"?></p>
                            <?php endif; ?>
                            <form action="" method="POST">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="iat">
                                            <label for="login_id">Ваш e-mail:</label>
                                            <input id="login_id" size="30" name="login">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="iat">
                                            <label for="password_id">Ваш пароль:</label>
                                            <input id="password_id" size="30" name="password" type="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="Войти"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                    </td>
                <?php endif; ?>
            <?php endif; ?>

        </tr>
    </table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/templates/footer.php"); ?>