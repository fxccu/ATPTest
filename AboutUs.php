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

<h1><img src="style/li.gif" width="15" height="15" /><?php echo $PageTitle;?></h1>
<?php echo $PageContent; ?>
</div>

<div class="clear"></div>
 </form >
</div><!-- /* End right */-->
</div><!-- /* End main */-->

<?php include("bottom.php");?>
