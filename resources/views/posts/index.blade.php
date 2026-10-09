<x-layout>

    <div class=" mt-30">
        <h1 class="text-center text-2xl mb-10">Posts</h1>
        <div class="posts flex flex-row">
            <div class="post-display basis-2/3">
                @foreach($posts as $post)
                    <x-card>
                        <div class="text-center">
                            <h2 class="text-lg">{{ $post->title }}</h2>
                            <p class="text-sm text-gray-200">by {{  $post->author }}</p>
                            <p class="text-xs">Updated: {{  $post->updated_at }}</p>
                            <p class="text-xs">Category: {{ str_replace('_', ' ', ucfirst($post->category)) }}</p>
                        </div>
                        <p class="mt-10 mb-10">{{ $post->truncate($post->content) }}</p>
                        <a class="text-sm text-gray-200" href="{{ route('posts.show', $post) }}">View blog</a>
                    </x-card>
                @endforeach
            </div>
            <div class="post-filters basis-1/3">
                <form method="GET" x-ref="filters" id="filtering-form" action="{{ route('posts.index', ['category' => $post->category]) }}">
                    <div>
                        <div class="mb-1 font-semibold">Category</div>
                        <x-radio-group name="category" :options="\App\Models\Post::$categories" :postsCount="\App\Models\Post::getPostsCount()"/>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layout>
