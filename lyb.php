<?php 



 $link = mysqli_connect("localhost","root","","demo");

 //连接数据库
 mysqli_select_db($link,"lyb");
 // 选择lyb表
$texxt=$_POST['text'];
echo $texxt;

$insers="insert into lyb(name,age,sex,content)values('johnhh','19','menh','草泥马h')";
// 插入数据到数据表lyb
mysqli_query($link,$insers);

$lod="select name,age,content from lyb where name='johnhh'";
// /查询语句/
 $ss=mysqli_query($link,$lod);
// /返回结果集此时不是数组/

 $row=mysqli_fetch_array($ss,MYSQLI_ASSOC);
 // 从结果集查找是数组

var_dump($row);
// echo 直接打印script，注意单引号
echo "<script>alert('23');</script>";
header("refresh:3;url=https://www.baidu.com/");
// 3s后跳转到百度
 

