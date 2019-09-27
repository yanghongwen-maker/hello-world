<?php
session_start();
include "Conn/conn.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>详情</title>
		<link href="CSS/index.css" rel="stylesheet"/>
		<link rel="stylesheet" href="CSS/file.css"/>
	</head>
	<body>
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
		<div id="big" style="margin-top: -50px;">

			<!--详情开始-->
			<div id="bigdetail">
				<div id="detail">
					<?php
						$sql="select * from tb_article where id={$_GET['id']}";
						$result=mysqli_query($link,$sql);

						//5
						if($result && mysqli_num_rows($result)>0){
							foreach($result as $rows){

					?>
				
					<div id="lzinfo">

						<div id="lztoux">
							<div id="uname">
								<a href="#"><?php echo $rows['author']?></a>
							</div>
							<div id="utoux">
								<img src="./images/member/s_<?php
								$uid = $_SESSION['uid'];
								//4. 定义sql语句，并发送
								$sql = "SELECT tb_userdetail.photo FROM tb_userdetail JOIN tb_user ON (tb_userdetail.userid = tb_user.id) where tb_user.username='{$rows['author']}'";
								$result = mysqli_query($link,$sql);

								//5. 解析结果集
								if($result && mysqli_num_rows($result)>0){

									//解析
									$row = mysqli_fetch_assoc($result);
									echo $row['photo'];
								}
								?>" name="amend_img" class="amend_img" style="width: 120px;" onerror="this.src='./images/member/m_201702170637289859.gif'"/>
							</div>

						</div>
					</div>
					<div id="tzinfo">
						<div id="tzbiaot">
							<p>标题：<?php echo $rows['title'];?></p>
						</div>
						
						<div id="tzxiangq">
							<div id="fttime">
								<p>发表于:<?php echo date("Y-m-d",$rows['time'])?></p>

							</div>
							
							<div id="tzneir">
								<div id="tzneir">
									<p><?php echo $rows['content']; ?></p>	
								</div>
							</div>

						</div>
					<?php
							}
						}
								
					?>
					</div>
				</div>
			
			<!--详情结束-->
			
			<!--评论开始-->
				<?php

					$sql="select * from tb_comment where art_id={$_GET['id']}";
					$result=mysqli_query($link,$sql);
					//5
					if($result && mysqli_num_rows($result)>0){
						foreach($result as $rows1) {

							?>

							<div id="detail">

							<div id="lzinfo">

								<div id="lztoux">

									<div id="uname">
										<a href="#"><?php echo $rows1['username'] ?></a>
									</div>
									<div id="utoux">
										<?php
										$sql = "SELECT tb_userdetail.photo FROM tb_userdetail JOIN tb_user ON (tb_userdetail.userid = tb_user.id) where tb_user.username='{$rows1['username']}'";
										$result = mysqli_query($link,$sql);
										foreach($result as $value){
											echo "<a href='#'><img style='width:120px;' src='images/member/{$value[photo]}' class='head' onerror="."this.src='./images/member/m_201702170637289859.gif'"."></a>";
										}
										?>

									</div>

								</div>
							</div>
							<div id="tzinfo">

							<div id="tzxiangq">
							<div id="fttime">
							<p><?php
								switch ($i) {
									case "1":
										echo "沙发";
										break;

									case "2":
										echo "板凳";
										break;

									case "3":
										echo "地板";
										break;

									default :
										echo "{$i}楼";
										break;
								}

								?> 发表于:<?php echo date("Y-m-d", $rows1['time']) ?></p>
								<?php
								if ($rows1['username'] == $_SESSION['username']) {

								?>
								<div style="float: right;"><a
											href="doAction.php?a=del_comment&id=<?php echo $rows1['id'] ?>" onclick="return confirm('确定将此记录删除?')">
										<button style="width:60px;height:25px;">删除</button>
									</a></div>
								<?php
									}
								?>
							</div>
							<div id="tzneir">
							
							<div id="tzneir">
								
								<p><?php echo $rows1['content']; ?></p>
								
							</div>

							</div>

							<div id="tzshare">
							
							</div>
						</div>
						
					</div>
				</div>
				
				<?php
						}
				}

				?>

			</div>

			<div style="width:940px;border-top:solid 1px #000;background-color: #fff;padding: 20px;float: left;">
				<form action="./doAction.php?a=comment&art_id=<?php echo $_GET[id] ;?>" method="post">
					<span style="font-size: 18px;">发表评论：</><div style="float: right;padding-right: 20px;"><input style="width: 60px;height: 25px;" type = "submit" value="提交" /></div>
					<br/><br/>
					<!-- 加载编辑器的容器 -->
					<script id="container" name="content" type="text/plain">
							请填写内容
						</script>
					<!-- 配置文件 -->
					<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
					<!-- 编辑器源码文件 -->
					<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
					<!-- 实例化编辑器 -->
					<script type="text/javascript">
						var ue = UE.getEditor('container');
					</script><br/><br/>

				</form>
			</div>
		</div>

		<div id="clear"></div>
		<!--大盒子结束-->
	<?php
	include "footer.php";
	?>
	</body>
</html>