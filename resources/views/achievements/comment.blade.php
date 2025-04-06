<x-app-layout>
    @if(!empty($post))
    <div>{{ $post->todo }}</div>
    <form action = "/achievement/{{ $post->id }}/save" method = "POST">
        @csrf
            <div>
                <input type = "text" placeholder = "感想を入力してください" name = "body">
                @error('body')
                    <p style = "color: red">{{ $message }}</p>
                @enderror
            </div>
            <div>
            <input type = "text" placeholder = "URLを入力してください" name = "URL">
                @error('URL')
                    <p style = "color: red">{{ $message }}</p>
                @enderror
            </div>
        <input type = "submit" value = "保存">
    </form>
    @else
    <div>達成したものは現在存在していません</div>
    <a href = "/bucketlist">やりたいことリストに戻る</a>
    @endif
</x-app-layout>