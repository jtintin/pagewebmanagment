@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.category.update',$category)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Actualizar categoría</p>
                        <div class="btn-group">
                            <a href="{{route('admin.category.index')}}" class="btn btn-danger">X</a>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                    <div class="car-body">
                        @include('partials.message')
                     <div class="car-body">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name"  value="{{old('name',$category->name)}}" required maxlength="30">
                        <label for="description">Descripción:</label>
                        <input type="textarea" class="form-control" name="description"  value="{{old('description',$category->description)}}" required></textarea>
                        <label for="meta_title">meta_title:</label>
                        <input type="text" class="form-control" name="meta_title"  value="{{old('meta_title',$category->meta_title)}}" required maxlength="70">
                        <label for="meta_description">meta_description:</label>
                        <input type="text" class="form-control" name="meta_description" value="{{old('meta_description',$category->meta_description)}}" required maxlength="160"> 
                        <br>
                    </div>

                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
