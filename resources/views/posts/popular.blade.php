<x-app-layout>
    <form action = "/popular" method = "GET">
        <input required type = "text" name = 'keyword' placeholder = '検索内容を記入してください' value = {{ request('keyword') }} >
        <button type = "submit">検索</button>
    </form>
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
            <a href = "/latest/{{ $post->id }}/show">詳細</a>
            <a href = "/post/{{ $post->id }}/evaluate">評価する</a>
        </div>
        <div>
            @if( $post->choices->isEmpty() )
            <div>やってみたい0%</div>
            <div>やってみたくない0%</div>
            <div>やった0%</div>
            <div>特になし0%</div>
            @else
            <div>やってみたい{{ round($post->choices->where('choiceCategory_id', 1)->count() / $post->choices->count(), 2)*100}}%</div>
            <div>やってみたくない{{ round($post->choices->where('choiceCategory_id', 2)->count() / $post->choices->count(), 2)*100}}%</div>
            <div>やった{{ round($post->choices->where('choiceCategory_id', 3)->count() / $post->choices->count(), 2)*100}}%</div>
            <div>特になし{{ round($post->choices->where('choiceCategory_id', 4)->count() / $post->choices->count(), 2)*100}}%</div>
            @endif
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</x-app-layout>