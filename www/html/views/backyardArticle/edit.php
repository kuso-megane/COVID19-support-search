<?php

use myapp\config\ViewsConfig;

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
        <form name="articleForm" action="<?php echo "/backyard/article/post/". $oldArticleContent['id']; ?>" method="post">
            <div>
                タイトル(50文字以内):<br>
                <p id="title-invalid-note" class="invalid-note">
                    タイトルは1文字以上50文字以内にしてください。
                </p>
                <input id="new-title" type="text" name="title" value="<?php echo $oldArticleContent['title']; ?>" placeholder="タイトルを入力" size="70">
                <div id="title-reset-button" class="buttons">タイトルを元に戻す</div>
            </div>
            <div>
                カテゴリ: <br>
                <select id="new-category" name="c_id">
                    <?php foreach($articleCategoryNames as $articleCategoryName): ?>
                        <option value="<?php echo $articleCategoryName['id']; ?>" <?php if ($articleCategoryName['id'] === $oldArticleContent['id']) {echo 'selected';} ?>>
                            <?php echo $articleCategoryName['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div id="category-reset-button" class="buttons">カテゴリを元に戻す</div>
            </div>

            <?php if ($isNew === FALSE): ?>
                <p>
                    変更前のサムネ:
                </p>
                <p>
                    <img id="oldThumbnail" src="<?php echo ViewsConfig::IMG_URL. $oldArticleContent['thumbnailName']; ?>" alt="thumbnail">
                </p>
            <?php endif; ?>

            <p>
                <input id="is_thumbnail_changed" type="checkbox" name="is_thumbnail_changed" value="on">
                <label for="is_thumbnail_changed">
                    <?php if ($isNew): ?>
                        新しいサムネをアップロードする(指定しなかった場合は"no image"と表示されます。)
                    <?php else: ?>
                        新しいサムネをアップロードする(古いサムネは消去されます)
                    <?php endif; ?>
                </label>
            </p>
            
            <p>
                <input id="newThumbnail-uploader" type="file" name="thumbnail" accept="image/*" class="hidden">
            </p>
                    
            
            <div>
                本文:
                <div id="content-reset-button" class=" buttons">本文を元に戻す</div>
                <textarea id="editor" name="content" id="" cols="50" rows="10">
                    <?php echo $oldArticleContent['content']; ?>
                </textarea>
            </div>
            <button id="submit-button" class="buttons">投稿</button>
            <p id="general-invalid-note" class="invalid-note">
                不正な入力があります。内容を見直してください。
            </p>
        </form>

        <!--サムネアップロードボックスの管理-->
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
                    uploader.value = '';
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

        <!--formのリセット-->
        <script>
            const resetTitle = (e) => {
                if (window.confirm("タイトルを元に戻します。")) {
                    const oldTitle = "<?php echo $oldArticleContent['title']; ?>";
                    const newTitleInput = document.getElementById("new-title");
                    newTitleInput.value = oldTitle;
                }
                else {
                    return;
                }
            }

            const resetCategory = (e) => {
                if (window.confirm("カテゴリを元に戻します。")) {
                    const oldC_id = "<?php echo ($oldArticleContent['c_id'] != NULL)? $oldArticleContent['c_id'] : 1; ?>";
                    const newCategorySelect = document.getElementById("new-category");
                    newCategorySelect.selectedIndex = oldC_id - 1;
                }
                else {
                    return;
                }  
            }

            const resetEditor = (e) => {
                if (window.confirm("本文を元に戻します。")) {
                    const oldContent =
                    `<?php 
                        $oldArticleContent['content'] = str_replace("\\", "\\\\", $oldArticleContent['content']);
                        echo str_replace("`", "\`", $oldArticleContent['content']); 
                    ?>`;
                    const editor = document.getElementById("editor");
                    
                    simplemde.value(oldContent);   
                }
                else {
                    return;
                }  
            }

            

            document.getElementById("title-reset-button").addEventListener("click", resetTitle);
            document.getElementById("category-reset-button").addEventListener("click", resetCategory);
            document.getElementById("content-reset-button").addEventListener("click", resetEditor);
        </script>

        <!--formのvalidation-->
        <script>
            const submitButton = document.getElementById("submit-button");
            const titleInput = document.getElementById("new-title");
            const titleInvalidNote = document.getElementById("title-invalid-note");
            const generalInvalidNote = document.getElementById("general-invalid-note");
            
            const initSubmitButton = (e) => {
                generalInvalidNote.classList.remove("show");
                submitButton.disabled = false;
            }

            const disableSubmitButton = () => {
                submitButton.disabled = true;
                generalInvalidNote.classList.add("show");
            }


            const validateTitle = (e) => {
                const titleLen = titleInput.value.length;
                if (titleLen == 0 || titleLen > 50) {
                    titleInvalidNote.classList.add("show");
                    titleInput.classList.add("invalid");
                    disableSubmitButton();
                }
                else {
                    titleInvalidNote.classList.remove("show");
                    titleInput.classList.remove("invalid");
                    initSubmitButton();
                }
            }

            
            const validate = (e) => {
                validateTitle(); 
            } 

            titleInput.addEventListener("keyup", validateTitle);
            submitButton.addEventListener("mouseover", validate);
        </script>

        <!--submit-->
        <script>
            const submit = (e) => {
                e.preventDefault();
                if (window.confirm("投稿しますか?")) {
                    document.articleForm.submit();
                }
                else {
                    return;
                }
            }

            document.getElementById("submit-button").addEventListener("click", submit);
        </script>
    </body>
</html>
