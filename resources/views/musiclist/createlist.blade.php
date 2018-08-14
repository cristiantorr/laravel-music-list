@extends('layouts.app')
@section('title', 'Home listas')
@section('content')
<div class="container">
  <h1>Crear listas</h1>
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
    <form action="{{ route('musiclist.create' )}}" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label for="file"></label>
        <input type="file" name="picture" accept="image/*">
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
@endsection
