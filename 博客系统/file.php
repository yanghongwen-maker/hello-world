<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>发表博文</title>
		<link rel="stylesheet" href="./CSS/file.css"/>
		<link href="CSS/index.css" rel="stylesheet"/>
	</head>
	<body style=" background-color:#F1F2F6;">
	<div class="banner">
		<div class="nav">
			<a class="left" href="index.php">博客系统</a>

			<div class="right">
				<?php
					session_start();
					include "Conn/conn.php";
					if(isset($_SESSION[username])) {
				?>
					<a class="a" href="./myinfo.php">个人中心</a>
					<a class='a' href='#'>&nbsp;|&nbsp;</a>
					<a class="a" href="#">安全退出</a>
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
		<div id="big" >
			
			<!--详情-->
			<div id="bigdetail">
				<div id="detail" style="margin-top: -50px;border-radius:5px;">
					<div id="lzinfo" style="margin-top: 10px;margin-left: 10px;">

						<div id="lztoux">
							<div id="uname">
								<a href="#"><?php echo $_SESSION['username']?></a>
							</div>
							<div id="utoux">
								<img style="width: 120px;" src="./images/member/s_<?php
								$uid = $_SESSION['uid'];
								//4. 定义sql语句，并发送
								$sql = "select photo from tb_userdetail where userid={$uid}";
								$result = mysqli_query($link,$sql);
								//5. 解析结果集
								if($result && mysqli_num_rows($result)>0){
									$row = mysqli_fetch_assoc($result);
									echo $row['photo'];
								}
								?>" name="amend_img" class="amend_img" onerror="this.src='./images/member/nophoto.gif'"/>
							</div>

						</div>
					</div>
					<div id="tzinfo">

						<div id="tzxiangq">
							<div id="fttime">
								<p>博主 发表于:<?php echo date("Y-m-d",time())?></p>

							</div>
							<div id="tzneir">
							
							<div class = "tiezi_content2">
								<form action="./doAction.php?
								<?php
								if($_GET['a']=="edit_file"){echo "a=edit_file&id=$_GET[id]";}else{echo "a=fatie";} ?>" method="post">

									文章标题：<br/><input style="height: 30px;width: 250px;" type = "text" name="title" value="
									<?php
									if($_GET['a']=='edit_file')
									{
										$sql = "select title from tb_article where id={$_GET['id']}";
										$result = mysqli_query($link,$sql);
										//5. 解析结果集
										if($result && mysqli_num_rows($result)>0){
											$row = mysqli_fetch_assoc($result);
											echo $row['title'];
										}}?>" /><br/><br/>
									文章内容：<br/>
									<!-- 加载编辑器的容器 -->
									<script id="container" name="content" type="text/plain">
										<?php
										if($_GET['a']=='edit_file')
										{
											$sql = "select content from tb_article where id={$_GET['id']}";
											$result = mysqli_query($link,$sql);

											//5. 解析结果集
											if($result && mysqli_num_rows($result)>0){

												//解析
												$row = mysqli_fetch_assoc($result);
												echo $row['content'];
											}}?>
									</script>
									<!-- 配置文件 -->
									<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
									<!-- 编辑器源码文件 -->
									<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
									<!-- 实例化编辑器 -->
									<script type="text/javascript">
										var ue = UE.getEditor('container');
									</script><br/><br/>
									<input type = "submit" value="确认发表" />
								</form>

							</div>
			
							
							</div>

							<div id="tzpingfxx">
								
							</div>
							<div id="tzpingfxx">
								
							</div>
							<div id="tzpingfxx">
								
							</div>
							<div id="tzhuif">
							
							</div>
							<div id="tzshare">
							
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--详情结束-->
		</div>
		<div id="clear"></div>
		<!--大盒子结束-->
	<?php
	include "footer.php";
	?>
	</body>
</html>