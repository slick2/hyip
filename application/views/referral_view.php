<div class="container-fluid new-depos">
  <table class="table-ref">
    <tr><td>Пригласил вас:</td><td><?php echo "{$data['parent']}" ?></td></tr>
    <tr><td>Рефералы</td><td><?php echo "{$data['numrows']}" ?></td></tr>
    <tr><td>Активные рефералы</td><td><?php echo "{$data['active']}" ?></td></tr>
    <tr><td>Получено процентов</td><td><?php echo "$"."{$data['pers']}" ?></td></tr>
    <tr><td>Реферальные бонусы</td><td><?php echo "$"."{$data['money']}" ?></td></tr>
  </table>
</div>