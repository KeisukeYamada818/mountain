@extends('layouts.layout')
@section('content')

    <!-- 登山履歴 -->
    <nav style="--bs-breadcrumb-divider: '>' ;" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">ホーム</a></li>
            <li class="breadcrumb-item"><a href="#">マイページ</a></li>
            <li class="breadcrumb-item active" aria-current="page">登りたいリスト</li>
        </ol>
    </nav>

    <div class="container">
        <p class="fs-1" style="color:greenyellow">〇〇のこれまでの冒険履歴</p>
    </div>
    @foreach ($histories as $history)
        @php
            $route = App\route::find($history->route_id);
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
                    <p>登山日時：{{ $history->crimed_at }}</p>
                    <p>かかった時間：@if ($history->minutes / 60 > 0){{ $history->minutes / 60 }}時間{{ $history->minutes % 60 }}分@else{{ $history->minutes % 60 }}分@endif
                    </p>
                    <p>一言：{{ $history->comment }}</p>


                </div>
            </div>
        </div>
    @endforeach

@endsection
