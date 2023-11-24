<?php

include(__DIR__ . "/includes/functions.php");

$connection = connection();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz@1,6..96&family=Cinzel+Decorative&family=MedievalSharp&family=MonteCarlo&family=Playfair+Display&family=Poppins:wght@100&display=swap');
    </style>
    <link rel="stylesheet" href="../cikkphp/styles/user_page.css">
    <script src="../cikkphp/scripts/jquery-3.7.0.js"></script>
    <title>Document</title>
</head>

<body>
    <?php print getMenu() ?>

    <?php print getContent($_SERVER["REQUEST_URI"], $connection) ?>

    <?php print getFooter() ?>
</body>

</html>