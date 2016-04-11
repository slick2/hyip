<form method="GET" action="https://wallet.advcash.com/sci/">
         <input type="hidden" name="ac_account_email" value="<?php echo $data['account']['in_acc']; ?>" />
         <input type="hidden" name="ac_sci_name" value="<?php echo $data['account']['in_name']; ?>" />
         <input type="hidden" name="ac_amount" value="<?php echo $data['all']['sum'];?>" />
         <input type="hidden" name="ac_currency" value="USD" />
         <input type="hidden" name="ac_order_id" value="<?php echo $data['all']['orderid'];?>" />
         <input type="hidden" name="ac_sign" value="<?php echo $data['account']['in_sign']; ?>" />
         <!-- Optional Fields -->
         <input type="hidden" name="ac_success_url" value="http://pa.itinvestproject.com/pay/success.php" />
         <input type="hidden" name="ac_success_url_method" value="GET" />
         <input type="hidden" name="ac_fail_url" value="http://pa.itinvestproject.com/pay/fail.php" />
         <input type="hidden" name="ac_fail_url_method" value="GET" />

         <input type="submit" class="pay" value="Отправить"/>
</form>