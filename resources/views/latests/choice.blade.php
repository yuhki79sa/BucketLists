<x-app-layout>
    <form action = "/post/{{ $post->id }}/evaluate/save" method = "POST">
        @csrf
        <select name = "choiceCategory_id">
            <option value="" disabled @if($alreadySelected == null) selected @endif>選択してください</option>
            @foreach($choiceCategories as $choiceCategory)
            <option value = "{{ $choiceCategory->id }}" @if($alreadySelected == $choiceCategory->id) selected @endif>{{ $choiceCategory->name }}</option>
            @endforeach
        </select>
        <input type = "submit" value = "送信">
    </form>
</x-app-layout>