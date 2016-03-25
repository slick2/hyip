<div class="container-fluid new-depos">
    <form action="" method="post" name="change">
        <div class="col-xs-12 devider">
            <table class="table-setting">
                <tr><td>Имя пользователя</td>
                    <td>
                        <?php echo Session::get('name'); ?>
                    </td></tr>
                <tr><td>Полное имя</td><td>
                        <input class="input input-depos" id="full_name" name="full_name"size="32"  type="text" value="">
                    </td></tr>
                <tr><td>Старый пароль</td><td>
                        <input class="input input-depos" id="password_old" name="password_old" size="32"   type="password" value="">
                    </td></tr>
                <tr><td>Новый пароль</td><td>
                        <input class="input input-depos" id="password" name="password"size="32"   type="password" value="">
                    </td></tr>
                <tr><td>Повторить пароль</td><td>
                        <input class="input input-depos" id="password_confirm" name="password_confirm" size="32"   type="password" value="">
                    </td></tr>
                <?php
                foreach ($data['systems'] as $value)
                {
                    echo "<tr><td><label>{$value['name']} </label></td><td><input class='input-depos' type='text' name='" . $value['name'] . "' value='" . $value['account'] . "'></td></tr>";
                }
                ?>
                <tr><td>E-mail адрес</td><td>
                        <input class="input-depos" id="email" name="email" size="32"type="email" value="">
                    </td></tr>
            </table>
        </div>
        <input class="pay" id="accchange" name="change" type="submit" value="Сохранить изменения">
    </form>
</div>


<h3>Безопасность</h3>

<div class="row " style="padding-bottom: 40px;">
    <form action="" method="post" name="safety">
    <div class="col-xs-6">
        <div class="col-xs-12 new-depos">
            <div class="col-xs-12 ip-adres">Обнаружение IP-адреса</div>
            <div class="col-xs-12 devider">
                <input type="radio" name="ip" value="off" checked>Выключить
            </div>
            <div class="col-xs-12">
                <input type="radio" name="ip" value="on">Включить
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="col-xs-12 new-depos">
            <div class="col-xs-12 ip-adres">Обнаружение IP-адреса</div>
            <div class="col-xs-12 devider">
                <input type="radio" name="browser" value="off" checked>Выключить
            </div>
            <div class="col-xs-12">
                <input type="radio" name="browser" value="on">Включить
            </div>
        </div>
    </div>
    <div class="col-xs-12"><input class="pay" id="safety" name= "safety" type="submit" value="Сохранить изменения"></div>
</div>
