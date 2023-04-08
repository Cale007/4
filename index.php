<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight</title>
</head>
<body>
<?php

    function uploadClass($class)
    {
        require("classes/$class.php");
    }
    spl_autoload_register("uploadClass");

    $aragorn = new Warrior("Aragorn", 85, 35, 20);
    $saruman = new Wizard("Saruman", 65, 25, 15, 20, 30);

    $arena = new Arena($aragorn, $saruman);

    $arena->fight();
?>
</body>
</html>