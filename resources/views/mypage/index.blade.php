@extends('layouts.layout')
@section('content')
    <!-- マイページ画面 -->
    <nav style="--bs-breadcrumb-divider: '>' ;" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">ホーム</a></li>

            <li class="breadcrumb-item active" aria-current="page">マイページ</li>
        </ol>
    </nav>

    <div class="container p-3" style="background-color: rgba(149, 218, 197, 0.2);">
        <p style="font-size: 50px;"><span>〇〇</span>のレベルは.....<span>勇者</span>！</p>

        <div class="">
            <img src="/origin/images/yuusya.jpg">
        </div>
        <p>次のレベルまであと<span>〇〇</span></p>

    </div>

    <div class="container p-3" style="background-color: rgba(106, 161, 111, 0.466);">
        <p style="font-size: 30px;"><span>〇〇</span>へおすすめの山</p>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#" class="fs-1">富士山</a>
                    <a href="#"><img src="/origin/images/mountain1.jpg" class="d-block w-100" alt="..."></a>

                </div>
                <div class="carousel-item">
                    <a href="#" class="fs-1">〇〇山</a>
                    <a href="#"><img src="/origin/images/mountain2.jpg" class="d-block w-100" alt="..."></a>

                </div>
                <div class="carousel-item">
                    <a href="#" class="fs-1">△△山</a>
                    <a href=""><img src="/origin/images/mountain3.jpg" class="d-block w-100" alt="..."></a>

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
    </div>




    <div class="container pb-2 mb-4" style="background-color: rgba(216, 243, 212, 0.616);">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">登りたいリスト</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">スケジュール</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">登山履歴</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">アカウント情報</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">問い合わせ</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">Q＆A</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">プラバシーポリシー</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">利用規約</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">ダミー</a></div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"><a href="#">ダミー</a></div>
            </div>
        </div>
    </div>
@endsection
