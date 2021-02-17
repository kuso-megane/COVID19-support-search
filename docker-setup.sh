#!/bin/sh

# blog/ にて実行
docker build -t blog_image .
docker run -d -it  --name blog -p 80:80 -v $PWD/www/:/var/www/  --env-file ./envfile blog_image


