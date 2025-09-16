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
            <form action="{{route('admin.service.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Crear Servicio</p>
                        <div class="btn-group">
                            <a href="{{route('admin.service.index')}}" class="btn btn-danger">X</a>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <div class="car-body">
                        <!-- Category selection removed: category is already selected by context/session -->
                        @include('partials.message')
                        <div class="mb-3">
                        <label for="title">Titulo:</label>
                        <input type="text" class="form-control" name="title" placeholder="Name" value="{{old('title')}}" required maxlength="30">
                        </div>
                        <div class="mb-3">
                        <label for="description">Descripción:</label>
                        <input type="textarea" class="form-control" name="description" placeholder="Descripción" value="{{old('description')}}" required></textarea>
                        </div>

                        <div class="mb-3">
                        <label for="price">Precio:</label>
                        <input type="text" class="form-control" name="price" placeholder="Precio" value="{{old('price')}}" required maxlength="160"> 
                        </div>
                        <div class="mb-3">
                        <label for="image_url">Imagen:</label>
                        <input type="file" class="form-control" name="image_url"> 
                        </div>
                     
                        <div class="mb-3">
                        <label for="meta_title">meta_title:</label>
                        <input type="text" class="form-control" name="meta_title" placeholder="Título" value="{{old('meta_title')}}" required maxlength="70">
                        </div>
                        <div class="mb-3">
                        <label for="meta_description">meta_description:</label>
                        <input type="text" class="form-control" name="meta_description" placeholder="Meta Descripción" value="{{old('meta_description')}}" required maxlength="160"> 
                        </div>
                        <br>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
