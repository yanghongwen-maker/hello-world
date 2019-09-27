<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="CSS/index.css"  rel="stylesheet">
<link href="CSS/register.css"  rel="stylesheet">
<title>用户注册</title>
</head>
<script src="JS/check.js"  language="javascript"></script>
<body>
<div class="banner">
  <div class="nav">
    <a class="left" href="index.php">博客系统</a>

    <div class="right">
      <?php
      if(null !=@$_SESSION[username]) {
        ?>
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
  <div id="big">
    <div class="btfont">
      <h3>注册</h3>
    </div>
    <div class="biaodan">
      <div class="tishi">
        <p>以下选项为必填项，请务必填写完整！！！</p>
      </div>
      <form action="./doAction.php?a=register" method="post">
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
            <td class="you">确认密码<span> *</span></td>
            <td class="zuo"><input type="password" name="surepass"/></td>
          </tr>
         <tr>
            <td class="you">验证码<span> *</span></td>
            <td class="zuo">
              <div style="float: left;"><input type="text" name="code" style="width: 100px;"/></div>
              <div style="float: left;margin-left: 10px;"><img id="checkpic" onclick="changing();" src='code.php' /></div>
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <input type="radio" checked> 我已仔细阅读并接受<a href="RegPro.php" style="color: #0000FF;" target="_blank">博客注册条款</a><br/><br/>
            </td>
          </tr>

          <tr style="text-align:center;">
            <td class="btn" colspan="2">

              <input type="submit" value="注册"/>
              <input type="reset" value="重置"/>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div class="butdl">
      <h3>已经注册？</h3>
      <a href="login.php"><button>去登录</button></a>
    </div>
  </div>
  <div id="clear"></div>

  <!--大盒子结束-->

  <!--页面尾开始-->
  <script>
    function changing(){
      //点击图片，会再次执行code.php文件，后面的参数是防止静态页面缓存导致不能更换
      document.getElementById('checkpic').src="code.php?";
    }
  </script>
  <?php
  include "footer.php";
  ?>
</body>
</html>
