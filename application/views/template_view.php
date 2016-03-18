<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="utf-8">
            <title>Пирамида</title>
            <link rel="icon" type="/image/png" href="ic1.png" sizes="16x16"/>
            <link rel="stylesheet" href="/css/style.css" type='text/css' media='all'/>
            <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css"/>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
            <link rel="stylesheet" type="text/css" href="/css/custom.css"/>
    </head>
    <body>
        <div class="head-lk">
            <div class="logo"></div>
            <div class="main_nav-lk">
                <ul class="navigation-lk">
                    <li><a href="/"><i class="fa fa-home fa-fw"></i>ГЛАВНАЯ</a></li>
                    <li><a href="/o-nas/">О НАС</a></li>
                    <li><a href="/investoram/">ИНВЕСТОРАМ</a></li>
                    <li><a href="/pravila-kompanii/">ПРАВИЛА</a></li>
                    <li><a href="/vopros-otvet/">ВОПРОС-ОТВЕТ</a></li>
                    <li><a href="/contact/">КОНТАКТЫ</a></li>
                </ul>
            </div>
            <span><a href="private"><i class="fa fa-user"></i> <?php echo Session::get('name'); ?></a>
                <a class="btn-lk" href="/logout">Выйти <i class="fa fa-sign-out"></i></a>
                <i class="fa fa-clock-o" style="margin-left: 20px; padding-right: 5px;"></i><span id="time"></span>
            </span>
        </div>
        <div class="container-fluid cabinet-wrap">
            <div class="container">
                <div class="left-menu">
                    <h2><i class="fa fa-user"></i> <?php echo Session::get('name'); ?></h2>
                    <ul class="left-menue-lk">
                        <?php if(Session::get('role') === 'user'): ?>
                        <li><a href="/private"><i class="fa fa-server"></i>Кабинет</a></li>
                        <li><a href="/deposits/add"><i class="fa fa-university"></i>Создать депозит</a></li>
                        <li><a href="/deposits"><i class="fa fa-credit-card"></i>Мои депозиты</a></li>
                        <li><a href="/referral"><i class="fa fa-users"></i>Партнерская программа</a></li>
                        <li><a><i class="fa fa-comments-o"></i>Рекламные материалы</a></li>
                        <li><a href="/settings"><i class="fa fa-cogs"></i>Настройки</a></li>
                        <?php else: ?>
                        <li><a href="/admin"><i class="fa fa-cogs"></i>Администрирование</a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php include 'application/views/' . $content_view; ?>
            </div>
        </div>
        <script src="/js/jquery-2.2.1.min.js"></script>
        <script src="/js/readonly.js"></script>
        <script src="/js/activate.js"></script>
	<script src="/js/time.js"></script>
	<script src="/js/calc.js"></script>
        <script src="/js/addmoney.js"></script>
    </body>
</html>
