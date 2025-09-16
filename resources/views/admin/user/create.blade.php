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
                    <p>Crear usuario</p>
                    <div class="btn-group">
                            <a href="{{route('admin.user.index')}}" class="btn btn-danger">X</a>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                    </div>
                    <div class="car-body">
                        @include('partials.message')    
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control"  name="name" placeholder="Name" value="{{old('name')}}" required>
                        <label for="email">Email:</label>
                        <input type="text" class="form-control"  name="email" placeholder="Email" value="{{old('email')}}" required>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control"  name="password" placeholder="Password" value="{{old('password')}}" required>
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
