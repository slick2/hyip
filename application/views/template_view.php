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
<div class="container-fluid">
        <div class="row">
                <nav class="navbar navbar-default main-nav" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="col-md-2 col-md-offset-2">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <div class="col-md-offset-3">
                      <a class="navbar-brand company-logo"  href="#"></a>
                          </div>
                    </div>
                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-md-7">
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

        <div class="row">
            <div class="col-md-2 col-md-offset-2  left-menu">
                <ul class="nav nav-pills nav-stacked">
                <?php if(Session::get('role') === 'user'): ?>
                    <li><a href="/private"><span class="glyphicon glyphicon-user"></span>Кабинет</a></li>
                    <li><a href="/deposits"><span class="glyphicon glyphicon-credit-card"></span>Инвестиции</a></li>
                    <li><a href="/deposits/add"><span class="glyphicon glyphicon-briefcase"></span>Внести депозит</a></li>
                    <li><a href="/referral"><span class="glyphicon glyphicon-thumbs-up"></span>Рефералы</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-bullhorn"></span>Рекламные материалы</a></li>
                    <li><a href="/settings"><span class="glyphicon glyphicon-cog"></span>Настройки</a></li>
                    <li><a href="/history"><span class="glyphicon glyphicon-th-list"></span>История</a></li>
                    <li><a href="/logout"><span class="glyphicon glyphicon-off"></span>Выход</a></li>
                    <?php else: ?>
                    <li><a href="/admin"><i class="fa fa-cogs"></i>Администрирование</a></li>
                    <?php endif ?>
                </ul> 
            </div>
            
            <div class="col-md-6">
            <div class="container-fluid right-block">
                <div class="cold-md-2">
                <h2><i class="fa fa-user"></i> <?php echo Session::get('name'); ?></h2>
                    <div class="row" style="border-top:1px solid #d8d8d8; border-bottom:1px solid #d8d8d8">
                        <div class=" ref-link"><p>Реферальная ссылка<p></div><div class="col-md-5"><h5><?php echo "http://". $_SERVER['SERVER_NAME']."/register?ref=".Session::get('id');?></h5></div>
                    </div>
                    
            </div>
            <?php include 'application/views/' . $content_view; ?>
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
