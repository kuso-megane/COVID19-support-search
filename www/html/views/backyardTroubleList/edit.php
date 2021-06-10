<?php

use myapp\config\ViewsConfig;

?>

<head>
    <title>troubleList - 管理者メニュー</title>
    <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
</head>
<body>
    <h2>troubleList 編集</h2>
    
    <form name="troubleListForm" action="/backyard/troubleList/post/<?php echo $trouble_id; ?>" method="post">
        <p>検索ボックスの「お困りごと」(50字以内):</p>
        <input type="text" name="name" id="new-name">

        <p>おすすめコラムのカテゴリ:
            <select name="ArticleC_id" id="new-articleC">
                <option value="1">aaa</option>
            </select>
        </p>

        <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">
        <br>
        <button id="submit-button" class="buttons">投稿</button>
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
</body>


