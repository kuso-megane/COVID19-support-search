#!/bin/sh

targetPath="../../www/html/asset/stylesheet/"

sass search.scss ${targetPath}search/search.css
sass articleList.scss ${targetPath}article/articleList.css
