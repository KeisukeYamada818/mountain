
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New route</div>
                            <div class="panel-body">
                                <a href="{{ url("/route") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/route/store" class="form-horizontal">
                                    {{ csrf_field() }}

    										<div class="form-group">
                                        <label for="mount_id" class="col-md-4 control-label">mount_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="mount_id" type="text" id="mount_id" value="{{old('mount_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="level" class="col-md-4 control-label">level: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="level" type="text" id="level" value="{{old('level')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="times" class="col-md-4 control-label">times: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="times" type="text" id="times" value="{{old('times')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="diff" class="col-md-4 control-label">diff: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="diff" type="text" id="diff" value="{{old('diff')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="detail" class="col-md-4 control-label">detail: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="detail" type="text" id="detail" value="{{old('detail')}}">
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
    