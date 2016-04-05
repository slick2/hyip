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
        <form class="form-3" action="" id="loginform" method="post" name="loginform">
            <p class="clearfix">
                <label for="login"><?php echo $text['auth_email']; ?></label>
                <input type="text" name="email" id="login" placeholder="">
            </p>
            <p class="clearfix">
                <label for="password"><?php echo $text['auth_password']; ?></label>
                <input type="password" name="password" id="password" placeholder=""> 
            </p>
            <?php if ($message == "login_message_incorrect"): ?>
                <div class="clearfix">
                    <div class="g-recaptcha" data-sitekey="6LcT9RoTAAAAAJzG4Q3JKiwRc5nznlxkg9HoBXOj">                    
                    </div>
                </div>
            <?php endif; ?>
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
            <p><?php echo $text['login_noacc']; ?>
            <a href= "/auth/register"><?php echo $text['login_register']; ?></a>
            </p>
            <p><a href="/auth/restore"><?php echo $text['auth_forgot']; ?></a> </p>
            <p><?php echo $text['auth_copyright']; ?></p>
        </div>
    </section>

</div>