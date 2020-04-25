<?php

function notset($cookie){
    return !isset($cookie) || empty($cookie); 

}

if (notset($_COOKIE['vanilla_user']) || notset($_COOKIE['vanilla_auth'])){
    header("Location: login.php?message=please%20log%20in%20to%20see%20this%20page.");
    exit();
}

$secret = $_ENV['SERVER_SECRET'] ?? "Not Alice";
$auth_hash = md5($_COOKIE['vanilla_user'] . $secret);
if (strcmp($_COOKIE['vanilla_auth'], $auth_hash) != 0){
    setcookie('vanilla_user', '', 1, '/');
    setcookie('vanilla_auth', '', 1, '/');
    header("Location: login.php?message=invalid%20cookie...");
    exit();
}
?>

<html>
<head>
<title>Super Secret Page</title>
</head>
<body>
<?php include('../components/navbar.php') ?>
<?php include('../components/alertMessage.php') ?>
<?php include('../components/successTile.php') ?>
</body>
</html>