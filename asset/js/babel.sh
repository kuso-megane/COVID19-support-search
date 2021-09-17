#!/bin/sh

targetPath='../../www/html/asset/js'
srcDir='./'

command='npx'

$command babel $srcDir --out-dir $targetPath --presets react-app/prod