<?php

use myapp\config\ViewsConfig;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>コラムカテゴリ編集 - 管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>

    </head>
    <body>
        <form name="articleCategoryForm" method="post" action="<?php echo '/backyard/articleCategory/post/' . $articleCategory['id']; ?>">
            <p>
                カテゴリ名:
                <input type="text" name="name" value="<?php echo $articleCategory['name']; ?>">
                <input type="hidden" name="csrfToken", value="<?php echo $csrfToken; ?>">
                <p>
                    <button id="submit-button">送信</button>
                    <button id="reset-button">リセット</button>
                </p>  
            </p>
        </form>
        
        <script>
            const submitButton = document.getElementById("submit-button");
            const resetButton = document.getElementById("reset-button");

            const submit = (e) => {
                e.preventDefault();
                if (window.confirm("送信しますか?")) {
                    document.articleCategoryForm.submit();
                }
                else {
                    return;
                }
            }


            const reset = (e) => {
                e.preventDefault();
                if (window.confirm("元に戻しますか？")) {
                    document.articleCategoryForm.reset();
                }
                else {
                    return;
                }
            }

            submitButton.addEventListener("click", submit);
            resetButton.addEventListener("click", reset);
        </script>
    </body>
</html>