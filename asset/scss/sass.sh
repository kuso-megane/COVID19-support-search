#!/bin/sh

targetPath="../../www/html/asset/stylesheet/"

sass search/index.scss ${targetPath}search/index.css
sass search/result.scss ${targetPath}search/result.css

sass article/articleList.scss ${targetPath}article/articleList.css

sass subContents/guideline.scss ${targetPath}subContents/guideline.css
