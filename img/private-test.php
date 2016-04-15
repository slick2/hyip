<?php

session_start();

if(!isset($_SESSION["session_email"])):
	header("location:login.php");
else:
	include("include/header.php");
	require_once("include/connect.php");
	$uid = $_SESSION['id'];
	$query = $mysqli->query("SELECT * FROM hyip_cash WHERE user_id='".$uid."'");
?>

<div id="welcome">
<h2>Добро пожаловать, <span><?php echo $_SESSION['name'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
</div>

<p>Ваши депозиты:</p>
<ul>
	<?
	while ($row = $query->fetch_assoc())
	{
		$paid = $row['payaccount_id'];
		$qq = $mysqli->query("SELECT paysystem_id FROM hyip_payaccounts WHERE id='$paid'");
		$psid = $qq->fetch_assoc()["paysystem_id"];
		$qq2 = $mysqli->query("SELECT name FROM hyip_paysystems WHERE id='$psid'");
		$pname = $qq2->fetch_assoc()["name"];
		echo "<li>".$pname." : ".$row['cash']." р. </li>";
	}
	?>
</ul>
<p><a href="addmoney.php">
	Пополнить счет на сайте
</a></p>
<p><a href="change.php">
	Изменить личные данные
</a></p>

<?php endif; ?>
