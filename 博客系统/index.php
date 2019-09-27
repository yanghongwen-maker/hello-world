<?php
session_start();
include "Conn/conn.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="CSS/index.css"  rel="stylesheet">
<title>博客系统</title>
</head>
<script src="JS/check.js" language="javascript">
</script>

<body >
<div class="banner">
	<div class="nav">
		<a class="left" href="index.php">博客系统</a>

		<div class="right">
			<?php
				if(null !=@$_SESSION[username]) {
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
<div class="content">
	<div class="con_left">
		<div class="con_left1">
			<?php include "cale.php"; ?>
		</div>

		<div class="con_left1">
            <div class="con_header">
              <div class="testTXT"><span>最新博客文章</span></div></div>
            <?php
                $sql="select id,title from tb_article order by id desc limit 5";
                $result = mysqli_query($link,$sql);
                foreach($result as $v){
            ?>

                <div class="">
                    <ul style="padding-left: 20px;margin:5px 0;">
                        <li><a href="file_show.php?id=<?php echo $v[id];?>" target="_blank"><?php echo mb_substr(@$v[title],0,50);?></a></li>
                    </ul>

                </div>
                <hr/>
            <?php
                }
            ?>

            <div style="text-align: right;">
                <a href="file_more.php"><img src=" images/more.gif" width="27" height="9" border="0">&nbsp;&nbsp;&nbsp;</a>
            </div>
		</div>

		<div class="con_left1">
            <div class="con_header"><div class="testTXT"><span>最新入驻博主</span></div></div>

            <?php
                $sql="select id,username from tb_user order by id desc limit 5";
                $result = mysqli_query($link,$sql);
                foreach($result as $v){
            ?>
                <div class="">
                    <ul style="padding-left: 20px;margin:5px 0;">
                        <li><a href="#"><?php echo mb_substr(@$v[username],0,12);?></a></li>
                    </ul>
                </div>
                    <hr/>
            <?php
                }
            ?>

            <div style="text-align: right;">
                <a href="user_more.php"><img src=" images/more.gif" width="27" height="9" border="0">&nbsp;&nbsp;&nbsp;</a>
            </div>
		</div>
	</div>

	<div class="con_right">
        <div class="">
            <div class="blog_list_wrap">
                <?php
                    $p_sql = "select * from tb_article order by id desc limit 5;";
                    $p_rst = mysqli_query($link,$p_sql);
                    foreach($p_rst as $v){
                ?>
                    <dl class="blog_list">
                        <dt>
                            <?php
                                $sql = "SELECT tb_userdetail.photo,tb_user.username FROM tb_userdetail JOIN tb_user ON (tb_userdetail.userid = tb_user.id) where tb_user.username='{$v['author']}'";
                                $result = mysqli_query($link,$sql);
                                foreach($result as $value){
                                    echo "<a href='#'><img src='images/member/{@$value[photo]}' class='head' onerror="."this.src='./images/member/m_201704280314241066.jpg'"."></a>
                                          <a href='#' class='nickname'>$value[username]</a>";
                                }
                            ?>
                        </dt>
                        <dd>
                            <h3 class="tracking-ad" data-mod="popu_254"><a href="file_show.php?id=<?php echo $v['id']?>" target="_blank"><?php echo $v['title'];?></a></h3>
                            <div class="blog_list_c"><?php echo substr($v['content'],0,1000);?></div>
                            <div class="blog_list_b">
                                <div class="blog_list_b_r fr">
                                    <label><?php echo date("Y-m-d H:i:s",$v['time']);?></label>
                                </div>
                            </div>

                        </dd>
                    </dl>
                <?php
                    }
                ?>

            </div>
        </div>
        <div class="more"><a href="file_more.php"><button>浏览更多</button></a></div>
	</div>

	<div class="clear"></div>
</div>
<?php
include "footer.php";
?>
</body>
</html>

