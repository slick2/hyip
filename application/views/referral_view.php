<div class="container-fluid new-depos">
  <table class="table-ref">
      <?php if(!empty($data['all']['parent'])):  ?>
    <tr><td><?php echo $data['text']['ref_inviteyou']; ?></td><td><?php echo "{$data['all']['parent']}" ?></td></tr>
    <?php endif; ?>
    <tr><td><?php echo $data['text']['ref_num_referrals']; ?></td><td><?php echo "{$data['all']['numrows']}" ?></td></tr>
    <tr><td><?php echo $data['text']['ref_active_referrals']; ?></td><td><?php echo "{$data['all']['active']}" ?></td></tr>
    <tr><td><?php echo $data['text']['ref_percents']; ?></td><td><?php echo "$"."{$data['all']['pers']}" ?></td></tr>
  </table>
</div>
<div class="container-fluid small-top-marg">
	<div class="row">
		<a href="#" class="add-depos">Вывести процент</a>
	</div>
</div>