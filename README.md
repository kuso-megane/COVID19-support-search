# 支援組織・相談窓口の検索サービス

## 開発環境
- dockerコンテナを構築し、apache2 + php + mysqlで作成。
- phpのFWは使用してません

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
1. dart/sassのinstall
1. サービスのdirにて、```docker-compose up -d```
1. asset/scss/ にて　```./sass.sh```
1. www/ にて ```composer install```




## frontend
- www/html/views配下にhtml(拡張子は基本php)を記述
- asset/scss配下にscssファイルがある。
- asset/scssに移動し、```./sass.sh```を実行すると、scssファイルが一括コンパイルされる
- 画像は、www/html/asset/img/配下に

## 外部ライブラリ
- polyfill.js
- [Font Awesome](https://fontawesome.com/)
- あとはwww/composer.jsonみてください
