<div class="container-fluid new-depos">
    <form action="" method="post" name="addcash">
        <div class="col-xs-12 devider">
            <div class="col-xs-4">
                <h4><?php echo $data['text']['newdeposit_sum'] ?></h4>
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <div class="row">
                <input class="input-depos" id="sum" name="sum" type="text" value="10">
                </div>
            </div>
        </div>
            <div class="col-xs-12" id="notice">
            <p>Введите значение от 10 до 10 000</p>
    </div>
         <div class="col-xs-12 calc-depos">
        <table class="calc_table">  
            <tr><td>Доход в день:</td><td class="day"></td></tr>
            <tr><td>Доход в месяц:</td><td class="month"></td></tr>
            <tr><td>Доход за 3 месяца:</td><td class="3months"></td></tr>
            <tr><td>Доход за полгода:</td><td class="6months"></td></tr>
            <tr><td>Доход за год:</td><td class="year"></td></tr>
        </table>
        </div>
        <div class="col-xs-12 devider">
            <div class="col-xs-4">
                <h4><?php echo $data['text']['newdeposit_addsystem'] ?></h4>
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <div class="row">
                <select name="moneyadd" class="select">
                    <?php foreach ($data['systems'] as $value): ?>
                        <option value=<?php echo str_replace(" ", "_", $value['name']); ?>><?php echo $value['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
        </div>
        <input class="btn_save pay" id="addcash" name= "addcash" type="submit" value="<?php echo $data['newdeposit'] ?>">

    </form>
</div>
</div>