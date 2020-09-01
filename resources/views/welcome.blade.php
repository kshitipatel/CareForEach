<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Careforeach | Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('app/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="{{asset('app/css/style.css')}}" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS-->
    <link href="{{asset('app/css/font-awesome.css')}}" rel="stylesheet"> 
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href="{{asset('app/css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css'/>
    <!-- side nav css file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- js-->
    <script src="{{asset('app/js/jquery-1.11.1.min.js')}}"></script>
    <script src="js/modernizr.custom.js"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- Metis Menu -->
    <script src="{{asset('app/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('app/js/custom.js')}}"></script>
    <link href="{{asset('app/css/custom.css')}}" rel="stylesheet">
    <!--//Metis Menu -->
    <style>
     #page-wrapper {

           background-image: url("{{asset('app/images/slider6.jpg')}}");
           background-repeat: no-repeat;
           background-size: cover;
       }
   </style>
</head> 
<body >

    <div class="main-content" >
        <div id="page-wrapper">

                        
            <div class="main-page login-page " >

                <h2 class="title1">Login</h2>
                <div class="widget-shadow">
                    <div class="login-body">
                       
                       <form action="{{ route('home') }}" method="post">
                            
                            {{ csrf_field() }}
                            <input type="email" class="user" name="emailid" placeholder="Enter Your Email" required="">
                            <input type="password" name="password" class="lock" placeholder="Enter the password" required="">
                            <div class="forgot-grid">
                                <!--label class="checkbox"><input type="checkbox" name="checkbox" checked="false"><i></i>Remember me</label-->
                                <div class="clearfix"> </div>
                            </div>
                            <input type="submit" name="Sign In" value="Sign In">
                        </form>
                    </div>
                </div>
            </div>

        </div>

    <!--footer-->
    <div class="footer">
     <p>&copy; 2019 Webearl Technologies. All Rights Reserved | Design by <a href="http://webearl.com/" target="_blank">Webearl Technologies</a></p>       </div>
     <!--//footer-->
 </div>


 <!-- Bootstrap Core JavaScript -->
 <script src="{{asset('app/js/bootstrap.js')}}"> </script>
 <!-- //Bootstrap Core JavaScript -->

</body>
</html>