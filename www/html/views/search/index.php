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
        <form action="" method="">
            <div class="searching">
                <div class="support1 box">
                    <p>必要とする支援</p>
                    <select name="support1" id="support1">
                        <option value="consulting">生活一般について相談</option>
                        <option value="house">住居入居支援</option>
                        <option value="foodbank">食料の無料提供</option>
                        <option value="eating">炊き出し</option>
                    </select>
                </div>
                <div class="support2 box">
                    <p>必要とする支援</p>
                    <select name="support2">
                        <option value="consulting">生活一般について相談</option>
                        <option value="house">住居入居支援</option>
                        <option value="foodbank">食料の無料提供</option>
                        <option value="eating">炊き出し</option>
                    </select>
                </div>
                <div class="area box">
                    <p>地域</p>            
                    <select name="area">
                        <option value="">全国</option>
                        <option value="">東京</option>
                        <option value="">大阪</option>
                        <option value="">名古屋</option>
                    </select>
                
                </div>
                <div class="condition box">
                    <p>気になる条件</p>
                    <input id="foreign" type="checkbox" name="condition" value="foreign"><label for="foreign">国籍不問</label>
                    <input id="soon" type="checkbox" name="condition" value="soon"><label for="soon">24時間以内に必要</label>
                    <input id="public" type="checkbox" name="condition" value="public"><label for="public">公的支援のみ</label>
                    <input id="private" type="checkbox" name="condition" value="private"><label for="private">民間支援のみ</label>
                    
                </div>
                
            <div> 
            <div id="submit">   
                 <input type="submit" value="検索する🔍">
            </div>
        </form>





            <div id="introduce">
                <h2>自分に必要な支援・相談先を探せる！検索システム</h2>
                <p>「仕事を失った」「お金がない」、一人ではどうしようもない時<br>でも相談先がない。どんな支援があるか、受給資格があるかわからない<br><span>そんな時に、必要とする支援・相談先を簡単に探せるように、お手伝いさせていただきます！</span><br>★民間支援に<span>要件は基本的にありません</span>　諦める前に一度だけ検索してください</p>
            </div>
        </main>

   
    </body>
</html>