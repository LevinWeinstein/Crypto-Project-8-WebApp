<?php
    setcookie('vanilla_user', '', 1, '/');
    setcookie('vanilla_auth', '', 1, '/');
    header("Location: ../login.php?message=successfully%20logged%20out.");
    exit();
?>