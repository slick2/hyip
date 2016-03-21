<?php

class Model_Orders extends Model
{

    public function get_data()
    {
        $mysqli = Database::getInstance();
        $numposts = 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $uid = Session::get('id');
        $posts = intval($mysqli->query("SELECT COUNT(id) FROM hyip_orders")->fetchSingleRow()['COUNT(id)']);
        $total = ($posts - 1) / $numposts + 1;
        if (empty($page) or $page < 0)
            $page = 1;
        if ($page > $total)
            $page = $total;
        $start = $page * $numposts - $numposts;

        $qcash = $mysqli->query("SELECT id,cash FROM hyip_cash WHERE user_id=$uid")->fetchAll();
        $qouts = $mysqli->query("SELECT id,sum FROM hyip_orders WHERE cash_id IN (SELECT id FROM hyip_cash WHERE user_id=$uid) AND operation=1 AND code=0")->fetchAll();
        $cash = 0;
        $outs = 0;
        $refs = $mysqli->query("SELECT percents FROM hyip_users WHERE id=$uid")->fetchSingleRow()['percents'];
        //sum of cash
        foreach ($qcash as $crow)
        {
            $mult = 1;

            $cur = $mysqli->query("SELECT currency FROM hyip_payaccounts WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE id={$crow['id']} )")->fetchSingleRow()['currency'];
            if (strcasecmp($cur, 'USD') != 0)
            {
                $mult = GetExchangeRate();
            }
            $cash += ($crow['cash'] / $mult);
        }
        //sum of outs
        foreach ($qouts as $orow)
        {
            $tcur = $mysqli->query("SELECT currency FROM hyip_payaccounts WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE id IN ( SELECT cash_id FROM hyip_orders WHERE id= {$orow['id']} ))")->fetchSingleRow()['currency'];
            $mult = 1;
            if (strcasecmp($tcur, 'USD') != 0)
            {
                $mult = GetExchangeRate();
            }
            $outs += ((int)$orow['sum'] / $mult);
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

        $operations = array('Пополнение', 'Вывод');
        $status = array('Выполнено', 'Ожидается');
        $query = $mysqli->query("SELECT operation,sum,code,cash_id,date FROM hyip_orders WHERE cash_id IN (SELECT id FROM hyip_cash WHERE user_id=$uid) ORDER BY date DESC LIMIT $start,$numposts")->fetchAll();
        
        foreach ($query as $row)
        {
            $qpsname = $mysqli->query("SELECT name FROM hyip_paysystems WHERE id IN (SELECT paysystem_id FROM hyip_payaccounts WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE id={$row['cash_id']}))");
            $psname = $qpsname->fetch_assoc()['name'];
            $date = new DateTime($row['date']);
            $date = $date->format("d.m.y");
            $data['orders'][] = array(
                'operation' => $operations[$row['operation']],
                'sum' => $row['sum'],
                'paysystem' => $psname,
                'status' => $status[$row['code']],
                'date' => $date
            );
        }


        return $data;
    }

}
