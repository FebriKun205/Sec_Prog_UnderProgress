<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Forums') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
            {{ $forums->links() }} 
        </div>

            @foreach ($forums as $forum)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5 pl-7 pr-7 mb-4">
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-row justify-between items-center">
                            <!-- tittle and author -->
                            <a href="{{ route('forum.show', $forum->id) }}" class="text-2xl text-white font-bold hover:text-indigo-600">{{ $forum->title }}</a>

                            <div class="flex flex-row gap-3">
                                <h1 class="text-lg font-bold text-indigo-600">{{ $forum->user->name }}</h1>
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img class="h-8 w-8 rounded-full object-cover mr-3" src="{{ $forum->user->profile_photo_url }}" alt="{{ $forum->user->name }}" />
                                @endif
                            </div>
                        </div>
                        
                        <!-- Content -->
                        @php
                            // Get the original content
                            $originalContent = $forum->content;

                            // Limit content to 500 characters
                            $limitedContent = \Illuminate\Support\Str::limit($originalContent, 500, '');

                            // Split the content into lines
                            $lines = explode("\n", $limitedContent);
                            
                            // Limit to the first 5 lines
                            $limitedLines = implode("\n", array_slice($lines, 0, 5));

                            // Check if the original content exceeds 500 characters or 5 lines
                            $finalContent = (strlen($originalContent) > 500 || count($lines) > 5) ? "{$limitedLines}..." : $limitedLines;
                        @endphp

                        <div>
                            <p class="text-gray-400">{!! nl2br(e($finalContent)) !!}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <span class="text-gray-500">{{ $forum->created_at->format('d-m-Y H:i:s') }}</span>
                            <span class="text-gray-500">
                                {{ $forum->comments->whereNull('parent_id')->count() }} people commented
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div>
                {{ $forums->links() }} 
            </div>
        </div>
    </div>
</x-app-layout>
