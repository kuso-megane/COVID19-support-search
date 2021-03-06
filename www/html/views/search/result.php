<?php 
    $componentsPath = '/var/www/html/views/components/';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>
        <meta name="viewpor" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../asset/stylesheet/searchResult.css">
　　</head>
    <body>
        <?php require $componentsPath . 'header.php'; ?>

        <main>
            <div>
                <h3 class="link"><a href="/index">←トップページに戻る</a></h3>
            </div>
            <div>
                <!--検索に該当する、民間組織のリスト-->
            </div>
        </main>
       
        <?php require $componentsPath. 'footer.php'; ?>


    </body>
           

</html>
