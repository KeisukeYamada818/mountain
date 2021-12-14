@extends("layouts.dashboard")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">checkpoint</div>
                    <div class="panel-body">


                        <a href="{{ url('checkpoint/create') }}" class="btn btn-success btn-sm" title="Add New checkpoint">
                            Add New
                        </a>

                        <form method="GET" action="{{ url('checkpoint') }}" accept-charset="UTF-8"
                            class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit">
                                        <span>Search</span>
                                    </button>
                                </span>
                            </div>
                        </form>


                        <br />
                        <br />


                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>route_id</th>
                                        <th>order</th>
                                        <th>detail</th>
                                        <th>image</th>
                                        <th>mount_id</th>
                                        <th>level</th>
                                        <th>times</th>
                                        <th>diff</th>
                                        <th>detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkpoint as $item)

                                        <tr>

                                            <td>{{ $item->id }} </td>

                                            <td>{{ $item->route_id }} </td>

                                            <td>{{ $item->order }} </td>

                                            <td>{{ $item->detail }} </td>

                                            <td>{{ $item->image }} </td>

                                            <td>{{ $item->mount_id }} </td>

                                            <td>{{ $item->level }} </td>

                                            <td>{{ $item->times }} </td>

                                            <td>{{ $item->diff }} </td>

                                            <td>{{ $item->detail }} </td>

                                            <td><a href="{{ url('/checkpoint/' . $item->id) }}"
                                                    title="View checkpoint"><button
                                                        class="btn btn-info btn-xs">View</button></a></td>
                                            <td><a href="{{ url('/checkpoint/' . $item->id . '/edit') }}"
                                                    title="Edit checkpoint"><button
                                                        class="btn btn-primary btn-xs">Edit</button></a></td>
                                            <td>
                                                <form method="POST" action="/checkpoint/{{ $item->id }}"
                                                    class="form-horizontal" style="display:inline;">
                                                    {{ csrf_field() }}

                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete User"
                                                        onclick="return confirm('Confirm delete')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $checkpoint->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
