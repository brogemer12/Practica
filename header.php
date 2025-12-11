<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe&family=Vend+Sans:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe&family=Bungee+Spice&family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Vend+Sans:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <title>Practica</title>
</head> 
<body>
    <header>
        
        <nav>
            <?php if(isset($_SESSION['role']) != 'admin' && isset($_SESSION['role']) != 'read'):?>

                <a class="my-button dancing-script-uniquifier" href="http://localhost/Simakov/Practica/SignIn.php">Registration</a>
                <a class="my-button dancing-script-uniquifier" href="http://localhost/Simakov/Practica/SignUp.php">Login</a>
            <?php endif;?>
            <?php if(isset($_SESSION['role']) == 'read' || isset($_SESSION['role']) == 'admin'):?>
                    <a class="my-button dancing-script-uniquifier" href="http://localhost/Simakov/Practica/content.php">Read</a>
                    <a class="my-button dancing-script-uniquifier" href="http://localhost/Simakov/Practica/create.php">Create</a>
                    <a class="my-button dancing-script-uniquifier" href="http://localhost/Simakov/Practica/SignUp.php">Exit</a>
            <?php endif;?>
            <?php if(isset($_SESSION['role'])):?>
                <?php if($_SESSION['role'] == 'admin'):?>
                    <a class="my-button dancing-script-uniquifier" href="http://localhost/Simakov/Practica/admin_panel.php">Admin</a>
                <?php endif;?>
            <?php endif;?>
        </nav>
        
    </header>
    <main>
        <div class="container alumni-sans-pinstripe-regular">