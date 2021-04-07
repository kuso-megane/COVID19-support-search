
<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $articleContent['title'] . '- '. AppConfig::TITLE; ?></title>

        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>

    </head>
    <body>
        
    </body>
</html>