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
    </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']['Juris'] == 'a' || isset($_SESSION['admin']) && $_SESSION['admin']['Juris'] == 'b'){ ?>
        <li> 
          <a href="index.php?publish=1" class="nav-top-item no-submenu">
              <!-- Add the class "no-submenu" to menu items with no sub menu -->
              添加新文章 
          </a> 
        </li>
        <?php } ?>
        <li> 
          <a href="#" class="nav-top-item ">
            <!-- Add the class "current" to current menu item -->
            文章管理 
          </a>
          <ul>
            <li><a href="#">Write a new Article</a></li>
            <li><a class="current" href="index.php?index=1">文章列表</a></li>
            <!-- Add class "current" to sub menu items also -->
            <li><a href="#">Manage Comments</a></li>
            <li><a href="#">Manage Categories</a></li>
          </ul>
        </li>
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']['Juris'] == 'a'){ ?>
        <li ><a href="index.php?user" class="nav-top-item current"> 管理员 </a>
          <ul>
            <li ><a href="index.php?user" class="current">管理员列表</a></li>
            <li ><a href="#" >管理员编辑</a></li>
          </ul>
        </li>
        <?php } ?>
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
        <formsidebar action="#" method="post">
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