<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{url('assets/style/theme.css')}}" rel="stylesheet">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css'" rel="stylesheet"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>    
        <header>
            <div class="container">
                <div class="logo">
                    <a href="">
                       
                        <h1>
                            KH FASHION
                        </h1> 
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="{{route('home')}}">HOME</a>
                    </li>
                    <li>
                        <a href="{{route('shops')}}">SHOP</a>
                    </li>
                    <li>
                        <a href="{{route('news')}}">NEWS</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="{{route('search')}}" method="get">
                        <input type="text" name="search" class="box" placeholder="SEARCH HERE">
                        <button>
                            <div style="background-image: url(/assets/image/search.png);
                                        width: 28px;
                                        height: 28px;
                                        background-position: center;
                                        background-size: contain;
                                        background-repeat: no-repeat;
                            "></div>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        @yield('main_page');

        <footer>
            <span>
                AllRight Recieved @ 2023
            </span>
        </footer>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>