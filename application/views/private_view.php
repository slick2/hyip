<?php
$text = $data['text'];
$data = $data['alldata'];
?>

<div class=" balance">
    <div class="col-md-2 balance-lbl"><?php echo $text['private_balance']; ?></div>
    <div class="col-md-4" style="font-size: 30px;"><?php echo $data['cash'][0] . "."; ?><small><?php echo $data['cash'][1]; ?> $ </small></div>
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
        $pervpage = '<a href= ./private?page=1><i class="fa fa-angle-double-left"></i></a>
                                           <a href= ./private?page=' . ($data['page'] - 1) . '><i class="fa fa-angle-left"></i></a> ';
// Проверяем нужны ли стрелки вперед
    if ($data['page'] != $data['total'])
        $nextpage = ' <a href= ./private?page=' . ($data['page'] + 1) . '<i class="fa fa-angle-right"></i></a>
                                               <a href= ./private?page=' . $data['total'] . '<i class="fa fa-angle-double-right"></i></a>';

// Находим две ближайшие станицы с обоих краев, если они есть
    if ($data['page'] - 2 > 0)
        $page2left = ' <a href= ./private?page=' . ($data['page'] - 2) . '>' . ($data['page'] - 2) . '</a>   ';
    if ($data['page'] - 1 > 0)
        $page1left = '<a href= ./private?page=' . ($data['page'] - 1) . '>' . ($data['page'] - 1) . '</a>   ';
    if ($data['page'] + 2 <= $data['total'])
        $page2right = '   <a href= ./private?page=' . ($data['page'] + 2) . '>' . ($data['page'] + 2) . '</a>';
    if ($data['page'] + 1 <= $data['total'])
        $page1right = '   <a href= ./private?page=' . ($data['page'] + 1) . '>' . ($data['page'] + 1) . '</a>';

// Вывод меню
    echo '<div class="pages_list">' . $pervpage . $page2left . $page1left . '<div class="current_page">' . $data['page'] . '</div>' . $page1right . $page2right . $nextpage . '</div>';
    ?>
</div>