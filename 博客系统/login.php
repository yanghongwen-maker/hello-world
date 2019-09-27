<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
    <link rel="stylesheet" href="./css/login.css"/>
</head>
<body>
<!--顶部条-->
<div class="banner">
    <div class="nav">
        <a class="left" href="index.php">博客系统</a>

        <div class="right">
            <?php
            if(isset($_SESSION[username])) {
                ?>
                <a class="a" href="#">安全退出</a>
                <?php
            }else {
                ?>
                <a class='a' href='#'>登录</a>
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
<div id="big">
    <div class="btfont">
        <h3>登陆</h3>
    </div>
    <div class="biaodan">
        <div class="tishi">
            <p>错误次数不得超过五次，否则会被锁定！</p>
        </div>
        <form action="./doAction.php?a=login" method="post">
            <table width="380" border="0" cellspacing="15">
                <tr>
                    <td class="you">用户名<span> *</span></td>
                    <td class="zuo"><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td class="you">密  码<span> *</span></td>
                    <td class="zuo"><input type="password" name="pass"/></td>
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
                        <input type="submit" value="登 录"/>
                        <input type="reset" value="重 置"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="butdl">
        <h3>还没有账号？</h3>
        <a href="./Register.php"><button>去注册</button></a>
    </div>
</div>
<div id="clear"></div>
<!--大盒子结束-->

<!--页面尾开始-->
<script>
    function changing(){
        document.getElementById('checkpic').src="code.php?"+Math.random();
    }
</script>
<?php
include "footer.php";
?>

</body>
</html>