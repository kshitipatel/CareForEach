<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Careforeach | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

        function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('app/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{asset('app/css/style.css')}}" rel='stylesheet' type='text/css' />
    <!-- font-awesome icons CSS-->
    <link href="{{asset('app/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons CSS-->
    <!-- side nav css file -->
    <link href="{{asset('app/css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css' />
    <!-- side nav css file -->
    <!-- js-->
    <script src="{{asset('app/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('app/js/modernizr.custom.js')}}"></script>
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->
    <!-- Metis Menu -->
    <script src="{{asset('app/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('app/js/custom.js')}}"></script>
    <link href="{{asset('app/css/custom.css')}}" rel="stylesheet">
    <!--//Metis Menu -->
    <script src="js/Chart.js"></script>
    <!--location-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <!--//location-->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"/>
    <script src="{{asset('app/js/pie-chart.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function(from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function(from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function(from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });
    </script>


</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <!--left-fixed -navigation-->
            <aside class="sidebar-left">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="navbar-brand" href="#"><span class="fa fa-area-chart"></span>Care4Each<span class="dashboard_text">{{$cmp}}</span></a></h1>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="sidebar-menu">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orders') }}">
                                    <i class="fa fa-shopping-cart"></i><span>My Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('attendance') }}">
                                    <i class=" fa fa-users"></i>
                                    <span>Attendance</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('employee.list') }}">
                                    <i class="fa fa-male"></i> <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('vendor.list') }}">
                                    <i class="fa fa-user-secret"></i> <span>Vendor</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('ginnieBox') }}">
                                    <i class="fa fa-gift"></i> <span>Ginnie Box</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('visitor') }}">
                                    <i class="fa fa-user"></i> <span>Visitor</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.list') }}">
                                    <i class="fa fa-archive"></i> <span>Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('leave') }}">
                                    <i class="fa fa-envelope"></i> <span>Leave</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('category.list') }}">
                                    <i class="fa fa-tasks"></i> <span>Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('subcategory.list') }}">
                                    <i class="fa fa-tasks"></i> <span>SubCategory</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('complaint') }}">
                                    <i class="fa fa-cogs "></i> <span>Complaint</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('reports')}}">
                                    <i class="fa fa-newspaper-o"></i> <span>Reports</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('messages')}}">
                                    <i class="fa fa-newspaper-o"></i> <span>Messages</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">
                                    <i class="fa fa-phone-square"></i> <span>Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </aside>
        </div>

        <div class="sticky-header header-section ">
            <div class="header-left">
                <!--toggle button start-->
                <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                <!--toggle button end-->
                <div class="profile_details_left"><!--notifications of menu start -->
                    <ul class="nofitications-dropdown">
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">4</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 3 new messages</h3>
                                    </div>
                                </li>
                                <li><a href="#">
                                    <div class="user_img"><img src="images/1.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet</p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li class="odd"><a href="#">
                                    <div class="user_img"><img src="images/4.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li><a href="#">
                                    <div class="user_img"><img src="images/3.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li><a href="#">
                                    <div class="user_img"><img src="images/2.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li>
                                    <div class="notification_bottom">
                                        <a href="#">See all messages</a>
                                    </div> 
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">4</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="notification_header">
                                        <h3>You have 3 new notification</h3>
                                    </div>
                                </li>
                                <li><a href="#">
                                    <div class="user_img"><img src="images/4.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet</p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li class="odd"><a href="#">
                                    <div class="user_img"><img src="images/1.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li><a href="#">
                                    <div class="user_img"><img src="images/3.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li><a href="#">
                                    <div class="user_img"><img src="images/2.jpg" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor amet </p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>    
                                </a></li>
                                <li>
                                    <div class="notification_bottom">
                                        <a href="#">See all notifications</a>
                                    </div> 
                                </li>
                            </ul>
                        </li>      
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <!--notification menu end -->
                <div class="clearfix"> </div>
            </div>
            <div class="header-right">

                <div class="profile_details">       
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">   
                                    <span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
                                    <div class="user-name">
                                        <p>{{$cmp}}</p>
                                        <span>Administrator</span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>    
                                </div>  
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li> <a href="{{ route('profile') }}"><i class="fa fa-suitcase"></i> Profile</a> </li> 
                                <li> <a href="{{ route('session.destroy') }}"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>               
            </div>
            <div class="clearfix"> </div>   
        </div>
        <!-- //header-ends -->

        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">

                @yield('content')
            </div>
        </div>
        <!-- main content end-->


        
    </div>
    <!-- side nav js -->
    @yield('js')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
        @endif
        @if(Session::has('warning'))
        toastr.success("{{ Session::get('warning') }}")
        @endif

        @if(Session::has('error'))
        toastr.info("{{ Session::get('error') }}")
        @endif

    </script>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
      }
  </script>
  <script src="{{asset('app/js/SidebarNav.min.js')}}" type='text/javascript'></script>
  <script>
    $('.sidebar-menu').SidebarNav()
</script>
<script>
    jQuery(document).ready(function ($) {
        $('select[name=subcategory]').on('change', function () {
            var selected = $(this).find(":selected").attr('value');
            $.ajax({
                url: base_url + '/subcategory/'+selected+'/products/',
                type: 'GET',
                dataType: 'json',

            }).done(function (data) {

                var select = $('select[name=product]');
                select.empty();
                select.append('<option value="0" >Please Select Product</option>');
                $.each(data,function(key, value) {
                    select.append('<option value=' + key.id + '>' + value.name + '</option>');
                });
                console.log("success");
            })
        });
    });
</script>
<!-- //side nav js -->
<!-- Classie -->
<!-- for toggle left push menu script -->
<script src="{{asset('app/js/classie.js')}}"></script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
    showLeftPush = document.getElementById('showLeftPush'),
    body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>

<!-- //Classie -->
<!-- //for toggle left push menu script -->
<!--scrolling js-->
<script src="{{asset('app/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('app/js/scripts.js')}}"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('app/js/bootstrap.js')}}"> </script>
<!-- //Bootstrap Core JavaScript -->
</body>

</html>