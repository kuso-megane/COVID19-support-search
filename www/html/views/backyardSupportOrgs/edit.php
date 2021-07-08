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
        
        <form action="/backyard/supportOrgs/post/<?php echo $oldSupportOrg['id']; ?>" method="post" name="supportOrgsForm" id="supportOrgsForm">
            <p>都道府県</p>
            <select name="area_id" id="new-area" required>
                <?php for($i = 1; $i <= count($areaList); $i ++): ?>
                    <option value="<?php echo $i ?>" <?php if($oldSupportOrg['area_id'] === $i) { echo 'selected'; } ?> >
                        <?php echo htmlspecialchars($areaList[$i], ENT_QUOTES); ?>
                    </option>
                <?php endfor; ?>
            </select>

            <p>支援内容(400字以内) 現在の文字数: <span id="support_content-wordCount"></span>文字</p>
            <textarea name="support_content" id="new-support_content" cols="100" rows="10" maxlength="400" required><?php echo $oldSupportOrg['support_content']; ?></textarea>

            <p>団体名(100字以内) 現在の文字数: <span id="owner-wordCount"></span>文字</p>
            <input type="text" id="new-owner" name="owner" value="<?php echo $oldSupportOrg['owner']; ?>" size="100" maxlength="100" required>

            <p>アクセス(600字以内) 現在の文字数: <span id="access-wordCount"></span>文字</p>
            <textarea name="access" id="new-access" cols="100" rows="10" maxlength="600" required><?php echo $oldSupportOrg['access']; ?></textarea>

            <p>外国籍の方を支援対象に含むか</p>
            <select name="is_foreign_ok" id="new-is_foreign_ok" required>
                <option value="1" <?php if($oldSupportOrg['is_foreign_ok'] === 1) { echo 'selected'; } ?> >Yes</option>
                <option value="0" <?php if($oldSupportOrg['is_foreign_ok'] === 0) { echo 'selected'; } ?> >No</option>
            </select>

            <p>公的支援or民間支援</p>
            <select name="is_public" id="new-is_public" required>
                <option value="1" <?php if($oldSupportOrg['is_public'] === 1) { echo 'selected'; } ?> >公的支援</option>
                <option value="0" <?php if($oldSupportOrg['is_public'] === 0) { echo 'selected'; } ?> >民間支援</option>
            </select>

            <p>備考(500字以内) 現在の文字数: <span id="appendix-wordCount"></span>文字</p>
            <textarea name="appendix" id="new-appendix" cols="100" rows="10" maxlength="500"><?php echo $oldSupportOrg['appendix']; ?></textarea>

            <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">

            <br>
            <button id="submit-button" class="buttons">投稿</button>
            <button id="reset-button" class="buttons">元の状態にリセット</button>
            <p id="general-invalid-note" class="invalid-note">不正な入力があります。内容を見直してください。</p>
        </form>
    </body>
    <!--formのsubmit-->
    <script>
        {
            const $submitButton = document.getElementById("submit-button");

            const submit = (e) => {
                e.preventDefault();
                if (window.confirm("投稿しますか?")) {
                    document.supportOrgsForm.submit();
                }
                else {
                    return;
                }
            }

            $submitButton.addEventListener("click", submit);
        }
    </script>

    <!--formのreset, 文字数カウント-->
    <script>
        {
            const $resetButton = document.getElementById("reset-button");
            const $supportContent = document.getElementById('new-support_content');
            const $supportContent_wordCount = document.getElementById('support_content-wordCount');
            const $owner = document.getElementById('new-owner');
            const $owner_wordCount = document.getElementById('owner-wordCount');
            const $access = document.getElementById('new-access');
            const $access_wordCount = document.getElementById('access-wordCount');
            const $appendix = document.getElementById('new-appendix');
            const $appendix_wordCount = document.getElementById('appendix-wordCount');


            const wordCount = (e) => {
                const $supportContent_len = $supportContent.value.length;
                $supportContent_wordCount.innerHTML = $supportContent_len;

                const $owner_len = $owner.value.length;
                $owner_wordCount.innerHTML = $owner_len;

                const $access_len =$access.value.length;
                $access_wordCount.innerHTML = $access_len;

                const $appendix_len = $appendix.value.length;
                $appendix_wordCount.innerHTML = $appendix_len;
            }

            $supportContent.addEventListener('keyup', wordCount);
            $owner.addEventListener('keyup', wordCount);
            $access.addEventListener('keyup', wordCount);
            $appendix.addEventListener('keyup', wordCount);
            document.supportOrgsForm.addEventListener('input', wordCount);
            window.addEventListener('DOMContentLoaded', wordCount);

            const reset = (e) => {
                e.preventDefault();

                if (window.confirm("本当にリセットしますか?")) {
                    document.supportOrgsForm.reset();
                    wordCount();
                }
                else {
                    return;
                }
            }

            $resetButton.addEventListener("click", reset);
        }
    </script>

    <!--formのvalidation-->
    <script>
        {
            const $form = document.supportOrgsForm;
            const $submitButton = document.getElementById('submit-button');
            const $invalidNote = document.getElementById("general-invalid-note");

            const validate = (e) => {
                if ($form.checkValidity()) {
                    $submitButton.disabled = false;
                    $invalidNote.classList.remove("show");
                }
                else {
                    $submitButton.disabled = true;
                    $invalidNote.classList.add("show");
                }
            }

            $form.addEventListener('keyup', validate);
            $form.addEventListener('change', validate);
            $submitButton.addEventListener("mouseover", validate);
        }
    </script>
</html>
