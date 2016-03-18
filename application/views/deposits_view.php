
<div class="right-wrap">
    <div class="balance-wrap">
        <h2><? echo $data['first']['depname'] ?></h2>
        <div class="dep-inner"><div class="dperc">2.35%</div><?php echo "<div style='background-image:url(../" . $data['first']['img'] . "); background-position:center;' class='pay-sys'></div>" ?><div class="dep-inner-sp"><?php echo $data['first']['cash']; ?> <small><?php echo strtoupper($data['first']["currency"]); ?></small></div></div>
        <div class="now-perc">Статус <span>Активен</span></div>
        <div class="now-perc">Дата <span><?php echo $data['first']['created']; ?></span></div>
        <div class="now-perc">Выплат <span><?php echo $data['first']['outs']; ?></span></div>
        <div class="now-perc">Следующая выплата <span><?php echo $data['first']['nextpaid']; ?></span></div>
        <div class="now-perc">Последняя выплата <span><?php echo $data['first']['lastpaid']; ?></span></div>
        <div class="now-perc">Сумма выплаты(бизнес дни) <span><?php echo $data['first']['biz'] . " " . strtoupper($data['first']["currency"]); ?></span></div>
        <div class="now-perc">Сумма выплаты(не бизнес дни) <span><?php echo $data['first']['nobiz'] . " " . strtoupper($data['first']["currency"]); ?></span></div>
        <div class="now-perc">Получено прибыли  <span><?php echo $data['first']['prib'] . " " . strtoupper($data['first']["currency"]); ?></span></div>
    </div>
    <div class="oper-wrap">
        <h2>Мои депозиты:</h2>
        <table class="table-depos" style="font-size: 11px;">
            <tr><th>Дата начала</th><th>Платежная система</th><th>Сумма</th><th>Выплачено</th><th>Последняя выплата</th><th>Следущая выплата</th><th>Инфо</th></tr>
            <?php
            foreach ($data['deposits'] as $value)
            {
                echo "<tr><td>" . $value['date'] . "</td><td>" . $value['pname'] . "</td><td>" . $value['cash'] . "</td><td>" . $value['outs'] . "</td><td>" . $value['lastpaid'] . "</td><td>" . $value['nextpaid'] . "</td><td><a class='btn-lk' style='text-decoration:none;' href='/mvc/deposits?id=" . $value['id'] . "'>Детали</a></td></tr>";
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
            $pervpage = '<a href= ./deposits?page=1><i class="fa fa-angle-double-left"></i></a>
	                               <a href= ./deposits?page=' . ($data['page'] - 1) . '><i class="fa fa-angle-left"></i></a> ';
        // Проверяем нужны ли стрелки вперед
        if ($data['page'] != $data['total'])
            $nextpage = ' <a href= ./deposits?page=' . ($data['page'] + 1) . '<i class="fa fa-angle-right"></i></a>
	                                   <a href= ./deposits?page=' . $data['total'] . '<i class="fa fa-angle-double-right"></i></a>';

        // Находим две ближайшие станицы с обоих краев, если они есть
        if ($data['page'] - 2 > 0)
            $page2left = ' <a href= ./deposits?page=' . ($data['page'] - 2) . '>' . ($data['page'] - 2) . '</a>   ';
        if ($data['page'] - 1 > 0)
            $page1left = '<a href= ./deposits?page=' . ($data['page'] - 1) . '>' . ($data['page'] - 1) . '</a>   ';
        if ($data['page'] + 2 <= $data['total'])
            $page2right = '   <a href= ./deposits?page=' . ($data['page'] + 2) . '>' . ($data['page'] + 2) . '</a>';
        if ($data['page'] + 1 <= $data['total'])
            $page1right = '   <a href= ./deposits?page=' . ($data['page'] + 1) . '>' . ($data['page'] + 1) . '</a>';

        // Вывод меню
        echo '<div class="pages_list">' . $pervpage . $page2left . $page1left . '<div class="current_page">' . $data['page'] . '</div>' . $page1right . $page2right . $nextpage . '</div>';
        ?>
    </div>
</div>