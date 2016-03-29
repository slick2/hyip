<h2>История операций:</h2>
<table class='table-depos'>
    <tr><th>Операция</th><th>Сумма</th><th>Система</th><th>Статус</th><th>Дата</th></tr>
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
    echo '<ul class="pagination pages">' . $pervpage . $page2left . $page1left . '<li class=""><a href="#">' . $data['page'] . '</a></li>' . $page1right . $page2right . $nextpage . '</ul>';
    ?>