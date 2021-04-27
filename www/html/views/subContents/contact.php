<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo "お問い合わせ -" . AppConfig::TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'subContents/contact.css'; ?>" >
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="contact" class="main--single">
                    <h3>お問い合わせフォーム</h3>
                    <form id="mail-form" action="" method="post" >
                        <p>お名前(必須):<input name="name" type="text" maxlength="50" require></p>
                        <p></p>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
