<?php
require_once './application/helpers/Database.php';
require_once 'out_functions.php';
$mysqli_local = Database::getInstance();
$percents = $mysqli_local->query("SELECT amount FROM hyip_percents WHERE name='business_day' OR name='holiday'")->fetchAll();
$perc_bus = (double)$percents[0]['amount'];
$perc_hol = (double)$percents[1]['amount'];
$payeer = $mysqli_local->query("SELECT out_acc,out_api_id,out_api_key FROM hyip_payeer WHERE active=1")->fetchSingleRow();
$perfectmoney = $mysqli_local->query("SELECT out_id,out_pass FROM hyip_perfectmoney WHERE active=1")->fetchSingleRow();
$advcash = $mysqli_local->query("SELECT in_acc,out_api_name,out_key FROM hyip_advcash WHERE active=1")->fetchSingleRow();
$bitcoin = $mysqli_local->query("SELECT token,secret_key FROM hyip_bitcoin WHERE active=1")->fetchSingleRow();
$holidays = array(0, 6);
$message = "";
$percent = in_array(date("w", strtotime("today")), $holidays) ? $perc_hol : $perc_bus;
$qcash = $mysqli_local->query("select hc.created as created, hc.id as id, hc.cash*$percent as cash, hu.email as email, acc.account as account, hsys.name as name 
from  hyip_payaccounts hp 
inner join hyip_cash hc ON (hc.payaccount_id=hp.id)
inner join hyip_users hu ON (hc.user_id=hu.id)
inner join hyip_payaccounts acc ON (acc.id=hc.payaccount_id)
inner join hyip_paysystems hsys ON (hsys.id=acc.paysystem_id)
where acc.account is not null and DATE(hc.created) != CURDATE()  LIMIT 1000")->fetchAll();
foreach ($qcash as $row) 
{
    $sum = $row['cash'] * $percent;
    if ($row['account'] != NULL) 
    {
        $func = "out_".strtolower($row['name']);
        $func();
        
        $mysqli_local->query('START TRANSACTION;');
        $mysqli_local->query("UPDATE hyip_cash SET outs=outs+1 WHERE id={$row['id']}");
        $mysqli_local->query("INSERT INTO hyip_orders (cash_id,operation,`sum`,code) VALUES (" . $row['id'] . ",1,$sum,0)");
        $mysqli_local->query('COMMIT');
        $message .= "Вывод суммы: $sum \n";
        $message .= "Пользователю: " . $row['email'] . "\n";
        $message .= "На кошелек: " . $row['name'] . " " . $row['account'] . "\n";
    }
}
echo str_replace("\n", "<br>", $message);
//mail('dezalator@gmail.com',"Вывод денег",$message);