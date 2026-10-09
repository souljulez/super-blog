<x-layout>
    <div class="mt-10 w-150 bg-gray-400 p-5 rounded-lg mx-auto justify-center">
        <div class="text-center">
            <h1>{{ $post->title }}</h1>
            <p>by {{ $post->author }}</p>
            <p>updated {{ $post->updated_at }}</p>
            <p>Category: {{ $post->category }}</p>
        </div>
        <div class="mt-10">
            <p>{{ $post->content }}</p>
        </div>
    </div>

</x-layout>
