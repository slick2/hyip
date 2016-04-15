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
			<span><a href="private"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];?></a>
			<a class="btn-lk" href="logout">Выйти <i class="fa fa-sign-out"></i></a>
			<i class="fa fa-clock-o" style="margin-left: 20px; padding-right: 5px;"></i><span id="time"></span>
			</span>
		</div>
		<div class="container-fluid cabinet-wrap">
			<div class="container">
				<div class="left-menu">
				<h2><i class="fa fa-user"></i> <?php echo $_SESSION['name'];?></h2>
				<ul class="left-menue-lk">
					<?php if($_SESSION["role"] === "user"): ?>
					<li><a href="private"><i class="fa fa-server"></i>Кабинет</a></li>
					<li><a href="addmoney"><i class="fa fa-university"></i>Создать депозит</a></li>
					<li><a href="deposits"><i class="fa fa-credit-card"></i>Мои депозиты</a></li>
					<li><a href="referral"><i class="fa fa-users"></i>Партнерская программа</a></li>
					<li><a><i class="fa fa-comments-o"></i>Рекламные материалы</a></li>
					<li><a href="change"><i class="fa fa-cogs"></i>Настройки</a></li>
				<?php else: ?>
				<li><a href="admin"><i class="fa fa-cogs"></i>Администрирование</a></li>
				<?php endif ?>
				</ul>
				</div>
