<?php

require_once('cpayeer.php');
$accountNumber = $payeer['out_acc'];
$apiId = $payeer['out_api_id'];
$apiKey = $payeer['out_api_key'];
$payeer = new CPayeer($accountNumber, $apiId, $apiKey);
if ($payeer->isAuth())
{
    $initOutput = $payeer->initOutput(array(
        'ps' => '1136053',
        //'sumIn' => 1,
        'curIn' => 'USD',
        'sumOut' => 1,
        'curOut' => 'USD',
        'param_ACCOUNT_NUMBER' => 'P30818941'
    ));

    if ($initOutput)
    {
        $historyId = $payeer->output();
        if ($historyId > 0)
        {
            echo "Выплата успешна";
        }
        else
        {
            echo '<pre>' . print_r($payeer->getErrors(), true) . '</pre>';
        }
    }
    else
    {
        echo '<pre>' . print_r($payeer->getErrors(), true) . '</pre>';
    }
}
else
{
    echo '<pre>' . print_r($payeer->getErrors(), true) . '</pre>';
}