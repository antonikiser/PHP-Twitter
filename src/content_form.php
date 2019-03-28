<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action = "do_login.php" method="post">
              <h1>Logowanie</h1>
              <div>
                <input name="login" type="text" method "post" class="form-control" placeholder="Login" required="" />
              </div>
              <div>
                <input name="password" type="text" method "post" class="form-control" placeholder="Haslo" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" >Zaloguj sie</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Jestes nowym uzytkownikiem?
                  <a href="register.php" class="to_register"> Zarejestruj sie! </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="do_register.php" method="post">
              <h1>Stworz nowe konto</h1>
              <div>
                <input type="text" method "post" class="form-control" placeholder="Username" name="username__rejestracji" required="" />
              </div>
			  <div>
                <input type="text" method "post" class="form-control" placeholder="Login" name="login_rejestracji" required="" />
              </div>
              <div>
                <input type="text" method "post" class="form-control" placeholder="Email" name="email_rejestracji" required="" />
              </div>
              <div>
                <input type="text" method "post" class="form-control" placeholder="Password" "haslo_rejestracji" required="" />
              </div>
			  <div>
                <input type="text" method "post" class="form-control" placeholder="Password" "haslo2_rejestracji" required="" />
              </div>
              <div>
                <input type="submit"   >Zarejestruj sie!</a> href="do_register.php          class="btn btn-default submit"
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Masz juz konto?
                  <a href="includer_form.php" class="to_register"> Zaloguj sie! </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>

                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
