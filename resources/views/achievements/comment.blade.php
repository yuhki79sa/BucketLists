<x-app-layout>
    @if(!empty($post))
    <div>{{ $post->todo }}</div>
    <form action = "/achievement/{{ $post->id }}/save" method = "POST">
        @csrf
        <input type = "text" placeholder = "感想を入力してください" name = "body">
        <input type = "text" placeholder = "URLを入力してください" name = "URL">
        <input type = "submit" value = "保存">
    </form>
    @else
    <div>達成したものは現在存在していません</div>
    <a href = "/bucketlist">やりたいことリストに戻る</a>
    @endif
</x-app-layout>