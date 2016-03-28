<div class="container">
        
            <!-- Codrops top bar -->
            <div class="company-logo-lock">
            
            </div><!--/ Codrops top bar -->

            
            <section class="main">
                <form class="form-3" action="" id="loginform" method="post" name="loginform">
                    <p class="clearfix">
                        <label for="login">Email</label>
                        <input type="text" name="email" id="login" placeholder="">
                    </p>
                    <p class="clearfix">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" placeholder=""> 
                    </p>
                    <p class="clearfix">
                        <input type="submit" name="submit" value="Войти" name="login">
                    </p>       
                </form>​
            <div class="log-invalid">
                <span>
                    <?php
                    if (isset($data) && isset($_POST["email"]))
                    {
                        if ($data['message'] == "OK")
                        {
                            echo "<p style='color:green'>Авторизация прошла успешно.</p>";
                        }
                        else
                        {
                            echo "<p style='color:red'><i class='fa fa-exclamation-circle'></i>{$data['message']}</p>";
                        }
                    }
                    ?>
                </span>
            </div>
                        <div class="log-reg">
                            <p>Еще нет аккаунта?</p>
                            <a href= "/auth/register">Регистрация</a>
                            <p>Copyright 2015 ITInvestProject. Все права защищены.</p>
                        </div>
            </section>
            
        </div>