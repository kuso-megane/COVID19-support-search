<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<header id="header">
    <div id="title">

        <div id="title--left">
            <h2>
                <a class="black" href="/index"><?php echo AppConfig::TITLE; ?></a>
            </h2>
            <img id="title--left--logo" src="<?php echo ViewsConfig::IMG_URL. 'title_logo_test2.jpg'; ?>" alt="タイトルロゴ">
        </div>
        

        <div id="title--right">
            <p id="title--right--menu" class="block-start0 block-end0">
                <i class="fas fa-bars"></i> メニュー
            </p>  
        </div>
    </div>

    <div id="title--right--menu--content" class="">
        <p id="close" class="block-end0 block-start0"><i class="far fa-times-circle fa-3x"></i></p>
        <li>
            <a href="/index#search-box">
                <i class="fas fa-search"></i>
                支援・相談先を検索
            </a>
        </li>
        <li>
            <a href="/article/list">
                <i class="fas fa-book-open"></i>
                お役立ち情報(コラム)
            </a>
        </li>
        <li><a href="">運営方針</a></li>
        <li><a href="">運営者紹介</a></li>
        <li><a href="">お問い合わせ</a></li>
    </div>

    <div id="link-to-top--container">
        <a id="link-to-top" href="/index">
            <i class="fas fa-home"></i>
            トップページへ
        </a>
    </div>
    
    <script src="<?php echo ViewsConfig::SCRIPT_URL. 'components/header/titleRightMenuControl.js'; ?>"></script>
</header>
<div id="dummy-header"></div>
<script>
    /*
    const makeDummyHeader = () => {
        const dummyHeader = document.getElementById("dummy-header");
        const header = document.getElementById("header");

        dummyHeader.style.height = String(header.offsetHeight) + 'px';
    }

    window.addEventListener("load", makeDummyHeader);
    */
</script>
