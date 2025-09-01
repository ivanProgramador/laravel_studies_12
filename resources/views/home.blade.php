@extends('layouts.main_layout');
@section('content')
  @if($posts->count()==0){
     <div class="my-5 opacity-50">
        Sem posts para mostrar
     </div>
  }
  @else
  {{-- em construção --}}
@endsection