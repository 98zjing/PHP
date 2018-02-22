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
<script type='text/javascript' >
  $(function(){
      $('#main-nav>li').hover(function(){
        $(this).children('a').attr('class','nav-top-item current');
      },function(){
        $(this).children('a').attr('class','nav-top-item');
      });
  })
</script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <?php include './view/public/sidebar.php' ?>
  <!-- End #sidebar -->
  <div id="main-content">
    <?php include './view/public/publicTopTitle.php'; ?>
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
                        $sql = new Classs\Sqls();
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
                  $sql = new Classs\Sqls();
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
                        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']['Juris'] != 'd'){ ?>
                        <a href='index.php?set=1&id=<?php echo $id;?>' title="Delete">
                          <img src="resources/images/icons/pencil.png" alt="Edit" />
                        </a> 
                        <?php } ?>
                        <?php if(isset($_SESSION['admin']) && ($_SESSION['admin']['Juris'] == 'a' || $_SESSION['admin']['Juris'] == 'b')){ ?>
                        <a href="index.php?del=1&id=<?php echo $id;?>" title="Delete">
                          <img src="resources/images/icons/cross.png" alt="Delete" />
                        </a> 
                        <?php } ?>
                        <a href="#" title="Edit Meta">
                          <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" />
                        </a> 
                      </td>
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
    <?php include './view/public/publicContent.php'; ?>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
