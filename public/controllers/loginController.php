<?php
   include('../../db/models/user.php');

   if (!isset($_POST['username']) || !isset($_POST['password'])){
        header("Location: ../login.php?message=Form Data Incomplete");
        exit();
   } else if (!User::exists($_POST['username'])){
        header("Location: ../login.php?message=User Not Found");
        exit();
   } else if (!User::password_matches($_POST['username'], $_POST['password'])){
        header("Location: ../login.php?message=Wrong Password!");
        exit();
   } else {
        $secret = $_ENV['SERVER_SECRET'] ?? "Not Alice";

        setcookie("vanilla_user", $_POST['username'], null, "/");
        setcookie("vanilla_auth", md5($_POST['username'] . $secret), null, '/');

        header("Location: ../main.php");
        exit();
   }
?>