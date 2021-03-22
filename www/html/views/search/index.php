<?php 
    $componentsPath = '/var/www/html/views/components/';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../asset/stylesheet/index.css">

    </head>
    <body>
        <?php require $componentsPath . 'header.php'; ?>

        <main>
            <div id="introduce-container">
                <div id="introduce" class="center">
                    <h2>困っていることにあった支援・相談先を探せる検索システム!</h2>
                    <div class="inline-block left">
                        <p>&bull;仕事を失った、生活費が足りない、一人ではどうしようもない時でも相談先がない、、、。</p>
                        <p>&bull;どんな支援があるか、受給資格があるかわからない、、、、。</p>
                        <p class="break-word"><span class="red">そんな時に、支援・相談先を簡単に探せるように、お手伝いさせていただきます！</span></p>
                        &#9733;特に民間支援には<span class="red">要件が基本的にありません。</span> 諦める前に一度だけでも検索してみてください</p>
                    </div>
                </div>
            </div>
        </main>

        <?php require $componentsPath. 'searchbox.php'; ?>

    </body>
</html>