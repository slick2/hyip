<form action="https://perfectmoney.is/api/step1.asp" method="POST">
<p>
    <input type="hidden" name="PAYEE_ACCOUNT" value="U11720744">
    <input type="hidden" name="PAYEE_NAME" value="IT Invest Project">
    <input type="hidden" name="PAYMENT_AMOUNT" value=<?php echo $_POST['sum']; ?>
    <input type="hidden" name="PAYMENT_UNITS" value=<?php echo $args[1]; ?>>
    <input type="hidden" name="PAYMENT_URL"
        value="http://pa.itinvestproject.com/success.php">
    <input type="hidden" name="NOPAYMENT_URL"
        value="http://pa.itinvestproject.com/fail.php">
    <input type="submit" name="PAYMENT_METHOD" value="PerfectMoney account">
</p>
</form>
