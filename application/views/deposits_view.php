<?php
$text = $data['text'];
?>


<table class="table-history">

    <tr><th><?php echo $text['system']; ?></th><th><?php echo $text['sum']; ?></th><th><?php echo $text['deposits_payed']; ?></th><th><?php echo $text['deposits_lastpay']; ?></th><th><?php echo $text['deposits_nextpay']; ?></th></tr>
    <?php
    foreach ($data['deposits'] as $value)
    {
        echo "<tr><td>" . $value['pname'] . "</td><td>" . $value['cash'] . "</td><td>" . $value['outs'] . "</td><td>" . $value['lastpaid'] . "</td><td>" . $value['nextpaid'] . "</td></tr>";
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
        $pervpage = '<li><a href="/deposits?page=1">&laquo;</a></li>
                                           <li><a href="/deposits?page=' . ($data['page'] - 1) . '">&#60;</a></li> ';
// Проверяем нужны ли стрелки вперед
    if ($data['page'] != $data['total'])
        $nextpage = ' <li><a href="/deposits?page=' . ($data['page'] + 1) . '"<i class="fa fa-angle-right"></i></a></li>
                                               <li><a href="/deposits?page=' . $data['total'] . '">&raquo</a></li>';

// Находим две ближайшие станицы с обоих краев, если они есть
    if ($data['page'] - 2 > 0)
        $page2left = ' <li><a href="/deposits?page=' . ($data['page'] - 2) . '">' . ($data['page'] - 2) . '</a></li>   ';
    if ($data['page'] - 1 > 0)
        $page1left = '<li><a href="/deposits?page=' . ($data['page'] - 1) . '">' . ($data['page'] - 1) . '</a></li>   ';
    if ($data['page'] + 2 <= $data['total'])
        $page2right = '   <li><a href="/deposits?page=' . ($data['page'] + 2) . '">' . ($data['page'] + 2) . '</a></li>';
    if ($data['page'] + 1 <= $data['total'])
        $page1right = '   <li><a href="/deposits?page=' . ($data['page'] + 1) . '">' . ($data['page'] + 1) . '</a></li>';

// Вывод меню
    echo '<ul class="pagination pages">' . $pervpage . $page2left . $page1left . '<li class="active"><a href="#">' . $data['page'] . '</a></li>' . $page1right . $page2right . $nextpage . '</ul>';
    ?>
    
