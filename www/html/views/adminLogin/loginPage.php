<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo '管理者ログイン -' . AppConfig::TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'adminLogin/loginPage.css'; ?>">
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <form id="loginForm" action="/adminLogin/authenticate" method="post">
            <div class="center">
                <div id="login-box" class="break-word">
                    <h3 class="block-start0">管理者ログイン</h3>
                    <?php if ($isRetry === 'true' && $isLocked !== 'true'): ?>
                        <p>IDまたはパスワードが違います。</p>
                    <?php endif; ?>
                    <p>
                        ID: <input type="text" name="adminID" minlength="1" maxlength="20" required>
                    </p>
                    <p>
                        パスワード: <input type="password" name="password" minlength="1" maxlength="20" required>
                    </p>
                    <p class="smaller">
                        <?php echo AppConfig::MAXNUM_LOGIN_FAIL . '回以上失敗すると、' . (int)(AppConfig::ACCOUNT_LOCK_TIME / 60) . '分ロックされます。'; ?>
                    </p>
                    <p id="invalid-note" class="note">IDまたはパスワードが入力されていません</p>

                    <?php if($isLocked === 'true'): ?>
                        <p id="lock-note" class="note">アカウントがロックされました。しばらく時間をおいてから入力してください。</p>
                    <?php endif; ?>
                    
                    <input type="hidden" name="afterLogin" value="<?php echo $afterLogin; ?>">

                    <button id="submit-button">送信</button>      
                </div>
            </div>
            
        </form>

        <script>
            const submitButton = document.getElementById("submit-button");
            const form = document.getElementById("loginForm");
            const invalidNote = document.getElementById("invalid-note");

            const submit = (e) => {
                e.preventDefault();
                const isValid = form.checkValidity();
                if (isValid === true) {
                   form.submit() 
                }
                else {
                    invalidNote.classList.add("show");
                    return
                }
            }

            const initInvalidNote = (e) => {
                invalidNote.classList.remove("show");
            }

            submitButton.addEventListener("click", submit);
            form.addEventListener("change", initInvalidNote);
        </script>
    </body>
</html>
