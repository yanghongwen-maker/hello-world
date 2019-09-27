<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
if($_SESSION[username]==""){
	echo "<script>alert('对不起，请登录!');window.location.href='./login.php';</script>";
	exit();
}
?>
