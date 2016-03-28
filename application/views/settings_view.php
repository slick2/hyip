<div class="container-fluid new-depos">
    <form action="" method="post" name="change">
        <div class="col-xs-12 devider">
            <table class="table-setting">
                <tr><td><?php echo $data['text']['settings_oldname']; ?></td>
                    <td>
                        <?php echo Session::get('name'); ?>
                    </td></tr>
                <tr><td><?php echo $data['text']['settings_newname']; ?></td><td>
                        <input class="input input-depos" id="full_name" name="full_name"size="32"  type="text" value="">
                    </td></tr>
                <tr><td><?php echo $data['text']['settings_oldpass']; ?></td><td>
                        <input class="input input-depos" id="password_old" name="password_old" size="32"   type="password" value="">
                    </td></tr>
                <tr><td><?php echo $data['text']['settings_newpass']; ?></td><td>
                        <input class="input input-depos" id="password" name="password"size="32"   type="password" value="">
                    </td></tr>
                <tr><td><?php echo $data['text']['settings_repeat']; ?></td><td>
                        <input class="input input-depos" id="password_confirm" name="password_confirm" size="32"   type="password" value="">
                    </td></tr>
                <?php
                foreach ($data['systems'] as $value)
                {
                    echo "<tr><td><label>{$value['name']} </label></td><td><input class='input-depos' type='text' name='" . $value['name'] . "' value='" . $value['account'] . "'></td></tr>";
                }
                ?>
                <tr><td><?php echo $data['text']['settings_email']; ?></td><td>
                        <input class="input-depos" id="email" name="email" size="32"type="email" value="">
                    </td></tr>
            </table>
        </div>
        <input class="pay" id="accchange" name="change" type="submit" value="<?php echo $data['text']['settings_apply']; ?>">
    </form>
</div>


<h3><?php echo $data['text']['settings_safety']; ?></h3>

<div class="row " style="padding-bottom: 40px;">
    <form action="" method="post" name="safety">
    <div class="col-xs-6">
        <div class="col-xs-12 new-depos">
            <div class="col-xs-12 ip-adres"><?php echo $data['text']['settings_iptrack']; ?></div>
            <div class="col-xs-12 devider">
                <input type="radio" name="ip" value="off" checked><?php echo $data['text']['settings_turn_off']; ?>
            </div>
            <div class="col-xs-12">
                <input type="radio" name="ip" value="on"><?php echo $data['text']['settings_turn_on']; ?>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="col-xs-12 new-depos">
            <div class="col-xs-12 ip-adres"><?php echo $data['text']['settings_browser_track']; ?></div>
            <div class="col-xs-12 devider">
                <input type="radio" name="browser" value="off" checked><?php echo $data['text']['settings_turn_off']; ?>
            </div>
            <div class="col-xs-12">
                <input type="radio" name="browser" value="on"><?php echo $data['text']['settings_turn_on']; ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12"><input class="pay" id="safety" name= "safety" type="submit" value="<?php echo $data['text']['settings_apply']; ?>"></div>
</div>
