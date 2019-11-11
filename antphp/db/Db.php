<?php
// +----------------------------------------------------------------------
// | AntPHP 
// +----------------------------------------------------------------------
// | Copyright (c) 2019 http://antphp.duopinku.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ghfhaifeng <ghfhaifeng@163.com>
// +----------------------------------------------------------------------
//数据库操作

namespace antphp\db;

use PDO;
use PODException;

class Db
{
    private static $pdo = null;

    public static function pdo()
    {
        if(self::$pdo != null){
            return self::$pdo;
        }

        try{
            $dsn = sprintf("mysql:host=%s;prot:%s;dbname=%s;charset=utf8",DB_HOST,DB_PROT,DB_NAME);
            $option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

            return self::$pdo = new PDO($dsn,DB_USER,DB_PASS,$option);
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
}