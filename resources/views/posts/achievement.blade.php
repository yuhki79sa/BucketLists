<x-app-layout>
    @foreach( $posts as $post )
        <div>{{ $post->todo }}</div>
    @endforeach
</x-app-layout>