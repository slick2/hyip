<link rel="stylesheet" type="text/css" href="css/refferal.css">
<div class="right-wrap">
<h2 style="text-align: center;">Партнерская программа</h2>
<div class="invite-friend">
  <div class="ref-title">ПРИГЛАСИТЕ ДРУЗЕЙ В VENTURE ALLIANCE</div>
  <div class="text-inv">Поделитесь с близкими и знакомыми тем, где Вы зарабатываете, и они будут Вам благодарны.</div>
</div>


  <div class="invb-col inv1 active">
    <div class="invb-title">Партнерская программа</div>
    <div class="invb-text">12% от суммы инвестирования лично приглашенных Вами партнеров
3% от суммы инвестирования Вашего партнера второго уровня
Чтобы зарабатывать на партнерской программе, достаточно зарегистрировать учетную запись на сайте</div>
  </div>
<div class="ref-tr">

  <h3>Ваша реферральная ссылка:</h3> <div class="ref-link">
    <?php
  echo "http://". $_SERVER['SERVER_NAME']."/register?ref={$data['uid']}";
 ?></div>
 <h2>Статистика</h2>
 <table class="stat">
   <tr><th>Приглашено:</th><th>Активных рефералов:</th><th>Привлечено средств:</th><th>Получено процентов:</th></tr>
   <?php echo "<tr><td>{$data['numrows']}</td><td>{$data['active']}</td><td>{$data['money']}</td><td>{$data['pers']}</td></tr>"; ?>
 </table>
</div>
</div>
