<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<header id="header">
    <div id="title">

        <div id="title--left">
            <!--
            <h2>
                <a class="black" href="/index"><?php echo AppConfig::TITLE; ?></a>
            </h2>
            -->
            <img id="title--left--logo" src="<?php echo ViewsConfig::IMG_URL. 'titleLogo/test3.jpg'; ?>" alt="タイトルロゴ">
        </div>
        

        <div id="title--right">
            <p id="title--right--menu" class="block-start0 block-end0">
                <i class="fas fa-bars"></i> メニュー
            </p>  
        </div>
    </div>

    <div id="title--right--menu--content" class="">
        <p id="close" class="block-end0 block-start0"><i class="far fa-times-circle"></i></p>
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
        <li><a href="/subContents/guideline">免責事項</a></li>
        <li><a href="/subContents/adminInfo">運営者紹介</a></li>
        <li><a href="/subContents/contact">お問い合わせ</a></li>
    </div>

    <div id="link-to-top--container">
        <a id="link-to-top" href="/index">
            <i class="fas fa-home"></i>
            トップページへ
        </a>
    </div>
    
</header>
<div id="dummy-header"></div>

<!--headerを固定した分のズレを解消するdummy-headerの高さの決定-->
<script>
    
    const makeDummyHeader = () => {
        const dummyHeader = document.getElementById("dummy-header");
        const header = document.getElementById("header");

        dummyHeader.style.height = String(header.offsetHeight) + 'px';
    }

    window.addEventListener("DOMContentLoaded", makeDummyHeader);
    window.addEventListener("resize", makeDummyHeader); //for dev
    
</script>

<!--右のメニューの管理-->
<script>
    const showTrigger = document.getElementById("title--right--menu");
    const closeTrigger = document.getElementById("close");

    const menuControl = (e) => {
        const menu = document.getElementById("title--right--menu--content");
        const target = e.currentTarget;
        const targetId = target.id;
        const showTriggerId = showTrigger.id;
        const closeTriggerId = closeTrigger.id;

        if (targetId == showTriggerId) {
            menu.classList.add("show");
        }
        else if(targetId == closeTriggerId) {
            menu.classList.remove("show");
        }
        else {
            return;
        }
    }

    showTrigger.addEventListener("click", menuControl);
    closeTrigger.addEventListener("click", menuControl);
</script>
