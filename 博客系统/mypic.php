
<?php
session_start();
include "Conn/conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>个人中心</title>
		<link rel="stylesheet" href="./CSS/register.css"/>
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
		<?php
			$uid=$_SESSION['uid'];
			$sql="select * from tb_userdetail where userid={$uid};";
			$result=mysqli_query($link,$sql);

			if($result&& mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){

		?>
		<!--大盒子-->
		<div id="big">
			<div class="btfont">
				<h3>个人头像信息</h3>
			</div>
			<div class="biaodan">
				<div class="tishi">
					<p>请选择正常头像</p>
				</div>
				<form action="./doAction.php?a=updatePic" method="post" enctype="multipart/form-data">
					<table width="380" border="0" cellspacing="15">
						
						<tr>
							<td>上传头像：</td>
							<td><input type = "file" name="upic"  accept="image/gif,image/jpeg,image/jpg,image/png"/></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<img src="./images/member/s_<?php
								//定义sql语句，并发送
								$sql = "select photo from tb_userdetail where userid={$uid}";
								$result = mysqli_query($link,$sql);

								//解析结果集
								if($result && mysqli_num_rows($result)>0){

									//解析
									$row = mysqli_fetch_assoc($result);
									echo $row['photo'];
								}
									?>" name="amend_img" class="amend_img" onerror="this.src='./images/member/nophoto.gif'"/>
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
				<a href="myinfo.php"><button>个人信息</button></a>
				<br/>
				<a href="index.php"><button>返回主页</button></a>
			</div>
		</div>
		<div id="clear"></div>
		<!--大盒子结束-->
			
		<!--页面尾开始-->
		<?php 
			}
		} 
		
		 ?>
	<?php
	include "footer.php";
	?>
	</body>
</html>