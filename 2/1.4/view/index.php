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
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
      <!-- Logo (221px wide) -->
      <a href="http://www.865171.cn"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links">  Hello,
      <?php 
          header("content-type:text/html;charset=utf-8");
          function profileLinks(){
              if(isset($_SESSION) && isset($_SESSION['name']) && isset($_SESSION["login"]))
              {
                  $datas = $_SESSION['name'];
                  echo <<<EOF
                  
                      <a href="#" title="Edit your profile">$datas</a>
                        , you have 
                      <a href="#messages" rel="modal" title="3 Messages">
                        3 Messages
                      </a>
EOF;
              }
          }
          profileLinks();
      ?>
        <br />
        <br />
        <a href="#" title="View the Site">
          View the Site</a> | 
        <a href="index.php?die=1" title="Sign Out">
          Sign Out
        </a> 
      </div>




      <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> <a href="index.php?publish=1" class="nav-top-item no-submenu">
          <!-- Add the class "no-submenu" to menu items with no sub menu -->
          添加新文章 </a> </li>
        <li> <a href="#" class="nav-top-item current">
          <!-- Add the class "current" to current menu item -->
          文章管理 </a>
          <ul>
            <li><a href="#">Write a new Article</a></li>
            <li><a class="current" href="#">Manage Articles</a></li>
            <!-- Add class "current" to sub menu items also -->
            <li><a href="#">Manage Comments</a></li>
            <li><a href="#">Manage Categories</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> Pages </a>
          <ul>
            <li><a href="#">Create a new Page</a></li>
            <li><a href="#">Manage Pages</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> Image Gallery </a>
          <ul>
            <li><a href="#">Upload Images</a></li>
            <li><a href="#">Manage Galleries</a></li>
            <li><a href="#">Manage Albums</a></li>
            <li><a href="#">Gallery Settings</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> Events Calendar </a>
          <ul>
            <li><a href="#">Calendar Overview</a></li>
            <li><a href="#">Add a new Event</a></li>
            <li><a href="#">Calendar Settings</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> Settings </a>
          <ul>
            <li><a href="#">General</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Your Profile</a></li>
            <li><a href="#">Users and Permissions</a></li>
          </ul>
        </li>
      </ul>
      <!-- End #main-nav -->
      <div id="messages" style="display: none">
        <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
        <h3>3 Messages</h3>
        <p> <strong>17th May 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>2nd May 2009</strong> by Jane Doe<br />
          Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>25th April 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <form action="#" method="post">
          <h4>New Message</h4>
          <fieldset>
          <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
          </fieldset>
          <fieldset>
          <select name="dropdown" class="small-input">
            <option value="option1">Send to...</option>
            <option value="option2">Everyone</option>
            <option value="option3">Admin</option>
            <option value="option4">Jane Doe</option>
          </select>
          <input class="button" type="submit" value="Send" />
          </fieldset>
        </form>
      </div>
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
    <!-- Page Head -->
    <h2>Welcome www.865171.cn</h2>
    <p id="page-intro">What would you like to do?</p>
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
        Write an Article </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
      <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="resources/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>Content box</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <!-- 文章管理 -->
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div> This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross. </div>
          </div>
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox" />
                </th>
                <th>标题</th>
                <th>作者</th>
                <th>上传时间</th>
                <th>文章内容</th>
                <th>操作</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
                    <select name="dropdown">
                      <option value="option1">Choose an action...</option>
                      <option value="option2">Edit</option>
                      <option value="option3">Delete</option>
                    </select>
                    <a class="button" href="#">Apply to selected</a> </div>
                  <div class="pagination"> 
                    <a href="index.php?first&pages" title="First Page" style="<?php if($_SESSION['startIndex'] == '0'){echo "display: none;";}?>">&laquo; First</a>
                    <a href="index.php?previous=1&pages" title="Previous Page" style="<?php if($_SESSION['index'] == '0'){echo "display: none;";}?>">&laquo; Previous</a> 
                    <!-- 分页 -->
                    <?php 
                        $sql = new Sqls();
                        $sql->Link("news");
                        $content = $sql->SelData();
                        /* $_SESSION["Number"]为没页的数据数量*/
                        $_SESSION["Number"] = 5;
                        /*$_SESSION['maxpage']为最大分页的*/
                        $_SESSION['maxpage'] = ceil(count($content) /  $_SESSION["Number"]);
                        for($i=$_SESSION['startIndex'],$s=0;$s<$_SESSION['agebtn'];$i++,$s++){
                            $index = $i + 1;
                    ?>
                      <a href="index.php?pages=<?php echo$i;?>" class="number <?php if($i == $_SESSION['index']){echo "current";}?>" title="<?php echo$index;?>"><?php echo$index;?></a>
                    <?php } ?>
                    <!-- <a href="#" class="number" title="1">1</a> 
                    <a href="#" class="number" title="2">2</a> 
                    <a href="#" class="number current" title="3">3</a> 
                    <a href="#" class="number" title="4">4</a> --> 
                    <a href="index.php?next=1&pages" title="Next Page" style="<?php if(($_SESSION['index'] + 1) >= $_SESSION['maxpage']){echo "display: none;";}?>">Next &raquo;</a>
                    <a href="index.php?last&pages" title="Last Page"   style="<?php if(($_SESSION['index'] + 1) >=$_SESSION['maxpage'] ){echo "display: none;";}?>">Last &raquo;</a> 
                  </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <?php 
                  $sql = new Sqls();
                  $sql->Link("news");
                  $content = $sql->pagingData($_SESSION["index"] * $_SESSION["Number"],$_SESSION["Number"]);
                  foreach ($content as $vals) {
                    $id = $vals["id"];
                    $title = $vals["title"];
                    $author = $vals["author"];
                    $create_time = date("Y年m月d日H时i分s秒",$vals["create_time"]);
                    $content = $vals["content"]; 
              ?>
                    <tr>
                      <td>
                        <input type="checkbox" />
                      </td>
                      <td><?php echo $title;?></td>
                      <td><a href="#" title="title"><?php echo $author;?></a></td>
                      <td><?php echo $create_time;?></td>
                      <td><?php echo $content;?></td>
                      <td>
                        <a href='index.php?set=1&id=<?php echo $id;?>' title="Delete">
                          <img src="resources/images/icons/pencil.png" alt="Edit" />
                        </a> 
                        <a href="index.php?del=1&id=<?php echo $id;?>" title="Delete">
                          <img src="resources/images/icons/cross.png" alt="Delete" />
                        </a> <a href="#" title="Edit Meta">
                          <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" />
                        </a> </td>
                    </tr>
                  <?php }?>
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <!-- 内容框左测 -->
    <div class="content-box column-left">
      <div class="content-box-header">
        <h3>Content box left</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>Maecenas dignissim</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-right closed-box">
      <div class="content-box-header">
        <!-- Add the class "closed" to the Content box header to have it closed by default -->
        <h3>Content box right</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>This box is closed by default</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="clear"></div>
    <!-- Start Notifications -->
    <div class="notification attention png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <div class="notification information png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <div class="notification success png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <div class="notification error png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <!-- End Notifications -->
    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 Your Company | Powered by <a href="http://www.865171.cn">admin templates</a> | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
