
@extends('layouts.admin')

@section('content')
@include('partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Users</p>
                <div class="class btn-group">
                    <a href="{{route('admin.dashboard')}}" class="btn btn-danger">X</a>
                    <a href="{{route('admin.user.create')}}" class="btn btn-dark">Create User</a>
                </div>
                </div>
                <div class="car-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roles</th>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                            <td>{{$user->name}}</td>
                            <td>{{implode(', ',$user->getRoleNames()->toArray())}}</td>
                            <td>{{implode(', ',$user->getPermissionNames()->toArray())}}</td>
                            <td>
                                <a href="{{route('admin.user.edit', $user)}}" class="btn btn-dark">Edit</a>
                                <form action="{{route('admin.user.destroy',$user)}}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure, delete register?')" class="btn btn-dark">Delete</button>
                                </form>
                            </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
