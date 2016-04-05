<div class="container-fluid new-depos">
  <table class="table-ref">
      <?php if(!empty($data['all']['parent'])):  ?>
    <tr><td><?php echo $data['text']['ref_inviteyou']; ?></td><td><?php echo "{$data['all']['parent']}" ?></td></tr>
    <?php endif; ?>
    <tr><td><?php echo $data['text']['ref_num_referrals']; ?></td><td><?php echo "{$data['all']['numrows']}" ?></td></tr>
    <tr><td><?php echo $data['text']['ref_active_referrals']; ?></td><td><?php echo "{$data['all']['active']}" ?></td></tr>
  </table>
</div>
<div class="container-fluid small-top-marg">
	<div class="row">
		<a href="#" id="outpercent" class="add-depos"><?php echo $data['text']['ref_out_percent']; ?></a>
	</div>
</div>