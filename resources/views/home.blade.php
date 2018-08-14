@extends('layouts.app')
@section('title', 'Home listas')
@section('content')
<h2 class="text-center">APLICACIÓN MÚSICA REFERENCIA SPOTIFY</h2>
<div class="container">
  <div class="row">
    <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-xl-6">
      <fieldset>
        <legend>Top 5 -listas</legend>
        <div class="list-top">
          @if (isset($lists_top))
            <ol>
              @foreach ($lists_top as $list_top)
                <li>{{ $list_top->name }}</li>
              @endforeach
            </ol>
          @endif
        </div>
      </fieldset>
    </div>
    <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-xl-6">
      <fieldset>
        <legend>Top 5 -listas más recomendadas</legend>
        <div class="list-recommended">
          @if (@isset($lists_recommended))
            <ol>
                @foreach ($lists_recommended as $list_recommended)
                  <li>{{ $list_recommended->name }}</li>
                @endforeach
            </ol>
          @endisset
        </div>
      </fieldset>
    </div>
  </div>
  <div class="row">
    <div class="col-12  col-xs-12 col-sm-12 col-md-12 col-xl-12">
      <fieldset>
        <legend>Listas aleatorias</legend>
        <div class="list-random">
          @if (isset($lists_random))
            <ol>
              @foreach ($lists_random as $list_random)
                <li>{{ $list_random->name }}</li>
              @endforeach
            </ol>
          @endif
        </div>
      </fieldset>
    </div>
  </div>
</div>

@endsection
