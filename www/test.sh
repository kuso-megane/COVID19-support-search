#!/bin/sh

# appコンテナ内の www/ で実行


./vendor/bin/phpunit ./Models/infra/database/tests/ -v
