<?php 
include("Top.php");
include("include/Page.inc.php");
$whereStr="";
$orderStr=" order by PdtId";
$CateId=$_REQUEST['CateId'];
$ParentId=$_REQUEST['ParentId'];
$SearchType=$_REQUEST['SearchType'];
$Keyword=$_REQUEST['Keyword'];

$CateId=$_REQUEST['CateId'];
if(trim($CateId)==""||(intval($CateId)<>$CateId))
{
 //halt("参数错误");
  }
$CateId=intval($CateId);

$sql="select a.*,b.* from Product a inner join PdtCate b on a.Cateid=b.id  where a.validFlag='1' ";

//搜索条件
 if($SearchType<>""&& trim($Keyword)<>"")
 {
    if($SearchType=="CateName")
       $whereStr=$whereStr." and b.CateName like '%".delquote($Keyword)."%'";
	elseif($SearchType=="Model")
       $whereStr=$whereStr." and a.Model like '%".delquote($Keyword)."%'";
	elseif($SearchType=="Description")
       $whereStr=$whereStr." and a.Description like '%".delquote($Keyword)."%'";
   }
 
//查询分类
  if($ParentId=="0")
      $whereStr=$whereStr." and a.CateId in(select Id from PdtCate where ParentId=$CateId)";  //查询大类
  elseif($CateId<>"")
	  $whereStr=$whereStr." and a.CateId =$CateId";   //查询小类

  $sql1=$sql.$whereStr.$orderStr;


?>

<div id="main">
<div id="left">
<?php include("left.php");?>

<?php 
 $sql="select * from PdtCate where validFlag='1' and id=$CateId";
 $db->query($sql);
?>
  
</div>
<!--End left-->

<div id="right">
 <form action="" method="post" name="GoFrom" id="GoFrom">
<div class="commpage">
<h1><img src="style/li.gif" width="15" height="15" /><a href="Product.php">Products List</a>>><?php echo $db->getvalue("CateName",0);?></h1>
<input name="CateId" type="hidden" id="CateId" value="<?php echo $CateId; ?>" />
<input name="SearchType" type="hidden" id="SearchType" value="<?php echo $SearchType; ?>" />
<input name="Keyword" type="hidden" id="Keyword" value="<?php echo $Keyword; ?>" />

<?php           

$db->query($sql1);
//halt($sql1);

 $PagePn=new page($db);
 $PagePn->SetPageSize(15); //每页显示的记录条数
 $BeginRcd=$PagePn->BeginRcd;
 $EndRcd=$PagePn->EndRcd;
 
 echo"<div class='pagepn'>";	
 $PagePn->ShowPageInfo(); 
 $PagePn->showlink();
 $PagePn->ShowTxtJumper(); 
 echo"</div>";	

 
  echo"<ul>";	
 for($i=$BeginRcd;$i<$EndRcd;$i++){   
 	$Id=$db->getvalue("PdtId",$i);
	$CateId=$db->getvalue("CateId",$i);
	$PdtName=$db->getvalue("PdtName",$i);
	$CateName=$db->getvalue("CateName",$i);
	$Model=$db->getvalue("Model",$i);
	$Description=$db->getvalue("Description",$i);
	$MainImg=$db->getvalue("MainImg",$i);
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
		echo"<li>分类:<a href=\"ProductList.php?CateId=$CateId\" title='$CateName'>$CateName_S</a></li>\n";
		echo"<li>名称:<a href=\"ProductDetail.php?PdtId=$Id\">$PdtName</a></li>";
		echo"</ul></div>";
	echo"</li>";
  	 
 }	

echo"</ul>";

  ?>

</div>


<div class="clear"></div>
 </form >
</div><!-- /* End right */-->
</div><!-- /* End main */-->

<?php include("bottom.php");?>
