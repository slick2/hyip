<?php
$text = $data['text'];
$data = $data['alldata'];
//var_dump($data['outs'][1]);
?>

<div class=" balance">
    <div class="col-xs-4 balance-lbl">
        <div class="col-xs-4" style="font-size: 30px;">$<?php echo $data['cash'][0] . "."; ?><small><?php echo $data['cash'][1]; ?></small></div>    
        <div class="col-xs-8"><span style="text-transform: uppercase"><?php echo $text['private_balance']; ?></span></div>
    </div>
    <div class="col-xs-4 balance-lbl">        
        <div class="col-xs-4" style="font-size: 30px;">$<?php echo $data['outs'][0] . "."; ?><small><?php echo $data['outs'][1]; ?></small></div>
        <div class="col-xs-8"><span style="text-transform: uppercase"><?php echo $text['money_export']; ?></span></div>
    </div>
    
    <a href="/deposits/add" class="add-depos"><?php echo $text['private_create_deposit']; ?></a>
</div>
<div class="" style="margin-bottom: 35px;">
    <table class="table-history">
        <tr><th><?php echo $text['private_operation']; ?></th><th><?php echo $text['private_sum']; ?></th><th><?php echo $text['private_system']; ?></th><th><?php echo $text['private_status']; ?></th><th><?php echo $text['private_date']; ?></th></tr>
        <?php
        foreach ($data['orders'] as $row)
        {
            echo '<tr><td>' . $row['operation'] . '</td><td>' . $row['sum'] . '</td><td>' . $row['paysystem'] . '</td><td>' . $row['status'] . '</td><td>' . $row['date'] . '</td></tr>';
        }
        ?>
    </table>
    <?php
    $pervpage = "";
    $nextpage = "";
    $page2left = "";
    $page1left = "";
    $page2right = "";
    $page1right = "";
// Проверяем нужны ли стрелки назад
    if ($data['page'] != 1)
        $pervpage = '<li><a href=" ./private?page=1">&laquo;</a></li>
                                           <li><a href=" ./private?page=' . ($data['page'] - 1) . '">&#60;</a></li> ';
// Проверяем нужны ли стрелки вперед
    if ($data['page'] != $data['total'])
        $nextpage = ' <li><a href="./private?page=' . ($data['page'] + 1) . '"<i class="fa fa-angle-right"></i></a></li>
                                               <li><a href="./private?page=' . $data['total'] . '">&raquo</a></li>';

// Находим две ближайшие станицы с обоих краев, если они есть
    if ($data['page'] - 2 > 0)
        $page2left = ' <li><a href="./private?page=' . ($data['page'] - 2) . '">' . ($data['page'] - 2) . '</a></li>   ';
    if ($data['page'] - 1 > 0)
        $page1left = '<li><a href="./private?page=' . ($data['page'] - 1) . '">' . ($data['page'] - 1) . '</a></li>   ';
    if ($data['page'] + 2 <= $data['total'])
        $page2right = '   <li><a href="./private?page=' . ($data['page'] + 2) . '">' . ($data['page'] + 2) . '</a></li>';
    if ($data['page'] + 1 <= $data['total'])
        $page1right = '   <li><a href="./private?page=' . ($data['page'] + 1) . '">' . ($data['page'] + 1) . '</a></li>';

// Вывод меню
    echo '<ul class="pagination pages">' . $pervpage . $page2left . $page1left . '<li class="active"><a href="#">' . $data['page'] . '</a></li>' . $page1right . $page2right . $nextpage . '</ul>';
    ?>
</div>