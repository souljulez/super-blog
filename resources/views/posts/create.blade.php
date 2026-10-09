<x-layout>
    <h1 class="text-center mb-4">Create Post</h1>
    <div class="create mx-auto flex flex-row justify-center">
        <form method="POST" action="{{  route('posts.store') }}" class="w-150 rounded-lg border-gray-300 bg-gray-400 p-5">
            @csrf
            <div class="mt-5">
                <label for="title">Title:</label>
                <input type="text" name="title" value="" class="input bg-gray-100 rounded-lg ml-3 text-black p-1" />
            </div>
            <div class="mt-5">
                <label for="author">Author:</label>
                <input type="text" name="author" value="" class="input bg-gray-100 rounded-lg ml-3 text-black p-1"/>
            </div>
            <div class="mt-5">
                <label for="category">Category:</label>
                <select type="text" name="category" value="">
                    <option value=""> Select category </option>
                @foreach($categories as $category)
                    <option value="{{ $category }}">{{ ucfirst($category) }}</option>
                @endforeach
                </select>
            </div>
            <div class="mt-10">
                <label for="content">Body:</label>
                <textarea type="text" name="content" value="" rows="10" class="input w-full bg-gray-100 rounded-lg mt-2 text-black p-1"></textarea>
            </div>
            <button type="submit" class="bg-gray-800 rounded-lg p-2">Create Blog</button>
        </form>
    </div>
</x-layout>
