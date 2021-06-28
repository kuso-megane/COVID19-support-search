<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;

/**
 * @var array $areaList [(int)id => name]
 * @var array $oldSupportOrg
 */

?>

<!DOCTYPE html>
<html>
    <head>  
        <title>管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'backyardSupportOrgs/edit.css'; ?>">
    </head>
    <body>
        <h2>支援団体編集</h2>
        
        <form action="/backyard/supportOrgs/edit/<?php echo $oldSupportOrg['id']; ?>" method="post">
            <p>都道府県</p>
            <select name="area_id" id="new-area">
                <?php for($i = 1; $i <= count($areaList); $i ++): ?>
                    <option value="<?php echo $i ?>" <?php if($oldSupportOrg['area_id'] === $i) { echo 'selected'; } ?> >
                        <?php echo htmlspecialchars($areaList['name'], ENT_QUOTES); ?>
                    </option>
                <?php endfor; ?>
            </select>

            <p>支援内容</p>
            <textarea name="support_content" id="new-support_content" cols="100" rows="10"><?php echo $oldSupportOrg['support_content']; ?>
            </textarea>

            <p>団体名</p>
            <input type="text" id="new-owner" name="owner" value="<?php echo $oldSupportOrg['owner']; ?>">

            <p>アクセス</p>
            <textarea name="access" id="new-access" cols="100" rows="10"><?php echo $oldSupportOrg['access']; ?>
            </textarea>

            <p>外国籍の方を支援対象に含むか</p>
            <select name="is_foreign_ok" id="new-is_foreign_ok">
                <option value="1" <?php if($oldSupportOrg['is_foreign_ok'] === 1) { echo 'selected'; } ?> >Yes</option>
                <option value="0" <?php if($oldSupportOrg['is_foreign_ok'] === 0) { echo 'selected'; } ?> >No</option>
            </select>

            <p>公的支援or民間支援</p>
            <select name="is_public" id="new-is_public">
                <option value="1" <?php if($oldSupportOrg['is_public'] === 1) { echo 'selected'; } ?> >公的支援</option>
                <option value="0" <?php if($oldSupportOrg['is_public'] === 0) { echo 'selected'; } ?> >民間支援</option>
            </select>

            <p>備考</p>
            <textarea name="appendix" id="new-appendix" cols="100" rows="10">
            </textarea>
        </form>
    </body>
</html>
