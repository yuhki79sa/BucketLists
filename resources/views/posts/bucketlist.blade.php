<x-app-layout>
    <div class = "px-4">
        <div class = "p-2 px-2 mb-2">
        <form action = "/post" method = "POST">
            @csrf
            <input type = "text" name = "todo" placeholder = "やりたいことを記入してください" required>
            <input type = "submit" value = "追加">
        </form>
        </div>
        @foreach( $posts as $post )
            <div class="bg-white rounded-lg border border-gray-200 mb-6 shadow-sm p-6 flex justify-center">
                <div class ="text-lg font-semibold">{{ $posts->firstItem() + $loop->index }}.{{ $post->todo }}</div>
                    <form action = {{ route('done', ['post' => $post->id]) }} method = "POST">
                        @csrf
                        @method('PATCH')
                        <input type = "submit" value = "達成" class="ml-4 bg-gray-500 text-white px-3 py-1 rounded" style="background-color: #2563eb;">
                    </form>
                    <form action = "/bucketlist/{{ $post->id }}/destroy" method = "POST">
                            @csrf
                            @method('delete')
                    <button type = "submit" class="text-white px-3 py-1 rounded ml-4" style="background-color: #dc2626;">削除</button>
                    </form>
            </div>
        @endforeach
    
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>