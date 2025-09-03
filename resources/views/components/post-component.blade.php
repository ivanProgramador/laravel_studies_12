<div class="card bg-dark p-3 mt-3">
    <div class="d-flex justify-content-between">
        <div class="text-info">
            Author:{{$post->user->name}}
        </div>
        <div class="text-end text-light">
            {{ $post->created_at }}
        </div>
     </div>
     <div class="mt-3">
        <h4>{{ $post->title  }}</h4>
        <h4>{{ $post->cotent }}</h4>
     </div>

     <div class="d-flex justify-content-end gap-5">
         @can('update',$post)
           <a href="{{ route('post_update',['id'=>$post->id])}}" class="btn btn-primary">Edit post</a>
         @endcan

         @can('delete',$post)
           <a href="{{ route('post_delete',['id'=>$post->id])}}" class="btn btn-danger">Delete post</a>
         @endcan
     </div>

</div>