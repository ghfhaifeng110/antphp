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
//框架模型

namespace antphp\base;

use antphp\db\Sql;

class Model extends Sql
{
    public function __construct($table)
    {
        parent::__construct($table);
    }
}