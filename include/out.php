<?php

require_once("include/connect.php");
require_once("include/globals.php");
include("include/header.php");
$holidays = array(0, 6);
$message = "";
$percent = in_array(date("w", strtotime("today")), $holidays) ? HOLIDAY_PERCENT : BUSINESS_PERCENT;
$qcash = $mysqli->query("SELECT id,cash*$percent AS cash FROM hyip_cash");
while ($row = $qcash->fetch_assoc()) 
{
    $sum = $row['cash'] * $percent;
    $sqlcur = " select hp.currency as currency, hu.email as email, acc.account as account, hsys.name as name from  hyip_payaccounts hp 
inner join hyip_cash hc ON (hc.payaccount_id=hp.id)
inner join hyip_users hu ON (hc.user_id=hu.id)
inner join hyip_payaccounts acc ON (acc.id=hc.payaccount_id)
inner join hyip_paysystems hsys ON (hsys.id=acc.paysystem_id)
where acc.account is not null AND hc.id={$row['id']}";

    $data = $mysqli->query($sqlcur)->fetch_assoc();
    if ($data['account'] != NULL) 
    {
        $mysqli->query('START TRANSACTION;');
        $mysqli->query("UPDATE hyip_cash SET outs=outs+1 WHERE id='" . $row['id'] . "'");
        $mysqli->query("INSERT INTO hyip_orders (cash_id,operation,`sum`,code) VALUES (" . $row['id'] . ",1,$sum,0)");
        $mysqli->query('COMMIT');
        $message .= "Вывод суммы: " . $sum . " " . strtoupper($data['currency']) . "\n";
        $message .= "Пользователю: " . $data['email'] . "\n";
        $message .= "На кошелек: " . $data['name'] . " " . $data['account'] . "\n";
    }
}
echo str_replace("\n", "<br>", $message);
//mail('dezalator@gmail.com',"Вывод денег",$message);