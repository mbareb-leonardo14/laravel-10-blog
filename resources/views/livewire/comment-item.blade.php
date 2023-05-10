<div>
  <div class="mb-4 flex gap-3">
    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-400">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
        <path fill-rule="evenodd"
          d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
          clip-rule="evenodd" />
      </svg>
    </div>
    <div class="flex-1">
      <div>
        <a href="#" class="font-semibold text-indigo-600">
          {{ $comment->user->name }}
        </a>
        - <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
      </div>
      @if ($editing)
        <livewire:comment-create :comment-model="$comment" />
      @else
        <div class="text-gray-700">
          {{ $comment->comment }}
        </div>
      @endif

      <div>
        <a wire:click.prevent="startReply" href="" class="mr-3 text-sm text-indigo-600">Reply</a>
        @if (\Illuminate\Support\Facades\Auth::id() == $comment->user_id)
          <a wire:click.prevent="startCommentEdit" href="" class="mr-3 text-sm text-blue-600">Edit</a>
          <a wire:click.prevent="deleteComment" href="" class="text-sm text-red-600">Delete</a>
        @endif
      </div>
      @if ($replying)
        <livewire:comment-create :post="$comment->post" :parent-comment="$comment" />
      @endif

      @if ($comment->comments->count())
        <div class="mt-4">
          @foreach ($comment->comments as $childComment)
            <livewire:comment-item :comment="$childComment" wire:key="comment-{{ $childComment->id }}" />
          @endforeach
        </div>
      @endif

    </div>
  </div>
</div>
