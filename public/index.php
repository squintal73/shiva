<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shiva Framework 0.1</title>
    </head>
    <body>
        <?php
            require './vendor/autoload.php';

            $url = new Conf\ConfigController();
            $url->loadpage();
        ?>
    </body>
</html>