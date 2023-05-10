<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Comments extends Component
{
    public Post $post;

    protected $listeners = [
        'commentCreated' => '$refresh',
        'commentDeleted' => '$refresh'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $comments = $this->selectComment();
        return view('livewire.comments', compact('comments'));
    }

    /**
     *
     * @return mixed
     * @author lroja <email>
     */

    private function selectComment()
    {
        return Comment::where('post_id', '=', $this->post->id)
            ->with(['post', 'user', 'comments'])
            ->where('parent_id')
            ->orderByDesc('created_at')
            ->get();
    }
}
