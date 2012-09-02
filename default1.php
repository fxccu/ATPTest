<?php 
include("Top.php");
include("include/commpage.inc.php");
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
<div class="pagecate">
<h1><img src="style/li.gif" width="15" height="15" />公司简介</h1>
<?php
echo mb_substr($PageContent,0,500)."  ";
?>
<a href="Aboutus.php" class="more">详细..</a>
</div>

<div  class="pagecate news">
<h1><img src="style/li.gif" alt="" width="15" height="15" />公司新闻</h1>
<?php 
 $sql="select top 5 * from News where validflag='1' Order by Id desc";
  $db->query($sql);
 echo"<ul>";	
 $NewNum=$db->allcount();
 for($i=0;$i<$NewNum;$i++)	
 {
   $id=$db->getValue("Id",$i);
   $title=$db->getvalue("Title",$i);
   
  echo"<li><a href=\"NewsDetail.php?NewsId=".$id."\" title='$title'>".mb_substr($title,0,88)."</a><span class='time'>".DateTo4($db->getvalue("Appdate",$i))."</span></li>\n";	 
 }	
 
 echo"<li><a href=\"NewsList.Php\" class='more'>更多..</a></li>\n";	 
 
  if($NewNum<5)
 {
  for($i=0;$i<=(5-$NewNum);$i++)	
	 {
	  echo"<li></li>\n";	 
	 }
   }
 
 echo"</ul>";

?>
</div>


<div class="pagecate">
<h1><img src="style/li.gif" width="15" height="15" />产品展示</h1>
<ul>
<?php
 $sql="select  top 3 a.*,b.CateName from Product a inner join PdtCate b on a.Cateid=b.id  where a.validFlag='1' ";
 $db->query($sql);
  $RcdCount=$db->allcount();
 for($i=0;$i<$RcdCount;$i++){   
 	$Id=$db->getvalue("PdtId",$i);
	$CateId=$db->getvalue("CateId",$i);
	$PdtName=$db->getvalue("PdtName",$i);
	$MainImg=$db->getvalue("MainImg",$i);
	$CateName=$db->getvalue("CateName",$i);
	$Model=$db->getvalue("Model",$i);
	$Description=$db->getvalue("Description",$i);
	$ValidFlag=$db->getvalue("ValidFlag",$i);
	
	if(mb_strlen($CateName)>10)
	    $CateName_S=mb_substr($CateName,0,10)."..";
	  else 
	    $CateName_S=$CateName;
		
      if($MainImg=="")
	  {$MainImg="images\\none.gif";}
	  else
	   {
	    $MainImg=getthumb($MainImg);
	     }
		
	
	echo"<li class='recommend'>\n";
		echo"<div ><ul>";
	    echo"<li><a href='ProductDetail.php?PdtId=".$Id."' class='clear'><img src='$MainImg' class='commimg'/></a></li>\n";
		echo"<li>分类：<a href=\"ProductList.php?CateId=$CateId\" title='$CateName'>$CateName_S</a></li>\n";
		echo"<li>名称：<a href=\"ProductDetail.php?PdtId=$Id\">$PdtName</a></li>";
		echo"</ul></div>";
	echo"</li>";
  	 
 }	

?>
</ul>
</div>


<div class="clear"></div>
 </form>
</div><!-- /* End right */-->
</div><!-- /* End main */-->
<div class="clear"></div>

<?php include("bottom.php");?>
