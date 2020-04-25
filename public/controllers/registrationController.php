<?php
    include('../../db/models/user.php');


    if (!isset($_POST['username']) ||
        !isset($_POST['password']) ||
        !isset($_POST['password-confirm'])){
        
        header("Location: ../register.php?message=Form Data Incomplete");
        exit();
    } else if (User::exists($_POST['username'])){
        header("Location: ../register.php?message=User Already Exists!");
    } else if (strcmp($_POST['password'], $_POST['password-confirm']) != 0){
        header("Location: ../register.php?message=Passwords Must Match!");
    } else if (strcmp($_POST['username'], strip_tags($_POST['username'])) != 0){
        header("Location: ../register.php?message=Invalid Username!");
    } else if (strlen($_POST['username']) < 5){
        header("Location: ../register.php?message=Username must be at least 5 characters.");
    } else if (strlen($_POST['password']) < 8){
        header("Location: ../register.php?message=Password must be at least 8 characters.");
    }else if (strlen($_POST['username']) >= 30){
        header("Location: ../register.php?message=Username must be fewer than 30 characters.");
    } else {
        User::add($_POST['username'], $_POST['password']);
        header("Location: ../login.php?message=Account Created! Log in to continue.");
    }
    

?>