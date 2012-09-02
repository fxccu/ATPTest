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
 $PagePn->SetPageSize(10); //每页显示的记录条数
 $BeginRcd=$PagePn->BeginRcd;
 $EndRcd=$PagePn->EndRcd;
 
 echo"<div class='pagepn'>";	
 $PagePn->ShowPageInfo(); 
 $PagePn->showlink();
 $PagePn->ShowTxtJumper(); 
 echo"</div>";	

 
  echo"<ul>";	
 for($i=$BeginRcd;$i<$EndRcd;$i++){   	$FileName=$db->getvalue("FileName",$i);
	$FileUrl=$db->getvalue("FileUrl",$i);
	$FileDescription=$db->getvalue("FileDescription",$i);

	
	echo"<li>\n";
	
	    echo"<li><a href='$FileUrl' target='_blank'><img src='$FileUrl' class='apppic' title='$FileDescription' alt='$FileDescription' /></a></li>\n";
		if(trim($FileDescription)<>"")
		 { echo"<li>$FileDescription</li>";}

	echo"</li>";
  	 
 }	

echo"</ul>";
  ?>

</div>


<div class="clear"></div>
 </form >
</div><!-- /* End right */-->
</div><!-- /* End main */-->


<SCRIPT LANGUAGE="JavaScript">
<!--
nextAd();
-->
</SCRIPT>

<?php include("bottom.php");?>
