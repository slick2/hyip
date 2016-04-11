<?php
if (isset($data))
{
    $text = $data['text'];
    $message = $data['message'];
    $register = $data['register'];
}
?>
<div class="container">


    <div class="company-logo-lock">
        <a href="https://itinvestproject.com" class="logo-link" target="_blank"><img src="../img/logo.png" alt="" width="400" height="85" ></a>
    </div>


    <section class="main">
        <form class="form-3 restore" action="" id="new_password_form" method="post" name="restoreform">
           	<div>
           		<h3 class="restore__header">
           			Восстановление пароля
           		</h3>
           	</div>
           	<div class="clearfix"></div>
            <div class="clearfix">
                <label for="new_password">Введите ваш email:</label>
                <input type="text" name="email" id="email" placeholder="">
            </div>
            <div class="clearfix">
                <input class="restore__submit" type="submit" name="restore" value="Изменить пароль">
            </div>       
        </form>
        <div class="log-invalid">
            <span>
                <?php
                if (isset($register[$message]) && isset($_POST["email"]))
                {
                    echo "<p style='color:red'><i class='fa fa-exclamation-circle'></i>{$register[$message]}</p>";
                }
                ?>
            </span>
        </div>
        <p style="text-align: center"><?php echo $text['auth_copyright']; ?></p>
    </section>

</div>