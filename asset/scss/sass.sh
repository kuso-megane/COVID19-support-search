#!/bin/sh

targetPath="../../www/html/asset/stylesheet/"
command="sass"
if !(type "sass" > /dev/null 2>&1); then
    command="sass.bat"
fi

$command search/index.scss ${targetPath}search/index.css
$command search/result.scss ${targetPath}search/result.css

$command article/articleList.scss ${targetPath}article/articleList.css
$command article/show.scss ${targetPath}article/show.css

$command subContents/guideline.scss ${targetPath}subContents/guideline.css
$command subContents/adminIntro.scss ${targetPath}subContents/adminIntro.css

$command backyardArticle/index.scss ${targetPath}backyardArticle/index.css
$command backyardArticle/edit.scss ${targetPath}backyardArticle/edit.css

$command backyardArticleCategory/index.scss ${targetPath}backyardArticleCategory/index.css

$command adminLogin/loginPage.scss ${targetPath}adminLogin/loginPage.css
