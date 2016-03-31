<form method="post" action="https://wallet.advcash.com/sci/">
         <input type="hidden" name="ac_account_email" value="nosra787@gmail.com" />
         <input type="hidden" name="ac_sci_name" value="IT Invest Project" />
         <input type="text" name="ac_amount" value="<?php echo $data['all']['sum'];?>" />
         <input type="text" name="ac_currency" value="USD" />
         <input type="text" name="ac_order_id" value="<?php echo $data['all']['orderid'];?>" />
         <input type="text" name="ac_sign" value="e9dd6f1d4927fbbad1c3590df8fd1b5459d98567e2edb75a5e3b048e893982c4" />
         <!-- Optional Fields -->
         <input type="hidden" name="ac_success_url" value="http://pa.itinvestproject.com/out/success.php" />
         <input type="hidden" name="ac_success_url_method" value="GET" />
         <input type="hidden" name="ac_fail_url" value="http://pa.itinvestproject.com/out/fail.php" />
         <input type="hidden" name="ac_fail_url_method" value="GET" />
         <input type="submit" />
</form>