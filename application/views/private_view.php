<div class="right-wrap">
    <div class="balance-wrap">

        <h2>Кабинет</h2>

        <div class="bb-box">
            <div class="title-bb">Здесь отображена сумма средств, которые вы положили на депозит:</div>
            <div class="ri-bb"><a class="btn-priv" href="addmoney">Создать депозит</a></div>
            <div class="bal-bb"><?php echo $data['cash'][0] . "."; ?><small><?php echo $data['cash'][1]; ?> $ </small><br> <span>инвестировано средств</span></div>
        </div>
        <div class="bb-box">
            <div class="title-bb">Здесь отображена сумма средств, которые вы вывели на свой кошелек из системы:</div>
            <div class="ri-bb"><span></span></div>
            <div class="bal-bb"><?php echo $data['outs'][0] . "."; ?><small><?php echo $data['outs'][1]; ?> $</small><br><span>выведено средств</span></div>
        </div>
        <div class="bb-box">
            <div class="title-bb">Здесь отображена сумма средств, которые вы получили за приведенных рефералов:</div>
            <div class="ri-bbb"><a class="btn-obn" href="change">Вывести средства</a></div>
            <div class="bal-bb"><?php echo $data['refs'][0] . "."; ?><small><?php echo $data['refs'][1]; ?> $</small><br><span>реферальный бонус</span></div>
        </div>

    </div>
</div>
