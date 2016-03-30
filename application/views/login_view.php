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
        <a href="http://itinvestproject.com" class="logo-link" target="_blank"><img src="../img/logo.png" alt="" width="400" height="85"  /></a>
    </div><!--/ Codrops top bar -->


    <section class="main">
        <form class="form-3" action="" id="loginform" method="post" name="loginform">
            <p class="clearfix">
                <label for="login"><?php echo $text['auth_email']; ?></label>
                <input type="text" name="email" id="login" placeholder="">
            </p>
            <p class="clearfix">
                <label for="password"><?php echo $text['auth_password']; ?></label>
                <input type="password" name="password" id="password" placeholder=""> 
            </p>
            <p class="clearfix">
                <input type="submit" name="submit" value="<?php echo $text['login_button']; ?>" name="login">
            </p>       
        </form>​
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
        <div class="log-reg">
            <p><?php echo $text['login_noacc']; ?></p>
            <a href= "/auth/register"><?php echo $text['login_register']; ?></a>
            <p><?php echo $text['auth_copyright']; ?></p>
        </div>
    </section>

</div>