<?php

namespace myapp\myFrameWork\DB;

use myapp\myFrameWork\Exception\UnexpectedParamException;
use PDO;
use PDOException;
use PDOStatement;

class MyDbh extends PDO
{
    const EXECUTE = 1;
    const ONLY_PREPARE = 2;

    /**
     * truncate table by ignoring foreign key constrict
     * @param string $tablename
     * 
     * @return void
     */
    public function truncate(string $tablename):void
    {
        $this->exec('SET foreign_key_checks=0');
        $this->exec('TRUNCATE TABLE ' . $tablename);
        $this->exec('SET foreign_key_checks=1');     
    }


    /**
     * prepare sql statement. If preparing fails, echo error message.
     * @param string $command
     * @param array $options
     * 
     * @return PDOStatement
     */
    public function myPrepare(string $command, array $options = []):PDOStatement
    {
        try {

            $sth = $this->prepare($command, $options);

        } catch (PDOException $e) {

            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            foreach($trace as $arr) {
                $class = $arr['class'];
                $function = $arr['function'];
                $type = $arr['type'];
                echo "\n#Stacktree: {$class}{$type}{$function}()";
            }
            echo "\nPDO::prepare() failed\ngiven command: {$command};\n {$e->getMessage()}\n";

        }

        return $sth;
    }


    /**
     * This prepare SELECT statement with binding $boundCondition and $option. You only have to fetch after this.
     * 
     * @param string $select
     * @param string $tableName
     * @param string $condition
     * @param array $boundValues
     * @param array $options
     * 
     * @return PDOStatement
     */
    private function rawSelect(string $select, string $tableName, string $condition = '', array $boundValues = [], array $options = []):PDOStatement
    {

        if ($condition != NULL) {
            $where = " WHERE {$condition} ";
        }
        else {
            $where = '';
        }


        foreach($options as $key => $value) {
            $$key = $value;
        }

        if ($orderby != NULL) {
            //$sort = ($sort == NULL) ? 'ASC' : $sort;
            $order = " ORDER BY {$orderby} {$sort} ";
        }
        else {
            $order = '';
        }

        if ($limitNum != NULL) {
            if ($limitStart != NULL) {
                $limit = " LIMIT {$limitStart},{$limitNum} ";
            }
            else {
                $limit = " LIMIT {$limitNum} ";
            }
        }
        else {
            $limit = '';
        }


        $query = 'SELECT ' . $select . ' FROM ' . $tableName . $where . $order . $limit;
        $sth = $this->myPrepare($query);

        foreach ($boundValues as $key => $value) {
            if (is_int($value)) {
                $data_type = PDO::PARAM_INT;
            }
            else if (is_string($value)) {
                $data_type = PDO::PARAM_STR;
            }
            else {
                $e = new UnexpectedParamException([$key => $value]);
                echo $e->getMessage();
            }
            
            $sth->bindValue($key, $value, $data_type);
        }

        return $sth;
    }

    


    /**
     * This returns the records you want.
     * 
     * @param string $columns the columns you want (e.g.) 'id, num'
     * @param string $tableName
     * @param string $condition 'id = :id AND num > :num' or 'id = 3, num > 3'
     * @param array $options
     * [
     *      'orderby' => ':orderby'|column name like 'id',
     *      'sort' => 'ASC'|'DESC',
     *      'limitStart' => ':limitStart'|int,
     *      'limitNum' => ':limitNum'|int
     * ]
     * 
     * if you wanna execute multiple sort, set 'orderby' like 'id ASC, name DESC' and don't set 'sort'
     * @param array $boundValues (e.g.) [':id' => int, ':num' => int, ':orderby' => string]
     * 
     * if you wanna bind these manually, this can be empty
     * 
     * @param int $executeFlag if you wanna get PDOStatement and execute it manually, this must be MyDbh::ONLY_PREPARE
     * 
     * 
     * @return array|PDOStatement (e.g.)[ ['id' => int, 'name' => string], [] ] 
     * 
     * 
     * limitStart is the start index minus 1 of the records you want. e.g. When you want from 1 to x, please set 0
     * 
     * limitNum is the num of the records you want.
     * 
     * Note that $boundCondition is only for $condition.
     * Others like $options[':orderby'] will be automatically formatted for prepared statement and bound.
     * 
     */
    public function select(string $columns, string $tableName, string $condition = '', array $options = [], array $boundValues = [], int $executeFlag = self::EXECUTE)
    {  
        $sth = $this->rawSelect($columns, $tableName, $condition, $boundValues, $options);


        if ($executeFlag == self::ONLY_PREPARE) {
            return $sth;
        }
        else if ($executeFlag == self::EXECUTE) {
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $e = new UnexpectedParamException($executeFlag);
            echo $e->getMessage();
        } 
    }


