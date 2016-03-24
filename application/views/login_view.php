<div class="container mlogin">
    <div id="login">
        <form action="" id="loginform" method="post" name="loginform">
            <div class="logo_log"></div>
            <div style="margin: auto;">
                <label class="lbl_log" for="user_login">E-mail:<br></label>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-user"></i></span>
                    <input class="span2" id="inputIcon" type="text" name="email">
                </div>

                <label class="lbl_log" for="user_pass">Пароль:<br></label>
                <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-key"></i></span>
                    <input class="span2" id="inputIcon" type="password" name="password">
                </div>
            </div>

            <p class="submit"><input class="button" name="login" type= "submit" value="Войти"></p>
            <div class="log_invalid">
                <span>
                    <?php
                    if (isset($_POST["login"]))
                    {
                        extract($data);
                        if ($message == "OK")
                        {
                            echo "<p style='color:green'>Авторизация прошла успешно.</p>";
                        }
                        else
                        {
                            echo "<p style='color:red'><i class='fa fa-exclamation-circle'></i>$message</p>";
                        }
                    }
                    ?>
                </span>
            </div>
        </form>
        <div class="new_user">
            <p>Еще нет аккаунта?</p>
            <a href= "/auth/register">Создать аккаунт</a>
            <p>Copyright 2015 RocketStation. Все права защищены.</p>
        </div>
    </div>
</div>
