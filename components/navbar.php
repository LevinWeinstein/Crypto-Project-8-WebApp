<nav>
  <div><a href="main.php">Lev's Login System</a></div>

  <?php
    if (!empty($_COOKIE['vanilla_user'])){
        echo '<div><a href="controllers/logoutController.php">Logout</a></div>' . PHP_EOL; 
    } else {
        echo '<div><a href="login.php">Login</a></div>' . PHP_EOL;
        echo '<div><a href="register.php">Register</a></div>' . PHP_EOL;
    }
   ?>
  <style scoped>
    nav div {
        display: inline-flex;
        padding: 10px 20px 10px 20px;
        font-family: "Courier New", Courier, monospace;
        color: white;
    }

    nav {
        position: fixed;
        z-index: 0;
        top: 10px;
        width: 100.5%;
        
        text-align: right;
        background-color: #006390;
        margin: -10px;
        
        box-shadow: 0px 1px 4px;
    }

    nav div, nav {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    nav div:first-child {
        float: left;
    }

    nav div:hover {
        box-shadow: 0px 0px 1px 0px black;
    }

    nav div:active {
        box-shadow: 0px 1px 2px 0px black;
    }

    nav div a {
        color: white;
        text-decoration: none;
    }
  </style>
</nav>