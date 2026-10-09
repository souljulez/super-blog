<x-layout>
    <div class="posts">
        <p class="text-center">Latest Posts</p>
        <div class="posts flex flex-row justify-center mx-auto">
            @foreach($posts as $post)
                <x-preview-card :post>
                    <div class="text-center">
                        <h2 class="text-lg">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-200">by {{  $post->author }}</p>
                    </div>
                    <p class="mt-10 mb-10">{{ $post->truncate($post->content) }}</p>
                    <a class="text-sm text-gray-200" href="{{ route('posts.show', $post) }}">View blog</a>
                </x-preview-card>
            @endforeach
        </div>

    </div>
</x-layout>


