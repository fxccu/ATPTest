<?php 
include("Top.php");
include("include/Page.inc.php");
?>

<div id="main">
<div id="left">
  <?php include("left.php");?>
</div>
<!--End left-->

<div id="right">
 <form action="" method="post" name="GoFrom" id="GoFrom">
<div class="commpage">
<h1><img src="style/li.gif" width="15" height="15" />Products</h1>

<?php           
 $sql="select a.*,b.CateName from Product a inner join PdtCate b on a.Cateid=b.id  where a.validFlag='1' ";
 $db->query($sql);
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
		//echo"<li>Category：<a href=\"ProductList.php?CateId=$CateId\" title='$CateName'>$CateName_S</a></li>\n";
		echo"<li>Name:<a href=\"ProductDetail.php?PdtId=$Id\">$PdtName</a></li>";
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
