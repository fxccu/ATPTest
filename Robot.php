<?php 
include("Admin/init.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style/main.css" rev="stylesheet" type="text/css" />
<script language="javascript" src="js/win_dialog.js"></script>
<script language="javascript" src="js/ajax.js"></script>
<script language="javascript" src="js/comm.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
</head>
<body>

<div class="main">
<div class="cate">
<?php $cate->show_cate_list();?>
 <A href="#" onclick="ShowFrom('FrmAddCate',this)"><img src="images/add.gif"/>���</A> 
 <A href="#" onclick="ShowFrom('FrmAddLink',this)"><img src="images/linkadd.gif"/>���</A> 
 <A href="#" onclick="ShowFrom('FrmLogin',this)"><img src="images/logout.gif"/>�˳�</A>
 <A href="#" onclick="ShowFrom('FrmRobot',this)"><img src="images/logout.gif"/>�ɼ�</A>
</div>

<div class="content">
<div class="center">
  <div class="inputtbl" id="FrmRobot">
    <h2>�ɼ�
      <input type="image" src="images/quit.gif" title="�˳�" onclick='close_dialog()'  class="quitlogin"/>
    </h2>
    <ul>
      <form id="LoginForm" name="LoginForm" action="Action.php?Action=AddCate" method="post" enctype="multipart/form-data" >
        <li> ��ַ:
          <input name="Url" type="text" class="input" id="Url" size="75"/>
          * </li>
        <li>��ʼ:
          <input name="StartPage" type="text" class="input" id="StartPage" value="160" size="4" />
          -
          <input name="EndPage" type="text"  class="input" id="EndPage" value="168" size="4"/>
          <input name="CurrentPage" type="hidden" id="CurrentPage" value="0" />
          <input name="ReadPage" type="hidden" id="ReadPage" value="0" />
          ���룺
          <input name="Encode" type="text"  class="input" id="Encode" value="GB2312" size="8"/>
        </li>
        <li> ����:
          <input name="PtnTitle" type="text" class="input" id="PtnTitle" size="75" />
        </li>
        <li> ����:
          <input name="PtnAuthor" type="text" class="input" id="PtnAuthor" size="75" />
        </li>
        <li>����:
          <input name="PtnDate" type="text" class="input" id="PtnDate" size="75" />
        </li>
        <li>����:
          <input name="PtnContent" type="text" class="input" id="PtnContent" size="75" />
        </li>
        <li>
        ��ǰUrl:
          <input name="NowStatus" type="text" class="input" id="NowStatus" size="73" readonly disabled="disabled" />
        </li>
        <li>
        <div id="ProcessStatus">
        <img src="images/btn_bg1.gif" alt="" width="0%" height="18" border="0" id="Processed" />
        </div>
        </li>
        <li>
          <label>
          <input name="btnRobotStart" type="button" id="btnRobotStart" value="��ʼ�ɼ�" class="btn" />
          <input name="btnRobotEnd" type="button" id="btnRobotEnd" value="ֹͣ" class="btn" onclick="RobotStop('LoginForm')" />
          <input name="btnRobotTest" type="button" id="btnRobotTest" value="����" class="btn" onclick="RobotTest('LoginForm')"/>
          <input name="btnCancel" type="button" id="btnCancel" value="ȡ��" class="btn" />
          </label>
        </li>
      </form>
    </ul>
  </div>
  <div>
</div>
</div>
<div id="text"><div>
</body>
</html>
