<div class="right-wrap">
    <div class="balance-wrap">        
        <h2>Добавление платежных аккаунтов:</h2>
        <form action="admin" method="post">
            <table class="table table-out">
            <tr>
                <td>
                    <div class="form-group">
                        <label>Логин в платёжной системе:
                            <input class="form-control" type="text" name="account" >
                        </label>
                    </div>
                </td>
                <td>
                    <div>
                        <label for="password">Пароль в платёжной системе:
                            <input class="form-control" type="password" name="password" >
                        </label>
                    </div>
                </td>
                <td>
                   <div class="form-group"> 
                        <label>Кошелек:
                            <input class="form-control" type="text" name="paynumber" />
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label>Платежная система:
                            <select name="paysystem" class="form-control">
                                <?php
                                foreach ($data['systems'] as $value)
                                {
                                    echo "<option value='" . $value . "'>" . $value . "</option>";
                                }
                                ?>
                            </select>
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label>Валюта:
                            <select name="currency" class="form-control">
                                <option value="RUB">RUB</option>
                                <option value="USD">USD</option>
                            </select>
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label>Назначение:
                            <select name='inout' class="form-control">
                                <option selected value='0'>Ввод+вывод</option>
                                <option value='1'>Ввод</option>
                                <option value='2'>Вывод</option>
                            </select>
                        </label>
                    </div>                    
                </td>
            </tr>            
            <tr>                
                <td colspan="3">
                    <div class="form-group">
                        <input name="admadd" class="btn ok-btn" value="Создать" type="submit" class="btn-full">
                    </div>
                </td>
                
            </tr>
        </table>
            
        </form>
    </div>
    <div class="oper-wrap">
        <h2>Настройка существующих аккаунтов:</h2>
        <form action="admin" method="post">
            <table class='table table-history'>
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
      <select name='inout_{$value['id']}' class='form-group'>
        <option selected value='$index'>{$options[$index]}</option>
        <option value='$fid'>{$options[$fid]}</option>
        <option value='$sid'>{$options[$sid]}</option>
      </select>
    </td>
    <td><input type='checkbox' value='' name='delete_{$value['id']}' class='form-group'></td>
    </tr>
ENDHTML;
                }
                ?>
            </table>
            <input name='admchange' class="btn-full" type='submit' value='Сохранить'>
        </form>
    </div>
</div>
