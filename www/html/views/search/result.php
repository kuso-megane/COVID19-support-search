<?php 
    $componentsPath = '/var/www/html/views/components/';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>
        <link rel="stylesheet" type="text/css" href="../../asset/stylesheet/searchResult.css">
　　</head>
    <body>
        <?php require $componentsPath . 'header.php'; ?>



        <main>
            <!-- todo: containerをたくさんならべる感じにしてほしい、container１つに対し団体一個, flex-containerは別途つくる-->
            <div>
                <h3><a href="/index">←トップページに戻る</a></h3>
            </div>
                <div class="wrapper">
                    <!--こんな感じにしてほしい-->
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <!--ここから修正して-->
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>
                    <div class="container">
                        <img class="thumbnail" src="/asset/img/test2.jpg">
                        <p>団体名1</p>
                        <p>概要</p>
                    </div>




                        
                    </div>
                </div>
        </main>
        
    </body>
        
    <footer>
    
    </footer>

        <footer>
    
        </footer>
    </body>


</html>