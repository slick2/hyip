<?php
$this->percent = Database::getInstance()->getCurrentPercent();
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
<div class="container-fluid">
        

        <div class="row-fluid">            
            <div class="col-xs-12">                
            

                <div class="col-xs-12">
            <?php include $content_view; ?>
                </div>
            
        </div>
        </div>
    </div>
        <script src="/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script src="/js/readonly.js"></script>
        <script src="/js/activate.js"></script>
	<script src="/js/time.js"></script>
        <script src="/js/addmoney.js"></script>
        <script src="/js/admin.js"></script>
        <script src="/js/out.js"></script>
        <script src="/js/calc.js"></script>
    </body>
</html>
