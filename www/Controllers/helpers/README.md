# render()について

## 引数
各viewに必要なデータを過不足なく含むentitiyである、```viewModelInterface```

## 前提としているviews/層の構成
- views/templates/{controller}Template.php
- views/{controller}/{action}.php

## template.phpの構成
- 各controllerにつき１つ。
- 共通部分を記述。各actionの固有の部分を```{controller}/{action}.php```に記述する。これを挿入したい箇所に```<?php require $mainView; ?>```を記述。