    /**
     * return count of $column of records or prepare count query and return PDOStatement
     * @param string $column
     * @param string $tableName
     * @param string $condition 'id = :id AND num > :num' or 'id = 3, num > 3'
     * @param array $boundCondition (e.g.) [':id' => int, ':num' => int]
     * 
     * if you wanna bind these manually, this can be empty
     * 
     * @param int $executeFlag  if you wanna get PDOStatement and execute it manually, this must be MyDbh::ONLY_PREPARE
     * 
     * @return int|PDOStatement
     * 
     */
    public function count(string $column = '*', string $tableName, string $condition = '', array $boundValues = [], int $executeFlag = self::EXECUTE)
    {
        $select = "count($column) as total";
        $sth = $this->rawSelect($select, $tableName, $condition, $boundValues);

        if ($executeFlag == self::ONLY_PREPARE) {
            return $sth;
        }
        else if ($executeFlag == self::EXECUTE) {
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC)['total'];
        }
        else {
            $e = new UnexpectedParamException($executeFlag);
            echo $e->getMessage();
        }  
    }


    /**
     * prepare insert command, bind columns and return PDOStatement
     * 
     * @param string $tableName
     * @param string $columns (e.g.) ':id, :name' or "0, 'aaa'" or '0, :name' etc
     * @param array $boundColumns
     * (e.g.) [ ':id' => int, ':name' => string]
     * 
     * if you wanna bind these manually, this can be empty
     * @param int $executeFlag
     * 
     * if you wanna execute this manually, this must be MyDbh::ONLY_PREPARE
     * 
     * @return PDOStatement|void
     * 
     */
    public function insert(string $tableName, string $columns, array $boundColumns = [], int $executeFlag = self::EXECUTE)
    {
        $values = ' VALUES(';
        
        $values .= "$columns) ";

        $command = 'INSERT INTO ' . $tableName . $values;
        $sth = $this->myPrepare($command);

        foreach ($boundColumns as $key => $value) {
            if (is_int($value)) {
                $data_type = PDO::PARAM_INT;
            }
            else if (is_string($value)) {
                $data_type = PDO::PARAM_STR;
            }
            else {
                $e = new UnexpectedParamException([$key => $value]);
                echo $e->getMessage();
            }
            
            $sth->bindValue($key, $value, $data_type);
        }

        if ($executeFlag == self::ONLY_PREPARE) {
            return $sth;
        }
        else if ($executeFlag == self::EXECUTE) {
            $sth->execute();
        }
        else {
            $e = new UnexpectedParamException($executeFlag);
            echo $e->getMessage();
        }
        
    }


    /**
     * prepare update command, bind columns, and return PDOStatement
     * 
     * @param string $tableName
     * @param string $columns (e.g.) 'num = :num, name = :name' or "num = 3, name = 'aaa'"
     * 
     * if you wanna increment $columns like 'num', set this like 'num = num + 1'
     * 
     * @param string $condition 'id = :id AND num > :num' or 'id = 3, num > 3'
     * @param array $boundValues (e.g.) [':id' => int, ':num' => int]
     * @param int $executeFlag
     * 
     * if you wanna execute this manually, this must be MyDbh::ONLY_PREPARE
     * 
     * @return PDOStatement|void
     * 
     */
    public function update(string $tableName, string $columns, string $condition = '', array $boundValues = [], $executeFlag = self::EXECUTE)
    {
        $where = " WHERE $condition ";
        $command = 'UPDATE ' . $tableName . ' SET ' .  $columns . $where;
        $sth = $this->myPrepare($command);

        foreach ($boundValues as $key => $value) {
            if (is_int($value)) {
                $data_type = PDO::PARAM_INT;
            }
            else if (is_string($value)) {
                $data_type = PDO::PARAM_STR;
            }
            else {
                $e = new UnexpectedParamException([$key => $value]);
                echo $e->getMessage();
            }
            
            $sth->bindValue($key, $value, $data_type);
        }

        if ($executeFlag == self::ONLY_PREPARE) {
            return $sth;
        }
        else if ($executeFlag == self::EXECUTE) {
            $sth->execute();
        }
        else {
            $e = new UnexpectedParamException($executeFlag);
            echo $e->getMessage();
        }
    }
}
