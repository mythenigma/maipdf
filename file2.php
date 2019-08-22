

<html>
<head>
    <title>MaiTube File Share</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google" content="notranslate">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="PDF安全,maitube,MaiTubePDF,pdf,pdf限制">
     <meta name="description" content="担心PDF内容会被非法传播，本站提供安装的PDF浏览支持">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" href="viewer.css">
<link rel="resource" type="application/l10n" href="locale/locale.properties">
<script src="build/pdf.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<div class="container">
   <div class="jumbotron">
   <p>PDF 安全运用
   
   <ul>
	<li>第一步：上传PDF文件</li>
	<li>第二步：设置可以查看的次数</li>
	<li>第三步：生成链接</li>
    </ul> 
   </p>
	<form action="file2.php" method="post" enctype="multipart/form-data">
		<label for="file">File Name：</label>
		<input type="file" name="file"  id="file"><br>
		<input type="submit" name="upload" value="上传PDF">
	</form>

<?php
//设置成东八区时间
//print_r($_FILES);
session_start();
if(!empty($_FILES) ){
date_default_timezone_set('etc/gmt-8');
$allowedExts = array("pdf", "htm", "html");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
$filename = $_FILES["file"]["name"];

echo $extension;
if (($_FILES["file"]["size"] < 2097152)  && in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		//echo "错误：: " . $_FILES["file"]["error"] . "<br>";
		 die('太大了，2M之内的PDF文件');
	}
	else
	{
		//这些现实的都是不需要的
		echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		//echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
	
	}
	else
		{
			die('太大了，或者格式不正确');
		}
  }else{
		echo "请上传2M之内的文档";
  }	  
?>
 </div>
</div>
<div class="container">
   <div class="jumbotron">
     <form class="form-horizontal"  role="form" action="file2.php" method="post">


    <div class="form-group">
    <label class="col-sm-2 control-label">已上传文件</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="name" name="sender"
         value="<?php empty($_FILES)? print "Please Upload Your File Above": print "/".$year."/".$month."/".$week."/".$_FILES["file"]["name"]; ?>" readonly="readonly">
    </div>
  </div>

  <div class="form-group">   
    <label class="col-sm-2 control-label">查看次数</label> 
    <div class="col-sm-10">
    <input class="form-control" id="focusedInput" type="text"  name="limit" value="">
    </div>
  </div>



  <div class="form-group">  
    <label class="col-sm-2 control-label">留空</label>    
    <div class="col-sm-10">
     <textarea class="form-control" rows="3" name="password"></textarea>
    </div>   
  </div>

<h5  class="text-center">
<input type="submit" value="Create" class="btn btn-success">
</h5>



</form>
   </div>
</div>

<div class="container">
   <h2 class="text-center"><button type="button"  class="btn btn-danger">阅读链接为</button></h2>
   <div class="jumbotron">
<?php
		if(isset ($_POST['limit']) ){
		    $limit=	$_POST['limit'];
			if(isset ($_POST['password']) ){
			 $password=$_POST['password'];
			// echo $_SESSION["url"];
		     $url = $_POST['sender'];
			$identifier=$url.rand(0,100);
			$identifier=md5($identifier);
			if($url!='Please Upload Your File Above'){
			$conn= new mysqli("127.0.0.1","root","xxxxxxxx","record");
			if($conn->connect_error){
				die("CANNOT INSERT");
			}
			$sql="INSERT INTO `pdf` VALUES('$identifier','$url','$password',$limit)";
			//echo $sql;
			//echo "阅读内容的链接为 ： <br>";
			echo "https://www.maitube.com/pdf/redirect.php?email=".$identifier;
			$result=mysqli_query($conn,$sql);
		  }
		 }
		}
?>
<div class="container">
   <div class="jumbotron">
   
   </div>
</div>
</body>
</html>
