<?php
header("Content-type:text/html;charset=utf-8");
//1.连接数据库服务器(如果连接成功是一个对象，如果失败呢则返回一个false)
$link = mysqli_connect("localhost","root","123456") or die("数据库连接失败！");

//2.设置编码
mysqli_set_charset($link,"utf8");

//3.选择数据库
mysqli_select_db($link,"db_tmlog");

?>
