@extends('layouts.layout')
@section('content')
    <!-- 山・ルート詳細画面 -->
    <nav style="--bs-breadcrumb-divider: '>' ;" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">ホーム</a></li>
            <li class="breadcrumb-item"><a href="#">検索</a></li>
            <li class="breadcrumb-item active" aria-current="page">富士山</li>
        </ol>
    </nav>

    <div class="container">
        <div class="container row row-cols-2">
            <a href="#" class="fs-1 col">富士山 〇〇ルート</a>
            <button type="button" class="btn btn-outline-primary btn-lg col">➕登りたいリストに追加</button>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide m-3" data-bs-ride="carousel">
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
