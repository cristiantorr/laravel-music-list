@extends('layouts.app')
@section('title', 'Home listas')
@section('content')
<div class="container">
  {{-- <div class="row">
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">
      <form class="form-control" action="" method="post" placeholder="Buscar listas"></form>
      <input type="submit" name="" value="Buscar">
    </div>
  </div> --}}
  <div class="row">
    {{-- <a href="{{ route('musiclist.showcreate') }}">crear canciones</a> --}}
  </div>
  <section>

    @if (isset($listSongs) && $listSongs->songs->count() != 0)
      <h2>CANCIONES de la lista: {{$listSongs->name}}<br /><small>Autor Lista:</small></h2>
      <a href="{{ route('songs.showcreate', $listSongs->id) }}">Crear canción</a>

        @foreach ($listSongs->songs as $song)
          <article class="row align-items-center">
            <div class="col-4">
              <h4>{{$song->name}}<br />
                <small>Autor {{$song->artist}}</small>
              </h4>
            </div>
            <div class="col-6">
              <a href="{{$song->youtube_url}}" target="_blank">{{$song->youtube_url}}</a>
            </div>
            <div class="col-1">
              <a href="{{ route('songs.showedit',$song->id) }}">editar</a>
            </div>
            <div class="col-1">
              <a href="{{ route('songs.delete',$song->id) }}">Eliminar</a>
            </div>
          </article>
        @endforeach
      @else
        <p>Esta lista no tiene canciones, quieres crear una canción   <a href="{{ route('songs.showcreate', $listSongs->id) }}">Crear canción</a></p>
      @endif
  </section>
  <section class="comments">
    comentarios
  </section>
</div>

@endsection
@section('scripts')
  <script>
      jQuery(document).ready(function(){
        alert(0);
      })
  </script>
@endsection
