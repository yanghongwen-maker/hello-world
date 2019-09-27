<?php 
	session_start();
	include "Conn/conn.php";

	switch($_GET['a']){
		//注册用户
		case "register":
		
			//获取用户提交的各项信息
			$name = $_POST['name'];
			$pass = $_POST['pass'];
			$surepass = $_POST['surepass'];
			$code=$_POST['code'];
			$re_ip=getenv(REMOTE_ADDR);
			$re_time=time();
			//判断验证码
			if($code!=$_SESSION['vcode']){
				echo "<script>alert('验证码错误');window.location.href='register.php'</script>";
				die;
			}
			//判断用户信息是否为空
			if(empty($name)||empty($pass)||empty($surepass)){
				echo "<script>alert('数据不能为空');window.location.href='register.php'</script>";
				die;
			}
			//判断密码和确认密码是否一致
			if($pass!=$surepass){
				echo "<script>alert('密码不一致');window.location.href='register.php'</script>";
				die;
			}
			//判断用户名是否存在
			$sql="select * from tb_user where userName='{$name}';";
			$result=mysqli_query($link,$sql);

			 if($result&& mysqli_num_rows($result)>0){
				echo "<script>alert('用户名已存在');window.location.href='register.php'</script>";
				die;
			}

			//4.定义sql语句并发送执行
			$sql = "Insert Into tb_user (username,userpwd,re_ip,re_time,authority) Values ('$name','$pass','$re_ip','$re_time',0)";
			$result = mysqli_query($link,$sql);

			//5.判断是否添加成功
				if($result && mysqli_affected_rows($link)>0){
					$uid=mysqli_insert_id($link);
					//获取用户id，添加进userdetail表
					$sql="insert into `tb_userdetail`(`userid`)values({$uid});";
					$result=mysqli_query($link,$sql);
					if($result&&mysqli_affected_rows($link)>0){
						$_SESSION['username']=$name;
						$_SESSION['uid']=$uid;
						echo "<script>alert('注册成功');window.location.href='index.php'</script>";
					}
				}else{
					echo ("<script>alert('注册失败！');history.go(-1);</script>");
					exit();
				}

		break;

		//修改用户信息
		case "update":

		$uid = $_SESSION['uid'];
		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$qq = $_POST['qq']?$_POST['qq']:0;
		$sex=$_POST['sex'];
		$birthday=$_POST['birthday']?$_POST['birthday']:0;
		$province=$_POST['province'];
		$city=$_POST['city'];
		$sign=$_POST['sign'];
		$introduce=$_POST['introduce'];
		//定义sql语句并发送执行
		$sql="update tb_userdetail set nickname='{$nickname}',email='{$email}',qq='{$qq}',sex='{$sex}',birthday='{$birthday}',province='{$province}',city='{$city}',sign='{$sign}',introduce='{$introduce}' where userid={$uid}";
		$result=mysqli_query($link,$sql);
		if($result && mysqli_affected_rows($link)>0){
			echo "<script>alert('修改成功');window.location.href='myinfo.php'</script>";
		}else{
			echo "<script>alert('修改失败');window.location.href='myinfo.php'</script>";
		}

		break;

		//修改文章
		case "edit_file":

			$id = $_GET['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			//定义sql语句并发送执行
			$sql="update tb_article set title='{$title}',content='{$content}' where id={$id}";
			$result=mysqli_query($link,$sql);
			if($result && mysqli_affected_rows($link)>0){
				echo "<script>alert('修改成功');window.location.href='file_list.php'</script>";
			}else{
				echo ("<script>alert('注册失败！');history.go(-1);</script>");
				exit();
			}

		break;

		//修改头像
		case "updatePic":
		
				//删除旧文件
				$sql="select photo from tb_userdetail where userid={$_SESSION['uid']}";
				$result=mysqli_query($link,$sql);
				if($result&&mysqli_num_rows($result)>0){
					$row=mysqli_fetch_assoc($result);
				}

				if($row['photo']){
					unlink("./images/member/{$row['photo']}");
					unlink("./images/member/s_{$row['photo']}");
					unlink("./images/member/m_{$row['photo']}");
				}

				//引入函数
				require_once("./functions.php");
				//定义必须的变量
				$path = "./images/member";
				$upfile = $_FILES['upic'];
				$typeList = array("image/jpeg","image/png","image/gif");
				$maxSize = 0;

				//执行上传
				$res = upload($path,$upfile,$typeList,$maxSize);

				//判断上传是否上传成功
				if($res['error']==false){
					die($res['info']);
				}
				//获取文件名
				$picname=$res['info'];
				//等比缩放
				imageResize($path,$picname,100,100,$pre="s_");
				imageResize($path,$picname,65,65,$pre="m_");
				//将文件名存入数据库

				$sql="update tb_userdetail set photo='{$picname}' where userid={$_SESSION['uid']}";
				$result=mysqli_query($link,$sql);
				if($result&&mysqli_affected_rows($link)>0){

					echo "<script>alert('修改成功');window.location.href='mypic.php?picname={$picname}'</script>";
				}else{
					echo "<script>alert('修改失败');window.location.href='mypic.php'</script>";
				}

		break;

		//修改密码
		case "update_pass":
			if($_POST['code'] != $_SESSION['vcode']){
				echo ("<script>alert('验证码不正确！');history.go(-1);</script>");
				exit();
			}
		
			//获取用户提交的各项信息
			$oldpass = $_POST['oldpass'];
			$pass = $_POST['pass'];
			$surepass = $_POST['surepass'];

			//判断用户信息是否为空
			if(empty($pass)||empty($surepass)){
				echo "<script>alert('数据不能为空');window.location.href='update_pass.php'</script>";
				die;
			}
			
			//判断密码和确认密码是否一致
			if($pass!=$surepass){
				echo "<script>alert('密码不一致');window.location.href='update_pass.php'</script>";
				die;
			}
			
			$uid=$_SESSION['uid'];
			//判断旧密码是否正确
			$sql = "select userpwd from tb_user where id='{$uid}'";
			$result = mysqli_query($link,$sql);
			if($result&& mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				if($row['userpwd']!=$oldpass){
					echo "<script>alert('原密码错误');window.location.href='update_pass.php'</script>";
					die;
				}
			}
			//4.定义sql语句并发送执行
			$sql = "update tb_user set userpwd={$pass} where id={$uid}";
			$result = mysqli_query($link,$sql);
				
			//5.判断是否添加成功
				if($result && mysqli_affected_rows($link)>0){
					unset($_SESSION);
					echo "<script>alert('修改成功');window.location.href='login.php'</script>";
				}else{
					echo "<script>alert('修改失败');window.location.href='update_pass.php'</script>";
				}

		break;

//登录
case "login":
	//判断验证码
	if($_POST['code'] != $_SESSION['vcode']){
		echo ("<script>alert('验证码不正确！');history.go(-1);</script>");
		exit();
	}
	//定义sql语句，并发送执行
	//获取表单提交的信息
	@$name=$_POST['name'];
	@$pass=$_POST['pass'];

	if(empty($name)||empty($pass)){
		echo "<script>alert('账号或密码为空');window.location.href='login.php'</script>";
		die;
	}

	$sql="select * from tb_user where username='{$name}'&& userpwd='{$pass}';";
	$result=mysqli_query($link,$sql);


	//解析结果集
	if($result&& mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		// 设置session
		$_SESSION['username']=$name;
		$_SESSION['uid']=$row['id'];
		//跳转到index.PHP
		echo "<script>alert('登录成功');window.location.href='index.php'</script>";
		die;

	}else{
		echo "<script>alert('账号或密码错误');window.location.href='login.php'</script>";
		die;
	}

break;

		//注销
		case "loginout":

			//销毁session
			unset($_SESSION);

			//3.删除服务器端的session文件
			session_destroy();

			//4.删除客户端的cookie文件
			setcookie(session_name(),"",time()-1,"/");

			echo "<script>alert('你已经注销');window.location.href='index.php'</script>";
		break;

		//发表文章
		case "fatie":

			$title=$_POST['title'];
			$content=$_POST['content'];
			//判断信息是否为空
			if(empty($title)){
				echo "<script>alert('标题不能为空');window.location.href='file.php'</script>";
				die;
			}
			if(empty($content)){
				echo "<script>alert('内容不能为空');window.location.href='file.php'</script>";
				die;
			}
			//4
			$sql="insert into tb_article(id,title,content,author,time)values(null,'{$title}','{$content}','{$_SESSION[username]}',".time().")";
			$result=mysqli_query($link,$sql);
			//5
			if($result && mysqli_affected_rows($link)>0){
				echo "<script>alert('发帖成功');window.location.href='file_list.php?'</script>";
				die;
			}else{
				echo "<script>alert('发帖失败');window.location.href='file.php'</script>";
				die;
			}

		break;

		//发表评论
		case "comment" :
			$content=$_POST['content'];
		
			$art_id = $_GET['art_id'];
			if(!$_SESSION[username]){
				echo "<script>alert('请登录');window.location.href='login.php'</script>";
				die;
			}
			//4
			$sql="insert into tb_comment(id,art_id,content,username,time)values(null,'{$art_id}','{$content}','{$_SESSION[username]}',".time().")";
			$result=mysqli_query($link,$sql);
			//5
			if($result && mysqli_affected_rows($link)>0){
				echo "<script>alert('成功');window.location.href='file_show.php?id={$_GET['art_id']}'</script>";
				die;
			}else{
				echo "<script>alert('失败');window.location.href='file_show.php?id={$_GET['art_id']}'</script>";
				die;
			}

		break;

		//删除评论
		case "del_comment":

			$id = $_GET['id'];
			//定义sql语句并发送执行
			$sql="delete from tb_comment where id={$id}";
			$result=mysqli_query($link,$sql);
			if($result && mysqli_affected_rows($link)>0){
				echo "<script>alert('删除成功');history.go(-1);</script>";
			}else{
				echo ("<script>alert('删除失败！');history.go(-1);</script>");
				exit();
			}

			break;

		//删除文章
		case "del_file":

			$id = $_GET['id'];
			//定义sql语句并发送执行
			$sql="delete from tb_article where id={$id}";
			$result=mysqli_query($link,$sql);
			if($result && mysqli_affected_rows($link)>0){
				echo "<script>alert('删除成功');window.location.href='file_list.php'</script>";
			}else{
				echo ("<script>alert('删除失败！');history.go(-1);</script>");
				exit();
			}

		break;

		//添加朋友
		case "add_friend":
			if($_SESSION[username]==""){
				echo "<script>alert('对不起，请登录!');window.location.href='./login.php';</script>";
				exit();
			}
			$id = $_GET['userid'];
			$sql="select * from tb_user where id=$id;";
			$result=mysqli_query($link,$sql);
			//解析结果集
			if($result&& mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				$name = $row['username'];
			}
			//判断是否存在
			$sql="select * from tb_friend where `name`='$name' && username='{$_SESSION[username]}'";
			$result=mysqli_query($link,$sql);
			if($result && mysqli_affected_rows($link)>0){
				echo "<script>alert('已经是您的朋友');window.location.href='user_more.php?'</script>";
				die;
			}else{
				//执行添加
				$sql="insert into tb_friend(id,`name`,username)values(null,'{$name}','{$_SESSION[username]}')";
				$result=mysqli_query($link,$sql);
				if($result && mysqli_affected_rows($link)>0){
					echo "<script>alert('添加成功');window.location.href='friend_list.php?'</script>";
					die;
				}else{
					echo "<script>alert('添加失败');window.location.href='user_more.php'</script>";
					die;
				}
			}

		break;

		//删除朋友
		case "del_friend":

			$id = $_GET['id'];
			//定义sql语句并发送执行
			$sql="delete from tb_friend where id={$id}";
			$result=mysqli_query($link,$sql);
			if($result && mysqli_affected_rows($link)>0){
				echo "<script>alert('删除成功');window.location.href='friend_list.php'</script>";
			}else{
				echo ("<script>alert('删除失败！');history.go(-1);</script>");
				exit();
			}

			break;
	}

//释放
if ($result){
	mysqli_free_result($result);
}
//6.关闭数据库
mysqli_close($link);
	
?>	
		
		
		