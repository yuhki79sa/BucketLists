<x-app-layout>

    @if($comments->count() > 0)
    <div class="text-2xl font-bold text-gray-800 mb-6">達成内容</div>
    <div class="bg-green-100 p-5 rounded-xl shadow mb-10 text-lg font-semibold text-gray-700">{{ $post->todo }}</div>

    @foreach($comments as $comment)
    <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-6 mb-6 space-y-4">
        <div>
            @if(empty($comment->body))
            <div class="text-xl font-bold text-gray-700 mb-1">感想</div>
            <div class="text-gray-800">投稿者の感想は存在しません</div>
            @else
            <div class="text-xl font-bold text-gray-700 mb-1">感想</div>
            <div class="text-gray-800">{{ $comment->body }}</div>
            @endif
        </div>
        <div>
            @if(empty($comment->URL))
            <div class="text-xl font-bold text-gray-700 mb-1">関連記事のURL</div>
            <div class="text-blue-600 underline break-words">関連記事のURLは存在しません</div>
            @else
            <div class="text-xl font-bold text-gray-700 mb-1">関連記事のURL</div>
            <div class="text-blue-600 underline break-words">{{ $comment->URL }}</div>
            @endif
        </div>
    </div>
    @endforeach

    @else
    <div class="bg-yellow-100 text-gray-700 p-6 rounded-xl shadow-md text-lg">投稿者の感想、関連URLが存在しません。</div>
    @endif

    <a href="/latest" class="text-blue-600 underline mt-10 inline-block hover:text-blue-800 transition text-lg">BucketListsに戻る</a>
</x-app-layout>