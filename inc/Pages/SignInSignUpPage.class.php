<?php

class SignInSignUpPage {

    static function showHeader() { ?>
        <!DOCTYPE html>
      <html>
          <head>
              <title>Dhir Enterprises</title>
              <meta charset="utf-8">
              <meta name="author" content="Chelsy, Chelsy">
              <link rel="stylesheet" href="css/styles_C.css">
          </head>
          <body>
              <section>
      </section>   
  <?php }
  
  static function footer() { ?>        
    </div>
        </body>
    </html>
<?php }

    static function showLogin() { ?>
        <!-- login section -->        
        <section>
            <div>                
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <h2>Please Sign in</h2>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login">
                    </div>
                    <p>Do not have an account? Please <a href="FinalProject_register.php">register</a></p>                
                </form>
            </div>
        </section>
    </body>
    </html>
    <?php }

        

}

?>