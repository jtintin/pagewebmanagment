
@extends('layouts.admin')

@section('content')
@include('partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Posts</p>
                    <div class="class btn-group">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-danger">X</a>
                        <a href="{{route('admin.post.create')}}" class="btn btn-dark">Nuevo Post</a>
                    </div>
                </div>
                <div class="car-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                            <td>{{$post->title}}</td>
                            <td>
                                <a href="{{route('admin.post.edit', $post)}}" class="btn btn-dark">Editar</a>
                                <form action="{{route('admin.post.destroy',$post)}}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Eliminar registro?')" class="btn btn-dark">Eliminar</button>
                                </form>
                            </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
