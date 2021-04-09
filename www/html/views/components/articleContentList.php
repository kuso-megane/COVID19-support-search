<?php
    use myapp\config\ViewsConfig;

    /**
     * @var array $_items
     */
?>

<div class="article--content--list">

    <?php foreach ($_items as $item): ?>

        <a class="article--content--list--item" href="<?php echo '/article/'. $item['id']; ?>">
            <img class="article--content--list--item--img"
                src="<?php echo ViewsConfig::IMG_URL. $item['thumbnailName']; ?>"
                alt="<?php echo $item['title']; ?>"
            >
            <p class="article--content--list--item--title break-word block-start0 block-end0">
                
                <?php echo $item['title']; ?>

            </p>
        </a>

    <?php endforeach; ?>
    
</div>