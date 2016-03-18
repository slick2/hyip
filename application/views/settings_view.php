<div class="right-wrap">
    <div class="balance-wrap">
        <form action="" id="changeform" method="post">

            <h2>Изменение данных:</h2>
            <p><label for="full_name">Изменение имени:<br>
                    <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
            <p><label for="email">Изменение e-mail:<br>
                    <input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
            <p><label for="password">Изменение пароля:<br>
                    <input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
            <p><label for="user_pass">Повторите новый пароль:<br>
                    <input class="input" id="password_confirm" name="password_confirm" size="32"   type="password" value=""></label></p>

            <p><label for="password_old">Введите старый пароль:<br>
                    <input class="input" id="password_old" name="password_old" size="32"   type="password" value=""></label></p>
            <p class="submit"><input class="btn_save" id="change" name= "change" type="submit" value="Изменить"></p>
        </form>
    </div>

    <div class="oper-wrap">
        <h2>Аккаунты для вывода:</h2>
        <table>
            <form action="" id="accform" method="post">
                <?php
                foreach ($data as $value)
                {
                    echo "<tr><td><label><img src='../img/" . $value['image'] . "'> " . $value['currency'] . " </label></td><td><input type='text' name='" . $value['name'] . "' value='" . $value['account'] . "'></td></tr>";
                }
                ?>
        </table>
        <input class="btn_save" id="accchange" name= "accchange" type="submit" value="Сохранить">
        </form>
    </div>
</div>