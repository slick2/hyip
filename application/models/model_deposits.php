<?php

class Model_Deposits extends Model
{
    public function get_paysystems()
    {
        $mysqli = Database::getInstance();
        $names = $mysqli->query("SELECT name FROM hyip_paysystems")->fetchAll();
        return $names;
    }


    public function add_deposit()
    {
        $mysqli = Database::getInstance();
        $uid = Session::get('id');
        
        $sum = (float) $mysqli->quote($_POST['sum']);
        $system = str_replace('_',' ',$mysqli->quote($_POST['moneyadd']));

        
        $query = $mysqli->query("SELECT systems.id AS id FROM hyip_paysystems AS systems
INNER JOIN hyip_payaccounts AS  accounts ON (systems.id=accounts.paysystem_id)
INNER JOIN hyip_cash AS cash ON (accounts.id=cash.payaccount_id)
WHERE cash.user_id = $uid AND systems.name = '{$system}'")->fetchNumRows();
        if ($query == 0)
        {
            $cid = $mysqli->query("INSERT INTO hyip_payaccounts (paysystem_id) SELECT id FROM hyip_paysystems WHERE name='{$system}'")->result->insert_id;
        }
        else
        {
            $cid = $mysqli->query("SELECT hp.id AS id "
                    . "FROM hyip_payaccounts as hp "
                    . "INNER JOIN hyip_cash AS hc ON (hp.id=hc.payaccount_id) "
                    . "INNER JOIN hyip_paysystems AS hsys ON (hp.paysystem_id = hsys.id) "
                    . "WHERE hsys.name = '{$system}' AND hc.user_id=$uid LIMIT 1")->fetchSingleRow()['id'];
        }
        $qr = $mysqli->query("INSERT INTO hyip_cash (user_id,payaccount_id,cash,outs) VALUES ($uid,$cid,$sum,0)");

        $addorder = $mysqli->query("INSERT INTO hyip_orders (cash_id,operation,sum,code) VALUES ({$mysqli->getInsertId()},0,$sum,1)");

        $qparent = $mysqli->query("SELECT parent_id FROM hyip_users WHERE id=$uid AND parent_id IS NOT NULL")->fetchNumRows();
        if ($qparent != 0)
        {
            $parent = $mysqli->query("SELECT parent_id FROM hyip_users WHERE id=$uid AND parent_id IS NOT NULL")->fetchAll()['parent_id'];
            $percent = $sum * REFERRAL_PERCENT;
            if (stripos($system, 'RUB') === false)
            {
                $percent = $percent / GetExchangeRate();
            }
            $percent = round($percent, 2);
            $q = $mysqli->query("UPDATE hyip_users SET percents=percents+$percent WHERE id=$parent");
        }
        $ref = strtolower($args[0]);
        return array(
            'syst' => $args[0],
            'sum' => $sum,
            'ref' => $ref,
            'orderid'=> $mysqli->getInsertId()
        );
    }

    public function get_deposit()
    {
        $mysqli = Database::getInstance();
        $uid = Session::get('id');
        $first = $mysqli->query("SELECT id,user_id,payaccount_id,cash,created,outs FROM hyip_cash WHERE user_id=$uid ORDER BY created DESC")->fetchSingleRow();
        $depname = "Последний депозит";
        if (isset($_GET['id']))
        {
            $gid = intval($_GET['id']);
            $first = $mysqli->query("SELECT payaccount_id,created,cash,outs,id FROM hyip_cash WHERE id=$gid")->fetchSingleRow();
            $depname = "Выбранный депозит";
        }

        $paid = $first['payaccount_id'];
        $acc = $mysqli->query("SELECT paysystem_id FROM hyip_payaccounts WHERE id=$paid")->fetchSingleRow();
        $psid = $acc["paysystem_id"];
        $syst = $mysqli->query("SELECT name FROM hyip_paysystems WHERE id=$psid")->fetchSingleRow();
        $lastpaid = (strtotime("now") < strtotime("today 12:00")) ? date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d') - 1, date('y'))) : date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d'), date('y')));
        $nextpaid = (strtotime("now") < strtotime("today 12:00")) ? date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d'), date('y'))) : date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d') + 1, date('y')));
        if ($first['outs'] === '0')
        {
            $lastpaid = "Еще не было";
        }

        $date = new DateTime($first['created']);
        $date = $date->format("d.m.y");
        $biz = $first['cash'] * BUSINESS_PERCENT;
        $nobiz = $first['cash'] * HOLIDAY_PERCENT;
        $prib = 0;
        $qprib = $mysqli->query("SELECT sum FROM hyip_orders WHERE operation=1 AND cash_id=" . $first['id'] . "")->fetchAll();
        foreach ($qprib as $row)
        {
            $prib += $row['sum'];
        }

        return array(
            'depname' => $depname,
            'created' => $first['created'],
            'outs' => $first['outs'],
            'nextpaid' => $nextpaid,
            'lastpaid' => $lastpaid,
            'biz' => $biz,
            'nobiz' => $nobiz,
            'prib' => $prib,
            'cash' => $first['cash'],
        );
    }

    public function get_pager($numposts)
    {
        $mysqli = Database::getInstance();
        $data = array();

        $posts = $mysqli->query("SELECT COUNT(id) FROM hyip_orders")->fetchSingleRow()['COUNT(id)'];
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $total = intval(($posts - 1) / $numposts) + 1;
        if (empty($page) or $page < 0)
            $page = 1;
        if ($page > $total)
            $page = $total;
        $start = $page * $numposts - $numposts;

        $data['page'] = $page;
        $data['start'] = $start;
        $data['total'] = $total;

        return $data;
    }

    public function get_all_deposits()
    {
        $mysqli = Database::getInstance();
        $data = array();
        $numposts = 10;

        $posts = $mysqli->query("SELECT COUNT(id) FROM hyip_cash")->fetchSingleRow()['COUNT(id)'];
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $total = intval(($posts - 1) / $numposts) + 1;
        if (empty($page) or $page < 0)
            $page = 1;
        if ($page > $total)
            $page = $total;
        $start = $page * $numposts - $numposts;

        $uid = Session::get('id');
        $query = $mysqli->query("SELECT sys.name AS name,cash.created AS created,cash.cash AS cash,cash.outs AS outs,cash.id AS id FROM hyip_cash AS cash "
                . "INNER JOIN hyip_payaccounts AS acc ON (cash.payaccount_id = acc.id)"
                . "INNER JOIN hyip_paysystems AS sys ON(acc.paysystem_id = sys.id)"
                . "WHERE cash.user_id=$uid ORDER BY created DESC LIMIT $start,$numposts")->fetchAll();

        foreach ($query as $row)
        {

            $lastpaid = (strtotime("now") < strtotime("today 12:00")) ? date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d') - 1, date('y'))) : date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d'), date('y')));
            $nextpaid = (strtotime("now") < strtotime("today 12:00")) ? date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d'), date('y'))) : date("h:i,d.m.y", mktime(12, 0, 0, date('m'), date('d') + 1, date('y')));
            if ($row['outs'] === '0')
            {
                $lastpaid = "Еще не было";
            }

            $date = new DateTime($row['created']);
            $date = $date->format("d.m.y");
            $data[] = array(
                'date' => $date,
                'pname' => $row['name'],
                'cash' => $row['cash'],
                'outs' => $row['outs'],
                'lastpaid' => $lastpaid,
                'nextpaid' => $nextpaid,
                'id' => $row['id']
            );
        }

        return $data;
    }

}