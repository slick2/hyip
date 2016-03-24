<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="utf-8">
            <title>Пирамида</title>
            <link rel="icon" type="/image/png" href="ic1.png" sizes="16x16"/>
            <!--link rel="stylesheet" href="/css/style.css" type='text/css' media='all'/-->
            <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css"/>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
            <link rel="stylesheet" type="text/css" href="/css/custom.css"/>
            <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="/css/lk-style.css">
    </head>
    <body>
<div class="container-fluid header_main">
    <div class="container">
    <div class="row">

                    <nav class="navbar navbar-default main-nav" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="col-md-3">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              
                          <a class="navbar-brand company-logo"  href="#"></a>
                             
                        </div>
                        </div>


                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="col-md-9">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li><a href="#"><span class="glyphicon glyphicon-home"></span>ГЛАВНАЯ</a></li>
                            <li><a href="#">О НАС</a></li>
                            <li><a href="#">ИНВЕСТОРАМ</a></li>
                            <li><a href="#">ПРАВИЛА</a></li>
                            <li><a href="#">ВОПРОС-ОТВЕТ</a></li>
                            <li><a href="#">КОНТАКТЫ</a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
            </div>
        </div>
    </div>
<div class="container">
        

        <div class="row">
            <div class="col-xs-3 left-menu">
                <ul class="nav nav-pills nav-stacked">
                <?php if(Session::get('role') === 'user'): ?>
                    <li><a href="/private" style="background: url(../img/icons_menu/icon_menu_1.png) no-repeat 10px 6px;">Кабинет</a></li>
                    <li><a href="/deposits" style="background: url(../img/icons_menu/icon_menu_2.png) no-repeat 10px 6px;">Инвестиции</a></li>
                    <li><a href="/deposits/add" style="background: url(../img/icons_menu/icon_menu_3.png) no-repeat 10px 6px;">Внести депозит</a></li>
                    <li><a href="/referral" style="background: url(../img/icons_menu/icon_menu_5.png) no-repeat 10px 6px;">Рефералы</a></li>
                    <li><a href="#" style="background: url(../img/icons_menu/icon_menu_6.png) no-repeat 10px 6px;">Рекламные материалы</a></li>
                    <li><a href="/settings" style="background: url(../img/icons_menu/icon_menu_7.png) no-repeat 10px 6px;">Настройки</a></li>
                    <li><a href="/logout" style="background: url(../img/icons_menu/icon_menu_9.png) no-repeat 10px 6px;">Выход</a></li>
                    <?php else: ?>
                    <li><a href="/admin"><i class="fa fa-cogs"></i>Администрирование</a></li>
                    <?php endif ?>
                </ul> 
            </div>
            
            <div class="col-xs-9">
            <div class="row right-block">
                <div class="col-xs-12">
                <div class="usr-logo"></div> <h2><?php echo Session::get('name'); ?></h2>
                    <div class="col-xs-12" style="border-top:1px solid #d8d8d8; border-bottom:1px solid #d8d8d8">
                        <div class=" ref-link"><p>Реферальная ссылка<p></div><div class="col-md-5"><h5><?php echo "http://". $_SERVER['SERVER_NAME']."/register?ref=".Session::get('id');?></h5></div>
                    </div>
                    
                </div>
                <div class="col-xs-12">
            <?php include 'application/views/' . $content_view; ?>
                </div>
            </div>
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
