<div class='right-wrap'>
    Платежная система: <?php echo $data['syst'] ?><br> Сумма: <?php echo $data['sum'] . " " . $data['currency'] ?>
    <?php
    $ref = strtolower($data['syst']);
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