@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.user.store')}}" method="post">
                @csrf
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Users</p>
                    <a href="{{route('admin.user.index')}}">X</a>
                    <button type="submit">Save</button>
                    </div>
                    <div class="car-body">
                        @include('partials.message')
                        <input type="text" name="name" placeholder="Name" value="{{old('name')}}" required>
                        <input type="text" name="email" placeholder="Email" value="{{old('email')}}" required>
                        <input type="password" name="password" placeholder="Password" value="{{old('password')}}" required>
                        <br>
                        <p>Roles</p>
                        @foreach ($roles as $rol)
                            <label><input type="checkbox" name="roles[]" value="{{$rol->name}}">{{$rol->name}}</label><br>
                        @endforeach
                        <p>Permissions</p>
                        @foreach ($permissions as $permission)
                            <label><input type="checkbox" name="permissions[]" value="{{$permission->name}}">{{$permission->name}}</label><br>
                        @endforeach
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
