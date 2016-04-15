<div class="container-fluid new-depos">
    <form action="" method="post" name="addcash" class="add-depos-form">
        <div class="col-xs-12 devider">
            <div class="col-xs-4">
                <h4><?php echo $data['text']['newdeposit_addsystem'] ?></h4>
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <div class="row">
                <select name="moneyadd" class="select system-select">
                    <?php foreach($data['activeSystems'] as $system=>$isActive): ?>
                    <?php   
                    if($isActive){
                    ?>
                    <option value="<?php echo $system; ?>"><?php echo $system ?></option>
                        <?php } ?>
                    <?php endforeach ?>
                </select>
                </div>
            </div>
        </div>         
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

         <div class="col-xs-12 calc-depos">
        <table class="calc_table">  
            <tr><td><?php echo $data['text']['newdeposit_calc_day'] ;?>:</td><td class="day"></td></tr>
            <tr><td><?php echo $data['text']['newdeposit_calc_month'] ;?>:</td><td class="month"></td></tr>
            <tr><td><?php echo $data['text']['newdeposit_calc_3month'] ;?>:</td><td class="3months"></td></tr>
            <tr><td><?php echo $data['text']['newdeposit_calc_6month'] ;?>:</td><td class="6months"></td></tr>
            <tr><td><?php echo $data['text']['newdeposit_calc_year']; ?>:</td><td class="year"></td></tr>
        </table>
        </div>
        <div class="col-xs-12 alert-danger" id="notice" style='display:none'>
            <p class="">Введите значение от 10 до 10 000</p>
        </div>
        <input class="btn_save pay" id="addcash" name= "addcash" type="submit" value="<?php echo $data['newdeposit'] ?>">

    </form>
</div>
</div>