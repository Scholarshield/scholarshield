<?php
require 'details.php';
if(loggedin()===false):
 {die(header('Location:scholarshield.php'));}
endif;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stilearn Admin Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="stilearning">

        <meta http-equiv="x-pjax-version" content="v173">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/favico-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/favico-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/favico-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/favico-57-precomposed.png">
        <link rel="shortcut icon" href="ico/favico.png">
        <link rel="shortcut icon" href="ico/favico.ico">

        <!-- build:css styles/vendor.css -->
        <!-- bower:css -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="bower_components/animate.css/animate.css">
        <link rel="stylesheet" href="bower_components/Hover/css/hover.css">
        <!-- endbower -->
        <!-- endbuild -->
        
        <!-- build:css(.tmp) styles/main.css -->
        <link id="style-components" href="styles/loaders.css" rel="stylesheet">
        <link id="style-components" href="styles/bootstrap-theme.css" rel="stylesheet">
        <link id="style-components" href="styles/dependencies.css" rel="stylesheet">
        <link id="style-base" href="styles/stilearn.css" rel="stylesheet">
        <link id="style-responsive" href="styles/stilearn-responsive.css" rel="stylesheet">
        <link id="style-helper" href="styles/helper.css" rel="stylesheet">
        <link id="style-sample" href="styles/pages-style.css" rel="stylesheet">
        <!-- endbuild -->
        
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <![endif]-->
    </head>

    <body class="animated fadeIn">
        <!-- section header -->
        <header class="header">
            <!-- header brand -->
            <div class="header-brand">
                <h2><a href="index.php"><span class="text-primary">Scholar</span>Shield</a></h2>
            </div><!-- header brand -->

            <!-- header-profile -->
            <div class="header-profile">
                <div class="profile-nav">
                    <span class="profile-username">Option</span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu animated flipInX pull-right" role="menu">
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Inbox</a></li>
                        <li><a href="#"><i class="fa fa-tasks"></i> Tasks</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    </ul>
                </div>
                <div class="profile-picture">
                    <img alt="me" src="images/dummy/profile.jpg">
                </div>
            </div><!-- header-profile -->

            <form role="form" class="form-inline">
                <button type="button" class="btn btn-default btn-expand-search"><i class="fa fa-search"></i></button>
                <div class="toggle-search">
                    <input type="text" class="form-control" placeholder="Search something" />    
                    <button type="button" class="btn btn-default btn-collapse-search"><i class="fa fa-times"></i></button>
                </div>
            </form><!--/form-search-->

            <!-- header menu -->
            <ul class="hidden-xs header-menu pull-right">
                <li>
                    <a href="#" title="View site">
                        <i class="header-menu-icon icon-only fa fa-rocket"></i>
                    </a>
                </li><!-- /header-menu-item -->
                <li>
                    <a href="#" title="Notifications" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <span class="badge badge-success">4</span>
                        <i class="header-menu-icon icon-only fa fa-warning"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-extend animated fadeInDown pull-right" role="menu">
                        <li class="dropdown-header">Notofications</li><!-- /dropdown-header -->
                        <li class="notif-minimal" data-toggle="niceScroll" data-scroll-cursorcolor="#ecf0f1">
                            <a class="notif-item" href="#">
                                <div class="notif-ico bg-primary">
                                    <i class="fa fa-heart-o"></i>
                                </div>
                                <p class="notif-text"><span class="text-bold">Evelyn</span> favorite your Post</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-ico bg-warning">
                                    <i class="fa fa-user"></i>
                                </div>
                                <p class="notif-text"><span class="text-bold">Evans</span> register as a Member</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-ico bg-success">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <p class="notif-text"><span class="text-bold">Katherine</span> purchase an Item</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-ico bg-danger">
                                    <i class="fa fa-comment-o"></i>
                                </div>
                                <p class="notif-text"><span class="text-bold">Gomez</span> Comment on your Post</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-ico bg-info">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <p class="notif-text"><span class="text-bold">Willie</span> is now following you</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-ico bg-success">
                                    <i class="fa fa-cloud-upload"></i>
                                </div>
                                <p class="notif-text"><span class="text-bold">Nguyen</span> upload new Portofolio</p>
                            </a><!-- /notif-item -->
                        </li><!-- /dropdown-alert -->
                        <li class="dropdown-footer bg-cloud">
                            <a class="view-all" tabindex="-1" href="#">
                                <i class="fa fa-angle-right pull-right"></i> See all notifications
                            </a>
                        </li><!-- /dropdown-footer -->
                    </ul><!-- /dropdown-extend -->
                </li><!-- /header-menu-item -->
                <li>
                    <a href="#" title="Inboxs" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <span class="badge badge-warning animated animated-repeat flash">3</span>
                        <i class="header-menu-icon icon-only fa fa-envelope-o"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-extend animated fadeInDown pull-right" role="menu">
                        <li class="dropdown-header">You have 3 new messages</li><!-- /dropdown-header -->
                        <li class="notif-media" data-toggle="niceScroll" data-scroll-cursorcolor="#ecf0f1">
                            <a class="notif-item" href="#">
                                <div class="notif-img pull-left">
                                    <img src="images/dummy/uifaces21.jpg" alt="" class="img-circle" />
                                </div>
                                <h3 class="notif-heading">Account Team <small>58 min</small></h3>
                                <p class="notif-text">Spread the Word & Earn!</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-img pull-left">
                                    <img src="images/dummy/uifaces5.jpg" alt="" class="img-circle" />
                                </div>
                                <h3 class="notif-heading">Timothy Lucas, Me (2) <small>Wed</small></h3>
                                <p class="notif-text">Elit odio, sed leo ligula semper, vehicula maecenas, eros fusce</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-img pull-left">
                                    <img src="images/dummy/uifaces4.jpg" alt="" class="img-circle" />
                                </div>
                                <h3 class="notif-heading">Raymond Rios <small>Tue</small></h3>
                                <p class="notif-text">Risus suscipit urna, tristique molestie vestibulum nunc tempor ultricies</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-img pull-left">
                                    <img src="images/dummy/uifaces6.jpg" alt="" class="img-circle" />
                                </div>
                                <h3 class="notif-heading">Stilearning <small>Tue</small></h3>
                                <p class="notif-text">Thanks for ordering Stilearn Admin (order #WD12345678)</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-img pull-left">
                                    <img src="images/dummy/uifaces9.jpg" alt="" class="img-circle" />
                                </div>
                                <h3 class="notif-heading">andrea.olson@mail.com <small>Mon</small></h3>
                                <p class="notif-text">Lectus curabitur mauris arcu donec morbi diam</p>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-img pull-left">
                                    <img src="images/dummy/uifaces8.jpg" alt="" class="img-circle" />
                                </div>
                                <h3 class="notif-heading">Nicole Miller <small>Mon</small></h3>
                                <p class="notif-text">Approval for new design!</p>
                            </a><!-- /notif-item -->
                        </li><!-- /dropdown-alert -->
                        <li class="dropdown-footer bg-cloud">
                            <a class="view-all" tabindex="-1" href="#">
                                <i class="fa fa-angle-right pull-right"></i> See all messages
                            </a>
                        </li><!-- /dropdown-footer -->
                    </ul><!-- /dropdown-extend -->
                </li><!-- /header-menu-item -->
                <li>
                    <a href="#" title="Tasks" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <span class="badge badge-danger">7</span>
                        <i class="header-menu-icon icon-only fa fa-tasks"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-extend animated fadeInDown pull-right" role="menu">
                        <li class="dropdown-header">Tasks progress</li><!-- /dropdown-header -->
                        <li class="notif-progress" data-toggle="niceScroll" data-scroll-cursorcolor="#ecf0f1">
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">60%</div>
                                <div class="notif-text">Uploading...</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">33%</div>
                                <div class="notif-text">Upgrade Theme</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
                                        <span class="sr-only">33% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">87%</div>
                                <div class="notif-text">Webapp Development</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;">
                                        <span class="sr-only">87% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">54%</div>
                                <div class="notif-text">Backup Data</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;">
                                        <span class="sr-only">54% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">92%</div>
                                <div class="notif-text">Bandwidth Limit</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%;">
                                        <span class="sr-only">92% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">26%</div>
                                <div class="notif-text">Clean System</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100" style="width: 26%;">
                                        <span class="sr-only">26% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">100%</div>
                                <div class="notif-text">Done</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="sr-only">100% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">100%</div>
                                <div class="notif-text">Done</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="sr-only">100% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">100%</div>
                                <div class="notif-text">Done with warning</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="sr-only">100% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                            <a class="notif-item" href="#">
                                <div class="notif-text pull-right">12%</div>
                                <div class="notif-text">Error</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;">
                                        <span class="sr-only">12% Complete</span>
                                    </div>
                                </div>
                            </a><!-- /notif-item -->
                        </li><!-- /dropdown-alert -->
                        <li class="dropdown-footer bg-cloud">
                            <a class="view-all" tabindex="-1" href="#">
                                <i class="fa fa-angle-right pull-right"></i> See all Tasks
                            </a>
                        </li><!-- /dropdown-footer -->
                    </ul><!-- /dropdown-extend -->
                </li><!-- /header-menu-item -->
            </ul><!--/header-menu pull-right-->
        </header><!--/header-->

        
        <!-- content section -->
        <section class="section">
            <!-- DONT FORGET REPLACE IT FOR PRODUCTION! -->
            <aside class="side-left">
                <ul class="sidebar">
                    <li>
                        <a href="index.php">
                            <i class="sidebar-icon fa fa-home"></i>
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="notification.php">
                            <i class="fa fa-envelope fa-2x"></i><br>
                            <span class="sidebar-text">MESSENGER</span>
                        </a>
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="table-basic.php">
                            <i class="sidebar-icon fa fa-table"></i>
                            <span class="sidebar-text">Tables</span>
                        </a>
                        <ul class="sidebar-child animated flipInY">
                            <li>
                                <a href="table-basic.php">
                                    <span class="sidebar-text">Basic Table</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="routetable.php">
                                    <span class="sidebar-text">Route table</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="table-sorter.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Table Sorter</span>
                                </a>
                            </li><!--/child-item-->
                        </ul><!--/sidebar-child-->
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="#">
                            <i class="sidebar-icon fa fa-magnet"></i>
                            <span class="sidebar-text">Interface</span>
                        </a>
                        <ul class="sidebar-child animated flipInY">
                            <li>
                                <a href="grid-system.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Grid System</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="typography.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Typography</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="buttons.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Buttons</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="icons.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Icons</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="modals.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Modals</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="tooltips-popovers.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Tooltips & Popovers</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="alerts-callouts.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Alerts & Callouts</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="progress-bars.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Progress Bars</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="labels-badge.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Labels & Badge</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="navs-navbar.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Navs & Navbar</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="animated.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Animated</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="loaders.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Loaders</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="helper-classes.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Helper</span>
                                </a>
                            </li><!--/child-item-->
                        </ul><!--/sidebar-child-->
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="#">
                            <div class="badge badge-primary animated animated-repeat wobble">3</div>
                            <i class="sidebar-icon fa fa-edit"></i>
                            <span class="sidebar-text">Form</span>
                        </a>
                        <ul class="sidebar-child animated flipInY">
                            <li>
                                <a href="form-basic.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Basic Form</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="form-elements.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Form Elements</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="form-validator.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Validator</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="form-wizard.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Wizard</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="form-uploader.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Uploader</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="form-editors.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Editor</span>
                                </a>
                            </li><!--/child-item-->
                        </ul><!--/sidebar-child-->
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="#">
                            <i class="sidebar-icon fa fa-bars"></i>
                            <span class="sidebar-text">Widgets</span>
                        </a>
                        <ul class="sidebar-child animated flipInY">
                            <li>
                                <a href="widget-panel.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Panels</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="widget-tabs.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Tabs</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="widget-collapse.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Collapse</span>
                                </a>
                            </li><!--/child-item-->
                        </ul><!--/sidebar-child-->
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="#">
                            <i class="sidebar-icon fa fa-files-o"></i>
                            <span class="sidebar-text">Pages</span>
                        </a>
                        <ul class="sidebar-child animated flipInY">
                            <li>
                                <a href="page-blank.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Blank Page</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="page-signin.php">
                                    <span class="sidebar-text">Signin</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="page-404.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Error 404</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="page-500.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Error 500</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="page-landing.php">
                                    <span class="sidebar-text">Landing Page</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="page-gallery.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Gallery</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="page-pricing.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Pricing</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="page-invoice.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Invoice</span>
                                </a>
                            </li><!--/child-item-->
                        </ul><!--/sidebar-child-->
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="#" data-pjax=".content-body">
                            <i class="sidebar-icon fa fa-bar-chart-o"></i>
                            <span class="sidebar-text">Charts</span>
                        </a>
                        <ul class="sidebar-child animated flipInY">
                            <li>
                                <a href="chart-flot.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Flot Charts</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="chart-morris.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Morris Charts</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="chart-inline.php" data-pjax=".content-body">
                                    <span class="sidebar-text">Inline Charts</span>
                                </a>
                            </li><!--/child-item-->
                        </ul><!--/sidebar-child-->
                    </li><!--/sidebar-item-->
                    <li>
                        <a href="#">
                            <div class="badge badge-primary animated animated-repeat wobble">5</div>
                            <i class="sidebar-icon fa fa-th-large"></i>
                            <span class="sidebar-text">More</span>
                        </a>
                        <ul class="sidebar-child-inline animated flipInX">
                            <li>
                                <a href="calendar.php" data-pjax=".content-body">
                                    <i class="sidebar-icon fa fa-calendar-o"></i>
                                    <span class="sidebar-text">Calendar</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="maps.php" data-pjax=".content-body">
                                    <i class="sidebar-icon fa fa-map-marker"></i>
                                    <span class="sidebar-text">Maps</span>
                                </a>
                            </li><!--/child-item-->
                            <li>
                                <a href="masonry.php" data-pjax=".content-body">
                                    <i class="sidebar-icon fa fa-magic"></i>
                                    <span class="sidebar-text">Masonry</span>
                                </a>
                            </li><!--/child-item-->
                            <li class="divider"></li>
                            <li>
                                <a href="pjax.php" data-pjax=".content-body">
                                    <i class="sidebar-icon fa fa-play"></i>
                                    <span class="sidebar-text">PJAX</span>
                                </a>
                            </li><!--/child-item-->
                        </ul><!--/sidebar-child-->
                    </li><!--/sidebar-item-->
                </ul><!--/sidebar-->
            </aside><!--/side-left-->

            <div class="content">
                <div class="content-body">
                    <!-- APP CONTENT
                    ================================================== -->
                    <?php
                        if(isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true'){
                            include($content);
                        }
                        else{
                            include('index.php');
                        }
                    ?>
                </div><!--/content-body -->
            </div><!--/content -->

        </section><!--/content section -->
        <!-- section footer -->
        <a rel="to-top" href="#top"><i class="fa fa-arrow-up"></i></a>
        <footer>
            <p>&copy; 2014 Stilearning</p>
        </footer>



        <!-- javascript
        ================================================== -->
        <!-- List of dependencies file, please check on readme.txt! (Purchase only) -->

        <!-- build:js scripts/vendor-main.js -->
        <!-- bower:js -->
        <script src="bower_components/jquery/jquery.js"></script>
        <script src="bower_components/jqueryui/ui/jquery-ui.js"></script>
        <script src="bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <!-- endbuild -->
        
        <!-- build:js scripts/vendor-usefull.js -->
        <script src="bower_components/pace/pace.min.js"></script>
        <script src="bower_components/jquery-pjax/jquery.pjax.js"></script>
        <script src="bower_components/masonry/masonry.pkgd.min.js"></script>
        <script src="bower_components/screenfull/dist/screenfull.min.js"></script>
        <script src="bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <script src="bower_components/countUp.js/countUp.min.js"></script>
        <script src="bower_components/skycons/skycons.js"></script>
        <script src="bower_components/jquery.lazyload/jquery.lazyload.min.js"></script>
        <script src="bower_components/WOW/dist/wow.min.js"></script>
        <!-- endbuild -->

        <!-- build:js scripts/vendor-form.js -->
        <script src="bower_components/jquery.validation/jquery.validate.js"></script>
        <script src="bower_components/jquery.validation/additional-methods.js"></script>
        <script src="bower_components/autogrow-textarea/jquery.autogrowtextarea.min.js"></script>
        <script src="bower_components/typeahead.js/dist/typeahead.min.js"></script>
        <script src="bower_components/jQuery-Mask-Plugin/jquery.mask.min.js"></script>
        <script src="bower_components/jquery.tagsinput/jquery.tagsinput.min.js"></script>
        <script src="bower_components/multiselect/js/jquery.multi-select.js"></script>
        <script src="bower_components/select2/select2.js"></script>
        <script src="bower_components/jquery-selectboxit/src/javascripts/jquery.selectBoxIt.js"></script>
        <script src="bower_components/momentjs/moment.js"></script>
        <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script src="bower_components/jquery-minicolors/jquery.minicolors.min.js"></script>
        <script src="bower_components/dropzone/downloads/dropzone.min.js"></script>
        <script src="bower_components/jquery-steps/build/jquery.steps.min.js"></script>
        <script src="bower_components/fullcalendar/fullcalendar.js"></script>
        <!-- endbuild -->

        <!-- build:js scripts/vendor-editor.js -->
        <script src="bower_components/wysihtml5/dist/wysihtml5-0.3.0.js"></script>
        <script src="bower_components/bootstrap-wysihtml5/dist/bootstrap-wysihtml5-0.0.2.js"></script>
        <script src="bower_components/bootstrap-markdown/js/markdown.js"></script>
        <script src="bower_components/bootstrap-markdown/js/to-markdown.js"></script>
        <script src="bower_components/bootstrap-markdown/js/bootstrap-markdown.js"></script>
        <!-- endbuild -->


        <!-- build:js scripts/excanvas.js -->
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="bower_components/flot/excanvas.min.js"></script><![endif]-->
        <!-- endbuild -->

        <!-- build:js scripts/vendor-graph.js -->
        <script src="bower_components/raphael/raphael-min.js"></script>
        <script src="bower_components/morris.js/morris.min.js"></script>
        <script src="bower_components/flot/jquery.flot.js"></script>
        <script src="bower_components/flot/jquery.flot.resize.js"></script>
        <script src="bower_components/flot/jquery.flot.categories.js"></script>
        <script src="bower_components/flot/jquery.flot.time.js"></script>
        <script src="bower_components/flot-axislabels/jquery.flot.axislabels.js"></script>
        <script src="bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
        <script src="bower_components/sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- endbuild -->

        <!-- build:js scripts/vendor-table.js -->
        <script src="bower_components/datatables/media/js/jquery.dataTables.js"></script>
        <script src="bower_components/datatables-tools/js/dataTables.tableTools.js"></script>
        <script src="bower_components/datatables-bootstrap3/BS3/assets/js/datatables.js"></script>
        <script src="bower_components/jquery.tablesorter/js/jquery.tablesorter.js"></script>
        <script src="bower_components/jquery.tablesorter/js/jquery.tablesorter.widgets.js"></script>
        <script src="bower_components/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
        <!-- endbuild -->

        <!-- build:js scripts/vendor-maps.js -->
        <script src="bower_components/jqvmap/jqvmap/jquery.vmap.min.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/jquery.vmap.algeria.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/jquery.vmap.france.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/jquery.vmap.germany.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/jquery.vmap.russia.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
        <script src="bower_components/jqvmap/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
        <script src="bower_components/jqvmap/jqvmap/data/jquery.vmap.sampledata.js"></script>
        <!-- endbuild -->

        <!-- build:js scripts/vendor-util.js -->
        <script src="bower_components/holderjs/holder.js"></script>
        <!-- endbower -->
        <!-- endbuild -->


        <!-- required stilearn template js -->
        <!-- build:js scripts/main.js -->
        <script src="scripts/bootstrap-jasny/js/fileinput.js"></script>
        <script src="scripts/js-prototype.js"></script>
        <script src="scripts/slip.js"></script>
        <script src="scripts/hogan-2.0.0.js"></script>
        <script src="scripts/theme-setup.js"></script>
        <script src="scripts/chat-setup.js"></script>
        <script src="scripts/panel-setup.js"></script>
        <!-- endbuild -->

        <!-- This scripts will be reload after pjax or if popstate event is active (use with class .re-execute) -->
        <!-- build:js scripts/initializer.js -->
        <script class="re-execute" src="scripts/google-code-prettify/run_prettify.js"></script>
        <script class="re-execute" src="scripts/bootstrap-setup.js"></script>
        <script class="re-execute" src="scripts/jqueryui-setup.js"></script>
        <script class="re-execute" src="scripts/dependencies-setup.js"></script>
        <script class="re-execute" src="scripts/demo-setup.js"></script>
        <!-- endbuild -->

<script type="text/javascript">

  $(document).ready(function()
  {
    $('[data-toggle="tooltip"]').tooltip();

    $(".edit").click(function()
    {
      var edfld = this.className.split(" ")[3];
      if($(this).text()=="Edit")
      {
        var name =  $(".shwname."+edfld).text();
        var classnm =  $(".shwcl."+edfld).text();
        var secname =  $(".shwsec."+edfld).text();
        var stopid  = $(".shwstp."+edfld).text();
        var parname =$(".shwprname."+edfld).text();
        var parnumb =$(".shwphn."+edfld).text();
        $("."+edfld).show();
        $(".cdname."+edfld).val(name);
        $(".clname."+edfld).val(classnm);
        $(".scname."+edfld).val(secname);
        $(".stpname."+edfld).val(stopid);
        $(".prname."+edfld).val(parname);
        $(".prnumb."+edfld).val(parnumb);
        $(".shwname."+edfld).hide();
        $(".shwcl."+edfld).hide();
        $(".shwsec."+edfld).hide();
        $(".shwstp."+edfld).hide();
        $(".shwprname."+edfld).hide();
        $(".shwphn."+edfld).hide();
        $(this).text('Save');
        $(".delete."+edfld).text('Cancel').css('background-color','#B0B0B0').css('border-color','#B0B0B0');
      }
      else if($(this).text()=="Save")
      {
        var cdname = $(".cdname."+edfld).val();
        var clname = $(".clname."+edfld).val();
        var scname = $(".scname."+edfld).val();
        var stpname = $(".stpname."+edfld).val();
        var prname = $(".prname."+edfld).val();
        var prnumb = $(".prnumb."+edfld).val();
        if($.trim(cdname).length >=1 && $.trim(clname).length >=1 && $.trim(scname).length >=1 && $.trim(stpname).length >=1 && $.trim(prname).length >=1 && $.trim(prnumb).length >=1)
        {
          event.preventDefault();
          var xmlhttp;
      if(window.XMLHttpRequest)
       {
        xmlhttp=new XMLHttpRequest();//for mordern browsers
       }
      else
       {
        xmlhttp =new ActiveXObject ('Microsoft.XMLHTTP');//for old browsers
       }
      xmlhttp.onreadystatechange = function()//checking for a state change
      {
       if(xmlhttp.readyState==4 && xmlhttp.status == 200)//weather file is empty or not
        {
          $(".emptywarn").hide();
          $(".scalrt").show(300);
          $(".chldname."+edfld).hide();
          $(".clsname."+edfld).hide();
          $(".secname."+edfld).hide();
          $(".stopname."+edfld).hide();
          $(".parentname."+edfld).hide();
          $(".parnumb."+edfld).hide();
          if(xmlhttp.responseText==='true')
          {
          $(".shwname."+edfld).text(cdname);
          $(".shwcl."+edfld).text(clname);
          $(".shwsec."+edfld).text(scname);
          $(".shwstp."+edfld).text(stpname);
          $(".shwprname."+edfld).text(prname);
          $(".shwphn."+edfld).text(prnumb);
          $(".shwname."+edfld).show();
          $(".shwcl."+edfld).show();
          $(".shwsec."+edfld).show();
          $(".shwstp."+edfld).show();
          $(".shwprname."+edfld).show();
          $(".shwphn."+edfld).show();
          $(".edit."+edfld).text('Edit');
           $(".delete."+edfld).text('Delete').css('background-color','#cc3300');
          }
        }
      };
      xmlhttp.open('POST','details.php',true);
      xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      xmlhttp.send('chid='+edfld+'&chname='+cdname+'&chcls='+clname+'&chsec='+scname+'&chstp='+stpname+'&chpar='+prname+'&chnumb='+prnumb);
        }
        else
        {
          $(".scalrt").hide();
          $(".emptywarn").show(300);
        }
      }
      else
      {
        window.location.href = 'table-basic.php';
      }
    });

    $(".delete").click(function()
    {
      var dlfld = this.className.split(" ")[3];
      if($(this).text()=="Delete")
      {
        event.preventDefault();
       var xmlhttp;
    if(window.XMLHttpRequest)
     {
       xmlhttp=new XMLHttpRequest();//for mordern browsers
     }
    else
     {
       xmlhttp =new ActiveXObject ('Microsoft.XMLHTTP');//for old browsers
     }
     xmlhttp.onreadystatechange = function()//checking for a state change
     {
       if(xmlhttp.readyState==4 && xmlhttp.status == 200)//weather file is empty or not
        {
          if(xmlhttp.responseText==='delete')
          {
            location.reload();
          }
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('delete='+dlfld);
      }
      else if($(this).text()=="Cancel")
      {
          $(".chldname."+dlfld).hide();
          $(".clsname."+dlfld).hide();
          $(".secname."+dlfld).hide();
          $(".stopname."+dlfld).hide();
          $(".parentname."+dlfld).hide();
          $(".parnumb."+dlfld).hide();
          $(".shwname."+dlfld).show();
          $(".shwcl."+dlfld).show();
          $(".shwsec."+dlfld).show();
          $(".shwstp."+dlfld).show();
          $(".shwprname."+dlfld).show();
          $(".shwphn."+dlfld).show();
          $(".edit."+dlfld).text('Edit');
          $(".delete."+dlfld).text('Delete').css('background-color','#cc3300');
      }
      else
      {
        window.location.href = 'table-basic.php';
      }


    });

    $(".download").click(function(event)
    {
      event.preventDefault();
      var down = this.className.split(" ")[4];
      var xmlhttp;
    if(window.XMLHttpRequest)
     {
       xmlhttp=new XMLHttpRequest();//for mordern browsers
     }
    else
     {
       xmlhttp =new ActiveXObject ('Microsoft.XMLHTTP');//for old browsers
     }
     xmlhttp.onreadystatechange = function()//checking for a state change
     {
       if(xmlhttp.readyState==4 && xmlhttp.status == 200)//weather file is empty or not
        {
         window.open('data:application/vnd.ms-excel,' + xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('download='+down);
    });

  });
</script>

    </body>
</html>
