<?php 
$users = $data['users'];
$count = $data['count'];
$page = $data['page'];
//var_dump($data);
$pervpage = "";
$nextpage = "";
$page2left = "";
$page1left = "";
$page2right = "";
$page1right = "";
?>
<div class='container-fluid'>
    <div class='row-fluid'>
        <h3>Список пользователей</h3>
        <table class="table-history">
        	<tr>
        		<th>id</th>
        		<th>Имя</th>
        		<th>E-mail</th>
        		<th>Права</th>
        		<th>Активность</th>
                        <th>email</th>
				<th colspan="2">Функции</th>
        	</tr>
        	<?php foreach($users as $user): ?>
        	<tr>
        		<td><?php echo $user['id'];?></td>
        		<td><?php echo $user['full_name'];?></td>
        		<td><?php echo $user['email'];?></td>
        		<td><?php echo $user['role'];?></td>
        		<td><?php echo (!!$user['banned'] ? 'блокирован' : 'активен');?></td>
                        <td><?php echo (!!$user['active'] ? 'подтвержден': 'не подтвержден'); ?></td>
        		<td>
                            <button class='user_block btn col-xs-12 btn-warning' data-id='<?php echo $user['id'];?>'>блокирока</button>                            
                            <button class='user_delete btn col-xs-12 btn-danger' data-id='<?php echo $user['id'];?>'>удалить</button>
                        </td>
        		
        	</tr>
        	<?php endforeach ?>
        </table>         
        
    </div>
    <div class='row-fluid'>
        <?php
            // Проверяем нужны ли стрелки назад
                if ($page != 1)
                    $pervpage = '<li><a href=" /admin/userlist?page=1">&laquo;</a></li>
                                                       <li><a href=" /admin/userlist?page=' . ($page - 1) . '">&#60;</a></li> ';
            // Проверяем нужны ли стрелки вперед
                if ($page < ceil($count/10))
                    $nextpage = ' <li><a href="/admin/userlist?page=' . ($page + 1) . '"<i class="fa fa-angle-right"></i></a></li>
                                                           <li><a href="/admin/userlist?page=' . ceil($count/10) . '">&raquo</a></li>';

            // Находим две ближайшие станицы с обоих краев, если они есть
                if ($page - 2 > 0)
                    $page2left = ' <li><a href="/admin/userlist?page=' . ($page - 2) . '">' . ($page - 2) . '</a></li>   ';
                if ($page - 1 > 0)
                    $page1left = '<li><a href="/admin/userlist?page=' . ($page - 1) . '">' . ($page - 1) . '</a></li>   ';
                if ($page + 2 < $count/10)
                    $page2right = '   <li><a href="/admin/userlist?page=' . ($page + 2) . '">' . ($page + 2) . '</a></li>';
                if ($page + 1 < $count/10)
                    $page1right = '   <li><a href="/admin/userlist?page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>';

            // Вывод меню
                echo '<ul class="pagination pages">' . $pervpage . $page2left . $page1left . '<li class="active"><a href="#">' . $data['page'] . '</a></li>' . $page1right . $page2right . $nextpage . '</ul>';
        ?>        
    </div>
</div>