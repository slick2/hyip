<div class="container-fluid new-depos">
    <form action="" method="post" name="addcash">
        <div class="col-xs-12 devider">
            <div class="col-xs-4">
                <h4><?php echo $data['text']['newdeposit_sum'] ?></h4>
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <input class="input-depos" id="sum" name="sum" type="text" value="10">
            </div>
        </div>

        <div class="col-xs-12 devider">
            <div class="col-xs-4">
                <h4><?php echo $data['text']['newdeposit_addsystem'] ?></h4>
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <select name="moneyadd" class="select">
                    <?php foreach ($data['systems'] as $value): ?>
                        <option value=<?php echo str_replace(" ", "_", $value['name']); ?>><?php echo $value['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <input class="btn_save pay" id="addcash" name= "addcash" type="submit" value="<?php echo $data['newdeposit'] ?>">

    </form>
</div>

<div class="container-fluid new-depos">
    <h3>Расчет прибыли</h3>
    <div class="col-xs-6">
        <h4>Диапазон:</h4>
        <input type="range" min="10" max="10000" step="1" id="range" value="10">
    </div>
    <div class="col-xs-6">
        <h4>Ручной ввод:</h4>
        <i class="mk-icon-dollar" style="padding-right: 5px; color: #fda600;"></i><input class="input" id="sum_calc" name="sum" type="text" placeholder="ВВЕДИТЕ СУММУ" style="width:97%;">
    </div>
    <div class="col-xs-12" id="notice">
            <p>Введите значение от 10 до 10 000</p>
    </div>
    <div class="col-xs-12"
         <div style="height:auto; width:100%;">
            <div style="height:auto;"><button class="pay" id="btn_calc">Рассчитать</button></div>
        </div>
         <div class="col-xs-12 calc-depos">
        <table class="calc_table">
            <tr><td>Cумма:</td><td class="sump"></td></tr>
            <tr><td>Доход в день:</td><td class="day"></td></tr>
            <tr><td>Доход в месяц:</td><td class="month"></td></tr>
            <tr><td>Доход за 3 месяца:</td><td class="3months"></td></tr>
            <tr><td>Доход за полгода:</td><td class="6months"></td></tr>
            <tr><td>Доход за год:</td><td class="year"></td></tr>
        </table>
        </div>
    </div>
</div>