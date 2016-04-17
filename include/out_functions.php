<?php

require_once('out/cpayeer.php');
require_once("out/MerchantWebService.php");

function out_money($system, $bitcoin, $advcash, $payeer, $perfectmoney, $row,$sum)
{
    switch ($system)
    {
        case 'payeer':
            $operationSuccess = false;
            $accountNumber = $payeer['out_acc'];
            $apiId = $payeer['out_api_id'];
            $apiKey = $payeer['out_api_key'];
            $payeer_class = new CPayeer($accountNumber, $apiId, $apiKey);
            if ($payeer_class->isAuth())
            {
                $initOutput = $payeer_class->initOutput(array(
                    'ps' => '1136053',
                    //'sumIn' => 1,
                    'curIn' => 'USD',
                    'sumOut' => $sum,
                    'curOut' => 'USD',
                    'param_ACCOUNT_NUMBER' => "{$row['account']}"
                ));

                if ($initOutput)
                {
                    $historyId = $payeer_class->output();
                    if ($historyId > 0)
                    {
                        $code = 0;
                        echo "Выплата успешна";
                        $operationSuccess = true;
                    }
                    else
                    {
                        echo '<pre>' . print_r($payeer_class->getErrors(), true) . '</pre>';
                    }
                }
                else
                {
                    echo '<pre>' . print_r($payeer_class->getErrors(), true) . '</pre>';
                }
            }
            else
            {
                echo '<pre>' . print_r($payeer_class->getErrors(), true) . '</pre>';
            }
            break;
        case 'perfectmoney':
            $operationSuccess = false;
            $f = fopen("https://perfectmoney.is/acct/confirm.asp?AccountID={$perfectmoney['out_id']}&PassPhrase={$perfectmoney['out_pass']}&Payer_Account={$perfectmoney['in_acc']}&Payee_Account={$row['account']}&Amount=$sum&PAY_IN=1&PAYMENT_ID={$row['id']}", 'rb');

            if ($f === false)
            {
                echo 'error openning url';
            }

// getting data
            $out = array();
            $out = "";
            while (!feof($f))
                $out.=fgets($f);

            fclose($f);

// searching for hidden fields
            if (!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER))
            {
                echo 'Ivalid output';
                return false;
            }
            $code = 0;
            $ar = "";
            foreach ($result as $item)
            {
                if(strtolower($item[1]) == 'error' )
                    $code = 1;
                $key = $item[1];
                $ar[$key] = $item[2];
            }
            $code = 0;
            echo '<pre>';
            print_r($ar);
            $operationSuccess = true;
            echo '</pre>';
            break;
        case 'advcash':
            $operationSuccess =false;
            $merchantWebService = new MerchantWebService();

            $arg0 = new authDTO();
            $arg0->apiName = $advcash['out_api_name'];
            $arg0->accountEmail = $advcash['in_acc'];
            $arg0->authenticationToken = $merchantWebService->getAuthenticationToken("{$advcash['out_api_name']}");

            $arg1 = new sendMoneyRequest();
            $arg1->amount = $sum;
            $arg1->currency = "USD";
            $arg1->email = "{$row['account']}";
            $arg1->note = "Payment for deposit in ITInvestProject";
            $arg1->savePaymentTemplate = false;

            $validationSendMoney = new validationSendMoney();
            $validationSendMoney->arg0 = $arg0;
            $validationSendMoney->arg1 = $arg1;

            $sendMoney = new sendMoney();
            $sendMoney->arg0 = $arg0;
            $sendMoney->arg1 = $arg1;

            try
            {
                $merchantWebService->validationSendMoney($validationSendMoney);
                $sendMoneyResponse = $merchantWebService->sendMoney($sendMoney);

                echo print_r($sendMoneyResponse, true) . "<br/><br/>";
                echo $sendMoneyResponse->return . "<br/><br/>";
                $code = 0;
                $operationSuccess = true;
            }
            catch (Exception $e)
            {
                echo "ERROR MESSAGE => " . $e->getMessage() . "<br/>";
                echo $e->getTraceAsString();
            }
            echo 'temporary unavailable';
            break;
        case 'bitcoin':
            $operationSuccess = false;
            $f = fopen("https://apibtc.com/api/sendmoney/?token={$bitcoin['token']}&wallet={$row['account']}&amount=$sum", 'rb');
            $out = array();
            $out = "";
            while (!feof($f))
                $out.=fgets($f);
            fclose($f);
// searching for hidden fields
            $res = json_decode($out,true);
            $code = !$res["success"];
            var_dump($res);
            $operationSuccess = !!$res["success"];
            break;
    }
    return $operationSuccess;
}
