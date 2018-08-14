@extends('layouts.app')
@section('title', 'Editar canciones')
@section('content')
<div class="container">
  <h1>Actualizar cancion</h1>
  <div class="row">
    @if (isset($editSong))
      {{-- @dd($musiclistUpdate['id']) --}}
      <form action="{{ route('songs.update', $editSong['id']) }}" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Nombre canción</label>
          <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Nombre de la canción" value="{{$editSong['name']}}">
        </div>
        <div class="form-group">
          <label for="artist">Artista</label>
          <input type="text" class="form-control" id="artist" aria-describedby="artist" name="artist" placeholder="Artista" value="{{$editSong['artist']}}">
        </div>
        <div class="form-group">
          <label for="youtube">Url youtube</label>
          <input type="text" class="form-control" id="youtube" aria-describedby="youtube" name="youtube" placeholder="url youtube" value="{{$editSong['youtube_url']}}">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
    @endif
  </div>
</div>
@endsection
