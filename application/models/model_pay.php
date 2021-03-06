<?php

class Model_Pay extends Model {

    public function succeed_pay() {
        //last order of cur user to code=0
        $mysqli = Database::getInstance();
        $uid = Session::get('id');
        $order = $mysqli->query("SELECT ord.id as id FROM hyip_orders AS ord "
                        . "INNER JOIN hyip_cash AS cash ON (cash.id=ord.cash_id) "
                        . "WHERE cash.user_id=$uid AND ord.operation=0 ORDER BY ord.date DESC")->fetchSingleRow();
        $oid = intval($order['id']);

        $ins = $mysqli->query("UPDATE hyip_orders SET code=0 WHERE id=$oid");
    }

    public function fail_pay() {
        //delete last cash of cur user
        $mysqli = Database::getInstance();
        $uid = Session::get('id');

        $cashid = @$mysqli->query("SELECT id FROM hyip_cash WHERE user_id=$uid ORDER BY created DESC")->fetchSingleRow()['id'];
        if($cashid){
          $del = $mysqli->query("DELETE FROM hyip_cash WHERE id=$cashid");
        }        
    }

    public function getActiveSysyems() {
        $db = Database::getInstance();
        $query = 'select 1 as active from hyip_payeer where active=1';
        $payeer = !!($db->query($query)->result['active'] == 1);
        $query = 'select 1 as active from hyip_perfectmoney where active=1';
        $perfectmoney = !!($db->query($query)->result['active'] == 1);
        $query = 'select 1 as active from hyip_bitcoin where active=1';
        $bitcoin = !!($db->query($query)->result['active'] == 1);
        $query = 'select 1 as active from hyip_advcash where active=1';
        $advcash = !!($db->query($query)->result['active'] == 1);
        return array($payeer, $advcash, $perfectmoney, $bitcoin);
    }

}
