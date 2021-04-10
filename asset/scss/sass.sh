#!/bin/sh

targetPath="../../www/html/asset/stylesheet/"

sass search/index.scss ${targetPath}search/index.css
sass search/result.scss ${targetPath}search/result.css

sass article/articleList.scss ${targetPath}article/articleList.css
sass article/show.scss ${targetPath}article/show.css

sass subContents/guideline.scss ${targetPath}subContents/guideline.css
sass subContents/adminIntro.scss ${targetPath}subContents/adminIntro.css

sass backyardArticle/index.scss ${targetPath}backyardArticle/index.css
sass backyardArticle/edit.scss ${targetPath}backyardArticle/edit.css

sass backyardArticleCategory/index.scss ${targetPath}backyardArticleCategory/index.css
