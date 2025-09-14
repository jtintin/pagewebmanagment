
@extends('layouts.admin')

@section('content')
@include('partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Categorías</p>
                <div class="class btn-group">
                    <a href="{{route('admin.dashboard')}}" class="btn btn-danger">X</a>
                    <a href="{{route('admin.category.create')}}" class="btn btn-dark">Nueva categoría</a>
                </div>
                </div>
                <div class="car-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('admin.category.edit', $category)}}">Editar</a>
                                <form action="{{route('admin.category.destroy',$category)}}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Eliminar registro?')">Eliminar</button>
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
