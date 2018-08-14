@extends('layouts.app')
@section('title', 'Home listas')
@section('content')
<div class="container">
  <h1>Crear canción</h1>
  @if (session('errors'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <div class="row">
    <form action="{{ route('songs.create',$musiList_id)}}" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Nombre canción</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Nombre de la canción">
      </div>
      <div class="form-group">
        <label for="artist">Artista</label>
        <input type="text" class="form-control" id="artist" aria-describedby="artist" name="artist" placeholder="Artista">
      </div>
      <div class="form-group">
        <label for="youtube">Url youtube</label>
        <input type="text" class="form-control" id="youtube" aria-describedby="youtube" name="youtube" placeholder="url youtube">
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
@endsection
