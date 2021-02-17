<?php 
    $styleSheetUrl = "/asset/stylesheet/";
    $componentsPath = "/var/www/html/views/components/";
    $imgUrl = "/asset/img/";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ブログサービス(仮)</title>
        <link rel="stylesheet" type="text/css" href=<?php echo $styleSheetUrl. "category/category.css"; ?>>
    </head>
    <body>

    <?php require $componentsPath. 'header.php';?>

        <div id="main">
            
            <?php require $mainView;?>  

            <?php require $componentsPath. 'main--sidebar.php';?>
            
        </div>
        <div id="footer">
        
        </div>
　  </body>
</html>

