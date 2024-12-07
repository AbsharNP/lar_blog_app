<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')  <!-- Method to update the resource -->

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">
                    {{ __('Title') }}
                </label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="border-gray-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm w-full">
            </div>
            
            <!-- Image Input (optional) -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">
                    {{ __('Upload Image (optional)') }}
                </label>
                <input type="file" name="image" id="image" class="border-gray-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm w-full">
                @if($post->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="w-32 h-auto">
                    </div>
                @endif
            </div>
        
            <!-- Description Input -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">
                    {{ __('Description') }}
                </label>
                <textarea name="description" id="description" rows="4" class="border-gray-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm w-full">{{ $post->content }}</textarea>
            </div>
        
            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Update Post') }}
                </button>
            </div>
        </form>
    </div>
    <script>
        // Initialize TinyMCE
        tinymce.init({
    selector: '#description',
    plugins: 'advlist autolink link lists charmap preview anchor code fullscreen insertdatetime media table emoticons',
    toolbar: 'undo redo | styleselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | charmap emoticons | preview fullscreen code',
    height: 400,
    menubar: true,
    branding: false,
    content_style: "body { font-family:Arial, sans-serif; font-size:14px }",
    
    // Preserve emojis and text formatting correctly
    entity_encoding: 'raw',  // Ensure emojis and characters are not encoded
    extended_valid_elements: 'span[style|class],strong,b,u,i,img[src|alt|width|height],br', // Allow certain tags

    // Add some advanced options to handle more complex cases like emojis
    setup: function(editor) {
        console.log('TinyMCE initialized!');
    }
});
    </script>
</x-app-layout>
