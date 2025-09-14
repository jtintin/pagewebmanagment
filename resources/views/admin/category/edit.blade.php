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
                    <a href="{{route('admin.category.index')}}">X</a>
                    <button type="submit">Actualizar</button>
                    </div>
                    <div class="car-body">
                        @include('partials.message')
                     <div class="car-body">
                        <input type="text" name="name"  value="{{old('name',$category->name)}}" required maxlength="30">
                        <input type="textarea" name="description"  value="{{old('description',$category->description)}}" required></textarea>
                        <input type="text" name="meta_title"  value="{{old('meta_title',$category->meta_title)}}" required maxlength="70">
                        <input type="text" name="meta_description" value="{{old('meta_description',$category->meta_description)}}" required maxlength="160"> 
                        <br>
                    </div>

                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
