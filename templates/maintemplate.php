<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title><?= $title ?></title>

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->

  <!--external css-->
  <link href="/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
  <link rel="stylesheet" type="text/css" href="/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="/lib/gritter/css/jquery.gritter.css" /> 
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/style-responsive.css" rel="stylesheet">
  <link href="/css/style_lk.css" rel="stylesheet" />
  
  <script src="/lib/chart-master/Chart.js"></script>
</head>
<body>
  <section id="container">
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="/lk" class="logo"><b>В<span>Брокер</span></b></a>
      <!--logo end-->
      
        <!--  notification start -->
 
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <?if($_SESSION['id']):?>
          <li><a class="logout" href="/exit">Выйти</a></li>
          <?endif;?> 
        </ul>
      </div>
    </header>
    <!--header end-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?=($_SESSION['name'])?></h5>
          <li class="mt">
            <a class="sub-menu" href="/trading">
              <i class="fa fa-bar-chart-o"></i>
              <span>Торговый терминал</span></span>
              </a>
          </li>           
          <li class="mb">
            <a class="sub-menu" href="/info">
              <i class="fa fa-dashboard"></i>
              <span>Портфель</span>
              </a>
          </li>
          <li class="mb">    
            <a class="sub-menu" href="/history">
              <i class="fa fa-book"></i>
              <span>История сделок</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-comments-o"></i>
              <span>Идеи</span>
              </a>
            <ul class="sub">
              <li><a href="/idea-list">Просмотреть</a></li>
              <li><a href="/addIdea">Предложить</a></li>
             </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <section id="main-content">
    <!--Main Content-->
    <?= $content ?>
    </section>
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>DimKa</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <a href="/"></a>
        </div>
        <a href="/" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="/lib/jquery.sparkline.js"></script>
  <script src="/lib/jquery.scrollTo.min.js"></script>
  <script src="/lib/jquery.nicescroll.js" type="text/javascript"></script>  

  <!--common script for all pages-->
  <script src="/lib/common-scripts.js"></script>
  <script type="text/javascript" src="/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="/lib/gritter-conf.js"></script>

  <script src="/lib/zabuto_calendar.js"></script>
  <script src="/view/js/scripts.js"></script>


</body>

</html>