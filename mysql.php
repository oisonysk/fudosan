<?php

function mysql_s($db = 'oison4_pegasus') {
    $url = "mysql58.xserver.jp";
    $user = "oison4_pegasus";
    $pass = "pegasus";
    $link = mysql_connect($url, $user, $pass) or die("");
    mysql_query("SET NAMES utf8", $link);
    $sdb = mysql_select_db($db, $link) or die("");
}

?>