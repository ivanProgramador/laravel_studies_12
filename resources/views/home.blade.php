@extends('layouts.main_layout');
@section('content')

{{-- Eu opreiso fazer referencia a classe port aqui também --}}
  @can('create',App\Model\Post::class)

         <div class="container my-3">
             <div class="row">
                 <div class="col">
                     <a href="{{ route('post_create') }}" class="btn btn-primary">Criar post</a>
                 </div>
             </div>
         </div>
 @endcan



         @if($posts->count()==0){
            <div class="my-5 opacity-50">
               Sem posts para mostrar
            </div>
         }
         @else
            <div class="container">
               <div class="row">
                  <div class="col">
                        @foreach($posts as $post)
                           @can('view',$post) 
                             <x-post-component :post="$post"/>
                           @endcan
                        @endforeach   
                  </div>
               </div>
       </div>
         @endif
@endsection