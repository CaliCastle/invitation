<?php

require_once('db.inc.php');

function setup(){
    $con = mysql_connect(DB_HOST,DB_ADMIN,DB_PWD);

    if ($con) {
        if (mysql_query('CREATE DATABASE IF NOT EXISTS ' . DB_NAME . ' DEFAULT CHARSET utf8 COLLATE utf8_general_ci;', $con)){
            mysql_select_db(DB_NAME);
            $table_create_sql = 'CREATE TABLE IF NOT EXISTS `invite_code` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `code` varchar(20) NOT NULL,
              `date` varchar(5) NOT NULL,
              `valid` tinyint(1) NOT NULL DEFAULT 1,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';

            if (mysql_query($table_create_sql,$con)){                
                $sql = 'CREATE TABLE IF NOT EXISTS `manage_admin` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `user_login` varchar(255) NOT NULL,
                      `password` varchar(50) NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;';
                mysql_query($sql,$con);
                $sql = 'INSERT INTO `manage_admin` (`user_login`,`password`) VALUES ("cali","Castle123-");';
                mysql_query($sql,$con);
                echo '成功啦';
            }else
                die(mysql_error());
        } else { die('<p>数据库创建失败. <br>Error: ' . mysql_error() . '</p>'); }
    } else {
        die('<p>数据库连接时出错啦！<br>Error: ' . mysql_error() . '</p>');
    }
}

setup();