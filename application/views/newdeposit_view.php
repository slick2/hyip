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
        <input class="btn_save pay" id="addcash" name= "addcash" type="submit" value="<?php echo $data['newdeposit']?>">

    </form>
</div>

<div class="container-fluid new-depos">
    
</div>