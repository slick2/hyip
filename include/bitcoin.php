<?php
$hash = md5($data['account']['secret_key']);
$my_callback_url = urlencode("https://itinvestproject.com/pay/success");

$url = "https://apibtc.com/api/create_wallet/?token={$data['account']}&callback=".$my_callback_url;
$json = $this->get_curl($url);
$res = json_decode($json, true);
if($res["success"]){
	$sign = md5($res["Res"]["Adress"].$this->config["Access_Key"]);
	if($sign == $res["Res"]["Sign"]){
		//Отправить форму
		// $res["Res"]["Adress"] - Кошелек на который пользователь должен перевести деньги 
	}
}
?>
<form action="https://apibtc.com/merchant/invoice/?wallet=КОШЕЛЕК" method="POST">
	<input type="hidden" name="amount" value="<?php echo $data['sum']; ?>">
	<input type="hidden" name="return_user" value="https://itinvestproject.com/pay/success">
	<input type="submit" value="Перейти на мерчант">
</form>