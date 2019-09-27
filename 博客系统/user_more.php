<?php
session_start();
include "Conn/conn.php";
include "page.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>博文列表</title>
		<link rel="stylesheet" href="CSS/list.css"/>
		<link href="CSS/index.css" rel="stylesheet"/>
	</head>
	<body style=" background-color:#F1F2F6;">
	<div class="banner">
		<div class="nav">
			<a class="left" href="index.php">博客系统</a>
			<div class="right">
				<?php
				if(isset($_SESSION[username])) {
					?>
					<a class="a" href="./myinfo.php">个人中心</a>
					<a class='a' href='#'>&nbsp;|&nbsp;</a>
					<a class="a" href="./doAction.php?a=loginout">安全退出</a>
					<?php
				}else {
					?>
					<a class='a' href='./login.php'>登录</a>
					<a class='a' href='#'>&nbsp;|&nbsp;</a>
					<a class='a' href='./Register.php'>注册</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="bgimg"></div>
		<!--大盒子-->
		<div id="big"  style="margin-top: -50px;border-radius:5px;">
			
			<!--列表开始-->
			<div id="list">
				<div id="listbt">
					<div id="bkname">
						<h4>博主列表</h4>
					</div>
					<div style="padding-top: 15px;padding-left: 300px;">
						<div id="search">
							<form action="./user_more.php" method="get">
								<input type="text" placeholder="请输入关键字" name="search"/>
								<input type="submit" value="搜索"/>
							</form>

						</div>
					</div>
				</div>
				<div id="bkinfo">
					<div id="bklogo">
						<img src="images/PHP.png"/>
					</div>
				</div>

				<div id="biaotou">
					<ul>
						<li class="tiezibt"><a href="#">用户名</a></li>
						<li><a href="#"></a></li>
						<li><a href="#">操作</a></li>
						<li><a href="#">注册时间</a></li>
					</ul>
				</div>
				
				<?php

					$search=$_GET['search'];

					if(empty($search)){
						$sql="select * from tb_user order by id desc";
					}else{
						$sql="select * from tb_user where userName like '%{$search}%' order by id desc";

					}

					$result1=mysqli_query($link,$sql);

					//======================分页程序===============================

					//定义必须的变量
					$page=isset($_GET['p'])?$_GET['p']:1;
					$pageSize=5;
					$maxRows=1;
					//求变量的值
					$maxRows=mysqli_num_rows($result1);
					$maxPage=ceil($maxRows/$pageSize);
					if($page<=1){
						$page=1;
					}
					if($page>=$maxPage){
						$page=$maxPage;
					}
					//起始条数
					$start_rows=($page-1)*$pageSize;
					$limit=" limit {$start_rows},{$pageSize}";

					//============================================================

					$sql=$sql.$limit;
					$result=mysqli_query($link,$sql);

					if($result && mysqli_num_rows($result)>0){
						while($rows=mysqli_fetch_assoc($result)){
				?>
				
				<div id="listks">
					<div class="invitationzt">
						<div class="invitalogo">

						</div>

						<div class="invitationbt" style="width: 640px;">
							<a href="#"><?php echo $rows['username']?></a>
						</div>

						<div class="reply">
							<a href="./doAction.php?a=add_friend&userid=<?php echo $rows['id']?>">添加为好友</a>
						</div>
						<div class="last">
							<?php echo date("Y-m-d",$rows['time'])?>
						</div>
					</div>
					
					
				</div>
				
				<?php
						}
					}
				
				?>

				<div id="page" style="text-align: center;">
					<div id="pagefy" style="margin: 0 auto;">
						<ul>
							<?php
							echo "<a href='./user_more.php?p=1&search={$search}'>首页</a>|";
							echo "<a href='./user_more.php?p=".($page-1)."&search={$search}'>上一页</a>|";
							echo "<a href='./user_more.php?p=".($page+1)."&search={$search}'>下一页</a>|";
							echo "<a href='./user_more.php?p={$maxPage}&search={$search}'>末页</a>";
							?>
						</ul>
					</div>

				</div>
			</div>
			<!--列表结束-->
		</div>
		<div id="clear"></div>
		<!--大盒子结束-->
			
		<!--页面尾开始-->
	<?php
	include "footer.php";
	?>
		<!--页面尾结束-->
	</body>
</html>