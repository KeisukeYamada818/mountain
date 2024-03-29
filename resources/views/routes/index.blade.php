@extends('layouts.layout')
@section('content')
    <!-- 山・ルート検索画面 -->
    <div class="p-4" style="background-color:rgba(100, 197, 78, 0.3);">
        <nav style="--bs-breadcrumb-divider: '>' ;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ホーム</a></li>
                <li class="breadcrumb-item active" aria-current="page">検索</li>
            </ol>
        </nav>


        <div class="container mb-3" style="background-color:rgba(255, 255, 255, 0.8); ">
            <div class="container"
                style="border-style:solid; border-color: rgba(24, 73, 29, 0.9); border-width: 5px;padding:0px;">
                <h1 style="background-color: rgba(24, 73, 29, 0.986); display:inline-block; color:white; padding:10px">
                    登山ルート検索
                </h1>
                <form method="GET" action="/routes">
                    <div class="p-4">
                        <label for="exampleFormControlInput1" class="form-label">山の名前</label>
                        <input name="mount_name" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="ex.富士山">
                    </div>
                    <div class="row p-4">

                        <label for="exampleFormControlTextarea1" class="form-label col-12">所在地</label>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                北海道
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="2" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                東北
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="3" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                関東
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="4" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                中部
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="5" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                関西
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="6" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                中国
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="7" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                四国
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input name="region[]" class="form-check-input" type="checkbox" value="8" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                九州
                            </label>
                        </div>

                    </div>

                    <div class="row p-4">
                        <label for="exampleInputEmail1" class="form-label">難易度</label>
                        <div class="form-check col-3">
                            <input class="form-check-input" type="radio" name="level" value="1" id="flexCheckChecked"
                                checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                初級
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input class="form-check-input" type="radio" name="level" value="2" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                中級
                            </label>
                        </div>
                        <div class="form-check col-3">
                            <input class="form-check-input" type="radio" name="level" value="3" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                上級
                            </label>
                        </div>

                    </div>
                    <div class="container pt-4 pl-4">
                        <label for="time" class="form-label">所要時間（往復）</label>
                        <select name="time" class="form-select mb-3" aria-label="Default select example">

                            <option selected>選択してください</option>
                            <option value="1">1時間以内</option>
                            <option value="2">1時間〜2時間</option>
                            <option value="3">2時間〜3時間</option>
                            <option value="4">3時間〜4時間</option>
                            <option value="5">4時間以上</option>
                        </select>
                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary mb-3　btn-lg">検索</button>
                    </div>

                </form>
            </div>

            <!-- 検索結果表示 -->
            <div class="container mb-3 mt-3"
                style="border-style: solid; border-width: 5px; border-color: rgba(86, 131, 105, 0.479);">
                <p>検索結果</p>

                @foreach ($routes as $route)
                    <div class="container row">
                        <div class="col p-2">

                            {{-- <img src="{{ asset('storage/mount/' . $route->mount->mountsImags[0]->image) }}" alt=""
                                class="img-fluid"> --}}
                        </div>
                        <div class="col">
                            <a href="{{ route('routes.show', $route) }}"
                                class="fs-1">{{ $route->name }}</a><br>
                            <p>山の名前：{{ $route->mount->name }}</p>
                            <p>所在地：{{ $route->mount->area->name }}</p>
                            <p>難易度：@if ($route->level == 1)初級@elseif($route->level==2)中級@elseif($route->level==3)上級@endif</p>
                            <p>所要時間：@if (intval(substr($route->times, 0, 2)) > 0)
                                    {{ intval(substr($route->times, 0, 2)) }}時間
                                @endif
                                @if (intval(substr($route->times, 3, 2)) > 0)
                                    {{ intval(substr($route->times, 3, 2)) }}分
                                @endif
                            </p>
                            <p>ルートの説明：{{ $route->detail }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
