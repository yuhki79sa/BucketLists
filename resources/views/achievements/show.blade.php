<x-app-layout>
   
    @if($comments->count() > 0)
    <div>達成内容</div>
    <div>{{ $post->todo }}</div>
    @foreach( $comments as $comment)
    <div>感想</div>
    <div>{{ $comment->body }}</div>
    <div>関連記事のURL</div>
    <div>{{ $comment->URL }}</div>
    @endforeach
    @else
    <div>感想、関連URLが存在しません。</div>
    @endif
    <a href = "/achievement" style = "color: blue">達成リストに戻る</a>
</x-app-layout>