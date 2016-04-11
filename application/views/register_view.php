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

        <?php if (isset($data['referrer'])): ?>
        <p class="clearfix" style="text-align: center" >
                <?php echo $text['refyou'] . " : " . $data['referrer']; ?>
            </p>
        <?php endif; ?>

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
                <div class="g-recaptcha" data-sitekey="6LcT9RoTAAAAAJzG4Q3JKiwRc5nznlxkg9HoBXOj">                    
                </div>
            </p>
            <p style="color:#fff; text-align: center;"><?php echo $text['register_rulesfollow']; ?> <a href="https://itinvestproject.com/pravila-kompanii/" target="_blank"><?php echo $text['register_rules']; ?></a> <?php echo $text['register_itinvest']; ?></p>
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
            <a href= "/auth"><?php echo $text['register_login']; ?></a>
            <p><?php echo $text['auth_copyright']; ?></p>
        </div>
    </section>

</div>