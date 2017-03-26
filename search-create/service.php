<?php 
// 设置页面内容是html编码格式utf-8
include_once("save.php");

header("Content-Type: text/plain;charset=utf-8"); 
// php设置的全局变量如下数组staff不能再函数中调用，要在函数中调用要加上
// globe $staff 这种格式。但是超全局变量可以直接调用不用加globe，
// 如$_SERVER之类的

$staff = array
(
	array("name"=>'john',"number"=>'101',"sex"=>'man',"job"=>'ceo'),
	array("name"=>'anna',"number"=>'102',"sex"=>'women',"job"=>'stuff'),
	array("name"=>'liergou',"number"=>'103',"sex"=>'man',"job"=>'banzhuan')
	);

$ar1=array("name"=>'在二维数组添加一维成功了   ',"number"=>'123',"sex"=>'123',"job"=>'123');
		
		$staff[]=$ar1;
// 定义员工表格数组

// 判断请求方式如果是POSt调用craete（），如果是GET调用search（）
if ($_SERVER["REQUEST_METHOD"] == "GET"){
	search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
	create();
}



// isset（）判断变量是否定义，定义的话返回true，未定义或者定义未赋值都返回false；empty（）判断变量是否为空
// ，变量不存在或者变量存在但是值为空，0，null之类返回true，若变量存在但是值不唯0，空，null则返回flase

// 定义通过编号搜索员工方法search（）
function search(){

	if(!isset($_GET['number'])||empty($_GET['number']))
		{echo "参数错误";
	return;}

	global $staff;


	$number=$_GET['number'];
	$result="没有这个员工";


	foreach ($staff as $value) {
		if($value["number"]==$number)
		{
			$result="找到员工：员工编号".$value["number"].
			"员工姓名：".$value["name"]."员工性别：".$value["sex"].
			"员工职位：".$value["job"];
			break;
		}}
		echo $result;
		var_dump($staff);

	}

// 创建员工
	function create(){
		if(!isset($_POST["name"])||empty($_POST["name"])
			||!isset($_POST["number"])||empty($_POST["number"])
			||!isset($_POST["sex"])||empty($_POST["sex"])
			||!isset($_POST["job"])||empty($_POST["job"]))

			{ echo "参数不全，员工信息填写不全";
		return;}

		
		global $staff;
		var_dump($staff);
		echo "员工：".$_POST["name"]."信息保存成功!";
		global $aaa;
		echo $aaa;
	}




	?>