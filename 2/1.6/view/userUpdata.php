<!-- 超级管理员 对管理员的编辑 -->
<?php 
  @include"../class/public.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simpla Admin by www.865171.cn</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
 <?php include './view/public/sidebar.php'; ?>
  <!-- End #sidebar -->
  <div id="main-content">
    <!-- 头部公共部分导入 -->
    <?php include './view/public/publicTopTitle.php'; ?>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>管理员编辑</h3>
        <ul class="content-box-tabs">
          <!-- <li><a href="#tab1" class="default-tab">Table</a></li> -->
          <!-- href must be unique and match the id of target div -->
          <!-- <li><a href="#tab2">Forms</a></li> -->
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->



      <div class="content-box-content">
        <!-- 写文章 -->
        <!-- End #tab1 -->
        <div class="tab-content default-tab" id="tab2" >
          <form action="index.php" method="post">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>管理员名称：</label>
              <input class="text-input small-input" type="text" id="small-input" name="username" / value="<?php
                echo $_SESSION['updata']['username']
              ?>">
              <span class="input-notification success png_bg">Successful message</span>
              <!-- Classes for input-notification: success, error, information, attention -->
              <br />
              <small>A small description of the field</small> 
            </p>
            <p>
              <label>管理员密码</label>
              <input class="text-input medium-input datepicker" type="text" id="medium-input" name="password"  value="<?php
                echo $_SESSION['updata']['password']
              ?>"/>
              <span class="input-notification error png_bg">Error message</span> 
            </p>
            </p>
            <p>
              <label>权限等级</label>
              <input type="hidden"  name="user" />
              <select name="userJuris">
                <option value ="a" <?php if($_SESSION['updata']['Juris'] == 'a') echo 'selected';?> >A</option>
                <option value ="b" <?php if($_SESSION['updata']['Juris'] == 'b') echo 'selected';?> >B</option>
                <option value="c" <?php if($_SESSION['updata']['Juris'] == 'c') echo 'selected';?>  >C</option>
                <option value="d" <?php if($_SESSION['updata']['Juris'] == 'd') echo 'selected';?>  >D</option>
              </select>
            </p>
            <p>
              <input class="button" type="submit" value="updata" name="userUpdata" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <!-- 内容框左测 -->
    <?php include './view/public/publicContent.php'; ?>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
