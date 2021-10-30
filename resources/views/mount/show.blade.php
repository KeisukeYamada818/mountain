
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">mount {{ $mount->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("mount") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("mount") ."/". $mount->id . "/edit" }}" title="Edit mount"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/mount/{{ $mount->id }}" class="form-horizontal" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field("delete") }}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                        Delete
                                        </button>    
                            </form>
                            <br/>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
										<tr><th>id</th><td>{{$mount->id}} </td></tr>
										<tr><th>name</th><td>{{$mount->name}} </td></tr>
										<tr><th>high</th><td>{{$mount->high}} </td></tr>
										<tr><th>famous</th><td>{{$mount->famous}} </td></tr>
										<tr><th>area</th><td>{{$mount->area}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    