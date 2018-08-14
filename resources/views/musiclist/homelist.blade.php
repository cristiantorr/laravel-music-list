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
    <a href="{{ route('musiclist.showcreate') }}">Creal listas</a>
  </div>
  <section>
      @if (isset($show_lists))
        @foreach ($show_lists as $show_list)
          {{-- @dd($show_list) --}}
          <article class="row align-items-center">
            <div class="col-2">
              <figure class="m-0">
                <img src="{{Storage::url('musiclist/'.$show_list->photo)}}" alt="figure" class="rounded" width="100%" height="100" style="object-fit: contain;">
              </figure>
            </div>
            <div class="col-4 title">
              <h2>{{$show_list->name}}</h2>
              <p>Nombre autor</p>
            </div>
            <div class="col-4 likes-comments">
              <p class="mr-2 d-inline-block"><span class=""><a href="{{ route('musiclist.like',$show_list->id) }}">likes</a>({{$show_list->likes_count}})</span></p>
              <p class="ml-2 d-inline-block"><span class=""><a href="{{ route('musiclist.comment',$show_list->id) }}">comentarios</a>({{$show_list->comments_count}})</span></p>
              <p class="ml-2 d-inline-block"><span class=""><a href="{{ route('songs.home',$show_list->id) }}">canciones</a>({{$show_list->songs_count}})</span></p>
            </div>
            <div class="col-2 edit-delete">
              <a href="{{ route('musiclist.showedit',$show_list->id) }}">Editar</a>
              <a href="{{ route('musiclist.delete',$show_list->id) }}">Eliminar</a>
            </div>
          </article>
        @endforeach
        {{ $show_lists->links() }}
      @endif
  </section>

</div>

@endsection
