@extends('layouts.app')

@section('title', 'Permissions')

@section('page-title', 'Available Permissions')

@section('content')

<div class=" bg-gradient-primary  pt-md-6"> </div>

    <div class="col">
        @include('includes/message')
        <div class="card shadow mt-4">
            <h1>
                <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
            </h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>Permissions</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td> 
                                <td>
                                <a href="{{ route('permissions.create', $permissions->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger confirm']) !!}
                                {!! Form::close() !!}

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No permissions available</td> 
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-4 mt-2 mb-2">
                    <a href="{{ route('permissions.create') }}" class="btn btn-success">Add Permission</a>
                </div>
            </div>
        </div>
    </div>
   
@endsection()

@section('scripts')
    <script>
        $('.confirm').on('click', function (e) {
            if (confirm('Apakah anda yakin akan menghapus data ini?')) {
                return true;
            }
            else {
                return false;
            }
        });
    </script>
@endsection()
