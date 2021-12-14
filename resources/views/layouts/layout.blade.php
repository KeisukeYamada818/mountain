<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--/font-awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!--/Font Awesome Animation-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.css"
        type="text/css" media="all" />
    <title>登山クエスト</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand p-2" href="#">登山クエスト</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item active p-2">
                        <a class="nav-link" aria-current="page" href="#"><i
                                class="fas fa-home faa-bounce animated-hover fa-lg"></i>ホーム</a>
                    </li>
                    <li class="nav-item p-2">
                        @guest
                            <a class="nav-link" href="{{ route('register') }}"><i
                                    class="fas fa-user-check faa-bounce animated-hover fa-lg"></i>新規会員登録</a>
                        @endguest
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="{{ route('mypage') }}"><i
                                class="fas fa-sign-in-alt faa-bounce animated-hover fa-lg"></i>マイページ</a>
                    </li>
                    @auth
                        <li class="nav-item p-2">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="山・ルートを検索!" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')


    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-muted">&copy;KeisukeYamada.2021.</span>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>



</html>
