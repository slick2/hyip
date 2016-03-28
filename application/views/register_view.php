<?php
if (isset($data))
{
    $text = $data['text'];
    $message = $data['message'];
}
?>
<div class="container">

    <!-- Codrops top bar -->
    <div class="company-logo-lock">

    </div><!--/ Codrops top bar -->


    <section class="main">
        <form class="form-3" action="" id="loginform" method="post" name="loginform" style="width: 350px;">
            <p class="clearfix">
                <label for="full_name"><?php echo $text['register_fullname']; ?></label>
                <input type="text" name="full_name" id="login" placeholder="">
            </p>
            <p class="clearfix">
                <label for="email"><?php echo $text['auth_email']; ?></label>
                <input type="text" name="email" id="login" placeholder="">
            </p>

            <label for="password"><?php echo $text['auth_password']; ?></label>
            <input type="password" name="password" id="password" placeholder=""> 

            <p class="clearfix">
                <label for="repeat_password"><?php echo $text['register_repeat_password']; ?></label>
                <input type="password" name="repeat_password" id="password" placeholder=""> 
            </p>
            <p class="clearfix">
                <input type="submit" name="register" value="<?php echo $text['register_button']; ?>" name="login" style="margin: 0;">
            </p>       
        </form>
        <div class="log-invalid">
            <span>
                <?php
                if (isset($text[$message]))
                {
                    echo "<p style='color:red'><i class='fa fa-exclamation-circle'></i>{$text[$message]}</p>";
                }
                ?>
            </span>
        </div>

        <div class="log-reg">
            <p><?php echo $text['register_haveacc']; ?></p>
            <a href= "/auth">Войти</a>
            <p><?php echo $text['auth_copyright']; ?></p>
        </div>
    </section>

</div>