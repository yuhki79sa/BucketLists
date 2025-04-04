<x-app-layout>
    <form action = "/post/{{ $post->id }}/evaluate/save" method = "POST">
        @csrf
        <select name = "choiceCategory_id">
            @foreach($choiceCategories as $choiceCategory)
            <option value = {{ $choiceCategory->id }}>{{ $choiceCategory->name }}</option>
            @endforeach
        </select>
        <input type = "submit" value = "送信">
    </form>
</x-app-layout>