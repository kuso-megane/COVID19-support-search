<div id="breadcrumb">
    <p><a href="/index">top</a> &gt; <a href="">categoryX</a> &gt; <a href="">subCategoryY</a></p>
</div>
<div id="main--title">
    <p>このカテゴリの最近の投稿</p>
</div>
<div id="page-switch">
    <p id="page-switch--previous"><a href="">前の10件</a> </p>
    <p id="page-switch--next"><a href="">次の10件</a></p>
</div>

<?php for ($i = 0; $i < 10; ++$i): ?>

<div class="article-box">
    <div class="article-thumbnail-container">
        <img src=<?php echo ($imgPath."test2.jpg"); ?> alt="テスト画像" class="article-thumbnail">
    </div>
    <div class="article-main">
        <p class="article-update-date">2020-8-13(sample date)</p>
        <p class="article-title"><a href="xxx">テスト2</a></p>
    </div>
</div>

<?php endfor;?>
