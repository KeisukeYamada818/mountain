@extends("layouts.dashboard")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New checkpoint</div>
                    <div class="panel-body">
                        <a href="{{ url('/checkpoint') }}" title="Back"><button
                                class="btn btn-warning btn-xs">Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                        <form method="POST" action="/checkpoint/store" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="route_id" class="col-md-4 control-label">route_id: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="route_id" type="text" id="route_id"
                                        value="{{ old('route_id') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order" class="col-md-4 control-label">order: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="order" type="text" id="order"
                                        value="{{ old('order') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail" class="col-md-4 control-label">detail: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="detail" type="text" id="detail"
                                        value="{{ old('detail') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label">image: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="image" type="text" id="image"
                                        value="{{ old('image') }}">
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
