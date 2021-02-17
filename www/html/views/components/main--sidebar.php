<?php
    $categoryArtclCount = $vm->getCategoryArtclCount();
    $subCategoryArtclCount = $vm->getSubCategoryArtclCount();
?>


<div id="main--sidebar">
    <div id="search-container">

        <form action="/search" method="get">
            <input id="search-box" type="search" name="artclName" placeholder="記事フリーワード検索">
        </form>
        <p>→詳細検索は<a href="">コチラ</a></p>
    </div>
    
    <nav id="category-list-container">
        <p>&lt;カテゴリ検索&gt;</p>
        <ul id="category-list">
            <?php 
                $c = 0;
                foreach($categoryArtclCount as $category => $count): 
            ?>
            
            <li>
                <input id=<?php echo "category-checkbox{$c}"; ?> type="checkbox" class="category-checkbox">
                <label for=<?php echo "category-checkbox{$c}"; ?> ><?php echo "{$category}({$count})"; ?></label>

                <ul id="subCategory-list">
                    <li><a href="">- このカテゴリすべて(<?php echo $count; ?>)</a></li>
                    <?php foreach($subCategoryArtclCount["{$category}"] as $subCategory => $subCount): ?>

                    <li><a href=""><?php echo "- {$subCategory}({$subCount})"; ?></a></li>
                    
                    <?php endforeach; ?>
                </ul>
            </li>

            <?php
                $c++;
                endforeach; 
            ?>
        </ul>
    </nav>

    <div id="my-profile">
        
        <div id="my-profile--img-container">
            <img class="img-to-circle" src="/asset/img/myProfile.jpg" alt="プロフィール画像">
        </div>
        <h4 id="my-profile--name">クソメガネ</h2>
        <p id="my-profile--txt" class="break-word">
            &emsp;ゲーム開発業界志望の文系大学生。怠惰な生活を好む、クソなメガネ。たまに、めっちゃ頑張る。
        </p>
        
        <!--twitter follow button-->
        <a id="twitter-follow-button" href="https://twitter.com/kusomeg61908444?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">
            Follow @kusomeg61908444
        </a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
</div>
