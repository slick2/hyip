<link rel="stylesheet" type="text/css" href="css/addmoney.css">
<div class="right-wrap">
    <div class="balance-wrap">
        <form name="addmoney" action="" id="addmoney" method="post">
            <h2>Пополнение счёта:</h2>
            <div class="log_invalid">
                <span>
                    
                </span>
            </div>
            <p><label for="sum">Введите сумму:<br>
                    <input class="input" id="sum" name="sum" type="text" value="10"></label></p>
            <p class="submit"><input class="btn_save" id="addcash" name= "adddcash" type="submit" value="Пополнить"></p>
            <div class="new_depos">
                <div class="logo-py">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <div class="val_usd">
                    <label data-cur="usd" for="payeer_usd" class="btn-full"><span class="sel-span">Выбрать</span> Payeer, USD</label>
                    <input style="display:none" type="radio" id="payeer_usd" name="moneyadd" value="Payeer_usd"></input>
                </div>
                <div class="val_ru">
                    <label data-cur="rub" for="payeer_rub" class="btn-full"><span class="sel-span">Выбрать</span> Payeer, RUB</label>
                    <input style="display:none" type="radio" id="payeer_rub" name="moneyadd" value="Payeer_rub"></input>
                </div>
            </div>

            <div class="new_depos">
                <div class="ym_logo">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <label data-cur="rub" for="yandex" class="btn-full"><span class="sel-span">Выбрать</span> Yandex.Деньги</label>
                <input style="display:none" type="radio" id="yandex" name="moneyadd" value="YandexMoney_rub"></input>
            </div>

            <div class="new_depos">
                <div class="ok_logo">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <label data-cur="usd" for="okpay" class="btn-full"><span class="sel-span">Выбрать</span> OK Pay</label>
                <input style="display:none" type="radio" id="okpay" name="moneyadd" value="OKPay"></input>

            </div>

            <div class="new_depos">
                <div class="qw_logo">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <div class="val_usd">
                    <label data-cur="usd" for="qiwi_usd" class="btn-full"><span class="sel-span">Выбрать</span> QIWI, USD</label>
                    <input style="display:none" type="radio" id="qiwi_usd" name="moneyadd" value="QIWI_usd"></input>
                </div>
                <div class="val_ru">
                    <label data-cur="rub" for="qiwi_rub" class="btn-full"><span class="sel-span">Выбрать</span> QIWI, RUB</label>
                    <input style="display:none" type="radio" id="qiwi_rub" name="moneyadd" value="QIWI_rub"></input>
                </div>
            </div>

            <div class="new_depos">
                <div class="pm_logo">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <label data-cur="usd" for="perfectmoney" class="btn-full"><span class="sel-span">Выбрать</span> PerfectMoney</label>
                <input style="display:none" type="radio" id="perfectmoney" name="moneyadd" value="PerfectMoney"></input>
            </div>


            <div class="new_depos">
                <div class="nx_logo">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <label data-cur="usd" for="nixmoney" class="btn-full"><span class="sel-span">Выбрать</span> NIX Money</label>
                <input style="display:none" type="radio" id="nixmoney" name="moneyadd" value="NIXMoney"></input>
            </div>


            <div class="new_depos">
                <div class="pz_logo">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <label data-cur="usd" for="payza" class="btn-full"><span class="sel-span">Выбрать</span> Payza</label>
                <input style="display:none" type="radio" id="payza" name="moneyadd" value="Payza"></input>
            </div>


            <div class="new_depos">
                <div class="av_logo">Выберите эту платежную систему если Вы имеете средства на ней или создайте новый кошелек.</div>
                <label data-cur="usd" for="advcash" class="btn-full"><span class="sel-span">Выбрать</span> Advcash</label>
                <input style="display:none" type="radio" id="advcash" name="moneyadd" value="Advcash"></input>
            </div>
        </form>
    </div>

    <div class="oper-wrap">
        <h2>Расчет прибыли:</h2>

        <div class="now-perc">Cумма: <span></span><span class="sump"></span><span></span></div>
        <div class="now-perc">Доход в день: <span></span><span class="day"></span></div>
        <div class="now-perc">Доход в месяц: <span></span><span class="month"></span></div>
        <div class="now-perc">Доход за 3 месяца: <span></span><span class="3months"></span></div>
        <div class="now-perc">Доход за полгода: <span></span><span class="6months"></span></div>
        <div class="now-perc">Доход за год: <span></span><span class="year"></span></div>

    </div>
</div>