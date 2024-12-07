<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @else
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                {{ __('Unsuccessful.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">
                    {{ __('Title') }}
                </label>
                <input type="text" name="title" id="title" 
                       class="border-gray-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm w-full">
            </div>

            <div class="mb-4">
                <label for="image" class="block  text-gray-700 font-bold mb-2">
                    {{ __('Upload Image') }}
                </label>
                <div class="  relative border-2 border-dashed  border-gray-300 p-6 rounded-md text-center bg-gray-100">
                    <input type="file" name="image" id="image" accept="image/*" 
                           class=" bg-slate-500 absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="previewImage(event)">
                    
                    <div class="mb-4">
                        <svg class="w-16 h-16 text-gray-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v12l4-4 4 4V3m0 0l4 4M5 3h14M5 12l4 4 4-4" />
                        </svg>
                    </div>
                    
                    <p class="text-gray-600">Drag and drop an image here, or click to select a file</p>
                    
                    <img id="imagePreview" src="#" alt="Image Preview" 
                         class="hidden mx-auto mt-4 max-w-xs rounded shadow-md">
                </div>
            </div>

            <!-- Description Input -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">
                    {{ __('Description') }}
                </label>
                <textarea name="description" id="description" rows="4" 
                          class="border-gray-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm w-full"></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Submit') }}
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

        // Preview Image Function
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.classList.add('hidden');
            }
        }
    </script>

</x-app-layout>
