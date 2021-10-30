
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit mounts_imag #{{ $mounts_imag->id }}</div>
                            <div class="panel-body">
                                <a href="{{ url("mounts_imag") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/mounts_imag/{{ $mounts_imag->id }}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<div class="form-group">
                                        <label for="id" class="col-md-4 control-label">id: </label>
                                        <div class="col-md-6">{{$mounts_imag->id}}</div>
                                    </div>
										<div class="form-group">
                                            <label for="mount_id" class="col-md-4 control-label">mount_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="mount_id" type="text" id="mount_id" value="{{$mounts_imag->mount_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="image" class="col-md-4 control-label">image: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="image" type="text" id="image" value="{{$mounts_imag->image}}">
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
    