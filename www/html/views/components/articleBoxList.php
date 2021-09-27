<?php
    use myapp\config\ViewsConfig;

    /**
     * @var array $_items
     * [
     *      [
     *          'id' => int,
     *          'thumbnailName' => string,
     *          'title' => string
     *      ],
     *      []
     * ]
     */
?>

<div class="article-box--list">

    <?php foreach ($_items as $item): ?>

        <a class="article-box--list--item" href="<?php echo '/article/'. $item['id']; ?>">
            <img class="article-box--list--item--img"
                src="<?php echo ViewsConfig::IMG_URL. $item['thumbnailName']; ?>"
                alt="<?php echo $item['title']; ?>"
            >
            <p class="article-box--list--item--title break-word block-start0 block-end0">
                
                <?php echo htmlspecialchars($item['title'], ENT_QUOTES); ?>

            </p>
        </a>

    <?php endforeach; ?>
    
</div>