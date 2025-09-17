@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center">
                Dashboard admin
            </h1>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body text-center">
                    Gestión de usuarios
                </div>
            
                <div class="card-footer">
                    <a href="{{route('admin.user.index')}}" class="btn btn-dark w-100">Usuarios</a>
                </div>
        </div>
            
        </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body text-center">
                        Gestión de categorías
                        </div>
                    <div class="card-footer">
                <a href="{{route('admin.category.index')}}" class="btn btn-dark w-100">Categorías</a>
                </div>
        </div>
        </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body text-center">
                        Gestión de Blog
                        </div>
                    <div class="card-footer">
                <a href="{{route('admin.post.index')}}" class="btn btn-dark w-100">Posts</a>
                </div>
        </div>
            
        </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body text-center">
                        Gestión de Perfil Corporativo
                        </div>
                    <div class="card-footer">
                <a href="{{route('admin.profile.edit',1)}}" class="btn btn-dark w-100">Perfil</a>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
