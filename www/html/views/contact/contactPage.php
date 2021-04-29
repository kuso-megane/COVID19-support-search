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
                    <h2>お問い合わせフォーム</h2>
                    <p>今後実装予定です。至急のお問い合わせは、以下のアドレスへよろしくお願いいたします。</p>
                    <p>アドレス: <span class="bold"><?php echo $adress; ?></span></p>
                </div>
            </div>
        </main>
    </body>
</html>
