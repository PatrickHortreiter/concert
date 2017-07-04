<?php
    session_start();
    $loggedIn = isset ($_SESSION['login_user']);
    if($loggedIn){
        $urmail = $_SESSION['login_user'];
    }else{
        $urmail= '';
    }

?><!--Login/Logout-->


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- mobile-first -->

    <title>xor Application</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="scss/main.css" rel="stylesheet">
    <link href="scss/application.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="jQuery/jQuery.js"></script>
    <script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/pic.js" type="text/javascript"></script>


</head>

<body>

<header>
    <div class="width">
        <h1>Concert</h1>
    </div>
</header>

<main>
    <div class="width">
        <h2>Inhalt</h2>
    </div>
</main>

<footer>
    <div class="width">

        <!-- Displays the mail -->
        <div class="a" style="margin-left: -20px;">
            <p>Logged in as <b><?php echo $urmail; ?></b></p>
        </div>

        <!-- Logout Button-->
        <?php if ($loggedIn):?>
            <div class = "b" style="margin-right: -20px">
                <a href="../../../Users/Mir/Desktop/projectpiXOR-master/logout.php"><button class="btn btn-default">Logout</button></a>
            </div>
        <?php endif; ?>
    </div>

</footer>

</body>
</html>