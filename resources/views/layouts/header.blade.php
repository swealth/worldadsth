<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <meta name="description" content="แหล่งรวมพื้นที่เช่าทำโฆษณา ป้ายโฆษณาให้เช่า ลงประกาศกับเราฟรี" />
        <meta name="keywords" content="" />
        <meta name="robots" content="INDEX,FOLLOW" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Kanit&amp;subset=thai" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-34087634-1', 'auto');
          ga('send', 'pageview');

        </script>
    </head>
    <body>
        <div class="se-pre-con"></div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="navbar-brand">
                        แหล่งรวมพื้นที่เช่าทำโฆษณา | ป้ายโฆษณาให้เช่า | <a href="/home">ลงประกาศกับเราฟรี</a> | <a style="color:#27ae60;" href="/blog">ข่าวสารและบล็อค</a>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Log in</a></li>
                            <li><a href="{{ url('/register') }}">Sign Up</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!-- Script -->

        <script src="/js/app.js"></script>
        <script src="https://use.fontawesome.com/ff67bb2de6.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $(window).load(function() {
                    // Animate loader off screen
                    $(".se-pre-con").fadeOut("slow");
                });
            });
        </script>

        @yield('content')

    </body>
</html>
