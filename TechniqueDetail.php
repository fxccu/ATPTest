<?php 
include("Top.php");
include("include/commpage.inc.php");
include("include/Page.inc.php");
$NewsId=$_REQUEST['NewsId'];

if(trim($NewsId)==""||(intval($NewsId)<>$NewsId))
{
  halt("参数错误");
  }
$NewsId=intval($NewsId);



$Sql="Select * from Technique Where validFlag='1' and Id=".$NewsId;
$db->query($Sql);
$Title=$db->getvalue("Title",0);
$Content=$db->getvalue("Content",0);
$AppDate=$db->getvalue("AppDate",0);
$ValidFlag=$db->getvalue("ValidFlag",0);

$commpage=new commpage($db,1);
$PageTitle=$commpage->title;
$PageContent=$commpage->content;
?>

<div id="main">
<div id="left">
  <?php include("left.php");?>
</div>
<!--End left-->

<div id="right">
 <form action="" method="post" name="GoFrom" id="GoFrom">
<div class="commpage">

<h1><img src="style/li.gif" width="15" height="15" /><a href="Technique.php">技术知识</a>>><?php  echo $Title; ?></h1>

<?php           
 echo"<div class='pagepn'>";	
  echo "Published Date:".$AppDate;	
 echo"</div>";	

 echo $Content;	
?>

</div>


<div class="clear"></div>
 </form >
</div><!-- /* End right */-->
</div><!-- /* End main */-->

<?php include("bottom.php");?>
