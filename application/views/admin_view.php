<div class="right-wrap">
    <div class="balance-wrap">
        <h2>Изменение процентов:</h2> 
        <form action="" method="post" name="proc">
            <table class="table table-out">
                <tr>
                    <td>Бизнес процент:</td>
                    <td><input class="input input-depos" type="text" name="business_day" value="<?php echo $data['percents']['business_day']; ?>"></td>
                </tr>
                <tr>
                    <td>Процент выходного дня:</td>
                    <td><input class="input input-depos" type="text" name="holiday" value="<?php echo $data['percents']['holiday']; ?>"></td>
                </tr>
                <tr>
                    <td>Реферальный процент до $500:</td>
                    <td><input class="input input-depos" type="text" name="referral_first" value="<?php echo $data['percents']['referral_first']; ?>"></td>
                </tr>
                <tr>
                    <td>Реферальный процент свыше $500:</td>
                    <td><input class="input input-depos" type="text" name="referral_second" value="<?php echo $data['percents']['referral_second']; ?>"></td>
                </tr>

            </table>
            <input class="btn ok-btn" type="submit" name="proc" value="Изменить">
        </form>
        <h2>Добавление платежных аккаунтов:</h2>
        <form action="admin" method="post">
            <table class="table table-out">
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Платежная система:
                                <select name="paysystem" class="form-control paysystem">
                                    <?php
                                    foreach ($data['systems'] as $value)
                                    {
                                        if ($value != 'Payeer RUB' && $value != 'Bitcoin')
                                        {
                                            echo "<option value='" . $value . "'>" . $value . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label>Назначение:
                                <select name='inout' class="form-control payinout">
                                    <option selected value='0'>Ввод+вывод</option>
                                    <option value='1'>Ввод</option>
                                    <option value='2'>Вывод</option>
                                </select>
                            </label>
                        </div>                    
                    </td>
                </tr>
                <tr>
                    <td class="newacc advcash in">
                        <div class="form-group">
                            <label>AdvCash Email:
                                <input class="input input-depos" name="advcash_email" type="text" />
                            </label>
                        </div>
                    </td>

                    <td class="newacc advcash in">
                        <div class="form-group">
                            <label>AdvCash SCI Name:
                                <input class="input input-depos" name="advcash_sci" type="text" />
                            </label>
                        </div>
                    </td>
                    <td class="newacc advcash in">
                        <div class="form-group">
                            <label>AdvCash Sign:
                                <input class="input input-depos" name="advcash_sign" type="text" />
                            </label>
                        </div>

                    <td class="newacc advcash out">
                        <div class="form-group">
                            <label>AdvCash API Name:
                                <input class="input input-depos" name="advcash_api" type="text" />
                            </label>
                        </div>
                    </td>

                    <td class="newacc advcash out">
                        <div class="form-group">
                            <label>AdvCash Password:
                                <input class="input input-depos" name="advcash_key" type="text" />
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="newacc payeer in">
                        <div class="form-group">
                            <label>Payeer Shop ID:
                                <input class="input input-depos" name="payeer_shop" type="text" />
                            </label>
                        </div>
                    </td>

                    <td class="newacc payeer in">
                        <div class="form-group">
                            <label>Payeer Key:
                                <input class="input input-depos" name="payeer_key" type="text" />
                            </label>
                        </div>
                    </td>
                    <td class="newacc payeer out">
                        <div class="form-group">
                            <label>Payeer Out Account:
                                <input class="input input-depos" name="payeer_acc" type="text" />
                            </label>
                        </div>

                    <td class="newacc payeer out">
                        <div class="form-group">
                            <label>Payeer API ID:
                                <input class="input input-depos" name="payeer_api_id" type="text" />
                            </label>
                        </div>
                    </td>

                    <td class="newacc payeer out">
                        <div class="form-group">
                            <label>Payeer API Key:
                                <input class="input input-depos" name="payeer_api_key" type="text" />
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="newacc perfectmoney in">
                        <div class="form-group">
                            <label>Perfectmoney Payee Account:
                                <input class="input input-depos" name="perfectmoney_acc" type="text" />
                            </label>
                        </div>
                    </td>

                    <td class="newacc perfectmoney in">
                        <div class="form-group">
                            <label>Perfectmoney Payee Name:
                                <input class="input input-depos" name="perfectmoney_name" type="text" />
                            </label>
                        </div>
                    </td>
                    <td class="newacc perfectmoney out">
                        <div class="form-group">
                            <label>Perfectmoney Account ID:
                                <input class="input input-depos" name="perfectmoney_id" type="text" />
                            </label>
                        </div>

                    <td class="newacc perfectmoney out">
                        <div class="form-group">
                            <label>Perfectmoney Password:
                                <input class="input input-depos" name="perfectmoney_pass" type="text" />
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
        <h2>Существующие аккаунты:</h2>
        <?php
        foreach ($data['accounts']['payeer'] as $value)
        {
            $text = intval($value['active']) ? 'Деактивировать' : 'Активировать';
            echo <<<"ENDHTML"
    <table class='table table-history'>
    <tr><th>Payeer Shop ID</th><th>Payeer Key</th><th>Payeer Out Account</th><th>Payeer API ID</th><th>Payeer API Key</th><th>Активно</th></tr>
    <tr>
    <td>{$value['in_shop']}</td>
    <td>{$value['in_key']}</td>
    <td class='payeersend'>{$value['out_acc']}</td>
    <td>{$value['out_api_id']}</td>
    <td>{$value['out_api_key']}</td>
    <td>
        <a class='pay toggle payeer'>
            $text
        </a>
    </td>
    </tr>
    </table>
ENDHTML;
        }
        foreach ($data['accounts']['advcash'] as $value)
        {
            $text = intval($value['active']) ? 'Деактивировать' : 'Активировать';
            echo <<<"ENDHTML"
    <table class='table table-history'>
    <tr><th>AdvCash Email</th><th>AdvCash SCI Name</th><th>AdvCash Sign</th><th>AdvCash API Name</th><th>AdvCash Password</th><th>Активно</th></tr>
    <tr>
    <td class='advcashsend'>{$value['in_acc']}</td>
    <td>{$value['in_name']}</td>
    <td class='break-long-str'>{$value['in_sign']}</td>
    <td>{$value['out_api_name']}</td>
    <td>{$value['out_key']}</td>
    <td>
        <a class='pay toggle advcash'>
            $text
        </a>
    </td>
    </tr>
    </table>
ENDHTML;
        }
        foreach ($data['accounts']['perfectmoney'] as $value)
        {
            $text = intval($value['active']) ? 'Деактивировать' : 'Активировать';
            echo <<<"ENDHTML"
    <table class='table table-history'>
    <tr><th>Perfectmoney Payee Account</th><th>Perfectmoney Payee Name</th><th>Perfectmoney Account ID</th><th>Perfectmoney Password</th><th>Активно</th></tr>
    <tr>
    <td class='perfectmoneysend'>{$value['in_acc']}</td>
    <td>{$value['in_name']}</td>
    <td>{$value['out_id']}</td>
    <td>{$value['out_pass']}</td>
    <td>
        <a class='pay toggle perfectmoney'>
            $text
        </a>
    </td>
    </tr>
    </table>
ENDHTML;
        }
        ?>

    </div>
</div>
