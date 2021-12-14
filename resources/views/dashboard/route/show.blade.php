@extends("layouts.dashboard")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">route {{ $route->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('route') }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                        <a href="{{ url('route') . '/' . $route->id . '/edit' }}" title="Edit route"><button
                                class="btn btn-primary btn-xs">Edit</button></a>
                        <form method="POST" action="/route/{{ $route->id }}" class="form-horizontal"
                            style="display:inline;">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete User"
                                onclick="return confirm('Confirm delete')">
                                Delete
                            </button>
                        </form>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>id</th>
                                        <td>{{ $route->id }} </td>
                                    </tr>
                                    <tr>
                                        <th>mount_id</th>
                                        <td>{{ $route->mount_id }} </td>
                                    </tr>
                                    <tr>
                                        <th>level</th>
                                        <td>{{ $route->level }} </td>
                                    </tr>
                                    <tr>
                                        <th>times</th>
                                        <td>{{ $route->times }} </td>
                                    </tr>
                                    <tr>
                                        <th>diff</th>
                                        <td>{{ $route->diff }} </td>
                                    </tr>
                                    <tr>
                                        <th>detail</th>
                                        <td>{{ $route->detail }} </td>
                                    </tr>
                                    <tr>
                                        <th>name</th>
                                        <td>{{ $route->name }} </td>
                                    </tr>
                                    <tr>
                                        <th>high</th>
                                        <td>{{ $route->high }} </td>
                                    </tr>
                                    <tr>
                                        <th>famous</th>
                                        <td>{{ $route->famous }} </td>
                                    </tr>
                                    <tr>
                                        <th>area</th>
                                        <td>{{ $route->area }} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
