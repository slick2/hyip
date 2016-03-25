<div class="container-fluid new-depos">
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
            <select class="select">
                <?php foreach($data as $value): ?>
                <option><?php echo $value['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>




    <input class="btn_save pay" id="addcash" name= "adddcash" type="submit" value="Создать депозит">


</div>