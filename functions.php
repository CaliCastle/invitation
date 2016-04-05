<?php
require_once 'Lib/db.inc.php';
/* Variables */
$home_page_url = 'http://'.$_SERVER['HTTP_HOST'];
$page_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$home_title = "Abletive论坛内测活动";
$home_desc = "Abletive论坛内测活动";

function getUsername(){
    $usercookie = $_COOKIE['inivte'];
    return $usercookie;
}

function checkCode(){
    $con = mysql_connect(DB_HOST,DB_ADMIN,DB_PWD);
    if ($con){
        mysql_select_db(DB_NAME);
        $date = date('m-d');
        $sql = "SELECT * FROM `invite_code` WHERE `valid` = 1 AND `date` = '{$date}'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        if (!$row){
            // DOES NOT EXIST
            return false;
        } else { 
            // EXISTS
            return true;
        }
    } else {
        die('数据库连接出错啦！');
    }
    return false;
}