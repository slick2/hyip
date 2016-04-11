<?php
$wallet = '1K2mA7WXLNihRm8GzQJYFApoFeH1bctxBx';
$token = '4b88661478c1d8fc26aa8294cf8938a7cba649f5012a1eb2b778d7dd2d29c2f9';
$hash = md5($data['account']['secret_key']);
$my_callback_url = urlencode("https://itinvestproject.com/pay/success");
$context = stream_context_create(array('http' => array('header' => 'Connection: close\r\n')));

$url = "https://apibtc.com/api/create_wallet/?token={$token}&callback=" . $my_callback_url;
//$e = file_get_contents($url, false, $context);
//var_dump($url);
$f= fopen($url,'rb');
$out=array(); $out="";
while(!feof($f)) $out.=fgets($f);
fclose($f);
$res = json_decode($out, true);
//var_dump($res);
$send = false;
if ($res["success"])
{
    $sign = md5($res["Res"]["Adress"] . $data['account']['secret_key']);
    if ($sign == $res["Res"]["Sign"])
    {
        $send = true;
    }
}
?>
<?php
if ($send):
    ?>
    <form action="https://apibtc.com/merchant/invoice/?wallet=<?php echo $res['Res']['Adress'];?>" method="POST">
        <input type="hidden" name="amount" value="<?php echo $data['all']['sum']; ?>">
        <input type="hidden" name="return_user" value="https://itinvestproject.com/pay/success">
        <input type="submit" value="Перейти на мерчант">
    </form>
<?php endif; ?>
