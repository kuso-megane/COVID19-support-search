<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<header>
    <div id="title-container">

        <div id="title--left">
            <h2>
                <a class="black" href="/index"><?php echo AppConfig::TITLE; ?></a>
            </h2>
            <img id="title--left--logo" src="<?php echo ViewsConfig::IMG_URL. 'title_logo_test2.jpg'; ?>" alt="タイトルロゴ">
        </div>
        

        <div id="title--right">
            <p id="title--right--menu" class="block-start0 block-end0">
                <i class="fas fa-caret-down"></i>
                メニュー
            </p>
            
        </div>

    </div>
    <div id="link-to-top--container">
        <a id="link-to-top" href="/index">
            <i class="fas fa-home"></i>
            トップページへ
        </a>
    </div>
</header>
