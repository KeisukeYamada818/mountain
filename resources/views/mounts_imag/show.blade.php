
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">mounts_imag {{ $mounts_imag->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("mounts_imag") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("mounts_imag") ."/". $mounts_imag->id . "/edit" }}" title="Edit mounts_imag"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/mounts_imag/{{ $mounts_imag->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$mounts_imag->id}} </td></tr>
										<tr><th>mount_id</th><td>{{$mounts_imag->mount_id}} </td></tr>
										<tr><th>image</th><td>{{$mounts_imag->image}} </td></tr>
										<tr><th>name</th><td>{{$mounts_imag->name}} </td></tr>
										<tr><th>high</th><td>{{$mounts_imag->high}} </td></tr>
										<tr><th>famous</th><td>{{$mounts_imag->famous}} </td></tr>
										<tr><th>area</th><td>{{$mounts_imag->area}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    