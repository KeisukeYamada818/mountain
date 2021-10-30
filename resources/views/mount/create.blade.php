@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New mount</div>
                    <div class="panel-body">
                        <a href="{{ url('/mount') }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                        <form method="POST" action="/mount/store" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">name: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="high" class="col-md-4 control-label">high: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="high" type="text" id="high"
                                        value="{{ old('high') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="famous" class="col-md-4 control-label">famous: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="famous" type="text" id="famous"
                                        value="{{ old('famous') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="area" class="col-md-4 control-label">area: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="area" type="text" id="area"
                                        value="{{ old('area') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image1" class="col-md-4 control-label">画像: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="image1" type="file" accept="image/*" id="image1"
                                        value="{{ old('image1') }}">
                                    <input class="form-control" name="image2" type="file" accept="image/*" id="image2"
                                        value="{{ old('image2') }}">
                                    <input class="form-control" name="image3" type="file" accept="image/*" id="image3"
                                        value="{{ old('image3') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="Create">
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
