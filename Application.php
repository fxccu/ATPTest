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

<h1><img src="style/li.gif" width="15" height="15" />应用图库</h1>

<?php           
 $sql="select * from PicList where ValidFlag='1' order by  id desc";
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
 	$Id=$db->getvalue("id",$i);
	$FileName=$db->getvalue("FileName",$i);
	$FileUrl=$db->getvalue("FileUrl",$i);
	$FileDescription=$db->getvalue("FileDescription",$i);
	
	$MainImg=getthumb($FileUrl);
	 
	
	echo"<li class='recommend'>\n";
		echo"<div ><ul>";
	    echo"<li><a href='$FileUrl' class='apppic' target='_blank' title='$FileDescription' ><img src='$MainImg' id='apppic' /></a></li>\n";
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
