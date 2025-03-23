<x-app-layout>
    <form action = "/post" method = "POST">
        @csrf
        <input type = "text" name = "todo" placeholder = "やりたいことを記入してください">
        <input type = "submit" value = "追加">
    </form>
    @foreach( $posts as $post )
        <div class="py-4 border-b border-gray-300 flex justify-center">
            <div>{{ $posts->firstItem() + $loop->index }}.{{ $post->todo }}</div>
                <form action = {{ route('done', ['post' => $post->id]) }} method = "POST">
                    @csrf
                    @method('PATCH')
                    <input type = "submit" value = "達成" class="ml-4">
                </form>
        </div>
    @endforeach

    <div>
        {{ $posts->links() }}
    </div>
</x-app-layout>