<?php
require_once '../Lib/db.inc.php';

$code = $_GET['code'];
$date = $_GET['date'];

$con = mysql_connect(DB_HOST,DB_ADMIN,DB_PWD);

if ($con){
    mysql_select_db(DB_NAME);
    mysql_query("set names utf8;");
    
    $sql = "INSERT INTO `invite_code` (`code`,`date`) VALUES ('{$code}','{$date}')";
    if (mysql_query($sql,$con)){
        echo '1';
    } else {
        echo '-1';
    }
} else {
    die('数据连接出错啦');
}