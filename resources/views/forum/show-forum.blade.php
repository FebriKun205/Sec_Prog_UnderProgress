<x-app-layout>
    <x-slot name="header">
        <!-- Header title and back button -->
        <div class="flex flex-row gap-4 items-center">
            <a class="rounded-full bg-slate-600 px-3 py-3 text-white shadow-sm hover:bg-slate-500" href="{{ route('forum')}}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>

            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {!! nl2br(e($forum->title)) !!}  
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- FORUM -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 flex gap-4 flex-col">
                <!-- tittle and author -->
                <div class="flex flex-row justify-between items-center">
                    <h1 href="" class="text-3xl text-white font-bold">
                        {!! nl2br(e($forum->title)) !!}  
                    </h1>

                    <div class="flex items-center gap-2">
                        <h1 class="text-lg font-bold text-indigo-600">{{ $forum->user->name }}</h1> 
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 me-3">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ $forum->user->profile_photo_url }}" alt="{{ $forum->user->name }}" />
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <!-- Forum image display -->
                    <livewire:image-modal :forum="$forum" />

                    <!-- Forum content -->
                    <p class="text-gray-700 dark:text-gray-300 mt-2">{!! nl2br(e($forum->content)) !!}</p>

                    <!-- Date Created -->
                    <div class="mt-4">  
                        <span class="text-gray-500">{{ $forum->created_at->format('d-m-Y H:i:s') }}</span>
                    </div>
                </div>

                <div x-data="{ showForm: false }">
                    <!-- Button to show comment form -->
                    <button 
                        @click="showForm = !showForm" 
                        class="rounded-md bg-yellow-500 hover:bg-yellow-400 px-6 py-2 text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                    </button>

                <!-- Comment Form (Initially Hidden) -->
                <div x-show="showForm" class="mt-4">
                    <form action="{{ route('comment.store', ['forumId' => $forum->id, 'commentId' => null]) }}" method="POST" class="flex flex-col gap-3" enctype="multipart/form-data" id="comment-form">
                        @csrf
                        <h1 class="text-white text-2xl">Comment</h1>
                        <textarea 
                            name="comment" 
                            id="comment" 
                            placeholder="Hello comment right here you hacker..." 
                            class="resize-none h-32 p-2 rounded-md bg-gray-200 dark:bg-gray-700 text-black dark:text-white"
                        ></textarea>
                        <div class="flex flex-row">
                            <button 
                                type="submit" 
                                id="post-btn" 
                                class="rounded-md bg-indigo-600 hover:bg-indigo-500 px-16 py-2.5 text-sm font-semibold text-white shadow-sm"
                            >
                                Comment!
                            </button>
                        </div>
                    </form>

                    <!-- Alert for confirmation -->
                    @if(session('success'))
                        <script>
                            alert("{{ session('success') }}");
                        </script>
                    @endif

                    @if($errors->any())
                        <script>
                            alert("{{ implode(' ', $errors->all()) }}");
                        </script>
                    @endif
                </div>
            </div>
        </div>  
        
        <div class="mt-10">
            {{ $comments->links() }} <!-- This will generate pagination links -->
        </div>
        
        @if($comments->count() > 0)
            <h1 class="text-2xl text-white font-semibold mt-4">Comments</h1>
            @foreach($comments as $comment)
                <x-comment :comment="$comment" :forum="$forum" />
            @endforeach
        @else
            <h1 class="text-base text-gray-400 mt-10">No discussion here, not fun!, COMMENT NOW!</h1>
        @endif

        <div class="mt-4">
            {{ $comments->links() }} <!-- This will generate pagination links -->
        </div>
    </div>
</x-app-layout>
