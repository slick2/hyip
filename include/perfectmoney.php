<form action="https://perfectmoney.is/api/step1.asp" method="POST">
<p>
    <input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $data['account']['in_acc']; ?>">
    <input type="hidden" name="PAYEE_NAME" value="<?php echo $data['account']['in_name']; ?>">
    <input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $data['all']['sum']; ?>">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="PAYMENT_URL"
        value="http://pa.itinvestproject.com/pay/success">
    <input type="hidden" name="NOPAYMENT_URL"
        value="http://pa.itinvestproject.com/pay/fail">
    <input type="submit" class="pay" name="PAYMENT_METHOD" value="PerfectMoney account">
</p>
</form>
