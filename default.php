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
<div class="pagecate intro">
<h1><img src="style/li.gif" width="15" height="15" />About Us</h1>
ATP Diagnostics from Finland has created an innovative portfolio of
Products. We help ATP customers and partners in Immunodiagnostics, nucleic acid
Detection, and clinical chemistry technologies, Finish quality pipettes, microplate
Readers, and microplate washers, and clinical chemistry automates .
<?php
//echo mb_substr($PageContent,0,500)."  ";
?>
<a href="Aboutus.php" class="more">More..</a>
</div>

<!--div  class="pagecate news">
<h1><img src="style/li.gif" alt="" width="15" height="15" />News</h1>
<?php 
 $sql="select top 5 * from News where validflag='1' Order by Id desc";
  $db->query($sql);
 echo"<ul>";	
 $NewNum=$db->allcount();
 for($i=0;$i<$NewNum;$i++)	
 {
   $id=$db->getValue("Id",$i);
   $title=$db->getvalue("Title",$i);
   
  echo"<li><a href=\"NewsDetail.php?NewsId=".$id."\" title='$title'>".substr($title,0,88)."</a><span class='time'>&nbsp;&nbsp;&nbsp;".DateTo4($db->getvalue("Appdate",$i))."</span></li>\n";	 
 }	
 
 echo"<li><a href=\"NewsList.Php\" class='more'>More..</a></li>\n";	 
 
  if($NewNum<2)
 {
  for($i=0;$i<=(2-$NewNum);$i++)	
	 {
	  echo"<li></li>\n";	 
	 }
   }
 
 echo"</ul>";

?>
</div-->


<div class="pagecate">
<h1><img src="style/li.gif" width="15" height="15" />Products</h1>

<div id="demo" style="overflow:hidden;margin:0 auto; width:98%">
  <table align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td id="demo1">
      
      <table width="98%" border="0" cellpadding="0" cellspacing="2">
          <tr>


  <?php
 $sql="select  a.*,b.CateName from Product a inner join PdtCate b on a.Cateid=b.id  where a.validFlag='1' ";
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

	if(strlen($CateName)>10)
	    $CateName_S=substr($CateName,0,10)."..";
	  else 
	    $CateName_S=$CateName;
		
      if($MainImg=="")
	  {$MainImg="images\\none.gif";}
	  else
	   {
	    $MainImg=getthumb($MainImg);
	     }
		
	 echo"<td>\n";
		echo"<div class=\"indexComm\" ><ul>";
	    echo"<li><a href=\"ProductDetail.php?PdtId=".$Id."\"><img src=\"$MainImg\" class=\"indexCommPic\"/></a></li>\n";
		//echo"<li>分类：<a href=\"ProductList.php?CateId=$CateId\" title=\"$CateName\">$CateName_S</a></li>\n";
		echo"<li>Name:<a href=\"ProductDetail.php?PdtId=$Id\">$PdtName</a></li>";
		echo"</ul></div>";
	echo"</td>";
  	 
 }	

?>
         
          </tr>
        </table></td>
      <td id="demo2"></td>
    </tr>
  </table>
</div>

</div>

<script language="JavaScript">
    var speed=20;
    demo2.innerHTML=demo1.innerHTML;    //克隆demo1为demo2

    function Marquee(){
        if(demo2.offsetWidth  <= demo.scrollLeft){    //当滚动至demo1与demo2交界时
            demo.scrollLeft = demo.scrollLeft - demo1.offsetWidth;        //demo跳到最顶端
        }
        else{
            demo.scrollLeft++;
        }
		  //  window.status="demo.scrollLeft:"+demo.scrollLeft+"    demo2.offsetWidth"+demo2.offsetWidth;
    }
    var MyMar=setInterval(Marquee,speed);    //设置定时器
    demo.onmouseover=function() {clearInterval(MyMar);}//鼠标移上时清除定时器达到滚动停止的目的
    demo.onmouseout=function() {MyMar=setInterval(Marquee,speed);}//鼠标移开时重设定时器
</script> 


<div class="clear"></div>
 </form>
</div><!-- /* End right */-->
</div><!-- /* End main */-->
<div class="clear"></div>

<?php include("bottom.php");?>
