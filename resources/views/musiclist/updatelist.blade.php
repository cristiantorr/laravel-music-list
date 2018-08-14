@extends('layouts.app')
@section('title', 'Home listas')
@section('content')
<div class="container">
  <h1>Actualizar listas</h1>
  <div class="row">
    @if (isset($musiclistUpdate))
      {{-- @dd($musiclistUpdate['id']) --}}
      <form action="{{ route('musiclist.update', $musiclistUpdate['id']) }}" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Nombre" value="{{$musiclistUpdate['name']}}">
        </div>
        <div class="form-group">
          <label for="file"></label>
          <figure>
            <img src="{{Storage::url('musiclist/'.$musiclistUpdate['photo'])}}" alt="" class="rounded" width="100%" height="100" style="object-fit: contain;">
          </figure>
          <input type="file" name="picture" accept="image/*" value="jj">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
    @endif
  </div>
</div>
@endsection
