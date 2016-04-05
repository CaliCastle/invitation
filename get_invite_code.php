<?php
require_once 'Lib/db.inc.php';

$conn = mysql_connect(DB_HOST,DB_ADMIN,DB_PWD);
$date = date('m-d');
$data = array();

if ($conn){
    mysql_select_db(DB_NAME);
    
    $sql = "SELECT `code` FROM `invite_code` WHERE `valid` = 1 AND `date` = '{$date}' LIMIT 1";
    $result = mysql_query($sql);
    
    if ($row = mysql_fetch_array($result)){
        $sql = "UPDATE `invite_code` SET `valid` = `valid`-1 WHERE `code` = '{$row['code']}'";
        if (mysql_query($sql,$conn)){
            $data['status'] = 1;
            $data['code'] = $row['code'];
        } else {
            $data['status'] = 0;
        }
    } else {
        $data['status'] = 0;
    }
    echo json_encode($data);
    
} else {
    die('数据库连接失败啦 ');
}