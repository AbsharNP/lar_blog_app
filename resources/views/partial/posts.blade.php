@foreach($posts as $post)
<div class="py-12">
    <div class="max-w-xs mx-auto sm:px-6 lg:px-8 bg-gray-100">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <span class="font-bold">{{ $post->author }}</span>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 text-black px-4 py-2 rounded-lg hover:bg-blue-700" title="edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded-lg hover:bg-red-700" title="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <p class="mb-2">{{ $post->content }}</p>
                @if($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="w-30 h-auto mx-auto mt-2">
                @endif
                <div class="flex items-center mb-2">
                    <span class="text-sm text-gray-600 ml-2">{{ $post->created_at->format('M d, Y') }}</span>
                </div>
            </div>  
        </div>
    </div>
</div>
@endforeach
