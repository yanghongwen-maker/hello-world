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
		<script src=" JS/initcity.js"></script>
	</head>
	<body>
		<!--导入header头-->
		<div class="banner">
			<div class="nav">
				<a class="left" href="index.php">博客系统</a>

				<div class="right">
					<?php
					if(null !=@$_SESSION[username]) {
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
			$sql="select * from tb_userdetail where userid={$uid};";
			$result=mysqli_query($link,$sql);
			if($result&& mysqli_num_rows($result)>0){

				while($row=mysqli_fetch_assoc($result)){

		?>
		<!--大盒子-->
		<div id="big" style="margin-top: -50px;">
			<div class="btfont">
				<h3>个人信息</h3>
			</div>
			<div class="biaodan" style="height: 700px;">
				<div class="tishi">
					<p>请填写能正常收发邮件的邮箱</p>
				</div>
				<form action="./doAction.php?a=update" method="post">
					<table width="380" border="0" cellspacing="15">
						<tr>
							<td class="you"><span> *</span>用户名</td>
							<td class="zuo"><?php echo $_SESSION['username']?></td>
						</tr>
						<tr>
							<td class="you">昵称</td>
							<td class="zuo"><input type="text" name="nickname" value="<?php echo $row['nickname']?>"/></td>
						</tr>
						<tr>
							<td class="you">email</td>
							<td class="zuo"><input type="email" name="email" value="<?php echo $row['email']?>"/></td>
						</tr>
						<tr>
							<td class="you">QQ</td>
							<td class="zuo"><input type="text" name="qq" value="<?php echo $row['qq']?>"/></td>
						</tr>
						<tr>
							<td class="you">生日</td>
							<td class="zuo"><input type="text" name="birthday" placeholder="格式为0000-00-00" value="<?php echo $row['birthday']?>"/></td>
						</tr>
						<tr>
							<td class="you">性别</td>
							<td>
								<input style="margin-left: 10px;" type="radio" name="sex" value="w" <?php echo $row['sex']=='w'? "checked":""?>/>女
								<input style="margin-left: 20px;" type="radio" name="sex" value="m" <?php echo $row['sex']=='m'? "checked":""?>/>男
							</td>
						</tr>
						<tr>
							<td class="you">所在城市</td>
							<td class="zuo"><SELECT style="width: 125px;height: 34px;" name="province" id="to_cn" onchange="set_city(this, document.getElementById('city'));" class="login_text_input" >

									<option value=0>请选择</option>

									<option value=台湾>台湾</option>

									<option value=北京>北京</option>

									<option value=上海>上海</option>

									<option value=天津>天津</option>

									<option value=重庆>重庆</option>

									<option value=河北省>河北省</option>

									<option value=山西省>山西省</option>

									<option value=辽宁省>辽宁省</option>

									<option value=吉林省>吉林省</option>

									<option value=黑龙江省>黑龙江省</option>

									<option value=江苏省>江苏省</option>

									<option value=浙江省>浙江省</option>

									<option value=安徽省>安徽省</option>

									<option value=福建省>福建省</option>

									<option value=江西省>江西省</option>

									<option value=山东省>山东省</option>

									<option value=河南省>河南省</option>

									<option value=湖北省>湖北省</option>

									<option value=湖南省>湖南省</option>

									<option value=广东省>广东省</option>

									<option value=海南省>海南省</option>

									<option value=四川省>四川省</option>

									<option value=贵州省>贵州省</option>

									<option value=云南省>云南省</option>

									<option value=陕西省>陕西省</option>

									<option value=甘肃省>甘肃省</option>

									<option value=青海省>青海省</option>

									<option value=内蒙古>内蒙古</option>

									<option value=广西>广西</option>

									<option value=西藏>西藏</option>

									<option value=宁夏>宁夏</option>

									<option value=新疆>新疆</option>

									<option value=香港>香港</option>

									<option value=澳门>澳门</option>
								</SELECT>
								<select style="width: 125px;height: 34px;" id="city" class=login_text_input name="city">

									<option value=0>请选择</option>

								</select> </td>
						</tr>
						<tr>
							<td class="you">个人签名</td>
							<td class="zuo">
								<textarea name="sign" id="sign" style="width: 250px;height: 80px;"><?php echo $row['sign']?></textarea></td>
						</tr>
						<tr>
							<td class="you">自我介绍</td>
							<td class="zuo">
								<textarea name="introduce" id="introduce" style="width: 250px;height: 120px;"><?php echo $row['introduce']?></textarea>
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
			<div class="butdl" style="height: 700px;">
				<a href="file.php"><button>发表博文</button></a><br/>
				<a href="file_list.php"><button>博文列表</button></a><br/>
				<a href="friend_list.php"><button>朋友列表</button></a><br/>
				<a href="mypic.php"><button>修改头像</button></a><br/>
				<a href="update_pass.php"><button>修改密码</button></a><br/>
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