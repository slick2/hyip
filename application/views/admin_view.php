<div class="right-wrap">
    <div class="balance-wrap">
        <h2>Добавление платежных аккаунтов:</h2>
        <form action="admin" method="post">
            <label>Платежная система:</label>
            <select name="paysystem">
                <?php
                foreach ($data['systems'] as $value)
                {
                    echo "<option value='" . $value . "'>" . $value . "</option>";
                }
                ?>
            </select>
            <label>Кошелек:</label>
            <input class="input" type="text" name="paynumber" >
            <label>Валюта:</label>

            <select name="currency">
                <option value="RUB">RUB</option>
                <option value="USD">USD</option>
            </select>
            <label>Логин в платёжной системе:</label>
            <input class="input" type="text" name="account" >

            <label>Пароль в платёжной системе:</label>
            <input class="input" type="password" name="password" >

            <label>Назначение:</label>
            <select name='inout'>
                <option selected value='0'>Ввод+вывод</option>
                <option value='1'>Ввод</option>
                <option value='2'>Вывод</option>
            </select>

            <input name="admadd" value="Создать" type="submit" class="btn-full">
        </form>
    </div>
    <div class="oper-wrap">
        <h2>Настройка существующих аккаунтов:</h2>
        <form action="admin" method="post">
            <table class='table-history'>
                <tr><th>Платежная система</th><th>Валюта</th><th>Кошелек</th><th>Назначение</th><th>Удалить</th></tr>
                <?php
                foreach ($data['accounts'] as $value)
                {
                    $fid = $value['fid'];
                    $sid = $value['sid'];
                    $index = $value['index'];
                    $options = $value['options'];
                    echo <<<"ENDHTML"
    <tr>
    <td>{$value['syst']}</td>
    <td>{$value['currency']}</td>
    <td>{$value['paynumber']}</td>
    <td>
      <select name='inout_{$value['id']}'>
        <option selected value='$index'>{$options[$index]}</option>
        <option value='$fid'>{$options[$fid]}</option>
        <option value='$sid'>{$options[$sid]}</option>
      </select>
    </td>
    <td><input type='checkbox' value='' name='delete_{$value['id']}'></td>
    </tr>
ENDHTML;
                }
                ?>
            </table>
            <input name='admchange' class="btn-full" type='submit' value='Сохранить'>
        </form>
    </div>
</div>
