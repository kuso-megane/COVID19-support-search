#!/bin/sh

# from_dbをtest_dbにコピー

from_db=$1
pw=root

mysqldump -uroot -p$pw $from_db > ${from_db}.dump.sql
mysqladmin -uroot -p$pw drop test_db
mysqladmin -uroot -p$pw create test_db
mysql -u root -p$pw test_db < ${from_db}.dump.sql
