<?php
$m_shop = '144310282';
$m_orderid = $data['all']['orderid'];
$m_amount = number_format($data['all']['sum'], 2, '.', '');
$m_curr = 'USD';
$m_desc = base64_encode('Pay for itinvestproject.com');
$m_key = 'URIqne6w0NXbg9GI';

$arHash = array(
	$m_shop,
	$m_orderid,
	$m_amount,
	$m_curr,
	$m_desc,
	$m_key
);
$sign = strtoupper(hash('sha256', implode(':', $arHash)));
?>
<form method="GET" action="https://payeer.com/merchant/">
<input type="hidden" name="m_shop" value="<?php echo $m_shop?>">
<input type="hidden" name="m_orderid" value="<?php echo $m_orderid?>">
<input type="hidden" name="m_amount" value="<?php echo $m_amount?>">
<input type="hidden" name="m_curr" value="<?php echo $m_curr?>">
<input type="hidden" name="m_desc" value="<?php echo $m_desc?>">
<input type="hidden" name="m_sign" value="<?php echo $sign?>">
<!--
<input type="hidden" name="form[ps]" value="2609">
<input type="hidden" name="form[curr[2609]]" value="USD">
-->
<input type="submit" name="m_process" value="send" />
</form>
