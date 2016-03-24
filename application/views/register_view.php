<div class="container mregister">
    <div id="login">
        <form action="" id="registerform" method="post"name="registerform">
            <div class="logo_log"></div>
            <label class="lbl_log" for="full_name">Полное имя<br></label>
            <div class="input-prepend">
                <span class="add-on"><i class="fa fa-user"></i></span>
                <input class="input" id="full_name" name="full_name"size="32"  type="text" value="">
            </div>
            <label class="lbl_log" for="email">E-mail<br></label>
            <div class="input-prepend">
                <span class="add-on"><i class="fa fa-envelope"></i></span>
                <input class="input" id="email" name="email" size="32"type="email" value="">
            </div>
            <label class="lbl_log" for="password">Пароль<br></label>
            <div class="input-prepend">
                <span class="add-on"><i class="fa fa-key"></i></span>
                <input class="input" id="password" name="password" size="32" type="password" value="">
            </div>

            <label class="lbl_log" for="repeat_password">Повторите пароль<br></label>
            <div class="input-prepend">
                <span class="add-on"><i class="fa fa-key"></i></span>
                <input class="input" id="repeat_password" name="repeat_password" size="32" type="password" value="">

            </div>

            <p class="submit"><input class="button" id="register" name="register" type="submit" value="Зарегистрироваться">
                <?php if (!empty($message))
                {
                    echo "<p class=\"error\">" . $message . "</p>";
                } ?>
        </form>

        <div class="new_user">
            <p>Уже зарегистрированы?</p>
            <a href= "/auth">Войти</a>
            <p>Copyright 2015 RocketStation. Все права защищены.</p>
        </div>

    </div>
</div>