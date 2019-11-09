<?php
namespace fastphp\base;

use fastphp\db\Sql;

class Model extends Sql{
    public function __construct($table){
        parent::__construct($table);
    }
}