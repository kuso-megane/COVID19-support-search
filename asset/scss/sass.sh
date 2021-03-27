#!/bin/sh

targetPath="../../www/html/asset/stylesheet/"

sass search.scss ${targetPath}search.css
sass articleList.scss ${targetPath}articleList.css
