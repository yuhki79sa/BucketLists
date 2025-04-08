<x-app-layout>
    <div class = "px-4">
        <div class = "p-2 px-2 mb-2">
        <form action = "/popular" method = "GET">
            <input required type = "text" name = 'keyword' placeholder = '検索内容を記入してください' value = {{ request('keyword') }} >
            <button type = "submit">検索</button>
        </form>
        </div>
        @foreach( $posts as $post)
        <div class="bg-white rounded-lg border border-gray-200 mb-6 shadow-sm p-4 flex justify-center">
            <div>
                <div class ="text-lg font-semibold">{{ $posts->firstItem() + $loop->index }}.{{ $post->todo }}</div>
                <div class="flex items-center space-x-2">
                    <a href = "/latest/{{ $post->id }}/show" class="bg-gray-500 text-white px-3 py-1 rounded">詳細</a>
                    <a href = "/post/{{ $post->id }}/evaluate" class=" text-white px-3 py-1 rounded" style="background-color: #2563eb;">評価する</a>
                </div>
                <div class="flex items-center space-x-2">
                    @if( $post->likes->where('user_id', $user_id)->isEmpty() )
                    <i class="fa-regular fa-thumbs-up like-button" id="{{$post->id}}"></i>
                    @else
                    <i class="fa-regular fa-thumbs-up like-button liked" id="{{$post->id}}"></i>
                    @endif
                    <p>{{$post->likes->count()}}</p>
                </div>
            </div>
            <div class = "px-6 flex py-6 space-x-2">
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
    </div>
</x-app-layout>