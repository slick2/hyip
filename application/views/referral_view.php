<?php if($data['accounts'] < 3): ?>
    <div class='row'>
        <div class='col-xs-12'>
            <p class='alert-danger'><?php echo $data['ref_warning_header']; ?></p>
        </div>
    </div>
<?php endif; ?>              
<div class="container-fluid attention">
    <div class="col-xs-12">
        <?php echo $data['ref_warning_text'] ; ?>
    </div>
</div>
<div class="container-fluid new-depos">
    <table class="table-ref">
      <?php if(!empty($data['all']['parent'])):  ?>
    <tr><td><?php echo $data['text']['ref_inviteyou']; ?></td><td><?php echo "{$data['all']['parent']}" ?></td></tr>
    <?php endif; ?>
    <tr><td><?php echo $data['text']['ref_num_referrals']; ?></td><td><?php echo "{$data['all']['numrows']}" ?></td></tr>
    <tr><td><?php echo $data['text']['ref_active_referrals']; ?></td><td><?php echo "{$data['all']['active']}" ?></td></tr>
  </table>
</div>