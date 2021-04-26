<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo '管理者ログイン -' . AppConfig::TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'adminLogin/login.css'; ?>">
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <form id="loginForm" action="/adminLogin/authenticate" method="post">
            <div id="login-box">
                <p>
                    ID:<input type="text" name="adminID" minlength="1" maxlength="20" required>
                </p>
                <p>
                    パスワード:<input type="password" name="password" minlength="1" maxlength="20" required>
                </p>
                <p id="lock-note">
                    <?php echo AppConfig::MAXNUM_LOGIN_FAIL . '回失敗すると、' . (int)(AppConfig::ACCOUNT_LOCK_TIME / 60) . '分ロックされます。'; ?>
                </p>
                <p id="invalid-note">IDまたはパスワードが入力されていません</p>

                <?php if ($isRetry === 'true' && $isLocked !== 'true'): ?>
                    <p>IDまたはパスワードが違います。</p>
                <?php endif; ?>

                <?php if($isLocked === 'true'): ?>
                    <p>アカウントがロックされました。しばらく時間をおいてから入力してください。</p>
                <?php endif; ?>
                
                <input type="hidden" name="afterLogin" value="<?php echo $afterLogin; ?>">

                <button id="submit-button">送信</button>      
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

            submitButton.addEventListener("click", submit);
        </script>
    </body>
</html>
