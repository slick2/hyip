<div class='right-wrap'>
     <?php echo $data['text']['newdeposit_system'].":".$data['all']['syst']; ?><br> <?php $data['text']['newdeposit_sum'].":".$data['all']['sum'];  ?>
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