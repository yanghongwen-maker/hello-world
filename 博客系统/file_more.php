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
		<link rel="stylesheet" href="CSS/index.css"/>

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
						<h4>博文列表</h4>
					</div>
					<div id="bzname">

					</div>
				</div>
				<div id="bkinfo">
					<div id="bklogo">
						<img src="images/PHP.png"/>
					</div>
					<div id="tjinfo">

					</div>
					<div id="bkjianj">


					</div>
				</div>

				<div id="biaotou">
					<ul>
						<li class="tiezibt" style="width: 550px;"><a href="#">标题</a></li>
						<li><a href="#">作者</a></li>
						<li><a href="#">查看</a></li>
						<li><a href="#">发表时间</a></li>
					</ul>
				</div>
				
				<?php
					//分页
					$sql="select id from tb_article ";
					$result=mysqli_query($link,$sql);
					//计算总条数
					$rows = $result->num_rows;
					//调用分页函数
					Page($rows,4);
					$sql = "select * from tb_article limit $select_from $select_limit";
					$result=mysqli_query($link,$sql);
					//5
					if($result && mysqli_num_rows($result)>0){
						while($rows=mysqli_fetch_assoc($result)){
						
				?>
				
				<div id="listks">
					<div class="invitationzt">
						<div class="invitalogo">

						</div>

						<div class="invitationbt">
							<a href="#"><?php echo $rows['title']?></a>
						</div>

						<div class="custor">
							<a href="#"><?php echo $rows['author']?></a>
						</div>
						<div class="reply">
							<a href="./file_show.php?id=<?php echo $rows['id']?>">查看</a>
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
							<?php echo $pagenav;?>
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