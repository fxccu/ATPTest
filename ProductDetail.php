<?php 
include("Top.php");
$PdtId=$_REQUEST['PdtId'];
if(trim($PdtId)==""||(intval($PdtId)<>$PdtId))
{
  halt("²ÎÊý´íÎó");
  }
$PdtId=intval($PdtId);

$Sql="select a.*,b.CateName from Product a inner join PdtCate b on a.Cateid=b.id  where a.validFlag='1' and a.PdtId=".$PdtId;
$db->query($Sql);
$PdtName=$db->getvalue("PdtName",0);
$Model=$db->getvalue("Model",0);
$CateName=$db->getvalue("CateName",0);
$Description=$db->getvalue("Description",0);
$CateId=$db->getvalue("CateId",0);
$MainImg=$db->getvalue("MainImg",0);
$ValidFlag=$db->getvalue("ValidFlag",0);

	if($MainImg=="")
	{
		$MainImg="images\\none.gif";
		$MainImg_thumb="images\\none.gif";
	 }
	else
	   {
	    $MainImg_thumb=getthumb($MainImg);
	   }

?>

<div id="main">
<div id="left">
  <?php include("left.php");?>
</div>
<!--End left-->

<div id="right">
 <form action="" method="post" name="GoFrom" id="GoFrom">
<div class="commpage">

<h1><img src="style/li.gif" width="15" height="15" /><a href="Product.php">Product Show</a>>><a href="ProductList.php?CateId=<?php echo $CateId; ?>"><?php echo $CateName; ?></a>>><?php  echo $PdtName; ?></h1>

<div>

<div id="PdtPic">
    <div id="PdtPicdiv"><img  src="<?php echo RELATIVE_PATH.$MainImg_thumb; ?>" class="PdtPic" /></div>
     <a href="<?php echo $MainImg; ?>" target="_blank" class="clear"> View Original Pics<!--img src="style/Originalimg.gif" /--></a>
</div>

    <div>
    <h2>Product Name£º<?php  echo $PdtName; ?></h2>
    <ul>
    <li>Model£º<?php echo $PdtName;?></li>
    <li>Name£º<?php echo $Model;?></li>
    </ul>
    </div>
</div>
<div class="clear"></div>
<div class="commpage">
<h1><img src="style/li.gif" width="15" height="15" />Product Detail</h1>

</div>
<?php echo $Description;?>
</div>

 </form >
</div>


<div class="clear"></div>

</div><!-- /* End right */-->
</div><!-- /* End main */-->

<?php include("bottom.php");?>
