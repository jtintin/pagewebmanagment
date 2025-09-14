@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            Dashboard admin
        </div>
        <div class="col-sm-3">
            <a href="{{route('admin.user.index')}}">Usuarios</a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('admin.category.index')}}">Categorías</a>
        </div>
    </div>
</div>
@endsection
