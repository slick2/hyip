<?php
//echo '<pre>';
//var_dump($data);
//echo '</pre>';
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$count = $data['count'];
?>
<div class='container-fluid'>
    <div class='row-fluid'>
        <h3>Список операций</h3>
        <table class="table-history">
        	<?php foreach($data['operations'] as $operation): ?>
        	<tr>
        		<td><?php echo $operation['email'];?></td>
        		<td><?php echo $operation['cash'];?></td>
        		<td><?php echo $operation['created'];?></td>
        		<td><?php echo $operation['account'];?></td>
        		<td><?php echo $operation['name'];?></td>                       
        		<td>
                            <button class='js-operation btn col-xs-12 btn-warning' data-id='<?php echo $operation['id'];?>'>выполнить</button>
                        </td>
        		
        	</tr>
        	<?php endforeach ?>
        </table>         
        
    </div>
    <div class='row-fluid'>
        <?php
            // Проверяем нужны ли стрелки назад
                if ($page != 1){
                    $pervpage = '<li><a href=" /admin/userlist?page=1">&laquo;</a></li>
                                                       <li><a href=" /admin/userlist?page=' . ($page - 1) . '">&#60;</a></li> ';
                } else {
                  $pervpage = '';
                }
            // Проверяем нужны ли стрелки вперед
                $nextpage='';
                if ($page < ceil($count/10))
                    $nextpage = ' <li><a href="/admin/userlist?page=' . ($page + 1) . '"<i class="fa fa-angle-right"></i></a></li>
                                                           <li><a href="/admin/userlist?page=' . ceil($count/10) . '">&raquo</a></li>';

            // Находим две ближайшие станицы с обоих краев, если они есть
                $page2left='';
                if ($page - 2 > 0) 
                    $page2left = ' <li><a href="/admin/userlist?page=' . ($page - 2) . '">' . ($page - 2) . '</a></li>   ';
                $page1left ='';
                if ($page - 1 > 0)
                    $page1left = '<li><a href="/admin/userlist?page=' . ($page - 1) . '">' . ($page - 1) . '</a></li>   ';
                if ($page + 2 < $count/10)
                    $page2right = '   <li><a href="/admin/userlist?page=' . ($page + 2) . '">' . ($page + 2) . '</a></li>';
                $page2right ='';
                $page1right = '';
                if ($page + 1 < $count/10)
                    $page1right = '   <li><a href="/admin/userlist?page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>';

            // Вывод меню
                echo '<ul class="pagination pages">' . $pervpage . $page2left . $page1left . '<li class="active"><a href="#">' . $page . '</a></li>' . $page1right . $page2right . $nextpage . '</ul>';
        ?>        
    </div>
</div>