<?php
$hash = md5($data['account']['secret_key']);
$my_callback_url = urlencode("https://itinvestproject.com/pay/success");

$url = "https://apibtc.com/api/create_wallet/?token={$data['account']['token']}&callback=" . $my_callback_url;
$f= fopen($url,'rb');
$out=array(); $out="";
while(!feof($f)) $out.=fgets($f);
fclose($f);
$res = json_decode($out, true);
$send = false;
var_dump($res);
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
