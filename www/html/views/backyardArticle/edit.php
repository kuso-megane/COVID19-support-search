<?php

use myapp\config\ViewsConfig;
use Prophecy\Doubler\NameGenerator;

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
        <form name="articleForm" action="<?php echo "/backyard/article/post/". $oldArticleContent['id']; ?>" method="post" enctype="multipart/form-data">
            <div>
                タイトル(50文字以内):<br>
                <p id="title-invalid-note" class="invalid-note">
                    タイトルは1文字以上50文字以内にしてください。
                </p>
                <input id="new-title" type="text" name="title" value="<?php echo htmlspecialchars($oldArticleContent['title'], ENT_QUOTES); ?>" placeholder="タイトルを入力" size="70">
                <div id="title-reset-button" class="buttons">タイトルを元に戻す</div>
            </div>
            <div>
                カテゴリ: <br>
                <select id="new-category" name="c_id">
                    <?php foreach($articleCategoryNames as $articleCategoryName): ?>
                        <option value="<?php echo $articleCategoryName['id']; ?>" <?php if ($articleCategoryName['id'] === $oldArticleContent['c_id']) {echo 'selected';} ?>>
                            <?php echo htmlspecialchars($articleCategoryName['name'], ENT_QUOTES); ?>
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
                <input type="text" name="oldThumbnailName" id="oldThumbnailName" value="<?php echo $oldArticleContent['thumbnailName']; ?>">
            <?php endif; ?>

            <p>
                <input id="is_thumbnail_uploaded" type="checkbox" name="is_thumbnail_uploaded" value="on">
                <label for="is_thumbnail_uploaded">
                    <?php if ($isNew): ?>
                        新しいサムネをアップロードする(指定しなかった場合は"no image"と表示されます。)
                    <?php else: ?>
                        新しいサムネをアップロードする(古いサムネは消去されます。指定しなかった場合は"no image"と表示されます。)
                    <?php endif; ?>
                </label>
            </p>
            
            <p>
                <input id="newThumbnail-uploader" type="file" name="thumbnail" accept="image/*" class="hidden">
            </p>

            <p id="thumbnail-invalid-note" class="invalid-note">
                新しいサムネがアップロードされていません。
            </p>

            <p>
                <p>ogpの説明文(120字以内、80~90字くらいが良い)</p>
                <p>現在の文字数: <span id="new-ogpDescription-word-count"></span></p>
                <textarea id="new-ogpDescription" type="text" name="ogp_description" cols="100" row="2">
                    <?php echo ($oldArticleContent['ogp_description'] !== NULL) ? htmlspecialchars($oldArticleContent['ogp_description'], ENT_QUOTES) : ''; ?>
                </textarea>
                <br>
                <div id="ogpDescription-reset-button" class="buttons">ogpの説明文を元に戻す</div>
            </p>

            <p id="ogpDescription-invalid-note" class="invalid-note">
                ogpの説明文の文字数は120字以内にしてください。
            </p>
                    
            <div>
                本文(画像がすでに手動でアップロードされている必要があります。):
                <div id="content-reset-button" class=" buttons">本文を元に戻す</div>
                <textarea id="editor" name="content" cols="20" rows="8">
                    <?php echo ($oldArticleContent['content'] !== NULL) ? htmlspecialchars($oldArticleContent['content'], ENT_QUOTES) : ''; ?>
                </textarea>
            </div>

            <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">

            <button id="submit-button" class="buttons">投稿</button>
            <p id="general-invalid-note" class="invalid-note">
                不正な入力があります。内容を見直してください。
            </p>
        </form>

        <!--サムネアップロードボックスの管理-->
        <script>
            const checkbox = document.getElementById("is_thumbnail_uploaded");
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

        <!--formのリセット-->
        <script>
            {
                const resetTitle = (e) => {
                    if (window.confirm("タイトルを元に戻します。")) {
                        const oldTitle = "<?php echo htmlspecialchars($oldArticleContent['title'], ENT_QUOTES); ?>";
                        const newTitleInput = document.getElementById("new-title");
                        newTitleInput.value = oldTitle;
                    }
                    else {
                        return;
                    }
                }

                const resetCategory = (e) => {
                    if (window.confirm("カテゴリを元に戻します。")) {
                        const oldC_id = "<?php echo ($oldArticleContent['c_id'] !== NULL)? $oldArticleContent['c_id'] : 1; ?>";
                        const newCategorySelect = document.getElementById("new-category");
                        newCategorySelect.selectedIndex = oldC_id - 1;
                    }
                    else {
                        return;
                    }  
                }

                const rawResetOgpDescription = (e) => {
                    const oldOgpDescription = "<?php echo htmlspecialchars($oldArticleContent['ogp_description'], ENT_QUOTES); ?>";
                    const newOgpDescriptionTextArea = document.getElementById("new-ogpDescription");
                    newOgpDescriptionTextArea.value = oldOgpDescription;
                    return;
                }


                const resetOgpDescription = (e) => {
                    if (window.confirm("ogpの説明文を元に戻します。")) {
                        rawResetOgpDescription();
                    }
                    else {
                        return;
                    }
                }

                const rawResetEditor = (e) => {
                    const oldContent =
                    `<?php 
                        $oldArticleContent['content'] = str_replace("\\", "\\\\", $oldArticleContent['content']);
                        echo str_replace("`", "\`", $oldArticleContent['content']); 
                    ?>`;
                    const editor = document.getElementById("editor");
                    
                    simplemde.value(oldContent);
                }

                const resetEditor = (e) => {
                    if (window.confirm("本文を元に戻します。")) {
                        rawResetEditor();
                    }
                    else {
                        return;
                    }  
                }

                

                document.getElementById("title-reset-button").addEventListener("click", resetTitle);
                document.getElementById("category-reset-button").addEventListener("click", resetCategory);
                document.getElementById("ogpDescription-reset-button").addEventListener("click", resetOgpDescription);
                document.getElementById("content-reset-button").addEventListener("click", resetEditor);
                window.addEventListener("DOMContentLoaded", rawResetEditor);
                window.addEventListener("DOMContentLoaded", rawResetOgpDescription);
            }
        </script>

        <!--ogp説明文の文字数カウント-->
        <script>
            {
                const newOgpDescriptionTextArea = document.getElementById("new-ogpDescription");
                const ogpDescriptionWordCount = document.getElementById("new-ogpDescription-word-count");

                const wordCount = (e) => {
                    const len = newOgpDescriptionTextArea.value.length;
                    ogpDescriptionWordCount.innerHTML = len;
                }
                 
                newOgpDescriptionTextArea.addEventListener("keyup", wordCount);
            }
        </script>

        <!--formのvalidation-->
        <script>
            {
                const submitButton = document.getElementById("submit-button");
                const titleInput = document.getElementById("new-title");
                const titleInvalidNote = document.getElementById("title-invalid-note");
                
                const isThumbnailUploaded = document.getElementById("is_thumbnail_uploaded");
                const newThumbnailUploader = document.getElementById("newThumbnail-uploader");
                const thumbnailInvalidNote = document.getElementById("thumbnail-invalid-note");

                const newOgpDescriptionTextArea = document.getElementById("new-ogpDescription");
                const ogpDescriptionInvalidNote = document.getElementById("ogpDescription-invalid-note");

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

                const validateThumbnail = (e) => {
                    if (isThumbnailUploaded.checked == true) {
                        if (newThumbnailUploader.files.length == 0) {
                            thumbnailInvalidNote.classList.add("show");
                            disableSubmitButton();
                        }
                        else {
                            thumbnailInvalidNote.classList.remove("show");
                            initSubmitButton();
                        }
                    }
                    else {
                        thumbnailInvalidNote.classList.remove("show");
                        initSubmitButton();
                    }    
                }

                const validateOgpDescription = (e) => {
                    const len = newOgpDescriptionTextArea.value.length;
                    if (len >= 120) {
                        ogpDescriptionInvalidNote.classList.add("show");
                        disableSubmitButton();
                    }
                    else {
                        ogpDescriptionInvalidNote.classList.remove("show");
                        initSubmitButton();
                    }
                }

                
                const validate = (e) => {
                    validateTitle(); 
                    validateThumbnail();
                    validateOgpDescription();
                } 

                titleInput.addEventListener("keyup", validateTitle);
                isThumbnailUploaded.addEventListener("change", validateThumbnail);
                newThumbnailUploader.addEventListener("change", validateThumbnail);
                newOgpDescriptionTextArea.addEventListener("keyup", validateOgpDescription);
                submitButton.addEventListener("mouseover", validate);
            }
        </script>

        <!--submit-->
        <script>
            {
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
            }
        </script>
    </body>
</html>
