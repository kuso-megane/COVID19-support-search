<?php
    use myapp\config\AppConfig;
    use myapp\config\ViewsConfig;
?>

<header id="header">
    <div id="title">

        <div id="title--left">
            <a href="/">
                <img id="title--left--logo" src="<?php echo ViewsConfig::IMG_URL. 'titleLogo/production.jpg'; ?>" alt="タイトルロゴ">
            </a>
        </div>
        

        <div id="title--right">
            <p id="title--right--menu" class="block-start0 block-end0">
                <i class="fas fa-bars"></i> menu
            </p>  
        </div>
    </div>

    <div id="title--right--menu--content" class="">
        <p id="close" class="block-end0 block-start0"><i class="far fa-times-circle"></i></p>
        <li>
            <a href="/index#search-box">
                <i class="fas fa-search"></i>
                search for supports and consultation counters
            </a>
        </li>
        <li>
            <a href="/article/list">
                <i class="fas fa-book-open"></i>
                tips
            </a>
        </li>
        <li><a href="/subContents/guideline">Disclaimer</a></li>
        <li><a href="/subContents/adminInfo">About us</a></li>
        <li><a href="/contact/contactPage">Inquiry</a></li>
    </div>

    <div id="link-to-top--container">
        <a id="link-to-top" href="/">
            <i class="fas fa-home"></i>
            toppage
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
    {
        const showTrigger = document.getElementById("title--right--menu");
        const closeTrigger = document.getElementById("close");

        const menu = document.getElementById("title--right--menu--content");

        const menuShow = (e) => { 
            menu.classList.add("show");
            return;
        }


        const menuClose = (e) => {
            menu.classList.remove("show");
            return;
        }

        window.addEventListener("click", menuClose);
        window.addEventListener("touchstart", menuClose);

        showTrigger.addEventListener("click", menuShow);
        closeTrigger.addEventListener("click", menuClose);

        //menuをクリック、タッチしたときにメニューが閉じるのを防ぐ
        showTrigger.addEventListener("click", function(e) {
            e.stopPropagation(); 
        });
        showTrigger.addEventListener("touchstart", function (e) {
            e.stopPropagation();
        });

        menu.addEventListener("click", function(e) {
            e.stopPropagation();
        });
        menu.addEventListener("touchstart", function (e) {
            e.stopPropagation();
        })
        
    }
        
</script>