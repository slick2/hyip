<div class="right-wrap">
    <div class="balance-wrap">

        <h2>Кабинет</h2>

        <div class="bb-box">
            <div class="title-bb">Здесь отображена сумма средств, которые вы положили на депозит:</div>
            <div class="ri-bb"><a class="btn-priv" href="addmoney">Создать депозит</a></div>
            <div class="bal-bb"><?php echo $data['cash'][0] . "."; ?><small><?php echo $data['cash'][1]; ?> $ </small><br> <span>инвестировано средств</span></div>
        </div>
        <div class="bb-box">
            <div class="title-bb">Здесь отображена сумма средств, которые вы вывели на свой кошелек из системы:</div>
            <div class="ri-bb"><span></span></div>
            <div class="bal-bb"><?php echo $data['outs'][0] . "."; ?><small><?php echo $data['outs'][1]; ?> $</small><br><span>выведено средств</span></div>
        </div>
        <div class="bb-box">
            <div class="title-bb">Здесь отображена сумма средств, которые вы получили за приведенных рефералов:</div>
            <div class="ri-bbb"><a class="btn-obn" href="change">Вывести средства</a></div>
            <div class="bal-bb"><?php echo $data['refs'][0] . "."; ?><small><?php echo $data['refs'][1]; ?> $</small><br><span>реферальный бонус</span></div>
        </div>

    </div>

    <div class="oper-wrap">
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
</div>
