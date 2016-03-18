<?php

class Model_Deposits extends Model
{

    public function add_deposit()
    {
        $mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');
        $qq = $mysqli->query("SELECT name FROM hyip_paysystems");
        
        $sum = (float) $mysqli->real_escape_string($_POST['sum']);
        $args = explode("_", $mysqli->real_escape_string($_POST['moneyadd']));
        $cur = isset($args[1]) ? strtoupper($args[1]) : "RUB";
        $query = $mysqli->query("SELECT systems.id AS id FROM hyip_paysystems AS systems
INNER JOIN hyip_payaccounts AS  accounts ON (systems.id=accounts.paysystem_id)
INNER JOIN hyip_cash AS cash ON (accounts.id=cash.payaccount_id)
WHERE cash.user_id = $uid AND accounts.currency='$cur' AND systems.name = '" . $args[0] . "'");


        $syst = $query->fetch_assoc();
        if ($query->num_rows == 0)
        {
            $qqr = $mysqli->query("INSERT INTO hyip_payaccounts (paysystem_id,currency) SELECT id,'$cur' FROM hyip_paysystems WHERE name='" . $args[0] . "'");
            $cid = $mysqli->insert_id;
        }
        else
        {
            $qqr = $mysqli->query("SELECT hp.id AS id "
                    . "FROM hyip_payaccounts as hp "
                    . "INNER JOIN hyip_cash AS hc ON (hp.id=hc.payaccount_id) "
                    . "INNER JOIN hyip_paysystems AS hsys ON (hp.paysystem_id = hsys.id) "
                    . "WHERE hsys.name = '" . $args[0] . "' AND hp.currency='$cur' AND hc.user_id=$uid LIMIT 1");
            
            $cid = $qqr->fetch_assoc()['id'];
        }

        $qr = $mysqli->query("INSERT INTO hyip_cash (user_id,payaccount_id,cash,outs) VALUES ($uid,$cid,$sum,0)");
        $qsysid = $mysqli->query("SELECT id FROM hyip_paysystems WHERE name='" . $args[0] . "'");
        $sysid = $qsysid->fetch_assoc()['id'];
        $addorder = $mysqli->query("INSERT INTO hyip_orders (cash_id,operation,sum,code) VALUES (" . $mysqli->insert_id . ",0,$sum,0)");

        $qparent = $mysql->query("SELECT parent_id FROM hyip_users WHERE id=$uid AND parent_id IS NOT NULL");
        if ($qparent->num_rows != 0)
        {
            $parent = $qparent->fetch_assoc()['parent_id'];
            $percent = $_POST['sum'] * REFERRAL_PERCENT;
            if (strcasecmp($args[1], 'rub') == 0)
            {
                $percent = $percent / GetExchangeRate();
            }
            $percent = round($percent, 2);
            $q = $mysqli->query("UPDATE hyip_users SET percents=percents+$percent WHERE id=$parent");
        }
        $ref = strtolower($args[0]);
        return array(
            'syst' => $args[0],
            'sum' => $_POST['sum'],
            'currency' => $args[1],
            'ref' => $ref
        );
    }

    public function get_deposit()
    {
        $mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');
        $query1 = $mysqli->query("SELECT id,user_id,payaccount_id,cash,created,outs FROM hyip_cash WHERE user_id=$uid ORDER BY created DESC");
        $first = $query1->fetch_assoc();
        $depname = "Последний депозит";
        if (isset($_GET['id']))
        {
            $qfirst = $mysqli->query("SELECT * FROM hyip_cash WHERE id='" . (int) $_GET['id'] . "'");
            $first = $qfirst->fetch_assoc();
            $depname = "Выбранный депозит";
        }

        $paid = $first['payaccount_id'];
        $qq = $mysqli->query("SELECT paysystem_id,currency FROM hyip_payaccounts WHERE id=$paid");
        $acc = $qq->fetch_assoc();
        $psid = $acc["paysystem_id"];
        $qq3 = $mysqli->query("SELECT name,image FROM hyip_paysystems WHERE id=$psid");
        $syst = $qq3->fetch_assoc();
        $pname = $syst["name"];
        $pimage = $syst["image"];
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
        $qprib = $mysqli->query("SELECT sum FROM hyip_orders WHERE operation=1 AND cash_id=" . $first['id'] . "");
        while ($row = $qprib->fetch_assoc())
        {
            $prib += $row['sum'];
        }
        $img = 'hyip/img/' . $pimage;

        return array(
            'depname' => $depname,
            'created' => $first['created'],
            'outs' => $first['outs'],
            'nextpaid' => $nextpaid,
            'lastpaid' => $lastpaid,
            'biz' => $biz,
            'nobiz' => $nobiz,
            'currency' => $acc['currency'],
            'prib' => $prib,
            'cash' => $first['cash'],
            'img' => $img
        );
    }

    public function get_pager($numposts)
    {
        $mysqli = $GLOBALS['mysqli'];
        $data = array();

        $posts = $mysqli->query("SELECT COUNT(id) FROM hyip_orders")->fetch_row()[0];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $total = intval(($posts - 1) / $numposts) + 1;
        $page = intval($page);
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
        $mysqli = $GLOBALS['mysqli'];
        $data = array();
        $numposts = 10;

        $posts = $mysqli->query("SELECT COUNT(*) FROM hyip_orders")->fetch_row()[0];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $total = intval(($posts - 1) / $numposts) + 1;
        $page = intval($page);
        if (empty($page) or $page < 0)
            $page = 1;
        if ($page > $total)
            $page = $total;
        $start = $page * $numposts - $numposts;

        $uid = Session::get('id');
        $query = $mysqli->query("SELECT * FROM hyip_cash WHERE user_id='" . $uid . "' ORDER BY created DESC LIMIT $start,$numposts");

        while ($row = $query->fetch_assoc())
        {
            $paid = $row['payaccount_id'];
            $qq = $mysqli->query("SELECT paysystem_id FROM hyip_payaccounts WHERE id='$paid'");
            $psid = $qq->fetch_assoc()["paysystem_id"];
            $qq2 = $mysqli->query("SELECT name FROM hyip_paysystems WHERE id='$psid'");
            $pname = $qq2->fetch_assoc()["name"];

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
                'pname' => $pname,
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

?>