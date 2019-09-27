<?php
session_start();
include "Conn/conn.php";
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>个人中心</title>
		<link rel="stylesheet" href="./CSS/register.css"/>
	</head>
	<body>
		<!--导入header头-->
		<div class="banner">
			<div class="nav">
				<a class="left" href="index.php">博客系统</a>

				<div class="right">
					<?php
					if(isset($_SESSION[username])) {
						?>
						<a class="a" href="index.php">首页</a>
						<a class='a' href='#'>&nbsp;|&nbsp;</a>
						<a class="a" href="doAction.php?a=loginout">安全退出</a>
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
		<?php
			$uid=$_SESSION['uid'];
			$sql="select * from tb_user where id={$uid};";
			$result=mysqli_query($link,$sql);

			if($result&& mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result)

		?>
		<!--大盒子-->
		<div id="big">
			<div class="btfont">
				<h3>个人信息</h3>
			</div>
			<div class="biaodan">
				
				<form action="./doAction.php?a=update_pass" method="post">
					<table width="380" border="0" cellspacing="15">
						<tr>
							<td class="you">原密码<span> *</span></td>
							<td class="zuo"><input type="password" name="oldpass" value=""/></td>
						</tr>
						<tr>
							<td class="you">新密码<span> *</span></td>
							<td class="zuo"><input type="password" name="pass" value=""/></td>
						</tr>
						<tr>
							<td class="you">确认密码<span> *</span></td>
							<td class="zuo"><input type="password" name="surepass" value=""/></td>
						</tr>
						<tr>
							<td class="you">验证码<span> *</span></td>
							<td class="zuo">
								<div style="float: left;"><input type="text" name="code" style="width: 100px;"/></div>
								<div style="float: left;margin-left: 10px;"><img id="checkpic" onclick="changing();" src='code.php' /></div>
							</td>
						</tr>
						<tr style="text-align:center;">
							<td class="btn" colspan="2">
								<input type="submit" value="修改"/>
								<input type="reset" value="重置"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="butdl">
				<a href="mypic.php"><button>修改头像</button></a><br/>
				<a href="index.php"><button>返回主页</button></a><br/>
				<a href="myinfo.php"><button>个人信息</button></a>
			</div>
		</div>
		<div id="clear"></div>
		<!--大盒子结束-->
				<?php
				include "footer.php";
				?>
		<?php 
			
		} 
		
		 ?>
		<script>
			function changing(){
				document.getElementById('checkpic').src="code.php?"+Math.random();
			}
		</script>
	</body>
</html>