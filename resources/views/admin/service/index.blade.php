
@extends('layouts.admin')

@section('content')
@include('partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Servicios</p>
                    <div class="class btn-group">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-danger">X</a>
                        <a href="{{route('admin.service.create')}}" class="btn btn-dark">Nuevo servicio</a>
                    </div>
                </div>
                <div class="car-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                            <td>{{$service->title}}</td>
                            <td>
                                <a href="{{route('admin.service.edit', $service)}}" class="btn btn-dark">Editar</a>
                                <form action="{{route('admin.service.destroy',$service)}}" method="POST" style="display:inline">
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
