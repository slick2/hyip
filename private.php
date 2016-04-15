<?php

session_start();
ini_set('display_errors', '1');
if(!isset($_SESSION["session_email"])):
	header("location:login");
elseif($_SESSION["role"] === 'admin'):
	header("location:admin");
else:
	ini_set('display_errors', '1');
	//exchange rate
	//include("kurs.php");
	//html
	include("include/header.php");
	//db
	require_once("include/connect.php");
	//pagination
	$numposts = 10;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$uid = $_SESSION['id'];
	$posts = $mysqli->query("SELECT COUNT(*) FROM hyip_orders")->fetch_row()[0];
	$total = intval(($posts-1)/$numposts) + 1;
	$page = intval($page);
	if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
	$start = $page * $numposts - $numposts;

	$query = $mysqli->query("SELECT * FROM hyip_orders WHERE cash_id IN (SELECT id FROM hyip_cash WHERE user_id=$uid) ORDER BY date DESC LIMIT $start,$numposts");
	$qcash = $mysqli->query("SELECT * FROM hyip_cash WHERE user_id='".$uid."'");
	$qouts = $mysqli->query("SELECT * FROM hyip_orders WHERE cash_id IN (SELECT id FROM hyip_cash WHERE user_id=$uid) AND operation=1 AND code=0");
	$qrefs = $mysqli->query("SELECT * FROM hyip_users WHERE id='$uid'");
	$cash = 0;
	$outs = 0;
	$refs = $qrefs->fetch_assoc()['percents'];
	//sum of cash
	while($crow = $qcash->fetch_assoc())
	{
		$mult = 1;

		$qcur = $mysqli->query("SELECT currency FROM hyip_payaccounts WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE id='".$crow['id']."')");
		$cur= $qcur->fetch_assoc()['currency'];
		if(strcasecmp($cur,'USD') != 0)
		{
			$mult = 74.0;
		}
		$cash += ($crow['cash']/$mult);
	}
	//sum of outs
	while($orow = $qouts->fetch_assoc())
  	{
  		$qtcur = $mysqli->query("SELECT currency FROM hyip_payaccounts WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE id IN ( SELECT cash_id FROM hyip_orders WHERE id='".$orow['id']."'))");
      echo $mysqli->error;
      $tcur = $qtcur->fetch_assoc()['currency'];
  		$mult = 1;
  		if(strcasecmp($tcur,'USD') != 0)
  		{
  			$mult = 74.0;
  		}
  		$outs += ($orow['sum']/$mult);
  	}
	$cash = round($cash,2);
	$cashmas = explode('.',(string)$cash);
	$outs = round($outs,2);
	$outmas = explode('.',(string)$outs);
	$refs = round($refs,2);
	$refmas = explode('.',(string)$refs);
	if(!isset($cashmas[1]))$cashmas[1]=0;
	if(!isset($outmas[1]))$outmas[1]=0;
	if(!isset($refmas[1]))$refmas[1]=0;

?>

		<?php include("template-lk/template-lk.php"); ?>
		<div class="right-wrap">
		<div class="balance-wrap">

		<h2>Кабинет</h2>

		<div class="bb-box">
		<div class="title-bb">Здесь отображена сумма средств, которые вы положили на депозит:</div><div class="ri-bb"><a class="btn-priv" href="addmoney">Создать депозит</a></div><div class="bal-bb"><?php echo $cashmas[0]."." ?><small><?php echo $cashmas[1] ?> $ </small><br> <span>инвестировано средств</span></div>
		</div>
		<div class="bb-box">
		<div class="title-bb">Здесь отображена сумма средств, которые вы вывели на свой кошелек из системы:</div><div class="ri-bb"><span></span></div> <div class="bal-bb"><?php echo $outmas[0]."." ?><small><?php echo $outmas[1]; ?> $</small><br><span>выведено средств</span></div>
		</div>
		<div class="bb-box">
		<div class="title-bb">Здесь отображена сумма средств, которые вы получили за приведенных рефералов:</div><div class="ri-bbb"><a class="btn-obn" href="change">Вывести средства</a></div><div class="bal-bb"><?php echo $refmas[0]."." ?><small><?php echo $refmas[1]; ?> $</small><br><span>реферальный бонус</span></div>
		</div>

		</div>

		<div class="oper-wrap">
						<h2>История операций:</h2>
			<table>
			<?php
			$html = "<table class='table-depos'><tr><th>Операция</th><th>Сумма</th><th>Система</th><th>Статус</th><th>Дата</th></tr>";
			$operations = array('Пополнение','Вывод');
			$status = array('Выполнено','Ожидается');
			while($row = $query->fetch_assoc())
			{
				$qpsname = $mysqli->query("SELECT name FROM hyip_paysystems WHERE id IN (SELECT paysystem_id FROM hyip_payaccounts WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE id=".$row['cash_id']."))");
				$psname = $qpsname->fetch_assoc()['name'];
				$date = new DateTime($row['date']);
				$date = $date->format("d.m.y");
				$html .= "<tr>";
				$html .= "<td>".$operations[$row['operation']]."</td><td>".$row['sum']." </td><td>".$psname."</td><td>".$status[$row['code']]."</td><td>".$date."</td>";
				$html .= "</tr>";
			}
			$html .= "</table>";
			echo $html;
			?>
		</table>
		<?php
		$pervpage="";
		$nextpage="";
		$page2left="";
		$page1left="";
		$page2right="";
		$page1right="";
			// Проверяем нужны ли стрелки назад
			if ($page != 1) $pervpage = '<a href= ./private?page=1><i class="fa fa-angle-double-left"></i></a>
			                               <a href= ./private?page='. ($page - 1) .'><i class="fa fa-angle-left"></i></a> ';
			// Проверяем нужны ли стрелки вперед
			if ($page != $total) $nextpage = ' <a href= ./private?page='. ($page + 1) .'<i class="fa fa-angle-right"></i></a>
			                                   <a href= ./private?page=' .$total. '<i class="fa fa-angle-double-right"></i></a>';

			// Находим две ближайшие станицы с обоих краев, если они есть
			if($page - 2 > 0) $page2left = ' <a href= ./private?page='. ($page - 2) .'>'. ($page - 2) .'</a>   ';
			if($page - 1 > 0) $page1left = '<a href= ./private?page='. ($page - 1) .'>'. ($page - 1) .'</a>   ';
			if($page + 2 <= $total) $page2right = '   <a href= ./private?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
			if($page + 1 <= $total) $page1right = '   <a href= ./private?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

			// Вывод меню
			echo '<div class="pages_list">'.$pervpage.$page2left.$page1left.'<div class="current_page">'.$page.'</div>'.$page1right.$page2right.$nextpage.'</div>';

		?>
		</div>
		</div>
		<?php endif; ?>

<?php include("include/footer.php"); ?>
