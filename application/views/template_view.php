<?php
//header('Content-Type: text/html; charset=utf-8');
$leftmenu = Session::get('leftmenu');
$topmenu = Session::get('topmenu');
$reflink = Session::get('reflink');
$this->percent = Database::getInstance()->getCurrentPercent();
$errmoney = Session::get('errmoney');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="UTF-8">
            <title>ITInvestproject</title>
            <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
            <link rel="icon" type="/image/png" href="ic1.png" sizes="16x16"/>
            <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css"/>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
            <link rel="stylesheet" type="text/css" href="/css/lk-style.css"/>
            <script>
                var currentPercent = <?php echo $this->percent  ;?>;
            </script>
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
							  <a class="navbar-brand company-logo"  href="https://itinvestproject.com"></a>
							</div>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="col-md-9">
							<div class="row">
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								  <ul class="nav navbar-nav">
									<li><a href="https://itinvestproject.com/"><span class="glyphicon glyphicon-home"></span><?php echo strtoupper($topmenu['topmenu_main']); ?></a></li>
									<li><a href="https://itinvestproject.com/o-nas/"><?php echo $topmenu['topmenu_aboutus']; ?></a></li>
									<li><a href="https://itinvestproject.com/investoram/"><?php echo $topmenu['topmenu_investors']; ?></a></li>
									<li><a href="https://itinvestproject.com/pravila-kompanii/"><?php echo $topmenu['topmenu_rules']; ?></a></li>
									<li><a href="https://itinvestproject.com/vopros-otvet/"><?php echo $topmenu['topmenu_faq']; ?></a></li>
									<li><a href="https://itinvestproject.com/contact/"><?php echo $topmenu['topmenu_contacts']; ?></a></li>
								  </ul>
								</div><!-- /.navbar-collapse -->
							</div>
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
                    <li><a href="/private" style="background: url(../img/icons_menu/icon_menu_1.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_private']; ?></a></li>
                    <li><a href="/deposits" style="background: url(../img/icons_menu/icon_menu_2.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_deposits']; ?></a></li>
                    <li><a href="/deposits/add" style="background: url(../img/icons_menu/icon_menu_3.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_newdeposit']; ?></a></li>
                    <li><a href="/referral" style="background: url(../img/icons_menu/icon_menu_5.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_referral']; ?></a></li>
                    <li><a href="/referral/links" style="background: url(../img/icons_menu/icon_menu_6.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_reflink']; ?></a></li>
                    <li><a href="/settings" style="background: url(../img/icons_menu/icon_menu_7.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_settings']; ?></a></li>
                    <li><a href="/auth/logout" style="background: url(../img/icons_menu/icon_menu_9.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_logout']; ?></a></li>
                    <?php else: ?>
                    <li><a href="/admin" style="background: url(../img/icons_menu/icon_menu_8.png) no-repeat 10px 6px;"> <?php echo $leftmenu['leftmenu_admin_accounts']; ?></a></li>
                    <li><a href="/admin/translation" style="background: url(../img/icons_menu/icon_menu_7.png) no-repeat 10px 6px;"> <?php echo $leftmenu['leftmenu_translation']; ?></a></li>
                    <li><a href='/admin/userlist' style="background: url(../img/icons_menu/userlist.png) no-repeat 10px 6px; background-size: 30px 30px;"><?php echo $leftmenu['leftmenu_userlist']; ?></a></li>
                    <li><a href='/admin/operations' style="background: url(../img/icons_menu/userlist.png) no-repeat 10px 6px; background-size: 30px 30px;">операции</a></li>
                    <li><a href="/auth/logout" style="background: url(../img/icons_menu/icon_menu_9.png) no-repeat 10px 6px;"><?php echo $leftmenu['leftmenu_logout']; ?></a></li>
                    <?php endif; ?>
                </ul> 
            </div>
            
            <div class="col-xs-9">                
            <div class="row right-block">
                <?php if(Session::get('role') != 'admin'): ?>
                <div class="col-xs-12">
                    <div class="usr-logo col-xs-3"></div> <div class="col-xs-5"><h2><?php echo Session::get('name'); ?></h2></div>
                    <div class="col-xs-12" style="border-top:1px solid #d8d8d8; border-bottom:1px solid #d8d8d8">
                        <div class="row"><div class=" ref-link"><p><?php echo $reflink; ?></p></div><div class="col-md-5"><h5><?php echo "https://". $_SERVER['SERVER_NAME']."/auth/register?ref=".Session::get('id');?></h5></div></div>
                    </div>
                    <?php if(isset($_SESSION['session_activated']) && $_SESSION['session_activated']!=1): ?>

                    <div class='row'>
                        <div class='col-xs-12'>
                            <p class='alert-danger'><?php echo Session::get('not_active'); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($errmoney != 0): ?>
                    <div class='row'>
                        <div class='col-xs-12'>
                            <p class='alert-danger'>Уважаемый Инвестор, на сайте ведутся профилактические работы. На вашем счету $<?php echo $errmoney;?> которые будут выплачены в течении 72 часов</p>
                        </div>
                    </div>
                    <?php endif; ?>                    
                </div>
                <?php endif; ?>
                <div class="col-xs-12">
            <?php include 'application/views/' . $content_view; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
        <script src="/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/js/readonly.js"></script>
        <script src="/js/activate.js"></script>
	<script src="/js/time.js"></script>
        <script src="/js/addmoney.js"></script>
        <script src="/js/admin.js"></script>
        <!--<script src="/js/out.js"></script>-->
        <script src="/js/calc.js"></script>
    </body>
</html>
