<?php

$raw_dirs = scandir(getcwd());
$dirs = [];
$index = 0;
foreach ($raw_dirs as $dir) {
    if (!str_contains($dir, '.')) {
        $dirs[$index++] = $dir;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugasnya Ikhwanu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
        }

        #container {
            width: 50%;
            height: 50vh;
            overflow-y: scroll;
            background-color: #222;
            color: white;
            padding: 2em;
        }

        #container ul {
            width: 100%;
            margin-top: 1em;
            list-style: none;
        }

        #container li {
            padding: 0.2em;
            border: 1px solid aqua;
        }

        #container li:hover {
            background-color: #000;
        }

        #container a {
            font-size: 20px;
            margin-left: 4em;
            text-decoration: none;
            color: cornflowerblue;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1>Tugasnya <br>Ikhwanu Robik Saputra_SMK N1 Jatiroto</h1>
        <ul>
            <?php
            foreach ($dirs as $dir) {
                echo "<li><a href=\"" . "/" . $dir . "\">" . $dir . "</a></li>";
            }
            ?>
        </ul>
    </div>
</body>

</html>