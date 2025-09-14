@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.user.update',$user)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Users</p>
                    <a href="{{route('admin.user.index')}}">X</a>
                    <button type="submit">Update</button>
                    </div>
                    <div class="car-body">
                        @include('partials.message')
                        <input type="text" name="name" placeholder="Name" value="{{old('name',$user->name)}}" required>
                        <input type="text" name="email" placeholder="Email" value="{{old('email',$user->email)}}" required>
                        <input type="password" name="password" placeholder="Optional">
                        <p>Roles</p>
                        @foreach ($roles as $rol)
                            <label>
                                <input type="checkbox" name="roles[]" value="{{$rol->name}}"
                                {{$user->hasRole($rol->name) ? 'checked' : ''}} >
                                {{$rol->name}}</label><br>
                        @endforeach
                        <p>Permissions</p> 
                        @foreach ($permissions as $permission)
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{$permission->name}}"
                                {{$user->hasPermissionTo($permission->name) ? 'checked' : ''}} >
                                {{$permission->name}}</label><br>
                        @endforeach
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
