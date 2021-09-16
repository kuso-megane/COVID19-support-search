<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo '運営者紹介 - '. AppConfig::TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'subContents/adminIntro.css'; ?>">
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="adminIntro" class="main--single">
                    <h3 class="subTitle block-start0">&lt;サービス運営者紹介&gt;</h3>
                    <p id="note">&#10004; 記載内容は執筆時点(2021年9月)のものです。</p>

                    <div class="administrators">
                        <h4><i class="fas fa-user-tie"></i> H.Y</h4>
                        <p class="administrators--part">企画、コラム執筆、支援団体情報収集担当</p>
                        <p class="administrators--main">
                            &emsp;都内の大学に通う大学4年生。下のO.Kとはクラスが同じだった。公務員志望。<br>&emsp;社会課題を研究する大学のゼミで、公的制度やNPOの活動が肝心の苦労している人々に知られていない・使われていないと学んだことから、そのような状況を変えるために「小さなことでも自分に何かできることはないか」と悩み、本サイトの作成を思いついた。ゼミでの経験を活かし、本サイトが提供する情報の収集やサービスの具体的な内容を考えることを担当している。
                        </p>
                    </div>
                    <div class="administrators">
                        <h4><i class="fas fa-glasses"></i> O.K</h4>
                        <p class="administrators--part">サイト作成、デザイン担当</p>
                        <p class="administrators--main">
                            &emsp;上のH.Yと同じ大学の3年生。エンジニア志望。<br>&emsp;約1年間、企業のwebページ開発部門でのインターン経験があり、そこで学んだスキルを生かす機会がないか考えていたところ、友人たちとzoomで雑談しているなかで、同席していたH.Yにこのサービスの開発に誘われた。いまはゲーム開発にも興味がある。
                        </p>
                    </div>
                    <div class="administrators">
                        <h4><i class="fas fa-pencil-ruler"></i> K.K</h4>
                        <p class="administrators--part">タイトルロゴ、サイトデザイン(一部)担当</p>
                        <p class="administrators--main">
                            &emsp;上のO.Kの友人。現在は、フロントエンドエンジニアとして内定。<br>&emsp;当時、就活で忙しいなか、O.Kの誘いで協力してもらった。ちなみにO.Kのtwitterアイコンも彼が作ったもの。
                        </p>
                    </div>

                </div>
            </div>
        </main>
    </body>
</html>