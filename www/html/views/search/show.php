<?php 
    $componentsPath = '/var/www/html/views/components/';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>
        <link rel="stylesheet" type="text/css" href="../../asset/stylesheet/show.css">
　　</head>
    <body>
        <?php require $componentsPath . 'header.php'; ?>

        <main>
            <!-- todo: containerをたくさんならべる感じにしてほしい、container１つに対し団体一個, flex-containerは別途つくる-->
            <div class="container">
                <div class="name">
                <img>
                <p>団体名1</p>
                <p>概要</p>
                </div>
                <div class="name">
                <img>
                <p>団体名2</p>
                <p>概要</p>
                </div>
                <div class="name">
                <img>
                <p>団体名3</p>
                <p>概要</p>
                </div>
                <div class="name">
                <img>
                <p>団体名4</p>
                <p>概要</p>
                </div>
            </div>
        </main>
        
    </body>
        
    <footer>
    
    </footer>



</html>