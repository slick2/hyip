<h2>Подтвердите данные</h2>
<div class="container-fluid new-depos">

        <div class="col-xs-12 devider">
        <div class="col-xs-4">
            <h4><?php echo $data['text']['newdeposit_system'];?>:</h4> 
        </div>
        <div class="col-xs-4 col-xs-offset-4">
            <h4><?php echo $data['all']['syst']; ?></h4>
        </div>
        </div>


        <div class="col-xs-12 devider">
        <div class="col-xs-4">
        <h4><?php echo $data['text']['newdeposit_sum'];?></h4> 
        </div>
        <div class="col-xs-4 col-xs-offset-4">
        <h4><?php echo $data['all']['sum']; ?></h4>
        </div>
        </div>

    <?php
    $ref = strtolower($data['all']['syst']);
    if (file_exists("include/$ref.php"))
    {
        require_once("include/$ref.php");
    }
    else
    {
        echo "Произошла ошибка. Попробуйте позже.";
    }
    ?>
</div>