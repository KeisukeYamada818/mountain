@extends('layouts.layout')
@section('content')
    <!-- ルート詳細画面 -->
    <nav style="--bs-breadcrumb-divider: '>' ;" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">ホーム</a></li>
            <li class="breadcrumb-item"><a href="#">検索</a></li>
            <li class="breadcrumb-item active" aria-current="page">富士山</li>
        </ol>
    </nav>

    <div class="container">
        <div class="container row row-cols-2">
            <a href="{{ route('routes.show', $route) }}" class="fs-1 col">{{ $route->mount->name }}
                {{ $route->name }}</a>
            @auth
                @if ($route->isFavoritedBy(Auth::user()))
                    <a href="/routes/{{ $route->id }}/favorite" class="btn text-favorite w-100">
                        <i class="fa fa-heart"></i>
                        お気に入り解除する
                    </a>
                @else
                    <a href="/routes/{{ $route->id }}/favorite" class="btn text-favorite w-100">
                        <i class="fa fa-heart"></i>
                        お気に入りに登録
                    </a>
                @endif
            @endauth
        </div>
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
                        <img src="{{ asset('storage/mount/' . $mountsImag->image) }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
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

            <p>所在地：{{ $route->mount->area->name }}</p>
            <p>難易度：@if ($route->level == 1)初級@elseif($route->level==2)中級@elseif($route->level==3)上級@endif</p>
            <p>所要時間：
                @if (intval(substr($route->times, 0, 2)) > 0)
                    {{ intval(substr($route->times, 0, 2)) }}時間
                @endif
                @if (intval(substr($route->times, 3, 2)) > 0)
                    {{ intval(substr($route->times, 3, 2)) }}分
                @endif
            </p>
            <p>{{ $route->detail }}</p>
            <a href="#">他のルート</a>
        </div>
    </div>
@endsection
