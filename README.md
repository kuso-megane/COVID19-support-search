# 支援組織・相談窓口の検索サービス

## 開発環境
- dockerコンテナを構築し、apache2 + php + mysqlで作成。
- 勉強のため、phpのFWは使用してません

## deploy環境
- aws ECS + EC2 + RDS
- ECRからappコンテナのイメージを保存
- ECS管理下のEC2インスタンスに、git経由でコードを反映
- ECS管理下のEC2インスタンス内の、appコンテナの環境変数で、RDSの接続関連の情報を設定
- appコンテナの環境変数```IS_PROD```を```true```に設定。これに基づき、```www/config/DBConfig```がRDSの接続関連の情報を環境変数から取得。


## 環境構築
1. gitでコードをpull
1. docker, docker-composeのinstall
1. php, composerのinstall
1. dart/sassのinstall (動作確認済みはversion1.32.7)
1. サービスのdirにて、```docker-compose up -d```
1. Node.jsをinstall
1. ```npm -v```で5.12以上のversionになっていることを確認(babel関連のinstallのため)
1. サービスの最上位dirにて、```npm install```を実行
1. サービスの最上位dirにて、```./compile.sh```を実行(実行権限がない場合は```chmod 744 ./compile.sh```を実行してから再度試行)
1. www/ にて ```composer install```、本番環境は```composer install --no-dev```
1. (本番環境のみ)ec2-user所有の画像ファイルdirへの画像アップロードを```www-data```(apacheのuser)が行うため、ec2のdocker for linuxでは以下の権限変更が必要。(というか、docker for mac, windowsでなぜ権限変更なしに動くのか謎)
    - ec2のhostから```chmod o+x /path/to/www/html/asset/img```を実行。


## frontend
- www/html/views配下にhtml(拡張子は基本php)を記述
- scssやjsファイルは、サービスのdir(最上層)で```./compile.sh```を実行するとコンパイルされる。
- 画像は、www/html/asset/img/配下に


## backend
- MVC
- ```views/html/router/route.php```がurlを処理、該当するcontrollerの関数を呼び出す。

### Model
- domain層がビジネスロジック
- domainのmainが```Interactor```, viewに渡す変数を定めているのが```Presenter```
- infra層がDBと連絡する。

### infra
- database層がDBとアクセスしている。実体は、phpの```PDO```というAPIを使用
- test層がdatabase層のテストをしている。```PHPUnit```というライブラリを使用
- appコンテナ内で、www/配下で```./test.sh```を実行すると、テストがはしる。

### controller
- Modelから必要なデータを取得
- MyFrameWork/Bases/BaseControllerという親クラスがある。ここで```render()```関数を実装
- ```render()```関数が```Model/domain```の```Presenter```の返り値```['xxx' => $yyy]```から```$xxx = $yyy```として抽出、viewに渡す。
- どのviewを呼び出すかを決定。e.g. 英語版か日本語版かなど

### views
- controllerから呼び出されるhtml(phpファイル)および、css, js, imgなど

## 外部ライブラリ
- polyfill.js
- [Font Awesome](https://fontawesome.com/)
- あとはwww/composer.jsonみてください



