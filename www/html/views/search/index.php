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
        
            <div id="introduce">
                <h2>困っていることにあった支援・相談先を探せる！検索システム</h2>
                <ul>
                    <li>仕事を失った」「お金がない」、一人ではどうしようもない時でも相談先がない。</li>
                    <li>どんな支援があるか、受給資格があるかわからない、、、、。</li>
                </ul>
                <p class="break-word"><span class="red">そんな時に、支援・相談先を簡単に探せるように、お手伝いさせていただきます！</span></p>
                &#9733;民間支援に<span class="red">要件は基本的にありません</span>　諦める前に一度だけ検索してください</p>
            </div>

            <?php require $componentsPath. 'searchbox.php'; ?>
        
        </main>

   
    </body>
</html>