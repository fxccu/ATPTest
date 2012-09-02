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

<h1><img src="style/li.gif" width="15" height="15" />DownLoad</h1>

<?php           
 $sql="select * from FileList where validFlag='1' ";
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
    $id=$db->getvalue("id",$i);
    $FileName=$db->getvalue("FileName",$i);
	$FileDescription=$db->getvalue("FileDescription",$i);
	$FileType=$db->getvalue("FileType",$i);
	$FileSize=$db->getvalue("FileSize",$i);
	$FileUrl=$db->getvalue("FileUrl",$i);
	$AppDate=DateTo4($db->getvalue("AppDate",$i));
	$ValidFlag=$db->getvalue("ValidFlag",$i);
   echo"<li><a href=\"$FileUrl\">".$FileName."</a>  <span class='time'>".$AppDate."</span></li>\n";	 
 }	

echo"</ul>";
  ?>

</div>


<div class="clear"></div>
 </form >
</div><!-- /* End right */-->
</div><!-- /* End main */-->

<?php include("bottom.php");?>
