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
            <form action="{{route('admin.category.store')}}" method="post">
                @csrf
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Crear Categoría</p>
                    <a href="{{route('admin.category.index')}}">X</a>
                    <button type="submit">Guardar</button>
                    </div>
                    <div class="car-body">
                        @include('partials.message')
                        <input type="text" name="name" placeholder="Name" value="{{old('name')}}" required maxlength="30">
                        <input type="textarea" name="description" placeholder="Descripción" value="{{old('description')}}" required></textarea>
                        <input type="text" name="meta_title" placeholder="Título" value="{{old('meta_title')}}" required maxlength="70">
                        <input type="text" name="meta_description" placeholder="Meta Descripción" value="{{old('meta_description')}}" required maxlength="160"> 
                        <br>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
