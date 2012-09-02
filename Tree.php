<?php 
include("Top.php");
include("include/tree.inc.php");
        
 $sql="select * from PicList where ValidFlag='1' order by  id desc";
 $db->query($sql);
 ?>
 <div id='main'> 
 <form>
 <div  id='tree' style='text-align:left;'>
   
  <?php 
     $mytree=new tree($db,"PdtCate");
     $mytree->creteTree(0);
  ?>
</div>

dfa
<label>
<input type="button" name="button" id="button" value="°´Å¥" onclick="getTreeValue('PdtCate')" />
</label>
 </form>

</div>

<?php include("bottom.php");?>
