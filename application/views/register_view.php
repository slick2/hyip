<div class="container">
        
            <!-- Codrops top bar -->
            <div class="company-logo-lock">
            
            </div><!--/ Codrops top bar -->

            
            <section class="main">
                <form class="form-3" action="" id="loginform" method="post" name="loginform" style="width: 350px;">
                                    <p class="clearfix">
                        <label for="full_name">Полное имя</label>
                        <input type="text" name="full_name" id="login" placeholder="Имя">
                    </p>
                                        <p class="clearfix">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="login" placeholder="Email">
                    </p>

                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" placeholder="Пароль"> 

                    <p class="clearfix">
                        <label for="repeat_password">Повторите пароль</label>
                        <input type="password" name="repeat_password" id="password" placeholder="Повторить пароль"> 
                    </p>
                    <p class="clearfix">
                        <input type="submit" name="register" value="Зарегистрироваться" name="login" style="margin: 0;">
                    </p>       
                </form>​
                <?php if (!empty($message))
                {
                    echo "<p class=\"error\">" . $message . "</p>";
                } ?>

                        <div class="log-reg">
                            <p>Уже зарегистрированы?</p>
                            <a href= "/auth">Войти</a>
                            <p>Copyright 2015 ITInvestProject. Все права защищены.</p>
                        </div>
            </section>
            
        </div>