<?php

class Model_Admin extends Model
{

    public function get_systems()
    {
        $data = array();
        //$mysqli = $GLOBALS['mysqli'];
        $mysqli = Database::getInstance();
        $uid = Session::get('id');
        $qsyst = $mysqli->query("SELECT name FROM hyip_paysystems")->fetchAll();

        foreach ($qsyst as $srow)
        {
            $data[] = $srow['name'];
        }
        return $data;
    }

    public function add_account()
    {
        //$mysqli = $GLOBALS['mysqli'];
        $mysqli = Database::getInstance();
        $system = $mysqli->quote($_POST['paysystem']);
        $number = $mysqli->quote($_POST['paynumber']);
        $account = $mysqli->quote($_POST['account']);
        $pass = $mysqli->quote($_POST['password']);
        $cur = $mysqli->quote($_POST['currency']);
        $inout = $mysqli->quote($_POST['inout']);

        $qsid = $mysqli->query("SELECT id FROM hyip_paysystems WHERE name='$system'")->fetchSingleRow()['id'];
        $qadd = $mysqli->query("INSERT INTO hyip_admaccounts (paysystem_id,paynumber,account,password,currency,`inout`) VALUES($qsid,'$number','$account','$pass','$cur','$inout')");
    }

    public function change_account()
    {
        //$mysqli = $GLOBALS['mysqli'];
        $mysqli = Database::getInstance();
        $qaccs = $mysqli->query("SELECT id FROM hyip_admaccounts");
        while ($row = $qaccs->fetch_assoc())
        {
            $iid = 'inout_' . $row['id'];
            $did = 'delete_' . $row['id'];
            if (isset($_POST[$did]))
            {
                $qdel = $mysqli->query("DELETE FROM hyip_admaccounts WHERE id= {$row['id']}" );
            }
            else
            {
                if (isset($_POST[$iid]))
                {
                    $qchange = $mysqli->query("UPDATE hyip_admaccounts SET `inout`='{$_POST[$iid]}' WHERE id={$row['id']}");
                }
            }
        }
    }

    public function get_accounts()
    {
        $data = array();
        $mysqli = Database::getInstance();
        //$mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');
        $qaccs = $mysqli->query("SELECT id,paysystem_id,currency,paynumber,`inout` FROM hyip_admaccounts")->fetchAll();

        foreach ($qaccs as $row)
        {
            $syst = $mysqli->query("SELECT name FROM hyip_paysystems WHERE id={$row['paysystem_id']}")->fetchSingleRow()['name'];
            $options = array("Ввод+вывод", "Ввод", "Вывод");
            $index = intval($row['inout']);
            switch ($index)
            {
                case 0:
                    $fid = 1;
                    $sid = 2;
                    break;
                case 1:
                    $fid = 0;
                    $sid = 2;
                    break;
                case 2:
                    $fid = 0;
                    $sid = 1;
                    break;
                default:
                    echo "Error";
                    break;
            }
            $data[] = array(
                'syst' => $syst,
                'currency' => $row['currency'],
                'paynumber' => $row['paynumber'],
                'id' => $row['id'],
                'options' => $options,
                'fid' => $fid,
                'sid' => $sid,
                'index' => $index
            );
        }
        return $data;
    }

}
