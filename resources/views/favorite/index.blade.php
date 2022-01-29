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

    @foreach ($favorites as $fav)
        @php
            $route = App\route::find($fav->favoriteable_id);
        @endphp
        <div class="container mb-2">
            <div class="row m-1">
                <a href="#" class="fs-3 row">{{ $route->mount->name }} {{ $route->name }}</a>
            </div>
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide m-3" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($route->mount->mountsImags as $mountsImag)
                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                                    @if ($loop->first)class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($route->mount->mountsImags as $mountsImag)
                                <div class="carousel-item @if ($loop->first)active @endif">
                                    <img src="{{ asset('storage/mount/' . $mountsImag->image) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>


                <div class="col m-3">
                    <p>所在地：{{ $route->mount->area->name }}</p>
                    <p>難易度：@if ($route->level == 1)初級@elseif($route->level==2)中級@elseif($route->level==3)上級@endif</p>
                    <p>所要時間：@if (intval(substr($route->times, 0, 2)) > 0)
                            {{ intval(substr($route->times, 0, 2)) }}時間
                        @endif
                        @if (intval(substr($route->times, 3, 2)) > 0)
                            {{ intval(substr($route->times, 3, 2)) }}分
                        @endif
                    </p>
                    <p>{{ $route->detail }}</p>
                    {{-- <a href="#">他のルート</a>山の詳細場面へ飛ばす --}}
                </div>
            </div>
        </div>
    @endforeach


    {{-- 以下、表示イメージのダミー --}}
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
