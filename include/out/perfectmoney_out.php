<?php
$f=fopen("https://perfectmoney.is/acct/confirm.asp?AccountID={$perfectmoney['out_id']}&PassPhrase={$perfectmoney['out_pass']}&Payer_Account={$perfectmoney['in_acc']}&Payee_Account=U11720744&Amount=1&PAY_IN=1&PAYMENT_ID=1223", 'rb');

if($f===false){
   echo 'error openning url';
}

// getting data
$out=array(); $out="";
while(!feof($f)) $out.=fgets($f);

fclose($f);

// searching for hidden fields
if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)){
   echo 'Ivalid output';
   exit;
}

$ar="";
foreach($result as $item){
   $key=$item[1];
   $ar[$key]=$item[2];
}

echo '<pre>';
print_r($ar);
echo '</pre>';
