@extends("layouts.dashboard")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">checkpoint {{ $checkpoint->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('checkpoint') }}" title="Back"><button
                                class="btn btn-warning btn-xs">Back</button></a>
                        <a href="{{ url('checkpoint') . '/' . $checkpoint->id . '/edit' }}" title="Edit checkpoint"><button
                                class="btn btn-primary btn-xs">Edit</button></a>
                        <form method="POST" action="/checkpoint/{{ $checkpoint->id }}" class="form-horizontal"
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
                                        <td>{{ $checkpoint->id }} </td>
                                    </tr>
                                    <tr>
                                        <th>route_id</th>
                                        <td>{{ $checkpoint->route_id }} </td>
                                    </tr>
                                    <tr>
                                        <th>order</th>
                                        <td>{{ $checkpoint->order }} </td>
                                    </tr>
                                    <tr>
                                        <th>detail</th>
                                        <td>{{ $checkpoint->detail }} </td>
                                    </tr>
                                    <tr>
                                        <th>image</th>
                                        <td>{{ $checkpoint->image }} </td>
                                    </tr>
                                    <tr>
                                        <th>mount_id</th>
                                        <td>{{ $checkpoint->mount_id }} </td>
                                    </tr>
                                    <tr>
                                        <th>level</th>
                                        <td>{{ $checkpoint->level }} </td>
                                    </tr>
                                    <tr>
                                        <th>times</th>
                                        <td>{{ $checkpoint->times }} </td>
                                    </tr>
                                    <tr>
                                        <th>diff</th>
                                        <td>{{ $checkpoint->diff }} </td>
                                    </tr>
                                    <tr>
                                        <th>detail</th>
                                        <td>{{ $checkpoint->detail }} </td>
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
