<div>
    <!-- Forum image display -->
    @if($forum->forum_images_path)
        <img class="w-1/2 rounded-md cursor-pointer" 
             src="{{ Storage::url($forum->forum_images_path) }}" 
             alt="Forum Image"
             wire:click="openModal('{{ Storage::url($forum->forum_images_path) }}')" />
    @endif

    <!-- Modal -->
    @if($isOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50" wire:click="closeModal">
            <div class="flex justify-center">
                <img src="{{ $imageUrl }}" alt="Modal Image" class="w-9/12 h-auto object-cover rounded-lg shadow-lg" />
            </div>
        </div>
    @endif
</div>
