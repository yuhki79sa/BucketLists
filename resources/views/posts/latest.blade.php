<x-app-layout>
    @foreach( $posts as $post)
    <div class="py-4 border-b border-gray-300 flex justify-center">
        <div>{{ $posts->firstItem() + $loop->index }}.{{ $post->todo }}</div>
        <div class="flex items-center space-x-2">
            @if( $post->likes->where('user_id', $user_id)->isEmpty() )
            <i class="fa-regular fa-thumbs-up like-button" id="{{$post->id}}"></i>
            @else
            <i class="fa-regular fa-thumbs-up like-button liked" id="{{$post->id}}"></i>
            @endif
            <p>{{$post->likes->count()}}</p>
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</x-app-layout>