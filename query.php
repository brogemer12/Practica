<?php
session_start();
    require_once("db.php");
            
    // Регистрация (Занос данных в таблицу user)
    if(isset($_POST["register"])){
        if(isset($_POST["password1"]) && isset($_POST["password"])){
                if($_POST["password1"] == $_POST["password"]){
                    $sql = "INSERT INTO `users`( `login`, `password`, `email`, `role`) VALUES 
                        ('".$_POST['login']."',
                         PASSWORD('".$_POST['password']."'),
                         '".$_POST['email']."', 'read')";   
                var_dump($sql);
                $result = mysqli_query($mysqli, $sql);
                if(mysqli_errno($mysqli)) echo mysqli_error();
                header('Location: http://localhost/Simakov/Practica/SignUp.php');
            }else{
                header('Location: http://localhost/Simakov/Practica/SignIn.php');
            }
        }
    }

    // Добавления записи в таблицу 'a'
    elseif(isset($_POST["create"])){
        $sql = "INSERT INTO `a`(`First name`, `Name`, `Last name`, `Phone`, `email`, `Adres`, `User_id`) VALUES
                 ('".$_POST['Firstname']."',
                 '".$_POST['name']."',
                 '".$_POST['Lastname']."',
                 '".$_POST['phone']."',
                 '".$_POST['email']."',
                 '".$_POST['addres']."',
                 '".$_SESSION['userId']."')";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        header('Location: http://localhost/Simakov/Practica/content.php');
    }

    // Вход в аккаунт и проверка логина и пароля
    elseif(isset($_POST["Login"])){
        $name = $_POST["name"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM `users` WHERE `login`='".$name."' AND `password`=PASSWORD('".$password."')";
        // var_dump($sql);
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        $row =mysqli_fetch_row($result);

        if($row <= 0){
            header('Location: http://localhost/Simakov/Practica/error.html');
        }
        elseif( $row >0 ){
            $_SESSION['userId'] = $row[0];
            $_SESSION['role'] = $row[4];
            var_dump($_SESSION['role']);
            header('Location: http://localhost/Simakov/Practica/content.php');
        }
    }

    elseif(isset($_GET["role"])){
        $sql = "UPDATE `users` SET `role`='".$_GET['role']."' WHERE user_id ='".$_GET['id']."'";
        // var_dump($sql);
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        header('Location: http://localhost/Simakov/Practica/admin_panel.php');
    }
    // удаление карточки друга
    elseif(isset($_GET["del"])){
        $sql = "DELETE FROM `a` WHERE id ='".$_GET['id']."'";
        // var_dump($sql);
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        header('Location: http://localhost/Simakov/Practica/content.php');
    }
    // обновление карточки друга
    elseif(isset($_POST["update"])){
        $sql = "UPDATE `a` SET 
        `First name`='".$_POST['UFirstname']."',
        `Name`='".$_POST['Uname']."',
        `Last name`='".$_POST['ULastname']."',
        `Phone`='".$_POST['Uphone']."',
        `email`='".$_POST['Uemail']."',
        `Adres`='".$_POST['Uaddres']."' 
        WHERE id='".$_POST['id']."'";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        header('Location: http://localhost/Simakov/Practica/content.php');
    }
    // Коментраии запись в таблицу coments
    elseif(isset($_POST["coments"])){
        $sql = "INSERT INTO `coments`(`comment`, `user_id`, `article_id`) VALUES
                 ('".$_POST['coment']."',
                 '".$_SESSION['userId']."',
                 '".$_POST['id']."')";
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        header('Location: cards.php?id='.$_POST['id'].'');
    }


    elseif(isset($_GET["EditText"])){
        $sql = "UPDATE `coments` SET 
        `comment`='".$_GET['EditText']."'
        WHERE id = '".$_GET['id_comment']."'";
        var_dump($sql);
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        header('Location: http://localhost/Simakov/Practica/cards.php?id='.$_GET['id']);
    }


    elseif(isset($_GET["id_comment"])){
        $sql = "DELETE FROM `coments` WHERE id = '".$_GET["id_comment"]."'";
        var_dump($sql);
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_errno($mysqli)) echo mysqli_error();
        header('Location: http://localhost/Simakov/Practica/cards.php?id='.$_GET['id']);
    }
?>