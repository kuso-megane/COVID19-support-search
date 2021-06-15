<?php

use myapp\config\ViewsConfig;

?>

<head>
    <title>troubleList - 管理者メニュー</title>
    <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'backyardTroubleList/edit.css'; ?>">
</head>
<body>
    <h2>troubleList 編集</h2>
    
    <form name="troubleListForm" action="/backyard/troubleList/post/<?php echo $oldTrouble['id']; ?>" method="post">
        <p>検索ボックスの「お困りごと」(50字以内):</p>
        <input type="text" name="name" id="new-name" value="<?php echo htmlspecialchars($oldTrouble['name'], ENT_QUOTES); ?>" size="50">

        <p>おすすめコラムのカテゴリ:
            <select name="articleC_id" id="new-articleC">
                <?php foreach ($articleCategoryNames as $articleCategory): ?>
                    <option value="<?php echo $articleCategory['id']; ?>" <?php if ($articleCategory['id'] === $oldTrouble['articleC_id']) {echo 'selected';} ?>>
                        <?php echo htmlspecialchars($articleCategory['name'], ENT_QUOTES); ?>
                    </option>
                <?php endforeach; ?>
            </select> 
        </p>

        <p>meta_word:
            <input type="text" name="meta_word" id="new-meta_ord" value="<?php echo htmlspecialchars($oldTrouble['meta_word'], ENT_QUOTES); ?>">
        </p>
        
        <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">
        <br>
        <div id="submit-button" class="buttons">投稿</div>
        <div id="reset-button" class="buttons">一括リセット</div>
    </form>

    <!--formのsubmit-->
    <script>
        {
            const $submitButton = document.getElementById("submit-button");

            const submit = (e) => {
                if (window.confirm("投稿しますか?")) {
                    document.troubleListForm.submit();
                }
                else {
                    return;
                }
            }

            $submitButton.addEventListener("click", submit);
        }
    </script>

    <!--formのreset-->
    <script>
        {
            const $resetButton = document.getElementById("reset-button");

            const reset = (e) => {
                e.preventDefault();

                if (window.confirm("本当にリセットしますか?")) {
                    document.troubleListForm.reset();
                }
                else {
                    return;
                }
            }

            $resetButton.addEventListener("click", reset);
        }
    </script>
</body>


