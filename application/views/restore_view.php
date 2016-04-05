<?php
if (isset($data))
{
    $text = $data['text'];
    $message = $data['message'];
}
?>
<div class="container">


    <div class="company-logo-lock">
        <a href="https://itinvestproject.com" class="logo-link" target="_blank"><img src="../img/logo.png" alt="" width="400" height="85" ></a>
    </div>


    <section class="main">
        <form class="form-3 restore" action="" id="new_password_form" method="post" name="loginform">
           	<div>
           		<h3 class="restore__header">
           			Восстановление пароля
           		</h3>
           	</div>
           	<div class="clearfix"></div>
            <div class="clearfix">
                <label for="new_password">Новый пароль</label>
                <input type="password" name="new_password" id="new_password" placeholder="">
            </div>
            <div class="clearfix">
                <label for="repeat_password">Повторите пароль</label>
                <input type="password" name="repeat_password" id="repeat_password" placeholder=""> 
            </div>
            <div class="clearfix">
                <input class="restore__submit" type="submit" name="submit" value="Изменить пароль">
            </div>       
        </form>
        <div class="log-invalid">
            <span>
                <?php
                if (isset($text[$message]) && isset($_POST["email"]))
                {
                    echo "<p style='color:red'><i class='fa fa-exclamation-circle'></i>{$text[$message]}</p>";
                }
                ?>
            </span>
        </div>
    </section>

</div>