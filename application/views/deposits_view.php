

    
        <table class="table-history">
        
            <tr><th>Дата начала</th><th>Платежная система</th><th>Сумма</th><th>Выплачено</th><th>Последняя выплата</th><th>Следущая выплата</th></tr>
            <?php
            foreach ($data['deposits'] as $value)
            {
                echo "<tr><td>" . $value['date'] . "</td><td>" . $value['pname'] . "</td><td>" . $value['cash'] . "</td><td>" . $value['outs'] . "</td><td>" . $value['lastpaid'] . "</td><td>" . $value['nextpaid'] . "</td></tr>";
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
    
