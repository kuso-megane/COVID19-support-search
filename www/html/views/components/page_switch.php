<?php
    /*
    necessary data = [
        'pageTotal' => int,
        'currentPage' => int
    ]
    */
?>

<!--1ページに2回以上使うので、id禁止-->
<div class="center">
    <div class="page-switch">
        <?php for($i = 1; $i <= $pageTotal; ++$i): ?>

            <p class="page-switch--nums <?php if ($currentPage === $i) {echo 'strong disabled';} ?>">
                <a href=""><?php echo "{$i}"; ?></a>
            </p>

        <?php endfor; ?>
    </div>
</div>
