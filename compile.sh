#!/bin/sh

cd asset/js
./babel.sh
cd ../../

cd asset/scss
./sass.sh
cd ../../
