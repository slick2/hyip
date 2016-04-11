<style>
    body{
        color:#433d60;
    }

    .calc_table td{
        border-bottom: 1px dashed #5495c6;
    }

    .input-depos{
        height: 35px;
        border-color: #433d60;
        color: #5495c6;
    }

    .input-depos:focus{
        border-color:#5495c6;
    }

    select{
        height: 35px !important;
        border-color: #433d60 !important;
        color: #5495c6 !important;
    }
</style>
<div class="container-fluid">
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
            <tr><td>Доход в день:</td><td class="day"></td></tr>
            <tr><td>Доход в месяц:</td><td class="month"></td></tr>
            <tr><td>Доход за 3 месяца:</td><td class="3months"></td></tr>
            <tr><td>Доход за полгода:</td><td class="6months"></td></tr>
            <tr><td>Доход за год:</td><td class="year"></td></tr>
        </table>
        </div>
        <div class="col-xs-12 alert-danger" id="notice">
            <p class="">Введите значение от 10 до 10 000</p>
        </div>      

    </form>
</div>
</div>