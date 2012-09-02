<?php 
include("Top.php");
include("include/commpage.inc.php");
include("include/Page.inc.php");
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

<h1><img src="style/li.gif" width="15" height="15" />技术知识</h1>

<?php           
 $sql="select * from Technique where validFlag='1' ";
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

  echo"<li><a href=\"TechniqueDetail.php?NewsId=".$db->getValue("Id",$i)."\">".$db->getvalue("Title",$i)."</a>  <span class='time'>".DateTo4($db->getvalue("Appdate",$i))."</span></li>\n";	 
 }	

echo"</ul>";
  ?>

</div>


<div class="clear"></div>
 </form >
</div><!-- /* End right */-->
</div><!-- /* End main */-->

<?php include("bottom.php");?>
