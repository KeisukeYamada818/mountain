
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">mounts_imag</div>
                            <div class="panel-body">
                            
                            
                                <a href="{{ url("mounts_imag/create") }}" class="btn btn-success btn-sm" title="Add New mounts_imag">
                                    Add New
                                </a>

                                <form method="GET" action="{{ url("mounts_imag") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="submit">
                                                <span>Search</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>


                                <br/>
                                <br/>
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr><th>id</th><th>mount_id</th><th>image</th><th>name</th><th>high</th><th>famous</th><th>area</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mounts_imag as $item)
                                    
                                    <tr>

                                            <td>{{ $item->id}} </td>

                                            <td>{{ $item->mount_id}} </td>

                                            <td>{{ $item->image}} </td>

                                                    <td>{{ $item->name}} </td>

                                                    <td>{{ $item->high}} </td>

                                                    <td>{{ $item->famous}} </td>

                                                    <td>{{ $item->area}} </td>
  
                                                <td><a href="{{ url("/mounts_imag/" . $item->id) }}" title="View mounts_imag"><button class="btn btn-info btn-xs">View</button></a></td>
                                                <td><a href="{{ url("/mounts_imag/" . $item->id . "/edit") }}" title="Edit mounts_imag"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                                                <td>
                                                    <form method="POST" action="/mounts_imag/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                        Delete
                                                        </button>    
                                                    </form>
                                                   </td>
                                              </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> {!! $mounts_imag->appends(["search" => Request::get("search")])->render() !!} </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    