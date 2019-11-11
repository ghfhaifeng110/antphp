# AntPHP

①$_SERVER['PHP_SELF']：相对于网站根目录的路径及 PHP 程序名称，与 document root 相关。
②$_SERVER['SCRIPT_NAME']:相对于网站根目录的路径及 PHP 程序文件名称 。
③$_SERVER['SCRIPT_FILENAME']:当前运行 PHP 程序的绝对路径及文件名。
④$_SERVER['REQUEST_URI']:访问此页面所需的 URI 。
⑤$_SERVER['DOCUMENT_ROOT']:当前运行 PHP 程序所在的文档根目录，在服务器配置文件中定义。
⑥$_SERVER['PATH_INFO']:提取文件路径之后的/.例如：index.php/m/mm/c/cc/a/aa?a=1这个链接会提取/m/mm/c/cc/a/aa

举例：localhost:99/index.php/index/data?a=1
[SYSTEMROOT] => C:\WINDOWS
[COMSPEC] => C:\WINDOWS\system32\cmd.exe
[PATHEXT] => .COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC
[WINDIR] => C:\WINDOWS
[PHP_FCGI_MAX_REQUESTS] => 1000
[PHPRC] => D:/phpStudy2018/PHPTutorial/php/php-7.1.13-nts/
[_FCGI_SHUTDOWN_EVENT_] => 928
[PATH_TRANSLATED] => redirect:\index.php\data
[PATH_INFO] => /index/data
[SCRIPT_NAME] => /index.php
[REQUEST_URI] => /index.php/index/data?a=1
[QUERY_STRING] => a=1
[REQUEST_METHOD] => GET
[SERVER_PROTOCOL] => HTTP/1.1
[GATEWAY_INTERFACE] => CGI/1.1
[REMOTE_PORT] => 65332
[SCRIPT_FILENAME] => D:/WWW/antphp/index.php
[SERVER_ADMIN] => admin@php.cn
[CONTEXT_DOCUMENT_ROOT] => D:/WWW/antphp
[CONTEXT_PREFIX] =>
[REQUEST_SCHEME] => http
[DOCUMENT_ROOT] => D:/WWW/antphp
[REMOTE_ADDR] => ::1
[SERVER_PORT] => 99
[SERVER_ADDR] => ::1
[SERVER_NAME] => localhost
[SERVER_SOFTWARE] => Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9
[SERVER_SIGNATURE] =>
[SystemRoot] => C:\WINDOWS
[HTTP_COOKIE] => Hm_lvt_779477dce4f531d67a95c370d66aa4fb=1571707079; Hm_lvt_d887fbb030de3ea48b6dbcbafba2671f=1571800501
[HTTP_ACCEPT_LANGUAGE] => zh-CN,zh;q=0.9
[HTTP_ACCEPT_ENCODING] => gzip, deflate, br
[HTTP_SEC_FETCH_SITE] => none
[HTTP_ACCEPT] => text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3
[HTTP_SEC_FETCH_USER] => ?1
[HTTP_SEC_FETCH_MODE] => navigate
[HTTP_USER_AGENT] => Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36
[HTTP_UPGRADE_INSECURE_REQUESTS] => 1
[HTTP_DNT] => 1
[HTTP_CONNECTION] => close
[HTTP_HOST] => localhost:99
[FCGI_ROLE] => RESPONDER
[PHP_SELF] => /index.php/index/data
[REQUEST_TIME_FLOAT] => 1573002744.8633
[REQUEST_TIME] => 1573002744

# 常用函数
ucfirst() 函数把字符串中的首字符转换为大写。
lcfirst() - 把字符串中的首字符转换为小写
strtolower() - 把字符串转换为小写
strtoupper() - 把字符串转换为大写
ucwords() - 把字符串中每个单词的首字符转换为大写
call_user_func_array — 调用回调函数，并把一个数组参数作为回调函数的参数
extract(array,extract_rules,prefix) - 函数从数组中将变量导入到当前的符号表。
        EXTR_OVERWRITE - 默认。如果有冲突，则覆盖已有的变量。
        EXTR_SKIP - 如果有冲突，不覆盖已有的变量。
        EXTR_PREFIX_SAME - 如果有冲突，在变量名前加上前缀 prefix。
        EXTR_PREFIX_ALL - 给所有变量名加上前缀 prefix。
        EXTR_PREFIX_INVALID - 仅在不合法或数字变量名前加上前缀 prefix。
        EXTR_IF_EXISTS - 仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。
        EXTR_PREFIX_IF_EXISTS - 仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
        EXTR_REFS - 将变量作为引用提取。导入的变量仍然引用了数组参数的值。