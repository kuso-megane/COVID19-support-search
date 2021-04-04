<?php
    use myapp\config\ViewsConfig;
?>

<header>
    <div id="title-container">

        <h2 id="title">
            <a class="black" href="/index">支援総合検索</a>
        </h2>
        <img id="title--logo" src="<?php echo ViewsConfig::IMG_URL. 'title_logo_test1.jpg'; ?>" alt="タイトルロゴ">

    </div> 
    <div id="header-menu-container">
        <p class="header-menu-items"><a href="/article/list">&gt;&gt;支援・制度利用時のお役立ち情報</a></p> 
        <p class="header-menu-items"><a href="">&gt;&gt;サイト運営者</a></p>
        <p class="header-menu-items"><a href="">&gt;&gt;お問い合わせ</a></p>
    </div>    
</header>
