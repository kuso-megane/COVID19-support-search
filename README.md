# コロナ支援民間組織の検索、紹介サービス

## 環境
- dockerコンテナを構築し、apache2 + php + mysqlで作成。
- phpのFWは特に使用してません

## frontend
- www/html/views配下にhtml(拡張子は基本php)を記述
- asset/scss配下にscssファイルがある。
- asset/scssに移動し、```./sass.sh```を実行すると、scssファイルが一括コンパイルされる
- 画像は、www/html/asset/img/配下に

## 外部ライブラリ
- polyfill.js
- [Font Awesome](https://fontawesome.com/)
- あとはwww/composer.jsonみてください
