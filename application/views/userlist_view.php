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
        <?php foreach($users as $user): ?>
        <div class=''>
            <?php echo $user['id'];?>
        </div>
        <div class=''>
            <?php echo $user['full_name'];?>
        </div>   
        <div class=''>
            <?php echo $user['email'];?>
        </div>
        <div class=''>
            <?php echo $user['role'];?>
        </div>     
        <div class=''>
            <?php echo (!!$user['active'] ? 'активен' : 'не активен');?>
        </div>
        <div class=''>
            <button class='user_block' data-id='<?php echo $user['id'];?>'>блокировать/разблокировать</button>            
        </div>   
        <div class=''>
            <button class='user_delete' data-id='<?php echo $user['id'];?>'>удалить</button>            
        </div>          
        <?php endforeach ?>
    </div>
    <div class='row-fluid'>
        <?php 
            // Проверяем нужны ли стрелки назад
                if ($page != 1)
                    $pervpage = '<li><a href=" /admin/userlist?page=1">&laquo;</a></li>
                                                       <li><a href=" /admin/userlist?page=' . ($page - 1) . '">&#60;</a></li> ';
            // Проверяем нужны ли стрелки вперед
                if ($page != $count)
                    $nextpage = ' <li><a href="/admin/userlist?page=' . ($page + 1) . '"<i class="fa fa-angle-right"></i></a></li>
                                                           <li><a href="/admin/userlist?page=' . ceil($count/10) . '">&raquo</a></li>';

            // Находим две ближайшие станицы с обоих краев, если они есть
                if ($page - 2 > 0)
                    $page2left = ' <li><a href="/admin/userlist?page=' . ($page - 2) . '">' . ($page - 2) . '</a></li>   ';
                if ($page - 1 > 0)
                    $page1left = '<li><a href="/admin/userlist?page=' . ($page - 1) . '">' . ($page - 1) . '</a></li>   ';
                if ($page + 2 <= $count)
                    $page2right = '   <li><a href="/admin/userlist?page=' . ($page + 2) . '">' . ($page + 2) . '</a></li>';
                if ($page + 1 <= $count)
                    $page1right = '   <li><a href="/admin/userlist?page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>';

            // Вывод меню
                echo '<ul class="pagination pages">' . $pervpage . $page2left . $page1left . '<li class=""><a href="#">' . $page . '</a></li>' . $page1right . $page2right . $nextpage . '</ul>';
        ?>        
    </div>
</div>