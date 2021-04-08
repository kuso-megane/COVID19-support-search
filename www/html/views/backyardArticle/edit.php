<?php

use myapp\config\ViewsConfig;

if (empty($oldArticleContent)) {
    $oldArticleContent['id'] = '';
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>コラム編集 - 管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'backyardArticle/edit.css'; ?>">
    </head>
    <body>
        <h2>コラム編集</h2>
        <form action="<?php echo "/backyard/article/post/". $oldArticleContent['id']; ?>" method="post">
            <p>
                タイトル(50文字以内):
                <input type="text" name="title" value="<?php echo $oldArticleContent['title']; ?>" size="40" maxlength="50">
            </p>
            <p>
                カテゴリ:
                <select name="title" id="">
                    <?php foreach($articleCategoryNames as $articleCategoryName): ?>
                        <option value="<?php echo $articleCategoryName['id']; ?>" <?php if ($articleCategoryName['id'] == $selectedId) {echo 'selected';} ?>>
                            <?php echo $articleCategoryName['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                変更前のサムネ:
            </p>
            <p>
                <img id="oldThumbnail" src="<?php echo ViewsConfig::IMG_URL. $oldArticleContent['thumbnailName']; ?>" alt="thumbnail">
            </p>
            <input id="is_thumbnail_changed" type="checkbox" name="is_thumbnail_changed" value="on">
            <label for="is_thumbnail_changed">新しいサムネをアップロードする(古いサムネは消去されます)</label>
            <p>
                <input id="newThumbnail-uploader" type="file" name="thumbnail" accept="image/*" class="hidden">
            </p>
            <p>
                内容:<br>
                <textarea id="editor" name="content" id="" cols="50" rows="10">
                    <?php echo $oldArticleContent['content']; ?>
                </textarea>
            </p>
            <div id="submit-button" class="confirmation--trigger">投稿</div>

            <?php require ViewsConfig::COMPONENTS_PATH. 'confirmation.php'; ?>

        </form>
        
        <script>
            const checkbox = document.getElementById("is_thumbnail_changed");
            const newThumbnailControl = (e) => {
                const target = e.target;
                const uploader = document.getElementById("newThumbnail-uploader");
                if (target.checked) {
                    uploader.classList.remove("hidden");
                }
                else {
                    uploader.classList.add("hidden");
                }
            }

            checkbox.addEventListener("change", newThumbnailControl);
        </script>

        <!--import simpleMDE-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <script>
            var simplemde = new SimpleMDE({
                element: document.getElementById("editor"),
                forceSync: true,
                spellChecker: false
            });
        </script>

        <script>

        </script>
    </body>
</html>
