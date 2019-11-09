<?php
namespace fastphp\db;

use fastphp\db\Db;
use \PDOStatement;

class Sql{
    //数据库表名
    protected $table;
    private $where;
    private $order;

    //PDO bindParam()绑定参数集合
    private $param = array();

    //返回字段
    private $fields = '*';

    /***
     * 构造函数
     */
    function __construct($table){
        $this->table = $table;
    }

    /***
     * 查询后返回的字段
     */
    public function fields($fields){
        if(!empty($fields)){
            $this->fields = $fields;
        }

        return $this;
    }

    /***
     * 查询条件
     */
    public function where($where = ''){
        if($where){
            $this->where = ' WHERE '.$where;
        }

        return $this;
    }

    /***
     * 排序
     */
    public function order($order = ''){
        if($order){
            $this->order = ' ORDER BY '.$order;
        }

        return $this;
    }

    /***
     * 查询全部
     */
    public function fetchAll(){
        $sql = sprintf("SELECT %s from `%s` %s %s",$this->fields,$this->table,$this->where,$this->order);
        $sth = Db::pdo()->prepare($sql);
        $sth->execute(); //执行预处理语句

        return $sth->fetchAll();
    }

    /***
     * 查询一条
     */
    public function fetch(){
        $sql = sprintf("SELECT %s from `%s` %s %s",$this->fields,$this->table,$this->where,$this->order);
        $sth = Db::pdo()->prepare($sql);
        $sth->execute(); //执行预处理语句

        return $sth->fetch();
    }

    /***
     * 新增数据
     * @param $data:数据类型，数组
     * @return int 返回影响的行数
     */
    public function add($data){
        $sql = sprintf("insert into `%s` %s",$this->table,$this->formatInsert($data));
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth,$data);
        $sth->execute();

        return $sth->rowCount();
    }

    /***
     * 数据转成插入格式的SQL语句
     */
    private function formatInsert($data){
        $fields = array();
        $names = array();

        foreach($data as $key => $value){
            $fields[] = sprintf("`%s`",$key);
            $names[] = sprintf(":%s",$key);
        }

        $field = implode(',',$fields);
        $name = implode(',',$names);

        return sprintf("(%s) values (%s)",$field,$name);
    }

    /***
     * 点位符绑定具体的变量值
     * @param PDOStatement $sth 要绑定的PDOStatement对象
     * @param array $params 参数，有三种类型：
     * 1）如果SQL语句用问号?占位符，那么$params应该为
     *    [$a, $b, $c]
     * 2）如果SQL语句用冒号:占位符，那么$params应该为
     *    ['a' => $a, 'b' => $b, 'c' => $c]
     *    或者
     *    [':a' => $a, ':b' => $b, ':c' => $c]
     *
     * @return PDOStatement
     */
    private function formatParam(PDOStatement $sth,$params = array()){
        foreach($params as $param => &$value){
            $param = is_int($param) ? $param + 1 : ':'.ltrim($param,':');
            $sth->bindParam($param,$value);
        }

        return $sth;
    }
}
