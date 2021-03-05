<?php 
    $componentsPath = '/var/www/html/views/components/';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../asset/stylesheet/searchResult.css">
　　</head>
    <body>
        <?php require $componentsPath . 'header.php'; ?>

        <main>
            <div>
                <h3 class=link><a href="/index">←トップページに戻る</a></h3>
            </div>
                <div class="wrapper">
                    <!--暫定の繰り返し処理-->
                    <?php for($i = 0; $i < 8; ++$i): ?>

                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <h4>団体名<?php echo $i + 1; ?></h4>
                        <p>概要aaaaaaaaaaaaa</p>
                    </div>
                    
                    <?php endfor; ?>
                </div>
        </main>
       
        <?php require $componentsPath. 'footer.php'; ?>


    </body>
           

</html>
