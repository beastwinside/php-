<?php 
// header("Content-Type:text/plain;charset=utf-8");
// $username=$_POST["username"];
// $password=$_POST["password"];


if(isset($_POST["submit"])&&$_POST["submit"]=="登陆")
{

	$username=$_POST["username"];
	$password=$_POST["password"];
	if($username==""||$password=="")
	{
		echo "未填写账户密码以及用户名称<br/>";

	}
	// 第二个if大括号结尾处
	else
	{echo "用户名和密码都填写了，进入下一步 <br/>";
     $username=$_POST["username"];
$password=$_POST["password"];
     $link=mysqli_connect("localhost","root","","userinfo");
      mysqli_select_db($link,"uesr");
       mysqli_query($link,"set name 'utf8'");
   $sql="select name,password from user where password ='$password' and name= '$username'";
    $result = mysqli_query($link,$sql); 

    $num= mysqli_num_rows($result);
   if($num)
   	{echo "登陆成功，返回首页";
   		header("refresh:3;url=http://test.com/login&register3/login.html");
   	}
   else
   	{ echo "登陆失败,重新登陆";
header("refresh:3;url=http://test.com/login&register3/login.html");
}

      





	}
	// else结束处 














}
// if大括号结束处

else 
	{echo "<script>window.history.go(-1);</script>";
echo "<script>alert('请勿修改登陆按钮');</script>";}








?>