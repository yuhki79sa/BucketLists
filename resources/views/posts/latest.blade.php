<x-app-layout>
    <form action = "/post" method = "POST">
        @csrf
        <input type = "text" name = "todo" placeholder = "やりたいことを記入してください">
        <input type = "submit" value = "追加">
    </form>
    @foreach( $posts as $post)
        <div>{{ $post->todo }}</div>
    @endforeach
</x-app-layout>