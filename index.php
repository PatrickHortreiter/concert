<?php
include 'includes/login.php';
?>
<?php
include 'includes/newUserDB.php';
?>
<!DOCTYPE html>


<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- mobile-first -->

    <title>xor Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="scss/main.css" rel="stylesheet">
    <link href="scss/home.css" rel="stylesheet">
    <link rel="icon" href="images/logo1.png">
    <script language="javascript" type="text/javascript" src="jQuery/jQuery.js"></script>
    <script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/pic.js"></script>

</head>
<body>

<header>
    <div class="width">
        <h1>Concert</h1>
    </div>
</header>

<main>
<!--    <div class="width">-->

        <!--Loginbox-->
        <div class="loginbox">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button class="btn btn-default" type="submit">
                    Login
                </button>

                <!-- GetAccount Button => Lightbox Class: button-->
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">
                    Get Account
                </button>
            </form>
                <?php if ($ifError && !$regsuccess && !$regfail): ?>
                    <div class="error">
                        <p>Wrong email or password! Please try again.</p> <!-- Error message if typed in wrong password or wrong email -->
                    </div>
                <?php endif; ?>
                <?php if ($regfail): ?>
                    <div class="error">
                        <p>This email has already been registered.</p> <!-- Error message if tried to register with existing email -->
                    </div>
                <?php endif ?>

                <?php if ($passfail): ?>
                    <div class="error">
                        <p>Passwords are not identical. Please try to register again.</p> <!-- Error message if passwords do not match in registration -->
                    </div>
                <?php endif ?>

                <?php if ($regsuccess): ?>
                    <div class="regsuccess">
                        <p>Registration was successful!</p> <!-- Success message if registration did not have any errors -->
                    </div>
                <?php endif; ?>

        </div>

     <!-- Lightbox for registration -->
        <div class="modal fade backlight" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <!--Class: Lightbox-->
                <div class="modal-content lightbox">
                    <div class="modal-header">
                        <!-- Close Button -->
                        <button type="button" class="close x" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            <h4 class="modal-title x" id="myModalLabel">Get Account</h4>
                    </div>
                    <form class="input-style" action="" method="post">
                        <b class="x">Email:</b><br>
                        <input type="email" size="40" maxlength="250" class="form-control" name="email"><br>

                        <b class="x">UserName:</b><br>
                        <input type="username" size="40" maxlength="250" class="form-control" name="username"><br><br>

                        <b class="x">Your password:</b><br>
                        <input type="password" size="40" maxlength="250" class="form-control" name="passwort" ><br>

                        <b class="x">Retype password:</b><br>
                        <input type="password" size="40" maxlength="250" class="form-control" name="passwort2"><br><br>

                        <input type="submit" class="btn btn-default" value="Registrieren">
                    </form>
                </div>
            </div>
        </div>

    </div>

</main>

<!-- Empty div element for style purposes for not hiding login behind footer when narrowing the page -->
<div style="height: 120px"></div>

<footer>

    <i>Sponsord by <b>"THEFLATEARTHSOCIETY"</b></i>


</footer>

</body>
</html>