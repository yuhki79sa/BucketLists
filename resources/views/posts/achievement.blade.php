<x-app-layout>
    @foreach( $posts as $post )
    <div class="py-4 border-b border-gray-300 flex justify-center">
        <div>{{ $posts->firstItem() + $loop->index }}.{{ $post->todo }}</div>
        <a href = "/achievement/{{ $post->id }}/comment">感想</a>
        <a href = "/achievement/{{ $post->id}}/show">詳細</a>
    </div>
    @endforeach
    {{ $posts->links() }}
</x-app-layout>