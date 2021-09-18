#!/bin/sh

cd asset/js
chmod 744 ./babel.sh
./babel.sh
cd ../../

cd asset/scss
chmod 744 ./sass.sh
./sass.sh
cd ../../
