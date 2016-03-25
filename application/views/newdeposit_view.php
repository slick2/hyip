<div class="container-fluid new-depos">
    <form action="" method="post" name="addcash">
        <div class="col-xs-12 devider">
            <div class="col-xs-4">
                <h4>Сумма депозита</h4>
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <input class="input-depos" id="sum" name="sum" type="text" value="10">
            </div>
        </div>

        <div class="col-xs-12 devider">
            <div class="col-xs-4">
                <h4>Выберите систему</h4>
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <select name="moneyadd" class="select">
                    <?php foreach ($data['systems'] as $value): ?>
                    <option value=<?php echo str_replace(" ", "_", $value['name']); ?>><?php echo $value['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <input class="btn_save pay" id="addcash" name= "addcash" type="submit" value="Создать депозит">

    </form>
</div>