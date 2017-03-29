<?php 

echo "注册检查页面<br>";

if(isset($_POST["submit"]) && $_POST["submit"] == "注册")
{
	$user=$_POST['username'];
	$psw=$_POST['password'];
	$confirm=$_POST['confirm'];
	if($user==""||$psw==""||$confirm=="")
		{echo "确认填写完整";}
	else
		{if ($psw==$confirm) 
			{
				echo "密码相同";
// 存放用户信息到数据库开始处
				$link=mysqli_connect("localhost","root","","userinfo");
				mysqli_select_db($link,"user");
				mysqli_query($link,"set name 'utf8'");
				$sql="select name from user where name='$user'";
				$result=mysqli_query($link,$sql);
				$num= mysqli_num_rows($result) ;

				if($num)
				{
					echo "<script>alert('该用户已经存在,返回重试');
					history.go(-1);</script>";
				}
				else
				{
					$sql_insert="insert into user (name,password) values('$user','$psw')";
					$res_insert=mysqli_query($link,$sql_insert);
					if($res_insert)
					{
						echo "<script>alert('注册成功');history.go(-1);</script>";
					}

					else{

						echo "<script>alert('系统繁忙，稍后再试');history.go(-1);</script>";
					}

				}
// 存放用户信息到数据库结束处
			}
			else
			{

				echo "<script>alert( '两次输入不同滚回去在填写一遍');
				window.history.go(-1);</script>";
			}


		}



	}


	?>