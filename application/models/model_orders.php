<?php

class Model_Orders extends Model
{

    public function get_data($text)
    {
        $numposts = 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $uid = Session::get('id');
        $posts = intval($this->mysqli->query("SELECT COUNT(id) FROM hyip_orders")->fetchSingleRow()['COUNT(id)']);
        $total = intval(($posts - 1) / $numposts + 1);
        if (empty($page) or $page <= 0)
            $page = 1;
        if ($page > $total)
            $page = $total;
        $start = $page * $numposts - $numposts;

        $qcash = $this->mysqli->query("SELECT cash.id as id,cash.cash as cash, sys.name AS name FROM hyip_cash as cash "
                . "INNER JOIN hyip_orders AS ord ON (ord.cash_id=cash.id) "
                . "INNER JOIN hyip_payaccounts as acc ON (acc.id = cash.payaccount_id) "
                . "INNER JOIN hyip_paysystems as sys ON (sys.id = acc.paysystem_id) "
                . "WHERE user_id=$uid AND ord.operation = 0 AND ord.code=0")->fetchAll();
        $qouts = $this->mysqli->query("SELECT ord.id as id,ord.sum as sum,sys.name AS name FROM hyip_orders as ord "
                . "INNER JOIN hyip_cash as cash ON (cash.id = ord.cash_id) "
                . "INNER JOIN hyip_payaccounts as acc ON (acc.id = cash.payaccount_id) "
                . "INNER JOIN hyip_paysystems as sys ON (sys.id = acc.paysystem_id) "
                . "WHERE cash.user_id=$uid AND ord.operation = 1 AND ord.code=0")->fetchAll();
        $cash = 0;
        $outs = 0;
        $refs = $this->mysqli->query("SELECT percents FROM hyip_users WHERE id=$uid")->fetchSingleRow()['percents'];
        //sum of cash
        foreach ($qcash as $crow)
        {
            $mult = 1;

            if (stripos($crow['name'], 'RUB'))
            {
                $mult = GetExchangeRate();
            }
            $cash += ($crow['cash'] / $mult);
        }
        //sum of outs
        foreach ($qouts as $orow)
        {
            $mult = 1;
            if (stripos($orow['name'], 'RUB'))
            {
                $mult = GetExchangeRate();
            }
            $outs += ($orow['sum'] / $mult);
        }
        $cash = round($cash, 2);
        $cashmas = explode('.', (string) $cash);
        $outs = round($outs, 2);
        $outmas = explode('.', (string) $outs);
        $refs = round($refs, 2);
        $refmas = explode('.', (string) $refs);
        if (!isset($cashmas[1]))
            $cashmas[1] = 0;
        if (!isset($outmas[1]))
            $outmas[1] = 0;
        if (!isset($refmas[1]))
            $refmas[1] = 0;

        $data = array();

        $data['cash'] = $cashmas;
        $data['outs'] = $outmas;
        $data['refs'] = $refmas;
        $data['page'] = $page;
        $data['orders'] = array();
        $data['total'] = $total;
        if($start <0) $start=0;
        $operations = array($text['private_operation_in'], $text['private_operation_out']);
        $status = array($text['private_status_ok'], $text['private_status_wait']);
        $query = $this->mysqli->query("SELECT cash.id, ord.operation AS operation,ord.sum AS sum,ord.code "
                . "AS code,ord.date AS date,syst.name AS name FROM hyip_orders AS ord "
                . "INNER JOIN hyip_cash AS cash ON (ord.cash_id = cash.id) "
                . "INNER JOIN hyip_payaccounts AS acc ON (cash.payaccount_id=acc.id) "
                . "INNER JOIN hyip_paysystems AS syst ON (acc.paysystem_id=syst.id) "
                . "WHERE cash.user_id=$uid ORDER BY date DESC LIMIT $start,$numposts")->fetchAll();
        if($posts >=0)
        {
        foreach ($query as $row)
        {   if(isset($row['operation']) && isset($row['name']) && isset($row['code']))
        {
            $date = new DateTime($row['date']);
            $date = $date->format("d.m.y");
            $data['orders'][] = array(
                'operation' => $operations[$row['operation']],
                'sum' => $row['sum'],
                'paysystem' => $row['name'],
                'status' => $status[$row['code']],
                'date' => $date
            );
        }
        }
        }


        return $data;
    }

}
