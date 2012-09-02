<?php 
include("Include/init.php");
$sql="Select * from WebConfig";
$db->query($sql);
$WebConfig_Title=$db->getvalue("title",0);
$WebConfig_Description=$db->getvalue("Description",0);
$WebConfig_SubTitle=$db->getvalue("SubTitle",0);
$WebConfig_Footer=$db->getvalue("Footer",0);
?>


<html>
<head>
<title><?php echo $WebConfig_Title;?></title>
<meta name="description" content="<?php echo $WebConfig_Description;?>" />
<meta name="keywords" content= content="<?php echo $SubTitle;?>"  />
<link type="text/css" rel="stylesheet" href="style/style.css" />
<script src="js/Validator.js"></script>
<script src="js/comm.js"></script>
</head>
<body>
<div id='Header'> 
<div id='blog_title'></div>
<!--div id="cover"><?php echo $WebConfig_SubTitle;?></div-->


<div id="message"></div>
</div>


<div id="navigation">
<div>
<ul>
<li><a href="Default.php">Home</a></li>
<li><a href="AboutUs.php">About Us</a></li>
<li><a href="Product.php">Products</a></li>
<li><a href="Technique.php">Services</a></li>
<li><a href="Application.php">HIV R&D</a></li>
<li><a href="NewsList.php">News</a></li>
<li><a href="Promises.php">Promises</a></li>
<li><a href="Hr.php">Join Us</a></li>
<li><a href="ContactUs.php">Contact Us</a></li>
</ul>
</div>
</div>
<div class="clear"></div>

<!--div id="qqService">
<h1></h1>
<ul>
 <li>市场部</li>
 <li><a target=blank href=tencent://message/?uin=88998090&Site=上海齐万&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:88998090:1 alt="点击这里给我发消息"></a>
 </li>
 <li>技术支持</li>
  <li><a target=blank href=tencent://message/?uin=939020535&Site=上海齐万&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:939020535:1 alt="点击这里给我发消息"></a> </li>
</ul>
</div-->