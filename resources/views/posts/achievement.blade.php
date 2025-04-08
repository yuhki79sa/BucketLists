<x-app-layout>
    @if($posts->isEmpty())
    <div>達成したものが見つかりません。</div>
    <a href = "/bucketlist" style = "color: blue">やりたいことリストに戻る</a>
    @endif
    <div class = "p-2">
    @foreach( $posts as $post )
            <div class="bg-white rounded-lg border border-gray-200 mb-6 shadow-sm p-6 flex justify-center space-x-2">
                <div class ="text-lg font-semibold">{{ $posts->firstItem() + $loop->index }}.{{ $post->todo }}</div>
                <a href = "/achievement/{{ $post->id }}/comment" class="text-white px-3 py-1 rounded" style="background-color: #2563eb;">感想</a>
                <a href = "/achievement/{{ $post->id}}/show" class="bg-gray-500 text-white px-3 py-1 rounded">詳細</a>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
</x-app-layout>