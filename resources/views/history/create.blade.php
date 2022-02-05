@extends('layouts.layout')
@section('content')

    <!-- 登山履歴登録画面 -->
    <div class="container">
        <div class="container row row-cols-2">
            <a href="{{ route('routes.show', $route) }}" class="fs-1 col">{{ $route->mount->name }}
                {{ $route->name }}</a>
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

    <div class="p-4" style="background-color:rgba(100, 197, 78, 0.3);">
        <nav style="--bs-breadcrumb-divider: '>' ;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ホーム</a></li>
                <li class="breadcrumb-item active" aria-current="page">登ったリストに登録</li>
            </ol>
        </nav>


        <div class="container mb-3" style="background-color:rgba(255, 255, 255, 0.8); ">
            <div class="container"
                style="border-style:solid; border-color: rgba(24, 73, 29, 0.9); border-width: 5px;padding:0px;">
                <h1 style="background-color: rgba(24, 73, 29, 0.986); display:inline-block; color:white; padding:10px">
                    登ったリストに登録！
                </h1>
                <form>
                    <div class="row p-4">
                        <label for="exampleInputEmail1" class="form-label">登った日時</label>
                        <div class="form-check col-3">
                            <input class="form-check-input" type="date" name="crimed_at" value="crimed_at">


                        </div>
                        <div class="container pt-4 pl-4">
                            <label for="time" class="form-label">かかった時間（往復）</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="minutes"
                                value="minutes">
                                <option value="v1">30分</option>
                                <option value="v2">1時間</option>
                                <option value="v3">1時間30分</option>
                                <option value="v4">2時間</option>
                                <option value="v5">2時間30分</option>
                                <option value="v6" 　selected>3時間</option>
                                <option value="v7">3時間30分</option>
                                <option value="v8">4時間</option>
                                <option value="v9">4時間30分</option>
                                <option value="v10">5時間</option>
                                <option value="v11">5時間30分</option>
                                <option value="v12">6時間</option>
                                <option value="v13">6時間30分</option>
                                <option value="v14">7時間</option>
                                <option value="v15">7時間30分</option>
                                <option value="v16">8時間</option>
                                <option value="v17">8時間30分</option>
                                <option value="v18">9時間</option>
                                <option value="v19">9時間30分</option>
                                <option value="v20">10時間</option>
                                <option value="v21">10時間30分</option>
                            </select>
                        </div>
                        <div class="container pt-4 pl-4">
                            <label class="form-label">一言</label>
                            <input type="text" name="name" value="comment" placeholder="入力ヒント">
                        </div>
                        <div class="p-4">
                            <button type="submit" class="btn btn-primary mb-3　btn-lg">登録</button>
                        </div>
                </form>
            </div>
        @endsection
