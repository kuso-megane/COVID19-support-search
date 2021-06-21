<?php

use myapp\config\ViewsConfig;

?>


<html>
    <head>  
        <title>管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'backyardSupportOrgs/index.css'; ?>">
    </head>
    <body>
        <h2>支援団体編集</h2>
        <p>支援団体名で検索(20字以内)</p>
        <input type="search" name="name" id="name-search" maxlength="20" placeholder="支援団体名(部分一致)">
        <table>
            <thead>
                <td>編集</td>
                <td>運営者</td>
                <td>支援内容</td>
                <td>都道府県</td>
            </thead>
            <tbody>
                <td></td>
                <td></td>
            </tbody>
        </table>
    </body>
</html>
