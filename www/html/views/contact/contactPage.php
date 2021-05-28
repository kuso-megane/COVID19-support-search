<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo "お問い合わせ -" . AppConfig::TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'contact/contactPage.css'; ?>" >
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="contact" class="main--single">
                    <h3 class="block-start0">&lt;お問い合わせ&gt;</h3>
                    <p class="block-end0">メールアドレス:</p>
                    <p class="bold block-start0 block-end0"><?php echo $adress; ?></p>
                    <p>
                        twitter: 
                        <a class ="bold blue" href="https://twitter.com/suppofy" target="_blank" rel="noopener noreferrer">
                            https://twitter.com/suppofy
                        </a>
                    </p>
                </div>
            </div>
        </main>
    </body>
</html>
