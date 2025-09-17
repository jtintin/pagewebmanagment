@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('admin.profile.update',$profile)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <p>Actualizar profile</p>
                        <div class="btn-group">
                            <a href="{{route('admin.dashboard')}}" class="btn btn-danger">X</a>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                    <div class="car-body">
                        @include('partials.message')
                        <div class="mb-3">
                        <label for="name">Nombre de la empresa:</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$profile->name}}" required maxlength="190">
                        </div>
                        <div class="mb-3">
                        <label for="slogan">Slogan:</label>
                        <input type="textarea" class="form-control" name="slogan" placeholder="Slogan" value="{{$profile->slogan}}" required>{{$profile->title}}</textarea>
                        </div>
                        <div class="mb-3">
                        <label for="description">description:</label>
                        <input type="text" class="form-control" name="description" placeholder="Descripción" value="{{$profile->description}}" required maxlength="160"> 
                        </div>
                        <div class="mb-3">
                        <label for="logo">Logo[máx 2MB]:</label>
                        @if ($profile->logo)
                            <br>
                            <img src="{{$profile->logo}}" alt="{{$profile->title}}" class="img-fluid mb-2">
                            <br>
                        @endif
                        <input type="file" class="form-control" name="logo"> 
                        </div>
                     
                        <div class="mb-3">
                        <label for="address">Dirección:</label>
                        <input type="text" class="form-control" name="address" placeholder="Dirección" value="{{$profile->address}}" 
                         maxlength="100">
                        </div>
                        
                        <div class="mb-3">
                        <label for="phone">Teléfono:</label>
                        <input type="tel" class="form-control" name="phone" placeholder="Teléfono" value="{{$profile->phone}}" 
                         maxlength="30">
                        </div>

                        <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$profile->email}}" 
                        maxlength="100">
                        </div>

                        <div class="mb-3">
                        <label for="website">Sitio Web:</label>
                        <input type="url" class="form-control" name="website" placeholder="website" value="{{$profile->website}}" 
                         maxlength="190">
                        </div>

                        <div class="mb-3">
                        <label for="facebook">Facebook:</label>
                        <input type="url" class="form-control" name="facebook" placeholder="Facebook" value="{{$profile->facebook}}" 
                         maxlength="190">
                        </div>

                        <div class="mb-3">
                        <label for="instagram">Instagram:</label>
                        <input type="url" class="form-control" name="instagram" placeholder="instagram" value="{{$profile->instagram}}" 
                         maxlength="190">
                        </div>

                        <div class="mb-3">
                        <label for="linkedin">LinkedIn:</label>
                        <input type="url" class="form-control" name="linkedin" placeholder="linkedin" value="{{$profile->linkedin}}" 
                         maxlength="190">
                        </div>

                        <div class="mb-3">
                        <label for="twitter">Twitter:</label>
                        <input type="url" class="form-control" name="twitter" placeholder="twitter" value="{{$profile->twitter}}" 
                         maxlength="190">
                        </div>

                        <div class="mb-3">
                        <label for="mission">Misión:</label>
                        <textarea class="form-control" name="mission"> {{$profile->mission}} </textarea>
                        </div>

                        <div class="mb-3">
                        <label for="|">Visión:</label>
                        <textarea class="form-control" name="vision"> {{$profile->vision}} </textarea>
                        </div>

                        <div class="mb-3">
                        <label for="video_url">Video URL:</label>
                        <input type="url" class="form-control" name="video_url"  value="{{$profile->video_url}}" 
                        required maxlength="190">
                        </div>

                        <div class="mb-3">
                        <label for="map_embed">Mapa:</label>
                        <textarea class="form-control" name="map_embed"> {{$profile->map_embed}} </textarea>
                        </div>

                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
