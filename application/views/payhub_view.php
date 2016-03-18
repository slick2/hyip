<div class='right-wrap'>
    Платежная система: <?php echo $data['syst'] ?><br> Сумма: <?php echo $data['sum'] . " " . $data['currency'] ?>
    <?php
    $ref = strtolower($data['syst']);
    if (file_exists("/mvc/include/$ref.php"))
    {
        require_once("/mvc/include/$ref.php");
    }
    else
    {
        echo "Произошла ошибка. Попробуйте позже.";
    }
    ?>
</div>