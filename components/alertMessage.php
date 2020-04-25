<?php
    if (isset($_GET['message'])){
        $message = $_GET['message'];
        $visibility = "visible";
    } else {
        $message = "Nonexistent Error";
        $visibility = "hidden";
    }

    // Cannot inject script tag.
    if (strpos($message, "<") || strpos($message, ">")){
        return ;
    }


    echo '<br /><br /><div class="alert">' . PHP_EOL;
    echo '  <span class="closebtn" onclick="this.parentElement.style.visibility=\'hidden\';">&times;</span>';
    echo $message;
    echo '</div>';

    $css = "
        body {
            background-color: #EDEAD0;
        }

        .alert {
            font-family: \"Courier New\", Courier, monospace;

            visibility: " . $visibility . ";
            padding-top = 42px;
            border-radius: 5px;
            box-shadow: 0px 1px 2px black;
            cursor: default;
            padding: 20px;
            background-color: #424242;
            color: #66D9EF;
            margin-bottom: 15px;
            z-index: 1;
        }

        .alert:hover{
            z-index: 1;
            box-shadow: 0px 2px 4px black;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: maroon;
        }
    ";

    echo "<style scoped>" . $css . "</style>";
?>