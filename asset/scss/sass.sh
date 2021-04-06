#!/bin/sh

targetPath="../../www/html/asset/stylesheet/"

sass search/search.scss ${targetPath}search/search.css
sass article/articleList.scss ${targetPath}article/articleList.css
