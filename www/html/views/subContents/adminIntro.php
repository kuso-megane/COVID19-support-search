<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo '運営者紹介 - '. AppConfig::TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'subContents/adminIntro.css'; ?>">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="adminIntro" class="main--single">
                    <h3 class="subTitle block-start0">&lt;サービス運営者紹介&gt;</h3>
                    <p id="note">&#10004; 記載内容は執筆時点(2021年4月)のものです。</p>

                    <div class="administrators">
                        <h4><i class="fas fa-user-tie"></i> 堀　雄貴</h4>
                        <p class="administrators--part">企画、コラム執筆、データベース収集担当</p>
                        <p class="administrators--main">
                            &emsp;都内の大学に通う大学4年生。下の折田とはクラスが同じだった。公務員志望。<br>&emsp;社会課題を研究する大学のゼミで、公的制度やNPOの活動が肝心の苦労している人々に知られていない・使われていないと学んだことから、そのような状況を変えるために「小さなことでも自分に何かできることはないか」と悩み、本サイトの作成を思いついた。ゼミでの経験を活かし、本サイトが提供する情報の収集やサービスの具体的な内容を考えることを担当している。
                        </p>
                    </div>
                    <div class="administrators">
                        <h4><i class="fas fa-glasses"></i> 折田　和啓</h4>
                        <p class="administrators--part">ページ設計、ページデザイン担当</p>
                        <p class="administrators--main">
                            &emsp;上の堀と同じ大学の3年生。エンジニア志望。<br>&emsp;約1年間、企業のwebページ開発部門でのインターン経験があり、そこで学んだスキルを生かす機会がないか考えていたところ、友人たちとのオンラインの雑談のなかで、堀にこのサービスの開発に誘われた。今は、宗教学科という一見怪しいところに通っている。(実際は、ちゃんとしたところです。)
                        </p>
                    </div>
                    <div class="administrators">
                        <h4><i class="fas fa-pencil-ruler"></i> 角谷　克幸</h4>
                        <p class="administrators--part">タイトルロゴ、ページデザイン(一部)担当</p>
                        <p class="administrators--main">
                            &emsp;上の折田の友人。現在は、関東の大学を卒業し、デザイナーを目指して就職活動中。<br>&emsp;就活で忙しいなか、折田の誘いで協力してもらった。ちなみに折田のtwitterアイコンも彼が作ったもの。
                        </p>
                    </div>

                </div>
            </div>
        </main>
    </body>
</html>