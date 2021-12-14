@extends("layouts.dashboard")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit mount #{{ $mount->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('mount') }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="/mount/{{ $mount->id }}" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="id" class="col-md-4 control-label">id: </label>
                                <div class="col-md-6">{{ $mount->id }}</div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">name: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ $mount->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="high" class="col-md-4 control-label">high: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="high" type="text" id="high"
                                        value="{{ $mount->high }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="famous" class="col-md-4 control-label">famous: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="famous" type="text" id="famous"
                                        value="{{ $mount->famous }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="area" class="col-md-4 control-label">area: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="area" type="text" id="area"
                                        value="{{ $mount->area }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
