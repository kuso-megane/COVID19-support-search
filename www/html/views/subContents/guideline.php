<?php
require_once '../../../vendor/autoload.php'; //for dev
use myapp\config\AppConfig;
use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo '運営方針 - '. AppConfig::TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'subContents/guideline.css'; ?>">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>

        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="guideline" class="main--single">

                    <div id="guideline--core">
                        <h3 class="subTitle block-start0">&lt;免責事項&gt;</h3>
                        <div id="guideline--core--main" class="guideline--mains">
                            <li>
                                本サイトで提示する公的機関と民間機関の情報はなるべく最新かつ正確な状態で維持するように心がけております。しかし、完全無欠と言い切ることはできないので、その点ご留意ください。
                            </li>
                            <li>
                                大半の民間機関は誠心誠意活動していますが、貧困ビジネス（サービスに比べて異常に高額な料金を請求する、利用者の生活保護費や年金を巻き上げるなど）をする民間機関が一部存在すると指摘されています。本サイトでは、事前に民間機関をインターネットで調べ、貧困ビジネスではないかという懸念がある団体の情報を提示しないように配慮しております。しかし、事前調査には限界があり、貧困ビジネスと指摘される団体を完全に排除できていると断言することはできません。そこで利用者の皆様におかれましては、まず公的機関のサービスの利用を検討してみる、または「認定」NPO法人や「公益」法人など、行政がその健全性を審査している機関を優先的に利用するなどの配慮をしていただくようにお願い致します。
                            </li>
                            <li>
                                本サイトはあくまで利用者の皆様に公的機関や民間機関を紹介することにとどまるものです。したがって、利用者の皆様が実際に本サイトの提示した機関を利用し、満足のいくサービスを受けられなかった、または何らかの損害を被った/与えた等の事情がございましても、本サイトの運営者が何ら責任を負うことはできないことをご了承ください。
                            </li>
                        </div>
                    </div>

                    <div id="guideline--personalInfo">
                        <h3 class="subTitle">&lt;個人情報の取り扱いについて&gt;</h3>
                        <div id="guideline--personalInfo--main" class="guideline--mains">
                            <li>
                                本サイトでは個人情報を収集しておりません。また検索履歴については、直前の検索がサイト利用中には一時的に保存されますが、本サイトを離れ次第、自動的に消去されます。
                            </li>
                        </div>
                    </div>

                    <div id="guideline--others">
                        <h3 class="subTitle">&lt;その他&gt;</h3>
                        <div id="guideline--others--main" class="guideline--mains">
                            <li>
                                本サイトが提示する公的機関・民間機関の情報が不正確・不適切である、または提示された機関の中に貧困ビジネスを行う機関があるなどの有害的記載事項があれば、本サイトのお問い合わせにてご連絡下さい。その場合、その機関の情報の提示の停止又は廃止等の措置を取らせていただきます。
                            </li>
                            <li>
                                本サイトが提示する公的機関・民間機関に問い合わせをしたいときは、直接その機関に問い合わせするようにお願いいたします。
                            </li>
                            <li>
                                本サイトのリンク等を利用することは自由です
                            </li>
                            <li>
                                提示する機関の情報等を含め、本サイトの記載は予告なく変更・削除されることがあります。
                            </li>
                            <li>
                                本サイトはすべての公的機関・民間機関を網羅しているわけではございません。
                            </li>
                        </div>
                    </div>
                </div>
            </div>   
        </main>
    </body>
</html>