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
                    <h2>&lt;お問い合わせフォーム&gt;</h2>
                    <p>メールアドレス: <span class="bold"><?php echo $adress; ?></span></p>
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
