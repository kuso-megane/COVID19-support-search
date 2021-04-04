<?php 
    use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'search.css'; ?>">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="introduce" class="main--single">
                    <div class="center">
                        <h3 id="introduce--title" class="inline-block block-start0 left">困っていることにあった支援・相談先を探せる<br>検索システム!</h3>
                    </div>
                    <div id="introduce--main" class="inline-block left">
                        <p class="bold">このサイトは、官僚志望の学生と、プログラマー志望の学生が協力して、コロナ禍などが原因で困っている方々の力になるために作り上げた検索サービスです!</p>
                        <li>仕事を失った、生活費が足りない。</li>
                        <li>一人ではどうしようもない。でも相談先がない。</li>
                        <li>どんな支援があるか、受給資格があるかわからない。</li>
                        <p class="break-word">
                            <span class="red bold">こんな時に、支援・相談先を簡単に探せるように、お手伝いさせていただきます！</span>
                        </p>
                        <p>
                            &#9733;特に民間支援には<span class="green">支援を受ける条件が基本的にありません。</span> 諦める前に一度だけでも検索してみてください。
                        </p>
                        <p>
                            &#9733;支援を受ける際の<span class ="green">お役立ち情報</span>も発信しています！詳細は画面上部の<span class="green">「&gt;&gt;支援・制度利用時のお役立ち情報」</span>へ！
                        </p>

                    </div>
                </div> 
            </div>
            
            <div class="center">
                <div class="main--double">

                    <?php require ViewsConfig::COMPONENTS_PATH. 'searchbox.php'; ?>

                    <div id="howto" class="main--double--right">
                        <p class="subTitle bold block-start0">&lt;使い方&gt;</p>
                        <div id="howto--main">
                            <li>まずは、検索ボックスから、困っていること、地域、都道府県をお選びください。</li>
                            <li>日本国籍をお持ちでない方は、「国籍不問のみ」にチェックを入れることをおすすめします。</li>
                            <li>「この条件で検索」を押していただくと、検索結果とおすすめコラム(お役立ち情報)が表示されます。</li>
                            <li>検索結果ページでは、公的支援と民間支援をタブで切り替えることができます。</li>
                        </div>
                    </div>

                </div>
            </div>
            
        </main>


    </body>
</html>