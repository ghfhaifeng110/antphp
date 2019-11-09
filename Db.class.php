<?php
class Db{
    private $conn;

    //构造方法
    function __construct($dbname,$usr,$pwd,$host='127.0.0.1',$port=3306,$coding='utf-8'){
        //使用mysqli连接
        $conn = mysqli_connect($host,$usr,$pwd,$dbname);
        if(mysqli_connect_errno($conn)){
            echo "连接数据库失败：".mysqli_connect_errno();
        }

        //设置字符集
        mysqli_set_charset($conn,$coding);

        $this->conn = $conn;
        echo "连接数据库成功";
    }

    //析构方法，不用传参，文件执行完操作
    function __destruct(){
        mysqli_close($this->conn);
        echo "断开数据库连接";
    }

    /***
     * 添加数据
     * @param $table:表名
     * @param $data:添加的数据，数组类型
     */
    public function add($table,$data){
        if(!is_array($data)){
            die("需要传数组类型");
        }

        $fields = $values = '';

        foreach($data as $k=>$v){
            $fields .= '`'.$k.'`,';
            $values .= '"'.$v.'",';
        }

        //去掉右侧的逗号
        $fields = rtrim($fields,",");
        $values = rtrim($values,",");

        //构成sql语句
        $sql = "INSERT INTO {$table}($fields) VALUES($values)";

        //执行SQL
        $ret = mysqli_query($this->conn,$sql);
        return $ret;
    }

    /***
     * 更新记录
     * @param $table:表名
     * @param $data:更新数据
     * @param $where:条件，数组类型，字符
     */
    public function update($table,$data,$where = '1=1'){
        if(!is_array($data)){
            die("需要传数组类型");
        }

        $values = '';
        foreach ($data as $k => $v) {
            $values .= "{$k}='{$v}',";
        }
        //去掉右侧的逗号
        $values = rtrim($values,",");

        //查询条件
        $condition = '';
        if(is_array($where)){
            foreach($where as $k=>$v){
                $condition .= " {$k} = '{$v}' and ";
            }
            $condition = substr($condition,0,-3); //把最后一个and去掉
        }else{
            $condition = $where;
        }

        $sql = "UPDATE {$table} SET {$values} WHERE {$condition}";

        $ret = mysqli_query($this->conn,$sql);
        return $ret;
    }

    /***
     * 查询记录
     * @param $table:表名
     * @param $where:条件，数组类型，字符串
     * @param $fields:查询返回字段
     */
    public function getAll($table,$fields = '*', $where = '1=1'){
        $condition = '';

        if(is_array($where)){
            foreach($where as $k=>$v){
                $condition .= " {$k} = '{$v}' and ";
            }
            $condition = substr($condition,0,-3); //把最后一个and去掉
        }else{
            $condition = $where;
        }

        $sql = "select {$fields} from {$table} where {$condition}";
        $ret = mysqli_query($this->conn,$sql);
        $arr = [];

        // while($row = mysqli_fetch_assoc($ret)){
        //     $arr[] = $row;
        // }

        // $arr = mysqli_fetch_all($ret,MYSQLI_ASSOC);
        $arr = mysqli_fetch_field_direct($ret,1);

        return $arr;
    }
}