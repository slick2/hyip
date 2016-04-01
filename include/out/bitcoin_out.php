<?php
$f = fopen("https://apibtc.com/api/sendmoney/?token={$bitcoin['token']}&wallet=14cvwhw3CqDMEXivim8EvB146cdvhKBPat&amount=1",'rb');
$out=array(); $out="";
while(!feof($f)) $out.=fgets($f);
fclose($f);
// searching for hidden fields
  
var_dump(json_decode($out));