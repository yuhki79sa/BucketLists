<x-app-layout>
    <form action = "/post" method = "POST">
        @csrf
        <input type = "text" name = "todo" placeholder = "やりたいことを記入してください">
        <input type = "submit" value = "追加">
    </form>
    @foreach( $posts as $post )
        <div>{{ $post->todo }}</div>
        <form action = {{ route('done', ['post' => $post->id]) }} method = "POST">
            @csrf
            @method('PATCH')
            <input type = "submit" value = "達成">
        </form>
    @endforeach
</x-app-layout>