<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;

?>

<!DOCTYPE html>
<html>
    <head>  
        <title>管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'backyardSupportOrgs/index.css'; ?>">
    </head>
    <body>
        <h2>支援団体編集</h2>
        <p>支援団体名で検索(20字以内、大文字小文字区別なし)</p>
        <form action="/backyard/supportOrgs/index" method="GET">
            <input type="search" name="owner_word" id="name-search" maxlength="20" placeholder="支援団体名(部分一致)">
            <input type="submit">
        </form>
        
        <p><?php echo AppConfig::BY_SUPPORT_ORGS_MAXNUM_PER_PAGE; ?>件以上は表示されません。なるべく絞り込んでください。</p>
        <table>
            <thead>
                <tr>
                    <td>編集</td>
                    <td>団体名</td>
                    <td>支援内容</td>
                    <td>都道府県</td>
                    <td>備考</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searchedSupports as $searchedSupport): ?>
                    <tr>
                        <td><a href="<?php echo '/backyard/supportOrgs/edit/' . $searchedSupport['id']; ?>">編集</a></td>
                        <td><?php echo $searchedSupport['owner']; ?></td>
                        <td><?php echo $searchedSupport['support_content']; ?></td>
                        <td><?php echo $areaList[$searchedSupport['area_id']]; ?></td>
                        <td><?php echo htmlspecialchars($searchedSupport['appendix'], ENT_QUOTES); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p><a href="/backyard/">管理画面topページへ</a></p>
    </body>
</html>
