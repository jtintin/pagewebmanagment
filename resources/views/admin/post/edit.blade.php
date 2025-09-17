@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.post.update',$post)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Actualizar post</p>
                        <div class="btn-group">
                            <a href="{{route('admin.post.index')}}" class="btn btn-danger">X</a>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                    <div class="car-body">
                        @include('partials.message')
                        <div class="mb-3">
                        <label for="title">Titulo:</label>
                        <input type="text" class="form-control" name="title" placeholder="Name" value="{{$post->title}}" required maxlength="190">
                        </div>
                        <div class="mb-3">
                        <label for="content">Contenido:</label>
                        <input type="textarea" class="form-control" name="content" placeholder="Descripción" value="{{$post->content}}" required>{{$post->title}}</textarea>
                        </div>

                        <div class="mb-3">
                        <label for="category_id">Categoría:</label>
                            <select name="category_id" id="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" 
                                    {{$post->category_id == $category->id ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>        
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                        <label for="image_url">Imagen:</label>
                        @if ($post->image_url)
                            <br>
                            <img src="{{$post->image_url}}" alt="{{$post->title}}" class="img-fluid">
                            <br>
                        @endif
                        <input type="file" class="form-control" name="image_url"> 
                        </div>
                     
                        <div class="mb-3">
                        <label for="meta_title">meta_title:</label>
                        <input type="text" class="form-control" name="meta_title" placeholder="Título" value="{{$post->meta_title}}" required maxlength="70">
                        </div>
                        
                        <div class="mb-3">
                        <label for="meta_description">meta_description:</label>
                        <input type="text" class="form-control" name="meta_description" placeholder="Meta Descripción" value="{{$post->meta_description}}" required maxlength="160"> 
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
