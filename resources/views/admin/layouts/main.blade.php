<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
        <!-- dropify -->
        <link href="{{asset('libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('css/app.min.css')}}" id="app-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Plugins css -->
        <link href="{{asset('libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
        
                    <!-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg"> -->

                            <!-- item-->
                            <!-- <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll"> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a> -->

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div> -->

                            <!-- All-->
                            <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li> -->

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ request()->get('admin')['image'] ? asset(request()->get('admin')['image']) : asset('images/users/default.png')}}" alt="" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                            {{ request()->get('admin')['name'] }} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('admin-logout') }}" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="https://smartestmedia.com/english/index.php" target="_blank" class="logo logo-dark text-center">
                        <span class="logo-lg">
                            <img style="height: 30px;" src="{{asset('images/SM.png')}}" alt="" height="16">
                        </span>
                        <span class="logo-sm">
                            <img style="height: 30px;" src="{{asset('images/SM-light.png')}}" alt="" height="24">
                        </span>
                    </a>
                    <a href="index.html" class="logo logo-light text-center">
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="16">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                    <li>
                        <button class="button-menu-mobile disable-btn waves-effect">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <h4 class="page-title-main">{{$page_title}}</h4>
                    </li>
        
                </ul>

            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{ request()->get('admin')['image'] ? asset(request()->get('admin')['image']) : asset('images/users/default.png')}}" alt="" title="" class="rounded-circle img-thumbnail avatar-md">
                        <div class="dropdown">
                            <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"  aria-expanded="false">{{ request()->get('admin')['name'] }}</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>
    
                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">
                                    <i class="mdi mdi-cog"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Admins</li>

                            <li>
                                <a href="{{url('/admin/home')}}">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            @foreach(request()->get('admin')['cms_pages_grouped'] as $group)
                                @if (!$group['icon'] && !$group['title'])
                                    @foreach($group['pages'] as $page)
                                        @if (!$page['display_name_plural']) @continue @endif
                                        <li class="position-relative {{ request()->is('admin'  . '/' . $page['route']) || request()->is('admin' . '/' . $page['route'] . '/*') ? 'active' : '' }}">
                                            <a href="{{ url('admin' . '/' . $page['route']) }}" title="{{ $page['display_name_plural'] }}">
                                                <i class="text-center mr-2 fa {{ $page['icon'] }}" aria-hidden="true"></i>
                                                <span> {{ $page['display_name_plural'] }}</span> 
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="position-relative menu-dropdown-wrapper @foreach($group['pages'] as $page){{ request()->is('admin' . '/' . $page['route'] . '*') ? 'active' : '' }}@endforeach">
                                        <a title="{{ $group['title'] }}">
                                            <i class="text-center mr-2 fa {{ $group['icon'] }}" aria-hidden="true"></i>
                                            {{ $group['title'] }}
                                            <i class="fa  fa-caret-down" aria-hidden="true"></i>
                                        </a>
                                        <div class="menu-dropdown pl-5">
                                            @foreach($group['pages'] as $page)
                                                @if (!$page['display_name_plural']) @continue @endif
                                                <a class="px-3 py-1" href="{{ url('admin' . '/' . $page['route']) }}" title="{{ $page['display_name_plural'] }}">{{ $page['display_name_plural'] }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                            @endforeach

                            <!-- <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-page-layout-sidebar-left"></i>
                                    <span> Layouts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                    <li><a href="layouts-sidebar-sm.html">Small Sidebar</a></li>
                                    <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                    <li><a href="layouts-dark-topbar.html">Dark Topbar</a></li>
                                    <li><a href="layouts-preloader.html">Preloader</a></li>
                                    <li><a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a></li>
                                    <li><a href="layouts-boxed.html">Boxed</a></li>
                                </ul>
                            </li> -->

                            <!-- <li class="menu-title">Apps</li>

                            <li>
                                <a href="apps-chat.html">
                                    <i class="mdi mdi-forum"></i>
                                    <span class="badge badge-purple float-right">New</span>
                                    <span> Chat </span>
                                </a>
                            </li>

                            <li>
                                <a href="calendar.html">
                                    <i class="mdi mdi-calendar"></i>
                                    <span> Calendar </span>
                                </a>
                            </li>

                            <li>
                                <a href="inbox.html">
                                    <i class="mdi mdi-email"></i>
                                    <span> Mail </span>
                                </a>
                            </li> -->

                            <!-- <li class="menu-title">Components</li>

                            <li>
                                <a href="ui-typography.html">
                                    <i class="mdi mdi-format-font"></i>
                                    <span> Typography </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-invert-colors"></i>
                                    <span> User Interface </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-cards.html">Cards</a></li>
                                    <li><a href="ui-draggable-cards.html">Draggable Cards</a></li>
                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="ui-material-icons.html">Material Design</a></li>
                                    <li><a href="ui-font-awesome-icons.html">Font Awesome 5</a></li>
                                    <li><a href="ui-dripicons.html">Dripicons</a></li>
                                    <li><a href="ui-feather-icons.html">Feather Icons</a></li>
                                    <li><a href="ui-themify-icons.html">Themify Icons</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-notification.html">Notification</a></li>
                                    <li><a href="ui-range-slider.html">Range Slider</a></li>
                                    <li><a href="ui-components.html">Components</a>
                                    <li><a href="ui-sweetalert.html">Sweet Alert</a>
                                    <li><a href="ui-treeview.html">Tree view</a>
                                    <li><a href="ui-widgets.html">Widgets</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-texture"></i>
                                    <span class="badge badge-warning float-right">7</span>
                                    <span> Forms </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="form-elements.html">General Elements</a></li>
                                    <li><a href="form-advanced.html">Advanced Form</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-fileupload.html">Form Uploads</a></li>
                                    <li><a href="form-quilljs.html">Quilljs Editor</a></li>
                                    <li><a href="form-xeditable.html">X-editable</a></li>
                                </ul>
                            </li>
                
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-view-list"></i>
                                    <span> Tables </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="tables-basic.html">Basic Tables</a></li>
                                    <li><a href="tables-datatable.html">Data Tables</a></li>
                                    <li><a href="tables-responsive.html">Responsive Table</a></li>
                                    <li><a href="tables-editable.html">Editable Table</a></li>
                                    <li><a href="tables-tablesaw.html">Tablesaw Table</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-chart-donut-variant"></i>
                                    <span> Charts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="charts-flot.html">Flot Charts</a></li>
                                    <li><a href="charts-morris.html">Morris Charts</a></li>
                                    <li><a href="charts-chartist.html">Chartist Charts</a></li>
                                    <li><a href="charts-chartjs.html">Chartjs Charts</a></li>
                                    <li><a href="charts-other.html">Other Charts</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-file-multiple"></i>
                                    <span> Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-login.html">Login</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="pages-confirm-mail.html">Confirm Mail</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-layers"></i>
                                    <span> Extra Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="extras-projects.html">Projects</a></li>
                                    <li><a href="extras-tour.html">Tour</a></li>
                                    <li><a href="extras-taskboard.html">Taskboard</a></li>
                                    <li><a href="extras-taskdetail.html">Task Detail</a></li>
                                    <li><a href="extras-profile.html">Profile</a></li>
                                    <li><a href="extras-maps.html">Maps</a></li>
                                    <li><a href="extras-contact.html">Contact list</a></li>
                                    <li><a href="extras-pricing.html">Pricing</a></li>
                                    <li><a href="extras-timeline.html">Timeline</a></li>
                                    <li><a href="extras-invoice.html">Invoice</a></li>
                                    <li><a href="extras-faq.html">FAQs</a></li>
                                    <li><a href="extras-gallery.html">Gallery</a></li>
                                    <li><a href="extras-email-templates.html">Email Templates</a></li>
                                    <li><a href="extras-maintenance.html">Maintenance</a></li>
                                    <li><a href="extras-comingsoon.html">Coming Soon</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-share-variant"></i>
                                    <span> Multi Level </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 1.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li>
                                                <a href="javascript: void(0);">Level 2.1</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">Level 2.2</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <div class="content-page">
            <div class="content">
            <div class="container-fluid">
			<div class="row">

            @yield('dashboard-content')

            </div>
            </div>
            </div>
            </div>

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                               2020 &copy; Developed by <a target="_blank" href="https://smartestmedia.com/english/index.php">Smartest Media</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a target="_blank" href="https://smartestmedia.com/english/agency.php">About Us</a>
                                    <a target="_blank" href="https://smartestmedia.com/english/contact.php">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>


            </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <!-- <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                            data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                            data-appStyle="assets/css/app-dark-rtl.min.css" />
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/k0YEM" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                </div>
            </div>
        </div> -->
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <!-- <div class="rightbar-overlay"></div> -->

        <!-- <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
            <i class="mdi mdi-cog-outline mdi-spin"></i> &nbsp;Choose Demos
        </a> -->

        
        @foreach(config('cms.cms_assets.scripts') as $path)
            <script type="text/javascript" src="{{ asset($path) }}"></script>
        @endforeach

        <!-- Vendor js -->
        <script src="{{asset('js/vendor.min.js')}}"></script>

        <!-- quill js -->
        <script src="{{asset('libs/quill/quill.min.js')}}"></script>

        <!-- dropify js -->
        <script src="{{asset('libs/dropify/dropify.min.js')}}"></script>

        <!-- knob plugin -->
        <script src="{{asset('libs/jquery-knob/jquery.knob.min.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{asset('libs/morris-js/morris.min.js')}}"></script>
        <script src="{{asset('libs/raphael/raphael.min.js')}}"></script>

        <!-- Dashboard init js-->
        <script src="{{asset('js/pages/dashboard.init.js')}}"></script>

        <!-- form-upload init -->
        <script src="{{asset('js/pages/form-fileupload.init.js')}}"></script> 

        <!-- App js -->
        <script src="{{asset('js/app.min.js')}}"></script>

        @yield('scripts')
        
    </body>
</html>