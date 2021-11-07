@extends('layouts.layout')
@section('content')

    <!-- 登りたいリスト -->
    <nav style="--bs-breadcrumb-divider: '>' ;" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">ホーム</a></li>
            <li class="breadcrumb-item"><a href="#">マイページ</a></li>
            <li class="breadcrumb-item active" aria-current="page">登りたいリスト</li>
        </ol>
    </nav>

    <div class="container">
        <p class="fs-1">〇〇の登りたいリスト</p>
    </div>


    <div class="container row mb-2">
        <div class="container row m-1">
            <a href="#" class="fs-3 col">富士山 〇〇ルート</a>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide m-3 col" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/origin/images/mountain1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/origin/images/mountain2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/origin/images/mountain3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>


        <div class="col">
            <p>所在地：山梨県</p>
            <p>難易度：初級</p>
            <p>所要時間：2時間</p>
            <p>ルートの説明---------------------------------</p>
            <a href="#">他のルート</a>
        </div>
    </div>

    <div class="container row mb-2">
        <div class="container row m-1">
            <a href="#" class="fs-3 col">エベレスト 〇〇ルート</a>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide m-3 col" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/origin/images/mountain1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/origin/images/mountain2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/origin/images/mountain3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>


        <div class="col">
            <p>所在地：山梨県</p>
            <p>難易度：初級</p>
            <p>所要時間：2時間</p>
            <p>ルートの説明---------------------------------</p>
            <a href="#">他のルート</a>
        </div>
    </div>

    <div class="container row mb-2">
        <div class="container row m-1">
            <a href="#" class="fs-3 col">△△山 〇〇ルート</a>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide m-3 col" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/origin/images/mountain1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/origin/images/mountain2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/origin/images/mountain3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>


        <div class="col">
            <p>所在地：山梨県</p>
            <p>難易度：初級</p>
            <p>所要時間：2時間</p>
            <p>ルートの説明---------------------------------</p>
            <a href="#">他のルート</a>
        </div>
    </div>
@endsection
