<form action="https://perfectmoney.is/api/step1.asp" method="POST">
<p>
    <input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $data['account']['in_acc']; ?>">
    <input type="hidden" name="PAYEE_NAME" value="<?php echo $data['account']['in_name']; ?>">
    <input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $data['all']['sum']; ?>">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="PAYMENT_URL" value="https://pa.itinvestproject.com/pay/syidsjhxtas">
    <input type="hidden" name="NOPAYMENT_URL" value="https://pa.itinvestproject.com/pay/fqh4k981rlb">
    <input type="submit" class="pay" name="PAYMENT_METHOD" value="Оплатить">
</p>
</form>


