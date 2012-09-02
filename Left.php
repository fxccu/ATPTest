<?php 
//检测是否被非法直接访问
 if(!defined("Authority_Inc"))
   die("Access denied");
?>

<div class="Cate">
<h1>Products</h1>
<?php 

$sql="Select * from PdtCate where ParentId=0 and ValidFlag='1'";
  
 $db->query($sql);
 $db2=$db;
 $CateNum=$db->allcount();
 echo"<ul>";	

 for($i=0;$i<$CateNum;$i++)	
 {
  echo"<li class='firstCate'>\r\n";
  echo"<a href=\"ProductList.php?ParentId=0&CateId=".$db->getValue("Id",$i)."\">".$db->getvalue("CateName",$i)."</a>\r\n";

  
    $sql="Select * from PdtCate where ValidFlag='1' and ParentId=".$db->getValue("Id",$i);
	 $db2->query($sql);
	 $SubCateNum=$db2->allcount();
		 for($j=0;$j<$SubCateNum;$j++)	
		 {  
			echo"<li class='secondCate'>";
			  echo"<a href=\"ProductList.php?CateId=".$db2->getValue("Id",$j)."\">".$db2->getvalue("CateName",$j)."</a>";
			echo"</li>\r\n";
		 }	
	 $sql="Select * from PdtCate where ParentId=0 and ValidFlag='1'";
	 $db->query($sql);
   echo"</li>\r\n";
 }
 echo"</ul>";	

?>
</div>

<div class="Cate">
<h1>Others</h1>
<ul>
<li class='firstCate'><a href="Application.Php">Pics</a></li>
<li  class='firstCate'><a href="Technique.php">Service Technique</a></li>
<li class='secondCate'><a href="DownLoad.Php">DownLoad</a></li>
</ul>
</div>

<div class="Cate">
<h1>Search</h1>
<form name="FrmSearch" action="ProductSearchList.php" method="post" onsubmit="return checkSearch();">
<select name="SearchType">
<option value="CateName">Category</option>
<option value="Model">Model</option>
<option value="Description">Description</option>
</select>
<input  name="Keyword" type="text" size="10">
<input name="" type="submit" value="Search" >
</form>
</div>