<?php
function GetExchangeRate()
{
    $qrate = $GLOBALS['mysqli']->query("SELECT dollar_rate FROM hyip_rate WHERE DATE(`date`) = CURDATE()");
    $rate = $qrate->fetch_assoc()['dollar_rate'];
    return $rate;
}